
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Customers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-sm-8">
            <a href="<?php echo e(route('admin.customer.index')); ?>" class="mr-2 btn btn-outline-primary <?php if($type==="all"): ?> active <?php endif; ?>"><?php echo e(__('All')); ?> (<?php echo e($all); ?>)</a>

            <a href="<?php echo e(route('admin.customer.index','type=1')); ?>" class="mr-2 btn btn-outline-success <?php if($type==1): ?> active <?php endif; ?>"><?php echo e(__('Active')); ?> (<?php echo e($actives); ?>)</a>

            <a href="<?php echo e(route('admin.customer.index','type=2')); ?>" class="mr-2 btn btn-outline-warning <?php if($type==2): ?> active <?php endif; ?>"><?php echo e(__('Suspened')); ?> (<?php echo e($suspened); ?>)</a>

             <a href="<?php echo e(route('admin.customer.index','type=3')); ?>" class="mr-2 btn btn-outline-warning <?php if($type==3): ?> active <?php endif; ?>"><?php echo e(__('Pending')); ?> (<?php echo e($pendings); ?>)</a>


            <a href="<?php echo e(route('admin.customer.index','type=trash')); ?>" class="mr-2 btn btn-outline-danger <?php if($type === 0): ?> active <?php endif; ?>"><?php echo e(__('Trash')); ?> (<?php echo e($trash); ?>)</a>
          </div>

          <div class="col-sm-4 text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.create')): ?>
            <a href="<?php echo e(route('admin.customer.create')); ?>" class="btn btn-primary"><?php echo e(__('Create Customer')); ?></a>
            <?php endif; ?>
          </div>
        </div>

        <div class="float-right">
          <form>
            <input type="hidden" name="type" value="<?php if($type === 0): ?> trash <?php else: ?> <?php echo e($type); ?> <?php endif; ?>">
            <div class="input-group mb-2">

              <input type="text" id="src" class="form-control" placeholder="Search..." required="" name="src" autocomplete="off" value="<?php echo e($request->src ?? ''); ?>">
              <select class="form-control selectric" name="term" id="term">
                <option value="domain"><?php echo e(__('Search By Domain Name')); ?></option>
                <option value="id"><?php echo e(__('Search By Customer Id')); ?></option>
                <option value="email"><?php echo e(__('Search By User Mail')); ?></option>

              </select>
              <div class="input-group-append">                                            
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>

        <form method="post" action="<?php echo e(route('admin.customers.destroys')); ?>" class="basicform_with_reload">
          <?php echo csrf_field(); ?>
          <div class="float-left mb-1">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.delete')): ?>
            <div class="input-group">
              <select class="form-control selectric" name="method">
                <option value="" ><?php echo e(__('Select Action')); ?></option>
                <option value="1" ><?php echo e(__('Publish')); ?></option>
                <option value="2" ><?php echo e(__('Suspend')); ?></option>
                <option value="3" ><?php echo e(__('Move To Pending')); ?></option>
                 <?php if($type !== "trash"): ?>
                <option value="trash" ><?php echo e(__('Move To Trash')); ?></option>
                <?php endif; ?>
                <?php if($type=="trash"): ?>
                <option value="delete" ><?php echo e(__('Delete Permanently')); ?></option>
                <?php endif; ?>
              </select>
              <div class="input-group-append">                                            
                <button class="btn btn-primary basicbtn" type="submit"><?php echo e(__('Submit')); ?></button>
              </div>
            </div>
            <?php endif; ?>
          </div>
          

          <div class="table-responsive">
            <table class="table table-striped table-hover text-center table-borderless">
              <thead>
                <tr>
                  <th><input type="checkbox" class="checkAll"></th>

                  <th><?php echo e(__('Name')); ?></th>
                  <th><?php echo e(__('Email')); ?></th>
                  <th><?php echo e(__('Domain')); ?></th>
                  <th><?php echo e(__('Storage Used')); ?></th>
                  <th><?php echo e(__('Plan')); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                  <th><?php echo e(__('Join at')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="row<?php echo e($row->id); ?>">
                  <td><input type="checkbox" name="ids[]" value="<?php echo e($row->id); ?>"></td>
                  <td><?php echo e($row->name); ?></td>
                  <td><a href="mailto:<?php echo e($row->email); ?>"><?php echo e($row->email); ?></a></td>
                  <td><a href="<?php echo e($row->user_domain->full_domain ?? ''); ?>" target="_blank"><?php echo e($row->user_domain->domain ?? ''); ?></a></td>
                  <td><?php echo e(folderSize('uploads/'.$row->id)); ?>MB / <?php echo e($row->user_plan->plan_info->storage ?? 0); ?> MB</td>
                  <td><?php echo e($row->user_plan->plan_info->name ?? ''); ?></td>
                  <td>
                    <?php if($row->status==1): ?> <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                    <?php elseif($row->status==0): ?> <span class="badge badge-danger"><?php echo e(__('Trash')); ?></span>
                    <?php elseif($row->status==2): ?> <span class="badge badge-warning"><?php echo e(__('Suspended')); ?></span>
                    <?php elseif($row->status==3): ?> <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($row->created_at->format('d-F-Y')); ?></td>
                  <td>
                    <div class="dropdown d-inline">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(__('Action')); ?>

                      </button>
                      <div class="dropdown-menu">
                       
                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.edit')): ?>
                        <a class="dropdown-item has-icon" href="<?php echo e(route('admin.customer.edit',$row->id)); ?>"><i class="fas fa-user-edit"></i> <?php echo e(__('Edit')); ?></a>

                        <a class="dropdown-item has-icon" href="<?php echo e(route('admin.customer.planedit',$row->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Plan Info')); ?></a>
                         <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.view')): ?>
                        <a class="dropdown-item has-icon" href="<?php echo e(route('admin.customer.show',$row->id)); ?>"><i class="far fa-eye"></i><?php echo e(__('View')); ?></a>
                         <?php endif; ?>

                         <a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.create','email='.$row->email)); ?>"><i class="fas fa-cart-arrow-down"></i><?php echo e(__('Make Order')); ?></a>

                         <a class="dropdown-item has-icon" href="<?php echo e(route('admin.customer.show',$row->id)); ?>"><i class="far fa-envelope"></i><?php echo e(__('Send Email')); ?></a>
                      </div>
                    </div>
                   

                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                 <th><input type="checkbox" class="checkAll"></th>

                 <th><?php echo e(__('Name')); ?></th>
                 <th><?php echo e(__('Email')); ?></th>
                 <th><?php echo e(__('Domain')); ?></th>
                 <th><?php echo e(__('Storage Used')); ?></th>
                 <th><?php echo e(__('Plan')); ?></th>
                 <th><?php echo e(__('Status')); ?></th>
                 <th><?php echo e(__('Join at')); ?></th>
                 <th><?php echo e(__('Action')); ?></th>
               </tr>
             </tfoot>
           </table>
           
         </div>
       </form>
        <?php echo e($posts->appends($request->all())->links('vendor.pagination.bootstrap-4')); ?>

     </div>
   </div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/customer/index.blade.php ENDPATH**/ ?>