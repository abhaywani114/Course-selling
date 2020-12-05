

<?php $__env->startSection('content'); ?>
<strong>You received a message from : <?php echo e($data['fname']); ?> <?php echo e($data['lname']); ?></strong>

<p>
<strong>Email:</strong> <?php echo e($data['email']); ?>

<br/>
<strong>Subject:</strong> <?php echo e($data['subject']); ?>

</p>
 
<p>
<strong>Message:</strong><br/> <?php echo nl2br(strip_tags($data['message'], '<p><a><br>'));; ?>

</p>
----------End of message------
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/email/contact_support.blade.php ENDPATH**/ ?>