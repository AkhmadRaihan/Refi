@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><br>
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Penjualan
                        <a href="{{ route('barangpenjualan.create') }}" class="float-right btn btn-success btn-floating"> Tambah Data</a>
                    </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Id Barang</th>
                                                    <th>Jenis Barang</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>Harga Barang</th>
                                                    <th>Diskon</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($penjualan as $penjualans)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$penjualans->stok_barang->nama_barang}}</td>
                                                    <td>{{$penjualans->jenis_barang}}</td>
                                                    <td>{{$penjualans->jumlah_barang}}</td>
                                                    <td>{{$penjualans->harga_barang}}</td>
                                                    <td>{{$penjualans->diskon}}</td>
                                                    <td>{{$penjualans->total_harga}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection