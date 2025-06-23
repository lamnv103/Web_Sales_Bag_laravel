
<?php $__env->startSection('content'); ?>
<style>
    .input-link {
    word-wrap: break-word;
    word-break: break-word;
    white-space: normal;
}
</style>
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Slides</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="<?php echo e(route('admin.index')); ?>">
                        <div class="text-tiny">Trang chủ</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="slider.html">
                        <div class="text-tiny">Các slide</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Slide mới</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="<?php echo e(route('admin.slide.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <fieldset class="name">
                    <div class="body-title">Giới thiệu <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="tagline" name="tagline"
                        tabindex="0" value="<?php echo e(old('tagline')); ?>" aria-required="true" required="">
                    <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Tiêu đề<span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="title" name="title"
                        tabindex="0" value="<?php echo e(old('title')); ?>" aria-required="true" required="">
                </fieldset>
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <fieldset class="name">
                    <div class="body-title">Phụ đề<span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="subtitle" name="subtitle"
                        tabindex="0" value="<?php echo e(old('subtitle')); ?>" aria-required="true" required="">
                </fieldset>        
                    <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <fieldset class="name">
                    <div class="body-title">Liên kết<span class="tf-color-1">*</span></div>
                    <input class="flex-grow input-link" type="text" placeholder="link" name="link"
                        tabindex="0" value="<?php echo e(old('link')); ?>" aria-required="true" required="">
                </fieldset>        
                    <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <fieldset>
                    <div class="body-title">Tải lên hình ảnh<span class="tf-color-1">*</span>
                    </div>

                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none;">
                            <img src="sample.jpg" class="effect8" alt="">
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Hãy thả hình ảnh của bạn vào đây hoặc chọn<span
                                        class="tf-color">Nhấn vào đây để duyệt</span></span>
                                <input type="file" id="myFile" name="image">
                            </label>
                        </div>
                    </div>
                </fieldset>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <fieldset class="category">
                    <div class="body-title">Trạng thái</div>
                    <div class="select flex-grow">
                        <select class="" name="status">
                            <option>Lựa chọn</option>
                            <option value="1" <?php if(old('status')=="1"): ?> selected <?php endif; ?>>Đang hoạt động</option>
                            <option value="0" <?php if(old('status')=="0"): ?> selected <?php endif; ?>>Không hoạt động</option>
                        </select>
                    </div>
                </fieldset>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /new-category -->
    </div>
    <!-- /main-content-wrap -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(function() {
            $("#myFile").on("change",function(e) {
                const photoInp = $("myFile");
                const [file] = this.files;
                if(file)
                {
                    $("#imgpreview img").attr('src',URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            });
            
        });




    </script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/slide-add.blade.php ENDPATH**/ ?>