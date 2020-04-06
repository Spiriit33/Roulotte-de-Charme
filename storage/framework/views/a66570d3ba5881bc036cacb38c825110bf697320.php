<div class="card">
    <div class="card-body">
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('administration')); ?>">Home</a> </p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('configuration')); ?>">Configuration</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('manage_roulotte')); ?>">Gérer la roulotte</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('manage_reservations')); ?>">Gérer les reservations</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('manage_activités')); ?>">Gérer les activités</a></p>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('manage_site')); ?>">Gérer les sites touristiques</a></p>
        <?php
        $contact = \App\Contact::awaitingAnswer();
        ?>
        <p class="mb-2" style="border-bottom: 1px dashed lightgray;"><a href="<?php echo e(route('manage_contacts')); ?>">Gérer les contacts</a> (<?php echo e($contact); ?>)</p>
    </div>
</div>
<?php /**PATH /home/alpha02/Location/resources/views/inc/admin.blade.php ENDPATH**/ ?>