<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('petani_id');
        $table->foreign('petani_id')->references('id')->on('petanis');
        $table->unsignedBigInteger('bibit_id');
        $table->foreign('bibit_id')->references('id')->on('bibits');
        $table->Integer('stok');
        $table->Integer('harga')->nullable();
        $table->Integer('total_bayar')->nullable();
        $table->String('catatan')->nullable();
        $table->string('status')->default('0');
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
        Schema::dropIfExists('pesanans');
    }
}
