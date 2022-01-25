<?php

namespace App\Http\Controllers;

use App\penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = penjualan::all();
        return view('penjualan.index',compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.create');
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

        $penjualan = new penjualan;
        $penjualan->barang_id = $request->barang_id;
        $penjualan->namabarang = $request->nama_barang;
        $penjualan->jenis_barang = $request->jenis_barang;
        $penjualan->jumlah_barang = $request->jumlah_barang;
        $penjualan->harga_barang = $request->harga_barang;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->save();
        return redirect()->route('penjualan.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjualan = penjualan::findOrFail($id);
        return view('stok_barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
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
        
        $penjualan = penjualan::findorFail($id);
        $penjualan->barang_id = $request->barang_id;
        $penjualan->nama_barang = $request->nama_barang;
        $penjualan->jenis_barang = $request->jenis_barang;
        $penjualan->jumlah_barang = $request->jumlah_barang;
        $penjualan->harga_barang = $request->harga_barang;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->save();
        return redirect()->route('penjualan.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index');
    }
}
