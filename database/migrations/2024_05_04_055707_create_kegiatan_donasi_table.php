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
            $table->unsignedBigInteger('IDStatus');
            $table->foreign('IDPantiSosial')->references('IDPantiSosial')->on('panti_sosial');
            $table->foreign('IDStatus')->references('IDStatus')->on('status_kegiatan_atau_penerimaan');
            $table->string('GambarKegiatanDonasi', 255);
            $table->string('NamaKegiatanDonasi', 255);
            $table->string('DeskripsiKegiatanDonasi', 255);
            $table->date('TanggalKegiatanDonasiMulai');
            $table->date('TanggalKegiatanDonasiSelesai');
            $table->string('LokasiKegiatanDonasi', 255);
            $table->string('LinkGoogleMapsLokasiKegiatanDonasi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan_donasi');
    }
};
