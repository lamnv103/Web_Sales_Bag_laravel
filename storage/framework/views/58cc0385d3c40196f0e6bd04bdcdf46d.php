
<?php $__env->startSection('content'); ?>
<style>
  .text-success{
    color: rgb(0, 223, 0) !important;
  }
  .text-danger{
    color:  rgb(255, 0, 0) !important;
  }
</style>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Giỏ Hàng</h2>
      <div class="checkout-steps">
        <a href="javascrip:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Túi mua sắm</span>
            <em>Quản lý danh sách mục của bạn</em>
          </span>
        </a>
        <a href="javascrip:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Vận chuyển và Thanh toán</span>
            <em>Kiểm tra danh sách các mặt hàng của bạn</em>
          </span>
        </a>
        <a href=javascrip:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Xác nhận</span>
            <em>Xem lại và gửi đơn hàng của bạn</em>
          </span>
        </a>
      </div>
      <div class="shopping-cart">
        <?php if($items->count()>0 ): ?>
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>sản phẩm</th>
                <th></th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng phụ</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($item->model->image); ?>" width="120" height="120" alt="<?php echo e($item->name); ?>" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4><?php echo e($item->name); ?></h4>
                    <ul class="shopping-cart__product-item__options">
                      <li>Màu sắc: Vàng</li>
                      <li>Kích thước: L</li>
                    </ul>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">$<?php echo e($item->price); ?></span>
                </td>
                <td>
                  <div class="qty-control position-relative">
                    <input type="number" name="quantity" value="<?php echo e($item->qty); ?>" min="1" class="qty-control__number text-center">
                    <form method="POST" action="<?php echo e(route('cart.qty.decrease',['rowId'=>$item->rowId])); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="qty-control__reduce">-</div>
                    </form>

                    <form method="POST" action="<?php echo e(route('cart.qty.increase',['rowId'=>$item->rowId])); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                        <div class="qty-control__increase">+</div>
                    </form>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__subtotal">$<?php echo e($item->subTotal()); ?></span>
                </td>
                <td>
                  <form method="POST" action="<?php echo e(route('cart.item.remove' , ['rowId'=>$item->rowId])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                  <a href="javascript:void(0)" class="remove-cart">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                      <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                    </svg>
                  </a>
                  </form>
                </td>
              </tr>             
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody>
          </table>

          <div class="cart-table-footer">
            <?php if(!Session::has('coupon')): ?> 
              <form action="<?php echo e(route('cart.coupon.apply')); ?>" method="POST" class="position-relative bg-body">
                <?php echo csrf_field(); ?>
                <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" value="">
                <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                  value="APPLY COUPON">
              </form>
            <?php else: ?>
              <form action="<?php echo e(route('cart.coupon.remove')); ?>" method="POST" class="position-relative bg-body">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" value="<?php if(Session::has('coupon')): ?> <?php echo e(Session::get('coupon')['code']); ?> Applied! <?php endif; ?>">
                <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                  value="REMOVE COUPON">
              </form>
            <?php endif; ?>
          
            <form action="<?php echo e(route('cart.empty')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
            <button class="btn btn-light" type="submit">XÓA GIỎ HÀNG</button>
            </form>
          </div>

          <div>
            <?php if(Session::has('success')): ?>
              <p class="text-success"><?php echo e(Session::get('success')); ?></p>
            <?php elseif(Session::has('error')): ?>
              <p class="text-danger"><?php echo e(Session::get('error')); ?>

            <?php endif; ?>
          </div>
        </div>

        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Tổng số giỏ hàng</h3>
              <?php if(Session::has('discounts')): ?>  
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Tổng phụ</th>
                    <td>$<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                  </tr>
                  <tr>
                    <th>Giảm giá <?php echo e(Session::get('coupon')['code']); ?></th>
                        <td>$<?php echo e(Session::get('discounts')['discount']); ?></td>
                  </tr>
                  <tr>
                    <th>Tổng cộng sau khi giảm giá</th>
                        <td>$<?php echo e(Session::get('discounts')['subtotal']); ?></td>
                  </tr>
                  <tr>
                    <th>Vận chuyển</th>
                    <td>Miễn phí</td>
                  </tr>
                  <tr>
                    <th>Thuế GTGT</th>
                    <td>$<?php echo e(Session::get('discounts')['tax']); ?></td>
                  </tr>
                  <tr>
                    <th>Tổng cộng</th>
                    <td>$<?php echo e(Session::get('discounts')['total']); ?></td>
                  </tr>
                </tbody>
              </table>
          
              <?php else: ?>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Tổng phụ</th>
                    <td>$<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                  </tr>
                  <tr>
                    <th>Vận chuyển</th>
                    <td>Miễn phí</td>
                  </tr>
                  <tr>
                    <th>Thuế GTGT</th>
                    <td>$<?php echo e(Cart::instance('cart')->tax()); ?></td>
                  </tr>
                  <tr>
                    <th>Tổng cộng</th>
                    <td>$<?php echo e(Cart::instance('cart')->total()); ?></td>
                  </tr>
                </tbody>
              </table>
              <?php endif; ?>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-primary btn-checkout">TIẾN HÀNH THANH TOÁN</a>
              </div>
            </div>
          </div>
        </div>
        <?php else: ?>
          <div class="row">
            <div class="col-md-12 text-center pt-5 bp-5">
                    <p>Không tìm thấy sản phẩm nào trong giỏ hàng của bạn</p>
                    <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-info">Mua ngay</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
  $(function() {
    $(".qty-control__increase").on("click", function() {
      $(this).closest('form').submit();
    });

    $(".qty-control__reduce").on("click", function() {
      $(this).closest('form').submit();
    });

    $('.remove-cart').on("click", function(){
      $(this).closest('form').submit();
    });

  });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/cart.blade.php ENDPATH**/ ?>