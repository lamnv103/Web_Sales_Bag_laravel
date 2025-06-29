
<?php $__env->startSection('content'); ?>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Thương hiệu</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="<?php echo e(route('admin.index')); ?>}}">
                            <div class="text-tiny">Trang chủ</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Thương hiệu</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="<?php echo e(route('admin.brand.add')); ?>"><i
                            class="icon-plus"></i>Thêm mới</a>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <?php if(Session::has('status')): ?>
                            <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                        <?php endif; ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Slug</th>
                                    <th>Sản phẩm</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($brand->id); ?></td>
                                    <td class="pname">
                                        <div class="image">
                                            <img src="<?php echo e(asset('uploads/brands')); ?>/<?php echo e($brand->image); ?>" alt="<?php echo e($brand->name); ?>" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="#" class="body-title-2"><?php echo e($brand->name); ?></a>
                                        </div>
                                    </td>
                                    <td><?php echo e($brand->slug); ?></td>
                                    <td>
                                        <!-- Hiển thị số lượng sản phẩm -->
                                        <a href="<?php echo e(route('admin.brand.show', ['id' => $brand->id])); ?>" target="_blank">
                                            <?php echo e($brand->product_count); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.update.brand.count', ['id' => $brand->id])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="<?php echo e(route('admin.brand.edit',['id' => $brand->id])); ?>">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="<?php echo e(route('admin.brand.delete',['id'=> $brand->id])); ?>" method="POST">
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
                        <?php echo e($brands->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(function(){
            $('.delete').on('click',function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Bạn có chắc không?",
                    text: "Một lần xóa, bạn sẽ không thể khôi phục dữ liệu này",
                    type: "Cảnh báo",
                    buttons:["Không", "có"],
                    confirmButtonColor:'#dc3545'
                }).then(function(result){
                    if(result){
                        form.submit();
                    }
                });
            });
        });
    </script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/brands.blade.php ENDPATH**/ ?>