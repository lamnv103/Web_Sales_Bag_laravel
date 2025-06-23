
<?php $__env->startSection('content'); ?>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Quản lý đánh giá</h3>
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
                        <div class="text-tiny">Quản lý đánh giá</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Tìm kiếm đánh giá..." name="query"
                                    value="<?php echo e(request('query')); ?>" aria-required="true">
                            </fieldset>
                            <div class="button-submit">
                                <button type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php if(Session::has('status')): ?>
                        <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                    <?php endif; ?>
                    <?php if(Session::has('error')): ?>
                        <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Người dùng</th>
                                <th>Đánh giá</th>
                                <th>Ảnh</th>
                                <th>Ngày tạo</th>
                                <th>Duyệt</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-review-id="<?php echo e($review->id); ?>">
                                    <td><?php echo e($review->id); ?></td>
                                    <td>
                                        <a
                                            href="<?php echo e(route('admin.product.edit', $review->product->id)); ?>"><?php echo e($review->product->name); ?></a>
                                    </td>
                                    <td><?php echo e($review->user->name); ?></td>
                                    <td><?php echo e($review->rating); ?> sao - <?php echo e($review->comment); ?></td>
                                    <td>
                                        <?php if($review->image_path): ?>
                                            <img src="<?php echo e(asset('uploads/Comment')); ?>/<?php echo e($review->image_path); ?>"
                                                alt="Product Image" style="width: 50px;">
                                        <?php else: ?>
                                            Không có ảnh
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($review->created_at->format('d/m/Y')); ?></td>
                                    <td class="approval-status">
                                        <?php if($review->status == 'approved'): ?>
                                            Đã duyệt
                                        <?php else: ?>
                                            Chờ xác nhận
                                            <button class="btn btn-success btn-sm approve-btn">Duyệt</button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="list-icon-function">
                                            <form action="<?php echo e(route('admin.reviews.delete', $review->id)); ?>" method="POST"
                                                style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>



                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    <?php echo e($reviews->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Bạn có chắc không?",
                    text: "xóa một lần, bạn sẽ không thể khôi phục được dữ liệu này",
                    type: "Cảnh báo",
                    buttons: ["Không", "có"],
                    confirmButtonColor: '#dc3545'
                }).then(function(result) {
                    if (result) {
                        form.submit();
                    }
                });
            });
        });
        $(document).ready(function() {
            $('body').on('click', '.approve-btn', function(e) {
                e.preventDefault();

                var row = $(this).closest('tr');
                var reviewId = row.data('review-id');
                var approveButton = $(this);

                // Sửa URL cho đúng với định nghĩa route
                var url = '/admin/reviews/' + reviewId + '/approve'; // Cập nhật URL chính xác

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                    },
                    success: function(response) {
                        if (response.success) {
                            row.find('.approval-status').html('Đã duyệt');
                            approveButton.remove(); // Xóa nút duyệt
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Có lỗi xảy ra trong quá trình duyệt.');
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/reviews.blade.php ENDPATH**/ ?>