<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_jenis_barang_didonasikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('IDRegistrasiDonatur');
            $table->unsignedBigInteger('IDJenisDonasi');
            $table->foreign('IDRegistrasiDonatur')->references('IDRegistrasiDonatur')->on('registrasi_donatur');
            $table->foreign('IDJenisDonasi')->references('IDJenisDonasi')->on('jenis_barang_donasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_jenis_barang_didonasikan');
    }
};
