<?php $__env->startSection('title'); ?>
    La Roulotte de Charme | Administration
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('administration')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h4 class="mb-4">Admin Panel</h4>
    <div class="row ml-0 mr-0">
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: orangered;">
                    <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Reservations :</span>
                    </div>
                    <div style="position: absolute; bottom: 20px; right: 25px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><?php echo e($bookings); ?></span>
                    </div>
                    </div>
            </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: #009fff;">
                <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Activités :</span>
                </div>
                <div style="position: absolute; bottom: 20px; right: 25px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;"><?php echo e($activities); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: #01c86b;">
                <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Sites touristiques :</span>
                </div>
                <div style="position: absolute; bottom: 20px; right: 25px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;"><?php echo e($sites); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: #af00ff;">
                <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Contact :</span>
                </div>
                <div style="position: absolute; bottom: 20px; right: 25px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;"><?php echo e($bookings); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/index.blade.php ENDPATH**/ ?>