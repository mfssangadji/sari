
<?php $__env->startSection('title','Detail Customer'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-default">
   	<form method="post" action="<?php echo e(route('customer').'/'.$customer->id); ?>">
   		<?php echo csrf_field(); ?>
         <?php echo method_field('PATCH'); ?>
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
            		  <div class="form-group">
                     <small>NIK</small>
                     <input type="text" name="nik" placeholder="NIK" readonly id="nik" value="<?php echo e($customer->nik); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>Nama Lengkap</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e($customer->nik); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>Email</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e($customer->email); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>Pekerjaan</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e($customer->pekerjaan); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>Jenis Kelamin</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e(array('L'=>'Laki-laki', 'P'=>'Perempuan')[$customer->jenis_kelamin]); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>Nama Instansi</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e($customer->nama_instansi); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>No. Telp</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e($customer->no_telp); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <small>Alamat</small>
                     <input type="text" name="nik" readonly id="nik" value="<?php echo e($customer->alamat); ?>" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
            	</div>
         	</div>
      	</div>
      	<div class="card-footer">
         	<button type="button" onclick="self.history.back()" class="btn btn-default btn-sm">Kembali</button>
      	</div>
   	</form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      width: 'resolve',
      theme: "classic",
      maximumSelectionLength: 1
    })
  })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/customer/edit.blade.php ENDPATH**/ ?>