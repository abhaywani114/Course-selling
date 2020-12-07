 @foreach ($courses as $c)
 <div class="col-sm-6 col-md-4 p-10 mb-4 scale_course aos-init aos-animate" data-aos="fade-up"  data-aos-delay="500">
   <div class="course bg-white h-100 align-self-stretch my_course" style="position: relative;">
      <figure class="m-0">
         <a href="javascript:void(0)"><img src='{{asset("img/upload/$c->image")}}' alt="{{$c->name}}" class="img-fluid w-100"></a>
      </figure>
      <div class="course-inner-text py-4 px-4">
         <span class="course-price">{{$c->price}} {{env('CURRENCY_CODE')}}</span>
         <div class="meta">{{$c->duration}} | {{date("d M Y", strtotime($c->date))}}   @if(empty($user))
            | Seat Left: {{$c->available_seats}}/{{$c->seat_limit}}
         @endif</div>
         <h3><a href="javascript:courseDetails({{$c->id}}) ">{{$c->name}}</a></h3>
         <p class="p_course">{{$c->short_description}}</p>
      </div>
      <div class="d-flex border-top stats" style="position: absolute;bottom: 0;width: 100%;">
         @if(empty($user))
         <button class="btn  shopping_btn" @if ($c->available_seats > 0) 
                 onclick="addToCart('{{$c->id}}', '{{$c->name}}', '{{$c->price}}')"
               @else
                onclick="messageModal('Cannot add to cart, 0 seats left.')"
               @endif
            ><i class="fa fa-shopping-cart"></i>Add to Cart</button>
         @else
         <button class="btn  shopping_btn" onclick="view_notification('{{$c->id}}')"
            >View Notification</button>
         @endif
      </div>
   </div>
</div>
@endforeach