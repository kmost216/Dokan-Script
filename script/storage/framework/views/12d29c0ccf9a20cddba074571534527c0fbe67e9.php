<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>login - <?php echo e(env('APP_NAME')); ?></title>
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
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="logo" width="100" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4><?php echo e(__('Login')); ?></h4></div>

              <div class="card-body">

               <form method="POST" class="loginform" class="needs-validation" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                  <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus >
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label"><?php echo e(__('Password')); ?></label>
                    <?php if(Route::has('password.request')): ?>
                    <div class="float-right">
                      <a href="<?php echo e(route('password.request')); ?>" class="text-small">
                       <?php echo e(__(' Forgot Password?')); ?>

                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                  <input id="password" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                     <label class="custom-control-label" for="remember-me"><?php echo e(__('Remember Me')); ?></label>
                   </div>
                 </div>

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block basicbtn" tabindex="4">
                    <?php echo e(__('Login')); ?>

                  </button>
                </div>
              </form>


   

          <div class="simple-footer">
            <?php echo e(__('Copyright')); ?> &copy; <?php echo e(env('APP_NAME')); ?> <?php echo e(date('Y')); ?>

          </div>
       
      </div>
    </div>
  </section>
</div>

<!-- General JS Scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert2.all.min.js')); ?>"></script>
<!-- Template JS File -->
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
</body>
</html>




<?php /**PATH D:\Work\dokan\Dokan\front\resources\views/auth/login.blade.php ENDPATH**/ ?>