<!DOCTYPE html>
<html>
<head>
    <title>Phản hồi từ quản trị viên</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
        <h1 style="text-align: center; color: #555;">Xin chào <?php echo e($contacts->name); ?>,</h1>
        
        <p>Bạn đã gửi một liên hệ với nội dung:</p>
        <blockquote style="background: #f9f9f9; border-left: 4px solid #ccc; margin: 10px 0; padding: 10px;">
            "<?php echo e($contacts->comment); ?>"
        </blockquote>

        <p><strong>Phản hồi từ chúng tôi:</strong></p>
        <p style="background: #e8f5e9; padding: 10px; border-radius: 5px;">
            <?php echo e($response); ?>

        </p>

        <p>Chúng tôi hy vọng phản hồi này sẽ giúp ích cho bạn. Nếu bạn có thêm câu hỏi, đừng ngần ngại liên hệ lại với chúng tôi.</p>
        
        <br>
        <p>Trân trọng,</p>
        <p><strong>Đội ngũ hỗ trợ</strong></p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/emails/contact_response.blade.php ENDPATH**/ ?>