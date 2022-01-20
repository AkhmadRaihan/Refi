@extends('layouts.master')
@section('content')
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{route('penjualan.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kembali</a>
			<h5 class="card-header"><b>Edit Data Besi</b></h5>
			<form action="{{ route('penjualan.update',$barang->id) }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
        			<input type="hidden" name="id" value="{{ request()->get('id') }}">

                    
			  		<div class="form-group {{ $errors->has('namabarang') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="namabarang" class="form-control" value="{{ $barang->namabarang }}"  required>
			  			@if ($errors->has('namabarang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('namabarang') }}</strong>
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
                    
                    <div class="form-group {{ $errors->has('jumlah_barang') ? ' has-error' : '' }}">
                        <label class="control-label">Jumlah Barang</label>	
                        <input type="text" name="jumlah_barang" class="form-control" value="{{ $barang->jumlah_barang }}"  required>
                        @if ($errors->has('jumlah_barang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('jumlah_barang') }}</strong>
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

			  		<div class="form-group {{ $errors->has('total_harga') ? ' has-error' : '' }}">
			  			<label class="control-label">Total Harga</label>	
			  			<input type="text" name="total_harga" class="form-control" value="{{ $barang->total_harga }}"  required>
			  			@if ($errors->has('total_harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total_harga') }}</strong>
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