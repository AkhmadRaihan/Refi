<?php

namespace App\Http\Controllers;

use App\stok_barang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = stok_barang::all();
        return view('stok_barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stok_barang.create');
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
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga_barang' => 'required',
            'stok' => 'required'
        ]);

        $barang = new stok_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->stok = $request->stok;
        $barang->save();
        return redirect()->route('stok_barang.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function show(stok_barang $stok_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = stok_barang::findOrFail($id);
        return view('stok_barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required' ,
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga_barang' => 'required',
            'stok' => 'required'
        ]);
        
        $barang = stok_barang::findorFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->stok = $request->stok;
        $barang->save();
        return redirect()->route('stok_barang.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stok_barang  $stok_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = stok_barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('stok_barang.index');
    }
}
