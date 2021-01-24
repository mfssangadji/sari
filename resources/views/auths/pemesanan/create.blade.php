@extends('auths.layouts.app')
@section('title','Tambah Pengguna')
@section('content')
<div class="card card-default">
   	<form method="post" action="{{route('users.store')}}">
   		@csrf
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
                  <div class="form-group">
                     @error('nik')
                        <span class="field-error">nik is empty</span>
                     @enderror
                     <input type="text" name="nik" placeholder="NIK" required id="nik" value="{{old('nik')}}" class="form-control @error('nik') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('password')
                        <span class="field-error">password is empty</span>
                     @enderror
                     <input type="password" placeholder="Password" required name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('name')
                        <span class="field-error">nama lengkap is empty</span>
                     @enderror
                     <input type="text" placeholder="Nama lengkap" required name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('email')
                        <span class="field-error">email is empty</span>
                     @enderror
                     <input type="email" name="email" placeholder="Email" required id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('no_telp')
                        <span class="field-error">no. telp is empty</span>
                     @enderror
                     <input type="number" name="no_telp" required placeholder="No. Telp" id="no_telp" value="{{old('no_telp')}}" class="form-control @error('no_telp') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     @error('status')
                        <span class="field-error">status is empty</span>
                     @enderror
                     <small>Pilih Status Pengguna:</small>
                     <select class="form-control select2" required style="width: 100%" multiple="multiple" id="status" name="status">
                        @foreach($pengguna as $key => $val)
                          <option value="{{(int)$key}}">{{$val}}</option>
                        @endforeach
                      </select>
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
