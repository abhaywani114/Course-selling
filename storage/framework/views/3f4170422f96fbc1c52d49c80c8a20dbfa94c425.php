<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php $__env->startSection('content'); ?>
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
   background: url("<?php echo e(asset('img/bg.jpg')); ?>");
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
   padding-top: 5%;
   }
   #courses-section {
   /* background: url("<?php echo e(asset('img/underwater_bubbling.gif')); ?>"); */
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

	.left_padding > li {
		padding-left: 3em;
	}

	@media  only screen and (max-width: 920px) {
		.left_padding > li {
			padding-left: 0;
		}
	.welcome_height {
	  min-height: 85% !important;
	}
	}
	.welcome_height {
	min-height: 65%;
  }
</style>
<div class="slide-1 welcome_height" id="home-section" <?php if($is_admin): ?> style="max-height: 65%;height: 65%;" <?php else: ?> style="min-height: 75%;" <?php endif; ?> >
   <div class="pallax welcome_height" <?php if($is_admin): ?> style="max-height: 65%;height: 65%;" <?php else: ?> style="z-index: 10;max-height: 75%;" <?php endif; ?>></div>
   <div class="container"  <?php if(!$is_admin): ?> style=" z-index: 12;
	position: absolute;" <?php endif; ?>>
	  <div class="row intro_custom_1 text-white " >
	 <div  <?php if($is_admin): ?>  class="col-lg-6 mb-4 text-white" <?php else: ?> 
		style="text-align: center;margin-left: auto;padding-top:2em;"  <?php endif; ?> >
		<div    <?php if($is_admin): ?> class="intro_subtitle_mainsection" <?php endif; ?>>
		<h1 data-aos="fade-up" data-aos-delay="100" >Learn From The Experts</h1>
		<ul class="left_padding"  style="color: #fff;list-style: none;text-align: left;padding-top: 1.5em;">
		  <li class="mb-4 h4 text-white">CPD approved by RCSEd.</li>
		  <li class="mb-4 h4 text-white">Faculty to candidate ratio 1:1.</li>
		  <li class="mb-4 h4 text-white" >Covers all viva stations , short and intermediate clinicals.</li>  
			   <li class="mb-4 h4 text-white">Faculty formally trained to provide high quality questions and feedback.</li>  
				<li class="mb-4 h4 text-white">Suitable for candidates preparing for JCIE and JSCFE Fellowship Examinations.</li>
				<li class="mb-4 h4 text-white">High quality questions aligned with the previous exams.</li>
		</ul>

	 </div>
	 </div>
	 <div class="col-lg-5 ml-auto aos-init aos-animate" data-aos="fade-up" data-aos-delay="5000">
   <?php if($is_admin): ?>
		<div class="tab-content">
			<?php if(auth()->guard()->guest()): ?>
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
			  <div class="g-recaptcha" data-sitekey="<?php echo e(env('GOOGLE_SITE_KEY')); ?>"></div>
			 </div>
			 <div class="form-group" style="align-items: center;display: flex;justify-content: space-between;">
			<button onclick="signMeUp()" class="btn shopping_cart_btn" style="width: 90px;">Sign Up</button>
			<img src="<?php echo e(asset('/img/loading.gif')); ?>" style="width: 22px;margin-left: -30px;display:none;" id="loading-signup" / >
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
			<img src="<?php echo e(asset('/img/loading.gif')); ?>" style="width: 22px;margin-right: auto;margin-left: 10px;display: none;" id="loading-signin" / >
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
			<img src="<?php echo e(asset('/img/loading.gif')); ?>" style="width: 22px;margin-right: auto;margin-left: 10px;display: none;" id="loading-reset-pwd" / >
			<a href="#login" onclick="showLogin()"
			   style="text-decoration:none;float:right;text-align:right;">Back</a>
			 </div>
		  </form>
			   </div>
			<?php endif; ?>
			<?php if(auth()->guard()->check()): ?>
				<?php if(Auth::User()->type == 'user'): ?>
				<div id="user_stats" class="tab-pane welcome_tab fade show active in">
					<div class="form-box">
						 <h3 class="h4 text-black mb-4">Recent Subscription</h3>
							<ul class="list-group list-group-flush">
			<?php $__currentLoopData = $subscribed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			   <li class="list-group-item pl-0"><?php echo e($c->name); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  </ul>
					</div>
				</div>
				<?php endif; ?>

				<?php if(Auth::User()->type == 'admin'): ?>
					<div id="admin_stats" class="tab-pane welcome_tab fade show active in">
						<div class="form-box">
						 <h5 class="h5 text-black mb-4">Welcome <?php echo e(\Auth::User()->name); ?>!</h5>
							<ul class="list-group list-group-flush">
								<li class="list-group-item pl-0">You are logged in as admin.
			   <br/>You can manage your courses, faculty and payments by clicking Admin link in the navigation bar.</li>
							  </ul>
					</div>
				</div>
	 <?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	 </div>

	  </div>      
   </div>

</div>
<style type="">

  .btn-floating {
	background: #0D87E1;
	color: #fff;
	font-size: 1.5em;
	padding: 10px;
	margin: 15px;
	display: block;
	width: 40px;
	text-align: center;
  }

  .btn-floating > i {
	color: #fff;
  }

</style>
<div class="slide-1 mb-5" id="courses-section" > 
   <div class="container" style="position: relative;">
<<<<<<< HEAD
<<<<<<< HEAD
	<div style="position:   absolute; top: 90;right: 0;"> 
=======
<<<<<<< HEAD
	<div style="position:   absolute; top: 90;right: 0;">
=======
	<div style="position:   absolute; top: 0;right: 0;">
>>>>>>> parent of 02005e0 (updated mobile view)
>>>>>>> parent of 966b0db (Revert successful)
=======
	<div style="position:   absolute; top: 0;right: 0;">
>>>>>>> parent of 02005e0 (updated mobile view)
	   <a class="btn-floating" style="background: #F44336;"
		 href="https://www.youtube.com/channel/UCpKGX6esbmV364XDaTQGckQ?view_as=subscriber" 
	  target="_blank"  ><i class="fa fa-youtube"></i></a>
      <a class="btn-floating"  href="https://twitter.com/OrthoEvents" 
	  target="_blank"  ><i class="fa fa-twitter"></i></a>  
	<a class="btn-floating"  href="https://www.facebook.com/OrthoEvents" 
	  target="_blank" style="background: #3F51B5;"><i class="fa fa-facebook"></i></a>
	 </div>
	 </div>
	  <div class="row mb-3 mt-5 justify-content-center">
	 <!--     <div class="col-lg-7 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="">
		<h2 class="section-title">Courses</h2>
	 </div> -->
	  </div>
	  <div class="row m-0 p-0" id="courses_div" style="width:100%;display: block">
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

	   .course_tbody {
		  font-size: 18px;
		  padding-bottom: 10px;
		  display: block;
	  }

	</style>
<?php if(!empty($course)): ?>

	<h2 class="course_title_main"><?php echo e($course->name); ?></h2>
	<h4 style="font-size:17px;text-transform: capitalize;"
		class="course_title_main" ><?php echo e($course->short_description); ?></h4>
	<hr class="course_divider_hr" />

	 <div>

		<p class="m-0 p-0 h3 text-center"><strong>In association with</strong></p>
		<div class="row">
			<div class="col-md-4 mx-auto">
					<img class="d-block mt-3 mb-3 w-75 p-3"  style="cursor:pointer;"
						onclick="window.open('https://www.oruk.org/')" src="<?php echo e(asset('img/assoc_2.jpg')); ?>" />
			</div>

			<div class="col-md-4 mx-auto">
				<img class="d-block  mb-3 w-75" style="cursor:pointer;"
					onclick="window.open('http://frcsmentor.co.uk')" src="<?php echo e(asset('img/assoc_3.jpg')); ?>" />
			</div>
<<<<<<< HEAD
            
           <div class="col-md-4 mx-auto">
				<img class="d-block  mb-3 w-75" style="cursor:pointer;"
					onclick="window.open('http://orthoevents.net')" src="<?php echo e(asset('https://telegra.ph/file/eb22d638e6182a650ea70.jpg')); ?>" />
			</div> 
            
        
=======
>>>>>>> parent of 44de364 (update welcome.blade.php)
		</div>
		<h2 class="course_places_available">UPCOMING COURSES</h2>
		  <div class="row">
			 

<!--Courses-->
		
		   <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>3rd April 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


			<button class="btn shopping_cart_btn courses_reg_btn"
			data-target='#registration_modal_april' data-toggle="modal"/>
			 Register Here</button>
		   </div>



		 <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>17th April 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


				<button class="btn shopping_cart_btn courses_reg_btn"
					onclick="window.open('https://www.oruk.org/events/upcoming-events/vivaclincalapr/')" />
			 Register Here</button>
		   </div>

          <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>08 May 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


				<button class="btn shopping_cart_btn courses_reg_btn"
					onclick="window.open('https://www.oruk.org/events/upcoming-events/vivaclincalmay8_21/')" />
			 Register Here</button>
		   </div>
           
           <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>22 May 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


				<button class="btn shopping_cart_btn courses_reg_btn"
					onclick="window.open('https://www.oruk.org/events/upcoming-events/vivaclincalmay22_21/')" />
			 Register Here</button>
		   </div>
           
           <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>4 September 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


				<button class="btn shopping_cart_btn courses_reg_btn"
					onclick="window.open('https://www.oruk.org/events/upcoming-events/vivaclincalsep1/')" />
			 Register Here</button>
		   </div> 
           
           <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>25 September 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


				<button class="btn shopping_cart_btn courses_reg_btn"
					onclick="window.open('https://www.oruk.org/events/upcoming-events/vivaclincalsep2/')" />
			 Register Here</button>
		   </div> 
           
           
           <div class="form-group col-md-3" style="align-items: center;">
				  <div class="table-responsive">
				  <table class="table table-sm table-borderless mb-0">
				<tbody class="course_tbody">
				  <tr>
					<th class="pl-0 w-25" scope="row"><strong>Date</strong></th>
				  </tr>
				  <tr>
					<td><strong>23 October 2021</strong></td>
				  </tr>
				  </tbody>
				  </table>
				  </div>	


				<button class="btn shopping_cart_btn courses_reg_btn"
					onclick="window.open('https://www.oruk.org/events/upcoming-events/vivaclincaloct/')" />
			 Register Here</button>
		   </div>
	

	   </div>
	 </div>
	  <div class="course_section_details mt-5">
	 <h1 style=""><span>Overview</span></h1>
	 <div class="uk-panel uk-margin">
		<p><?php echo nl2br(strip_tags($course->details, '<p><a><br>'));; ?></p>
	 </div>
	  </div>

	  <div class="course_section_details mt-5">
	 <h1 style=""><span>Course Aims</span></h1>
	 <div class="uk-panel uk-margin">
		<p><?php echo nl2br(strip_tags($course->course_aims, '<p><a><br>'));; ?></p>
	 </div>
	  </div>

	  <div class="course_section_details mt-5">
	 <h1 style=""><span>Structure</span></h1>
	 <div class="uk-panel uk-margin">
		<p><?php echo nl2br(strip_tags($course->structure, '<p><a><br>'));; ?></p>
	 </div>
	 <div class="table-responsive">
		  <table class="table table-sm table-borderless mb-0">
		<tbody>
		  <tr>
			<th class="pl-0 w-25" scope="row"><strong>Candidate login time</strong></th>
			<td>09:30</td>
		  </tr>

		  <tr>
			<th class="pl-0 w-25" scope="row"><strong>Duration</strong></th>
			<td><?php echo e($course->duration); ?></td>
		  </tr>

		  <tr>
		   <th class="pl-0 w-25" scope="row"><strong>who should attend?</strong></th>
			<td><?php echo e($course->who_should_attend); ?></td>
		  </tr>

		   <tr>
		   <th class="pl-0 w-25" scope="row"><strong>Price</strong></th>
			<td> £<?php echo e($course->participant_price); ?> per candidate or £<?php echo e($course->observer_price); ?> per observer</td>
		  </tr>

		</tbody>
		  </table>
		  </div>  
	  </div>

	  <div class="course_section_details mt-5">
	 <h1 style=""><span>Timetable</span></h1>
	 <div class="uk-panel uk-margin">
		<p><?php echo nl2br(strip_tags($course->timetable, '<p><a><br>'));; ?></p>
	 </div>
	  </div>

	   <div class="course_section_details mt-5">
	 <h1 style=""><span>Marking Criteria</span></h1>
	 <div class="uk-panel uk-margin">
		<p><?php echo nl2br(strip_tags($course->marking, '<p><a><br>'));; ?></p>
	 </div>
	  </div>

	  <div class="course_section_details mt-5" id="study_aid_section">
	 <h1 style=""><span>Revision Book</span></h1>
	 <img class='mt-3 mb-3 w-25' src="<?php echo e(asset('img/firas_book.webp')); ?>">
	 <div class="uk-panel uk-margin">
		<p><?php echo nl2br(strip_tags($course->study_aid, '<p><a><br>'));; ?></p>
	 </div>
	 <div class="form-group" style="align-items: center;display: flex;
		justify-content: space-between;">
		<button onclick="window.open('https://www.amazon.co.uk/Concise-Orthopaedic-Notes-Revision-Examinations-ebook/dp/B087ZR9ZB7/')" style="width: 300px;" 
		 class="btn shopping_cart_btn courses_reg_btn" >
		  Link to purchase book at Amazon</button>
		</div>
	  </div>
<?php endif; ?>

   </div>
</div>
<div class="slide-1  pt-3" id="teachers-section" >
   <div class="container ">
	  <div class="row mb-3 mt-5 justify-content-center">
	 <div class="col-lg-7 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="">
		<h2 class="teachers-section-section-title section-title">Teaching Faculty</h2>
        <h5 style="align:center; color:white;">We would love to hear from you, if you are interested to join us & become a faculty, please get in touch & <strong><a href="mailto:thefrcsmentor@gmail.com" style="text-decoration:underline; text-decoration-color:#8afb20; text-decoration-thickness:.20rem; color:#FFFFFF;"></strong>drop us an email.</a></h5>
	 </div>
	  </div>
	  <div class="row m-0 p-0 padding_neg_marging" id="teacher_div" style="width:100%">
	 <?php echo $teachers; ?>

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

                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                  </div>
                  <br>

				  <i class="fa fa-quote-left"></i> It was a great experience and an opportunity for me 
				  to be guided on how to structure my future study and preparation for the exam.
				  </p>
			   <h4 class="font-weight-bold">Mohamed Naell</h4>
			   <!--Review-->
			</div>
			 </div>

			 <div class="carousel-item ">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> Very good need more like this course.
			   </p>
			   <h4 class="font-weight-bold">Rajeev Jahagirdar</h4>
			   <!--Review-->
			</div>
			 </div>

			 <div class="carousel-item">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> David Hughes was excellent as were a number of other faculty.
			   </p>
			   <h4 class="font-weight-bold">Winster D'Souza</h4>
			   <!--Review-->
			</div>
			 </div>

			 <div class="carousel-item">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> It gave me a good idea of the difficulty level of the exam, 
				  I will definately change my strategy of studying.
			   </p>
			   <h4 class="font-weight-bold">Harry Benjamin-Laing</h4>
			   <!--Review-->
			</div>
			 </div>

			 <div class="carousel-item">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> It will help me become more succinct and clear 
				  in my presentation of case and on the basis of my observation.
			   </p>
			   <h4 class="font-weight-bold">Nicholas Bezzina</h4>
			   <!--Review-->
			</div>
			 </div>

			 <div class="carousel-item">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> Very constructive feedback demonstrating how to organise the answers.
			   </p>
			   <h4 class="font-weight-bold">Umesh Birole</h4>
			   <!--Review-->
			</div>
			 </div>
          
        <div class="carousel-item ">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> Really well run despite being online. amazing what can be done despite being overseas and virtual.
			   </p>
			   <h4 class="font-weight-bold">Amir</h4>
			   <!--Review-->
			</div>
			 </div>
             
             <div class="carousel-item ">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> I found the majority of faculty supportive and their feedback constructive.
			   </p>
			   <h4 class="font-weight-bold">Gary McLean</h4>
			   <!--Review-->
			</div>
			 </div>
             
             <div class="carousel-item ">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> It helped me to understand better the set up of the exams and adjust my preparation and focus in certain topics/things.
			   </p>
			   <h4 class="font-weight-bold">Ahmed Farooq</h4>
			   <!--Review-->
			</div>
			 </div> 
             
             
             <div class="carousel-item ">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> Great impact, put me back on track , zoomed in on area that need improvement and a
confidence boost for area that I have done well in.
			   </p>
			   <h4 class="font-weight-bold">Rashid</h4>
			   <!--Review-->
			</div>
			 </div>
          
          <div class="carousel-item ">
			<div class="testimonial text-white p-4">
			   <!--Content-->
			   <p class="text-justify">
				  <br/>
                  
                  <div>
                    <style>
                    .checked {
                    color: orange;
                    }
                    </style>
                    <h3>Candidate Reviews</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                  </div>
                  <br>
                  
				  <i class="fa fa-quote-left"></i> I found the majority of faculty supportive and their feedback constructive.
			   </p>
			   <h4 class="font-weight-bold">Kaisar</h4>
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
			 <input type="text" name="first_name" class="form-control" placeholder="First name" required>
		  </div>
		  <div class="col-md-6">
			 <input type="text" name='last_name' class="form-control" placeholder="Last name" required>
		  </div>
		   </div>
		   <div class="form-group row">
		  <div class="col-md-12">
			 <input type="text" name='subject' class="form-control" placeholder="Subject">
		  </div>
		   </div>
		   <div class="form-group row">
		  <div class="col-md-12">
			 <input type="email" name='email' class="form-control" placeholder="Email" required>
		  </div>
		   </div>
		   <div class="form-group row">
		  <div class="col-md-12">
			 <textarea class="form-control " name='message' style="height:auto" id="" cols="30" rows="7" placeholder="Write your message here." required></textarea>
		  </div>
		   </div>
		   <div class="form-group row">
		  <div class="col-md-6">
			 <input type="submit" onclick="sendContactForm()" 
			class=" shopping_cart_btn btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message"/>
		  </div>
		   </div>

		   <div class="form-group row">
				  <div class="col-md-12 mx-auto text-center pt-2">
						<h4>Email: <strong>thefrcsmentor@gmail.com</strong></h4>
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

<?php $__currentLoopData = [ 'a' => '2021-04-17', 'feb' => '2021-02-20', 'mar' => '2021-03-27', 'april' => '2021-04-03'  ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal -->
<div id="registration_modal_<?php echo e($key); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
	<h4 class="modal-title">Registration</h4>
	<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
	  </div>
	  <div class="modal-body">
	 <form method="post" action="<?php echo e(route('payment.checkout')); ?>">

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
	  <span>Price</span>
	   <select type="text" name="type" class="form-control"  required>
		  <option value="participant" class="form-control" <?php if( (16 - app('\App\Http\Controllers\CoursesController')->enrolledCourse($value)) < 1): ?> disabled <?php endif; ?>>Participant: £<?php echo e($course->participant_price ?? 0); ?>  <?php if(16 - app('\App\Http\Controllers\CoursesController')->enrolledCourse($value) < 1): ?> (0 Seats Left) <?php endif; ?> </option>
		  <option value="observer" 
		class="form-control">Observer : £<?php echo e($course->observer_price ?? 0); ?></option>
		</select>
	</div>
	<input type="hidden" name="booking_date" value="<?php echo e($value); ?>">
	 <?php echo csrf_field(); ?>
	  <div class="modal-footer" style="border: none;padding: 10px 0px;">
		   <button type="submit" class="btn shopping_cart_btn">Checkout</button>
	 </div>
	 </form>
	  </div>
	</div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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
		$.post("<?php echo e(route('usermanagement.signup')); ?>", $("#sign_up_form").serialize() ).done( (res) => {
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
	$.post("<?php echo e(route('usermanagement.reset')); ?>", $("#reset_password_form").serialize() ).done( (res) => {
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
	$.post("<?php echo e(route('usermanagement.login')); ?>", $("#sign_in_form").serialize() ).done( (res) => {
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
	let url =  "<?php echo e(route('courses.pagination')); ?>";
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
	let url =  "<?php echo e(route('teachers.pagination')); ?>";
	$.post(url,{
	page: teacher_page
	}).done( (res) => {
	$("#teacher_div").append(res);
	teacher_page++;
	});
}

function sendContactForm() {
	event.preventDefault();
	let url = "<?php echo e(route('contact_us')); ?>";
	$.post(url,$("#contact_form").serialize()).done( (res) => {
	messageModal("Contact form sent")
		$("#contact_form")[0].reset();
	}).fail( (data) => {
	console.log(handleValdationError(data))
		messageModal(handleValdationError(data));
	// messageModal("Please fill in all the information correctly");
		});
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frcsnvvy/laravel_deployment/project_700a/resources/views/welcome.blade.php ENDPATH**/ ?>