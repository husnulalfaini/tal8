<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibits', function (Blueprint $table) {
            $table->id();
            $table->Integer('stok_katak');
            $table->Integer('stok_umbi');
            $table->Integer('harga_katak')->nullable();
            $table->Integer('harga_umbi')->nullable();
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
        Schema::dropIfExists('bibits');
    }
}
