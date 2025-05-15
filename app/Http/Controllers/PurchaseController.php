<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        $purchases = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('cart.index', compact('purchases'));
    }
}