<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('panti_sosial', function (Blueprint $table) {
            $table->bigIncrements('IDPantiSosial');
            $table->unsignedBigInteger('IDUser');
            $table->foreign('IDUser')->references('id')->on('users');
            $table->string('NamaPantiSosial', 255);
            $table->string('NomorRegistrasiPantiSosial', 255);
            $table->string('DokumenValiditasPantiSosial', 255);
            $table->string('DeskripsiPantiSosial', 255)->nullable();
            $table->string('NomorTeleponPantiSosial', 15);
            $table->string('WebsitePantiSosial', 255)->nullable();
            $table->string('AlamatPantiSosial', 255)->nullable();
            $table->string('LinkGoogleMapsPantiSosial', 600)->nullable();
            $table->string('MediaSosialPantiSosial', 255)->nullable();
            $table->string('LogoPantiSosial', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('panti_sosial');
    }
};
