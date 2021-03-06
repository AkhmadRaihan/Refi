<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_barang');
            $table->integer('jumlah_barang');
            $table->double('harga_barang');
            $table->double('total_harga');
            $table->date('Tanggal_penjualan');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('stok_barangs')->onDelete('CASCADE');
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
        Schema::dropIfExists('penjualans');
    }
}
