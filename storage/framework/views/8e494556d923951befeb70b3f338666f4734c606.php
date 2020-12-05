

<?php $__env->startSection('content'); ?>
<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color: #000;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<p>Thank you for purchasing courses from us. <br/>We have recieved your payment and your transaction id is: <strong><?php echo e($tx_id); ?></strong></p>
<table style="width:100%;">
	<thead>
	  <tr>
	    <th style="text-align: center;width:70px;" >S. No</th>
	    <th style="text-align: left">Course Name</th>
	    <th style="width:150px;text-align: right">Price</th>
	  </tr>		
	</thead>
	<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <tr>
		    <td style="text-align: center"><?php echo e($loop->index + 1); ?></td>
		    <td style="text-align: left"><?php echo e($c->name); ?></td>
		    <td style="text-align: right;"><?php echo e($c->price); ?> USD</td>
		  </tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  <tr>
	    <td style="text-align: center;" colspan="2"><strong>Total Price</strong></td>
	    <td style="text-align: right;"><?php echo e($courses->reduce(function	($a, $b){
	    		return $a + $b->price;
	    	})); ?> USD</td>
	  </tr>
	<tbody>
	</tbody>
</table>
<br/>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/email/course_invoice.blade.php ENDPATH**/ ?>