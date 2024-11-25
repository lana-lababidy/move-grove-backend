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
        Schema::create('city_distances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id');
            $table->unsignedBigInteger('destination_id');
            $table->float('distance_km');
            $table->timestamps();

            $table->foreign('source_id')->references('id')->on('cities');
            $table->foreign('destination_id')->references('id')->on('cities')->onDelete('cascade');

      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_distances');
    }
};
