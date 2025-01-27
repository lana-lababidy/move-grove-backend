<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // if (!Schema::hasTable('users')) {
                Schema::create('users', function (Blueprint $table) {
                    $table->id();
                    $table->string('last_name');
                    $table->string('username')->unique();
                    $table->string('gender');
                    $table->dateTime('expire_at')->nullable();
                    $table->string('mobile_number')->unique();
                    $table->string('user_session')->nullable();
                    $table->rememberToken();
                    $table->timestamps();
                    $table->string('car_mechanics_image')->nullable();
                    $table->string('driver_certificate_copy')->nullable();
                    $table->string('car_insurance_copy')->nullable();
                    $table->string('car_image')->nullable();
                    $table->string('car_front_image')->nullable();
                    $table->string('car_back_image')->nullable();
                     $table->string('fcm_token')->nullable();
                
                 $table->unsignedBigInteger('role_id');
                    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
                });
            }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

    }
};
