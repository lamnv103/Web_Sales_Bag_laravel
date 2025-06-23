@extends('layouts.app')
@section('content')

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
                    @include('user.account-nav')
                </div>

                <div class="col-lg-10">
                    <div class="wg-box">
                        <div class="flex items-center justify-between gap10 flex-wrap">
                            <div class="row">
                                <div class="col-6">
                                    <h5>Chi tiết đơn hàng</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-sm btn-danger" href="{{ route('user.orders') }}">Quay lại</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (Session::has('status'))
                                <p class="alert alert-success">{{ Session::get('status') }}</p>
                            @endif
                            <table class="table table-striped table-bordered table-transaction">
                                <tr>
                                    <th>Đặt hàng ngay</th>
                                    <td>{{ $order->id }}</td>
                                    <th>Di động</th>
                                    <td>{{ $order->phone }}</td>
                                    <th>Mã bưu chính</th>
                                    <td>{{ $order->zip }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày đặt</th>
                                    <td>{{ $order->created_at }}</td>
                                    <th>Ngày giao hàng</th>
                                    <td>{{ $order->delivered_date }}</td>
                                    <th>Ngày hủy bỏ</th>
                                    <td>{{ $order->canceled_date }}</td>
                                </tr>
                                <tr>
                                    <th>Tình trạng đơn hàng</th>
                                    <td colspan="5">
                                        @if ($order->status == 'pending')
                                            <span class="badge bg-secondary">Chờ xác nhận</span>
                                        @elseif ($order->status == 'confirmed')
                                            <span class="badge bg-info">Đã xác nhận</span>
                                        @elseif ($order->status == 'shipping')
                                            <span class="badge bg-primary">Đang giao hàng</span>
                                        @elseif ($order->status == 'delivered')
                                            <span class="badge bg-success">Đã giao hàng</span>
                                        @elseif ($order->status == 'canceled')
                                            <span class="badge bg-danger">Đã hủy</span>
                                        @else
                                            <span class="badge bg-warning">Đã đặt hàng</span>
                                        @endif
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
                                        @foreach ($orderItems as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="product-wrapper">
                                                        <div class="image">
                                                            <img src="{{ asset('uploads/products/thumbnails/') }}/{{ $item->product->image }}"
                                                                alt="{{ $item->product->name }}" class="image">
                                                        </div>
                                                        <div class="name">
                                                            <a href="{{ route('shop.product.details', ['product_slug' => $item->product->slug]) }}"
                                                                target="_blank"
                                                                class="body-title-2">{{ $item->product->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">${{ $item->price }}</td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-center">{{ $item->product->SKU }}</td>
                                                <td class="text-center">{{ $item->product->category->name }}</td>
                                                <td class="text-center">{{ $item->product->brand->name }}</td>
                                                <td class="text-center">{{ $item->options }}</td>
                                                <td class="text-center">{{ $item->rstatus == 0 ? 'No' : 'Yes' }}</td>
                                                <td class="text-center">
                                                    <div class="list-icon-function view-icon">
                                                        <div class="item eye">
                                                            <i class="icon-eye"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="divider"></div>
                            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                {{ $orderItems->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                        <div class="wg-box mt-5">
                            <div class="row">
                                <div class="col-6"><h5>Địa chỉ giao hàng</h5></div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-sm btn-danger" href="{{ route('user.address')}}">Chỉnh sửa</a>
                                </div>
                            </div>                            
                            <div class="my-account__address-item col-md-6">
                                <div class="my-account__address-item__detail">
                                    <p><b>Họ và tên:</b> {{ $order->name }}</p>
                                    <p><b>Số nhà, tên đường:</b> {{ $order->address }}</p>
                                    <p><b>Phường, xã:</b> {{ $order->locality }}</p>
                                    <p><b>Thành phố:</b> {{ $order->city }}, {{ $order->country }}</p>
                                    <p><b>Điểm mốc:</b> {{ $order->landmark }}</p>
                                    <p><b>Mã ZIP:</b> {{ $order->zip }}</p>
                                    <p><b>Di động:</b> {{ $order->phone }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="wg-box mt-5">
                            <h5>Giao dịch</h5>
                            <table class="table table-striped table-bordered table-transaction">
                                <tbody>
                                    <tr>
                                        <th>Tạm tính</th>
                                        <td>${{ $order->subtotal }}</td>
                                        <th>Tax</th>
                                        <td>${{ $order->tax }}</td>
                                        <th>Discount</th>
                                        <td>${{ $order->discount }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng cộng</th>
                                        <td>${{ $order->total }}</td>
                                        <th>Phương thức thanh toán</th>
                                        <td>{{ $transaction->mode }}</td>
                                        <th>Trạng thái</th>
                                        <td>
                                            @if ($transaction->status == 'approved')
                                                <span class="badge bg-success">Tán thành</span>
                                            @elseif ($transaction->status == 'declined')
                                                <span class="badge bg-danger">Từ chối</span>
                                            @elseif($transaction->status == 'refunded')
                                                <span class="badge bg-secondary">Đã hoàn lại</span>
                                            @else
                                                <span class="badge bg-warning">Chưa giải quyết</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        @if ($order->status == 'pending')
                            <div class="wg-box mt-5 text-right">
                                <form action="{{ route('user.order.cancel') }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="button" class="btn btn-danger cancel-order btn-lg"
                                        onclick="confirmCancelOrder(this)">
                                        <i class="fas fa-times-circle"></i> Hủy đơn hàng
                                    </button>
                                </form>
                            </div>
                        @elseif ($order->status == 'delivered')
                            <div class="wg-box mt-5 text-right">
                                <!-- Không sử dụng target="_blank" -->
                                @foreach ($products as $product)
                                <a href="{{ route('user.review.deliver', ['order_id' => $order->id]) }}"
                                    class="btn btn-primary btn-lg" 
                                    data-toggle="modal" data-target="#reviewModal"
                                    data-product-id="{{ $product->id }}" data-order-id="{{ $order->id }}"
                                    onclick="showSpinner(this)" style="background: black">
                                    <i class="fas fa-star"></i> Đánh giá sản phẩm
                                 </a>                                 
                                @endforeach
                            </div>
                        @endif



                    </div>
                </div>
        </section>
    </main>
@endsection

@push('scripts')
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
@endpush
