<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Xin chào {{ Auth::user()->name }},</h1>
    <p>Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi!</p>
    <p>Thông tin đơn hàng của bạn:</p>
    <ul>
        <li>Mã đơn hàng: <strong>#{{ $order->id }}</strong></li>
        <li>Tổng tiền: <strong>{{ $order->total }} VND</strong></li>
        <li>Ngày đặt hàng: <strong>{{ $order->created_at->format('d/m/Y') }}</strong></li>
    </ul>
    <p>Chúng tôi sẽ liên hệ bạn ngay khi đơn hàng được giao.</p>
    <p>Trân trọng,<br>Your Shop Name</p>
</body>
</html>
