@extends('auths.layouts.app')
@section('title','Tambah Titik Reklame')
@section('content')
<div class="card card-default">
   	<form method="post" action="{{route('titik.store')}}">
   		@csrf
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
                  <div class="form-group">
                     @error('reklame_id')
                        <span class="field-error">reklame is empty</span>
                     @enderror
                     <small>Pilih Reklame:</small>
                     <select class="form-control select2" required style="width: 100%" multiple="multiple" id="reklame_id" name="reklame_id">
                        @foreach($reklame as $val)
                          <option value="{{$val->id}}">{{$val->nama_jenis_reklame}} ({{$val->kategori->nama_kategori}})</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                     @error('lokasi')
                        <span class="field-error">lokasi is empty</span>
                     @enderror
                     <input type="text" name="lokasi" placeholder="Lokasi" required id="lokasi" value="{{old('lokasi')}}" class="form-control @error('lokasi') is-invalid @enderror">
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
