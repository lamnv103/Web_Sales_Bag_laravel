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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('our_story')->nullable(); // Lưu thông tin phần "Our Story"
            $table->text('mission')->nullable(); // Lưu thông tin phần "Mission"
            $table->text('vision')->nullable(); // Lưu thông tin phần "Vision"
            $table->text('company_info')->nullable(); // Lưu thông tin phần "The Company"
            $table->timestamps(); // Tự động tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
