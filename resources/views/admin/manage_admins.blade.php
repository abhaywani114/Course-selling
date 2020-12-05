@extends('layout\layout')
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
        <h2 class="section-title my-2">Manage Admin</h2>
      </div>

      <div class="col-sm-5 col-md-2 col-lg-5 text-right  justify-content-center align-self-center">
        <span style="font-size:40px;" data-target="#add_new_admin_modal" data-toggle="modal"
           class="btn text-success"><i class="fa fa-plus-circle"></i></span>
      </div>
    </div>


		<table class="table table-bordered align-content-center"
			id="admin_table" style="width:100%">
			<thead class="thead-dark">
			<tr>
				<th style="width:30px;">No</th>
				<th style="">Name</th>
				<th style="width:200px;">Email</th>
        <th style="width:200px;">Last Login</th>
				<th style="width:100px;">Status</th>
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

<div id="add_new_admin_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">New Admin</h4>
      <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form method="post" id="new_admin_form" autocomplete="off">

         <div class="form-group">
            <input type="text" name="name" class="form-control" 
              placeholder="Admin Name" required />
         </div>

         <div class="form-group">
            <input type="email" name="email" class="form-control" 
              placeholder="Admin Email" required />
         </div>

         <div class="form-group">
            <input type="password" name="password" class="form-control" 
              placeholder="Password" autocomplete="off" required />
         </div>

         <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" 
              placeholder="Confirm Password" autocomplete="off" required />
         </div>

         <div class="form-group">
            <select type="text" name="status" class="form-control"  required>
              <option value="active" class="form-control">Active</option>
              <option value="inactive" class="form-control">Inactive</option>
            </select>
         </div>

         <div class="form-group row">
                    <div class="col-md-10 mx-auto d-block">
             <input type="submit" onclick="save_admin()" data-dismiss="modal"
              class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-100" 
              value="Add Admin">
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
  var admin_table = $('#admin_table').DataTable({
      "destroy": true,
      "processing": false,
      "serverSide": true,
      "autoWidth": false,
      "ajax": {
        url:"{{route('admin.adminmanagement.datatable_main')}}",
        type: "POST",
        "data": {
        }
      },
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'last_date', name: 'last_date'},
        {data: 'status', name: 'status'},
        {data: 'edit', name: 'edit'},
        {data: 'delete', name: 'delete'}
      ],
      "order": [],
      "columnDefs": [
        {"className": "text-center", "targets": [0,3,4,5,6]},
        {"className": "text-right", "targets": []}
      ]

  });

  function save_admin() {
     event.preventDefault();
     $.post("{{route('admin.adminmanagement.new')}}", $("#new_admin_form").serialize() ).done( (res) => {
        if (res.success == true)
        messageModal(res.msg);
      else
        messageModal(res.error);
       $("#new_admin_form")[0].reset();
      admin_table.ajax.reload();
      }).fail( (data) => {
        messageModal(handleValdationError(data));
      });
  }

 function updateAdmin(id) {
  $.post("{{route('admin.adminmanagemen.update')}}", {
    admin_id:id
  }).done((res) => {
    $("#res").html(res);
    $("#add_update_admin_modal").modal('show');
  });
}

function save_admin() {
   event.preventDefault();
   $.post("{{route('admin.adminmanagement.new')}}", $("#update_admin_form").serialize() ).done( (res) => {
      if (res.success == true)
      messageModal(res.msg);
    else
      messageModal(res.error);
     $("#update_admin_form")[0].reset();
    admin_table.ajax.reload();
    }).fail( (data) => {
      messageModal(handleValdationError(data));
    });
}

function delete_admin(id) {
  if_confirm = confirm("Are you sure you want to delete?");
  
  if (if_confirm) {
    $.post("{{route('admin.adminmanagement.delete')}}", {
      course_id: id
    }).done( (res) => {
      messageModal("Admin deleted success");
      admin_table.ajax.reload();
    });
  }
}

</script>
@endsection
