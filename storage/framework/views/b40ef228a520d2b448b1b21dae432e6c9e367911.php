<?php $__env->startSection('content'); ?>
<style>

   .slide-1 { 
   /* Full height */
   min-height: 100%;
   /* Create the parallax scrolling effect */
   background-attachment: fixed;
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   }
   .slide-1:before {
   position: absolute;
   height: 100%;
   width: 100%;
   background: #031528;
   opacity: .9;
   border-bottom-right-radius: 0px;
   }
   .form-control {
        height: 48px;
       font-family: "Muli", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, 
		"Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", 
			"Segoe UI Symbol", "Noto Color Emoji";
    }

	.form-control[type=search] {
			height: 32px;
	}

</style>
<div class="slide-1 ">
   <div class="container bg-white">
      <div class="row pt-5 mb-4">
         <div class="col-sm-7 col-md-10 col-lg-7">
			<h2 class="section-title mb-3">View Payment</h2>
			</div>
		</div>

		<table class="table table-bordered align-content-center"
			id="payment_table" style="width:100%">
			<thead class="thead-dark">
			<tr>
				<th style="width:30px;">No</th>
				<th style="width:75px;">Date</th>
        <th style="">Tx Id</th>
        <th style="width:200px">Course Name</th>
				<th style="width:200px">Username</th>
				<th style="width:75px">Amount</th>
				<th style="width:30px">Status</th>
		<!-- 		<th style="">Note</th> -->
			</tr>
			</thead>
			<tbody class="tablebody">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="text-center"><?php echo e($loop->index + 1); ?></td>
          <td><?php echo e(date("mDY", strtotime($payment->updated_at))); ?></td>
          <td><?php echo e($payment->transaction_id); ?></td>
          <td><?php echo e($payment->course_name); ?></td>
          <td><?php echo e($payment->username); ?></td>
          <td class="text-right"><?php echo e($payment->course_price); ?> USD</td>
          <td <?php if($payment->status == 'failed'): ?> 
             onclick="messageModal('<?php echo e($payment->note); ?>')"
              style="cursor:pointer;color:blue;"
            <?php endif; ?>
            ><?php echo e(ucfirst($payment->status)); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
</table>
<br/><br/>
<!---- ---->
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$('#payment_table').DataTable();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout\layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/admin/view_payment.blade.php ENDPATH**/ ?>