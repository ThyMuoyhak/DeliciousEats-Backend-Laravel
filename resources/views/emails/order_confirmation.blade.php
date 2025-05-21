<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p>Your order ID is #{{ $order->id }}.</p>
    <h2>Order Summary</h2>
    <ul>
        @foreach ($order->items as $item)
            <li>{{ $item->product->pro_name }} x {{ $item->quantity }} - ${{ number_format($item->price * $item->quantity, 2) }}</li>
        @endforeach
    </ul>
    <p>Subtotal: ${{ number_format($order->subtotal, 2) }}</p>
    <p>Tax: ${{ number_format($order->tax, 2) }}</p>
    <p>Shipping: ${{ number_format($order->shipping, 2) }}</p>
    <p>Discount: ${{ number_format($order->discount, 2) }}</p>
    <p><strong>Total: ${{ number_format($order->total, 2) }}</strong></p>
    <p>Thank you for shopping with us!</p>
</body>
</html>