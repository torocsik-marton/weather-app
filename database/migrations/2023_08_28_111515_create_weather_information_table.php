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
        Schema::create('weather_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id');
            $table->string('name');
            $table->float('latitude');
            $table->float('longitude');
            $table->dateTime('time');
            $table->double('temp_celsius');
            $table->double('min_temp_celsius');
            $table->double('max_temp_celsius');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_information');
    }
};
