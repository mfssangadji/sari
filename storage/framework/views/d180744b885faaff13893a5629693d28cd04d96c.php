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
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <!-- summernote -->
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('welcome/pricing.css')); ?>" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">DISPERKIM</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?php echo e(route('welcome')); ?>">Beranda</a>
        <?php if(Auth::check() && auth()->user()->status == 4): ?>
        <a class="p-2 text-dark" href="<?php echo e(route('profil')); ?>">Profil Saya</a>
        <a class="p-2 text-dark" href="<?php echo e(route('creklame')); ?>">Jenis Reklame</a>
        <a class="p-2 text-dark" onclick="return confirm('Apakah anda yakin?')" href="<?php echo e(route('clogout')); ?>">Keluar</a>
        <?php else: ?>
        <a class="p-2 text-dark" href="<?php echo e(route('clogin')); ?>">Masuk</a>
        <a class="p-2 text-dark" href="<?php echo e(route('cregister')); ?>">Daftar</a>
        <?php endif; ?>
      </nav>
    </div>

    <div class="container-fluid">
      <?php if($message = Session::get('pemesanan-success')): ?>
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <?php echo e($message); ?>

        </div>
      <?php endif; ?>

      <?php if($message = Session::get('payment-success')): ?>
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <?php echo e($message); ?>

        </div>
      <?php endif; ?>
      
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>Order ID</td>
              <td>Jenis Reklame</td>
              <td>Tgl. Pemasangan</td>
              <td>Isi Reklame</td>
              <td>File Pendukung</td>
              <td>Status Perizinan</td>
              <td>Status Pembayaran</td>
              <td>Status Reklame</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>#<?php echo e($p->kode_pemesanan); ?></td>
                      <td><?php echo e($p->reklame->nama_jenis_reklame); ?></td>
                      <td><?php echo e($p->tanggal_awal_pemasangan->format('d-m-Y')); ?> - <?php echo e($p->tanggal_akhir_pemasangan->format('d-m-Y')); ?></td>
                      <td><?php echo e($p->isi_reklame); ?></td>
                      <td>
                         <?php
                            $exp = explode(', ', $p->file_pendukung);
                            foreach($exp as $val){
                                ?>
                                <a href="<?php echo e(asset('uploads/'.$val)); ?>" target="_blank"><?php echo e($val); ?></a><br>
                                <?php
                            }
                         ?>
                      </td>
                      <td>
                        <?php if($p->status_perizinan == 0): ?>
                          <span class="badge badge-warning">Belum diverifikasi</span>
                        <?php elseif($p->status_perizinan == 1): ?>
                          <span class="badge badge-success">Diverifikasi</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if($p->status_perizinan == 1 && $p->pembayaran->count() == 0): ?>
                          <a href="<?php echo e(url('riwayat/'.$p->id.'/payment')); ?>"><span class="badge badge-warning">Upload Bukti Pembayaran</span></a>
                        <?php elseif($p->status_perizinan == 1 && $p->pembayaran->count() > 0): ?>
                          <?php if($p->pembayaran->last()->status_pembayaran == 0): ?>
                              <span class="badge badge-warning">Belum diverifikasi</span> <a href="<?php echo e(asset('uploads/'.$p->pembayaran->last()->file_bukti_transfer)); ?>" target="_blank"><span class="badge badge-success">Lihat</span></a>
                          <?php else: ?>
                              <span class="badge badge-success">Diverifikasi</span> <a href="<?php echo e(asset('uploads/'.$p->pembayaran->last()->file_bukti_transfer)); ?>" target="_blank"><span class="badge badge-success">Lihat</span></a>
                          <?php endif; ?>
                        <?php else: ?>
                          -
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if($p->status_reklame == 0): ?>
                          <span class="badge badge-warning">Tunda</span>
                        <?php elseif($p->status_reklame == 1): ?>
                          <span class="badge badge-success">Aktif</span>
                        <?php elseif($p->status_reklame == 2): ?>
                          <span class="badge badge-danger">Non Aktif</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <form method="post" action="<?php echo e(url('riwayat').'/'.$p->id); ?>" style="display:inline">
                          <?php echo method_field('DELETE'); ?>
                          <?php echo csrf_field(); ?>
                        <button type="submit" class="badge bg-red" onclick="return confirm('are you sure?')" style="border: none;">hapus</button>
                        </form>
                      </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo e(asset("welcome/assets/js/vendor/jquery-slim.min.js")); ?>"><\/script>')</script>
    <script src="<?php echo e(asset('welcome/assets/js/vendor/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('welcome/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('welcome/assets/js/vendor/holder.min.js')); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });

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
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/riwayat.blade.php ENDPATH**/ ?>