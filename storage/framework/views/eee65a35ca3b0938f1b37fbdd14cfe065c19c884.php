<title>Pelaporan</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<style type="text/css">
  <style type="text/css">
  @media  print{@page  {size: landscape}}
</style>
<div class="card">
<div class="card-header">
    <div class="card-body">
      <table id="posttable" class="table">
        <thead>
        <tr>
          <td>Order ID</td>
          <td>Nama Instansi</td>
          <td>Klasifikasi Reklame</td>
          <td>Jenis Reklame</td>
          <td>Titik Reklame</td>
          <td>Tgl. Awal Pemasangan</td>
          <td>Tgl. Akhir Pemasangan</td>
          <td>Harga</td>
        </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>#<?php echo e($pemesanan->kode_pemesanan); ?></td>
              <td><?php echo e($pemesanan->user->nama_instansi); ?></td>
              <td><?php echo e($pemesanan->reklame->kategori->nama_kategori); ?></td>
              <td><?php echo e($pemesanan->reklame->nama_jenis_reklame); ?></td>
              <td><?php echo e($pemesanan->titik_reklame->lokasi); ?></td>
              <td><?php echo e($pemesanan->tanggal_awal_pemasangan->format('d F Y')); ?></td>
              <td><?php echo e($pemesanan->tanggal_akhir_pemasangan->format('d F Y')); ?></td>
              <td><?php echo e($pemesanan->harga); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#posttable').DataTable({
            dom: 'Bfrtip',
            buttons: ['print', 'excel', {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL' }]
        });
    });
</script><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/pelaporan/create.blade.php ENDPATH**/ ?>