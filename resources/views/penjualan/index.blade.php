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
                        <a href="{{ route('penjualan.create') }}" class="float-right btn btn-success btn-floating"> Tambah Data</a>
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
                                                    <th>Nama Barang</th>
                                                    <th>Jenis Barang</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>Harga Barang</th>
                                                    <th>Total Harga</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($barang as $barangs)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$barangs->barang_id}}</td>
                                                    <td>{{$barangs->namabarang}}</td>
                                                    <td>{{$barangs->jenis_barang}}</td>
                                                    <td>{{$barangs->jumlah_barang}}</td>
                                                    <td>{{$barangs->harga_barang}}</td>
                                                    <td>{{$barangs->total_harga}}</td>
                                                    <td>
                                                    <form action="{{ route('penjualan.destroy', $barangs->id) }}"method="POST">
                                                        @csrf @method('delete')
                                                        <a href="{{ route('penjualan.edit',$barangs->id) }}" class="btn btn-primary">Edit</a>
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin Menghapus Data?')">Delete</button>
                                                    </form>
                                                    </td>
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