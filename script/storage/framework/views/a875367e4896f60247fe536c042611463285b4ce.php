
<?php $__env->startSection('head'); ?>
<?php echo $__env->make('layouts.partials.headersection',['title'=>'Make Order'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-12 col-md-4 col-lg-4">
		<div class="pricing <?php if($row->featured==1): ?> pricing-highlight <?php endif; ?>">
			<div class="pricing-title">
				<?php echo e($row->name); ?>

			</div>
			<div class="pricing-padding">
				<div class="pricing-price">
					<div><?php echo e(amount_format($row->price)); ?></div>
					<div><?php if($row->days == 365): ?> <?php echo e(__('Yearly')); ?> <?php elseif($row->days == 30): ?> Monthly <?php else: ?> <?php echo e($row->days); ?>  Days <?php endif; ?></div>
					<p><?php echo e($row->description); ?></p>
				</div>
				<div class="pricing-details">
					<div class="pricing-item">
						
						<div class="pricing-item-label"><?php echo e(__('Products Limit')); ?> <?php echo e($row->product_limit); ?></div>
					</div>
					<div class="pricing-item">
						
						<div class="pricing-item-label"><?php echo e(__('Storage Limit')); ?> <?php echo e(number_format($row->storage)); ?>MB</div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label"><?php echo e(__('Customer Limit')); ?> <?php echo e(number_format($row->customer_limit)); ?></div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label"><?php echo e(__('Shipping Zone Limit')); ?> <?php echo e(number_format($row->location_limit)); ?></div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label"><?php echo e(__('Category Limit')); ?> <?php echo e(number_format($row->category_limit)); ?></div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label"><?php echo e(__('Brand Limit')); ?> <?php echo e(number_format($row->brand_limit)); ?></div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label"><?php echo e(__('Product Variation Limit')); ?> <?php echo e(number_format($row->variation_limit)); ?></div>
					</div>

					<div class="pricing-item">
						<div class="pricing-item-label text-left"><?php echo e(__('Use your own domain')); ?> &nbsp&nbsp</div>
						<?php if($row->custom_domain == 1): ?>
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						<?php else: ?>
						<div class="pricing-item-icon  bg-danger text-white"><i class="fas fa-times"></i></div>
						<?php endif; ?>
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left"><?php echo e(__('Google Analytics')); ?> &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
					
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left"><?php echo e(__('Facebook Pixel')); ?> &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left"><?php echo e(__('Google Tag Manager')); ?> &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left"><?php echo e(__('Whatsapp Plugin')); ?> &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						
					</div>
					
					
				</div>
			</div>
			<div class="pricing-cta">
				<a href="#" data-toggle="modal" data-target="#exampleModal" onclick="openModal(<?php echo e($row->id); ?>)"><?php echo e(__('Proceed')); ?> <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Make Renew')); ?></h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo e(route('admin.order.store')); ?>" id="productform">
					<?php echo csrf_field(); ?>
					<div class="form-group">
						<label><?php echo e(__('Customer Email')); ?></label>
						<input type="email" name="email" required="" class="form-control" value="<?php echo e($email ?? ''); ?>">
					</div>
					<div class="form-group">
						<label><?php echo e(__('Plan')); ?></label>
						<select class="form-control" name="plan" id="plan">
							<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group">
						<label><?php echo e(__('Payment Mode')); ?></label>
						<select class="form-control" name="payment_method">
							<?php $__currentLoopData = $payment_getway; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group">
						<label><?php echo e(__('Transaction Id')); ?></label>
						<input type="text" name="transition_id" required="" class="form-control">
					</div>
					<div class="form-group">
						<label><?php echo e(__('Payment Status')); ?></label>
						<select class="form-control" name="payment_status">
							<option value="1"><?php echo e(__('Complete')); ?></option>
							<option value="0"><?php echo e(__('Decline')); ?></option>
						</select>
					</div>
					<div class="form-group">
						<label><?php echo e(__('Send Email To Customer ?')); ?></label>
						<select class="form-control" name="notification_status" id="notification_status">
							<option value="yes"><?php echo e(__('Yes')); ?></option>
							<option value="no" selected=""><?php echo e(__('No')); ?></option>
						</select>
					</div>
					<div class="form-group">
						<label><?php echo e(__('Order Status')); ?></label>
						<select class="form-control" name="order_status">
							<option value="1"><?php echo e(__('Approved')); ?></option>
							<option value="2"><?php echo e(__('Pending')); ?></option>
							<option value="3"><?php echo e(__('Expired')); ?></option>
							<option value="0"><?php echo e(__('Decline')); ?></option>

						</select>
					</div>
					<div class="form-group none" id="email_content">
						<label><?php echo e(__('Email Comment')); ?></label>
						<textarea class="form-control" name="content"></textarea>
					</div>
					<input type="hidden" name="item_no" value="<?php echo e($row->id); ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
					<button type="submit" class="btn btn-primary basicbtn"><?php echo e(__('Make Order')); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/js/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form.js?v=1.0')); ?>"></script>
<script src="<?php echo e(asset('assets/js/admin/order_create.js')); ?>"></script>
<?php $__env->stopPush(); ?>	
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/order/create.blade.php ENDPATH**/ ?>