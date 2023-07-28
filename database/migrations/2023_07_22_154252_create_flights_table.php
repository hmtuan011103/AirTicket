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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->integer('class_business');
            $table->integer('class_economy');
            $table->string('flight_time_total');
            $table->date('flight_date');
            $table->time('flight_time_start');
            $table->foreignIdFor(\App\Models\FlightRoute::class)->constrained();
            $table->foreignIdFor(\App\Models\Plane::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
