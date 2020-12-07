<div id="person_detail" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Faculty Details</h4>
        <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
      </div>
	  <div class="modal-body">
               <img src='<?php echo e(asset("img/upload/$teacher->image")); ?>' alt="" 
             style="width: 200px;height: 200px;object-fit: cover;"
               class="rounded-circle mx-auto mb-4 d-block">
               <div class="pt-2 text-center">
                  <h5 class="text-black"><strong><?php echo e($teacher->name); ?></strong></h5>
				<p><?php echo e($teacher->designation); ?></p>
               </div>

		<div>
			<p class="pt-1 text-justify"><?php echo nl2br(strip_tags($teacher->description??'', '<p><a><br>'));; ?></p>
		</div>

		</div>
	</div>
</div>
</div><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/components/teacher_detail.blade.php ENDPATH**/ ?>