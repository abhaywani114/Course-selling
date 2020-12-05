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
       		 <div class="col-sm-7 col-md-10 col-lg-7  justify-content-center align-self-center">
				<h2 class="section-title my-2">Manage Teachers</h2>
			</div>

       		 <div class="col-sm-5 col-md-2 col-lg-5 text-right  justify-content-center align-self-center">
				<span style="font-size:40px;" data-target="#add_new_teacher_modal" data-toggle="modal"
					 class="btn text-success"><i class="fa fa-plus-circle"></i></span>
			</div>
		</div>

		<table class="table table-bordered align-content-center"
			id="teacher_table" style="width:100%">
			<thead class="thead-dark">
			<tr>
				<th style="width:30px;">No</th>
				<th style="">Name</th>
				<th style="width:100px">Designation</th>
				<th style="width:100px">Date</th>
				<th style="width:30px;"></th>
				<th style="width:30px;"></th>
			</tr>
			</thead>
			<tbody class="tablebody">
			</tbody>
</table>
<!---- ---->
	</div>
</div>

<div id="add_new_teacher_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">New Teacher</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form method="post" id="new_teacher_form">

				 <div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Teacher Name" required />
				 </div>

				 <div class="form-group">
					<input type="text" name="designation" class="form-control" placeholder="Designation" required />
				 </div>

				 <div class="form-group">
					 <textarea class="form-control " style="height:auto" id="" cols="30" 
						name="description"	rows="5" placeholder="Description" required /></textarea>
				</div>

				 <div class="form-group">
					<input type="file" name="image" class="form-control" / >
				</div>

				 <div class="form-group row">
                	  <div class="col-md-10 mx-auto d-block">
						 <input type="submit" onclick="save_teacher()" data-dismiss="modal"
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
	
<div id="res"></div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
var teacher_table = $('#teacher_table').DataTable({
	"destroy": true,
	"processing": false,
	"serverSide": true,
	"autoWidth": false,
	"ajax": {
		url:"<?php echo e(route('admin.teachers.datatable_main')); ?>",
		type: "POST",
		"data": {
		}
	},
	columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'name', name: 'name'},
		{data: 'degn', name: 'degn'},
		{data: 'date', name: 'date'},
		{data: 'edit', name: 'edit'},
		{data: 'delete', name: 'delete'}
	],
	"columnDefs": [
		{"className": "text-center", "targets": [0,3,4,5]},
	]
});
function save_teacher() {
   event.preventDefault();
	formData = new FormData($("#new_teacher_form")[0]);
   $.ajax({
        type: 'POST',
        url: "<?php echo e(route('admin.teachers.new')); ?>",
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
		   $("#new_teacher_form")[0].reset();
			teacher_table.ajax.reload();
        },
        error: function(data){
			messageModal(handleValdationError(data));
        }
    }); 
}

function updateTeacher(id) {
	$.post("<?php echo e(route('admin.teachers.update')); ?>", {
		teacher_id:id
	}).done((res) => {
		$("#res").html(res);
		$("#update_teacher_modal").modal('show');
	});
}

function update_teacher_ajax() {
   event.preventDefault();
	formData = new FormData($("#update_teacher_form")[0]);
   $.ajax({
        type: 'POST',
        url: "<?php echo e(route('admin.teachers.new')); ?>",
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
		   $("#update_teacher_form")[0].reset();
			teacher_table.ajax.reload();
        },
        error: function(data){
			messageModal(handleValdationError(data));
        }
    }); 
}

function deleteTeacher(id) {
	if_confirm = confirm("Are you sure you want to delete?");
	
	if (if_confirm) {
		$.post("<?php echo e(route('admin.teachers.delete')); ?>", {
			teacher_id: id
		}).done( (res) => {
			messageModal("Teacher deleted successfully");
			teacher_table.ajax.reload();
		}).fail( (data) => {
				messageModal(handleValdationError(data));
   		});;
	}
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout\layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/admin/teachers.blade.php ENDPATH**/ ?>