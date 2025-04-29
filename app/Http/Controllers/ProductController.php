<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where('pro_name', 'like', "%$search%")
                  ->orWhere('pro_code', 'like', "%$search%");
        }

        $products = $query->paginate(10)->appends(['search' => $request->search]);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pro_code' => ['required', 'string', 'max:255', 'unique:products,pro_code'],
            'pro_name' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,cat_id'],
            'qty' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'discount' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'image_url' => ['nullable', 'url'],
        ]);

        // Calculate discounted price
        $validated['discounted_price'] = $validated['price'] * (1 - ($validated['discount'] ?? 0) / 100);

        // Handle image: URL takes precedence over file upload
        if ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        } elseif ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            $validated['image'] = null;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'pro_code' => ['required', 'string', 'max:255', 'unique:products,pro_code,' . $product->pro_id . ',pro_id'],
            'pro_name' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,cat_id'],
            'qty' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'discount' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'image_url' => ['nullable', 'url'],
        ]);

        // Calculate discounted price
        $validated['discounted_price'] = $validated['price'] * (1 - ($validated['discount'] ?? 0) / 100);

        // Handle image: URL takes precedence over file upload
        if ($request->filled('image_url')) {
            // Delete old image if it exists and is a stored file (not a URL)
            if ($product->image && !filter_var($product->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->image_url;
        } elseif ($request->hasFile('image')) {
            // Delete old image if it exists and is a stored file (not a URL)
            if ($product->image && !filter_var($product->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            $validated['image'] = $product->image; // Retain existing image
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        try {
            // Delete image if it exists and is a stored file (not a URL)
            if ($product->image && !filter_var($product->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();
            return redirect()->route('products.index')
                ->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products.index')
                ->with('error', 'Cannot delete product due to existing relationships or other issues.');
        }
    }
}