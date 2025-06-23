@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Quản lý đánh giá</h3>
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
                        <div class="text-tiny">Quản lý đánh giá</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Tìm kiếm đánh giá..." name="query"
                                    value="{{ request('query') }}" aria-required="true">
                            </fieldset>
                            <div class="button-submit">
                                <button type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    @if (Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Người dùng</th>
                                <th>Đánh giá</th>
                                <th>Ảnh</th>
                                <th>Ngày tạo</th>
                                <th>Duyệt</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr data-review-id="{{ $review->id }}">
                                    <td>{{ $review->id }}</td>
                                    <td>
                                        <a
                                            href="{{ route('admin.product.edit', $review->product->id) }}">{{ $review->product->name }}</a>
                                    </td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->rating }} sao - {{ $review->comment }}</td>
                                    <td>
                                        @if ($review->image_path)
                                            <img src="{{ asset('uploads/Comment') }}/{{ $review->image_path }}"
                                                alt="Product Image" style="width: 50px;">
                                        @else
                                            Không có ảnh
                                        @endif
                                    </td>
                                    <td>{{ $review->created_at->format('d/m/Y') }}</td>
                                    <td class="approval-status">
                                        @if ($review->status == 'approved')
                                            Đã duyệt
                                        @else
                                            Chờ xác nhận
                                            <button class="btn btn-success btn-sm approve-btn">Duyệt</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="list-icon-function">
                                            <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST"
                                                style="display: inline-block;">
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



                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $reviews->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Bạn có chắc không?",
                    text: "xóa một lần, bạn sẽ không thể khôi phục được dữ liệu này",
                    type: "Cảnh báo",
                    buttons: ["Không", "có"],
                    confirmButtonColor: '#dc3545'
                }).then(function(result) {
                    if (result) {
                        form.submit();
                    }
                });
            });
        });
        $(document).ready(function() {
            $('body').on('click', '.approve-btn', function(e) {
                e.preventDefault();

                var row = $(this).closest('tr');
                var reviewId = row.data('review-id');
                var approveButton = $(this);

                // Sửa URL cho đúng với định nghĩa route
                var url = '/admin/reviews/' + reviewId + '/approve'; // Cập nhật URL chính xác

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            row.find('.approval-status').html('Đã duyệt');
                            approveButton.remove(); // Xóa nút duyệt
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Có lỗi xảy ra trong quá trình duyệt.');
                    }
                });
            });
        });
    </script>
@endpush
