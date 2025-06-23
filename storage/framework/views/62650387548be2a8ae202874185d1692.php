
<?php $__env->startSection('content'); ?>
    <div class="main-content-inner">

    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số đơn hàng</div>
                                    <h4><?php echo e($dashboardDatas[0]->Total); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số tiền</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalAmount); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đang chờ xử lý</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalOrdered); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Số lượng đơn hàng đang chờ xử lý</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalOrderedAmount); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đã giao</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalDelivered); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Số lượng đơn hàng đã giao</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalDeliveredAmount); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đã hủy</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalCanceled); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Số lượng đơn hàng đã hủy</div>
                                    <h4><?php echo e($dashboardDatas[0]->TotalCanceledAmount); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Doanh thu hàng tháng</h5>
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Tổng cộng</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4><?php echo e($TotalAmount); ?></h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đang chờ xử lý</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4><?php echo e($TotalOrderedAmount); ?></h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đã giao hàng</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4><?php echo e($TotalDeliveredAmount); ?></h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đã hủy</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4><?php echo e($TotalCanceledAmount); ?></h4>
                        </div>
                    </div>

                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Đơn hàng gần đây</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route("admin.orders")); ?>">
                            <span class="view-all">Xem tất cả</span>
                        </a>
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
    
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Order Date</th>
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
                                        <?php if($order->status == 'delivered'): ?>
                                            <span class="badge bg-success">Đã giao hàng</span>
                                        <?php elseif($order->status == 'canceled'): ?>
                                            <span class="badge bg-danger">Đã hủy</span>
                                        <?php elseif($order->status == 'pending'): ?>
                                            <span class="badge bg-warning">Chờ xác nhận</span>
                                        <?php elseif($order->status == 'confirmed'): ?>
                                            <span class="badge bg-primary">Đã xác nhận</span>
                                        <?php elseif($order->status == 'shipping'): ?>
                                            <span class="badge bg-info">Đang giao hàng</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Trạng thái không xác định</span>
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
            </div>

        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    (function($) {

        var tfLineChart = (function() {

            var chartBar = function() {

                var options = {
                    series: [{
                            name: 'Total',
                            data: [<?php echo e($AmountM); ?>]
                        }, {
                            name: 'Pending',
                            data: [<?php echo e($OrderedAmountM); ?>]
                        },
                        {
                            name: 'Delivered',
                            data: [<?php echo e($DeliveredAmountM); ?>]
                        }, {
                            name: 'Canceled',
                            data: [<?php echo e($CanceledAmountM); ?>]
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 325,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '10px',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false,
                    },
                    colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                    stroke: {
                        show: false,
                    },
                    xaxis: {
                        labels: {
                            style: {
                                colors: '#212529',
                            },
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct', 'Nov', 'Dec'],
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "$ " + val + ""
                            }
                        }
                    }
                };

                chart = new ApexCharts(
                    document.querySelector("#line-chart-8"),
                    options
                );
                if ($("#line-chart-8").length > 0) {
                    chart.render();
                }
            };

            /* Function ============ */
            return {
                init: function() {},

                load: function() {
                    chartBar();
                },
                resize: function() {},
            };
        })();

        jQuery(document).ready(function() {});

        jQuery(window).on("load", function() {
            tfLineChart.load();
        });

        jQuery(window).on("resize", function() {});
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/admin/index.blade.php ENDPATH**/ ?>