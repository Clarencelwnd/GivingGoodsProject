<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donatur_atau_relawan', function (Blueprint $table) {
            $table->bigIncrements('IDDonaturRelawan');
            $table->unsignedBigInteger('IDUser');
            $table->foreign('IDUser')->references('id')->on('users');
            $table->string('NamaDonaturRelawan', 255);
            $table->date('TanggalLahirDonaturRelawan')->nullable();
            $table->string('JenisKelaminDonaturRelawan', 10)->nullable();
            $table->string('NomorTeleponDonaturRelawan', 15);
            $table->text('AlamatDonaturRelawan')->nullable();
            $table->string('LinkGoogleMapsDonaturRelawan', 255)->nullable();
            $table->string('FotoDonaturRelawan', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donatur_atau_relawan');
    }
};
