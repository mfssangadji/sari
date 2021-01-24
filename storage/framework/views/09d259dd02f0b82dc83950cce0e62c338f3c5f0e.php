
<?php $__env->startSection('title','Pemesanan'); ?>
<?php $__env->startSection('content'); ?>
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
              <?php $__currentLoopData = $pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>#<?php echo e($pemesanan->kode_pemesanan); ?></td>
                  <td><a href="#" title="<?php echo e($pemesanan->user->no_telp); ?>"><?php echo e($pemesanan->user->nama_lengkap); ?></a></td>
                  <td><?php echo e($pemesanan->reklame->nama_jenis_reklame); ?></td>
                  <td>
                    <?php if($pemesanan->status_reklame == 0): ?>
                        <a href="#" class="badge bg-warning">tunda</a>
                    <?php elseif($pemesanan->status_reklame == 1): ?>
                        <a href="#" class="badge bg-success">aktif</a>
                    <?php elseif($pemesanan->status_reklame == 2): ?>
                        <a href="#" class="badge bg-gray">non aktif</a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($pemesanan->created_at->format('d F Y')); ?></td>
                  <td>
                    <a href="<?php echo e(url(config('app.root').'/pemesanan/'.$pemesanan->id)); ?>" class="badge bg-info">selengkapnya</a>
                    <form method="post" action="<?php echo e(route('pemesanan').'/'.$pemesanan->id); ?>" style="display:inline">
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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/pemesanan/index.blade.php ENDPATH**/ ?>