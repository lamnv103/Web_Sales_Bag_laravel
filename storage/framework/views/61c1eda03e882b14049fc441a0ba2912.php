<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Bag Luxury')); ?></title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="surfside media" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/animation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('icon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('font/fonts.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo1.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('images/logo1.png')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sweetalert.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
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
                    
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Trang chủ chính</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="<?php echo e(route('admin.index')); ?>" class="">
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
                                            <a href="<?php echo e(route('admin.product.add')); ?>" class="">
                                                <div class="text">Thêm sản phẩm</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="<?php echo e(route('admin.products')); ?>" class="">
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
                                            <a href="<?php echo e(route('admin.brand.add')); ?>" class="">
                                                <div class="text">Thương hiệu mới</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="<?php echo e(route('admin.brands')); ?>" class="">
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
                                            <a href="<?php echo e(route('admin.category.add')); ?>" class="">
                                                <div class="text">Danh mục mới</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="<?php echo e(route('admin.categories')); ?>" class="">
                                                <div class="text">Danh mục</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item ">
                                        <a href="<?php echo e(route('admin.orders')); ?>" class="">
                                            <div class="icon"><i class="icon-file-plus"></i></div>
                                            <div class="text">Đơn hàng</div>
                                        </a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?php echo e(route('admin.reviews')); ?>" class="">
                                        <div class="icon"><i class="icon-file-plus"></i></div>
                                        <div class="text">Reviews</div>
                                    </a>
                            </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('admin.slides')); ?>" class="">
                                        <div class="icon"><i class="icon-image"></i></div>
                                        <div class="text">Trang trình bày</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('admin.contacts')); ?>" class="">
                                        <div class="icon"><i class="icon-mail"></i></div>
                                        <div class="text">Tin nhắn</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo e(route('admin.coupons')); ?>" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Phiếu giảm giá</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="<?php echo e(route('admin.users')); ?>" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">Người sử dụng</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="<?php echo e(route('home.index')); ?>" class="">
                                        <div class="icon"><i class="icon-home"></i></div> <!-- Sử dụng lớp Font Awesome cho biểu tượng ngôi nhà -->
                                        <div class="text">Trang người dùng</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form">
                                        <?php echo csrf_field(); ?>
                                        <a href="<?php echo e(route('logout')); ?>" class=""
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
                                           href="<?php echo e(route('admin.contacts')); ?>" 
                                           target="_blank">
                                            <span class="header-item">
                                                <i class="icon-bell"></i>
                                                
                                                <?php if(App\Models\Contact::count() > 0): ?>  <!-- Kiểm tra nếu có liên hệ trong cơ sở dữ liệu -->
                                                    <span class="text-tiny">
                                                        <?php echo e(App\Models\Contact::count()); ?>  <!-- Hiển thị số lượng liên hệ -->
                                                    </span>
                                                <?php endif; ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>                                
                                

                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php
                                                $user = Auth::user(); // Lấy thông tin người dùng hiện tại
                                            ?>
                                            <?php if($user): ?>
                                                <span class="header-user wg-user">
                                                    <span class="image">
                                                        <!-- Kiểm tra xem ảnh có tồn tại không, nếu không thì sử dụng ảnh mặc định -->
                                                        <img src="<?php echo e(asset($user->image)); ?>" alt="User Avatar">
                                                    </span>
                                                    <span class="flex flex-column">
                                                        <span class="body-title mb-2"><?php echo e($user->name); ?></span>
                                                        <span class="text-tiny">Admin</span>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                                                        
                                

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <?php echo $__env->yieldContent('content'); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/apexcharts/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script>
        $(function() {
            $("#search-input").on("keyup", function() {
                var searchQuery = $(this).val();
                if (searchQuery.length > 2) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo e(route('admin.search')); ?>",
                        data: {
                            query: searchQuery
                        },
                        dataType: "json",
                        success: function(data) {
                            $("#box-content-search").html('');
                            $.each(data, function(index, item) {
                                var url =
                                    "<?php echo e(route('admin.product.edit', ['id' => 'product_id'])); ?>";
                                var link = url.replace('product_id', item.id);
                                $("#box-content-search").append(`
                                    <li>
                                        <ul>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="<?php echo e(asset('uploads/products/thumbnails')); ?>/${item.image}" alt="${item.name}">
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
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/layouts/admin.blade.php ENDPATH**/ ?>