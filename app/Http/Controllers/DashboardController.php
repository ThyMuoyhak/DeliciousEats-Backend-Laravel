<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Fetch products with pagination
        $products = Product::with('category')->paginate(10);

        // Calculate product statistics
        $totalProducts = Product::count();
        $productsInStock = Product::where('qty', '>', 0)->count();
        $lowStockProducts = Product::where('qty', '<=', 10)->count();

        return view('dashboard', compact('products', 'totalProducts', 'productsInStock', 'lowStockProducts'));
    }
}