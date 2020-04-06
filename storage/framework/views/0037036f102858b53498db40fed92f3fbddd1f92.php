<?php $__env->startSection('title'); ?>
    Gestion des Activités | La Roulotte De Charme
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_activites')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h4 class="mb-4">Gerer les activités</h4>
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <?php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'active ' : null;
            $active1 = isset($errors) ? 'active' : null;
        ?>
        <li class="nav-item">
            <a class="nav-link <?php echo e($active); ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Gestion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e($active1); ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Création</a>
        </li>
    </ul>
    <div class="tab-content mb-3" id="myTabContent">
        <?php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'show active ' : null;
            $active1 = isset($errors) ? 'show active' : null;
        ?>
        <div class="tab-pane fade <?php echo e($active); ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-sm">
            <table class="table table-responsive-sm table-striped">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Action</th>
                </tr>
                <?php $__currentLoopData = $activites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>#<?php echo e($activite->id); ?></td>
                    <td><?php echo e($activite->title); ?></td>
                    <td><a href="<?php echo e(route('edit_activite',['id'=>$activite->id])); ?>"><i class="fas fa-edit"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
            </div>
        <div class="tab-pane fade <?php echo e($active1); ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="post">
                <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="col-form-label">Titre de l'activité <span class="red">*</span> </label>
                <input type="text" class="col-md-6 form-control form-control-sm <?php if($active1): ?><?php $__errorArgs = ['titre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php endif; ?>" name="titre">
                <?php if($active1): ?>
                <?php $__errorArgs = ['titre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="col-form-label">Description<span class="red">*</span> </label>
                <textarea class="col-md-8 form-control form-control-sm <?php if($active1): ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php endif; ?>" rows="6" name="description"></textarea>
                <?php if($active1): ?>
                    <?php $__errorArgs = ['titre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Créer activité</button>
            </div>
            </form>
        </div>
    </div>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/activites/index.blade.php ENDPATH**/ ?>