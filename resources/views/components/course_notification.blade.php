<div id="notification_course_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Notification</h4>
			<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		@foreach($notification as $n)
			<p class="p-0 m-0"><strong>{{$n->subject ?? "Subject"}},</strong>
				<span class="text-muted small pl-2" style="vertical-align: bottom;">{{date("dMY", strtotime($n->created_at))}}</span></p>
			<p >{!! 	nl2br(strip_tags($n->msg, '<p><a><br/	>')); !!}</p>
				<hr/>
		@endforeach
		</div>
	   <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
	</div>
</div>
</div>