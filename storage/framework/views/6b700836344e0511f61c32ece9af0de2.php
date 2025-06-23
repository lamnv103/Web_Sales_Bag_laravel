
<?php $__env->startSection('content'); ?>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Tất cả sản phẩm</h3>
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
                        <div class="text-tiny">Tất cả sản phẩm</div>
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
                    <a class="tf-button style-1 w208" href="<?php echo e(route('admin.product.add')); ?>"><i
                            class="icon-plus"></i>Thêm mới</a>
                </div>
                <div class="table-responsive">
                    <?php if(Session::has('status')): ?>
                        <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                    <?php endif; ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Giá bán</th>
                                <th>Mã sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Nổi bật</th>
                                <th>Kho</th>
                                <th>Số lượng</th>
                                <th>Hoạt dộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->id); ?></td>
                                <td class="name">
                                    <div class="image">
                                        <img src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="#" class="body-title-2"><?php echo e($product->name); ?></a>
                                        <div class="text-tiny mt-3"><?php echo e($product->slug); ?></div>
                                    </div>
                                </td>
                                <td><?php echo e($product->regular_price); ?></td>
                                <td><?php echo e($product->sale_price); ?></td>
                                <td><?php echo e($product->SKU); ?></td>
                                <td><?php echo e($product->category->name); ?></td>
                                <td><?php echo e($product->brand->name); ?></td>
                                <td><?php echo e($product->featured == 0 ? "No":"Yes"); ?></td>
                                <td><?php echo e($product->stock_status); ?></td>
                                <td><?php echo e($product->quantity); ?></td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="#" target="_blank">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </a>
                                        <a href="<?php echo e(route('admin.product.edit',['id' =>$product->id])); ?>">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="<?php echo e(route('admin.product.delete', ['id' =>$product->id])); ?>" method="POST">
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

                    <?php echo e($products->links('pagination::bootstrap-5')); ?>

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
                text: "xóa một lần, bạn sẽ không thể khôi phục được dữ liệu này",
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/products.blade.php ENDPATH**/ ?>