<div id="notification_course_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Notification</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		<?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p class="p-0 m-0"><strong><?php echo e($n->subject ?? "Subject"); ?>,</strong>
				<span class="text-muted small pl-2" style="vertical-align: bottom;"><?php echo e(date("dMY", strtotime($n->created_at))); ?></span></p>
			<p ><?php echo nl2br(strip_tags($n->msg, '<p><a><br/	>'));; ?></p>
				<hr/>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	</div>
</div>
</div><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/components/course_notification.blade.php ENDPATH**/ ?>