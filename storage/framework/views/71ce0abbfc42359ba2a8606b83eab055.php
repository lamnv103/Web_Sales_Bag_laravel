            <ul class="account-nav">
                <li><a href="<?php echo e(route('user.index')); ?>" class="menu-link menu-link_us-s">Trang chủ</a></li>
                <li><a href="<?php echo e(route('user.orders')); ?>" class="menu-link menu-link_us-s">Đơn hàng</a></li>
                <li><a href="<?php echo e(route('user.address')); ?>" class="menu-link menu-link_us-s">Địa chỉ</a></li>
                <li><a href="<?php echo e(route('wishlist.index')); ?>" class="menu-link menu-link_us-s">Danh sách yêu thích</a></li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form">
                        <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('logout')); ?>" class="menu-link menu-link_us-s" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    </form>
                </li>
            </ul><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/user/account-nav.blade.php ENDPATH**/ ?>