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
            $table->foreignId('pasiens_id')->constrained();
            $table->foreignId('karyawans_id')->constrained();
            $table->foreignId('obats_id')->constrained();
            $table->foreignId('tindakans_id')->constrained();
            $table->foreignId('rekammedises_id')->constrained();
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
