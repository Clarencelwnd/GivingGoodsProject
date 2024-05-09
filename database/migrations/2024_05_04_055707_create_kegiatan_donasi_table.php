<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kegiatan_donasi', function (Blueprint $table) {
            $table->bigIncrements('IDKegiatanDonasi');
            $table->unsignedBigInteger('IDPantiSosial');
            $table->foreign('IDPantiSosial')->references('IDPantiSosial')->on('panti_sosial');
            $table->string('GambarKegiatanDonasi', 255);
            $table->string('NamaKegiatanDonasi', 255);
            $table->string('DeskripsiKegiatanDonasi', 255);
            $table->date('TanggalKegiatanDonasiMulai');
            $table->date('TanggalKegiatanDonasiSelesai');
            $table->string('LokasiKegiatanDonasi', 255);
            $table->string('LinkGoogleMapsLokasiKegiatanDonasi', 255);
            $table->string('StatusKegiatanDonasi', 20);
            $table->string('JenisDonasiDibutuhkan', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan_donasi');
    }
};
