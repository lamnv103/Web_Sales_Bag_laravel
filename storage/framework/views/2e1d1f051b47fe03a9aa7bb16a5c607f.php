
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Thông tin thương hiệu</h3>
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
                            <a href="<?php echo e(route('admin.brands')); ?>">
                                <div class="text-tiny">Thương hiệu</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Thương hiệu mới</div>
                        </li>
                    </ul>
                </div>
                <!-- new-category -->
                <div class="wg-box">
                    <form class="form-new-product form-style-1" action="<?php echo e(route('admin.brand.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <fieldset class="name">
                            <div class="body-title">Tên thương hiệu <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Brand name" name="name"
                                tabindex="0" value="<?php echo e(old('name')); ?>" aria-required="true" required="">
                        </fieldset>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <fieldset class="name">
                            <div class="body-title">Thương hiệu Slug<span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Brand Slug" name="slug"
                                tabindex="0" value="<?php echo e(old('slug')); ?>" aria-required="true" required="">
                        </fieldset>
                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <fieldset>
                            <div class="body-title">Tải lên hình ảnh<span class="tf-color-1">*</span>
                            </div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="upload-1.html" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Thả hình ảnh của bạn ở đây hoặc chọn<span
                                                class="tf-color">nhấp để duyệt</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="bot">
                            <div></div>
                            <button class="tf-button w208" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
            
            $("input[name='name']").on("change", function(){
                $("input[name='slug']").val(StringToSlug($(this).val()));

            });
        });

        function stringToSlug(Text) 
        {
            return Text.toLowerCase()
            .replace(/[^\w]+/g, "")  // Corrected regex
            .replace(/ +/g, "-");    // Replace spaces with hyphens
        }


    </script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/brand-add.blade.php ENDPATH**/ ?>