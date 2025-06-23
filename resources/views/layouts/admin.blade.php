<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bag Luxury') }}</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="surfside media" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo1.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/logo1.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    @stack('styles')
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

                <div class="section-menu-left">
                    {{-- <div class="box-logo">
                        <a href="{{ route('admin.index') }}" id="site-logo-inner">
                            <img class="" id="logo_header1" alt=""
                                src="{{ asset('assets/images/logo1.png') }}"
                                data-light="{{ asset('assets/images/logo1.png') }}"
                                data-dark="{{ asset('assets/images/logo1.png') }}">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div> --}}
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Trang chủ chính</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.index') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Trang chủ</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Sản phẩm</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.product.add') }}" class="">
                                                <div class="text">Thêm sản phẩm</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.products') }}" class="">
                                                <div class="text">Sản phẩm</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Thương hiệu</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.brand.add') }}" class="">
                                                <div class="text">Thương hiệu mới</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.brands') }}" class="">
                                                <div class="text">Thương hiệu</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Danh mục</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.category.add') }}" class="">
                                                <div class="text">Danh mục mới</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.categories') }}" class="">
                                                <div class="text">Danh mục</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item ">
                                        <a href="{{ route('admin.orders') }}" class="">
                                            <div class="icon"><i class="icon-file-plus"></i></div>
                                            <div class="text">Đơn hàng</div>
                                        </a>
                                </li>
                                <li class="menu-item ">
                                    <a href="{{ route('admin.reviews') }}" class="">
                                        <div class="icon"><i class="icon-file-plus"></i></div>
                                        <div class="text">Reviews</div>
                                    </a>
                            </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.slides') }}" class="">
                                        <div class="icon"><i class="icon-image"></i></div>
                                        <div class="text">Trang trình bày</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.contacts') }}" class="">
                                        <div class="icon"><i class="icon-mail"></i></div>
                                        <div class="text">Tin nhắn</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.coupons') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Phiếu giảm giá</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('admin.users') }}" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">Người sử dụng</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('home.index') }}" class="">
                                        <div class="icon"><i class="icon-home"></i></div> <!-- Sử dụng lớp Font Awesome cho biểu tượng ngôi nhà -->
                                        <div class="text">Trang người dùng</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <a href="{{ route('logout') }}" class=""
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <div class="icon"><i class="icon-log-out"></i></div>
                                            <div class="text">Đăng xuất</div>
                                        </a>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt=""
                                        src="images/logo/logo.png" data-light="images/logo/logo.png"
                                        data-dark="images/logo/logo.png" data-width="154px" data-height="52px"
                                        data-retina="images/logo/logo.png">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search"
                                            name="name" id="search-input" tabindex="2" value="" aria-required="true"
                                            required="" autocomplete="off">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search" >
                                        <ul  id="box-content-search"> 
                                        </ul>
                                    </div>
                                </form>

                            </div>
                            <div class="header-grid">

                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" 
                                           href="{{ route('admin.contacts') }}" 
                                           target="_blank">
                                            <span class="header-item">
                                                <i class="icon-bell"></i>
                                                
                                                @if (App\Models\Contact::count() > 0)  <!-- Kiểm tra nếu có liên hệ trong cơ sở dữ liệu -->
                                                    <span class="text-tiny">
                                                        {{ App\Models\Contact::count() }}  <!-- Hiển thị số lượng liên hệ -->
                                                    </span>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                </div>                                
                                

                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            @php
                                                $user = Auth::user(); // Lấy thông tin người dùng hiện tại
                                            @endphp
                                            @if($user)
                                                <span class="header-user wg-user">
                                                    <span class="image">
                                                        <!-- Kiểm tra xem ảnh có tồn tại không, nếu không thì sử dụng ảnh mặc định -->
                                                        <img src="{{ asset($user->image) }}" alt="User Avatar">
                                                    </span>
                                                    <span class="flex flex-column">
                                                        <span class="body-title mb-2">{{ $user->name }}</span>
                                                        <span class="text-tiny">Admin</span>
                                                    </span>
                                                </span>
                                            @endif
                                        </button>
                                    </div>
                                </div>
                                                        
                                

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        @yield('content')

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(function() {
            $("#search-input").on("keyup", function() {
                var searchQuery = $(this).val();
                if (searchQuery.length > 2) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.search') }}",
                        data: {
                            query: searchQuery
                        },
                        dataType: "json",
                        success: function(data) {
                            $("#box-content-search").html('');
                            $.each(data, function(index, item) {
                                var url =
                                    "{{ route('admin.product.edit', ['id' => 'product_id']) }}";
                                var link = url.replace('product_id', item.id);
                                $("#box-content-search").append(`
                                    <li>
                                        <ul>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="{{ asset('uploads/products/thumbnails') }}/${item.image}" alt="${item.name}">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="${link}" class="body-text">${item.name}</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                        </ul>
                                    </li>
                                `);
                            });
                        }
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
