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
    <link href="<?php echo e(asset('welcome/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('welcome/cover.css')); ?>" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">DISPERKIM</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Beranda</a>
            <?php if(Auth::check() && auth()->user()->status == 4): ?>
              <a class="nav-link" href="<?php echo e(route('profil')); ?>">Profil Saya</a>
              <a class="nav-link" href="<?php echo e(route('riwayat')); ?>">Riwayat Pemesanan</a>
              <a class="nav-link" onclick="return confirm('Apakah anda yakin?')" href="<?php echo e(route('clogout')); ?>">Keluar</a>
            <?php else: ?>
              <a class="nav-link" href="<?php echo e(route('clogin')); ?>">Masuk</a>
              <a class="nav-link" href="<?php echo e(route('cregister')); ?>">Daftar</a>
            <?php endif; ?>
            
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Welcome!</h1>
        <p class="lead">Selamat Datang di Sistem Informasi Izin Pemasangan Reklame Pada Dinas Perumahan Rakyat Kawasan Pemukiman dan Pertanahan Kota Ternate (DISPERKIM)</p>
        <p class="lead">
          <a href="<?php echo e(route('creklame')); ?>" class="btn btn-lg btn-secondary">Lihat Jenis Reklame</a>
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
    <script>window.jQuery || document.write('<script src="<?php echo e(asset("welcome/assets/js/vendor/jquery-slim.min.js")); ?>"><\/script>')</script>
    <script src="<?php echo e(asset('welcome/assets/js/vendor/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('welcome/dist/js/bootstrap.min.js')); ?>"></script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/welcome.blade.php ENDPATH**/ ?>