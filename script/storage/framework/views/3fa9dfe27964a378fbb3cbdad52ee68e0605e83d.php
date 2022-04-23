
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Templates'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12 mt-2">
		<div class="card">
			<div class="card-body">
				
					<div class="float-left mb-1">
					
					</div>
					<div class="float-right">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('template.upload')): ?>
						<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><?php echo e(__('Upload Theme')); ?></a>
						<?php endif; ?>
					</div>

					<div class="table-responsive">
						<table class="table table-striped table-hover text-center table-borderless">
							<thead>
								<tr>
									<th><i class="fa fa-image"></i></th>
									<th><?php echo e(__('Name')); ?></th>
									<th><?php echo e(__('Assets root')); ?></th>
									<th><?php echo e(__('View root')); ?></th>
									<th><?php echo e(__('Total Installed')); ?></th>

									<th><?php echo e(__('Uploaded at')); ?></th>
									<th><?php echo e(__('Action')); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="row<?php echo e($row->id); ?>" >
									<td><img src="<?php echo e(asset($row->asset_path.'/screenshot.png')); ?>" height="100"></td>
									<td><?php echo e($row->name); ?></td>
									<td><?php echo e($row->asset_path); ?></td>
									<td><?php echo e($row->src_path); ?></td>
									<td><?php echo e($row->installed_count); ?></td>
									<td><?php echo e($row->created_at->format('d-F-Y')); ?></td>
									<td><?php if( $row->installed_count == 0): ?> <a href="<?php echo e(route('admin.templates.delete',$row->id)); ?>" class="btn btn-danger cancel"><i class="fa fa-trash"></i></a> <?php endif; ?></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
							<tfoot>
								<tr>
									<th><i class="fa fa-image"></i></th>
									<th><?php echo e(__('Name')); ?></th>
									<th><?php echo e(__('Assets root')); ?></th>
									<th><?php echo e(__('View root')); ?></th>
									<th><?php echo e(__('Total Installed')); ?></th>

									<th><?php echo e(__('Uploaded at')); ?></th>
									<th><?php echo e(__('Action')); ?></th>
								</tr>
							</tfoot>
						</table>
					</div>
				
			</div>
		</div>
	</div>
</div>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('template.upload')): ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Upload New Theme')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo e(route('admin.template.store')); ?>" class="basicform_with_reload">
      	<?php echo csrf_field(); ?>
      
      <div class="modal-body">
      	<div class="form-group">
      		<label><?php echo e(__('Select File')); ?></label>
      		<input type="file" class="form-control" accept=".zip" name="file" required="">
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn btn-primary basicbtn"><?php echo e(__('Upload')); ?></button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/template/index.blade.php ENDPATH**/ ?>