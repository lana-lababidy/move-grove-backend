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
        Schema::create('trip_passengers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('trip_id')->constrained('trips');

            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
           
            $table->foreignId('source_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('destination_id')->constrained('cities')->onDelete('cascade');
            
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_passengers');
    }
};
