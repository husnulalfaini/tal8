<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambahBibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambah_bibits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bibit_id');
            $table->foreign('bibit_id')->references('id')->on('bibits');
            $table->Integer('stok_katak')->nullable();
            $table->Integer('stok_umbi')->nullable();
            $table->Integer('harga_katak')->nullable();
            $table->Integer('harga_umbi')->nullable();
            $table->String('supplier');
            $table->String('catatan')->nullable();
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
        Schema::dropIfExists('tambah__bibits');
    }
}

