@extends('auths.layouts.app')
@section('title','Tambah Reklame')
@section('content')
<div class="card card-default">
   	<form method="post" action="{{route('reklame.store')}}">
   		@csrf
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
                  <div class="form-group">
                     @error('nama_jenis_reklame')
                        <span class="field-error">nama jenis reklame is empty</span>
                     @enderror
                     <input type="text" name="nama_jenis_reklame" placeholder="Nama Jenis Reklame" required id="nama_jenis_reklame" value="{{old('nama_jenis_reklame')}}" class="form-control @error('nama_jenis_reklame') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('name')
                        <span class="field-error">keterangan is empty</span>
                     @enderror
                     <input type="text" placeholder="Keterangan" required name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('harga')
                        <span class="field-error">harga is empty</span>
                     @enderror
                     <input type="text" name="harga" placeholder="Harga" required id="harga" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror">
                  </div>
            	</div>
         	</div>
      	</div>
      	<div class="card-footer">
         	<button type="submit" class="btn btn-info btn-sm">Process</button>
         	<button type="button" onclick="self.history.back()" class="btn btn-default btn-sm">Cancel</button>
      	</div>
   	</form>
</div>
@endsection
@section('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      width: 'resolve',
      theme: "classic",
      maximumSelectionLength: 1
    })
  })
</script>
@endsection
