<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_barang_donasi', function (Blueprint $table) {
            $table->bigIncrements('IDJenisDonasi');
            $table->string('JenisDonasi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_barang_donasi');
    }
};
