
<?php $__env->startSection('content'); ?>
<style>
    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;
    }
</style>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chi tiết đơn hàng</h3>
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
                    <div class="text-tiny">Chi tiết đơn hàng</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <h5>Chi tiết đơn hàng</h5>
                </div>
                <a class="tf-button style-1 w208" href="<?php echo e(route('admin.orders')); ?>">Quay lại</a>
            </div>
            <div class="table-responsive">
                <?php if(Session::has('status')): ?>
                    <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                <?php endif; ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Đặt hàng ngay</th>
                        <td><?php echo e($order->id); ?></td>
                        <th>Di động</th>
                        <td><?php echo e($order->phone); ?></td>
                        <th>Mã bưu chính</th>
                        <td><?php echo e($order->zip); ?></td>
                    </tr>
                    <tr>
                        <th>Ngày đặt</th>
                        <td><?php echo e($order->created_at); ?></td>
                        <th>Ngày giao hàng</th>
                        <td><?php echo e($order->delivered_date); ?></td>
                        <th>Ngày hủy bỏ</th>
                        <td><?php echo e($order->canceled_date); ?></td>
                    </tr>
                    <tr>
                        <th>Tình trạng đơn hàng</th>
                        <td colspan="5"> 
                            <?php if($order->status == 'pending'): ?>
                                <span class="badge bg-secondary">Chờ xác nhận</span>
                            <?php elseif($order->status == 'confirmed'): ?>
                                <span class="badge bg-info">Đã xác nhận</span>
                            <?php elseif($order->status == 'shipping'): ?>
                                <span class="badge bg-primary">Đang giao hàng</span>
                            <?php elseif($order->status == 'delivered'): ?>
                                <span class="badge bg-success">Đã giao hàng</span>
                            <?php elseif($order->status == 'canceled'): ?>
                                <span class="badge bg-danger">Đã hủy</span>    
                            <?php else: ?>
                                <span class="badge bg-warning">Đã đặt hàng</span>                                
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <h5>Các mặt hàng đã đặt hàng</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Mã sản phẩm</th>
                            <th class="text-center">Danh mục</th>
                            <th class="text-center">Thương hiệu</th>
                            <th class="text-center">Tùy chọn</th>
                            <th class="text-center">Trạng thái trả về</th>
                            <th class="text-center">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="pname">
                                <div class="image">
                                    <img src="<?php echo e(asset('uploads/products/thumbnails/')); ?>/<?php echo e($item->product->image); ?>" alt="<?php echo e($item->product->name); ?>" class="image">
                                </div>
                                <div class="name">
                                    <a href="<?php echo e(route('shop.product.details', ['product_slug' => $item->product->slug])); ?>" target="_blank"
                                        class="body-title-2"><?php echo e($item->product->name); ?></a>
                                </div>
                            </td>
                            <td class="text-center">$<?php echo e($item->price); ?></td>
                            <td class="text-center"><?php echo e($item->quantity); ?></td>
                            <td class="text-center"><?php echo e($item->product->SKU); ?></td>
                            <td class="text-center"><?php echo e($item->product->category->name); ?></td>
                            <td class="text-center"><?php echo e($item->product->brand->name); ?></td>
                            <td class="text-center"><?php echo e($item->options); ?></td>
                            <td class="text-center"><?php echo e($item->rstatus == 0 ? "No":"Yes"); ?></td>
                            <td class="text-center">
                                <div class="list-icon-function view-icon">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">        
                <?php echo e($orderItems->links('pagination::bootstrap-5')); ?>

            </div>
        </div>

        <div class="wg-box mt-5">
            <h5>Địa chỉ giao hàng</h5>
            <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__detail">
                    <p><?php echo e($order->name); ?></p>
                    <p><?php echo e($order->address); ?></p>
                    <p><?php echo e($order->locality); ?></p>
                    <p><?php echo e($order->city); ?>, <?php echo e($order->country); ?></p>
                    <p><?php echo e($order->landmark); ?></p>
                    <p><?php echo e($order->zip); ?></p>
                    <br>
                    <p>Di động : <?php echo e($order->phone); ?></p>
                </div>
            </div>
        </div>

        <div class="wg-box mt-5">
            <h5>Giao dịch</h5>
            <table class="table table-striped table-bordered table-transaction">
                <tbody>
                    <tr>
                        <th>Tổng phụ</th>
                        <td>$<?php echo e($order->subtotal); ?></td>
                        <th>Tax</th>
                        <td>$<?php echo e($order->tax); ?></td>
                        <th>Giảm giá</th>
                        <td>$<?php echo e($order->discount); ?></td>
                    </tr>
                    <tr>
                        <th>Tổng cộng</th>
                        <td>$<?php echo e($order->total); ?></td>
                        <th>Phương thức thanh toán</th>
                        <td><?php echo e($transaction->mode); ?></td>
                        <th>Trạng thái</th>
                        <td>
                            <?php if($transaction->status == 'approved'): ?>
                                <span class="badge bg-success">Đã phê duyệt</span>
                            <?php elseif($transaction->status == 'declinded'): ?>
                                <span class="badge bg-danger">Đã bị từ chối</span>
                            <?php elseif($transaction->status == "refunded"): ?>
                                <span class="badge bg-seccondary">Refunded</span>
                            <?php else: ?>
                                <span class="badge bg-warning">Chưa giải quyết</span>                  
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="wg-box mt-5">
            <h5>Cập nhật trạng thái đơn hàng</h5>
            <form action="<?php echo e(route('admin.order.status.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <div class="seledt">
                            <select name="order_status" id="order_status">
                                <option value="pending" <?php echo e($order->status == 'pending' ? "selected" : ""); ?>>Chờ xác nhận</option>
                                <option value="confirmed" <?php echo e($order->status == 'confirmed' ? "selected" : ""); ?>>Đã xác nhận</option>
                                <option value="shipping" <?php echo e($order->status == 'shipping' ? "selected" : ""); ?>>Đang giao hàng</option>
                                <option value="delivered" <?php echo e($order->status == 'delivered' ? "selected" : ""); ?>>Đã giao hàng</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary tf-button w208">Cập nhật trạng thái</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/order-details.blade.php ENDPATH**/ ?>