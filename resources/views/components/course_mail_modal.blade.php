<div id="mail_course_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">New Mail</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form method="post" id="mail_course_form">
				<div class="form-group">
					<input type="text" name="subject" class="form-control"
						value="" placeholder="Email Subject" required />
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="body"	rows="5" placeholder="Email Content" required /></textarea>
				</div>

				<input type="hidden" name="course_id" value="{{$course->id}}" />

				 <div class="form-group row">
                	  <div class="col-md-10 mx-auto d-block">
						 <input type="submit" onclick="send_mail_ajax()" data-dismiss="modal"
							class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-100" 
							value="Send Mail">
                  	</div>
               </div>

			</form>
		</div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	</div>
</div>
</div>