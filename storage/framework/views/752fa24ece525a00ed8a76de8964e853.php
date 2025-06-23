

<?php $__env->startSection('content'); ?>

    <head>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- FontAwesome Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <style>
            .table> :not(caption)>tr>th {
                padding: 0.625rem 1.5rem .625rem !important;
                background-color: #6a6e51 !important;
            }

            .table> :not(caption)>tr>td {
                padding: 0.625rem 1.5rem .625rem !important;
            }

            .table-bordered> :not(caption)>tr>th,
            .table-bordered> :not(caption)>tr>td {
                border-width: 1px 1px;
                border-color: #6a6e51;
            }

            .bg-success {
                background-color: #40c710 !important;
            }

            .bg-danger {
                background-color: #f44032 !important;
            }

            .bg-warning {
                background-color: #f5d700 !important;
                color: #000;
            }

            .rating-stars i {
    font-size: 24px;
    color: #575552;  /* Màu mặc định */
    cursor: pointer;
    transition: color 0.3s;
}

.rating-stars i.selected {
    color: #ff9900;  /* Màu khi chọn */
}

.rating-stars i.locked {
    cursor: default;  /* Không thể click vào sao đã đánh giá */
}

.rating-stars i.hover {
    color: #ffd700;  /* Màu khi hover */
}

        </style>
    </head>

    <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Đơn hàng</h2> 
        <div class="row">
            <div class="col-lg-2">
                <?php echo $__env->make('user.account-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-10" style="border: 2px solid #ccc;">
                <div class="review-form">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php elseif(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <h3 class="mb-5">Đánh giá sản phẩm trong đơn hàng</h3>

                    <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border p-4 mb-4">
                            <h5>Sản phẩm: <?php echo e($item->product->name); ?></h5>

                            <?php if($item->reviewed): ?>
                                <!-- Nếu sản phẩm đã được đánh giá -->
                                <p class="text-success">Sản phẩm này đã được đánh giá</p>
                            <?php else: ?>
                                <!-- Nếu sản phẩm chưa được đánh giá -->
                                <form action="<?php echo e(route('user.review.store')); ?>" method="POST"
                                    enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                    <input type="hidden" name="order_id" value="<?php echo e($orderId); ?>">

                                    <div id="rating-stars-<?php echo e($item->product_id); ?>" class="rating-stars d-flex justify-content-center my-2">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star star" data-value="<?php echo e($i); ?>" data-product-id="<?php echo e($item->product_id); ?>"
                                                title="Đánh giá <?php echo e($i); ?> sao"></i>
                                        <?php endfor; ?>
                                    </div>

                                    <input type="hidden" name="rating" id="rating_<?php echo e($item->product_id); ?>" value="0">
                                    <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <div class="form-group">
                                        <label for="comment_<?php echo e($item->product_id); ?>" class="font-weight-bold">Bình luận:</label>
                                        <textarea class="form-control border-primary rounded-lg" name="comment"
                                            id="comment_<?php echo e($item->product_id); ?>" rows="4"
                                            placeholder="Nhập bình luận của bạn..."><?php echo e(old('comment')); ?></textarea>
                                        <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_image_<?php echo e($item->product_id); ?>" class="font-weight-bold">Tải ảnh (tùy chọn):</label>
                                        <input type="file" name="product_image" id="product_image_<?php echo e($item->product_id); ?>" class="form-control-file">
                                        <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="my-4">
                                        <button type="submit" class="btn btn-primary w-100">Gửi đánh giá</button>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
</main>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            const productId = star.getAttribute('data-product-id');
            
            // Sự kiện khi hover chuột lên các sao
            star.addEventListener('mouseover', function() {
                const rating = star.getAttribute('data-value');
                highlightStars(productId, rating);
            });

            // Sự kiện khi click vào sao
            star.addEventListener('click', function() {
                const rating = star.getAttribute('data-value');
                const ratingInput = document.getElementById('rating_' + productId);
                ratingInput.value = rating; // Cập nhật giá trị vào input ẩn
                highlightStars(productId, rating, true); // Cập nhật sao đã chọn
            });

            // Khi người dùng rời chuột khỏi sao, reset lại các sao
            star.addEventListener('mouseout', function() {
                const ratingInput = document.getElementById('rating_' + productId).value;
                highlightStars(productId, ratingInput); // Highlight lại sao đã chọn
            });
        });

        // Hàm cập nhật màu sắc các sao
        function highlightStars(productId, rating, isClicked = false) {
            const stars = document.querySelectorAll(`#rating-stars-${productId} .star`);
            stars.forEach(star => {
                const starValue = star.getAttribute('data-value');
                if (starValue <= rating) {
                    star.classList.add('text-warning'); // Thêm màu vàng cho sao đã chọn
                } else {
                    star.classList.remove('text-warning'); // Loại bỏ màu vàng cho sao chưa chọn
                }
            });

            // Nếu người dùng click, giữ nguyên màu vàng
            if (isClicked) {
                return;
            }
        }
    });
</script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/user/reviews.blade.php ENDPATH**/ ?>