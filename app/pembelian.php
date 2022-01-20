<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    protected $table = 'pembelians';
    protected $fillable = array('namabarang','jenis_barang','jumlah_barang','barang_id');

    public function barang() {
        return $this->belongsTo('App\stok_barang', 'barang_id', 'id');
    }
}
