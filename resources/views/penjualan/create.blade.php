@extends('layouts.master')
@section('content')

<br><br>
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header"><b>Tambah Data Penjualan</b></h5>
			<form action="{{ route('barangpenjualan.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">
                    
                    <div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
                        <label class="control-label">Nama Barang</label>	
                        <select name="barang_id" class="form-control">
                        <option>---</option>
                          @foreach($barang as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('barang_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('barang_id') }}</strong>
                          </span>
                      @endif
                    </div>
			  		<div class="form-group {{ $errors->has('jenis_barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Jenis Barang</label>	
			  			<input type="text" name="jenis_barang" class="form-control"  required>
			  			@if ($errors->has('jenis_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenis_barang') }}</strong>
                            </span>
                        @endif
			  		</div>
                    <div class="form-group {{ $errors->has('jumlah_barang') ? ' has-error' : '' }}">
                        <label class="control-label">Jumlah Barang</label>	
                        <input type="number" name="jumlah_barang" class="form-control"  required>
                        @if ($errors->has('jumlah_barang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('jumlah_barang') }}</strong>
                          </span>
                      @endif
                    </div> 
                    <div class="form-group {{ $errors->has('harga_barang') ? ' has-error' : '' }}">
                        <label class="control-label">Harga Barang</label>	
                        <input type="number" name="harga_barang" class="form-control"  required>
                        @if ($errors->has('harga_barang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('harga_barang') }}</strong>
                          </span>
                      @endif
                    </div>
                      <div class="form-group {{ $errors->has('Tanggal_penjualan') ? ' has-error' : '' }}">
                        <label class="control-label">Tanggal</label>	
                        <input type="date" name="Tanggal_penjualan" class="form-control"  required>
                        @if ($errors->has('Tanggal_penjualan'))
                          <span class="help-block">
                              <strong>{{ $errors->first('Tanggal_penjualan') }}</strong>
                          </span>
                      @endif
                    </div>
			  		
			  		<div class="form-group">
			  			<button type="button submit" class="btn btn-primary btn-rounded btn-floating">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection