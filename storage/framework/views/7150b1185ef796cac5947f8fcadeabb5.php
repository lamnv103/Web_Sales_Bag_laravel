
<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Users</h3>
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
                    <div class="text-tiny">Tất cả người dùng</div>
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
                
            </div>
            <div class="wg-table table-all-user">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Người dùng</th>
                                <th>Điện thoại</th>
                                <th>E-mail</th>
                                <th class="text-center">Tổng số đơn hàng</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td class="pname">
                                    <div class="image">
                                        <img src="<?php echo e(asset($user->image)); ?>" alt="User Avatar">
                                    </div>
                                    <div class="name">
                                        <a href="#" class="body-title-2"><?php echo e($user->name); ?></a>
                                        <div class="text-tiny mt-3"><?php echo e($user->utype === 'ADM' ? 'Admin' : 'User/Customer'); ?></div>
                                    </div>
                                </td>
                                <td><?php echo e($user->mobile); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td class="text-center"><a href="#" target="_blank"><?php echo e($user->total_spent); ?></a></td>
                                <td>
                                    <div class="list-icon-function">
                                        <form action="<?php echo e(route('admin.users.delete', ['id' =>$user->id])); ?>" method="POST">
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

            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                <?php echo e($users->links('pagination::bootstrap-5')); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/users.blade.php ENDPATH**/ ?>