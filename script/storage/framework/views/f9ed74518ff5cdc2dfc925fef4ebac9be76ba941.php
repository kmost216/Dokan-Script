
<?php $__env->startSection('content'); ?>

<!-- Slider Start -->
<section class="banner" style="background-image: url('<?php echo e(asset($header->preview ?? '')); ?>');">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-xl-7">
        <div class="block">
          <div class="divider mb-3"></div>
          <span class="text-uppercase text-sm letter-spacing "><?php echo e($header->title ?? ''); ?></span>
          <h1 class="mb-3 mt-3"><?php echo e($header->highlight_title ?? ''); ?></h1>
          
          <p class="mb-4 pr-5"><?php echo e($header->description ?? ''); ?></p>
          <div class="btn-container ">
            <a href="#priceing" class="btn btn-main-2 btn-icon btn-round-full"><?php echo e(__('Get Start Now')); ?> <i class="icofont-simple-right ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="feature-block d-lg-flex">
          <div class="feature-item mb-5 mb-lg-0">
            <div class="feature-icon mb-4">
              <i class="<?php echo e($about_1->preview); ?>"></i>
            </div>
            
            <h4 class="mb-3"><?php echo e($about_1->title); ?></h4>
            <p class="mb-4"><?php echo e($about_1->description); ?></p>
            <?php if(!empty($about_1->btn_text) && !empty($about_1->btn_link)): ?>
            <a href="<?php echo e(url($about_1->btn_link)); ?>" class="btn btn-main btn-round-full"><?php echo e($about_1->btn_text); ?></a>
            <?php endif; ?>
          </div>
        
          <div class="feature-item mb-5 mb-lg-0">
            <div class="feature-icon mb-4">
              <i class="<?php echo e($about_2->preview); ?>"></i>
            </div>
            
            <h4 class="mb-3"><?php echo e($about_2->title); ?></h4>
            <p class="mb-4"><?php echo e($about_2->description); ?></p>
            <?php if(!empty($about_2->btn_text) && !empty($about_2->btn_link)): ?>
            <a href="<?php echo e(url($about_2->btn_link)); ?>" class="btn btn-main btn-round-full"><?php echo e($about_2->btn_text); ?></a>
            <?php endif; ?>
          </div>
        
          <div class="feature-item mb-5 mb-lg-0">
            <div class="feature-icon mb-4">
              <i class="<?php echo e($about_3->preview); ?>"></i>
            </div>
            
            <h4 class="mb-3"><?php echo e($about_3->title); ?></h4>
            <p class="mb-4"><?php echo e($about_3->description); ?></p>
            <?php if(!empty($about_3->btn_text) && !empty($about_3->btn_link)): ?>
            <a href="<?php echo e(url($about_3->btn_link)); ?>" class="btn btn-main btn-round-full"><?php echo e($about_3->btn_text); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 col-sm-6">
        <div class="about-img">

          <img src="<?php echo e($ecom_features->top_image); ?>" alt="" class="img-fluid">
          <img src="<?php echo e($ecom_features->bottom_image); ?>" alt="" class="img-fluid mt-4">
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="about-img mt-4 mt-lg-0">
          <img src="<?php echo e($ecom_features->center_image); ?>" alt="" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="about-content pl-4 mt-4 mt-lg-0">
          <h2 class="title-color"><?php echo e($ecom_features->area_title); ?></h2>
          <p class="mt-4 mb-5"><?php echo e($ecom_features->description); ?></p>
          <?php if(!empty($ecom_features->btn_link) && !empty($ecom_features->btn_text)): ?>
          <a href="<?php echo e(url($ecom_features->btn_link)); ?>" class="btn btn-main-2 btn-round-full btn-icon"><?php echo e($ecom_features->btn_text); ?><i class="icofont-simple-right ml-3"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-section ">
  <div class="container">
    <div class="cta position-relative">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="counter-stat">
            <i class="icofont-users"></i>
            <span class="h3"><?php echo e($counter_area->happy_customer ?? ''); ?></span>
            <p><?php echo e(__('Happy Customers')); ?></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="counter-stat">
            <i class="icofont-star"></i>
            <span class="h3"><?php echo e($counter_area->total_reviews ?? ''); ?></span>+
            <p><?php echo e(__('Total Reviews')); ?></p>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="counter-stat">
            <i class="icofont-world"></i>
            <span class="h3"><?php echo e($counter_area->total_domain ?? ''); ?></span>+
            <p><?php echo e(__('Total Domains')); ?></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="counter-stat">
            <i class="icofont-ui-user-group"></i>
            <span class="h3"><?php echo e($counter_area->community_member ?? ''); ?></span>+
            <p><?php echo e(__('Community Members')); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section service gray-bg" id="service">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 text-center">
        <div class="section-title">
          <h2><?php echo e(__('features_title')); ?></h2>
          <div class="divider mx-auto my-4"></div>
          <p><?php echo e(__('features_description')); ?></p>
        </div>
      </div>
    </div>
    <div class="row">
       <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="service-item mb-4">
          <div class="icon d-flex align-items-center">
             <img  src="<?php echo e(asset($row->preview->content ?? '')); ?>" height="80">
            <h4 class="mt-3 mb-3"><?php echo e($row->name); ?></h4>
          </div>
          <div class="content">
            <p class="mb-4"><?php echo e($row->excerpt->content ?? ''); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
  </div>
</section>

<section class="section appoinment">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12 ">
        <div class="section-title text-center">
          <h2><?php echo e(__('gallery_title')); ?></h2>
          <div class="divider mx-auto"></div>
          <p><?php echo e(__('gallery_description')); ?></p>
        </div>
        <section class="" id="gallery">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="portfolio__slide gallery_part">
                   <?php $__currentLoopData = $latest_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(url($row->name)); ?>">
                    <div class="port__card">
                      <div class="portfolio__img">
                        <img src="<?php echo e(asset($row->preview->content ?? '')); ?>"   alt="">
                      </div>                                
                    </div>
                  </a>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>      
      </div>
    </div>
  </div>
</section>

<section class="section gray-bg" id="priceing">
   <div class="container">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-7">
               <div class="section-title text-center">
                  <h2><?php echo e(__('Pricing')); ?></h2>
                  <div class="divider mx-auto my-4"></div>
                  <p><?php echo e(__('priceing_description')); ?></p>
               </div>
            </div>
         </div>
      </div>
      <!-- END -->
      <div class="row text-center align-items-end plan_list">
         <!-- Pricing Table-->
<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 mb-5 mb-lg-0  <?php if($row->featured == 0): ?> priceing <?php endif; ?>">
           <div class="bg-white p-5 rounded-lg  <?php if($row->featured == 1): ?> shadow <?php endif; ?> ">
           <h1 class="h6 text-uppercase font-weight-bold mb-4"><?php echo e($row->name); ?></h1>
           <h2 class="h1 font-weight-bold"><?php echo e(amount_format($row->price)); ?></h2>
              <span class="font-weight-bold"><?php if($row->days == 365): ?> Yearly <?php elseif($row->days == 30): ?> Monthly <?php else: ?> <?php echo e($row->days); ?>  Days <?php endif; ?></span>
          <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i> <?php echo e(__('Products Limit')); ?> <b><?php echo e($row->product_limit); ?></b>
         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i> <?php echo e(__('Storage Limit')); ?> <b><?php echo e(number_format($row->storage)); ?>MB</b>
         </li>
         <li class="mb-3">
            <?php if($row->custom_domain == 1): ?>
            <i class="fa fa-check mr-2 text-success"></i>
            <?php echo e(__('Use your custom domain')); ?>

            <?php else: ?>
            <i class="fa fa-times mr-2 text-danger"></i>
            <del><?php echo e(__('Use your custom domain')); ?></del>
            <?php endif; ?>
         </li>
         <li class="mb-3">
            <?php if($row->custom_domain == 1): ?>
            <i class="fa fa-check mr-2 text-success"></i>
            <?php echo e(__('Use subdoamin or custom domain')); ?>

            <?php else: ?>
            <i class="fa fa-check mr-2 text-success"></i>
            <?php echo e(__('Use subdoamin only')); ?>

            <?php endif; ?>
         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i> <?php echo e(__('Inventory Management')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i> <?php echo e(__('POS System')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i> <?php echo e(__('Customer Panel')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('Google Analytics')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('Google Tag Manager (GTM)')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('Facebook Pixel')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('Whatsapp Api')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('SEO Sitemap')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('Multi Language')); ?>

         </li>
         <li class="mb-3">
            <i class="fa fa-check mr-2 text-success"></i><?php echo e(__('Image Optimization')); ?>

         </li>
      </ul>
      <a href="<?php echo e(route('merchant.form',$row->id)); ?>" class="btn site_color text-white btn-block p-2 shadow rounded-pill"><?php echo e(__('Start With')); ?>  (<b><?php echo e($row->name); ?></b>)</a>
     </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <!-- END -->
      </div>
   </div>
</section>
<section class="section testimonial-2 ">
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7">
         <div class="section-title text-center">
            <h2><?php echo e(__('review_title')); ?>  </h2>
            <div class="divider mx-auto my-4"></div>
            <p><?php echo e(__('review_description')); ?></p>
         </div>
      </div>
   </div>
</div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12 testimonial-wrap-2">
         <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="testimonial-block style-2  gray-bg">
          <i class="icofont-quote-right"></i>

          <div class="testimonial-thumb">
            <img src="https://ui-avatars.com/api/?name=<?php echo e($row->name ?? ''); ?>&background=random&length=1&color=#fff" alt="" class="img-fluid">
          </div>

          <div class="client-info ">
            <h4><?php echo e($row->name ?? ''); ?></h4>
            <span><?php echo e($row->slug ?? ''); ?></span>
            <p>
              <?php echo e($row->excerpt->content); ?>

            </p>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>
    </div>
  </div>
</section>


<section class="section clients gray-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="section-title text-center">
          <h2><?php echo e(__('brand_area_title')); ?></h2>
          <div class="divider mx-auto my-4"></div>
          <p><?php echo e(__('brand_area_description')); ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row clients-logo">
      <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-2">
        <div class="client-thumb">
         <a href="<?php echo e($row->name); ?>" target="_blank"> <img src="<?php echo e(asset($row->preview->content)); ?>" height="50" alt="" class="img-fluid"></a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/welcome.blade.php ENDPATH**/ ?>