@extends('layouts.app')

@section('content')


<div class="container  groups">
	<div class="row">
	  <div class="col-xs-12 col-sm-3">
            
	        <p class="cursor active sortBy tablinks" onclick="change_section(event, 'following')" ">
	        All

	        <p class="tablinks cursor sortBy" onclick="change_section(event, 'movies')">
	        Movies

	        <p class="tablinks cursor sortBy" onclick="change_section(event, 'tv')" ">
	        Tv-Series

	        <p class="tablinks cursor sortBy " onclick="change_section(event, 'global')"  "> 
	        Celeberity

	        <br>  </div>

	  <div style="padding-top: 1%;" class="col-sm-7 col-xs-12 white_box" >
	  	<input  class="form-control " type="text" placeholder="Filter .. ">

	  	<hr>
	  	<div class="row" >
	  		
	  		<div class="col-sm-3 col-lg-2 col-xs-4" > 
	  		 <img height="100" width="100" src="av.png" >
	  		</div>

	  		<div class="col-sm-9 col-lg-10  col-xs-8" >
	  			<h4> Group Name </h4>
	  			<h6> Bio this is the ultimate gruop fi  on dsann </h6>
	  			<div class="row ">
	  				<div class="col-sm-6" >
	  				<button class="btn btn-success" > Join this Group  </button>
	  			 	<kdp> hahah </kdp>
	  				</div>
	  				<div class="col-sm-4 col-xs-1"></div>
	  				<div class="col-sm-2 col-xs-4"> 
	  					<kdp> 577 users </kdp>
	  				</div>
	  			
	  			</div>
	  		</div>

	  	</div>
	  </div>
	<div class="col-sm-3 ">

	@include('modules.footer')

	</div>
</div>
</div>


@endsection()