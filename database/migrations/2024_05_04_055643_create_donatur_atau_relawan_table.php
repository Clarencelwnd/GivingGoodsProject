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
            $table->string('EmailDonaturRelawan', 255)->unique();
            $table->string('PasswordDonaturRelawan', 255);
            $table->string('NamaDonaturRelawan', 255);
            $table->date('TanggalLahirDoanturRelawan')->nullable();
            $table->string('JenisKelaminDonaturRelawan', 10)->nullable();
            $table->string('NomorTeleponDonaturRelawan', 15);
            $table->string('AlamatDonaturRelawan', 255)->nullable();
            $table->string('LinkGoogleMapsDonaturRelawan', 255)->nullable();
            $table->string('FotoDonaturRelawan', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donatur_atau_relawan');
    }
};
