<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Xin chào <?php echo e(Auth::user()->name); ?>,</h1>
    <p>Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi!</p>
    <p>Thông tin đơn hàng của bạn:</p>
    <ul>
        <li>Mã đơn hàng: <strong>#<?php echo e($order->id); ?></strong></li>
        <li>Tổng tiền: <strong><?php echo e($order->total); ?> VND</strong></li>
        <li>Ngày đặt hàng: <strong><?php echo e($order->created_at->format('d/m/Y')); ?></strong></li>
    </ul>
    <p>Chúng tôi sẽ liên hệ bạn ngay khi đơn hàng được giao.</p>
    <p>Trân trọng,<br>Your Shop Name</p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/emails/order.blade.php ENDPATH**/ ?>