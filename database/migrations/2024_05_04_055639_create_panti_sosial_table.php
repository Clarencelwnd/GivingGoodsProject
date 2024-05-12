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
            $table->string('NamaPantiSosial', 255);
            $table->string('NomorRegistrasiPantiSosial', 255)->unique();;
            $table->string('DokumenValiditasPantiSosial', 255);
            $table->string('DeskripsiPantiSosial', 255);
            $table->string('NomorTeleponPantiSosial', 15);
            $table->string('WebsitePantiSosial', 255);
            $table->string('AlamatPantiSosial', 255);
            $table->string('LinkGoogleMapsPantiSosial', 255);
            $table->string('MediaSosialPantiSosial', 255);
            $table->string('LogoPantiSosial', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('panti_sosial');
    }
};
