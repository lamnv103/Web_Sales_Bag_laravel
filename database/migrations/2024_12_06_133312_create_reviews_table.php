<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Người đánh giá
            $table->unsignedBigInteger('product_id'); // Sản phẩm được đánh giá
            $table->unsignedBigInteger('order_id'); // Đơn hàng liên quan
            $table->integer('rating'); // Điểm đánh giá (1-5 sao)
            $table->text('comment')->nullable(); // Nội dung đánh giá
            $status = $table->string('status')->default('pending');
            $table->string('image_path')->nullable(); // Tên hoặc đường dẫn ảnh
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kiểm tra nếu bảng 'reviews' tồn tại, xóa cột 'status' trước khi xóa bảng.
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'status')) {
                $table->dropColumn('status'); // Xóa cột 'status'.
            }
        });
    
        // Xóa bảng 'reviews' nếu rollback hoàn toàn.
        Schema::dropIfExists('reviews');
    }
    
};
