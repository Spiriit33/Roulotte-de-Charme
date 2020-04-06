<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('show_bookings',$reservation)); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h5>Reservation numèro #<?php echo e($reservation->id); ?></h5>
    <div class="form-group">
        <label class="col-form-label">Date de début</label>
        <input type="date" class="form-control form-control-sm col-md-6" value="<?php echo e($reservation->date_debut); ?>" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label">Date de fin</label>
        <input type="date" class="form-control form-control-sm col-md-6" value="<?php echo e($reservation->date_fin); ?>" readonly>
    </div>
    <?php
        $nom = $reservation->nom==null ? '/' : $reservation->nom;
        $email = $reservation->email==null ? '/' : $reservation->email;
        $commentaire = $reservation->commentaire ==null ? '/' : $reservation->commentaire;
    ?>
    <div class="form-group">
        <label class="col-form-label">Nom</label>
        <input type="text" class="form-control form-control-sm col-md-6" value="<?php echo e($nom); ?>" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label">Email</label>
        <input type="text" class="form-control form-control-sm col-md-6" value="<?php echo e($email); ?>" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label col-form-label-sm">Commentaire</label>
        <textarea class="col-md-8 form-control form-control-sm" rows="7"><?php echo e($commentaire); ?></textarea>
    </div>
    <a href="<?php echo e(route('delete_reservation',['id'=>$reservation->id])); ?>"><button type="submit" class="btn btn-sm btn-primary">Supprimer reservation</button></a>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/reservation/show.blade.php ENDPATH**/ ?>