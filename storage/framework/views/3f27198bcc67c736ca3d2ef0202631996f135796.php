<html>
<head>
    <title>IndiPay</title>
</head>
<body>
    <form method="post" name="redirect" action="<?php echo e($end_point); ?>">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param_key=>$param_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<input type=hidden name="<?php echo e($param_key); ?>" value="<?php echo e($param_name); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

<?php /**PATH D:\Server_Files\Network Venture\project_7001a\vendor\softon\indipay\src/views/mocker.blade.php ENDPATH**/ ?>