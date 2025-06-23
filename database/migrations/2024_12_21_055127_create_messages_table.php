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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Sender user_id (foreign key)
            $table->unsignedBigInteger('recipient_user_id'); // Recipient user_id (foreign key)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Sender foreign key
            $table->foreign('recipient_user_id')->references('id')->on('users')->onDelete('cascade'); // Recipient foreign key
            $table->text('content'); // Message content
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
         