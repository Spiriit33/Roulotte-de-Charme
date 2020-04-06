<?php $__env->startSection('title'); ?>
    Configuration | La Roulotte De Charme
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('administration')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h4 class="mb-3">Configuration</h4>
    <form method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <?php if(isset($configuration)): ?>
    <div class="form-group">
        <label class="col-form-label">Titre du site</label>
        <input type="text" class="col-md-6 form-control form-control-sm" name="titre" value="<?php echo e($configuration->title); ?>">
    </div>
        <div class="form-group">
            <label class="col-form-label">Email </label>
            <input type="email" class="col-md-6 form-control form-control-sm" name="email" value="<?php echo e($configuration->email); ?>">
        </div>
        <div class="form-group">
            <label class="col-form-label">Telephone</label>
            <input type="text" class="col-md-6 form-control form-control-sm" name="telephone" value="<?php echo e($configuration->telephone); ?>">
        </div>
    <div class="form-group">
        <label class="col-form-label">Logo du site</label>
        <input type="file" class="col pl-0" name="logo">
        <div class="img-thumbnail mt-3" style="max-width: 100px;">
            <img src="/storage/<?php echo e($configuration->logo); ?>" class="w-100">
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label">Message d'acceuil</label>
        <textarea class="col-md-8 form-control form-control-sm" name="message_acceuil" rows="6"><?php echo e($configuration->msg_home); ?></textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label">Images slider</label>
        <input type="file" class="col pl-0 mb-3"  name="images[]" multiple>
        <div class="row ml-0 mr-0">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-2 col-sm-4 col-s">
                    <div class="img-thumbnail w-100">
                    <img src="/storage/<?php echo e($image->hash); ?>" class="w-100">
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
    <?php else: ?>
        <div class="form-group">
            <label class="col-form-label">Titre du site</label>
            <input type="text" class="col-md-6 form-control form-control-sm" name="titre" value="">
        </div>
        <div class="form-group">
            <label class="col-form-label">Email </label>
            <input type="email" class="col-md-6 form-control form-control-sm" name="email" value="">
        </div>
        <div class="form-group">
            <label class="col-form-label">Telephone</label>
            <input type="text" class="col-md-6 form-control form-control-sm" name="telephone" value="">
        </div>
        <div class="form-group">
            <label class="col-form-label">Logo du site</label>
            <input type="file" class="col pl-0" name="logo">
            <div class="img-thumbnail mt-3" style="max-width: 100px;">
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label">Message d'acceuil</label>
            <textarea class="col-md-8 form-control form-control-sm" name="message_acceuil" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label class="col-form-label">Images slider</label>
            <input type="file" class="col pl-0"  name="images[]" multiple>
        </div>
        <div class="form-row mr-0 ml-0 mb-0">
            <div class="form-group mb-2">
                <div class="form-check-inline">
                    <input type="checkbox" class="form-check-input" name="afficher_actu">
                    <label class="col-form-label form-check-label">Afficher les actualités en page d'acceil</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        </form>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/configuration.blade.php ENDPATH**/ ?>