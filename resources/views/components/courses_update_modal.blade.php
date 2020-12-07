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
						placeholder="Course Name" value="{{$course->name??''}}"  required>
				 </div>

				 <div class="form-group">
					<input type="date" name="date" class="form-control" 
						value="{{$course->date??''}}" placeholder="Date" required>
				 </div>

				 <div class="form-group">
					<span>Registration Time</span>
					<input type="time" name="reg_time" class="form-control" 
						value="{{$course->registration??''}}"	placeholder="Zoom Meeting Time (Ex: 10:00)" required>
				 </div>

				 <div class="form-group">
					<span>Login Zoom Time</span>
					<input type="time" name="zoom_time" class="form-control"  
						value="{{$course->meeting_time??''}}"	placeholder="Zoom Meeting Time (Ex: 10:00)" required>
				 </div>

				<div class="form-group">
					<span>Allowed Seats</span>
					<input type="number" name="seat_limit" class="form-control" value="{{$course->seat_limit??0}}" placeholder="Allowed Seats" required>
				 </div>

				 <div class="form-group">
				 	<span>Duration</span>
					<input type="text" name="duration" class="form-control"
						value="{{$course->duration??''}}" placeholder="Duration (Ex: 1 hour)" required>
				 </div>

				 <div class="form-group">
				 	<span>Price</span>
					<input type="text" name="price" class="form-control"
						value="{{$course->price??''}}" placeholder="Price (*All prices are in {{env('CURRENCY_CODE')}})" required>
				</div>

				 <div class="form-group">
				 	<span>Who should attend?</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="who_should_attend" rows="2" placeholder="who should attend?"
						 required>{{$course->who_should_attend??''}}</textarea>
				</div>

				 <div class="form-group">
				 	<span>Short Description</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="desp"	rows="2" placeholder="Short Description"
						 required>{{$course->short_description??''}}</textarea>
				</div>
				  <div class="form-group">
				 	<span>Visibility</span>
		            <select type="text" name="status" class="form-control"  required>
		              <option value="active" class="form-control">Active</option>
		              <option value="inactive" class="form-control">Inactive</option>
		            </select>
		         </div>
				<hr/>
				 <div class="form-group">
				 	<span>Course Details</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name='details' rows="4" 
						placeholder="Course Details">{{$course->details??''}}</textarea>
				</div>

				 <div class="form-group">
				 	<span>Course Structure</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="structure"	rows="4" 
							placeholder="Course Structure">{{$course->structure??''}}</textarea>
				</div>

				 <div class="form-group">
				 	<span>Course Course Aims</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
					name="aims"	rows="4" 
						placeholder="Course Course Aims">{{$course->course_aims??''}}</textarea>
				</div>

				 <div class="form-group">
				 	<span>Timetable & Marking Criteria</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="tmc"
							rows="4" placeholder="Timetable & Marking Criteria">{{$course->tmc??''}}</textarea>
				</div>

				 <div class="form-group">
				 	<span>Study Aid</span>
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="study_aid"
						rows="4" placeholder="Study Aid">{{$course->study_aid??''}}</textarea>
				</div>

				 <div class="form-group">
					<input type="file" name="image" class="form-control"  />
				</div>

					<input type="hidden" name="course_id" value="{{$course->id}}" />
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

