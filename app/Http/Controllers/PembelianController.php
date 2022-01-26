<?php

namespace App\Http\Controllers;

use App\pembelian;
use App\stok_barang;
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
        $pembelian = pembelian::all();
        return view('pembelian.index',compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembelian = pembelian::all();
        $barang = stok_barang::all();
        return view('pembelian.create',compact('pembelian','barang'));
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
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'Tanggal_pembelian' => 'required',
            'barang_id' => 'required'
        ]);
        $barang = stok_barang::where(['id' => $request['barang_id']])->first();
        if($barang){
            $stock = $barang->stok + (int) $request->jumlah_barang;
            $barang->update(['stok' => $stock]);
        }

        $pembelian = new pembelian;
        $barang = stok_barang::where(['id' => $request['barang_id']])->first();
        $pembelian->jenis_barang = $request->jenis_barang;
        $pembelian->jumlah_barang = $request->jumlah_barang;
        $pembelian->harga_barang = $request->harga_barang;
        $pembelian->total_harga = ($pembelian->jumlah_barang * $pembelian->harga_barang);
        $pembelian->Tanggal_pembelian = $request->Tanggal_pembelian;
        $pembelian->barang_id = $request->barang_id;
        $pembelian->save();
        return redirect()->route('barangpembelian.index')->with('success', 'Data Berhasil Disimpan');
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
    public function edit($id)
    {
        $pembelian = pembelian::findOrFail($id);
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
        
        $pembelian = pembelian::findorFail($id);
        $pembelian->barang_id = $request->barang_id;
        $pembelian->nama_barang = $request->nama_barang;
        $pembelian->jenis_barang = $request->jenis_barang;
        $pembelian->jumlah_barang = $request->jumlah_barang;
        $pembelian->harga_barang = $request->harga_barang;
        $pembelian->total_harga = $request->total_harga;
        $pembelian->save();
        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelian.index');
    }
}
