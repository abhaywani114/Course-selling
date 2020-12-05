 <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <div class="col-sm-6 col-md-4 p-10 mb-4 scale_course aos-init aos-animate" data-aos="fade-up"  data-aos-delay="500">
   <div class="course bg-white h-100 align-self-stretch my_course">
      <figure class="m-0">
         <a href="javascript:void(0)"><img src='<?php echo e(asset("img/upload/$c->image")); ?>' alt="Image" class="img-fluid"></a>
      </figure>
      <div class="course-inner-text py-4 px-4">
         <span class="course-price">$<?php echo e($c->price); ?></span>
         <div class="meta"><?php echo e($c->duration); ?> | <?php echo e(date("d M Y", strtotime($c->date))); ?>   <?php if(empty($user)): ?>
            | Seat Left: <?php echo e($c->available_seats); ?>/<?php echo e($c->seat_limit); ?>

         <?php endif; ?></div>
         <h3><a href="javascript:courseDetails(<?php echo e($c->id); ?>) "><?php echo e($c->name); ?></a></h3>
         <p class="p_course"><?php echo e($c->short_description); ?></p>
      </div>
      <div class="d-flex border-top stats ">
         <?php if(empty($user)): ?>
         <button class="btn  shopping_btn" <?php if($c->available_seats > 0): ?> 
                 onclick="addToCart('<?php echo e($c->id); ?>', '<?php echo e($c->name); ?>', '<?php echo e($c->price); ?>')"
               <?php else: ?>
                onclick="messageModal('Cannot add to cart, 0 seats left.')"
               <?php endif; ?>
            ><i class="fa fa-shopping-cart"></i>Add to Cart</button>
         <?php else: ?>
         <button class="btn  shopping_btn" onclick="view_notification('<?php echo e($c->id); ?>')"
            >View Notification</button>
         <?php endif; ?>
      </div>
   </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/components/course_tile.blade.php ENDPATH**/ ?>