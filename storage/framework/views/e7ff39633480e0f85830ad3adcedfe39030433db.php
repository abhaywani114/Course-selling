  <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-md-6 col-lg-4 mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
      <div class="teacher text-center">
         <img src='<?php echo e(asset("img/upload/$t->image")); ?>' alt="Image" 
            class=" rounded-circle mx-auto" style="width: 200px;height: 200px;object-fit: cover;" >
         <div class="py-2">
            <h3 class="text-black"><?php echo e($t->name); ?></h3>
            <p class="position">Physics Teacher</p>
         </div>
         <div class="d-flex border-top stats ">
		  <button class="btn  shopping_btn" onclick="teacherDetails('<?php echo e($t->id); ?>')">Details</button>
         </div>
      </div>
   </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/components/teacher_tile.blade.php ENDPATH**/ ?>