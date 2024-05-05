<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_kegiatan_relawan', function (Blueprint $table) {
            $table->bigIncrements('IDJenisKegiatanRelawan');
            $table->string('JenisKegiatanRelawan', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_kegiatan_relawan');
    }

};
