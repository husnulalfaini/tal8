<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petani_id');
            $table->foreign('petani_id')->references('id')->on('petanis');
            $table->Float('panen_katak');
            $table->Float('panen_umbi');
            $table->Date('tanggal');
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
        Schema::dropIfExists('panens');
    }
}
