
<?php $__env->startSection('content'); ?>

    <head>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- FontAwesome Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            .pt-90 {
                padding-top: 90px !important;
            }

            .pr-6px {
                padding-right: 6px;
                text-transform: uppercase;
            }

            .my-account .page-title {
                font-size: 1.5rem;
                font-weight: 700;
                text-transform: uppercase;
                margin-bottom: 40px;
                border-bottom: 1px solid;
                padding-bottom: 13px;
            }

            .my-account .wg-box {
                display: -webkit-box;
                display: -moz-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                padding: 24px;
                flex-direction: column;
                gap: 24px;
                border-radius: 12px;
                background: var(--White);
                box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
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

            .table-transaction>tbody>tr:nth-of-type(odd) {
                --bs-table-accent-bg: #fff !important;

            }

            .table-transaction th,
            .table-transaction td {
                padding: 0.625rem 1.5rem .25rem !important;
                color: #000 !important;
            }

            .table> :not(caption)>tr>th {
                padding: 0.625rem 1.5rem .25rem !important;
                background-color: #6a6e51 !important;
            }

            .table-bordered>:not(caption)>*>* {
                border-width: inherit;
                line-height: 32px;
                font-size: 14px;
                border: 1px solid #e1e1e1;
                vertical-align: middle;
            }

            .table-striped .image {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50px;
                height: 50px;
                flex-shrink: 0;
                border-radius: 10px;
                overflow: hidden;
            }

            .table-striped td:nth-child(1) {
                min-width: 250px;
                padding-bottom: 7px;
            }

            .pname {
                display: flex;
                gap: 13px;
            }

            .table-bordered> :not(caption)>tr>th,
            .table-bordered> :not(caption)>tr>td {
                border-width: 1px 1px;
                border-color: #6a6e51;
            }

            .product-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .product-wrapper .image {
                margin-bottom: 10px;
                /* Thêm khoảng cách giữa ảnh và tên */
            }

            .product-wrapper .name {
                text-align: center;
                font-size: 16px;
                /* Điều chỉnh kích thước chữ */
                font-weight: bold;
                /* Tăng độ đậm nếu cần */
            }
        </style>
    </head>

    <main class="pt-90" style="padding-top: 0px;">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Chi tiết đơn hàng</h2>
            <div class="row">
                <div class="col-lg-2">
                    <?php echo $__env->make('user.account-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-10">
                    <div class="wg-box">
                        <div class="flex items-center justify-between gap10 flex-wrap">
                            <div class="row">
                                <div class="col-6">
                                    <h5>Chi tiết đơn hàng</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-sm btn-danger" href="<?php echo e(route('user.orders')); ?>">Quay lại</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <?php if(Session::has('status')): ?>
                                <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                            <?php endif; ?>
                            <table class="table table-striped table-bordered table-transaction">
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
                        </div>

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
                                            <th class="text-center">Tên</th>
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
                                                <td class="text-center">
                                                    <div class="product-wrapper">
                                                        <div class="image">
                                                            <img src="<?php echo e(asset('uploads/products/thumbnails/')); ?>/<?php echo e($item->product->image); ?>"
                                                                alt="<?php echo e($item->product->name); ?>" class="image">
                                                        </div>
                                                        <div class="name">
                                                            <a href="<?php echo e(route('shop.product.details', ['product_slug' => $item->product->slug])); ?>"
                                                                target="_blank"
                                                                class="body-title-2"><?php echo e($item->product->name); ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">$<?php echo e($item->price); ?></td>
                                                <td class="text-center"><?php echo e($item->quantity); ?></td>
                                                <td class="text-center"><?php echo e($item->product->SKU); ?></td>
                                                <td class="text-center"><?php echo e($item->product->category->name); ?></td>
                                                <td class="text-center"><?php echo e($item->product->brand->name); ?></td>
                                                <td class="text-center"><?php echo e($item->options); ?></td>
                                                <td class="text-center"><?php echo e($item->rstatus == 0 ? 'No' : 'Yes'); ?></td>
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
                            <div class="row">
                                <div class="col-6"><h5>Địa chỉ giao hàng</h5></div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-sm btn-danger" href="<?php echo e(route('user.address')); ?>">Chỉnh sửa</a>
                                </div>
                            </div>                            
                            <div class="my-account__address-item col-md-6">
                                <div class="my-account__address-item__detail">
                                    <p><b>Họ và tên:</b> <?php echo e($order->name); ?></p>
                                    <p><b>Số nhà, tên đường:</b> <?php echo e($order->address); ?></p>
                                    <p><b>Phường, xã:</b> <?php echo e($order->locality); ?></p>
                                    <p><b>Thành phố:</b> <?php echo e($order->city); ?>, <?php echo e($order->country); ?></p>
                                    <p><b>Điểm mốc:</b> <?php echo e($order->landmark); ?></p>
                                    <p><b>Mã ZIP:</b> <?php echo e($order->zip); ?></p>
                                    <p><b>Di động:</b> <?php echo e($order->phone); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="wg-box mt-5">
                            <h5>Giao dịch</h5>
                            <table class="table table-striped table-bordered table-transaction">
                                <tbody>
                                    <tr>
                                        <th>Tạm tính</th>
                                        <td>$<?php echo e($order->subtotal); ?></td>
                                        <th>Tax</th>
                                        <td>$<?php echo e($order->tax); ?></td>
                                        <th>Discount</th>
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
                                                <span class="badge bg-success">Tán thành</span>
                                            <?php elseif($transaction->status == 'declined'): ?>
                                                <span class="badge bg-danger">Từ chối</span>
                                            <?php elseif($transaction->status == 'refunded'): ?>
                                                <span class="badge bg-secondary">Đã hoàn lại</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">Chưa giải quyết</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php if($order->status == 'pending'): ?>
                            <div class="wg-box mt-5 text-right">
                                <form action="<?php echo e(route('user.order.cancel')); ?>" method="POST"
                                    style="display: inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                    <button type="button" class="btn btn-danger cancel-order btn-lg"
                                        onclick="confirmCancelOrder(this)">
                                        <i class="fas fa-times-circle"></i> Hủy đơn hàng
                                    </button>
                                </form>
                            </div>
                        <?php elseif($order->status == 'delivered'): ?>
                            <div class="wg-box mt-5 text-right">
                                <!-- Không sử dụng target="_blank" -->
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('user.review.deliver', ['order_id' => $order->id])); ?>"
                                    class="btn btn-primary btn-lg" 
                                    data-toggle="modal" data-target="#reviewModal"
                                    data-product-id="<?php echo e($product->id); ?>" data-order-id="<?php echo e($order->id); ?>"
                                    onclick="showSpinner(this)" style="background: black">
                                    <i class="fas fa-star"></i> Đánh giá sản phẩm
                                 </a>                                 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>



                    </div>
                </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(function() {
            $('.cancel-order').on('click', function(e) {
                e.preventDefault(); // Ngăn form submit
                var form = $(this).closest('form'); // Tìm form gần nhất
                swal({
                    title: "Bạn có chắc không?",
                    text: "Sau khi hủy, bạn sẽ không thể khôi phục dữ liệu này.",
                    type: "cảnh báo",
                    buttons: ["Không ", "Có "],
                    confirmButtonColor: '#dc3545'
                }).then(function(result) {
                    if (result) {
                        swal("Đang xử lý...", "Yêu cầu của bạn đang được xử lý.", "thông tin");
                        form.submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/user/order-details.blade.php ENDPATH**/ ?>