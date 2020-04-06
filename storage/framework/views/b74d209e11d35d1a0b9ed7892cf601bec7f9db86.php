<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('update_activites')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h5 class="mb-2">Modifier activité</h5>
    <form method="post">
        <?php echo $__env->make('inc.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo csrf_field(); ?>
    <div class="form-group">
        <label class="col-form-label">Titre <span class="red">*</span> </label>
        <input type="text" class="form-control form-control-sm col-md-6" name="titre" value="<?php echo e($activite->title); ?>">
    </div>
    <div class="form-group">
        <label class="col-form-label">Description<span class="red">*</span> </label>
       <textarea class="col-md-8 form-control form-control-sm" name="description" rows="6"><?php echo e($activite->description); ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>
    </form>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/activites/edit.blade.php ENDPATH**/ ?>