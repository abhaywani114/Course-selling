@extends('layout.layout')
@section('content')
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
       		 <div class="col-sm-7 col-md-10 col-lg-7  justify-content-center align-self-center">
				<h2 class="section-title my-2">Manage Courses</h2>
			</div>

       		 <div class="col-sm-5 col-md-2 col-lg-5 text-right  justify-content-center align-self-center">
				<span style="font-size:40px;" data-target="#add_new_course_modal" data-toggle="modal"
					 class="btn text-success"><i class="fa fa-plus-circle"></i></span>
			</div>
		</div>

		<table class="table table-bordered align-content-center"
			id="course_table" style="width:100%">
			<thead class="thead-dark">
			<tr>
				<th style="width:30px">No</th>
				<th style="width:300px">Course Name</th>
				<th style="">Price</th>
				<th style="">Date</th>
				<th style="">Enrolled</th>
				<th style="">Status</th>
				<th style="width:30px"></th>
				<th style="width:30px"></th>
				<th style="width:30px"></th>
			</tr>
			</thead>
			<tbody class="tablebody">
			</tbody>
</table>
<!---- ---->
	</div>
</div>


<div id="add_new_course_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">New Course</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form method="post" id="new_course_form">
				 <div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Course Name" required>
				 </div>

				 <div class="form-group">
					<input type="date" name="date" class="form-control" placeholder="Date" required>
				 </div>

				 <div class="form-group">
					<span>Registration Time</span>
					<input type="time" name="reg_time" class="form-control" placeholder="Zoom Meeting Time (Ex: 10:00)" required>
				 </div>

				 <div class="form-group">
					<span>Login Zoom Time</span>
					<input type="time" name="zoom_time" class="form-control" placeholder="Zoom Meeting Time (Ex: 10:00)" required>
				 </div>

				<div class="form-group">
					<span>Allowed Seats</span>
					<input type="number" name="seat_limit" class="form-control" value="0" placeholder="Allowed Seats" required>
				 </div>

				 <div class="form-group">
					<input type="text" name="duration" class="form-control" placeholder="Duration (Ex: 1 hour)" required>
				 </div>

				 <div class="form-group">
					<input type="text" name="price" class="form-control" placeholder="Price" required>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="who_should_attend" rows="2" placeholder="who should attend?" required></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="desp"	rows="2" placeholder="Short Description" required></textarea>
				</div>
				 <div class="form-group">
		            <select type="text" name="status" class="form-control"  required>
		              <option value="active" class="form-control">Active</option>
		              <option value="inactive" class="form-control">Inactive</option>
		            </select>
		         </div>
				<hr/>
				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name='details' rows="4" placeholder="Course Details"></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="structure"	rows="4" placeholder="Course Structure"></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
					name="aims"	rows="4" placeholder="Course Course Aims"></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="tmc"	rows="4" placeholder="Timetable & Marking Criteria"></textarea>
				</div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="study_aid"	rows="4" placeholder="Study Aid"></textarea>
				</div>

				 <div class="form-group">
					<input type="file" name="image" class="form-control" placeholder="Price" >
				</div>

				 <div class="form-group row">
                	  <div class="col-md-10 mx-auto d-block">
						 <input type="submit" onclick="save_course()" data-dismiss="modal"
							class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-100" 
							value="Add Course">
                  	</div>
               </div>

			</form>
		</div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	</div>
</div>
</div>
	
<div id="res"></div>

@endsection
@section('js')
<script>
var courseTable = $('#course_table').DataTable({
	"destroy": true,
	"processing": false,
	"serverSide": true,
	"autoWidth": false,
	"ajax": {
		url:"{{route('admin.courses.datatable_main')}}",
		type: "POST",
		"data": {
		}
	},
	columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'name', name: 'name'},
		{data: 'price', name: 'price'},
		{data: 'date', name: 'date'},
		{data: 'student_enrolled', name: 'student_enrolled'},
		{data: 'status', name: 'status'},
		{data: 'send_email', name: 'send_email'},
		{data: 'edit', name: 'edit'},
		{data: 'delete', name: 'delete'}
	],
	"order": [],
	"columnDefs": [
		{"className": "text-center", "targets": [0,3,4,5,6,7,8]},
		{"className": "text-right", "targets": [2]}
	]
});
function save_course() {
   event.preventDefault();
   formData = new FormData($("#new_course_form")[0]);
   $.ajax({
        type: 'POST',
        url: "{{route('admin.courses.new')}}",
        mimeType:'application/json',
        dataType:'json',
        data: formData,
        contentType: false,
        processData: false,
        success: function(res){                            
      		if (res.success == true)
				messageModal(res.msg);
			else
				messageModal(res.error);
	
		   $("#new_course_form")[0].reset();
			courseTable.ajax.reload();
        },
        error: function(data){
			messageModal(handleValdationError(data));
        }
    });             
}

function updateCourses(id) {
	$.post("{{route('admin.courses.update')}}", {
		course_id:id
	}).done((res) => {
		$("#res").html(res);
		$("#update_course_modal").modal('show');
	});
}

function mailCourses(id) {
	$.post("{{route('admin.courses.mail_modal')}}", {
		course_id:id
	}).done((res) => {
		$("#res").html(res);
		$("#mail_course_modal").modal('show');
	});
}

function update_course_ajax() {
	   event.preventDefault(); 
		 formData = new FormData($("#update_course_form")[0]);
	   $.ajax({
	        type: 'POST',
	        url: "{{route('admin.courses.new')}}",
	        mimeType:'application/json',
	        dataType:'json',
	        data: formData,
	        contentType: false,
	        processData: false,
	        success: function(res){                            
	      		if (res.success == true)
					messageModal(res.msg);
				else
					messageModal(res.error);
		
			   $("#update_course_form")[0].reset();
				courseTable.ajax.reload();
	        },
	        error: function(data){
				messageModal(handleValdationError(data));
	        }
	    });           
}

function delete_course(id) {
	if_confirm = confirm("Are you sure you want to delete?");
	
	if (if_confirm) {
		$.post("{{route('admin.courses.delete')}}", {
			course_id: id
		}).done( (res) => {
			messageModal("Course deleted success");
			courseTable.ajax.reload();
		});
	}
}
function send_mail_ajax() {
   event.preventDefault();
   $.post("{{route('admin.courses.send_mail')}}", $("#mail_course_form").serialize() ).done( (res) => {
   		if (res.success == true)
			messageModal(res.msg);
		else
			messageModal(res.error);
	   $("#mail_course_form")[0].reset();
	}).fail( (data) => {
		messageModal(handleValdationError(data));
	});		
}
</script>
@endsection
