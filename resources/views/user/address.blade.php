@extends('layouts.app')

@section('content')

<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Cập nhật địa chỉ</h2>
        <div class="row">
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>

            <div class="col-lg-10">
                <form class="tf-section-2 form-add-address" method="POST" enctype="multipart/form-data" action="{{ route('user.address.update') }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $address->id }}">

                    <div class="wg-box">
                        <!-- Tên người nhận -->
                        <fieldset class="name">
                            <div class="body-title mb-10">Tên người nhận <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="name" value="{{ $address->name }}" required>
                        </fieldset>

                        <!-- Số điện thoại -->
                        <fieldset class="phone">
                            <div class="body-title mb-10">Số điện thoại <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="phone" value="{{ $address->phone }}" required>
                        </fieldset>

                        <!-- Phường/Xã -->
                        <fieldset class="locality">
                            <div class="body-title mb-10">Phường/Xã <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="locality" value="{{ $address->locality }}" required>
                        </fieldset>

                        <!-- Số nhà, đường -->
                        <fieldset class="address">
                            <div class="body-title mb-10">Số nhà, đường <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="address" value="{{ $address->address }}" required>
                        </fieldset>

                        <!-- Thành phố -->
                        <fieldset class="city">
                            <div class="body-title mb-10">Thành phố <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="city" value="{{ $address->city }}" required>
                        </fieldset>

                        <!-- Tỉnh/Bang -->
                        <fieldset class="state">
                            <div class="body-title mb-10">Tỉnh/Bang <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="state" value="{{ $address->state }}" required>
                        </fieldset>

                        <!-- Quốc gia -->
                        <fieldset class="country">
                            <div class="body-title mb-10">Quốc gia <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="country" value="{{ $address->country }}" required>
                        </fieldset>

                        <!-- Địa điểm gần đó -->
                        <fieldset class="landmark">
                            <div class="body-title mb-10">Điểm mốc</div>
                            <input class="mb-10 form-control" type="text" name="landmark" value="{{ $address->landmark }}">
                        </fieldset>

                        <!-- Mã bưu điện -->
                        <fieldset class="zip">
                            <div class="body-title mb-10">Mã bưu điện <span class="tf-color-1">*</span></div>
                            <input class="mb-10 form-control" type="text" name="zip" value="{{ $address->zip }}" required>
                        </fieldset>

                        <!-- Nút lưu -->
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Cập nhật địa chỉ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection
