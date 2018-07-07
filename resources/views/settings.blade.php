@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="/css/settings.css">
</head>

<div class="filler"></div>
<div style="" class="col- xs-1 setting_container  " >
	<div class="container" >
<a class="navbar-brand" href="#">
    <img   src="/av.png" width="50" height="50" class="d-inline-block align-top stng" alt="">
    <h3 class="stng stng_text" > Settings</h3>
  </a>
</div>
<br>
  <div class="stngs w3-container">
  
<div class="w3-bar ">
  <p onclick="change_setting_section(event, 'profile')" class="w3-bar-item stng_active">Profile</p>
 
  <p onclick="change_setting_section(event, 'password')" class="w3-bar-item ">Password</p>
  <p onclick="change_setting_section(event, 'privacy')" class="w3-bar-item ">Privacy</p>
  <p onclick="change_setting_section(event, 'blocking')" class="w3-bar-item ">Blocking</p>
  <p onclick="change_setting_section(event, 'account')" class="w3-bar-item ">Account</p>
      
  
</div>
</div>

</div>

<div class="stng_sections container" >

<div class="common2 stng_section container" id="profile" >
<h2> Profile </h2>
<p>Your profile settings

	<br>
	<hr>
	<form>
		
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Display Name</label>
    <div  class="col-sm-10">
       <input type="text" name="name" class="form-control">
    </div>
  </div>

    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
    <div  class="col-sm-10">
       <input type="text" name="email" class="form-control">
    </div>
  </div>

 

 
 
</form></div>

<div class="common2 stng_section container" id="password">

<h2> Password </h2>
<p>Change your password 



</div>

<div class="common2 stng_section container" id="privacy">

<h2> Privacy </h2>
<p>Adjust others ability to view your content 

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Discoverability</label>
    <div  class="col-sm-7">
      <input type="checkbox" value="">
      <p>If disabled, your posts will only be available to your followers and guests to your profile.
    </div>
  </div>



</div>

<div class="common2 stng_section container" id="blocking">

<h2> Blocking </h2>
<p>Once you block someone, that person can no longer tag you, follow you, view your profile, or see your feed posts. 

  <div class="blocking_container row">
 	
 	<div class="col-xs-6" >
 		<img src="/av.png" width="30" height="30">
 	</div>
 	<div class="col-xs-6" >
 		<button type="button" class="btn btn-outline-dark">Unblock</button>
 	</div>
  </div>



</div>

<div class="common2 stng_section container" id="blocking">

<h2> Account </h2>
<p>  Deleting your account is irreversible. 

<button class="btn btn-lg btn-block btn-danger" > Delete Account </button>



</div>

</div>
@endsection