@extends('layouts.app')

@section('content')

    <head>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- FontAwesome Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            .table> :not(caption)>tr>th {
                padding: 0.625rem 1.5rem .625rem !important;
                background-color: #6a6e51 !important;
            }

            .table> :not(caption)>tr>td {
                padding: 0.625rem 1.5rem .625rem !important;
            }

            .table-bordered> :not(caption)>tr>th,
            .table-bordered> :not(caption)>tr>td {
                border-width: 1px 1px;
                border-color: #6a6e51;
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

            .rating-stars i {
    font-size: 24px;
    color: #575552;  /* Màu mặc định */
    cursor: pointer;
    transition: color 0.3s;
}

.rating-stars i.selected {
    color: #ff9900;  /* Màu khi chọn */
}

.rating-stars i.locked {
    cursor: default;  /* Không thể click vào sao đã đánh giá */
}

.rating-stars i.hover {
    color: #ffd700;  /* Màu khi hover */
}

        </style>
    </head>

    <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Đơn hàng</h2> 
        <div class="row">
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>

            <div class="col-lg-10" style="border: 2px solid #ccc;">
                <div class="review-form">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h3 class="mb-5">Đánh giá sản phẩm trong đơn hàng</h3>

                    @foreach ($orderItems as $item)
                        <div class="border p-4 mb-4">
                            <h5>Sản phẩm: {{ $item->product->name }}</h5>

                            @if ($item->reviewed)
                                <!-- Nếu sản phẩm đã được đánh giá -->
                                <p class="text-success">Sản phẩm này đã được đánh giá</p>
                            @else
                                <!-- Nếu sản phẩm chưa được đánh giá -->
                                <form action="{{ route('user.review.store') }}" method="POST"
                                    enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                    <input type="hidden" name="order_id" value="{{ $orderId }}">

                                    <div id="rating-stars-{{ $item->product_id }}" class="rating-stars d-flex justify-content-center my-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star star" data-value="{{ $i }}" data-product-id="{{ $item->product_id }}"
                                                title="Đánh giá {{ $i }} sao"></i>
                                        @endfor
                                    </div>

                                    <input type="hidden" name="rating" id="rating_{{ $item->product_id }}" value="0">
                                    @error('rating')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="comment_{{ $item->product_id }}" class="font-weight-bold">Bình luận:</label>
                                        <textarea class="form-control border-primary rounded-lg" name="comment"
                                            id="comment_{{ $item->product_id }}" rows="4"
                                            placeholder="Nhập bình luận của bạn...">{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="product_image_{{ $item->product_id }}" class="font-weight-bold">Tải ảnh (tùy chọn):</label>
                                        <input type="file" name="product_image" id="product_image_{{ $item->product_id }}" class="form-control-file">
                                        @error('product_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="my-4">
                                        <button type="submit" class="btn btn-primary w-100">Gửi đánh giá</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            const productId = star.getAttribute('data-product-id');
            
            // Sự kiện khi hover chuột lên các sao
            star.addEventListener('mouseover', function() {
                const rating = star.getAttribute('data-value');
                highlightStars(productId, rating);
            });

            // Sự kiện khi click vào sao
            star.addEventListener('click', function() {
                const rating = star.getAttribute('data-value');
                const ratingInput = document.getElementById('rating_' + productId);
                ratingInput.value = rating; // Cập nhật giá trị vào input ẩn
                highlightStars(productId, rating, true); // Cập nhật sao đã chọn
            });

            // Khi người dùng rời chuột khỏi sao, reset lại các sao
            star.addEventListener('mouseout', function() {
                const ratingInput = document.getElementById('rating_' + productId).value;
                highlightStars(productId, ratingInput); // Highlight lại sao đã chọn
            });
        });

        // Hàm cập nhật màu sắc các sao
        function highlightStars(productId, rating, isClicked = false) {
            const stars = document.querySelectorAll(`#rating-stars-${productId} .star`);
            stars.forEach(star => {
                const starValue = star.getAttribute('data-value');
                if (starValue <= rating) {
                    star.classList.add('text-warning'); // Thêm màu vàng cho sao đã chọn
                } else {
                    star.classList.remove('text-warning'); // Loại bỏ màu vàng cho sao chưa chọn
                }
            });

            // Nếu người dùng click, giữ nguyên màu vàng
            if (isClicked) {
                return;
            }
        }
    });
</script>

