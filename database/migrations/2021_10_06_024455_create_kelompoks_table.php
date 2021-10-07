<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompoks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('alamat')->null();
            $table->string('longitude')->null();
            $table->string('latitude')->null();
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
        Schema::dropIfExists('kelompoks');
    }
}

// $table->id();
// $table->string('nama');
// // $table->unsignedBigInteger('kelompok_id');
// // $table->foreign('kelompok_id')->references('id')->on('kelompoks');
// $table->string('email')->unique();
// $table->timestamp('email_verified_at')->nullable();
// $table->string('password');
// $table->string('alamat')->nullable();
// $table->string('telepon')->nullable();
// $table->string('foto')->nullable();
// $table->string('status')->default('0');
// $table->timestamps();