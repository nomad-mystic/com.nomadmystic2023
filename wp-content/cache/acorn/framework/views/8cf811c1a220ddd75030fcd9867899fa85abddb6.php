<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php (the_post()); ?>
    <?php echo $__env->make('partials.page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.content-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/keith/Sites/com.nomadmystic2023/wp-content/themes/nomad-mystic/resources/views/template-custom.blade.php ENDPATH**/ ?>