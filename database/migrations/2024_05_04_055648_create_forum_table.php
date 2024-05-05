<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('forum', function (Blueprint $table) {
            $table->bigIncrements('IDForum');
            $table->unsignedBigInteger('IDPembuatForumDonatur')->nullable();
            $table->unsignedBigInteger('IDPembuatForumPantiSosial')->nullable();
            $table->foreign('IDPembuatForumDonatur')->references('IDDonaturRelawan')->on('donatur_atau_relawan');
            $table->foreign('IDPembuatForumPantiSosial')->references('IDPantiSosial')->on('panti_sosial');
            $table->string('JudulForum', 255);
            $table->string('DeskripsiForum', 255);
            $table->date('TanggalBuatForum');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('forum');
    }
};
