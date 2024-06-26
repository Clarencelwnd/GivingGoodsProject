<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_kegiatan_donasi', function (Blueprint $table) {
            $table->bigIncrements('IDJadwalKegiatanDonasi');
            $table->unsignedBigInteger('IDJadwalOperasional');
            $table->foreign('IDJadwalOperasional')->references('IDJadwalOperasional')->on('jadwal_operasional');
            $table->unsignedBigInteger('IDKegiatanDonasi');
            $table->foreign('IDKegiatanDonasi')->references('IDKegiatanDonasi')->on('kegiatan_donasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_kegiatan_donasi');
    }
};
