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
			<h2 class="section-title mb-3">View Payment</h2>
			</div>
		</div>

		<table class="table table-bordered align-content-center"
			id="payment_table" style="width:100%">
			<thead class="thead-dark">
			<tr>
				<th style="width:30px;">No</th>
				<th style="width:75px;">Date</th>
        <th style="">Tx Id</th>
        <th style="width:200px">Course Name</th>
				<th style="width:200px">Username</th>
				<th style="width:75px">Amount</th>
				<th style="width:30px">Status</th>
		<!-- 		<th style="">Note</th> -->
			</tr>
			</thead>
			<tbody class="tablebody">
        @foreach ($data as $payment)
        <tr>
          <td class="text-center">{{$loop->index + 1}}</td>
          <td>{{date("mDY", strtotime($payment->updated_at))}}</td>
          <td>{{$payment->transaction_id}}</td>
          <td>{{$payment->course_name}}</td>
          <td>{{$payment->username}}</td>
          <td class="text-right">{{$payment->course_price}} {{env('CURRENCY_CODE')}}</td>
          <td @if ($payment->status == 'failed') 
             onclick="messageModal('{{$payment->note}}')"
              style="cursor:pointer;color:blue;"
            @endif
            >{{ucfirst($payment->status)}}</td>
        </tr>
        @endforeach
			</tbody>
</table>
<br/><br/>
<!---- ---->
	</div>
</div>
@endsection
@section('js')
<script>
$('#payment_table').DataTable();
</script>
@endsection
