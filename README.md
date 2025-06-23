
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h2 align="center">👜 Website Bán Túi Xách - Laravel</h2>

## 🎯 Giới thiệu

Website bán túi xách được xây dựng bằng Laravel, hỗ trợ đầy đủ chức năng như:

- Quản lý sản phẩm, danh mục
- Mua hàng, giỏ hàng
- Trang quản trị (Admin) và người dùng (Customer)
- Gửi email xác nhận đơn hàng
- Giao diện đơn giản, dễ sử dụng

---

## ⚙️ Hướng dẫn cài đặt

1. Giải nén file `luxury-shop-new` vào thư mục `htdocs` (nếu dùng XAMPP).
2. Mở **phpMyAdmin**, tạo database tên `laravel11` và **import** file `laravel11.sql`.
3. Mở file `.env` và cấu hình như sau:

<details>
  <summary>🎯 Cấu hình cơ sở dữ liệu</summary>

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel11
DB_USERNAME=root
DB_PASSWORD=
DB_COLLATION=utf8mb4_general_ci
```
</details>

<details>
  <summary>📧 Cấu hình gửi mail</summary>

> Lưu ý: Không chia sẻ mật khẩu thật! Dưới đây chỉ là ví dụ minh họa.

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=example@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="example@gmail.com"
MAIL_FROM_NAME="Your Shop Name"
```
</details>

4. Mở terminal:
```bash
php artisan serve
```

5. Truy cập:
- Người dùng: [http://127.0.0.1:8000/](http://127.0.0.1:8000/)
- Quản trị: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

🔴 *Lưu ý: Mở trang admin và người dùng bằng 2 trình duyệt khác nhau để tránh xung đột đăng nhập.*

---

## ▶️ Video Demo

[![Demo Video](https://img.youtube.com/vi/YOUR_VIDEO_ID_HERE/0.jpg)](file:///D:/Year_2/Ki1Nam2/%C4%90ACS2/VIDEO%20DEMO%20WEB.mp4)

> Thay `YOUR_VIDEO_ID_HERE` bằng ID video trên YouTube của bạn.

---

## 📁 Một số tính năng

- CRUD sản phẩm (Admin)
- Đăng ký / Đăng nhập người dùng
- Giao diện đẹp, responsive
- Xử lý giỏ hàng và thanh toán nội bộ
- Gửi email xác nhận

---

## 📄 Giấy phép

Laravel được cấp phép theo [MIT License](https://opensource.org/licenses/MIT).

---

## ❤️ Tác giả

- 📧 Email: lamnv.23ai@vku.udn.vn
- 📌 Dự án phục vụ học tập tại VKU
