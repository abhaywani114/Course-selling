<!-- Modal Product Detail -->
<div id="product_detail_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Course Details</h4>
        <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		
    <div class="col-md-12">

      <h5><?php echo e($course->name); ?></h5>
		 
	  <div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
              <td><?php echo e(date("Y-M-d",strtotime($course->date))); ?></td>
            </tr>

            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Registration</strong></th>
              <td><?php echo e($course->registration); ?></td>
            </tr>

            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Zoom Meeting</strong></th>
              <td><?php echo e($course->meeting_time); ?></td>
            </tr>

            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Duration</strong></th>
              <td><?php echo e($course->duration); ?></td>
            </tr>

            <tr>
             <th class="pl-0 w-25" scope="row"><strong>who should attend?</strong></th>
              <td><?php echo e($course->who_should_attend); ?></td>
            </tr>

		   <tr>
             <th class="pl-0 w-25" scope="row"><strong>Price</strong></th>
              <td>$<?php echo e($course->price); ?></td>
            </tr>

          </tbody>
        </table>

  <?php if(!empty($course->details)): ?>
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Details</strong></h5>
			<p class="pt-1"><?php echo e($course->details); ?></p>
		</div>
  <?php endif; ?>

    <?php if(!empty($course->structure)): ?>
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Structure</strong></h5>
			<p class="pt-1"><?php echo e($course->structure); ?></p>
		</div>
    <?php endif; ?>

    <?php if(!empty($course->course_aims)): ?>
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Course Aims</strong></h5>
		    <p class="pt-1"><?php echo e($course->course_aims); ?></p>
    </div>
    <?php endif; ?>

  <?php if(!empty($course->tmc)): ?>
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Timetable & Marking Criteria</strong></h5>
        <p class="pt-1"><?php echo e($course->tmc); ?></p>
		</div>
  <?php endif; ?>

   <?php if(!empty($course->tmc)): ?>
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Study Aid</strong></h5>
         <p class="pt-1"><?php echo e($course->study_aid); ?></p>
		</div>
    <?php endif; ?>

      </div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;">
      </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/components/course_detail.blade.php ENDPATH**/ ?>