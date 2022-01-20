<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = array('namabarang','jenis_barang','jumlah_barang','barang_id');

    public function barang() {
        return $this->belongsTo('App\barang', 'barang_id', 'id');
    }
}
