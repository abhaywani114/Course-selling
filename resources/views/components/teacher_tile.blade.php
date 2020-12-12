  @foreach($teachers as $t)
  <div class="col-md-6 col-lg-4 mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
      <div class="teacher text-center">
         <img src='{{asset("img/upload/$t->image")}}' alt="Image" 
            class=" rounded-circle mx-auto" style="width: 200px;height: 200px;object-fit: cover;" >
         <div class="py-2">
           <span class="position" style="display: block;">    <span class="text-black" style="color: #808080">{{$t->name}},</span> {!! str_replace(',', ', <br/>', $t->designation) !!}</span>
         </div>
         <div class="d-flex border-top stats ">
		  <button class="btn  shopping_btn" onclick="teacherDetails('{{$t->id}}')">Details</button>
         </div>
      </div>
   </div>
@endforeach