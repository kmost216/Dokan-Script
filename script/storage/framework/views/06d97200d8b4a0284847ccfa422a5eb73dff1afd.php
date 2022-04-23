
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Cron Jobs'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">			
		<div class="card">
			<div class="card-header">
				<h4><i class="fas fa-circle"></i> <?php echo e(__('Make Expired Membership')); ?> <code><?php echo e(__('Once/day')); ?></code></h4>
				
				
			</div>
			<div class="card-body">
				<div class="code"><p>curl -s <?php echo e(url('/cron_job/make_expirable_user')); ?></p></div>
			</div>
		</div>
	</div>

	<div class="col-12">			
		<div class="card">
			<div class="card-header">
				<h4><i class="fas fa-circle"></i> <?php echo e(__('Membership Will Expiration Alert')); ?> <code><?php echo e(__('Once/day')); ?></code></h4>
			</div>
			<div class="card-body">
				<div class="code"><p>curl -s <?php echo e(url('/cron_job/send_mail_to_will_expire_plan_soon')); ?></p></div>
			</div>
		</div>
	</div>
	<div class="col-12">			
		<div class="card">
			<div class="card-header">
				<h4><i class="fas fa-circle"></i> <?php echo e(__('Reset Offer Product Price')); ?> <code><?php echo e(__('Once/day')); ?></code></h4>
			</div>
			<div class="card-body">
				<div class="code"><p>curl -s <?php echo e(url('/cron_job/reset_product_price')); ?></p></div>
			</div>
		</div>
	</div>
	<div class="col-12">			
		<div class="card">
			<div class="card-header">
				<h4><i class="fas fa-circle"></i> <?php echo e(__('Send Mail with Queue')); ?></h4>
				
			</div>
			<div class="card-body">
				<span><?php echo e(__('Note')); ?>: <span class="text-danger"><?php echo e(__('You Need Add This Command In Your Supervisor And Also Make QUEUE_MAIL On From System Settings To Mail Configuration.')); ?></span></span><br>
				<span><?php echo e(__('Command Path')); ?>: <span class="text-danger"><?php echo e(base_path()); ?></span></span>
				<div class="code"><p><?php echo e(__('php artisan queue:work')); ?></p></div>

				
			</div>
		</div>
	</div>


	<div class="col-12">			
		<div class="card">
			<div class="card-header">
				<h4><?php echo e(__('Customize Cron Jobs')); ?></h4>
			</div>
			<form class="basicform" method="post" accept="<?php echo e(route('admin.cron.store')); ?>">
				<?php echo csrf_field(); ?>
			
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo e(__('Alert Mail When Subscription Will Expired')); ?></label>

							<select class="form-control mt-4" name="send_notification_expired_date">
								<option value="yes" <?php if($info->send_notification_expired_date == 'yes'): ?> selected="" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
								<option value="no" <?php if($info->send_notification_expired_date == 'no'): ?> selected="" <?php endif; ?>><?php echo e(__('No')); ?></option>
							</select>
						</div>
					</div>
					

					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo e(__('Make Alert To Customer The Subscription Will Ending Soon')); ?></label><br>
							<span><?php echo e(__('Note:')); ?> <span class="text-danger"><small><?php echo e(__('It Will Send Notification Everyday Within The Selected Days')); ?></small></span></span>
							<select class="form-control" name="send_mail_to_will_expire_within_days">
								<option value="7" <?php if($info->send_mail_to_will_expire_within_days==7): ?>  selected=""  <?php endif; ?>><?php echo e(__('7 Days')); ?></option>
								<option value="6" <?php if($info->send_mail_to_will_expire_within_days==6): ?>  selected=""  <?php endif; ?>><?php echo e(__('6 Days')); ?></option>
								<option value="5" <?php if($info->send_mail_to_will_expire_within_days==5): ?>  selected=""  <?php endif; ?>><?php echo e(__('5 Days')); ?></option>
								<option value="4" <?php if($info->send_mail_to_will_expire_within_days==4): ?>  selected=""  <?php endif; ?>><?php echo e(__('4 Days')); ?></option>
								<option value="3" <?php if($info->send_mail_to_will_expire_within_days==3): ?>  selected=""  <?php endif; ?>><?php echo e(__('3 Days')); ?></option>
								<option value="2" <?php if($info->send_mail_to_will_expire_within_days==2): ?>  selected=""  <?php endif; ?>><?php echo e(__('2 Days')); ?></option>
								<option value="1" <?php if($info->send_mail_to_will_expire_within_days==1): ?>  selected=""  <?php endif; ?>><?php echo e(__('1 Days')); ?></option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo e(__('Auto Assign To Default Plan After Subscription Will Expire')); ?></label>

							<select class="form-control mt-4" name="auto_assign_to_default">
								<option value="yes" <?php if($info->auto_assign_to_default == 'yes'): ?> selected="" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
								<option value="no" <?php if($info->auto_assign_to_default == 'no'): ?> selected="" <?php endif; ?>><?php echo e(__('No')); ?></option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo e(__('Auto Approve To Plan After Successfull Payment')); ?></label>

							<select class="form-control mt-4" name="auto_approve">
								<option value="yes" <?php if($info->auto_approve == 'yes'): ?> selected="" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
								<option value="no" <?php if($info->auto_approve == 'no'): ?> selected="" <?php endif; ?>><?php echo e(__('No')); ?></option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<button class="btn btn-primary basicbtn" type="submit"><?php echo e(__('Save Changes')); ?></button>
					</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/cron/index.blade.php ENDPATH**/ ?>