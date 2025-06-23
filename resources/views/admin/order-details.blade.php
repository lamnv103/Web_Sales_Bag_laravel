@extends('layouts.admin')
@section('content')
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
                    <a href="{{ route('admin.index') }}">
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
                <a class="tf-button style-1 w208" href="{{ route('admin.orders') }}">Quay lại</a>
            </div>
            <div class="table-responsive">
                @if (Session::has('status'))
                    <p class="alert alert-success">{{ Session::get('status') }}</p>
                @endif
                <table class="table table-striped table-bordered">
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
                        @foreach ($orderItems as $item)
                        <tr>
                            <td class="pname">
                                <div class="image">
                                    <img src="{{ asset('uploads/products/thumbnails/') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}" class="image">
                                </div>
                                <div class="name">
                                    <a href="{{ route('shop.product.details', ['product_slug' => $item->product->slug]) }}" target="_blank"
                                        class="body-title-2">{{ $item->product->name }}</a>
                                </div>
                            </td>
                            <td class="text-center">${{ $item->price }}</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-center">{{ $item->product->SKU }}</td>
                            <td class="text-center">{{ $item->product->category->name }}</td>
                            <td class="text-center">{{ $item->product->brand->name }}</td>
                            <td class="text-center">{{ $item->options }}</td>
                            <td class="text-center">{{ $item->rstatus == 0 ? "No":"Yes"}}</td>
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
            <h5>Địa chỉ giao hàng</h5>
            <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__detail">
                    <p>{{ $order->name }}</p>
                    <p>{{ $order->address }}</p>
                    <p>{{ $order->locality }}</p>
                    <p>{{ $order->city }}, {{ $order->country }}</p>
                    <p>{{ $order->landmark }}</p>
                    <p>{{ $order->zip }}</p>
                    <br>
                    <p>Di động : {{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <div class="wg-box mt-5">
            <h5>Giao dịch</h5>
            <table class="table table-striped table-bordered table-transaction">
                <tbody>
                    <tr>
                        <th>Tổng phụ</th>
                        <td>${{ $order->subtotal }}</td>
                        <th>Tax</th>
                        <td>${{ $order->tax }}</td>
                        <th>Giảm giá</th>
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
                                <span class="badge bg-success">Đã phê duyệt</span>
                            @elseif ($transaction->status == 'declinded')
                                <span class="badge bg-danger">Đã bị từ chối</span>
                            @elseif($transaction->status == "refunded")
                                <span class="badge bg-seccondary">Refunded</span>
                            @else
                                <span class="badge bg-warning">Chưa giải quyết</span>                  
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="wg-box mt-5">
            <h5>Cập nhật trạng thái đơn hàng</h5>
            <form action="{{ route('admin.order.status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="seledt">
                            <select name="order_status" id="order_status">
                                <option value="pending" {{ $order->status == 'pending' ? "selected" : "" }}>Chờ xác nhận</option>
                                <option value="confirmed" {{ $order->status == 'confirmed' ? "selected" : "" }}>Đã xác nhận</option>
                                <option value="shipping" {{ $order->status == 'shipping' ? "selected" : "" }}>Đang giao hàng</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? "selected" : "" }}>Đã giao hàng</option>
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
@endsection