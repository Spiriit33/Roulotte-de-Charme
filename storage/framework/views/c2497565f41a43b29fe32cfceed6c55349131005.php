<?php $__env->startSection('title'); ?>
    Gestion Des Contacts | La Roulotte De Charme
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_contacts')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h4 class="mb-3">Gérer les contacts</h4>
    <p>Ici, vous pouvez voir les différents messages envoyès par les visiteurs.</p>
     <div class="table-responsive">
         <table class="table table-striped">
             <tr>
                 <th>#ID</th>
                 <th>Nom</th>
                 <th>Email</th>
                 <th>Objet</th>
                 <th>Statut</th>
                 <th>Action</th>
             </tr>
                 <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                     <td>#<?php echo e($contact->id); ?></td>
                     <td><?php echo e($contact->name); ?></td>
                     <td><?php echo e($contact->email); ?></td>
                     <td><?php echo e($contact->objet); ?></td>
                     <td><button type="submit" class="btn btn-dark btn-sm"><?php echo e($contact->status->status); ?></button> </td>
                     <td><a href="<?php echo e(route('show_contacts',['id'=>$contact->id])); ?>"><i class="fas fa-eye"></i> </a> <a href="<?php echo e(route('delete_contact',['id'=>$contact->id])); ?>"> <i class="fas fa-trash"></i> </a> </td>
             </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </table>
     </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/contact/index.blade.php ENDPATH**/ ?>