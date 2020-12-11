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
   .slide-1:before, .pallax {
    position: absolute;
    height: 100%;
    width: 100%;
    background: #003e716b;
    opacity: 1;
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
   min-height: 95px;
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
<div class="slide-1" id="home-section" @if($is_admin) style="max-height: 65%;height: 65%;" @endif >
   <div class="pallax" @if($is_admin) style="max-height: 65%;height: 65%;" @endif ></div>
   @if ($is_admin)
   <div class="container">
      <div class="row intro_custom_1 " >
         <div class="col-lg-6 mb-4 text-white" >
            <div class="intro_subtitle_mainsection">
            <h1 data-aos="fade-up" data-aos-delay="100" >Learn From The Expert</h1>
            <p class="mb-4 aos-init" data-aos="fade-up" data-aos-delay="500">FRCS Mock-Exam Course, Trauma & Orthopaedics, Clinical & Viva Feedback.</p>
         </div>
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
                           <br/>You can manage your courses, faculty and payments by clicking Admin link in the navigation bar.</li>
							  </ul>
					</div>
			    </div>

				@endif
			@endauth
            </div>
         </div>
      </div>
   </div>
   @endif
</div>
<div class="slide-1 mb-5" id="courses-section" >
   <div class="container">
      <div class="row mb-3 mt-5 justify-content-center">
     <!--     <div class="col-lg-7 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Courses</h2>
         </div> -->
      </div>
      <div class="row m-0 p-0" id="courses_div" style="width:100%;display: block">
        {{-- !! var_dump($course) !!--}}
        <style type="text/css">
           
           .course_title_main {
               margin-bottom: 0!important;
               text-align: left!important;
               animation-name: uk-fade;
               animation-duration: .8s;
               animation-timing-function: linear;
               line-height: 1.2;
               color: #003673;
               font-weight: 100;
               text-transform: uppercase;
               margin: 0 0 20px 0; 
               color: #006ba1;
               font-size: 40px;
           }
           .course_divider_hr {
            display:block;
             margin: 20px 0 20px 0;    
             width: 80px;
             max-width: 100%;
             border-top: 4px solid #007dc3;
             vertical-align: top;
           }
           .course_places_available {
             line-height: 1.238;
             font-weight: 300;
             text-transform: uppercase;
             border-left: 3px solid #00F;
             padding-left: 10px;
             margin: 25px 0px;
           }

           .courses_reg_btn {
             width: 160px;
             font-size: 16px;
             font-weight: 700;
             margin-top: 10px;
             border-radius: 10px;
             border: 3px solid
           }
           .course_section_details > h1 {
                      border-left: 3px solid #00F;
             padding-left: 10px;
           }

        </style>
@if (!empty($course))

        <h2 class="course_title_main">{{$course->name}}</h2>
        <h4 style="font-size:17px;text-transform: capitalize;"
            class="course_title_main" >{{$course->short_description}}</h4>
        <hr class="course_divider_hr" />
         <div>
            <h2 class="course_places_available">PLACES AVAILABLE</h2>
              <div class="table-responsive">
              <table class="table table-sm table-borderless mb-0">
                <tbody>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
                    <td>{{date("Y-M-d",strtotime($course->date))}}</td>
                  </tr>

                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Registration</strong></th>
                    <td>{{$course->registration}}</td>
                  </tr>

                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Zoom Meeting</strong></th>
                    <td>{{$course->meeting_time}}</td>
                  </tr>

                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Duration</strong></th>
                    <td>{{$course->duration}}</td>
                  </tr>

                  <tr>
                   <th class="pl-0 w-25" scope="row"><strong>who should attend?</strong></th>
                    <td>{{$course->who_should_attend}}</td>
                  </tr>

                  <tr>
                   <th class="pl-0 w-25" scope="row"><strong>Allowed Seats</strong></th>
                    <td>{{$course->seat_limit}}</td>
                  </tr>

                  <tr>
                   <th class="pl-0 w-25" scope="row"><strong>Available Seats</strong></th>
                    <td>{{$course->available_seats}}</td>
                  </tr>

                   <tr>
                   <th class="pl-0 w-25" scope="row"><strong>Price</strong></th>
                    <td> £{{$course->participant_price}} per candidate or £{{$course->observer_price}} per observer</td>
                  </tr>

                </tbody>
              </table>
              </div>
               <div class="form-group" style="align-items: center;display: flex;justify-content: space-between;">
                     <button class="btn shopping_cart_btn courses_reg_btn"
                    @if ($course->available_seats != 0)
                     data-toggle="modal" data-target="#registration_modal"
                    @else
                      onclick="messageModal('0 seats left.')"
                    @endif />
                     Register Here</button>
               </div>
         </div>
      </div>
      <div class="course_section_details mt-5">
         <h1>        DETAILS    </h1>
         <div class="uk-panel uk-margin">
            <p>{!! nl2br(strip_tags($course->details, '<p><a><br>'));  !!}</p>
         </div>
      </div>

      <div class="course_section_details mt-5">
         <h1 style=""><span>Overview</span></h1>
         <div class="uk-panel uk-margin">
            <p>{!! nl2br(strip_tags($course->details, '<p><a><br>'));  !!}</p>
         </div>
      </div>

      <div class="course_section_details mt-5">
         <h1 style=""><span>Structure</span></h1>
         <div class="uk-panel uk-margin">
            <p>{!! nl2br(strip_tags($course->structure, '<p><a><br>'));  !!}</p>
         </div>
      </div>

      <div class="course_section_details mt-5">
         <h1 style=""><span>Course Aims</span></h1>
         <div class="uk-panel uk-margin">
            <p>{!! nl2br(strip_tags($course->course_aims, '<p><a><br>'));  !!}</p>
         </div>
      </div>

      <div class="course_section_details mt-5">
         <h1 style=""><span>Timetable & Marking Criteria</span></h1>
         <div class="uk-panel uk-margin">
            <p>{!! nl2br(strip_tags($course->tmc, '<p><a><br>'));  !!}</p>
         </div>
      </div>

      <div class="course_section_details mt-5" id="study_aid_section">
         <h1 style=""><span>Study Aid</span></h1>
         <img class='mt-3 mb-3' src="{{asset('img/firas_book.webp')}}">
         <div class="uk-panel uk-margin">
            <p>{!! nl2br(strip_tags($course->study_aid, '<p><a><br>'));  !!}</p>
         </div>
         <div class="form-group" style="align-items: center;display: flex;
            justify-content: space-between;">
                <button onclick="signMeUp()" style="width: 300px;" 
                 class="btn shopping_cart_btn courses_reg_btn" >
                  Link to purchase book at Amazon</button>
            </div>
      </div>
@endif

   </div>
</div>
<div class="slide-1  pt-3" id="teachers-section" >
   <div class="container ">
      <div class="row mb-3 mt-5 justify-content-center">
         <div class="col-lg-7 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="">
            <h2 class="teachers-section-section-title section-title">Teaching Faculty</h2>
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
<div class="slide-1 mb-3" id="review-section" style="min-height: 60%;" >
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
                  <div class="carousel-inner text -center mt-5 mb-3 " role="listbox" style="min-height: 200px;">
                     <div class="carousel-item active">
                        <div class="testimonial text-white p-4">
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> It was a great experience and an opportunity for me 
                              to be guided on how to structure my future study and preparation for the exam.
                              </p>
                           <h4 class="font-weight-bold">Mohamed Naell</h4>
                           <h6 class="font-weight-bold my-3">Candidate</h6>
                           <!--Review-->
                        </div>
                     </div>
                     
                     <div class="carousel-item ">
                        <div class="testimonial text-white p-4">
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> Very good need more like this course.
                           </p>
                           <h4 class="font-weight-bold">Rajeev Jahagirdar</h4>
                           <h6 class="font-weight-bold my-3">Candidate</h6>
                           <!--Review-->
                        </div>
                     </div>
                     
                     <div class="carousel-item">
                        <div class="testimonial text-white p-4">
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> Keep up the good work.
                           </p>
                           <h4 class="font-weight-bold">Winster D'Souza</h4>
                           <h6 class="font-weight-bold my-3">Candidate</h6>
                           <!--Review-->
                        </div>
                     </div>
                     
                     <div class="carousel-item">
                        <div class="testimonial text-white p-4">
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> It gave me a good idea of the difficulty level of the exam, 
                              I will definately change my strategy of studying.
                           </p>
                           <h4 class="font-weight-bold">Harry Benjamin-Laing</h4>
                           <h6 class="font-weight-bold my-3">Candidate</h6>
                           <!--Review-->
                        </div>
                     </div>
                     
                     <div class="carousel-item">
                        <div class="testimonial text-white p-4">
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> It will help me become more succinct and clear 
                              in my presentation of case and on the basis of my observation.
                           </p>
                           <h4 class="font-weight-bold">Nicholas Bezzina</h4>
                           <h6 class="font-weight-bold my-3">Candidate</h6>
                           <!--Review-->
                        </div>
                     </div>
                     
                     <div class="carousel-item">
                        <div class="testimonial text-white p-4">
                           <!--Content-->
                           <p class="text-justify">
                              <br/>
                              <i class="fa fa-quote-left"></i> Very constructive feedback demonstrating how to organise the answers.
                           </p>
                           <h4 class="font-weight-bold">Umesh Birole</h4>
                           <h6 class="font-weight-bold my-3">Candidate</h6>
                           <!--Review-->
                        </div>
                     </div>
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
            <p class="mb-5"></p>
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
},
</style>

<!-- Modal -->
<div id="registration_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registration</h4>
        <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
     <form method="post" action="{{route('payment.checkout')}}">
        
         <div class="form-group">
            <input type="text" name="fname" class="form-control" 
               placeholder="First Name" required>
         </div>

        <div class="form-group">
            <input type="text" name="sname" class="form-control" 
               placeholder="Surname" required>
         </div>

         <div class="form-group">
            <input type="text" name="hospital" class="form-control" 
               placeholder="Hospital / Institution" required>
         </div>

         <div class="form-group">
            <input type="text" name="country" class="form-control" 
               placeholder="Country" required>
         </div>

         <div class="form-group">
            <input type="tel" name="mobile" class="form-control" 
               placeholder="Mobile" required>
         </div>

        <div class="form-group">
            <input type="text" name="email" class="form-control" 
               placeholder="Email" required>
         </div>


        <div class="form-group">
            <span>Booking Date</span>
            <input type="date" name="booking_date" class="form-control"  
                required>
         </div>

        <div class="form-group">
          <span>Price</span>
           <select type="text" name="type" class="form-control"  required>
              <option value="participant" class="form-control">Participant: £{{$course->participant_price ?? 0}}</option>
              <option value="observer" 
                class="form-control">Observer : £{{$course->observer_price ?? 0}}</option>
            </select>
        </div>

         <div class="form-group p-1">
            <span class="p-1">Area of Intrest</span>
            @foreach (['Knee','Hip','Trauma', 'Shoulder','Sports Rehab',
               'Foot & Ankle' , 'FRCS Exam Preperation'] as $f)
               <div class="form-check">
                 <input class="form-check-input" type="checkbox" value="{{$f}}" 
                    name="intrest[]"
                    id="defaultCheck_{{str_replace(' ', '_', $f)}}">
                 <label class="form-check-label" for="defaultCheck_{{str_replace(' ', '_', $f)}}">
                   {{$f}}
                 </label>
               </div>
            @endforeach
         </div>
         @csrf
          <div class="modal-footer" style="border: none;padding: 10px 0px;">
               <button type="submit" class="btn shopping_cart_btn">Checkout</button>
         </div>
     </form>
      </div>
    </div>
  </div>
</div>

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
