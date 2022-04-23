
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Create Plan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12 mt-2">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo e(route('admin.plan.store')); ?>" class="basicform_with_reset">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label><?php echo e(__('Plan Name')); ?></label>
								<input type="text" name="name" class="form-control" required> 
							</div>

							<div class="form-group">
								<label><?php echo e(__('Plan description')); ?></label>
								<input type="text" name="description" class="form-control" required> 
								
							</div> 


							<div class="form-group">
								<label><?php echo e(__('Plan Price')); ?></label>
								<input type="number" step="any" name="price" class="form-control" required> 
							</div>
							

							<div class="form-group">
								<label><?php echo e(__('Product Limit')); ?></label>
								<input type="number"  name="product_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label><?php echo e(__('Storage Limit')); ?> (MB)</label>
								<input type="number"  name="storage" class="form-control" required> 
							</div>
							<div class="form-group">
								<label><?php echo e(__('Customer Limit')); ?></label>
								<input type="number"  name="customer_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label><?php echo e(__('Category Limit')); ?></label>
								<input type="number"  name="category_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label><?php echo e(__('Location Limit')); ?></label>
								<input type="number"  name="location_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label><?php echo e(__('Brand Limit')); ?></label>
								<input type="number"  name="brand_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label><?php echo e(__('Variation Limit')); ?></label>
								<input type="number"  name="variation_limit" class="form-control" required> 
							</div>
							

							<div class="form-group">
								<button class="btn btn-primary basicbtn" type="submit" ><?php echo e(__('Save')); ?></button>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label><?php echo e(__('Custom Domain')); ?></label>
								<select class="form-control" name="custom_domain">
									<option value="1"><?php echo e(__('Enable')); ?></option>
									<option value="0"><?php echo e(__('Disable')); ?></option>
								</select>
							</div>
							<div class="form-group">
								<label><?php echo e(__('Duration')); ?></label>
								<select class="form-control" name="days">
									<option value="365"><?php echo e(__('Yearly')); ?></option>
									<option value="30"><?php echo e(__('Monthly')); ?></option>
									<option value="7"><?php echo e(__('Weekly')); ?></option>
								</select>
							</div>
							<div class="form-group">
								<label><?php echo e(__('Is Featured ?')); ?></label>
								<select class="form-control" name="featured">
									<option value="0"><?php echo e(__('No')); ?></option>
									<option value="1"><?php echo e(__('Yes')); ?></option>
								</select>
							</div>
							<div class="form-group">
								<label><?php echo e(__('Is Default ?')); ?></label>
								<select class="form-control" name="is_default">
									<option value="0"><?php echo e(__('No')); ?></option>
									<option value="1"><?php echo e(__('Yes')); ?></option>
								</select>
							</div>
							
							<div class="form-group">
								<label><?php echo e(__('Status')); ?></label>
								<select class="form-control" name="status">
									<option value="1"><?php echo e(__('Enable')); ?></option>
									<option value="0"><?php echo e(__('Disable')); ?></option>
								</select>
							</div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/plan/create.blade.php ENDPATH**/ ?>