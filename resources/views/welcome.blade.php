@extends('layout.layout')
@section('content')
<style>
   /*//hi*/
   .intro-section {
   height: 100vh;
   min-height: 900px;
   position: relative;
   }
   body, html {
   height: 100%;
   }
   #home-section {
   background: url("{{asset('img/bg.jpg')}}");
   }
   .slide-1 { 
   /* Full height */
   min-height: 100%;
   /* Create the parallax scrolling effect */
    background-attachment: fixed !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
   }
   .slide-1:before {
   position: absolute;
   height: 100%;
   width: 100%;
   background: #031528;
   opacity: .9;
   border-bottom-right-radius: 0px;
   }
   .form-box {
   padding: 40px;
   background: #fff;
   border-radius: 7px;
   }
   .intro_custom_1 {
   padding-top: 10%;
   }
   #courses-section {
   /* background: url("{{asset('img/underwater_bubbling.gif')}}"); */
   padding-bottom:25px;
   }
   .section-title {
   font-size: 3rem;
   color: #000;
   margin-bottom: 1.8rem;
   font-weight: 700;
   }
    .site-section {
   padding: 4em 0;
   position: relative;
   }
   textarea {
   height: auto;
   }
   body {
   color: gray;
   }
   #teachers-section {
   /* background-image: url('img/bg2.jpg'); */
   background:#003e71;
   }
   .teachers-section-section-title {
   color: #fff;
   }
   .teacher {
   border: 1px solid #e9ecef;
   padding: 20px;
   margin-bottom: 5rem;
   background: #f1f6ff;
   border-radius: 15px;
   }
   .teacher h3 {
   font-size: 1.2rem;
   }
   .teacher .position {
   color: #adb5bd;
   }
   .teacher img {
   position: relative;
   margin-top: -100px;
   }
   .teacher {
   /* margin-top:100px; */
   }
   .padding_neg_marging {
   padding-top: 100px !important;
   }
   .testimonial-carousel .carousel-control.left {
   /*    left: -15%;*/
   position: absolute;
   left: -35px;
   }
   .testimonial-carousel .carousel-control.right {
   /*    right: -15%;*/
   position: absolute;
   right: -35px;
   }
   #review-section {
   background-image: url('img/bg2.jpg');
   }
   .c_custom{
   background: #003e71c9;;
   padding: 20px;
   border-radius: 12px;
   box-shadow: 1px 1px 7px 6px #ffffffa1;
   }


#sign_up_response > ul > li {
	color:red;
}
#sign_in_response > ul > li {
    color: red;
}
</style>
<div class="slide-1" id="home-section" >
   <div class="container">
      <div class="row intro_custom_1 ">
         <div class="col-lg-6 mb-4 text-white">
            <h1 data-aos="fade-up" data-aos-delay="100" >Learn From The Expert</h1>
            <p class="mb-4 aos-init" data-aos="fade-up" data-aos-delay="500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.</p>
         </div>
         <div class="col-lg-5 ml-auto aos-init aos-animate" data-aos="fade-up" data-aos-delay="5000">
            <div class="tab-content">
			@guest
               <div  id="signupme" class="tab-pane fade welcome_tab show in active">
                  <form method="post"  class="form-box" id="sign_up_form">
                     <h3 class="h4 text-black mb-2">Sign Up</h3>
					<div id="sign_up_response" class="py-1">
					</div>
                     <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                     </div>
                     <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email Addresss" required>
                     </div>
                     <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <div class="form-group mb-4">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type Password" required>
                     </div>
                     <div class="form-group mb-4">
                          <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_SITE_KEY')}}"></div>
                     </div>
                     <div class="form-group" style="align-items: center;display: flex;justify-content: space-between;">
                        <button onclick="signMeUp()" class="btn shopping_cart_btn" style="width: 90px;">Sign Up</button>
                        <img src="{{asset('/img/loading.gif')}}" style="width: 22px;margin-left: -30px;display:none;" id="loading-signup" / >
                        <a href="#login" onclick="showLogin()"
                           style="text-decoration:none;float:right;text-align:right;">I already have an account!</a>
                     </div>
                  </form>
               </div>
               <div id="loginme" class="tab-pane welcome_tab fade">
				  <form method="post" id="sign_in_form"	class="form-box">
                     <h3 class="h4 text-black mb-4">Sign In</h3>
					<div id="sign_in_response" class="py-1">
					</div>
                     <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="Email Addresss" required>
                     </div>
                     <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <div class="form-group" style="align-items: center;display: flex;justify-content: space-between;">
                        <button onclick="loginMeNow()" class="btn shopping_cart_btn" style="width: 90px;">Sign In</button>
                        <img src="{{asset('/img/loading.gif')}}" style="width: 22px;margin-right: auto;margin-left: 10px;display: none;" id="loading-signin" / >
                        <a href="#login" onclick="showSignUp()"
                           style="text-decoration:none;float:right;text-align:right;">I am a new user!</a>
                     </div>
                     <div class="form-group" style="align-items: center;text-align: center;">
                        <a href="#login" onclick="resetPwd()"
                           style="text-decoration:none;text-align:center;">Reset Password</a>
                     </div>
                  </form>
               </div>
               <div id="resetpassword" class="tab-pane welcome_tab fade">
                  <form action="" id="reset_password_form" method="post" class="form-box">
                     <h3 class="h4 text-black mb-4">Reset Password</h3>
                     <div id="reset_password_response" class="py-1"></div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email Addresss" required>
                     </div>
                     <div class="form-group" style="align-items: center;display: flex;justify-content: space-between;">
                        <button type="submit" class="btn shopping_cart_btn"  onclick="resetpassword()"
                              style="width: 140px;">Reset Password</button>
                        <img src="{{asset('/img/loading.gif')}}" style="width: 22px;margin-right: auto;margin-left: 10px;display: none;" id="loading-reset-pwd" / >
                        <a href="#login" onclick="showLogin()"
                           style="text-decoration:none;float:right;text-align:right;">Back</a>
                     </div>
                  </form>
			   </div>
			@endguest
			@auth
				@if (Auth::User()->type == 'user')
				<div id="user_stats" class="tab-pane welcome_tab fade show active in">
					<div class="form-box">
						 <h3 class="h4 text-black mb-4">Recent Subscription</h3>
							<ul class="list-group list-group-flush">
                        @foreach ($subscribed as $c)
                           <li class="list-group-item pl-0">{{$c->name}}</li>
                        @endforeach
							  </ul>
					</div>
			    </div>
				@endif

				@if (Auth::User()->type == 'admin')
					<div id="admin_stats" class="tab-pane welcome_tab fade show active in">
						<div class="form-box">
						 <h5 class="h5 text-black mb-4">Welcome {{\Auth::User()->name}}!</h5>
							<ul class="list-group list-group-flush">
								<li class="list-group-item pl-0">You are logged in as admin.
                           <br/>You can manage your courses, teachers and payments by clicking Admin link in the navigation bar.</li>
							  </ul>
					</div>
			    </div>

				@endif
			@endauth
            </div>
         </div>
      </div>
   </div>
</div>
<div class="slide-1 mb-5" id="courses-section" >
   <div class="container">
      <div class="row mb-3 mt-5 justify-content-center">
         <div class="col-lg-7 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Courses</h2>
         </div>
      </div>
      <div class="row m-0 p-0" id="courses_div" style="width:100%">
        {!! $course !!}
      </div>
      <button class="btn shopping_cart_btn" onclick="moreCourses()" style="margin: auto;display: block;width: 150px;"><i 
         class="fa fa-angle-down"></i> More</button>
   </div>
</div>
<div class="slide-1  pt-3" id="teachers-section" >
   <div class="container ">
      <div class="row mb-3 mt-5 justify-content-center">
         <div class="col-lg-7 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="">
            <h2 class="teachers-section-section-title section-title">Teachers</h2>
         </div>
      </div>
      <div class="row m-0 p-0 padding_neg_marging" id="teacher_div" style="width:100%">
         {!! $teachers !!}
      </div>
      <div style="">
         <button class="btn shopping_cart_btn" onclick="moreTeacher()" 
            style="margin: auto;display: block;width: 150px;color:#fff;border-color:#fff;"><i 
            class="fa fa-angle-down"></i> More</button><br/><br/>
      </div>
   </div>
</div>
<div class="slide-1 mb-3" id="review-section" >
   <div class="parallax-curtain">
      <div class="container">
         <div class="row mb-2 pt-5 justify-content-center">
         </div>
         <div class="col-sm-10 col-md-7 mx-auto">
            <div class="wrapper-carousel-fix c_custom">
               <!-- Carousel Wrapper -->
               <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
                  data-interval="2500">
                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">
                     @for($x =0; $x < 4; $x++)
                     <div class="carousel-item @if ($x == 0) active @endif">
                        <div class="testimonial text-white">
                           <!--Avatar-->
                           <div class="avatar mx-auto mb-4">
                              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" class="rounded-circle img-fluid mx-auto d-block"
                                 alt="First sample avatar image">
                           </div>
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                              eos
                              id officiis hic tenetur quae quaerat ad velit ab. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Dolore cum accusamus eveniet molestias voluptatum inventore laboriosam labore
                              sit, aspernatur praesentium iste impedit quidem dolor veniam.
                           </p>
                           <h4 class="font-weight-bold">Anna Deynah</h4>
                           <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
                           <!--Review-->
                        </div>
                     </div>
                     @endfor
                  </div>
                  <!--Slides-->
                  <!--Controls-->
                  <a class="carousel-control-prev left carousel-control text-white" href="#carousel-example-1" role="button"
                     data-slide="prev" style="font-size: 3em;color: #000;">
                  <i class="fa fa-angle-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next right carousel-control text-white" href="#carousel-example-1" role="button"
                     data-slide="next" style="font-size: 3em;color: #000;">
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
                  <!--Controls-->
               </div>
               <!-- Carousel Wrapper -->
            </div>
         </div>
      </div>
   </div>
</div>
<!----------------------- CONTACT US -------------------------->
<div class="site-section bg-light" style="margin-top:-3em;" id="contact-section">
   <div class="container">
      <div class="row mt-2 justify-content-center">
         <div class="col-sm-7 col-md-10 col-lg-7">
            <h2 class="section-title mb-3">Contact Us</h2>
            <p class="mb-5">Natus totam voluptatibus animi aspernatur ducimus quas obcaecati mollitia quibusdam temporibus culpa dolore molestias blanditiis consequuntur sunt nisi.</p>
            <form method="post" id="contact_form" data-aos="fade" class="aos-init aos-animate">
               <div class="form-group row">
                  <div class="col-md-6 mb-3 mb-lg-0">
                     <input type="text" name="fname" class="form-control" placeholder="First name">
                  </div>
                  <div class="col-md-6">
                     <input type="text" name='lname' class="form-control" placeholder="Last name">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-md-12">
                     <input type="text" name='subject' class="form-control" placeholder="Subject">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-md-12">
                     <input type="email" name='email' class="form-control" placeholder="Email">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-md-12">
                     <textarea class="form-control " name='message' style="height:auto" id="" cols="30" rows="7" placeholder="Write your message here."></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-md-6">
                     <input type="submit" onclick="sendContactForm()" 
                        class=" shopping_cart_btn btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message"/>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


<!-- -->
<style>
.table-borderless, .table-borderless > tbody, .table-borderless >  tbody> tr, .table-borderless >  tbody> tr > th, .table-borderless >  tbody> tr > td {
	border: none !important;
}
</style>

@endsection
@section('js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
   function showLogin() {
       $("#signupme").removeClass('show active');
       $("#resetpassword").removeClass('show active');
       $("#loginme").addClass('show active');
   }
   function showSignUp() {
	   $("#sign_up_response").html();
       $(".welcome_tab").removeClass('show active');
       $("#signupme").addClass('show active');
   }
   function resetPwd() {
       $("#loginme").removeClass('show active');
       $("#signupme").removeClass('show active');
       $("#resetpassword").addClass('show active');
   }
   function showUser() {
      $(".welcome_tab").removeClass('show active');
	  $("#user_stats").addClass('show active');
   }

   function signMeUp() {
	 event.preventDefault();
      $("#loading-signup").css('display', 'unset')
	   $.post("{{route('usermanagement.signup')}}", $("#sign_up_form").serialize() ).done( (res) => {
		   $("#sign_up_response").html(`<span class="text-success"><strong>${res.msg}</strong></span>`);
         $("#loading-signup").css('display', 'none')
		   $("#sign_up_form")[0].reset();
         grecaptcha.reset();
   	}).fail( (data) => {
			$("#sign_up_response").html(handleValdationError(data));
         $("#loading-signup").css('display', 'none');
         grecaptcha.reset();
   	});
   }

   function resetpassword() {
       event.preventDefault();
       $("#loading-reset-pwd").css('display','unset');
      $.post("{{route('usermanagement.reset')}}", $("#reset_password_form").serialize() ).done( (res) => {
            $("#reset_password_response").html(`<span class="text-success"><strong>${res.msg}</strong></span>`);
            $("#reset_password_form")[0].reset();
            $("#loading-reset-pwd").css('display','none');
            grecaptcha.reset();
      }).fail( (data) => {
            $("#reset_password_response").html(handleValdationError(data));
            $("#loading-reset-pwd").css('display','none');
            grecaptcha.reset();
        });
   }
   
   function loginMeNow() {
	   event.preventDefault();
      $("#loading-signin").css('display','unset');
	   $.post("{{route('usermanagement.login')}}", $("#sign_in_form").serialize() ).done( (res) => {
	   		if (res.success == true) {
		   		$("#sign_in_response").html(`<span class="text-success"><strong>${res.msg}</strong></span>`);
               setTimeout(() => {
                  window.location.reload()
                  $("#loading-signin").css('display','none');
               }, 2000);
            } else {
		   		$("#sign_in_response").html(`<span class="text-danger"><strong>${res.error}</strong></span>`);
               $("#loading-signin").css('display','none');
            }

		       $("#sign_in_form")[0].reset();
   		}).fail( (data) => {
			   $("#sign_in_response").html(handleValdationError(data));
            $("#loading-signin").css('display','none');
   		});
   }

   var course_page = 2;
   function moreCourses() {
      let url =  "{{route('courses.pagination')}}";
      $.post(url,{
         page: course_page
      }).done( (res) => {
         $("#courses_div").append(res);
         course_page++;
      });
   }
   //
   var teacher_page = 2;
   function moreTeacher() {
      let url =  "{{route('teachers.pagination')}}";
      $.post(url,{
         page: teacher_page
      }).done( (res) => {
         $("#teacher_div").append(res);
         teacher_page++;
      });
   }

   function sendContactForm() {
      event.preventDefault();
      let url = "{{route('contact_us')}}";
       $.post(url,$("#contact_form").serialize()).done( (res) => {
         messageModal("Contact form sent")
         $("#contact_form")[0].reset();
      }).fail( (data) => {
            messageModal(handleValdationError(data));
      });
   }
</script>
@endsection
