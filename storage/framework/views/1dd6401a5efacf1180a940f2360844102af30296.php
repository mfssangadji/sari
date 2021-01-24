
<?php $__env->startSection('title','Customer'); ?>
<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="card-header">
        <div class="card-body">
          <table id="posttable" class="table">
            <thead>
            <tr>
              <td>Nama Lengkap</td>
              <td>Instansi</td>
              <td>Email</td>
              <td>No. Telp</td>
              <td>#</td>
            </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="#" title="NIK: <?php echo e($customer->nik); ?>"><?php echo e($customer->nama_lengkap); ?></a></td>
                  <td><?php echo e($customer->nama_instansi); ?></td>
                  <td><?php echo e($customer->email); ?></td>
                  <td><?php echo e($customer->no_telp); ?></td>
                  <td>
                    <a href="<?php echo e(url(config('app.root').'/customer/'.$customer->id)); ?>" class="badge bg-info">selengkapnya</a>
                    <form method="post" action="<?php echo e(route('customer').'/'.$customer->id); ?>" style="display:inline">
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
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/customer/index.blade.php ENDPATH**/ ?>