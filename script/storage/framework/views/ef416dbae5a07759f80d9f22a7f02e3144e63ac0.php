
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Profile Settings'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
       <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger none">
              <ul id="errors">
              </ul>
          </div>
          <div class="alert alert-success none">
              <ul id="success">
              </ul>
          </div>
      </div>
      <div class="col-md-6">


        <form method="post" class="basicform" action="<?php echo e(route('my.profile.update')); ?>">
            <?php echo csrf_field(); ?>
            <h4 class="mb-20"><?php echo e(__('Edit Genaral Settings')); ?></h4>
            <div class="custom-form">
                <div class="form-group">
                    <label for="name"><?php echo e(__('Name')); ?></label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Enter User's  Name" value="<?php echo e(Auth::user()->name); ?>"> 
                </div>
                <div class="form-group">
                    <label for="email"><?php echo e(__('Email')); ?></label>
                    <input type="text" name="email" id="email" class="form-control" required placeholder="Enter Email"  value="<?php echo e(Auth::user()->email); ?>"> 
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-info basicbtn"><?php echo e(__('Update')); ?></button>
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-6">

        <form method="post" class="basicform" action="<?php echo e(route('my.profile.update')); ?>">
            <?php echo csrf_field(); ?>
            <h4 class="mb-20"><?php echo e(__('Change Password')); ?></h4>
            <div class="custom-form">
                <div class="form-group">
                    <label for="oldpassword"><?php echo e(__('Old Password')); ?></label>
                    <input type="password" name="password_current" id="oldpassword" class="form-control"  placeholder="Enter Old Password" required> 
                </div>
                <div class="form-group">
                    <label for="password"><?php echo e(__('New Password')); ?></label>
                    <input type="password" name="password" id="password" class="form-control"  placeholder="Enter New Password" required> 
                </div>
                <div class="form-group">
                    <label for="password1"><?php echo e(__('Enter Again Password')); ?></label>
                    <input type="password" name="password_confirmation" id="password1" class="form-control"  placeholder="Enter Again" required> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary basicbtn"><?php echo e(__('Change')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/seller/settings.blade.php ENDPATH**/ ?>