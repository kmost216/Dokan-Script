

<?php $__env->startSection('content'); ?>
<div class="">
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="col-sm-10">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link <?php if($type==='all'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.order.index')); ?>"><?php echo e(__('All')); ?></a>
							</li>

							<li class="nav-item">
								<a  href="<?php echo e(route('admin.order.index','status=2')); ?>" class="nav-link <?php if($type==2): ?> active <?php endif; ?>"><?php echo e(__('Pending')); ?></a>
							</li>
							<li class="nav-item">
								<a  href="<?php echo e(route('admin.order.index','status=3')); ?>" class="nav-link <?php if($type==3): ?> active <?php endif; ?>"><?php echo e(__('Expired')); ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php if($type===0): ?> active <?php endif; ?>" href="<?php echo e(route('admin.order.index','status=cancelled')); ?>"><?php echo e(__('Cancelled')); ?></a>
							</li>
							
						</ul>
					</div>
					<div class="col-sm-2">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order.create')): ?>
						<a href="<?php echo e(route('admin.order.create')); ?>" class="btn btn-primary float-right"><?php echo e(__('Create order')); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="float-right">
						<form>
							<input type="hidden" name="type" value="<?php if($type === 0): ?> trash <?php else: ?> <?php echo e($type); ?> <?php endif; ?>">
							<div class="input-group mb-2">

								<input type="text" id="src" class="form-control" placeholder="Search..." required="" name="src" autocomplete="off" value="<?php echo e($request->src ?? ''); ?>">
								<select class="form-control selectric" name="term" id="term">
									<option value="order_no"><?php echo e(__('Search By Order Id')); ?></option>
									<option value="email"><?php echo e(__('Search By User Mail')); ?></option>

								</select>
								<div class="input-group-append">                                            
									<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>

					<form method="post" action="<?php echo e(route('admin.orders.destroys')); ?>" class="basicform">
						<?php echo csrf_field(); ?>
						<div class="float-left mb-1">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order.delete')): ?>
							<div class="input-group">
								<select class="form-control selectric" name="method">
									<option value="" ><?php echo e(__('Select Action')); ?></option>
									
									<option value="2" ><?php echo e(__('Move To Pending')); ?></option>
									<?php if($type !== 0): ?>
									<option value="cancelled" ><?php echo e(__('Move To Cancelled')); ?></option>
									<?php endif; ?>
									<?php if($type===0): ?>
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
							<table class="table table-hover table-nowrap card-table text-center">
								<thead>
									<tr>
										<th class="text-left" ><input type="checkbox" class="checkAll"></th>

										<th class="text-left" ><?php echo e(__('Order')); ?></th>
										<th ><?php echo e(__('Date')); ?></th>
										<th><?php echo e(__('Customer')); ?></th>
										<th class="text-right"><?php echo e(__('Order total')); ?></th>
										<th><?php echo e(__('Payment Method')); ?></th>
										<th><?php echo e(__('Payment Status')); ?></th>
										<th><?php echo e(__('Fulfillment')); ?></th>
										<th class="text-right"><?php echo e(__('Action')); ?></th>
									</tr>
								</thead>
								<tbody class="list font-size-base rowlink" data-link="row">
									<?php $__currentLoopData = $posts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td class="text-left"><input type="checkbox" name="ids[]" value="<?php echo e($row->id); ?>"></td>
										<td class="text-left"><a href="<?php echo e(route('admin.order.invoice',$row->id)); ?>"><?php echo e($row->order_no); ?></a></td>
										<td><?php echo e($row->created_at->format('d-F-Y')); ?></td>
										<td><a href="<?php echo e(route('admin.customer.show',$row->user->id)); ?>"><?php echo e($row->user->name); ?></a></td>
										<td><?php echo e(amount_format($row->amount)); ?></td>
										<td><?php echo e($row->payment_method->method->name ?? ''); ?></td>
										<td><?php if(!empty($row->payment_method)): ?>
											<?php if($row->payment_method->status==1): ?>
											<span class="badge badge-success"><?php echo e(__('Paid')); ?></span>
											<?php else: ?>
											<span class="badge badge-danger"><?php echo e(__('Fail')); ?></span>
											<?php endif; ?>
											<?php endif; ?>
										</td>

										<td>
											<?php if($row->status == 1): ?> <span class="badge badge-success">Approved</span> <?php elseif($row->status == 2): ?> <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span><?php elseif($row->status == 3): ?> <span class="badge badge-danger"><?php echo e(__('Expired')); ?></span><?php else: ?> <span class="badge badge-danger"><?php echo e(__('Cancelled')); ?></span> <?php endif; ?>

										</td>
										<td> <div class="dropdown d-inline">
											<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<?php echo e(__('Action')); ?>

											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.edit',$row->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit')); ?></a>
												<a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.show',$row->id)); ?>"><i class="far fa-eye"></i> <?php echo e(__('View')); ?></a>
												<a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.invoice',$row->id)); ?>"><i class="fa fa-file-invoice"></i> <?php echo e(__('Download Invoice')); ?></a>

											</div>
										</div></td>
									</tr>	
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>

						</div>
					</div>
				</form>
				<div class="card-footer d-flex justify-content-between">
					<?php echo e($posts->appends($request->all())->links('vendor.pagination.bootstrap-4')); ?>

				</div>
			</div>
		</div>
	</div>   
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/order/index.blade.php ENDPATH**/ ?>