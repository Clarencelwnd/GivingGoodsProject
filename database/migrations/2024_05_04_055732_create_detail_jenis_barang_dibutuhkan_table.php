<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_jenis_barang_dibutuhkan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('IDKegiatanDonasi');
            $table->unsignedBigInteger('IDJenisDonasi');
            $table->foreign('IDKegiatanDonasi')->references('IDKegiatanDonasi')->on('kegiatan_donasi');
            $table->foreign('IDJenisDonasi')->references('IDJenisDonasi')->on('jenis_barang_donasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_jenis_barang_dibutuhkan');
    }
};
