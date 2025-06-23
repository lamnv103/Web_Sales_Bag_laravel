@extends('layouts.admin')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
        <div class="mw-930">
            <h2 class="page-title">Phản hồi của khách hàng</h2>
        </div>
    </section>

    <hr class="mt-2 text-secondary" />
    <div class="mb-4 pb-4"></div>

    <section class="contact-us container">
        <div class="mw-930">
            <div class="contact-us__form">
                <h3 class="mb-5">Chi tiết thông tin liên hệ</h3>
                <div class="form-floating my-4">
                    <input type="text" class="form-control" name="name" placeholder="Name *" value="{{ $contacts->name }}" disabled>
                    <label for="contact_us_name">Tên *</label>
                </div>
                <div class="form-floating my-4">
                    <input type="text" class="form-control" name="phone" placeholder="Phone *" value="{{ $contacts->phone }}" disabled>
                    <label for="contact_us_name">Điện thoại *</label>
                </div>
                <div class="form-floating my-4">
                    <input type="email" class="form-control" name="email" placeholder="Email address *" value="{{ $contacts->email }}" disabled>
                    <label for="contact_us_name">Địa chỉ email *</label>
                </div>
                <div class="my-4">
                    <textarea class="form-control form-control_gray" name="comment" placeholder="Your Message" disabled cols="30" rows="8">{{ $contacts->comment }}</textarea>
                </div>

                <!-- Nút để hiển thị form phản hồi -->
                <div class="my-4">
                    <button id="reply-button" class="btn btn-primary">Phản hồi</button>
                </div>

                <!-- Form phản hồi ẩn, chỉ hiển thị khi nhấn "Phản hồi" -->
                <div id="reply-form-container" style="display: none;">
                    <form action="{{ route('admin.contact.sendResponse', ['id' => $contacts->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" id="email-field" name="email" value="">
                        <div class="my-4">
                            <textarea class="form-control form-control_gray" name="response" placeholder="Nhập phản hồi của bạn" cols="30" rows="8" required></textarea>
                        </div>
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
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
document.getElementById('reply-button').addEventListener('click', function () {
    // Ẩn nút "Phản hồi" sau khi nhấn
    document.getElementById('reply-button').style.display = 'none';
    // Hiển thị form phản hồi
    document.getElementById('reply-form-container').style.display = 'block';

    // Lấy email từ trường input hiển thị và điền vào trường hidden
    const email = document.querySelector('input[name="email"]').value;
    document.getElementById('email-field').value = email;
});

document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngừng reload trang

        const formData = new FormData(this); // Lấy dữ liệu từ form
        const url = this.action; // Đảm bảo action của form đúng

        // Gửi yêu cầu AJAX để gửi phản hồi
        fetch(url, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Bạn có thể xử lý dữ liệu trả về, ví dụ hiển thị thông báo thành công
            alert('Phản hồi đã được gửi thành công!');
        })
        .catch(error => {
            // Xử lý lỗi nếu có
            console.error('Có lỗi xảy ra:', error);
        });
    });

</script>
@endpush
