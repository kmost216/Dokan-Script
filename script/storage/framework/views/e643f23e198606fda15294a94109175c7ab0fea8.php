<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo e(config('app.name', 'Laravel')); ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
  <!-- INCLUDE FONTS --> 
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/fontawsome/all.min.css')); ?>">
  <link href="//fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet">
  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/font/flaticon.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
  
  <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <?php echo $__env->make('layouts/partials/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layouts/partials/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         <?php echo $__env->yieldContent('head'); ?>
         <div class="section-body">
         </div>
       </section>
       <?php echo $__env->yieldContent('content'); ?>
     </div>
     <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; <?php echo e(date('Y')); ?> <div class="bullet"></div> Powered By <a href="<?php echo e(url('/')); ?>"><?php echo e(env('APP_NAME')); ?> v2.6.1</a>
      </div>
      
    </footer>
  </div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.nicescroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert2.all.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('js'); ?>
<script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
<!-- Template JS File -->
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/layouts/app.blade.php ENDPATH**/ ?>