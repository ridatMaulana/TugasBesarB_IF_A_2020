<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekammedisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekammedises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasiens_id')->constrained();
            $table->foreignId('karyawans_id')->constrained();
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
        Schema::dropIfExists('rekammedises');
    }
}
