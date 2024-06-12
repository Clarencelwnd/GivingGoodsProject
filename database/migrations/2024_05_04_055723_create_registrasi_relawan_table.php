<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrasi_relawan', function (Blueprint $table) {
            $table->bigIncrements('IDRegistrasiRelawan');
            $table->unsignedBigInteger('IDDonaturRelawan');
            $table->foreign('IDDonaturRelawan')->references('IDDonaturRelawan')->on('donatur_atau_relawan');
            $table->unsignedBigInteger('IDKegiatanRelawan');
            $table->foreign('IDKegiatanRelawan')->references('IDKegiatanRelawan')->on('kegiatan_relawan');
            $table->string('StatusRegistrasiRelawan', 20);
            $table->string('AlasanRegistrasiRelawan', 255);
            $table->date('TanggalKehadiranRelawan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrasi_relawan');
    }
};
