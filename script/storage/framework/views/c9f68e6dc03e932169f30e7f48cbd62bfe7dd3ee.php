

<?php $__env->startSection('content'); ?>
<div class="card"  >
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4><?php echo e(__('Page List')); ?></h4>
			</div>
			<div class="col-lg-6">
				
			</div>
		</div>
		<br>
		<div class="card-action-filter">
			<form method="post" class="basicform_with_reload" action="<?php echo e(route('admin.pages.destroys')); ?>">
				<?php echo csrf_field(); ?>
				<div class="row">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page.delete')): ?>
					<div class="col-lg-6">
						<div class="d-flex">
							<div class="single-filter">
								<div class="form-group">
									<select class="form-control selectric" name="status">
										<option disabled="" selected="">Select Action</option>
										<option value="delete"><?php echo e(__('Delete Permanently')); ?></option>

									</select>
								</div>
							</div>
							<div class="single-filter">
								<button type="submit" class="btn btn-primary btn-lg ml-2"><?php echo e(__('Apply')); ?></button>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page.create')): ?>
					<div class="col-lg-6">
						<div class="add-new-btn">
							<a href="<?php echo e(route('admin.page.create')); ?>" class="btn btn-primary float-right"><?php echo e(__('Add New Page')); ?></a>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="table-responsive custom-table">
				<table class="table">
					<thead>
						<tr>
							<th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
							<th class="am-title"><?php echo e(__('Title')); ?></th>
							<th class="am-title"><?php echo e(__('Url')); ?></th>
							
							<th class="am-date"><?php echo e(__('Last Update')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck<?php echo e($page->id); ?>" value="<?php echo e($page->id); ?>">
									<label class="custom-control-label" for="customCheck<?php echo e($page->id); ?>"></label>
								</div>
							</th>
							<td>
								<?php echo e($page->title); ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page.edit')): ?>
								<div class="hover">
									<a href="<?php echo e(route('admin.page.edit',$page->id)); ?>"><?php echo e(__('Edit')); ?></a>

									
								</div>
								<?php endif; ?>
							</td>
							<input type="text" class="offscreen" id="myUrl<?php echo e($page->id); ?>" value="<?php echo e(url('/page',$page->slug)); ?>">
							<td style="cursor: pointer" onclick="copyUrl('<?php echo e($page->id); ?>')"><?php echo e(url('/page',$page->slug)); ?></td>
							
							<td><?php echo e(__('Last Modified')); ?>

								<div class="date">
									<?php echo e($page->updated_at->diffForHumans()); ?>

								</div>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</form>
				<tfoot>
					<tr>
						<th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
								<label class="custom-control-label checkAll" for="selectAll"></label>
							</div>
						</th>
						<th class="am-title"><?php echo e(__('Title')); ?></th>
						<th class="am-title"><?php echo e(__('Url')); ?></th>
						
						<th class="am-date"><?php echo e(__('Last Update')); ?></th>
					</tr>
				</tfoot>
			</table>
			<?php echo e($pages->links('vendor.pagination.bootstrap-4')); ?>


		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/form.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/page/index.blade.php ENDPATH**/ ?>