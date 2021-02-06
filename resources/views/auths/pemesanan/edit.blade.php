@extends('auths.layouts.app')
@section('title','Detail Pemesanan')
@section('content')
<div class="card card-default">
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
                  <h2><a href="{{url(config('app.root').'/customer/'.$pemesanan->user->id)}}" title="{{$pemesanan->user->no_telp}}">{{$pemesanan->user->nama_lengkap}}</a></h2>
            		  <div class="form-group">
                     <small>Order ID</small>
                     <input type="text" readonly required value="#{{$pemesanan->kode_pemesanan}}" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Jenis Reklame</small>
                     <input type="text" readonly required value="{{$pemesanan->reklame->nama_jenis_reklame}}" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Klasifikasi</small>
                     <input type="text" readonly required value="{{$pemesanan->reklame->kategori->nama_kategori}}" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Titik Reklame</small>
                     <input type="text" readonly required value="{{$pemesanan->titik_reklame->lokasi}}" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Tanggal Pemasangan:</small>
                     {{$pemesanan->tanggal_awal_pemasangan->format('d F Y')}} - {{$pemesanan->tanggal_akhir_pemasangan->format('d F Y')}}
                  </div>
                  <div class="form-group">
                     <center><small>Isi Reklame:</small></center>
                     <center><h3>{{$pemesanan->isi_reklame}}</h3></center>
                  </div>
                  <div class="form-group">
                     <small>File Pendukung</small>
                     <ul>
                       <?php
                          $exp = explode(", ", $pemesanan->file_pendukung);
                          foreach($exp as $val){
                              ?>
                              <li>{{$val}} - <a href="{{asset('uploads/'.$val)}}" target="_blank">Lihat</a></li>
                              <?php
                          }
                       ?>
                     </ul>
                  </div>
                  <div class="form-group">
                     <small>Status Perizinan:</small>
                     @if($pemesanan->status_perizinan == 0)
                        <a href="{{url()->current().'/perizinan'}}" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-warning">Belum diverifikasi</span></a> <small>(click untuk verifikasi)</small>
                     @elseif($pemesanan->status_perizinan == 1)
                        <span class="badge badge-success">Diverifikasi</span>
                     @endif
                  </div>
                  
                  @if($pemesanan->status_perizinan == 1)
                    <div class="form-group">
                     <small>Status Pembayaran:</small>
                     @if($pemesanan->status_pembayaran == 0)
                        <a href="{{url()->current().'/bayar'}}" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-warning">Belum Bayar</span></a> <small>(click untuk merubah status)</small>
                     @else
                        <span class="badge badge-success">Terbayar</span>
                     @endif
                     <form method="post" action="{{route('pemesanan').'/'.$pemesanan->id.''}}">
                        @csrf
                        @method('PATCH')
                        @if($pemesanan->status_pembayaran == 1)
                            <input type="text" placeholder="Input harga reklame" name="harga" value="{{$pemesanan->harga}}" class="form-control" disabled>
                        @else
                            <input type="text" placeholder="Input harga reklame" name="harga" value="{{$pemesanan->harga}}" class="form-control">
                        @endif
                        <input type="submit" class="btn btn-primary btn-sm" value="Tetapkan Harga" style="margin-top: 2px;">
                      </form>
                  </div>

                  <div class="form-group">
                     <small>Status Reklame:</small>
                     @if($pemesanan->status_reklame == 0)
                        <a href="{{url()->current().'/reklame'}}" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-warning">Tunda</span></a> <small>(click untuk merubah status)</small>
                     @elseif($pemesanan->status_reklame == 1)
                        <span class="badge badge-success">Aktif</span>
                     @elseif($pemesanan->status_reklame == 2)
                        <span class="badge badge-gray">Non Aktif</span>
                     @endif
                  </div>
                  @endif
            	</div>
         	</div>
      	</div>
      	<div class="card-footer">
         	<a href="{{route('pemesanan')}}" class="btn btn-default btn-sm">Kembali</a>
      	</div>
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
