<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurir_id');
            $table ->foreign('kurir_id')->references('id')->on('users');
            $table->unsignedBigInteger('lokasi_id');
            $table ->foreign('lokasi_id')->references('id')->on('lokasis');
            $table->unsignedBigInteger('barang_id');
            $table ->foreign('barang_id')->references('id')->on('barangs');
            $table ->string('no_pengiriman');
            $table ->integer('jumlah_barang');
            $table ->integer('harga_barang');
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
        Schema::dropIfExists('pengirimen');
    }
}
