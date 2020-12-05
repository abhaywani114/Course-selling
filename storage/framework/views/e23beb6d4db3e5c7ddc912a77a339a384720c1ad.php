<div id="update_course_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Update Course</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form method="post" id="update_course_form">
				 <div class="form-group">
					<input type="text" name="name" class="form-control" 
						placeholder="Course Name" value="<?php echo e($course->name??''); ?>"  required>
				 </div>

				 <div class="form-group">
					<input type="date" name="date" class="form-control" 
						value="<?php echo e($course->date??''); ?>" placeholder="Date" required>
				 </div>

				 <div class="form-group">
					<span>Registration Time</span>
					<input type="time" name="reg_time" class="form-control" 
						value="<?php echo e($course->registration??''); ?>"	placeholder="Zoom Meeting Time (Ex: 10:00)" required>
				 </div>

				 <div class="form-group">
					<span>Login Zoom Time</span>
					<input type="time" name="zoom_time" class="form-control"  
						value="<?php echo e($course->meeting_time??''); ?>"	placeholder="Zoom Meeting Time (Ex: 10:00)" required>
				 </div>

				 <div class="form-group">
					<input type="text" name="duration" class="form-control"
						value="<?php echo e($course->duration??''); ?>" placeholder="Duration (Ex: 1 hour)" required>
				 </div>

				 <div class="form-group">
					<input type="text" name="price" class="form-control"
						value="<?php echo e($course->price??''); ?>" placeholder="Price" required>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="who_should_attend" rows="2" placeholder="who should attend?"
						 required><?php echo e($course->who_should_attend??''); ?></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="desp"	rows="2" placeholder="Short Description"
						 required><?php echo e($course->short_description??''); ?></textarea>
				</div>
				<hr/>
				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name='details' rows="4" 
						placeholder="Course Details"><?php echo e($course->details??''); ?></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="structure"	rows="4" 
							placeholder="Course Structure"><?php echo e($course->details??''); ?></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
					name="aims"	rows="4" 
						placeholder="Course Course Aims"><?php echo e($course->course_aims??''); ?></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="tmc"
							rows="4" placeholder="Timetable & Marking Criteria"><?php echo e($course->tmc??''); ?></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="study_aid"
						rows="4" placeholder="Study Aid"><?php echo e($course->study_aid??''); ?></textarea>
				</div>

				 <div class="form-group">
					<input type="file" name="file" class="form-control"  />
				</div>

					<input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />
				 <div class="form-group row">
                	  <div class="col-md-10 mx-auto d-block">
						 <input type="submit" onclick="update_course_ajax()" data-dismiss="modal"
							class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-100" 
							value="Update Course">
                  	</div>
               </div>

			</form>
		</div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	</div>
</div>
</div>

<?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/admin/courses_update_modal.blade.php ENDPATH**/ ?>