<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Order #{{ $order->id }}</h1>

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('cart.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <h2 class="text-lg font-semibold mb-4">Items</h2>
                <div id="items">
                    @foreach ($order->orderItems as $index => $item)
                        <div class="flex gap-4 mb-2">
                            <select name="items[{{ $index }}][product_id]" class="w-full rounded-md border-gray-300 shadow-sm">
                                @foreach ($products as $product)
                                    <option value="{{ $product->pro_id }}" {{ $product->pro_id === $item->product_id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" min="1" class="w-24 rounded-md border-gray-300 shadow-sm">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Update Order
                </button>
                <a href="{{ route('cart.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>