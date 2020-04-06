<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mailer Demo</title>
</head>
<body>
<h4>Bonjour <?php echo e($contact->name); ?>,</h4>
<p><?php echo e(nl2br($text)); ?></p>
<p>Cordialement,<br>
David et Christina</p>
</body>
</html>
<?php /**PATH /home/alpha02/Location/resources/views/mail/index.blade.php ENDPATH**/ ?>