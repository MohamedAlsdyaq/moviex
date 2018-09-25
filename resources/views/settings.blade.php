@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="/css/settings.css">
</head>

<div class="filler"></div>
<div style="" class="col- xs-1 setting_container  " >
	<div class="container" >
<a class="navbar-brand" href="#">
    <img   src="{{Auth::user()->picture}}" width="50" height="50" class="img-circle d-inline-block align-top stng" alt="">
    <h3 class="stng stng_text" > Settings</h3>
  </a>
</div>
<br>
  <div class="stngs w3-container">
  
<div class="w3-bar ">
  <p onclick="change_setting_section(event, 'profile')" class="w3-bar-item sg_active">Profile</p>
 
  <p onclick="change_setting_section(event, 'reset_pass')" class="w3-bar-item ">Password</p>
  <p onclick="change_setting_section(event, 'privacy')" class="w3-bar-item ">Privacy</p>
  <p onclick="change_setting_section(event, 'blocking')" class="w3-bar-item ">Blocking</p>
  <p onclick="change_setting_section(event, 'import')" class="w3-bar-item ">Import</p>

    <p onclick="change_setting_section(event, 'account')" class="w3-bar-item ">Account</p>
      
  
</div>
</div>

</div>

<div class="stng_sections container" >



<div style="display: block;" class=" common2 stng_section container" id="profile" >
<h2> Profile </h2>
<p>Your profile settings

  <br>
  <hr>
  
    
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Display Name</label>
    <div  class="col-sm-10">
       <input id="uname" value="{{Auth::user()->name}}" placeholder="Set a new username" onkeypress="check_length(this, 'update_profile')" type="text" name="uname" class="form-control">
    </div>
  </div>

    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
    <div  class="col-sm-10">
       <input id="new_email" placeholder="Set a new email" value="{{Auth::user()->email}}" onkeypress="check_length(this, 'update_profile')" type="text" name="email" class="form-control">
    </div>
  </div>

 

 <button id="update_profile" class="disabled btn btn-large btn-block " >Update Profile</button>
 
 </div>

 
<div class="common2 stng_section container" id="reset_pass">

<h2> Password </h2>
<p>Change your password
  
             
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4  -label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="email" onkeypress="check_pass(this, 'reset_pass')" class="reset form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class=" -block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4  -label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" onkeypress="check_pass(this, 'reset_pass')" class="reset form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control- ">Confirm Password</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" onkeypress="check_pass(this, 'reset_pass')" class="form-control reset" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                
                            </div>
                        </div>
                    </form>
 


 <button type="submit" id="password_button"  class="btn btn-large btn-block disabled" >Update Password</button>
 
</div>


<div class="common2 stng_section container" id="privacy">

<h2> Privacy </h2>
<p>Adjust others ability to view your content 

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Discoverability</label>
    <div  class="col-sm-7">
      <input

       onchange="check_box()" 

       type="checkbox" value="">
      <p>If disabled, your posts will only be available to your followers and visitors to your profile.
    </div>
  </div>


 <button id="update_privacy"  class="disabled btn btn-large btn-block  " >Update Profile</button>
 

</div>

<div class="common2 stng_section container" id="blocking">

<h2> Blocking </h2>
<p>Once you block someone, that person can no longer tag you, follow you, view your profile, or see your feed posts. 
 
@foreach($blocks as $blocked)
  <div class="blocking_container row">
 	
 	<div class="col-xs-6" >
 		<img style="float: left" src="{{$blocked['picture']}}" width="30" height="30">
    <h4 style="float: left;" >{{$blocked['name']}}</h4>
 	</div>
 	<div class="col-xs-6" >
 		<button  type="button" id="Unblock" data-id="{{$blocked['id']}}" class="btn btn-outline-dark">Unblock</button>
 	</div>
  </div>
@endforeach()


</div>

<div class="common2 stng_section container" id="account">

<h2> Account </h2>
<p>  Deleting your account is irreversible. <br>

<button onclick="deleted()" class="btn btn-lg btn-block btn-danger" > Delete Account </button>



</div>

<div class="common2 stng_section container" id="import">

<h2> Import </h2>
<p>  Import media from other providers  <br>

<button   class="btn btn-lg btn-block btn-success" > Import Media</button>



</div>

</div>

<script>
  function check_length(e, button){
  if ( $.trim( $(e).val() ).length > 1 ){
    $('#'+button).replaceWith('  <button onclick="update_profile(this)" id="'+button+'" class=" btn-success btn btn-large btn-block " >Update Profile</button>');
     

  }else{
    $('#'+button).replaceWith('  <button id="'+button+'" class="disabled btn btn-large btn-block " >Update Profile</button>');
 
  }
}
  function deleted() {
var r = confirm("Are you sure!");
if (r == true) {
  $.get( "/deactive/account", function( ajax ) {
 
  location.reload();
});
   
} 


  }

  function update_profile(e){
  
    data = {
            uname : $('#uname').val(),
            email:  $('#new_email').val()
          }
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 

  $.ajax({

    //do a call to the list table and add the movie as 
    url: '/profile/update',
    data: data,
    type: 'POST',
    beforeSend: function(){
      // $('#update_profile').replaceWith('<button    class="btn btn-block btn-large btn-success" > <img src="img/loadericon.gif" >  </button>');   
   
    }, 
    success: function(d){

      check('Changes has been saved!');
        }
    });        

  }
function  check_pass(e, button){
$.each( $('.reset'), function(e){
  console.log($(e).val() );
 if ( $.trim( $(this).val() ).length > 1 ){
  return 0;
      }else{
    $('#password_button').addClass('btn-success').removeClass('disabled'); 
}
    
  });
}
   
  function check_box(){
    $('#update_privacy').addClass('btn-success');
    $('#update_privacy').removeClass('disabled');
  }
$('#Unblock').click(function(e){

  $.get( "/unblock/"+$(e).attr('data-id'), function( ajax ) {
 
  location.reload();
});

});
</script>
@endsection