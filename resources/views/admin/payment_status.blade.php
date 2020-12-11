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
   <div class="container bg-white text-center">
  		<div class="pt-5 text-left mx-auto col-6">
  			
  			@if ( $status == 'success')
  			<img class=" my-3 d-block w-25 mx-auto" 
  				src="{{asset('img/payment_success.png')}}">
  			<h1 class="text-success text-center">Payment Successful</h1>
  			<h5 class="text-success text-center">Transaction ID: {{ request()->tx_id }}</h5>
        <h6 style="line-height: 1.5;font-size: 16px;text-align: justify;">
          <strong>Dear candidate,</strong><br/>
          Many thanks for registering for the ‘ FRCS Mock-Exam Course ‘ on <strong>{{date("Y-m-d", strtotime($payment_course_->booking_date))}}</strong><br/>
          Your place as <strong>{{ucfirst($payment_course_->type)}}</strong> is now confirmed <br/>
          Fee paid = <strong>{{$payment_course_->price}}</strong><br/>
          Payment date = <strong>{{date("Y-m-d")}}</strong><br/>
          A Zoom registration link to join will be sent to you 2 days prior to the course.<br/>
          As a course candidate, you are entitled to a discount on our award winning revision book ‘Concise Orthopaedic Notes ‘.Please contact us back if interested</h6>
  			@else
  			<img class=" my-3 d-block w-100 mx-auto" 
  				src="{{asset('img/payment_failed.jpg')}}">
  			<h1 class="text-danger text-center">Payment Failed</h1>
  			<h5 class="text-danger text-center">Transaction ID: {{ request()->tx_id }}</h5>
  			<h6 class="text-danger text-center">{{$errMsg ?? ''}}</h6>
  			@endif
  			  <button onclick="window.location = '/'" class="btn shopping_cart_btn w-50 mx-auto d-block mt-5" >Home</button>
  		</div>
	</div>
  <br/><br/>
</div>
<script type="text/javascript">
  
  @if ( $status == 'success')
    localStorage.setItem('cart', JSON.stringify([])); 
  @endif
</script>
@endsection