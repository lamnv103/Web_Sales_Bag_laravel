@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Phiếu giảm giá</h3>
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
                    <div class="text-tiny">Phiếu giảm giá</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." name="name" tabindex="2" required>
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.coupon.add') }}"><i
                        class="icon-plus"></i>Thêm mới</a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã số</th>
                                <th>Loại</th>
                                <th>Giá trị</th>
                                <th>Giá trị giỏ hàng</th>
                                <th>Ngày hết hạn</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)                 
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->type }}</td>
                                <td>{{ $coupon->value }}</td>
                                <td>${{ $coupon->cart_value }}</td>
                                <td>{{ $coupon->expiry_date }}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.coupon.edit',['id'=> $coupon->id] ) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.coupon.delete',['id'=> $coupon->id] ) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $coupons->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
                $(function(){
            $('.delete').on('click',function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Bạn có chắc không?",
                    text: "một lần xóa, bạn sẽ không thể khôi phục dữ liệu này",
                    type: "Cảnh báo",
                    buttons:["Không", "Có"],
                    confirmButtonColor:'#dc3545'
                }).then(function(result){
                    if(result){
                        form.submit();
                    }
                });
            });
        });
    </script>
    
@endpush
