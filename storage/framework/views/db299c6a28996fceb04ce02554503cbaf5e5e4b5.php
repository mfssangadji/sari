<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Cpanel - <?php echo $__env->yieldContent('title'); ?></title>
      <?php echo $__env->make('auths.parts.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <style type="text/css">
         .field-error {
             color: #db0700;
             font-size: 12px;
         }
      </style>
      <?php echo $__env->yieldContent('style'); ?>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
      <div class="wrapper">
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item d-none d-sm-inline-block">
                  <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">Beranda</a>
               </li>
            </ul>
         </nav>
         <?php echo $__env->make('auths.parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="content-wrapper">
            <section class="content">
               <div class="row">
                 <div class="col-12">
                     <div style="padding: 1px"></div>
                     <?php echo $__env->yieldContent('content'); ?>
                 </div>
              </div>
           </section>
         </div>
         <?php echo $__env->make('auths.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <?php echo $__env->make('auths.parts.plugin-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('scripts'); ?>
   </body>
</html>
<?php /**PATH C:\xampp\htdocs\scripty\sari\resources\views/auths/layouts/app.blade.php ENDPATH**/ ?>