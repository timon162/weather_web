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
        Schema::create('weather_infor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country');
            $table->string('city');
            $table->double('latitude');
            $table->float('longitude');
            $table->float('altitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_infor');
    }
};
