<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = array('jenis_barang','jumlah_barang','barang_id','harga_barang','Tanggal_penjualan');

    public function stok_barang() {
        return $this->belongsTo('App\stok_barang', 'barang_id', 'id');
    }
}
