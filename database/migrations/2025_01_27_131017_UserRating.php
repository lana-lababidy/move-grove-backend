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
        Schema::create('UserRating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rated_user_id'); // المستخدم الذي يتم تقييمه
            $table->decimal('rating', 2, 1); // التقييم (من 0 إلى 5)
            $table->text('review')->nullable(); // يمكن إضافة تعليق مع التقييم (اختياري)
            $table->string('status')->default('visible'); 
            $table->timestamps();            
            $table->foreign('rated_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ratings');
    }
};
