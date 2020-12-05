

<?php $__env->startSection('content'); ?>
<p>We have successfully resetted your password. <br/>Your new password is: <strong><?php echo e($password); ?></strong></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/email/reset_password.blade.php ENDPATH**/ ?>