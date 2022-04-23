<div class="section-header">
  <h1><?php echo e($title); ?></h1>
  <div class="section-header-breadcrumb">
  	  <?php $__currentLoopData = request()->segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="breadcrumb-item"><?php echo e($segment); ?></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
  </div>
</div><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/layouts/partials/headersection.blade.php ENDPATH**/ ?>