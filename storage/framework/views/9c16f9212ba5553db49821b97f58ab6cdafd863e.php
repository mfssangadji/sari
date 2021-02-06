
<?php $__env->startSection('title','Detail Pemesanan'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-default">
      	<div class="card-body">
         	<div class="row">
            	<div class="col-md-12">
                  <h2><a href="<?php echo e(url(config('app.root').'/customer/'.$pemesanan->user->id)); ?>" title="<?php echo e($pemesanan->user->no_telp); ?>"><?php echo e($pemesanan->user->nama_lengkap); ?></a></h2>
            		  <div class="form-group">
                     <small>Order ID</small>
                     <input type="text" readonly required value="#<?php echo e($pemesanan->kode_pemesanan); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Jenis Reklame</small>
                     <input type="text" readonly required value="<?php echo e($pemesanan->reklame->nama_jenis_reklame); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Klasifikasi</small>
                     <input type="text" readonly required value="<?php echo e($pemesanan->reklame->kategori->nama_kategori); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Titik Reklame</small>
                     <input type="text" readonly required value="<?php echo e($pemesanan->titik_reklame->lokasi); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                     <small>Tanggal Pemasangan:</small>
                     <?php echo e($pemesanan->tanggal_awal_pemasangan->format('d F Y')); ?> - <?php echo e($pemesanan->tanggal_akhir_pemasangan->format('d F Y')); ?>

                  </div>
                  <div class="form-group">
                     <center><small>Isi Reklame:</small></center>
                     <center><h3><?php echo e($pemesanan->isi_reklame); ?></h3></center>
                  </div>
                  <div class="form-group">
                     <small>File Pendukung</small>
                     <ul>
                       <?php
                          $exp = explode(", ", $pemesanan->file_pendukung);
                          foreach($exp as $val){
                              ?>
                              <li><?php echo e($val); ?> - <a href="<?php echo e(asset('uploads/'.$val)); ?>" target="_blank">Lihat</a></li>
                              <?php
                          }
                       ?>
                     </ul>
                  </div>
                  <div class="form-group">
                     <small>Status Perizinan:</small>
                     <?php if($pemesanan->status_perizinan == 0): ?>
                        <a href="<?php echo e(url()->current().'/perizinan'); ?>" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-warning">Belum diverifikasi</span></a> <small>(click untuk verifikasi)</small>
                     <?php elseif($pemesanan->status_perizinan == 1): ?>
                        <span class="badge badge-success">Diverifikasi</span>
                     <?php endif; ?>
                  </div>
                  
                  <?php if($pemesanan->status_perizinan == 1): ?>
                    <div class="form-group">
                     <small>Status Pembayaran:</small>
                     <?php if($pemesanan->status_pembayaran == 0): ?>
                        <a href="<?php echo e(url()->current().'/bayar'); ?>" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-warning">Belum Bayar</span></a> <small>(click untuk merubah status)</small>
                     <?php else: ?>
                        <span class="badge badge-success">Terbayar</span>
                     <?php endif; ?>
                     <form method="post" action="<?php echo e(route('pemesanan').'/'.$pemesanan->id.''); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <?php if($pemesanan->status_pembayaran == 1): ?>
                            <input type="text" placeholder="Input harga reklame" name="harga" value="<?php echo e($pemesanan->harga); ?>" class="form-control" disabled>
                        <?php else: ?>
                            <input type="text" placeholder="Input harga reklame" name="harga" value="<?php echo e($pemesanan->harga); ?>" class="form-control">
                        <?php endif; ?>
                        <input type="submit" class="btn btn-primary btn-sm" value="Tetapkan Harga" style="margin-top: 2px;">
                      </form>
                  </div>

                  <div class="form-group">
                     <small>Status Reklame:</small>
                     <?php if($pemesanan->status_reklame == 0): ?>
                        <a href="<?php echo e(url()->current().'/reklame'); ?>" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-warning">Tunda</span></a> <small>(click untuk merubah status)</small>
                     <?php elseif($pemesanan->status_reklame == 1): ?>
                        <span class="badge badge-success">Aktif</span>
                     <?php elseif($pemesanan->status_reklame == 2): ?>
                        <span class="badge badge-gray">Non Aktif</span>
                     <?php endif; ?>
                  </div>
                  <?php endif; ?>
            	</div>
         	</div>
      	</div>
      	<div class="card-footer">
         	<a href="<?php echo e(route('pemesanan')); ?>" class="btn btn-default btn-sm">Kembali</a>
      	</div>
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

<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/pemesanan/edit.blade.php ENDPATH**/ ?>