

<?php $__env->startSection('content'); ?>
<p><?php echo nl2br(strip_tags($body, '<p><a><br>'));; ?></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/email/course_notification.blade.php ENDPATH**/ ?>