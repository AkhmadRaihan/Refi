<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    protected $table = 'pembelians';
    protected $fillable = array('jenis_barang','jumlah_barang','barang_id','harga_barang','Tanggal_pembelian');

    public function stok_barang() {
        return $this->belongsTo('App\stok_barang', 'barang_id', 'id');
    }
}
