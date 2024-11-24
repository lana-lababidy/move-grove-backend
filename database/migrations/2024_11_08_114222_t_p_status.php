<?php

use App\Models\Trip_passengers;
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
        Schema::create('t_p_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->default(value: 'DEFAULT_CODE')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('trip_passenger_id')->nullable()->default(null);

            $table->foreign('trip_passenger_id')
                ->references('id')
                ->on(table: 'trip_passengers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_p_statuses');
    }
};
