<?php

use App\Models\Car;
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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->integer('total_seats');
            $table->decimal('price');
            $table->dateTime('dateTime');
            $table->string('notes');
            $table->string('destination'); 
            $table->string('source');
            $table->timestamps();

              

            $table->unsignedBigInteger('driver_id')->nullable()->default(null); 

            $table->foreign('driver_id')->references('id')->on('users')
                ->onDelete('cascade');

                
            $table->foreignId('car_id')->nullable()->constrained('cars')->onDelete('cascade');

            
            // $table->unsignedBigInteger('status_id');
            // $table->foreign('status_id')->references('id')->on('tripStatuses')->onDelete('cascade');


        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('trips');

    }
};
