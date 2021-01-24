@extends('auths.layouts.app')
@section('title','Reklame')
@section('content')
  <div class="card">
    <div class="card-header">
          <a href="{{route('reklame.add')}}" class="btn btn-info btn-sm">Tambah Reklame</a>
        </div>
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>No</td>
              <td>Nama Jenis Reklame</td>
              <td>Keterangan</td>
              <td>Harga</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              @foreach($reklame as $reklame)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$reklame->nama_jenis_reklame}}</td>
                  <td>{{$reklame->keterangan}}</td>
                  <td>Rp. {{number_format($reklame->harga)}}</td>
                  <td>
                    <a href="{{ route('reklame').'/'.$reklame->id.'/edit' }}" class="badge bg-info">edit</a>
                    <form method="post" action="{{ route('reklame').'/'.$reklame->id }}" style="display:inline">
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