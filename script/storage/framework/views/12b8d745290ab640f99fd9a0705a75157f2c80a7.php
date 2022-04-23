 <div class="form-group">
 	<label for="<?php echo e($id); ?>"><?php echo e($title); ?></label>
 	<textarea name="<?php echo e($name); ?>" class="form-control <?php echo e($class); ?>" cols="<?php echo e($cols); ?>" rows="<?php echo e($rows); ?>" placeholder="<?php echo e($placeholder); ?>" id="<?php echo e($id); ?>" maxlength="<?php echo e($maxlength); ?>" <?php if($is_required==true): ?> required="" <?php endif; ?>><?php echo e($value); ?></textarea>
 </div><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/components/textarea.blade.php ENDPATH**/ ?>