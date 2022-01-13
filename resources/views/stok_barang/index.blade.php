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
                    <div class="card-header">Data Besi
                        <a href="{{ route('stok_barang.create') }}" class="float-right btn btn-success btn-floating"> Tambah Data</a>
                    </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jenis Barang</th>
                                                    <th>Harga Barang</th>
                                                    <th>Stok</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($barang as $barangs)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$barangs->nama_barang}}</td>
                                                    <td>{{$barangs->jenis_barang}}</td>
                                                    <td>{{$barangs->harga_barang}}</td>
                                                    <td>{{$barangs->stok}}</td>
                                                    <td>
                                                    <form action="{{ route('stok_barang.destroy', $barangs->id) }}"method="POST">
                                                        @csrf @method('delete')
                                                        <a href="{{ route('stok_barang.edit',$barangs->id) }}" class="btn btn-primary">Edit</a>
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