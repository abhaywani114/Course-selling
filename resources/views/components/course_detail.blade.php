<!-- Modal Product Detail -->
<div id="product_detail_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Course Details</h4>
        <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		
    <div class="col-md-12">

      <h5>{{$course->name}}</h5>
		 
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
              <td>${{$course->price}}</td>
            </tr>

          </tbody>
        </table>

  @if(!empty($course->details))
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Details</strong></h5>
			<p class="pt-1">{!! nl2br(strip_tags($course->details, '<p><a><br>'));  !!}</p>
		</div>
  @endif

    @if(!empty($course->structure))
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Structure</strong></h5>
			<p class="pt-1">{!! nl2br(strip_tags($course->structure, '<p><a><br>'));  !!}</p>
		</div>
    @endif

    @if(!empty($course->course_aims))
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Course Aims</strong></h5>
		    <p class="pt-1">{!! nl2br(strip_tags($course->course_aims, '<p><a><br>'));  !!}</p>
    </div>
    @endif

  @if(!empty($course->tmc))
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Timetable & Marking Criteria</strong></h5>
        <p class="pt-1">{!! nl2br(strip_tags($course->tmc, '<p><a><br>'));  !!}</p>
		</div>
  @endif

   @if(!empty($course->tmc))
		<div>
			<h5 class="mt-3" ><strong style="border-bottom:2.5px solid #003e71">Study Aid</strong></h5>
         <p class="pt-1">{!! nl2br(strip_tags($course->tmc, '<p><a><br>'));  !!}</p>
		</div>
    @endif

      </div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;">
      </div>
      </div>
    </div>
  </div>
</div>
</div>
