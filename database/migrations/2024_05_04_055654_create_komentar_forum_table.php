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
            $table->unsignedBigInteger('IDPengomentarDonatur')->nullable();
            $table->unsignedBigInteger('IDPengomentarPantiSosial')->nullable();
            $table->foreign('IDPengomentarDonatur')->references('IDDonaturRelawan')->on('donatur_atau_relawan');
            $table->foreign('IDPengomentarPantiSosial')->references('IDPantiSosial')->on('panti_sosial');
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
