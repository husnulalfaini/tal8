<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanams', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('petani_id');
            // $table->foreign('petani_id')->references('id')->on('petanis');
            $table->unsignedBigInteger('lahan_id');
            $table->foreign('lahan_id')->references('id')->on('lahans');
            $table->Date('tanggal');
            $table->Float('jumlah_bibit');
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
        Schema::dropIfExists('tanams');
    }
}
