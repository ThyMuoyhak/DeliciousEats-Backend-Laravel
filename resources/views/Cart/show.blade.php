<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
            <h2 class="text-lg font-semibold mt-4 mb-2">Items</h2>
            @if ($order->orderItems->isEmpty())
                <p class="text-gray-600">No items in this order.</p>
            @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->price, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('cart.index') }}" class="text-blue-500 hover:underline">Back to Orders</a>
        </div>
    </div>
</body>
</html>