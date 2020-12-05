@extends('layout.layout')
@section('content')
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
        <div class="col-sm-7 col-md-10 col-lg-7  justify-content-center align-self-center">
          <h2 class="section-title my-2">My Profile</h2>
      </div>
    </div>

    <form id="profile_form">      
    <div class="col-7 p-0">
      <div class="form-row">
        <div class="col">
          <input type="text" class="form-control" value="{{Auth::User()->name}}" placeholder="Name" readonly>
        </div>
        <div class="col">
          <input type="text" class="form-control" value="{{Auth::User()->email}}" placeholder="Email" readonly>
        </div>
      </div>

       <div class="form-row mt-4">
        <div class="col">
          <input type="text" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="col">
          <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>
      </div>

       <div class="form-group row mt-4">
        <div class="col-md-9 d-block">
             <input type="submit" onclick="update_user_ajax()" data-dismiss="modal"
              class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-50" 
              value="Update Profile">
        </div>
    </form>
  </div>
</div>


<!---- ---->
	</div>
</div>
<div id="res"></div>
@endsection
@section('js')
<script>
function update_user_ajax() {
     event.preventDefault();
     $.post("{{route('admin.adminmanagement.updateprofile')}}", $("#profile_form").serialize() ).done( (res) => {
        if (res.success == true)
        messageModal(res.msg);
      else
        messageModal(res.error);
      }).fail( (data) => {
        messageModal(handleValdationError(data));
      });
}
</script>
@endsection
