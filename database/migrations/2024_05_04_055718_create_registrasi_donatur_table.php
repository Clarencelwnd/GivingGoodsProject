<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrasi_donatur', function (Blueprint $table) {
            $table->bigIncrements('IDRegistrasiDonatur');
            $table->unsignedBigInteger('IDDonaturRelawan');
            $table->unsignedBigInteger('IDKegiatanDonasi');
            $table->string('StatusRegistrasiDonatur', 20);
            $table->string('JenisDonasiDidonasikan', 255);
            $table->foreign('IDDonaturRelawan')->references('IDDonaturRelawan')->on('donatur_atau_relawan');
            $table->foreign('IDKegiatanDonasi')->references('IDKegiatanDonasi')->on('kegiatan_donasi');
            $table->string('DeskripsiBarangDonasi', 255);
            $table->date('TanggalDonasi');
            $table->time('JamDonasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrasi_donatur');
    }

};
