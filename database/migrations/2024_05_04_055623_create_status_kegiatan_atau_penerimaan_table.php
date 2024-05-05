<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('status_kegiatan_atau_penerimaan', function (Blueprint $table) {
            $table->bigIncrements('IDStatus');
            $table->string('NamaStatus', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_kegiatan_atau_penerimaan');
    }
};
