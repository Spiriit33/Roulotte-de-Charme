<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('administration')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Administration</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <?php echo csrf_field(); ?>
                    <div class="form-group row justify-content-center">
                        <input type="text" class="form-control form-control-sm col-md-8" placeholder="Nom d'utilisateur" name="username">
                    </div>
                    <div class="form-group row justify-content-center">
                        <input type="password" class="form-control form-control-sm col-md-8" placeholder="Mot de passe" name="password">
                    </div>
                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-sm btn-primary">Se connecter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/login.blade.php ENDPATH**/ ?>