<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_operasional', function (Blueprint $table) {
            $table->bigIncrements('IDJadwalOperasional');
            $table->unsignedBigInteger('IDPantiSosial');
            $table->foreign('IDPantiSosial')->references('IDPantiSosial')->on('panti_sosial');
            $table->string('Hari', 8);
            $table->time('JamBukaPantiSosial');
            $table->time('JamTutupPantiSosial');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_operasional');
    }
};
