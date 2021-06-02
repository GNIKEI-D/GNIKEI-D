<?php $__env->startSection('content'); ?>

<!-- <div class="footer-city row no-margin" style="background-image: url(<?php echo e(asset('asset/img/footer-city.png')); ?>);"></div> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>