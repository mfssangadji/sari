<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Form Pemesanan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('welcome/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('welcome/form-validation.css')); ?>" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo e(asset('welcome/logo.png')); ?>" alt="" width="65" height="72">
        <h2>Form Pemesanan</h2>
        <p class="lead">Berikut merupakan form pemesanan reklame</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <ul class="list-group mb-3">
            <h4 class="mb-3">Menu</h4>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <a href="<?php echo e(route('welcome')); ?>" style="color: #000; text-decoration: none;">
                <div>
                  <h6 class="my-0">Beranda</h6>
                </div>
              </a>
            </li>
            <?php if(Auth::check() && auth()->user()->status == 4): ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <a href="<?php echo e(route('riwayat')); ?>" style="color: #000; text-decoration: none;">
                    <div>
                      <h6 class="my-0">Riwayat Pemesanan</h6>
                    </div>
                  </a>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <a href="<?php echo e(route('clogout')); ?>" onclick="return confirm('Apakah anda yakin?')" style="color: #000; text-decoration: none;">
                    <div>
                      <h6 class="my-0">Keluar</h6>
                    </div>
                  </a>
                </li>
            <?php else: ?>

            <?php endif; ?>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
            Order untuk Jenis Reklame <strong><?php echo e($reklame->nama_jenis_reklame); ?></strong>.<br>
            Bpk/Ibu. <strong><?php echo e(auth()->user()->nama_lengkap); ?></strong>, silahkan lengkapi form pemesanan reklame dibawah ini:
          </div>
          <h4 class="mb-3">Form Pemesanan</h4>
          <form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo e(route('porder')); ?>" novalidate>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="reklame_id" value="<?php echo e($reklame->id); ?>">
            <div class="mb-3">
              <label for="text">Jenis Reklame</label>
              <input type="text" readonly class="form-control" value="<?php echo e($reklame->nama_jenis_reklame); ?>">
            </div>
            <div class="mb-3">
              <label for="text">Harga</label>
              <input type="text" readonly class="form-control" value="Rp. <?php echo e(number_format($reklame->harga)); ?> (minimal perkiraan)">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Tanggal Awal Pemasangan</label>
                <input type="text" required class="form-control" id="tanggal_awal_pemasangan" name="tanggal_awal_pemasangan" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Tanggal Akhir Pemasangan</label>
                <input type="text" required class="form-control" id="tanggal_akhir_pemasangan" name="tanggal_akhir_pemasangan" placeholder="" value="" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="text">Isi Reklame</label>
              <textarea class="form-control" required name="isi_reklame"></textarea>
            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Upload</h4>
            <div class="mb-3">
              <label for="text">File Pendukung <span class="text-muted">(KTP dan File Reklame)</span></label>
              <input type="file" class="form-control" name="file_pendukung[]" required multiple>
            </div>
            <button class="btn btn-danger btn-lg btn-sm" onclick="return confirm('Apakah anda yakin?')" type="submit">Lakukan Pemesanan</button>
            <button class="btn btn-default btn-lg btn-sm" onclick="self.history.back()" type="button">Kembali</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo e(asset("welcome/assets/js/vendor/jquery-slim.min.js")); ?>"><\/script>')</script>
    <script src="<?php echo e(asset('welcome/assets/js/vendor/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('welcome/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('welcome/assets/js/vendor/holder.min.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      $(function () {
        $("#tanggal_awal_pemasangan").datepicker({ 
              autoclose: true, 
              todayHighlight: true,
              format: 'YYYY-mm-dd'
        }).datepicker('update', new Date());

        $("#tanggal_akhir_pemasangan").datepicker({ 
              autoclose: true, 
              todayHighlight: true,
              format: 'YYYY-mm-dd'
        }).datepicker('update', new Date());
      });
    </script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/order.blade.php ENDPATH**/ ?>