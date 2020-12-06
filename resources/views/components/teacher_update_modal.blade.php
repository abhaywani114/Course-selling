
<div id="update_teacher_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">New Teacher</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form method="post" id="update_teacher_form">

				 <div class="form-group">
					<input type="text" name="name" class="form-control"
						value="{{$teacher->name??''}}" placeholder="Teacher Name" required />
				 </div>

				 <div class="form-group">
					<input type="text" name="designation" class="form-control"
					value="{{$teacher->designation??''}}" placeholder="Designation" required />
				 </div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="description"	rows="5" placeholder="Description" required
							 />{!! nl2br(strip_tags($teacher->description??'', '<p><a><br>'));  !!}</textarea>
				</div>

				 <div class="form-group">
					<input type="file" name="image" class="form-control" / >
				</div>
				<input type="hidden" name="teacher_id" value="{{$teacher->id}}">

				 <div class="form-group row">
                	  <div class="col-md-10 mx-auto d-block">
						 <input type="submit" onclick="update_teacher_ajax()" data-dismiss="modal"
							class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-100" 
							value="Add Teacher">
                  	</div>
               </div>

			</form>
		</div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	</div>
</div>
</div>