<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained();
            $table->foreignId('id_karyawan')->constrained();
            $table->foreignId('id_obat')->constrained();
            $table->foreignId('id_tindakan')->constrained();
            $table->foreignId('id_rekam_medis')->constrained();
            $table->string('no_antrian');
            $table->string('tanggal_transaksi');
            $table->integer('total_biaya');
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
        Schema::dropIfExists('pembayarans');
    }
}
