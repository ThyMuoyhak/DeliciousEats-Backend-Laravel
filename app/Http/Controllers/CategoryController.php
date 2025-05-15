<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.category_add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.category_edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Log the raw request data
        Log::info('Raw request data before validation:', $request->all());

        // Validate the request
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Log the validated data
        $validated = $validator->validated();
        Log::info('Validated data:', $validated);

        // Update the category
        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')
                ->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')
                ->with('error', 'Cannot delete category because it is linked to products.');
        }
    }

    public function delete(Category $category)
    {
        return view('category.category_delete', compact('category'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::where('cat_name', 'like', "%{$search}%")
            ->paginate(10)
            ->appends(['search' => $search]);
        return view('category.category_search', compact('categories', 'search'));
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->paginate(10);
        return view('category.trashed', compact('categories'));
    }

    public function restore($cat_id)
    {
        $category = Category::withTrashed()->findOrFail($cat_id);
        $category->restore();
        return redirect()->route('categories.index')
            ->with('success', 'Category restored successfully.');
    }

    // API Methods
    public function indexApi()
    {
        $categories = Category::all();
        return response()->json([
            'status' => 'success',
            'data' => $categories,
        ], 200);
    }

    public function showApi($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $category,
        ], 200);
    }

    public function updateApi(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();
        $category->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $category,
            'message' => 'Category updated successfully.',
        ], 200);
    }

    public function destroyApi($id)
    {
        $category = Category::findOrFail($id);

        try {
            $category->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Category deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cannot delete category because it is linked to products.',
            ], 400);
        }
    }
}