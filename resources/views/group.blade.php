@extends('layouts.app')

@section('content')
<head>
	<style type="text/css">
		.header{
	  background:rgba(0,0,0,0.5);
    opacity: 1;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
	opacity: 0.9;
	overflow: hidden; 
	position: absolute;
	margin: 0 ;
	background-color: white;
	height: 450px;
	margin-top: -80px;

	z-index: -1;
	width: 100%;

		}
		.profile_container{
			height: 300px;
			width: 100%;
		}
	</style>
</head>
<script type="text/javascript">
	    $('#real_nav').removeClass('navbar-default');
</script>
<div  class="profile_container ">




<div style="background-image: url('/header.jpg')" class="header"></div>

<div class="col-sm-12 empty " >.</div>

<div class="account_info row" >
	<div class="col-sm-2 col-xs-4" >
		<img height="100" width="100" src="/av.png">
	</div>
	<div class="col-sm-3 col-xs-4 " >

		<h3 style="color:white" >Name </h3>
		
		<button type="button" class="btn btn-block btn- btn-success"> Join </button>
	</div>
</div>





</div>
<div class="white_section" >
<div class="tab">
  <button class="current_tab tablinks" onclick="change_section(event, 'activity')">Activity</button>
  <button class="tablinks" onclick="change_section(event, 'members')">members</button>
 
  <button class="tablinks" onclick="change_section(event, 'leaders')">leaders</button>
</div>
</div>

@endsection 