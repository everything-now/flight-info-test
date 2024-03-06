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
            $table->string('flight_number');
            $table->unsignedBigInteger('transporter_id');
            $table->unsignedBigInteger('departure_airport_id');
            $table->unsignedBigInteger('arrival_airport_id');
            $table->dateTimeTz('departure_date_time', $precision = 0);
            $table->dateTimeTz('arrival_date_time', $precision = 0);
            $table->timestamps();
 
            $table->foreign('transporter_id')->references('id')->on('transporters');
            $table->foreign('departure_airport_id')->references('id')->on('airports');
            $table->foreign('arrival_airport_id')->references('id')->on('airports');
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
