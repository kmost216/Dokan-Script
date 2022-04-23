
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Marketing Tools'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo e(__('Google Analytics')); ?></h4><br>
       
      </div>
      <div class="card-body">
        <form class="basicform" action="<?php echo e(route('admin.marketing.store')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="type" value="google-analytics">
        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <a href="https://developers.google.com/analytics/devguides/collection/gtagjs" target="_blank"><?php echo e(__('GA_MEASUREMENT_ID')); ?></a></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="ga_measurement_id" placeholder="UA-123456789" value="<?php echo e($info->ga_measurement_id ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-primary" ><?php echo e(__('ANALYTICS VIEW ID')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="analytics_view_id" placeholder="12345678" value="<?php echo e($info->analytics_view_id ?? ''); ?>">
          </div>
        </div>
        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-primary" ><?php echo e(__('service-account-credentials.json')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="file" name="file" class="form-control" accept=".json">
          </div>
        </div>

       
       
       
      
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?php echo e(__('Status')); ?></label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control selectric" name="google_status">
              <?php if(!empty($info)): ?>
              <option value="on" <?php if($info->google_status  === 'on'): ?> selected="" <?php endif; ?>><?php echo e(__('Enable')); ?></option>
              <option value="off"  <?php if($info->google_status  === 'off'): ?> selected="" <?php endif; ?>><?php echo e(__('Disable')); ?></option>
              <?php else: ?>
              <option value="on"><?php echo e(__('Enable')); ?></option>
              <option value="off" ><?php echo e(__('Disable')); ?></option>
              <?php endif; ?>
            </select>
          </div>
        </div>
         
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary basicbtn" type="submit"><?php echo e(__('Save')); ?></button><br>
            <small><?php echo e(__('Note:')); ?> </small> <small class="text-danger mt-4"><?php echo e(__('After You Update Settings The Action Will Work After 5 Minutes')); ?></small>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


 <div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo e(__('Facebook Pixel')); ?></h4><br>
       
      </div>
      <div class="card-body">
        <form class="basicform" action="<?php echo e(route('admin.marketing.store')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="type" value="fb_pixel">
        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <a href="https://developers.facebook.com/docs/facebook-pixel/implementation" target="_blank"><?php echo e(__('Your Pixel Id')); ?></a></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="fb_pixel" placeholder="31064306894650" value="<?php echo e($info->fb_pixel ?? ''); ?>">
          </div>
        </div>

       
       
       
      
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?php echo e(__('Status')); ?></label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control selectric" name="fb_pixel_status">
              <?php if(!empty($info)): ?>
              <option value="on" <?php if($info->fb_pixel_status  === 'on'): ?> selected="" <?php endif; ?>><?php echo e(__('Enable')); ?></option>
              <option value="off"  <?php if($info->fb_pixel_status  === 'off'): ?> selected="" <?php endif; ?>><?php echo e(__('Disable')); ?></option>
              <?php else: ?>
              <option value="on"><?php echo e(__('Enable')); ?></option>
              <option value="off" ><?php echo e(__('Disable')); ?></option>
              <?php endif; ?>
            </select>
          </div>
        </div>
         
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary basicbtn" type="submit"><?php echo e(__('Save')); ?></button><br>
            <small><?php echo e(__('Note:')); ?> </small> <small class="text-danger mt-4"><?php echo e(__('After You Update Settings The Action Will Work After 5 Minutes')); ?></small>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/marketing/index.blade.php ENDPATH**/ ?>