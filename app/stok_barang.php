<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok_barang extends Model
{
    protected $table = 'stok_barangs';
    protected $fillable = array('nama_barang','jenis_barang','stok');

    public function masuk() {
        return $this->hasMany('App\pembelian', 'barang_id', 'id');
    }

    public function keluar() {
        return $this->hasMany('App\penjualan', 'barang_id', 'id');
    }
}
