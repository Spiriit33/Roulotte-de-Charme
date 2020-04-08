<?php $__env->startSection('title'); ?>
    Gestion des Sites Touristiques | La Roulotte de Charme
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_site_touristique')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h4 class="mb-4">Gerer les Sites touristisques</h4>
    <p>Ici, vous pouvez gerer les sites touristiques présents sur la page activité.</p>
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <?php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'active show' : null;
            $active1 = isset($errors) ? 'active show' : null;
        ?>
        <li class="nav-item">
            <a class="nav-link <?php echo e($active); ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Gestion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e($active1); ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Création</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <?php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'show active ' : null;
            $active1 = isset($errors) ? 'show active' : null;
        ?>
        <div class="tab-pane fade <?php echo e($active); ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                        <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="/storage/<?php echo e($site->hash); ?>" style="max-width: 175px;"></td>
                            <td><?php echo e($site->description); ?></td>
                            <td><a href="<?php echo e(route('edit_sites',['id'=>$site->id])); ?>"><i class="fas fa-edit"></i></a> <a href="<?php echo e(route('delete_sites',['id'=>$site->id])); ?>"><i class="fas fa-trash"></i> </a> </td>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
        <div class="tab-pane fade <?php echo e($active1); ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="col-form-label">Image:</label><br>
                <input type="file" name="image" class="form-control form-control-file col-md-6 <?php if($active1): ?> <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php endif; ?>">
                <?php if($active1): ?>
                    <?php $__errorArgs = ['image'];
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
                <label class="col-form-label">Description:</label>
                <input type="text" name="description" class="form-control form-control-sm col-md-6 <?php if($active1): ?> <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php endif; ?>">
                <?php if($active1): ?>
                    <?php $__errorArgs = ['description'];
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
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            </form>
        </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/sites/index.blade.php ENDPATH**/ ?>