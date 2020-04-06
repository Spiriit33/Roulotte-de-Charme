<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('location')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Situer la roulotte</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2816.114644569324!2d-0.5016486844545791!3d45.10374397909831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48002ef0796ca7a1%3A0x523dcb256e4a8daa!2sLa%20Garenne%2C%2033920%20Saint-Vivien-de-Blaye!5e0!3m2!1sfr!2sfr!4v1582179333659!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/location.blade.php ENDPATH**/ ?>