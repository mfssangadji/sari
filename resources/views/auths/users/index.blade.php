@extends('auths.layouts.app')
@section('title','Pengguna')
@section('content')
  <div class="card">
    <div class="card-header">
          <a href="{{route('users.add')}}" class="btn btn-info btn-sm">Tambah Pengguna</a>
        </div>
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>No</td>
              <td>NIK</td>
              <td>Nama Lengkap</td>
              <td>Email</td>
              <td>No. Telp</td>
              <td>Status</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$user->nik}}</td>
                  <td>{{$user->nama_lengkap}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->no_telp}}</td>
                  <td>{{$pengguna[$user->status]}}</td>
                  <td>
                    <a href="{{ route('users').'/'.$user->id.'/edit' }}" class="badge bg-info">edit</a>
                    <form method="post" action="{{ route('users').'/'.$user->id }}" style="display:inline">
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