<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>DISPERKIM</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('welcome/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- summernote -->
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('welcome/pricing.css')}}" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">DISPERKIM</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('welcome')}}">Beranda</a>
        @if (Auth::check() && auth()->user()->status == 4)
        <a class="p-2 text-dark" href="{{route('profil')}}">Profil Saya</a>
        <a class="p-2 text-dark" href="{{route('riwayat')}}">Riwayat Pemesanan</a>
        <a class="p-2 text-dark" onclick="return confirm('Apakah anda yakin?')" href="{{route('clogout')}}">Keluar</a>
        @else
        <a class="p-2 text-dark" href="{{route('clogin')}}">Masuk</a>
        <a class="p-2 text-dark" href="{{route('cregister')}}">Daftar</a>
        @endif
      </nav>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Daftar Reklame</h1>
      <p class="lead">DISPERKIM menyediakan beberapa jenis reklame dibawah ini yang bisa anda pilih untuk melakukan pemesanan.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">

        @foreach($reklame as $reklame)
          <div class="card mb-4 box-shadow">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">{{$reklame->nama_jenis_reklame}}
                <br>
                <span class="badge badge-warning">{{$reklame->kategori->nama_kategori}}</span>
              </h4>
            </div>
            <div class="card-body">
              <h4 class="card-title pricing-card-title">Rp {{number_format($reklame->harga)}}<small class="text-muted"> (min)</small></h4>
              <!-- <ul class="list-unstyled mt-3 mb-4">
                <li>10 users included</li>
                <li>2 GB of storage</li>
                <li>Email support</li>
                <li>Help center access</li>
              </ul> -->
              <div style="clear: both;"></div>
              <p>{{$reklame->keterangan}}</p>
              <a href="{{url('reklame/'.$reklame->id.'/order')}}" class="btn btn-lg btn-block btn-outline-primary">Pesan</a>
            </div>
          </div>
        @endforeach

      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <!-- <img class="mb-2" src="{{asset('welcome/logo.png')}}" alt="" width="24" height="24"> -->
            <small class="d-block mb-3 text-muted">&copy; DISPERKIM System - <?php echo date('Y'); ?></small>
          </div>
          <!-- <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div> -->
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{asset("welcome/assets/js/vendor/jquery-slim.min.js")}}"><\/script>')</script>
    <script src="{{asset('welcome/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('welcome/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('welcome/assets/js/vendor/holder.min.js')}}"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
