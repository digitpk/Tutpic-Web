<?php $__env->startSection('css'); ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Slider Area  -->
    <?php echo $__env->make('layout.includes.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Slider Area  -->

    <!-- Start Service Area  -->
    <?php echo $__env->make('pages.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Start Service Area  -->

    <!-- Start About Area  -->
    <?php echo $__env->make('pages.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Start About Area  -->

    <!-- Start Portfolio Area  -->
    <?php echo $__env->make('pages.portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Start Portfolio Area  -->

    <!-- Start Team Area  -->
<?php echo $__env->make('pages.team', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Team Area  -->


    <!-- Start Counterup Area  -->
    <?php echo $__env->make('pages.counterup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Counterup Area  -->

    <!-- Start Testimonial Area  -->
    <?php echo $__env->make('pages.testimonial-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Start Testimonial Area  -->

    <!-- Start Blog Area  -->
    <?php echo $__env->make('pages.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Blog Area  -->

    <!-- Start Contact Area  -->
    <?php echo $__env->make('pages.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Contact Area  -->

    <!-- Start Brand Area -->
    <?php echo $__env->make('pages.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Brand Area -->


 <?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/welcome.blade.php ENDPATH**/ ?>