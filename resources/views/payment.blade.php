<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Upload Bukti Pembayaran</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('welcome/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('welcome/form-validation.css')}}" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('welcome/logo.png')}}" alt="" width="65" height="72">
        <h2>Upload Bukti Pembayaran</h2>
        <p class="lead">Silahkan upload bukti pembayaran anda untuk Pemesanan Reklame dengan <strong>(Order ID #{{$pemesanan->kode_pemesanan}})</strong></p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <ul class="list-group mb-3">
            <h4 class="mb-3">Menu</h4>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <a href="{{route('welcome')}}" style="color: #000; text-decoration: none;">
                <div>
                  <h6 class="my-0">Beranda</h6>
                </div>
              </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <a href="{{route('creklame')}}" style="color: #000; text-decoration: none;">
                <div>
                  <h6 class="my-0">Jenis Reklame</h6>
                </div>
              </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <a href="{{route('riwayat')}}" style="color: #000; text-decoration: none;">
                <div>
                  <h6 class="my-0">Riwayat Pemesanan</h6>
                </div>
              </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <a href="{{route('clogout')}}" style="color: #000; text-decoration: none;" onclick="return confirm('Apakah anda yakin?')">
                <div>
                  <h6 class="my-0">Keluar</h6>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Form Upload</h4>
          <form class="needs-validation" method="POST" action="{{url('riwayat/'.Request::segment(2).'/payment')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mb-3">
              <label for="email">Bukti Pembayaran</label>
              <input type="file" required id="file" name="file" required>
            </div>


            <hr class="mb-4">
            <button class="btn btn-info btn-lg btn-block" type="submit">Upload</button>
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
    <script>window.jQuery || document.write('<script src="{{asset("welcome/assets/js/vendor/jquery-slim.min.js")}}"><\/script>')</script>
    <script src="{{asset('welcome/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('welcome/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('welcome/assets/js/vendor/holder.min.js')}}"></script>
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
    </script>
  </body>
</html>
