
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Customer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo e(__('Create Customer')); ?></h4>
                
      </div>
      <div class="card-body">

        <form class="basicform_with_reload" action="<?php echo e(route('admin.customer.store')); ?>" method="post">
          <?php echo csrf_field(); ?>

          <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Customer Name')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="name">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Customer Email')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="email" class="form-control" required="" name="email">
          </div>
        </div>

         <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Password')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="password">
          </div>
        </div>

        

         <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Transaction Method')); ?></label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control" name="trasection_method">
              <?php $__currentLoopData = App\Category::where('type','payment_getway')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Transaction Id')); ?></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="trasection_id">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Plan')); ?></label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control" name="plan">
               <?php $__currentLoopData = App\Plan::where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>


        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Domain Name Without Protocol')); ?> <br><small class="text-danger">example.com</small></label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="domain_name">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Full Domain With Protocol')); ?>  <small class="text-danger">https://example.com</small></label>

         
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="full_domain">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Domain Status')); ?></label>

         
          <div class="col-sm-12 col-md-7">
            <select class="form-control" name="domain_status">
              <option value="1"><?php echo e(__('Active')); ?></option>
             <option value="3"><?php echo e(__('Pending')); ?></option>
             <option value="2"><?php echo e(__('Draft')); ?></option>
            </select>
          </div>
        </div>

    
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary basicbtn" type="submit"><?php echo e(__('Save')); ?></button>
          </div>
        </div>

        <span><?php echo e(__('Subdomain Example')); ?>: <b><span class="text-danger">sub1.</span><?php echo e(env('APP_PROTOCOLESS_URL')); ?></b></span><br>
        <?php
        $ext='\.';
        $ext=str_replace('.', "", $ext);
        $paths=explode($ext, base_path());
        $count=count($paths);
        ?>
        <span>Your Root Path: <b><span class="text-danger"><?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
          <?php
          $key=$key+1;
          ?> 
         <?php if($key != $count): ?><?php echo e($row); ?>\<?php endif; ?> 
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span></span>
          <br>
        <span><?php echo e(__('Note')); ?>: <b><span class="text-danger"><?php echo e(__('Before Add New Domain Please Create Domain Manually On Your Server The Domain Root Path Is Same With Your Project Directory')); ?></span></b></span>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/customer/create.blade.php ENDPATH**/ ?>