<?php if(!empty($menus)): ?>
<?php
$mainMenus=$menus;
?>
<?php if(isset($mainMenus['name'])): ?>
<?php
$name=$mainMenus['name'];
$data=$mainMenus['data'];
?>
 <div class="widget mb-5 mb-lg-0">
	<h4 class="text-capitalize mb-3"><?php echo e($name); ?></h4>
	<div class="divider mb-4"></div>

	<ul class="list-unstyled footer-menu lh-35">
		<?php $__currentLoopData = $data ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<li><a <?php if(url()->current() == url($row->href)): ?> class="active" <?php endif; ?> href="<?php echo e(url($row->href)); ?>" <?php if(!empty($row->target)): ?> target="<?php echo e($row->target); ?>" <?php endif; ?>><?php echo e($row->text); ?></a></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php endif; ?>
<?php endif; ?><?php /**PATH D:\Work\dokan\Dokan\files\script\vendor\lpress\src/views/lphelper/lpmenucustom/parent.blade.php ENDPATH**/ ?>