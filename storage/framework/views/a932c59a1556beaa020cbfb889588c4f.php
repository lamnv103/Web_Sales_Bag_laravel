
<?php $__env->startSection('content'); ?>
    <style>  
        body, html {  
            height: 100%;  
            margin: 0; 
            padding-right: 0;
            right: 0;


        }  
        .container{
            padding: 0;  
            margin: 0;  
        }

        .video-background {  
            position: absolute;  
            top: 0;  
            left: 0;  
            width: 100%;  
            height: 100%;  
            z-index: -1;  
            overflow: hidden;  
        }  

        .video-background video {  
            min-width: 100%;  
            min-height: 100%;  
            width: auto;  
            height: auto;  
            position: absolute;  
            top: 50%;  
            left: 50%;  
            transform: translate(-50%, -50%);  
        }  

        .content {  
            position: relative;  
            z-index: 1; /* Đảm bảo chữ xuất hiện trên video */  
            text-align: center;  
            color: #fff;  
        }  

        .content h1 {  
            font-size: 95px;  
            font-weight: 600;  
              
            transition: 0.3s;  
            
        }  

        .content p {  
            text-decoration: none;  
            display: inline-block;  
            font-size: 24px;  
            border: 2px solid #fff;  
            padding: 14px 70px;  
            border-radius: 50px;  
            margin-top: 20px;  
            color: #fff;  
            margin-bottom: 0%;  
            background-color: rgba(0, 0, 0, 0.5); /* Nền mờ cho dễ đọc */  
            margin-top: 10%;
        }  

        .content p:hover {  
            background-color: black; 

        }  
        .container_1{
            position: relative; 
            padding: 0% 30% 0% 30%;

        }

        h1 {  
            font-size: 48px;  
            margin-bottom: 10px;  
        }  

        h2 {  
            font-size: 24px;  
            margin-bottom: 20px;
        }  

        .grid {  
            display: grid;  
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));  
            gap: 20px;  
            padding: 3% 18% 5% 18%;
            color: #fff;
        }  
        .card {  
            background-color: #ccc;  
            border-radius: 2px;  
            padding: 20px;  
            text-align: center;
            
            
        }
        .card img {  
            width: 100%;  
            border-radius: 8px;
            display: block; /* Loại bỏ khoảng cách bên dưới hình ảnh */  
     
        }  

        h3 {  
            margin: 15px 0 10px;  
            font-size: 20px;  
        }  

        p {  
            font-size: 16px;  
            margin-bottom: 15px;  
        }  

        .button {  
            display: inline-block;  
            background-color: white;  
            color: black;  
            padding: 10px 20px;  
            text-decoration: none;  
            border-radius: 8px;  
            transition: background-color 0.3s; 
             
        }  

        .button:hover {  
            background-color: #ddd;  
        }  
        a {
            text-decoration: none;
            color: black;
        }
        .img_2 {  
            width: 100%;  
            height: 100%;  
            object-fit: cover;  
            padding :3%;
            opacity: 0.7; /* Để thêm hiệu ứng mờ cho hình ảnh */  
        }  
        .logo__image {
            display: none;
        }
        .hero-content {  
            width: 50%;
            transform: translate(-50%, -50%);  
            text-align: center;  
 
        }  
        .hero-title {  
            font-size: 36px;  
            font-weight: bold;  
        }  
        .hero-description {  
            font-size: 18px;  
            margin-top: 10px;  
             
            margin-left: 0%;
            
        }  
        .img_2{
            font-weight: 20%;
            
        }
        footer{
            padding : 20px;

        }
        #header {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .product-item {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
            transition: all 0.3s ease;
            padding-right: 5px;
        }

        .product-item .image {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            gap: 10px;
            flex-shrink: 0;
            padding: 5px;
            border-radius: 10px;
            background: rgb(233, 233, 233);
        }   
        #box-content-search li {
            list-style: none;
        }
        #box-content-search .product-item {
            margin-bottom: 10px;
        }
        .navigation__link {
            color: rgb(10, 8, 8);
        }
        a{
            color: white;
        }
        .header-tools__item {
            color: white;
        }


    </style>  
<main class="pt-90">
<div class="container-fluid">
    <div>
        <div class="video-background">  
            <video autoplay loop muted playsinline>  
                <source src="<?php echo e(asset('images/videos/vid1.mp4')); ?>" type="video/mp4"> <!-- Chưng kênh tên chính xác hoặc dùng đường dẫn tương đối -->  
                Your browser does not support the video tag.  
            </video>  
        </div>  
        
        <div class="content"> 
            <p class="lead">Dẫn đầu phong cách, định hình tương lai.</p>  
        </div>  
    </div> 
    <h2 class="text-center" style="font-family: 'Playfair Display', serif; font-size: 50px;padding: 25% 5% 0 5%;  ">10 NGHỆ SĨ ĐỊNH HÌNH CÁI MỚI VÀ NHỮNH CÁI TIẾP THEO</h2>  
    <div class="container_1 my-5 " style="">  
            <p class="text-justify"><b>Mười nghệ sĩ đương đại sẽ nhận được khoản ngân sách hỗ trợ cùng chương trình cố vấn kéo dài hai năm.</b></br>
                Hội đồng của giải thưởng năm 2024 bao gồm nữ diễn viên Tilda Swinton, nghệ sĩ Cao Fei cùng các giám tuyển Legacy Russell và Hans Ulrich Obrist.
                Mười nghệ sĩ thắng giải CHANEL NEXT Prize, giải thưởng tôn vinh nghệ thuật và văn hóa toàn cầu lần thứ hai của Thương hiệu, được công bố bởi Quỹ Văn hóa CHANEL.</br>
                Giải thưởng được tổ chức hai năm một lần này được trao cho mười nghệ sĩ đương đại quốc tế, những người đang định nghĩa lại mảng nghệ thuật mình đã chọn. Mỗi nghệ sĩ đều hướng đến sứ mệnh của CHANEL trong việc thúc đẩy cái mới và điều tiếp theo.</br>
                Mỗi nghệ sĩ thắng giải sẽ được nhận khoản tài trợ €100.000, giúp họ theo đuổi các dự án nghệ thuật đầy nhiệt huyết của mình.</br>   
                Cũng là một phần của giải thưởng, những người thắng cuộc sẽ được tham gia một chương trình cố vấn kéo dài hai năm và chương trình giao lưu kết nối được hỗ trợ bởi các đối tác về văn hóa trên khắp thế giới của Thương hiệu.</p>   
            <a href="" style="color: black;text-decoration: underline; ">ĐỌC THÊM </a>
    </div>
    <h2 class="text-center" style="font-family: 'Playfair Display', serif; font-size: 50px;padding: 0% 5% 0 5%;">GẶP GỠ NHỮNG NGHỆ SĨ THẮNG GIẢI NĂM 2024</h2>  
    <div class="grid mp-6">
            <div class="card">  
                <img src="https://i.pinimg.com/736x/28/b4/30/28b4305e00592a33bcbf59ad079a4a65.jpg" alt="Davone Tines">  
                <h3>DAVONE TINES</h3>  
                <p>Ca sĩ & nhà sáng tạo</p>  
                <a style="color: black; "href="#" class="button">XEM THÊM</a>  
            </div>  
            <div class="card">  
                <img src="https://i.pinimg.com/736x/c6/d5/01/c6d501374fa004a9c77bb310f958813a.jpg" alt="Tolia Astakhishvili">  
                <h3>TOLIA ASTAKHISHVILI</h3>  
                <p>Nghệ sĩ thị giác</p>  
                <a style="color: black;"href="#" class="button">XEM THÊM</a>  
            </div>  
            <div class="card">  
                <img src="https://i.pinimg.com/736x/bf/b5/7d/bfb57dc6a9514fc20a822473b371505c.jpg" alt="Ho Tzu Nyen">  
                <h3>HO TZU NYEN</h3>  
                <p>Nghệ sĩ thị giác</p>  
                <a style="color: black; " href="#" class="button">XEM THÊM</a>  
            </div>
            <div class="card">  
                <img src="https://i.pinimg.com/736x/28/b4/30/28b4305e00592a33bcbf59ad079a4a65.jpg" alt="Davone Tines">  
                <h3>DAVONE TINES</h3>  
                <p>Ca sĩ & nhà sáng tạo</p>  
                <a style="color: black; "href="#" class="button">XEM THÊM</a>  
            </div>  
            <div class="card">  
                <img src="https://i.pinimg.com/736x/c6/d5/01/c6d501374fa004a9c77bb310f958813a.jpg" alt="Tolia Astakhishvili">  
                <h3>TOLIA ASTAKHISHVILI</h3>  
                <p>Nghệ sĩ thị giác</p>  
                <a style="color: black;"href="#" class="button">XEM THÊM</a>  
            </div>  
            <div class="card">  
                <img src="https://i.pinimg.com/736x/bf/b5/7d/bfb57dc6a9514fc20a822473b371505c.jpg" alt="Ho Tzu Nyen">  
                <h3>HO TZU NYEN</h3>  
                <p>Nghệ sĩ thị giác</p>  
                <a style="color: black; " href="#" class="button">XEM THÊM</a>  
            </div>  
            <!-- Thêm các thẻ nội dung tương tự cho các nghệ sĩ khác -->    
    </div>  
    <h2 class="text-center" style="font-family: 'Playfair Display', serif; font-size: 50px; padding:1%;">EXT PRIZE TẠI SỰ KIỆN VENICE BIENNALE</h2>  
    <div class="row" style="padding: 0% 10% 0% 10%">
    <div class="col-md-6">  
    <img class="img_2" src="https://i.pinimg.com/736x/d1/1c/60/d11c60afd64eb7517b89be6c588e13eb.jpg" style="padding:2%;" alt="Venice Biennale">
    </div>  
    <div class="col-md-6">  
        <p class="hero-description" style="text-aglin: center;">Những nghệ sĩ thắng giải CHANEL Next Prize 2024 quy tụ tại Venice để tham dự sự kiện Venice Biennale lần thứ 60, sự kiện quan trọng nhất của nghệ thuật đương đại. Xem trải nghiệm của họ ở đây.</p>  
    </div>  
    </div>
</div> 
   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
 
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\luxury-shop-new\resources\views/about.blade.php ENDPATH**/ ?>