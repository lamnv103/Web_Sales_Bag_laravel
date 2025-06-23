
<?php $__env->startSection('content'); ?>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Vận chuyển và Thanh toán</h2>
      <div class="checkout-steps">
        <a href="<?php echo e(route('cart.index')); ?>" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Túi mua sắm</span>
            <em>Quản lý danh sách mục của bạn</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Vận chuyển và Thanh toán</span>
            <em>Kiểm tra danh sách các mặt hàng của bạn</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Xác nhận</span>
            <em>Xem lại và gửi đơn hàng của bạn</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" action="<?php echo e(route('cart.place.an.order')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>CHI TIẾT VẬN CHUYỂN</h4>
              </div>
              <div class="col-6">
              </div>
            </div>
            <?php if($address): ?>
            <div class="row">
    <div class="col-md-12">
        <div class="my-account__address-list">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Thông tin</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Họ và tên</b></td>
                        <td><?php echo e($address->name); ?></td>
                    </tr>
                    <tr>
                        <td><b>Địa chỉ</b></td>
                        <td><?php echo e($address->address); ?></td>
                    </tr>
                    <tr>
                        <td><b>Toà nhà</b></td>
                        <td><?php echo e($address->landmark); ?></td>
                    </tr>
                    <tr>
                        <td><b>Thành phố</b></td>
                        <td><?php echo e($address->city); ?></td>
                    </tr>
                    <tr>
                        <td><b>Quốc gia</b></td>
                        <td><?php echo e($address->country); ?></td>
                    </tr>
                    <tr>
                        <td><b>Mã bưu điện</b></td>
                        <td><?php echo e($address->zip); ?></td>
                    </tr>
                    <tr>
                        <td><b>Số điện thoại</b></td>
                        <td><?php echo e($address->phone); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



                
            <?php else: ?>
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="<?php echo e(old('name')); ?>">
                  <label for="name">Họ và tên đầy đủ *</label>
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="<?php echo e(old('phone')); ?>">
                  <label for="phone">Số điện thoại *</label>
                  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="zip" required="" value="<?php echo e(old('zip')); ?>">
                  <label for="zip">Mã PIN *</label>
                  <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="state" required="" value="<?php echo e(old('state')); ?>">
                  <label for="state">Tình trạng *</label>
                  <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="city" required="" value="<?php echo e(old('city')); ?>">
                  <label for="city">Thị trấn / Thành phố *</label>
                  <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="address" required="" value="<?php echo e(old('address')); ?>">
                  <label for="address">Thị trấn / Thành phố *</label>
                  <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="locality" required="" value="<?php echo e(old('locality')); ?>">
                  <label for="locality">Tên đường, khu vực, thuộc địa *</label>
                  <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="landmark" required="" value="<?php echo e(old('landmark')); ?>">
                  <label for="landmark">Điểm mốc *</label>
                  <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                </div>
              </div>
            </div>
            <?php endif; ?>

          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Đơn hàng của bạn</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>SẢN PHẨM</th>
                      <th align="right">TỔNG PHỤ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = Cart::instance('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($item->name); ?> x <?php echo e($item->qty); ?>

                      </td>
                      <td align="right">
                        $<?php echo e($item->subtotal()); ?>

                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>

                <?php if(Session::has('discounts')): ?>
                    <table class="checkout-totals">
                        <tbody>
                            <tr>
                              <th>Tổng cộng</th>
                              <td class="text-right">$<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                            </tr>
                            <tr>
                              <th>Giảm giá <?php echo e(Session::get('coupon')['code']); ?></th>
                              <td class="text-right">$<?php echo e(Session::get('discounts')['discount']); ?></td>
                            </tr>
                            <tr>
                              <th>Tổng cộng sau khi giảm giá</th>
                              <td class="text-right">$<?php echo e(Session::get('discounts')['subtotal']); ?></td>
                            </tr>
                            <tr>
                              <th>Vận chuyển</th>
                              <td class="text-right">Miễn phí</td>
                            </tr>
                            <tr>
                              <th>Thuế GTGT</th>
                              <td class="text-right">$<?php echo e(Session::get('discounts')['tax']); ?></td>
                            </tr>
                            <tr>
                              <th>Tổng cộng</th>
                              <td class="text-right">$<?php echo e(Session::get('discounts')['total']); ?></td>
                            </tr>
                          </tbody>
                    </table>
                    
                <?php else: ?>
                    <table class="checkout-totals">
                    <tbody>
                        <tr>
                        <th>TỔNG PHỤ</th>
                        <td class="text-right">$<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                        </tr>
                        <tr>
                        <th>Vận chuyển</th>
                        <td class="text-right">Miễn phí vận chuyển</td>
                        </tr>
                        <tr>
                        <th>Thuế GTGT</th>
                        <td class="text-right">$<?php echo e(Cart::instance('cart')->tax()); ?></td>
                        </tr>
                        <tr>
                        <th>TỔNG CỘNG</th>
                        <td class="text-right">$<?php echo e(Cart::instance('cart')->total()); ?></td>
                        </tr>
                    </tbody>
                    </table>
                <?php endif; ?>

              </div>
              <div class="checkout__payment-methods">

                
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode"
                    id="mode1" value="card">
                  <label class="form-check-label" for="mode1">
                    Ghi nợ thẻ tín dụng
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode"
                    id="mode2" value="paypal">
                  <label class="form-check-label" for="mode2">
                    Thanh toán trực tuyến   
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode"
                    id="mode3" value="cod">
                  <label class="form-check-label" for="mode3">
                    Thanh toán khi nhận hàng
                  </label>
                </div>


                <div class="policy-text">
                  Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng của bạn, hỗ trợ trải nghiệm của bạn trên toàn bộ
trang web này và cho các mục đích khác được mô tả trong <a href="terms.html" target="_blank">cài đặt quyền riêng tư</a>.
                </div>
              </div>
              <button class="btn btn-primary btn-checkout">ĐẶT HÀNG</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/checkout.blade.php ENDPATH**/ ?>