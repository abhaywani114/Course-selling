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
         <div class="col-sm-7 col-md-10 col-lg-7">
			<h2 class="section-title mb-3">Enrolled Students</h2>
			</div>
		</div>

		<table class="table table-bordered align-content-center"
			id="enrolled_table" style="width:100%">
			<thead class="thead-dark">
			<tr>
				<th style="">No</th>
				<th style="">Name</th>
				<th style="">Email</th>
				<th style="">Last Login</th>
        <th style="">Status</th>
			</tr>
			</thead>
			<tbody class="tablebody">
			</tbody>
</table>
<br/><br/>
<!---- ---->
	</div>
</div>
@endsection
@section('js')
<script>
$('#enrolled_table').DataTable({
  "destroy": true,
  "processing": false,
  "serverSide": true,
  "autoWidth": false,
  "ajax": {
    url:"{{route('admin.courses.entrolled_students')}}",
    type: "POST",
    "data": {
      "course_id":"{{request()->course_id}}"
    }
  },
  columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'last_date', name: 'last_date'},
    {data: 'status', name: 'status'},
  ],
  "order": [],
  "columnDefs": [
    {"className": "text-center", "targets": [0,3,4]},
    {"className": "text-right", "targets": []}
  ]
});
</script>
@endsection
