<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kegiatan_relawan', function (Blueprint $table) {
            $table->bigIncrements('IDKegiatanRelawan');
            $table->unsignedBigInteger('IDPantiSosial');
            $table->foreign('IDPantiSosial')->references('IDPantiSosial')->on('panti_sosial');
            $table->string('GambarKegiatanRelawan', 255);
            $table->string('NamaKegiatanRelawan', 255);
            $table->string('DeskripsiKegiatanRelawan', 255);
            $table->date('TanggalKegiatanRelawanMulai');
            $table->date('TanggalKegiatanRelawanSelesai');
            $table->date('TanggalPendaftaranKegiatanDitutup');
            $table->time('JamMulaiKegiatanRelawan');
            $table->time('JamSelesaiKegiatanRelawan');
            $table->integer('JumlahRelawanDibutuhkan');
            $table->string('LokasiKegiatanRelawan', 255);
            $table->string('LinkGoogleMapsLokasiKegiatanRelawan', 255);
            $table->string('KriteriaRelawan', 255);
            $table->string('SyaratDanInstruksiKegiatanRelawan', 255);
            $table->string('KontakKegiatanRelawan', 255);
            $table->string('JenisKegiatanRelawan', 255);
            $table->string('StatusKegiatanRelawan', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan_relawan');
    }
};
