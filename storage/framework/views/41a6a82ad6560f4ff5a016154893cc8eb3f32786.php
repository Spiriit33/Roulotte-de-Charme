<?php if(session()->get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e(session()->get('success')); ?></p>
</div>
    <?php endif; ?>
<?php /**PATH /home/alpha02/Location/resources/views/inc/flash-message.blade.php ENDPATH**/ ?>