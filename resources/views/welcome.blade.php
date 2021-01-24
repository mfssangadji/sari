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

    <!-- Custom styles for this template -->
    <link href="{{asset('welcome/cover.css')}}" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">DISPERKIM</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Beranda</a>
            @if (Auth::check() && auth()->user()->status == 4)
              <a class="nav-link" href="{{route('profil')}}">Profil Saya</a>
              <a class="nav-link" href="{{route('riwayat')}}">Riwayat Pemesanan</a>
              <a class="nav-link" onclick="return confirm('Apakah anda yakin?')" href="{{route('clogout')}}">Keluar</a>
            @else
              <a class="nav-link" href="{{route('clogin')}}">Masuk</a>
              <a class="nav-link" href="{{route('cregister')}}">Daftar</a>
            @endif
            
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Welcome!</h1>
        <p class="lead">Selamat Datang di Sistem Informasi Izin Pemasangan Reklame Pada Dinas Perumahan Rakyat Kawasan Pemukiman dan Pertanahan Kota Ternate (DISPERKIM)</p>
        <p class="lead">
          <a href="{{route('creklame')}}" class="btn btn-lg btn-secondary">Lihat Jenis Reklame</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Copyright <?php echo date('Y'); ?> - DISPERKIM System
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
  </body>
</html>
