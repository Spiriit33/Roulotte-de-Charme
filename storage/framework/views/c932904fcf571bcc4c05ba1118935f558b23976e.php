<?php $__env->startSection('title'); ?>
    Modification Image De La Roulotte | La Roulotte De Charme
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('update_roulotte')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h5 class="mb-3">Modification</h5>
    <?php echo $__env->make('inc.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label class="col-form-label">Image:</label><br>
            <input type="file" name="image">
            <div class="img-thumbnail mt-2" style="max-width: 160px;">
                <img src="/storage/<?php echo e($image->hash); ?>" class="w-100">
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label">Description:</label>
            <input type="text" name="description" class="form-control form-control-sm col-md-6" value="<?php echo e($image->description); ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/roulotte/edit.blade.php ENDPATH**/ ?>