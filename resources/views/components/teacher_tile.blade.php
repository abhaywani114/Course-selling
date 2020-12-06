  @foreach($teachers as $t)
  <div class="col-md-6 col-lg-4 mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
      <div class="teacher text-center">
         <img src='{{asset("img/upload/$t->image")}}' alt="Image" 
            class=" rounded-circle mx-auto" style="width: 200px;height: 200px;object-fit: cover;" >
         <div class="py-2">
            <h3 class="text-black">{{$t->name}}</h3>
            <p class="position">{{$t->designation}}</p>
         </div>
         <div class="d-flex border-top stats ">
		  <button class="btn  shopping_btn" onclick="teacherDetails('{{$t->id}}')">Details</button>
         </div>
      </div>
   </div>
@endforeach