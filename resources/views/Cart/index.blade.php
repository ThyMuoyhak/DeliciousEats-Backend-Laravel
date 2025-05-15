<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Your Orders</h1>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($purchases->isEmpty())
            <p class="text-gray-600">No orders found.</p>
        @else
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($purchase->total, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($purchase->status) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex gap-2">
                                        <a href="{{ route('cart.show', $purchase->id) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                            View
                                        </a>
                                        <a href="{{ route('cart.edit', $purchase->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                            Edit
                                        </a>
                                        <form action="{{ route('cart.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('cart.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                Create New Order
            </a>
        </div>
    </div>
</body>
</html>