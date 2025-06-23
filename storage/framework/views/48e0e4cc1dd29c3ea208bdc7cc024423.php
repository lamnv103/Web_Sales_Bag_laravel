
<?php $__env->startSection('content'); ?>
<style>
    .filled-heart {
    color: orange !important;
}
.review-avatar {
    width: 40px; /* Chỉnh sửa kích thước avatar */
    height: 40px;
    border-radius: 50%;
}

.review-star {
    width: 16px;
    height: 16px;
    margin-right: 2px;
}

.review-image img {
    max-width: 100%;
    height: auto;
    margin-top: 10px; /* Thêm khoảng cách cho ảnh */
}

</style>
    <main class="pt-90">
        <div class="mb-md-1 pb-md-3"></div>
        <section class="product-single container">
        <div class="row">
            <div class="col-lg-7">
            <div class="product-single__media" data-media-type="vertical-thumbnail">
                <div class="product-single__image">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                    <div class="swiper-slide product-single__image-item">
                        <img loading="lazy" class="h-auto" src="<?php echo e(asset('uploads/products')); ?>/<?php echo e($product->image); ?>" width="674"
                        height="674" alt="" />
                        <a data-fancybox="gallery" href="<?php echo e(asset('uploads/products')); ?>/<?php echo e($product->image); ?>" data-bs-toggle="tooltip"
                        data-bs-placement="left" title="Zoom">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_zoom" />
                        </svg>
                        </a>
                    </div>

                    <?php $__currentLoopData = explode(',',$product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide product-single__image-item">
                        <img loading="lazy" class="h-auto" src="<?php echo e(asset('uploads/products')); ?>/<?php echo e($gimg); ?>" width="674"
                        height="674" alt="" />
                        <a data-fancybox="gallery" href="<?php echo e(asset('uploads/products')); ?>/<?php echo e($gimg); ?>" data-bs-toggle="tooltip"
                        data-bs-placement="left" title="Zoom">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_zoom" />
                        </svg>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                    <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_prev_sm" />
                    </svg></div>
                    <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_next_sm" />
                    </svg></div>
                </div>
                </div>
                <div class="product-single__thumbnail">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto"
                          src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($product->image); ?>" width="104" height="104" alt="" /></div>
                    <?php $__currentLoopData = explode(',',$product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto"
                        src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($gimg); ?>" width="104" height="104" alt="" /></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-5">
            <div class="d-flex justify-content-between mb-4 pb-md-2">
                <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
                <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Cửa hàng</a>
                </div><!-- /.breadcrumb -->

                <div
                class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                <a href="#" class="text-uppercase fw-medium"><svg width="10" height="10" viewBox="0 0 25 25"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_prev_md" />
                    </svg><span class="menu-link menu-link_us-s">Trước đó</span></a>
                <a href="#" class="text-uppercase fw-medium"><span class="menu-link menu-link_us-s">Kế tiếp</span><svg
                    width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_next_md" />
                    </svg></a>
                </div><!-- /.shop-acs -->
            </div>
            <h1 class="product-single__name"><?php echo e($product->name); ?></h1>
            <div class="product-single__rating">
                <div class="reviews-group d-flex">
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                </svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                </svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                </svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                </svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                </svg>
                </div>
                <span class="reviews-note text-lowercase text-secondary ms-1">8k+ đánh giá</span>
            </div>
            <div class="product-single__price">
                <span class="current-price">
                    <?php if($product->sale_price): ?>
                    <s>$<?php echo e($product->regular_price); ?></s> $<?php echo e($product->sale_price); ?>

                  <?php else: ?>
                    $<?php echo e($product->regular_price); ?>

                  <?php endif; ?>
                </span>
            </div>
            <div class="product-single__short-desc">
                <p><?php echo e($product->short_description); ?></p>
            </div>
            <?php if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0): ?>
            <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-warning mb-3">Đi đến giỏ hàng</a>
            <?php else: ?>
                <form name="addtocart-form" method="post" action="<?php echo e(route('cart.add')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="product-single__addtocart">
                        <div class="qty-control position-relative">
                            <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                            <div class="qty-control__reduce">-</div>
                            <div class="qty-control__increase">+</div>
                        </div><!-- .qty-control -->
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                        <input type="hidden" name="price" value="<?php echo e($product->sale_price == '' ? $product->regular_price : $product->sale_price); ?>">
            
                        <button type="submit" class="btn btn-primary btn-addtocart" data-aside="cartDrawer">Thêm vào giỏ hàng</button>
                    </div>
                </form>
            <?php endif; ?>        
            <div class="product-single__addtolinks">
                <?php if(Cart::instance('wishlist')->content() -> where('id',$product->id)->count() > 0): ?>
                <form method="POST" action="<?php echo e(route('wishlist.item.remove', ['rowId'=>Cart::instance('wishlist')->content() -> where('id',$product->id)->first()->rowId])); ?>" id="frm-remove-item">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <a href="javascript:void(0)" class="menu-link menu-link_us-s add-to-wishlist filled-heart" onclick="document.getElementById('frm-remove-item').submit()"><svg width="16" height="16" viewBox="0 0 20 20"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                    </svg><span>Xóa khỏi danh sách yêu thích</span></a>
                <?php else: ?>
                    <form method="POST" action="<?php echo e(route('wishlist.add')); ?>" id="wishlist-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                    <input type="hidden" name="price" value="<?php echo e($product->sale_price == '' ? $product->regular_price : $product->sale_price); ?>">
                    <input type="hidden" name="quantity" value="1">
                    <a href="javascript:void(0)" class="menu-link menu-link_us-s add-to-wishlist" onclick="document.getElementById('wishlist-form').submit();"><svg width="16" height="16" viewBox="0 0 20 20"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                    </svg><span>Thêm vào danh sách mong muốn</span></a>
                    </form>
                <?php endif; ?>

                <share-button class="share-button">
                <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                    <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_sharing" />
                    </svg>
                    <span>Chia sẻ</span>
                </button>
                <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                    <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                    <div id="Article-share-template__main"
                    class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                    <div class="field grow mr-4">
                        <label class="field__label sr-only" for="url">Link</label>
                        <input type="text" class="field__input w-full" id="url"
                        value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health"
                        placeholder="Link" onclick="this.select();" readonly="">
                    </div>
                    <button class="share-button__copy no-js-hidden">
                        <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z"
                            fill="currentColor"></path>
                        </svg>
                        <span class="sr-only">Sao chép liên kết</span>
                    </button>
                    </div>
                </details>
                </share-button>
                <script src="js/details-disclosure.html" defer="defer"></script>
                <script src="js/share.html" defer="defer"></script>
            </div>
            <div class="product-single__meta-info">
                <div class="meta-item">
                <label>Mã sản phẩm:</label>
                <span><?php echo e($product->SKU); ?></span>
                </div>
                <div class="meta-item">
                <label>Danh mục:</label>
                <span><?php echo e($product->category->name); ?></span>
                </div>
                <div class="meta-item">
                <label>Tags:</label>
                <span>NA</span>
                </div>
            </div>
            </div>
        </div>
        <div class="product-single__details-tab">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
                href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Mô tả</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab"
                href="#tab-additional-info" role="tab" aria-controls="tab-additional-info"
                aria-selected="false">Thông tin thêm</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
                role="tab" aria-controls="tab-reviews" aria-selected="false">Đánh giá</a>
            </li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                aria-labelledby="tab-description-tab">
                <div class="product-single__description">
                    <?php echo e($product->description); ?>

                </div>
            </div>
            <div class="tab-pane fade" id="tab-additional-info" role="tabpanel" aria-labelledby="tab-additional-info-tab">
                <div class="product-single__addtional-info">
                    <?php echo e($product->short_description); ?>

            </div>
            </div>
            <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
                <h2 class="product-single__reviews-title">Đánh giá</h2>
                <div class="product-single__reviews-list">
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-single__reviews-item">
                            <div class="customer-avatar">
                                <!-- Kiểm tra nếu có avatar của người dùng -->
                                <img loading="lazy" 
                                     src="<?php echo e(asset($review->user->image)); ?>" 
                                     alt="Avatar" 
                                     class="review-avatar" />
                            </div>                            
                            <div class="customer-review">
                                <div class="customer-name">
                                    <h6><?php echo e($review->user->name); ?></h6>
                                    <div class="reviews-group d-flex">
                                        <!-- Hiển thị sao đánh giá -->
                                        <?php for($i = 0; $i < $review->rating; $i++): ?>
                                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                        <?php endfor; ?>
                                        <?php for($i = $review->rating; $i < 5; $i++): ?>
                                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" style="fill: #ddd;" />
                                            </svg>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <!-- Hiển thị nội dung bình luận -->
                                <p><?php echo e($review->comment); ?></p>
            
                                <!-- Kiểm tra nếu có ảnh của đánh giá -->
                                <?php if($review->image_path): ?>
                                    <div class="review-image">
                                        <img src="<?php echo e(asset('uploads/Comment/' . $review->image_path)); ?>" alt="Review Image" style="max-width: 50%; height: 20%;" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>            
            
            </div>
        </div>
        </section>
        <section class="products-carousel container">
        <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Sản phẩm <strong> liên quan</strong></h2>

        <div id="related_products" class="position-relative">
            <div class="swiper-container js-swiper-slider" data-settings='{
                "autoplay": false,
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "effect": "none",
                "loop": true,
                "pagination": {
                "el": "#related_products .products-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#related_products .products-carousel__next",
                "prevEl": "#related_products .products-carousel__prev"
                },
                "breakpoints": {
                "320": {
                    "slidesPerView": 2,
                    "slidesPerGroup": 2,
                    "spaceBetween": 14
                },
                "768": {
                    "slidesPerView": 3,
                    "slidesPerGroup": 3,
                    "spaceBetween": 24
                },
                "992": {
                    "slidesPerView": 4,
                    "slidesPerGroup": 4,
                    "spaceBetween": 30
                }
                }
            }'>
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $rproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide product-card">
                <div class="pc__img-wrapper">
                    <a href="<?php echo e(route('shop.product.details', ['product_slug' => $rproduct->slug])); ?>">
                    <img loading="lazy" src="<?php echo e(asset('uploads/products')); ?>/<?php echo e($rproduct->image); ?>" width="330" height="400"
                        alt="<?php echo e($rproduct->name); ?>" class="pc__img">
                    <?php $__currentLoopData = explode(",", $rproduct->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img loading="lazy" src="<?php echo e(asset('uploads/products')); ?>/<?php echo e($gimg); ?>" width="330" height="400"
                        alt="<?php echo e($rproduct->name); ?>" class="pc__img pc__img-second">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </a>
                    <?php if(Cart::instance('cart')->content()->where('id', $rproduct->id)->count() > 0): ?>
                    <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-warning mb-3">Đi đến giỏ hàng</a>
                    <?php else: ?>
                        <form name="addtocart-form" method="post" action="<?php echo e(route('cart.add')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="product-single__addtocart">
                                <div class="qty-control position-relative">
                                    <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                                    <div class="qty-control__reduce">-</div>
                                    <div class="qty-control__increase">+</div>
                                </div><!-- .qty-control -->
                                <input type="hidden" name="id" value="<?php echo e($rproduct->id); ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="name" value="<?php echo e($rproduct->name); ?>">
                                <input type="hidden" name="price" value="<?php echo e($rproduct->sale_price == '' ? $rproduct->regular_price : $rproduct->sale_price); ?>">
                    
                                <button type="submit" class="btn btn-primary btn-addtocart" data-aside="cartDrawer">Add to Cart</button>
                            </div>
                        </form>
                    <?php endif; ?>
                
                </div>

                <div class="pc__info position-relative">
                    <p class="pc__category"><?php echo e($rproduct->category->name); ?></p>
                    <h6 class="pc__title"><a href="<?php echo e(route('shop.product.details', ['product_slug' => $rproduct->slug])); ?>"><?php echo e($rproduct->name); ?></a></h6>
                    <div class="product-card__price d-flex">
                    <span class="money price">
                    <?php if($product->sale_price): ?>
                        <s>$<?php echo e($product->regular_price); ?></s> $<?php echo e($product->sale_price); ?>

                    <?php else: ?>
                        $<?php echo e($product->regular_price); ?>

                    <?php endif; ?>
                    </span>
                    </div>

                    <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                    title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                    </svg>
                    </button>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- /.swiper-wrapper -->
            </div><!-- /.swiper-container js-swiper-slider -->

            <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_prev_md" />
            </svg>
            </div><!-- /.products-carousel__prev -->
            <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_next_md" />
            </svg>
            </div><!-- /.products-carousel__next -->

            <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
            <!-- /.products-pagination -->
        </div><!-- /.position-relative -->

        </section><!-- /.products-carousel container -->
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/details.blade.php ENDPATH**/ ?>