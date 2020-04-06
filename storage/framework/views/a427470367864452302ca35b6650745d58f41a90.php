<?php $__env->startSection('breadcrumbs'); ?>
    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('show_contacts',$contact)); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h5 class="mb-3">Conversation : <?php echo e($contact->objet); ?></h5>
    <?php echo $__env->make('inc.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col pl-0 mb-2" style="background:
#fff;
border: 1px solid
lightgray;
min-height: 100px;">
        <div class="texte" style="margin:10px;">
            <?php
            $name=$contact->username == null ? $contact->name : $contact->username;
            $date=date('d/m/y',strtotime($contact->created_at));
            $hour=date('h:i:s',strtotime($contact->created_at));
            ?>
            <h6>Ecrit par <?php echo e($name); ?> le <?php echo e($date); ?> à <?php echo e($hour); ?></h6>
            <p><?php echo e($contact->message); ?></p>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col pl-0 " style="">
        <form method="post">
            <?php echo csrf_field(); ?>
        <div class="form-group">
            <label class="col-form-label">Répondre</label>
            <textarea class="form-control form-control-sm" name="message" rows="6"></textarea>
        </div>
        <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-sm btn-primary" name="">Envoyer par mail</button>
        </div>
        </form>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/contact/show.blade.php ENDPATH**/ ?>