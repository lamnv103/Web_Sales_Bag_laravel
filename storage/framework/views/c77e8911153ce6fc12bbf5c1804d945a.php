
<?php $__env->startSection('content'); ?>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
        <h2 class="page-title">Tài khoản của tôi</h2>
        <div class="row">
            <div class="col-lg-3">
                <?php echo $__env->make('user.account-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9">
            <div class="page-conten my-account__dashboard">
                <p>Xin chào <strong>người dùng</strong></p>
                <p>Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <a class="unerline-link" href="account_orders.html">đơn hàng gần đây</a>, manage your <a class="unerline-link" href="account_edit_address.html">địa chỉ giao hàng</a>, and <a class="unerline-link" href="account_edit.html">chỉnh sửa mật khẩu và thông tin tài khoản của bạn</a></p>
            </div>
            </div>
        </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/user/index.blade.php ENDPATH**/ ?>