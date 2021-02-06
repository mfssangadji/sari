@extends('auths.layouts.app')
@section('title','Titik Lokasi')
@section('content')
  <div class="card">
    <div class="card-header">
          <a href="{{route('titik.add')}}" class="btn btn-info btn-sm">Tambah Titik</a>
        </div>
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>No</td>
              <td>Reklame</td>
              <td>Lokasi</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              @foreach($titik as $titik)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$titik->reklame->nama_jenis_reklame}} ({{$titik->reklame->kategori->nama_kategori}})</td>
                  <td>{{$titik->lokasi}}</td>
                  <td>
                    <a href="{{ route('titik').'/'.$titik->id.'/edit' }}" class="badge bg-info">edit</a>
                    <form method="post" action="{{ route('titik').'/'.$titik->id }}" style="display:inline">
                      @method('DELETE')
                      @csrf
                    <button type="submit" class="badge bg-red" onclick="return confirm('are you sure?')" style="border: none;">hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
@section('scripts')
<script>
  $(function () {
    $("#posttable").DataTable({
      "paging": true,
      "lengtdChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidtd": true,
      "responsive": true,
    });
  });
</script>
@endsection