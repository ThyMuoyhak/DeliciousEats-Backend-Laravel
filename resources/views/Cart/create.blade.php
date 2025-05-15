<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Order</h1>

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h2 class="text-lg font-semibold mb-4">Cart Items</h2>
                @if ($cartItems->isEmpty())
                    <p class="text-gray-600">Your cart is empty.</p>
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
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->product->discounted_price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->product->discounted_price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Place Order
                </button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('cart.index') }}" class="text-blue-500 hover:underline">Back to Orders</a>
        </div>
    </div>
</body?p>
</html>