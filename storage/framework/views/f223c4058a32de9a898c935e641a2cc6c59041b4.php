
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<!-- Main content -->
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="callout callout-info">
            <h4>Selamat datang!</h4>
            <p>Anda disini sebagai <strong>Administrator</strong>, pada samping laman website, terdapat beberapa menu yang dapat anda telusuri untuk melakukan pengelolaan data. Terima kasih</p>
         </div>
      <div class="row">
         <div class="col-12 col-sm-12 col-md-12" style="text-align: center;">
            <img src="<?php echo e(asset('wel.png')); ?>" style="width: 100%; text-align: center; border-radius:5px;">   
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!--/. container-fluid -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/dashboard.blade.php ENDPATH**/ ?>