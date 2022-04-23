<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo e(env('APP_NAME')); ?></title>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('uploads/favicon.ico')); ?>">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/fontawesome.min.css')); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
</head>

<body>
 <div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="login-brand">
            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" width="100" class="shadow-light"></a>
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4><?php echo e(__('Register')); ?></h4></div>
            <form class="basicform"  method="post" action="<?php echo e(route('merchant.register-make',$info->id)); ?>">
              <?php echo csrf_field(); ?>

              <div class="card-body">
              
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name"><?php echo e(__('Name')); ?></label>
                      <input id="frist_name" type="text" class="form-control" name="name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name"><?php echo e(__('Email')); ?></label>
                      <input id="email" type="email" class="form-control" name="email">
                    </div>
                  </div>



                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block"><?php echo e(__('Password')); ?></label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block"><?php echo e(__('Password Confirmation')); ?></label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                  </div>

                  <?php if($info->custom_domain==0): ?>
                  <div class="form-divider">
                    <?php echo e(__('Your Subdomain')); ?> <br>
                    <span><?php echo e(__('Example')); ?>: </span>
                    <span>{example}.<?php echo e(env('APP_PROTOCOLESS_URL')); ?></span>
                  </div>
                  <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                      <div class="input-group mb-2">
                        <input type="text" class="form-control text-right" name="domain" placeholder="subdomain without protocol">
                        <div class="input-group-append">
                          <div class="input-group-text">.<?php echo e(env('APP_PROTOCOLESS_URL')); ?></div>
                        </div>
                      </div>
                    </div>

                  </div> 
                </div>
                <?php else: ?>
                <div class="form-divider">
                   <?php echo e(__(' Protocol Less Domain')); ?><br>
                    <span><?php echo e(__('Example')); ?>: </span>
                    <span><?php echo e(__('example.com')); ?></span>
                  </div>
                  <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                       <input type="text" class="form-control" name="domain" placeholder="Enter Your Domain without protocol">
                      
                    </div>
                    <span><?php echo e(__('Note')); ?>: <small class="text-danger"><?php echo e(__('You Need To Also Connect With Your Domain With Our Server Once Complete The Payment You Will Get The Credentials')); ?></small></span>

                  </div> 
                </div>

                <?php endif; ?>

                 <?php if($info->custom_domain==1): ?>
                <div class="form-divider">
                    <?php echo e(__('Full Domain')); ?> <br>
                    <span><?php echo e(__('Example')); ?>: </span>
                    <span>https://example.com</span>
                  </div>
                  <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                     
                        <input type="text" class="form-control" name="full_domain" placeholder="Enter Your Domain with protocol">
                       
                     
                    </div>

                  </div> 
                </div>
                <?php endif; ?>
                <?php if(env('NOCAPTCHA_SITEKEY') != null): ?>
                 <div class="form-group">
                
                  <?php echo NoCaptcha::renderJs(); ?>

                  <?php echo NoCaptcha::display(); ?>



               
              </div>
                <?php endif; ?> 
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" required="" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree"><?php echo e(__('I agree with the')); ?> <a href="<?php echo e(url('/page/terms-and-condition')); ?>"><?php echo e(__('terms and conditions')); ?></a></label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block basicbtn">
                   <?php echo e(__(' Register And Payment')); ?>

                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; <?php echo e(env('APP_NAME')); ?> <?php echo e(date('Y')); ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<input type="hidden" id="location_url" value="<?php echo e(url('/merchant/make-payment',$info->id)); ?>">
<!-- General JS Scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert2.all.min.js')); ?>"></script>
<!-- Template JS File -->
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/admin/register.js')); ?>"></script>
</body>
</html>




<?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/marchant/register.blade.php ENDPATH**/ ?>