<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|exists:products,pro_id',
            'items.*.quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'shipping' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'promo_code' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
            'email' => 'required|email',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'request_data' => $request->all(), // Debug payload
            ], 422);
        }

        $items = $request->input('items');
        $subtotal = 0;
        $subtotalDetails = [];

        foreach ($items as $item) {
            $product = Product::select('pro_id', 'pro_name', 'price', 'discount', 'qty')
                ->where('pro_id', $item['id'])
                ->first();
            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Product ID {$item['id']} not found",
                ], 404);
            }
            if ($product->qty < $item['quantity']) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Insufficient stock for product {$product->pro_name}",
                ], 400);
            }
            $price = $product->discounted_price; // Use accessor
            $itemSubtotal = $price * $item['quantity'];
            $subtotal += $itemSubtotal;
            $subtotalDetails[] = [
                'product_id' => $item['id'],
                'product_name' => $product->pro_name,
                'quantity' => $item['quantity'],
                'price' => round($price, 2),
                'subtotal' => round($itemSubtotal, 2),
            ];
        }

$inputSubtotal = round($request->input('subtotal'), 2);
if (abs($subtotal - $inputSubtotal) > 0.01) {
    return response()->json([
        'status' => 'error',
        'message' => 'Subtotal mismatch',
        'details' => [
            'expected_subtotal' => round($subtotal, 2),
            'received_subtotal' => $inputSubtotal,
            'items' => $subtotalDetails,
        ],
    ], 400);
}

        $total = $subtotal + $request->input('tax') + $request->input('shipping') - $request->input('discount');
        if (abs($total - $request->input('total')) > 0.01) {
            return response()->json([
                'status' => 'error',
                'message' => 'Total mismatch',
                'details' => [
                    'expected_total' => round($total, 2),
                    'received_total' => $request->input('total'),
                    'subtotal' => round($subtotal, 2),
                    'tax' => $request->input('tax'),
                    'shipping' => $request->input('shipping'),
                    'discount' => $request->input('discount'),
                ],
            ], 400);
        }

        try {
            $order = DB::transaction(function () use ($request, $items) {
                $order = Order::create([
                    'user_id' => $request->input('user_id'),
                    'subtotal' => $request->input('subtotal'),
                    'tax' => $request->input('tax'),
                    'shipping' => $request->input('shipping'),
                    'discount' => $request->input('discount'),
                    'total' => $request->input('total'),
                    'promo_code' => $request->input('promo_code'),
                    'notes' => $request->input('notes'),
                    'status' => 'pending',
                    'email' => $request->input('email'),
                ]);

                foreach ($items as $item) {
                    $product = Product::find($item['id']);
                    $price = $product->discounted_price; // Use accessor

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => round($price, 2),
                        'discount' => $product->discount ?? 0,
                    ]);

                    $product->decrement('qty', $item['quantity']);
                }

                return $order;
            });

            Mail::to($request->input('email'))->queue(new OrderConfirmation($order));

            return response()->json([
                'status' => 'success',
                'data' => [
                    'order_id' => $order->id,
                ],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create order: ' . $e->getMessage(),
            ], 500);
        }
    }
}