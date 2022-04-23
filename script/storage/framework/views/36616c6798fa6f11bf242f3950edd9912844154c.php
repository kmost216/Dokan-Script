
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4><?php echo e(__('Add new Page')); ?></h4>
				<form method="post" action="<?php echo e(route('admin.page.store')); ?>" >
					<?php echo csrf_field(); ?>
					<div class="custom-form pt-20">
						<?php
						$arr['title']= 'Page Title';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Page Title';
						$arr['name']= 'title';
						$arr['is_required'] = true;

						echo  input($arr);

						

						$arrn['title']= 'Page Content';
						$arrn['name']= 'content';
						$arr['class']= 'content';
						echo  editor($arrn);


						$arr['title']= 'Meta Description';
						$arr['id']= 'excerpt';
						$arr['placeholder']= 'Meta description';
						$arr['name']= 'excerpt';
						$arr['is_required'] = true;
						
						echo  textarea($arr);
						?>
						
					</div>
				</div>
			</div>

		</div>
		<div class="col-lg-3">
			<div class="single-area">
				<div class="card">
					<div class="card-body">
						
						
						<div class="btn-publish">
							<button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> <?php echo e(__('Save')); ?></button>
						</div>
					</div>
				</div>
			</div>
		<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<h5><?php echo e(__('Status')); ?></h5>
						<hr>
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
							<option value="1"><?php echo e(__('Published')); ?></option>
							<option value="2"><?php echo e(__('Draft')); ?></option>

						</select>
					</div>
				</div>
			</div>
		</div>



	<input type="hidden" name="type" value="1">
	<input type="hidden"  name="post_type" value="page">
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form.js?v=1.0')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/page/create.blade.php ENDPATH**/ ?>