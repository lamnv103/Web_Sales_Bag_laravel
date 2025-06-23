
<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Đơn hàng</h3>
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
                    <div class="text-tiny">Đơn hàng</div>
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
                                <th style="width:70px">Số đơn hàng</th>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Điện thoại</th>
                                <th class="text-center">Tổng phụ</th>
                                <th class="text-center">Thuế</th>
                                <th class="text-center">Tổng cộng</th>
                                <th class="text-center">Trạng hái</th>
                                <th class="text-center">Ngày đặt hàng</th>
                                <th class="text-center">Tổng số mặt hàng</th>
                                <th class="text-center">Đã giao hàng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($order->id); ?></td>
                                <td class="text-center"><?php echo e($order->name); ?></td>
                                <td class="text-center"><?php echo e($order->phone); ?></td>
                                <td class="text-center">$<?php echo e($order->subtotal); ?></td>
                                <td class="text-center">$<?php echo e($order->tax); ?></td>
                                <td class="text-center">$<?php echo e($order->total); ?></td>
                                <td class="text-center">
                                    <?php if($order->status == 'pending'): ?>
                                        <span class="badge bg-info">Chờ xác nhận</span>
                                    <?php elseif($order->status == 'confirmed'): ?>
                                        <span class="badge bg-primary">Đã xác nhận</span>
                                    <?php elseif($order->status == 'shipping'): ?>
                                        <span class="badge bg-warning">Đang giao hàng</span>
                                    <?php elseif($order->status == 'delivered'): ?>
                                        <span class="badge bg-success">Đã giao hàng</span>
                                    <?php elseif($order->status == 'canceled'): ?>
                                        <span class="badge bg-danger">Đã hủy</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Chưa rõ</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center"><?php echo e($order->created_at); ?></td>
                                <td class="text-center"><?php echo e($order->orderItems->count()); ?></td>
                                <td class="text-center"><?php echo e($order->delivered_date); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('admin.order.details',['order_id' => $order->id])); ?>">
                                        <div class="list-icon-function view-icon">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>                        
                    </table>
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                <?php echo e($orders->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/orders.blade.php ENDPATH**/ ?>