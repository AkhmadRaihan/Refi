<?php

namespace App\Http\Controllers;

use App\pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = pembelian::all();
        return view('pembelian.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'total_harga' => 'required'
        ]);

        $barang = new pembelian;
        $barang->barang_id = $request->barang_id;
        $barang->namabarang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->total_harga = $request->total_harga;
        $barang->save();
        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(pembelian $id)
    {
        $barang = pembelian::findOrFail($id);
        return view('stok_barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required' ,
            'barang_id' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'total_harga' => 'required'
        ]);
        
        $barang = pembelian::findorFail($id);
        $barang->barang_id = $request->barang_id;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->total_harga = $request->total_harga;
        $barang->save();
        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembelian $id)
    {
        $barang = pembelian::findOrFail($id);
        $barang->delete();
        return redirect()->route('stok_barang.index');
    }
}
