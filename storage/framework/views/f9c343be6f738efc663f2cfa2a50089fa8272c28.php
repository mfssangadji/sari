
<?php $__env->startSection('title','Ubah Reklame'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-default">
   	<form method="post" action="<?php echo e(route('reklame').'/'.$reklame->id); ?>">
   		<?php echo csrf_field(); ?>
         <?php echo method_field('PATCH'); ?>
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
                  <div class="form-group">
                     <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error">kategori is empty</span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <small>Pilih Kategori Reklame:</small>
                     <select class="form-control select2" required style="width: 100%" multiple="multiple" id="kategori_id" name="kategori_id">
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($val->id == $reklame->kategori_id): ?>
                            <option value="<?php echo e($val->id); ?>" selected><?php echo e($val->nama_kategori); ?></option>
                          <?php else: ?>
                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->nama_kategori); ?></option>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
            		  <div class="form-group">
                     <?php $__errorArgs = ['nama_jenis_reklame'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error">nama jenis reklame is empty</span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <input type="text" name="nama_jenis_reklame" placeholder="Nama Jenis Reklame" required id="nama_jenis_reklame" value="<?php echo e($reklame->nama_jenis_reklame); ?>" class="form-control <?php $__errorArgs = ['nama_jenis_reklame'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error">keterangan is empty</span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <input type="text" value="<?php echo e($reklame->keterangan); ?>" placeholder="Keterangan" required name="keterangan" id="keterangan" class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  </div>
                  <div class="form-group">
                     <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error">harga is empty</span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <input type="text" name="harga" value="<?php echo e($reklame->harga); ?>" placeholder="Harga" required id="harga" class="form-control <?php $__errorArgs = ['harga'];
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
         	<button type="submit" class="btn btn-info btn-sm">Process</button>
         	<button type="button" onclick="self.history.back()" class="btn btn-default btn-sm">Cancel</button>
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

<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/reklame/edit.blade.php ENDPATH**/ ?>