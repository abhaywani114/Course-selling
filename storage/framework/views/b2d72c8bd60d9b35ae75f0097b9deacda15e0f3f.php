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
         <div class="col-sm-7 col-md-10 col-lg-7">
			<h2 class="section-title mb-3">My Courses</h2>
			</div>
		</div>

<div class="row">

<?php echo $tile; ?>

</div>
<!---- ---->
	</div>
</div>
<div id="res"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$('#course_table').DataTable();
function view_notification(course_id) {
   $.post("<?php echo e(route('user.my_courses_notification')); ?>", {
      course_id:course_id
   }).done((res) => {
      $("#res").html(res);
      $("#notification_course_modal").modal('show');
   });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout\layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/user/my_courses.blade.php ENDPATH**/ ?>