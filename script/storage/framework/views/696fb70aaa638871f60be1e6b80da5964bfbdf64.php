
<?php $__env->startPush('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap-colorpicker.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Site Settings'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo e(__('Site Settings')); ?></h4><br>
       
      </div>
      <div class="card-body">
        <form class="basicform" action="<?php echo e(route('admin.site_settings.update')); ?>" method="post">
          <?php echo csrf_field(); ?>
         
         <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Site Name')); ?></label>
          <div class="col-sm-12 col-md-7">
          <input type="text" name="site_name" class="form-control" value="<?php echo e($info->name ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Site Description')); ?></label>
          <div class="col-sm-12 col-md-7">
          <input type="text" name="site_description" class="form-control" placeholder="short description" maxlength="200" value="<?php echo e($info->site_description ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Contact Mail 1')); ?></label>
          <div class="col-sm-12 col-md-7">
          <input type="email" name="email1" class="form-control" value="<?php echo e($info->email1 ?? ''); ?>">
          </div>
        </div>
        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Contact Mail 2')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="email" name="email2" class="form-control" value="<?php echo e($info->email2 ?? ''); ?>">
        </div>
       </div>

       <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Contact Phone 1')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" name="phone1" class="form-control" value="<?php echo e($info->phone1 ?? ''); ?>">
        </div>
       </div>

       <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Contact Phone 2')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" name="phone2" class="form-control" value="<?php echo e($info->phone2 ?? ''); ?>">
        </div>
       </div>

       <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Country')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" name="country" class="form-control" value="<?php echo e($info->country ?? ''); ?>">
        </div>
       </div>

       <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Zip Code')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="number" name="zip_code" class="form-control" value="<?php echo e($info->zip_code ?? ''); ?>">
        </div>
       </div>

        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('State')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" name="state" class="form-control" value="<?php echo e($info->state ?? ''); ?>">
        </div>
       </div>
        
        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('city')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" name="city" class="form-control" value="<?php echo e($info->city ?? ''); ?>">
        </div>
       </div>

       <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('address')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" name="address" class="form-control" value="<?php echo e($info->address ?? ''); ?>">
        </div>
       </div>
        

        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Currency Icon')); ?></label>
          <div class="col-sm-12 col-md-7">
          <input type="text" step="any" name="currency_icon" class="form-control" value="<?php echo e($currency_info->currency_icon ?? ''); ?>">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Currency Name')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text" step="any" name="currency_name" class="form-control" value="<?php echo e($currency_info->currency_name ?? ''); ?>">
        </div>
      </div>

      <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Currency Possition')); ?></label>
         <div class="col-sm-12 col-md-7">
          <select class="form-control" name="currency_possition">
            <option value="left" <?php if($currency_info->currency_possition=='left'): ?> selected="" <?php endif; ?>><?php echo e(__('Left')); ?></option>
            <option value="right" <?php if($currency_info->currency_possition=='right'): ?> selected="" <?php endif; ?>><?php echo e(__('Right')); ?></option>
          </select>
        </div>
      </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Order Prefix')); ?></label>
         <div class="col-sm-12 col-md-7">
          <input type="text"  name="order_prefix" class="form-control" value="<?php echo e($order_prefix->value ?? ''); ?>">
        </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('facebook url')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="facebook" class="form-control" value="<?php echo e($info->facebook ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('twitter url')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text"  name="twitter" class="form-control" value="<?php echo e($info->twitter ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('linkedin url')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text"  name="linkedin" class="form-control" value="<?php echo e($info->linkedin ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('instagram url')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text"  name="instagram" class="form-control" value="<?php echo e($info->instagram ?? ''); ?>">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('youtube url')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text"  name="youtube" class="form-control" value="<?php echo e($info->youtube ?? ''); ?>">
          </div>
        </div>



        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Logo')); ?></label>
          <div class="col-sm-12 col-md-7">
           <input type="file" name="logo" class="form-control" accept=".png">
          </div>
        </div>

         <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Favicon')); ?></label>
          <div class="col-sm-12 col-md-7">
           <input type="file" name="favicon" accept=".ico" class="form-control">
          </div>
        </div>
        <div class="form-group row mb-4">
         <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Site Color')); ?></label>
          <div class="col-sm-12 col-md-7">
          <input type="text" name="site_color" class="form-control colorpickerinput" value="<?php echo e($info->site_color ?? ''); ?>">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" > <?php echo e(__('Automatic Order Approved After Payment Success')); ?></label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control" name="auto_order">
              <option value="yes" <?php if($auto_order->value  == 'yes'): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
              <option value="no" <?php if($auto_order->value  == 'no'): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>            
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
<script src="<?php echo e(asset('assets/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/settings/site_settings.blade.php ENDPATH**/ ?>