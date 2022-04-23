
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Edit Order'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4><?php echo e(__('Create Customer')); ?></h4>

			</div>
			<div class="card-body">

				<form class="basicform" action="<?php echo e(route('admin.order.update',$info->id)); ?>" method="post">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>




					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Transaction Method')); ?></label>
						<div class="col-sm-12 col-md-7">
							<select class="form-control" name="trasection_method">
								<?php
								$getway=$info->payment_method->method->id ?? null;
								?>
								<?php $__currentLoopData = $payment_getway; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($row->id); ?>" <?php if($getway == $row->id): ?> selected="" <?php endif; ?>><?php echo e($row->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Transaction Id')); ?></label>
						<div class="col-sm-12 col-md-7">
							<input type="text" class="form-control" name="trasection_id" value="<?php echo e($info->payment_method->trasection_id ?? ''); ?>">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Payment Status')); ?></label>
						<div class="col-sm-12 col-md-7">
							<?php
							$payment_status=$info->payment_method->status ?? null;
							?>
							<select class="form-control" name="payment_status">
								<option value="1" <?php if($payment_status==1): ?> selected="" <?php endif; ?>><?php echo e(__('Complete')); ?></option>
								<option value="0" <?php if($payment_status==0): ?> selected="" <?php endif; ?>><?php echo e(__('Decline')); ?></option>
							</select>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Plan')); ?></label>
						<div class="col-sm-12 col-md-7">
							<select class="form-control" name="plan">
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($row->id); ?>" <?php if($info->plan_info->id==$row->id): ?> selected="" <?php endif; ?>><?php echo e($row->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Order Status')); ?></label>
						<div class="col-sm-12 col-md-7">

							<select class="form-control" name="order_status">
								<option value="1" <?php if($info->status===1): ?> selected="" <?php endif; ?>><?php echo e(__('Approved')); ?></option>
								<option value="2" <?php if($info->status===2): ?> selected="" <?php endif; ?>><?php echo e(__('Pending')); ?></option>
								<option value="3" <?php if($info->status===3): ?> selected="" <?php endif; ?>><?php echo e(__('Expired')); ?></option>
								<option value="0" <?php if($info->status===0): ?> selected="" <?php endif; ?>><?php echo e(__('Decline')); ?></option>

							</select>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Send Email To Customer ?')); ?></label>
						<div class="col-sm-12 col-md-7">

							<select class="form-control" name="notification_status" id="notification_status">
							<option value="yes"><?php echo e(__('Yes')); ?></option>
							<option value="no" selected=""><?php echo e(__('No')); ?></option>
						</select>
						</div>
					</div>

					<div class="form-group row mb-4 " id="email_content">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" ><?php echo e(__('Email Comment')); ?></label>
						<div class="col-sm-12 col-md-7">
							<textarea class="form-control" name="content"></textarea>
						</div>
					</div>
					

					

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button class="btn btn-primary basicbtn" type="submit"><?php echo e(__('Save')); ?></button>
						</div>
					</div>

					<small class="text-center">Note: <span class="text-danger"><?php echo e(__('If This Order Does Not Used Have Any Payment Getway The Payment Status Will Not Update')); ?></span></small>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form.js?v=1.0')); ?>"></script>
<script src="<?php echo e(asset('assets/js/admin/order_create.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>