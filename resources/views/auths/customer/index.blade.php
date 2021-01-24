@extends('auths.layouts.app')
@section('title','Customer')
@section('content')
  <div class="card">
    <div class="card-header">
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>Nama Lengkap</td>
              <td>Instansi</td>
              <td>Email</td>
              <td>No. Telp</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              @foreach($customer as $customer)
                <tr>
                  <td><a href="#" title="NIK: {{$customer->nik}}">{{$customer->nama_lengkap}}</a></td>
                  <td>{{$customer->nama_instansi}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->no_telp}}</td>
                  <td>
                    <a href="{{url(config('app.root').'/customer/'.$customer->id)}}" class="badge bg-info">selengkapnya</a>
                    <form method="post" action="{{ route('customer').'/'.$customer->id }}" style="display:inline">
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