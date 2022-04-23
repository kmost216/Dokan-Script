
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Payment Gateway'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-body">        
          <div class="table-responsive">
            <table class="table table-striped table-hover text-center table-borderless">
              <thead>
                <tr>
                 

                  <th><i class="fas fa-image"></i></th>
                  <th><?php echo e(__('Name')); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                 
                  <th><?php echo e(__('Total Users')); ?></th>
                  
                  <th><?php echo e(__('Last Updated at')); ?></th>
                  <th><?php echo e(__('Edit')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><img src="<?php echo e(asset($row->preview->content ?? '')); ?>" alt="" height="50" width="120"></td>
                	<td><?php echo e($row->name); ?></td>
                	<td><?php if($row->featured==1): ?> <span class="badge badge-success"><?php echo e(__('Active')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('Deactive')); ?></span> <?php endif; ?></td>
                	<td><?php echo e($row->gateway_users_count); ?></td>
                	<td><?php echo e($row->updated_at->diffForHumans()); ?></td>
                	<td><a href="<?php echo e(route('admin.payment-geteway.show',$row->slug)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
             
           </table>
         </div>
       </form>
     </div>
   </div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/payment_gateway/index.blade.php ENDPATH**/ ?>