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
    <script>
        $(document).ready(function() {
            $('#changePassword').click(function () {
                $('#calendarForm').modal('show');
            });
        });
    </script>
    <h4 class="mb-3">Configuration</h4>
    <button type="submit" class="btn btn-sm btn-primary mb-3" id="changePassword">Changer le mot de passe</button>
        <div id="calendarForm" class="modal fade" aria-hidden="true">
            <form method="post" name="">
                <?php echo csrf_field(); ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="modalTitle" class="modal-title">Changer le mot de passe administrateur</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>

                        </div>
                        <div id="modalBody" class="modal-body">
                            <div class="form-group">
                            <label class="col-form-label">Mot de passe actuelle</label>
                            <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required>
                                <?php $__errorArgs = ['password'];
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
                            </div>
                            <div class="form-group">
                            <label class="col-form-label">Nouveau mot de passe</label>
                            <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_password" id="new_password" required>
                                <?php $__errorArgs = ['new_password'];
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
                            </div>
                            <label class="col-form-label">Confirmer</label>
                            <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_password_confirmation" required>
                            <?php $__errorArgs = ['new_password'];
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Change" value="change">Changer</button>
                            <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php echo $__env->make('inc.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                <button type="submit" class="btn btn-primary"  name="save" value="">Enregistrer</button>
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
            <button type="submit" class="btn btn-primary" name="save">Enregistrer</button>
        </div>
        </form>
    <?php endif; ?>
    <?php if(\Illuminate\Support\Facades\Session::has('errors')): ?>
        <script>
            $(document).ready(function () {
                $('#calendarForm').modal('show');
            })
        </script>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/configuration.blade.php ENDPATH**/ ?>