
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="far fa-clipboard"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4><?php echo e(__('Total Orders')); ?></h4>
				</div>
				<div class="card-body">
					<?php echo e(number_format($order_count)); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="fas fa-wallet"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4><?php echo e(__('Total Earnings')); ?></h4>
				</div>
				<div class="card-body">
					<?php echo e(amount_format($order_sum)); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="far fa-clock"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4><?php echo e(__('Total Pendings')); ?></h4>
				</div>
				<div class="card-body">
					<?php echo e(number_format($order_pending)); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="fas fa-history"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4><?php echo e(__('Total Expired Orders')); ?></h4>
				</div>
				<div class="card-body">
					<?php echo e(number_format($order_expired)); ?>

				</div>
			</div>
		</div>
	</div>                  
</div>


<div class="card">
	<div class="card-header">
				
				<form class="card-header-form">
					<div class="d-flex">
						<input type="text" name="start" class="form-control datepicker" value="<?php echo e($start ?? ''); ?>">
						
						<input type="text" name="end" class="form-control datepicker" value="<?php echo e($end ?? ''); ?>">

						<button class="btn btn-primary btn-icon" type="submit"><i class="fas fa-search"></i></button>
					</div>					
				</form>
			</div>
	<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-nowrap card-table text-center">
					<thead>
						<tr>
							
							<th class="text-left" ><?php echo e(__('Order')); ?></th>
							<th ><?php echo e(__('Date')); ?></th>
							
							<th class="text-right"><?php echo e(__('Order total')); ?></th>
							<th><?php echo e(__('Payment Method')); ?></th>
							<th><?php echo e(__('Payment Status')); ?></th>
							<th><?php echo e(__('Status')); ?></th>
							<th class="text-right"><?php echo e(__('Action')); ?></th>
						</tr>
					</thead>
					<tbody class="list font-size-base rowlink" data-link="row">
						<?php $__currentLoopData = $posts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>

							<td class="text-left"><a href="<?php echo e(route('admin.order.invoice',$row->id)); ?>"><?php echo e($row->order_no); ?></a></td>
							<td><?php echo e($row->created_at->format('d-F-Y')); ?></td>
							
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
	
	<div class="card-footer d-flex justify-content-between">
		<?php echo e($posts->appends($request->all())->links('vendor.pagination.bootstrap-4')); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/daterangepicker.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\front\resources\views/admin/report/index.blade.php ENDPATH**/ ?>