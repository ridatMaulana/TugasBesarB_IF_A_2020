<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailobatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailobats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rekam_medis')->constrained();
            $table->foreignId('id_obat')->constrained();
            $table->string('kode_pasien');
            $table->string('dosis'); 
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
        Schema::dropIfExists('detailobats');
    }
}
