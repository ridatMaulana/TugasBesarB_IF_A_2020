<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekammedissTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekammediss', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained();
            $table->foreignId('id_karyawan')->constrained();
            $table->string('kode_icd');
            $table->string('keluhan');
            $table->datetime('tanggal_dibuat');
            $table->string('tensi');
            $table->string('alergi'); 
            $table->string('hasil_lab');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekammediss');
    }
}
