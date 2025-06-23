@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Chỉnh sửa sản phẩm</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="{{route('admin.index')}}">
                                <div class="text-tiny">Trang chủ</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{route('admin.products')}}">
                                <div class="text-tiny">Các sản phẩm</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Chỉnh sửa sản phẩm</div>
                        </li>
                    </ul>
                </div>
                <!-- form-add-product -->
                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $product->id }}" > 
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Tên sản phẩm<span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Enter product name"
                                name="name" tabindex="0" value="{{$product->name}}" aria-required="true" required="">
                            <div class="text-tiny">DKhông được vượt quá 100 ký tự khi nhập
                                tên sản phẩm.</div>
                        </fieldset>
                        @error('name')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        <fieldset class="name">
                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter product slug"
                                name="slug" tabindex="0" value="{{ $product->slug }}" aria-required="true" required="">
                            <div class="text-tiny">Không được vượt quá 100 ký tự khi nhập
                                tên sản phẩm.</div>
                        </fieldset>
                        @error('slug')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Danh mục <span class="tf-color-1">*</span>
                                </div>
                                <div class="select">
                                    <select class="" name="category_id" required>
                                        <option>Chọn danh mục</option>
                                        @foreach ($categories as $category )
                                       <option value="{{$category->id}}" {{ $product->category_id == $category->id ? "selected":"" }}>{{$category->name}}</option>                     
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            @error('category_id')<span class="alert alert-danger text-center" >{{$message}}</span> @enderror

                            <fieldset class="brand">
                                <div class="body-title mb-10">Thương hiệu <span class="tf-color-1">*</span>
                                </div>
                                <div class="select">
                                    <select class="" name="brand_id" required>
                                        <option>Chọn thương hiệu</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{ $product->brand_id == $brand->id ? "selected":"" }}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            @error('brand_id')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        </div>

                        <fieldset class="shortdescription">
                            <div class="body-title mb-10">Mô tả ngắn gọn <span
                                    class="tf-color-1">*</span></div>
                            <textarea class="mb-10 ht-150" name="short_description"
                                placeholder="Short Description" tabindex="0" aria-required="true"
                                required="">{{$product->short_description}}</textarea>
                            <div class="text-tiny">Không được vượt quá 5000 ký tự khi nhập
                                tên sản phẩm.</div>
                        </fieldset>
                        @error('short_description')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        <fieldset class="description">
                            <div class="body-title mb-10">Mô tả <span class="tf-color-1">*</span>
                            </div>
                            <textarea class="mb-10" name="description" placeholder="Description"
                                tabindex="0" aria-required="true" required="">{{$product->description}}</textarea>
                            <div class="text-tiny">Không được vượt quá 5000 ký tự khi nhập
                                tên sản phẩm.</div>
                        </fieldset>
                        @error('description')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                    </div>
                    <div class="wg-box">
                        <fieldset>
                            <div class="body-title">Tải lên hình ảnh <span class="tf-color-1">*</span>
                            </div>
                            <div class="upload-image flex-grow">
                                @if ($product->image)
                                <div class="item" id="imgpreview">
                                    <img src="{{ asset('uploads/products') }}/{{ $product->image }}" class="effect8" alt="{{ $product->name }}">
                                </div>        
                                @endif
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Thả hình ảnh của bạn ở đây hoặc chọn <span
                                                class="tf-color">nhấp để duyệt</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        @error('image')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        <fieldset>
                            <div class="body-title mb-10">Tải lên hình ảnh thư viện</div>
                            <div class="upload-image mb-16">
                                @if ($product->images)
                                    @foreach (explode(',',$product->images) as  $img)
                                    <div class="item gitems">
                                        <img src="{{ asset('uploads/products') }}/{{ trim($img) }}" alt="">
                                    </div>     
                                    @endforeach
                                @endif

                                <div id="galUpload" class="item up-load">
                                    <label class="uploadfile" for="gFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="text-tiny">Thả hình ảnh của bạn ở đây hoặc chọn <span
                                                class="tf-color">nhấp để duyệt</span></span>
                                        <input type="file" id="gFile" name="images[]" accept="image/*"
                                            multiple="">
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        @error('images')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Giá thông thường <span
                                        class="tf-color-1">*</span></div>
                                <input class="mb-10" type="text" placeholder="Enter regular price"
                                    name="regular_price" tabindex="0" value="{{$product->regular_price}}" aria-required="true"
                                    required="">
                            </fieldset>
                            @error('regular_price')<span class="alert alert-danger text-center">{{$message}}</span> @enderror
                            <fieldset class="name">
                                <div class="body-title mb-10">Giá bán <span
                                        class="tf-color-1">*</span></div>
                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                    name="sale_price" tabindex="0" value="{{$product->sale_price}}" aria-required="true"
                                    required="">
                            </fieldset>
                            @error('sale_price')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        </div>


                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Mã sản phẩm <span class="tf-color-1">*</span>
                                </div>
                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                    tabindex="0" value="{{$product->SKU}}" aria-required="true" required="">
                            </fieldset>
                            @error('SKU')<span class="alert alert-danger text-center">{{$message}}</span> @enderror
                            <fieldset class="name">
                                <div class="body-title mb-10">Số lượng <span class="tf-color-1">*</span>
                                </div>
                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                    name="quantity" tabindex="0" value="{{$product->quantity}}" aria-required="true"
                                    required="">
                            </fieldset>
                            @error('quantity')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        </div>

                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Kho</div>
                                <div class="select mb-10">
                                    <select class="" name="stock_status">
                                        <option value="in_stock" {{ $product->stock_status == "in_stock" ? "selected":"" }}>Còn hàng</option>
                                        <option value="out_of_stock" {{ $product->stock_status == "out_of_stock" ? "selected":"" }}>Hết hàng</option>
                                    </select>
                                </div>
                            </fieldset>
                            @error('stock_status')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                            <fieldset class="name">
                                <div class="body-title mb-10">Nổi bật</div>
                                <div class="select mb-10">
                                    <select class="" name="featured">
                                        <option value="0" {{ $product->featured == "0" ? "selected":"" }}>Không </option>
                                        <option value="1" {{ $product->featured == "1" ? "selected":"" }}>Có </option>
                                    </select>
                                </div>
                            </fieldset>
                            @error('featured')<span class="alert alert-danger text-center">{{$message}}</span> @enderror

                        </div>
                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Cập nhật sản phẩm</button>
                        </div>
                    </div>
                </form>
                <!-- /form-add-product -->
            </div>
            <!-- /main-content-wrap -->
        </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $("#myFile").on("change",function(e) {
                const photoInp = $("#myFile");
                const [file] = this.files;
                if(file)
                {
                    $("#imgpreview img").attr('src',URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            });

            $("#gFile").on("change",function(e) {
                const photoInp = $("#gFile");
                const gphotos = this.files;
                $.each(gphotos,function(key,val){
                    $("#galUpload").prepend(`<div class="gitems"><img src="${URL.createObjectURL(val)}"/></div>`);
                });


            });
            
            $("input[name='name']").on("change", function(){
                $("input[name='slug']").val(StringToSlug($(this).val()));

            });
        });

        function stringToSlug(Text) 
        {
            return Text.toLowerCase()
            .replace(/[^\w]+/g, "")  // Corrected regex
            .replace(/ +/g, "-");    // Replace spaces with hyphens
        }


    </script>
    
@endpush