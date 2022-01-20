@extends('layouts.master')
@section('content')
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{route('stok_barang.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header"><b>Edit Data Besi</b></h5>
			<form action="{{ route('stok_barang.update',$barang->id) }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
        			<input type="hidden" name="id" value="{{ request()->get('id') }}">

			  		<div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}"  required>
			  			@if ($errors->has('nama_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jenis_barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Jenis Barang</label>	
			  			<input type="text" name="jenis_barang" class="form-control" value="{{ $barang->jenis_barang }}"  required>
			  			@if ($errors->has('jenis_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenis_barang') }}</strong>
                            </span>
                        @endif
			  		</div>
                    
                    <div class="form-group {{ $errors->has('harga_barang') ? ' has-error' : '' }}">
                        <label class="control-label">Harga Barang</label>	
                        <input type="text" name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}"  required>
                        @if ($errors->has('harga_barang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('harga_barang') }}</strong>
                          </span>
                      @endif
                    </div>  

			  		<div class="form-group {{ $errors->has('stok') ? ' has-error' : '' }}">
			  			<label class="control-label">Stok Barang</label>	
			  			<input type="text" name="stok" class="form-control" value="{{ $barang->stok }}"  required>
			  			@if ($errors->has('stok'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stok') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Selesai</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection