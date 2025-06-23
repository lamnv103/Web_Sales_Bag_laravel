@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
            href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="true">Đăng kí</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
          <div class="register-form">

            <form method="POST" action=""{{ route('register') }} name="register-form" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
                @method('POST')
              <div class="form-floating mb-3">
                <input class="form-control form-control_gray @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required="" autocomplete="name"
                  autofocus="">
                <label for="name">Tên</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="pb-3"></div>
              <div class="form-floating mb-3">
                <input id="email" type="email" class="form-control form-control_gray @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required=""
                  autocomplete="email">
                <label for="email">Địa chỉ email *</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="mobile" type="text" class="form-control form-control_gray @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"
                  required="" autocomplete="mobile">
                <label for="mobile">Di động *</label>
                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control form-control_gray @error('password') is-invalid @enderror" name="password" required=""
                  autocomplete="new-password">
                <label for="password">Mật khẩu *</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input id="password-confirm" type="password" class="form-control form-control_gray" 
                name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">Xác nhận mật khẩu *</label>
            </div>
            
            <div class="form-floating mb-3">
                <fieldset class="upload-image-fieldset">
                    <div class="body-title">Tải lên ảnh đại diện <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none;">
                            <img src="sample.jpg" class="img-preview" alt="Preview Image">
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text">Tải lên ảnh</span>
                                <input type="file" id="myFile" name="image" onchange="previewImage(event)">
                            </label>
                        </div>
                    </div>
                @error('image') <span class="alert alert-danger text-center">{{ $message }}</span> @enderror                   
                </fieldset>

                
            </div>
            
              <div class="d-flex align-items-center mb-3 pb-2">
                <input type="checkbox" id="terms" required>
                <label for="terms" class="ml-2">Tôi đồng ý với <a href="https://colaw.vn/dieu-khoan-va-dieu-kien/">điều khoản và điều kiện</a>.</label>
              </div>
              
              <button class="btn btn-primary w-100 text-uppercase" type="submit" disabled id="register-btn">Đăng ký</button>
              
              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">Có một tài khoản?</span>
                <a href="{{route('login')}}" class="btn-text js-show-register">Đăng nhập vào Tài khoản của bạn</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@push('scripts')
<script>
  // Lắng nghe sự kiện thay đổi của checkbox
  document.getElementById('terms').addEventListener('change', function() {
    // Kiểm tra trạng thái của checkbox và kích hoạt/disable nút
    document.getElementById('register-btn').disabled = !this.checked;
  });
</script>
@endpush
