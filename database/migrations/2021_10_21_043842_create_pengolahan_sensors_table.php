<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengolahanSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengolahan_sensors', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('sensor_id');
            // $table->foreign('sensor_id')->references('id')->on('sensors');
            $table->unsignedBigInteger('lahan_id');
            $table->foreign('lahan_id')->references('id')->on('lahans');
            $table->Integer('kelembapan');
            $table->Integer('ph');
            $table->String('info_kelembapan');
            $table->String('info_ph');
            $table->String('rekom_kelembapan');
            $table->String('rekom_ph');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengolahan_sensors');
    }
}
