

<?php $__env->startSection('content'); ?>

<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Cập nhật địa chỉ</h2>
        <div class="row">
            <div class="col-lg-2">
                <?php echo $__env->make('user.account-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-10">
                <form class="tf-section-2 form-add-address" method="POST" enctype="multipart/form-data" action="<?php echo e(route('user.address.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" name="id" value="<?php echo e($address->id); ?>">

                    <div class="wg-box">
                        <!-- Tên người nhận -->
                        <fieldset class="name">
                            <div class="body-title mb-10">Tên người nhận <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="name" value="<?php echo e($address->name); ?>" required>
                        </fieldset>

                        <!-- Số điện thoại -->
                        <fieldset class="phone">
                            <div class="body-title mb-10">Số điện thoại <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="phone" value="<?php echo e($address->phone); ?>" required>
                        </fieldset>

                        <!-- Phường/Xã -->
                        <fieldset class="locality">
                            <div class="body-title mb-10">Phường/Xã <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="locality" value="<?php echo e($address->locality); ?>" required>
                        </fieldset>

                        <!-- Số nhà, đường -->
                        <fieldset class="address">
                            <div class="body-title mb-10">Số nhà, đường <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="address" value="<?php echo e($address->address); ?>" required>
                        </fieldset>

                        <!-- Thành phố -->
                        <fieldset class="city">
                            <div class="body-title mb-10">Thành phố <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="city" value="<?php echo e($address->city); ?>" required>
                        </fieldset>

                        <!-- Tỉnh/Bang -->
                        <fieldset class="state">
                            <div class="body-title mb-10">Tỉnh/Bang <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="state" value="<?php echo e($address->state); ?>" required>
                        </fieldset>

                        <!-- Quốc gia -->
                        <fieldset class="country">
                            <div class="body-title mb-10">Quốc gia <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="country" value="<?php echo e($address->country); ?>" required>
                        </fieldset>

                        <!-- Địa điểm gần đó -->
                        <fieldset class="landmark">
                            <div class="body-title mb-10">Điểm mốc</div>
                            <input class="mb-10 form-control" type="text" name="landmark" value="<?php echo e($address->landmark); ?>">
                        </fieldset>

                        <!-- Mã bưu điện -->
                        <fieldset class="zip">
                            <div class="body-title mb-10">Mã bưu điện <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="zip" value="<?php echo e($address->zip); ?>" required>
                        </fieldset>

                        <!-- Nút lưu -->
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Cập nhật địa chỉ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/user/address.blade.php ENDPATH**/ ?>