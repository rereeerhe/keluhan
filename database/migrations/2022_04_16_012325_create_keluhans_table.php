<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pengguna');
            $table->unsignedInteger('id_admin');
            $table->string('nama_keluhan');
            $table->string('deskripsi');
            $table->string('tanggapan');
            $table->enum('status', ['setuju', 'tidak setuju']);
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id')->on('pengguna');
            $table->foreign('id_admin')->references('id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluhan');
    }
}
