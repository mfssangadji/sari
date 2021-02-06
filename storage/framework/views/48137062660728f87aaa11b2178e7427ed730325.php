
<?php $__env->startSection('title','Titik Lokasi'); ?>
<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="card-header">
          <a href="<?php echo e(route('titik.add')); ?>" class="btn btn-info btn-sm">Tambah Titik</a>
        </div>
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>No</td>
              <td>Reklame</td>
              <td>Lokasi</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $titik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $titik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><?php echo e($titik->reklame->nama_jenis_reklame); ?> (<?php echo e($titik->reklame->kategori->nama_kategori); ?>)</td>
                  <td><?php echo e($titik->lokasi); ?></td>
                  <td>
                    <a href="<?php echo e(route('titik').'/'.$titik->id.'/edit'); ?>" class="badge bg-info">edit</a>
                    <form method="post" action="<?php echo e(route('titik').'/'.$titik->id); ?>" style="display:inline">
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
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/titik/index.blade.php ENDPATH**/ ?>