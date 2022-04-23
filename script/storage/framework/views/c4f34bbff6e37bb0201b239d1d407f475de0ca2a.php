<div class="form-group">
	<label for="<?php echo e($id); ?>"><?php echo e($title); ?></label>
	<input type="<?php echo e($type); ?>" placeholder="<?php echo e($placeholder); ?>" name="<?php echo e($name); ?>" class="form-control" id="<?php echo e($id); ?>" <?php if($required == true): ?> required <?php endif; ?> value="<?php echo e($value); ?>" autocomplete="off" >
</div><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/components/input.blade.php ENDPATH**/ ?>