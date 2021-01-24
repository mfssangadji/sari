@extends('auths.layouts.app')
@section('title','Detail Customer')
@section('content')
<div class="card card-default">
   	<form method="post" action="{{route('customer').'/'.$customer->id}}">
   		@csrf
         @method('PATCH')
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
            		  <div class="form-group">
                     <small>NIK</small>
                     <input type="text" name="nik" placeholder="NIK" readonly id="nik" value="{{$customer->nik}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>Nama Lengkap</small>
                     <input type="text" name="nik" readonly id="nik" value="{{$customer->nik}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>Email</small>
                     <input type="text" name="nik" readonly id="nik" value="{{$customer->email}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>Pekerjaan</small>
                     <input type="text" name="nik" readonly id="nik" value="{{$customer->pekerjaan}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>Jenis Kelamin</small>
                     <input type="text" name="nik" readonly id="nik" value="{{array('L'=>'Laki-laki', 'P'=>'Perempuan')[$customer->jenis_kelamin]}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>Nama Instansi</small>
                     <input type="text" name="nik" readonly id="nik" value="{{$customer->nama_instansi}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>No. Telp</small>
                     <input type="text" name="nik" readonly id="nik" value="{{$customer->no_telp}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <small>Alamat</small>
                     <input type="text" name="nik" readonly id="nik" value="{{$customer->alamat}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
            	</div>
         	</div>
      	</div>
      	<div class="card-footer">
         	<button type="button" onclick="self.history.back()" class="btn btn-default btn-sm">Kembali</button>
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
