@extends('auths.layouts.app')
@section('title','Pemesanan')
@section('content')
  <div class="card">
    <div class="card-header">
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>Order ID</td>
              <td>Customer</td>
              <td>Jenis Reklame</td>
              <td>Status Reklame</td>
              <td>Tanggal Pemesanan</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              @foreach($pemesanan as $pemesanan)
                <tr>
                  <td>#{{$pemesanan->kode_pemesanan}}</td>
                  <td><a href="#" title="{{$pemesanan->user->no_telp}}">{{$pemesanan->user->nama_lengkap}}</a></td>
                  <td>{{$pemesanan->reklame->nama_jenis_reklame}}</td>
                  <td>
                    @if($pemesanan->status_reklame == 0)
                        <a href="#" class="badge bg-warning">tunda</a>
                    @elseif($pemesanan->status_reklame == 1)
                        <a href="#" class="badge bg-success">aktif</a>
                    @elseif($pemesanan->status_reklame == 2)
                        <a href="#" class="badge bg-gray">non aktif</a>
                    @endif
                  </td>
                  <td>{{$pemesanan->created_at->format('d F Y')}}</td>
                  <td>
                    <a href="{{url(config('app.root').'/pemesanan/'.$pemesanan->id)}}" class="badge bg-info">selengkapnya</a>
                    <form method="post" action="{{ route('pemesanan').'/'.$pemesanan->id }}" style="display:inline">
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