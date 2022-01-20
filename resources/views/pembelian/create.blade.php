@extends('layouts.master')
@section('content')

<br><br>
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header"><b>Tambah Data Pembelian</b></h5>
			<form action="{{ route('pembelian.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">
                    
                    <div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
                        <label class="control-label">Id Barang</label>	
                        <input type="text" name="barang_id" class="form-control"  required>
                        @if ($errors->has('barang_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('barang_id') }}</strong>
                          </span>
                      @endif
                    </div>
			  		<div class="form-group {{ $errors->has('namabarang') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="namabarang" class="form-control"  required>
			  			@if ($errors->has('namabarang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('namabarang') }}</strong>
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
                        <input type="text" name="jumlah_barang" class="form-control"  required>
                        @if ($errors->has('jumlah_barang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('jumlah_barang') }}</strong>
                          </span>
                      @endif
                    </div> 
                    <div class="form-group {{ $errors->has('harga_barang') ? ' has-error' : '' }}">
                        <label class="control-label">Harga Barang</label>	
                        <input type="text" name="harga_barang" class="form-control"  required>
                        @if ($errors->has('harga_barang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('harga_barang') }}</strong>
                          </span>
                      @endif
                    </div>  
			  		<div class="form-group {{ $errors->has('total_harga') ? ' has-error' : '' }}">
			  			<label class="control-label">Total Harga</label>	
			  			<input type="text" name="total_harga" class="form-control"  required>
			  			@if ($errors->has('total_harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total_harga') }}</strong>
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