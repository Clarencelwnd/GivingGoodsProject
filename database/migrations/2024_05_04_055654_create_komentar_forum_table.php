<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('komentar_forum', function (Blueprint $table) {
            $table->bigIncrements('IDKomentarForum');
            $table->unsignedBigInteger('IDForum');
            $table->foreign('IDForum')->references('IDForum')->on('forum');
            $table->unsignedBigInteger('IDDonaturRelawanPengomentarForum')->nullable();
            $table->foreign('IDDonaturRelawanPengomentarForum')->references('IDDonaturRelawan')->on('donatur_atau_relawan');
            $table->unsignedBigInteger('IDPantiSosialPengomentarForum')->nullable();
            $table->foreign('IDPantiSosialPengomentarForum')->references('IDPantiSosial')->on('panti_sosial');
            $table->string('KomentarForum', 255);
            $table->date('TanggalKomentarForum');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('komentar_forum');
    }
};
