<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
   <head>
      <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="description" content="Health Care Medical Html5 Template">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
       
       <?php echo SEO::generate(); ?>

       <?php echo JsonLdMulti::generate(); ?>

       <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
       <!-- Favicon -->
       <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('uploads/favicon.ico')); ?>" />

      <!-- 
       Essential stylesheets
       =====================================-->
      <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/plugins/bootstrap/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/plugins/icofont/icofont.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/plugins/slick-carousel/slick/slick.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/plugins/slick-carousel/slick/slick-theme.css')); ?>">

      <!-- Main Stylesheet -->
      <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">

      <!--=====================================
         CSS LINK PART START
         =======================================-->
      <?php echo e(Helper::autoload_main_site_data()); ?>  



      <?php echo $__env->yieldPushContent('style'); ?>
      <!--=====================================
         CSS LINK PART END
         =======================================-->

         
   </head>
   <body id="top">

  <!--=====================================
         NAVBAR PART START
         =======================================-->
     
         <?php if(Cache::has('marketing_tool')): ?>
         <?php
         $tools=Cache::get('marketing_tool');
         $tools=json_encode($tools);
         $tools=json_decode($tools ?? '');
         ?>
         <?php if(isset($tools->fb_pixel_status)): ?>
         <?php if($tools->fb_pixel_status == 'on'): ?>
         <?php echo facebook_pixel($tools->fb_pixel); ?>

         <?php endif; ?>
         <?php endif; ?>

         <?php endif; ?>
      <header>
<?php if(Cache::has('site_info')): ?>
<?php
$site_info=Cache::get('site_info');
?>
   <div class="header-top-bar">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6">
               <ul class="top-bar-info list-inline-item pl-0 mb-0">
                  <li class="list-inline-item"><a href="mailto:<?php echo e($site_info->email1); ?>"><i class="icofont-support-faq mr-2"></i><?php echo e($site_info->email1); ?></a></li>
                  <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i><?php echo e($site_info->address); ?> </li>
               </ul>
            </div>
            <div class="col-lg-6">
               <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                 <?php if(Cache::has('active_languages')): ?>
                 <?php
                 $langs=Cache::get('active_languages');
                 ?>
                  <form class="translate_form" action="<?php echo e(route('translate')); ?>">
                   <select class="translate_option" name="local">
                     <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($key); ?>"  <?php if(Session::get('locale') == $key): ?> selected <?php endif; ?>><?php echo e($row); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                 </form>
                 <?php endif; ?>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
<?php endif; ?>   
   <nav class="navbar navbar-expand-lg navigation" id="navbar">
      <div class="container">
         <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="" class="img-fluid">
         </a>

         <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
            aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icofont-navigation-menu"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarmain">
            <ul class="navbar-nav ml-auto">
               <?php echo e(Menu('header','nav-item dropdown','navbar-item','navbar-link','',true)); ?>             
            </ul>
         </div>
      </div>
   </nav>
</header>

<!--=====================================
NAVBAR PART END
=======================================-->

   <?php echo $__env->yieldContent('content'); ?>



<!--=====================================
FOOTER PART START
=======================================-->

<footer class="footer section ">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 mr-auto col-sm-6">
            <div class="widget mb-5 mb-lg-0">
               <div class="logo mb-4">
                
                   <a href="<?php echo e(url('/')); ?>"><img  class="img-fluid" src="<?php echo e(asset('uploads/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" ></a>
               </div>
               <?php if(Cache::has('site_info')): ?>
               <?php
               $site_info=Cache::get('site_info');
               ?>
               <p><?php echo e($site_info->site_description); ?></p>

               <ul class="list-inline footer-socials mt-4">
                  <?php if(!empty($site_info->facebook)): ?>
                  <li class="list-inline-item"><a href="<?php echo e($site_info->facebook); ?>"><i class="icofont-facebook"></i></a></li>
                  <?php endif; ?>
                   <?php if(!empty($site_info->twitter)): ?>
                  <li class="list-inline-item"><a href="<?php echo e($site_info->twitter); ?>"><i class="icofont-twitter"></i></a></li>
                  <?php endif; ?>
                  <?php if(!empty($site_info->linkedin)): ?>
                  <li class="list-inline-item"><a href="<?php echo e($site_info->linkedin); ?>"><i class="icofont-linkedin"></i></a></li>
                  <?php endif; ?>
                   <?php if(!empty($site_info->instagram)): ?>
                  <li class="list-inline-item"><a href="<?php echo e($site_info->instagram); ?>"><i class="icofont-instagram"></i></a></li>
                  <?php endif; ?>
                  <?php if(!empty($site_info->youtube)): ?>
                  <li class="list-inline-item"><a href="<?php echo e($site_info->youtube); ?>"><i class="icofont-youtube"></i></a></li>
                  <?php endif; ?>
               </ul>
               <?php endif; ?>
            </div>
         </div>

         <div class="col-lg-2 col-md-6 col-sm-6">
           
            <?php echo e(main_footer_menu('footer_left','','','','top',true)); ?>

         </div>

         <div class="col-lg-2 col-md-6 col-sm-6">
             <?php echo e(main_footer_menu('footer_center','','','','top',true)); ?>

         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
             <?php echo e(main_footer_menu('footer_right','','','','top',true)); ?>

         </div>

         
      </div>
      
      <div class="footer-btm py-4 mt-5">
         <div class="row align-items-center justify-content-between">
            <div class="col-lg-12 text-center">
               <div class="copyright">
                  &copy; Copyright Reserved  by <a href="<?php echo e(url('/')); ?>" ><?php echo e(env('APP_NAME')); ?></a>
               </div>
            </div>
            
         </div>

         <div class="row">
            <div class="col-lg-4">
               <a class="backtop js-scroll-trigger" href="#top">
                  <i class="icofont-long-arrow-up"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</footer>



<!--=====================================
FOOTER PART END
=======================================-->
<!--=====================================
JS LINK PART START
=======================================-->
<script src="<?php echo e(asset('assets/frontend/plugins/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/plugins/slick-carousel/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/script.js')); ?>"></script>
<?php echo $__env->yieldPushContent('js'); ?>

<?php if(Cache::has('marketing_tool')): ?>
       <?php
       $tools=Cache::get('marketing_tool');
       $tools=json_encode($tools);
       $tools=json_decode($tools ?? '');
       ?>
       <?php if(isset($tools->google_status)): ?>
       <?php if($tools->google_status == 'on'): ?>
       <?php echo google_analytics($tools->ga_measurement_id); ?>

       <?php endif; ?>
       <?php endif; ?>

       <?php endif; ?>
   </body>
</html><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/main/app.blade.php ENDPATH**/ ?>