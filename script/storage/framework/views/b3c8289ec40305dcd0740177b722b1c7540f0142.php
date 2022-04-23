<?php if(!empty($menus)): ?>
	<?php
	$mainMenus=json_decode($menus->data);
	?>
	<?php $__currentLoopData = $mainMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
	<?php if(isset($row->children)): ?> 
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown"
	aria-haspopup="true" aria-expanded="false"><?php echo e($row->text); ?> <i class="icofont-thin-down"></i></a>

	<ul class="dropdown-menu" aria-labelledby="dropdown02">
		 <?php $__currentLoopData = $row->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childrens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <?php echo $__env->make('lphelper::lphelper.lpmenu.child', ['childrens' => $childrens], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</li>
<?php else: ?>

<li  class="nav-item">
	<a  class="nav-link"  href="<?php echo e(url($row->href)); ?>" <?php if(!empty($row->target)): ?> target="<?php echo e($row->target); ?>" <?php endif; ?>><?php echo e($row->text); ?></a>
</li>

<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\Work\dokan\Dokan\front\vendor\lpress\src/views/lphelper/lpmenu/parent.blade.php ENDPATH**/ ?>