@extends('layouts.app')

@section('content')
<head>
	<link rel="stylesheet" type="text/css" href="/css/movie.css">
	<script src="/js/movie.js"></script>
	<script src="/js/library.js"></script>
    <script src="/js/post_control.js"></script>
<link rel="stylesheet" href="/css/starrr.css">
    <script src="/js/starrr.js" ></script>
    <script src="/js/react.js" ></script>
	<style type="text/css">
		.header{
			 
    background-repeat: no-repeat !important;
    background-position: 50% 0 !important;
    transition: .5s ease;
    background-size: cover !important;

 
    opacity: 1;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
	 
	margin-right: 40px;
	position: absolute;
	margin: 0 ;
	background-color: white;
	height: 450px;
	margin-top: -90px;
	margin-bottom: -10px;
	z-index: -1;
	width: 100%;

		}
		.profile_container{
			height: 300px;
			width: 100%;
		}
	</style>
</head>
 

<input id="movie_name" type="hidden" value="" >
<input id="movie_pic" type="hidden" value="" >
<input id="ep_counts" type="hidden" value="" >

<div id="reaction" class="w3-modal">
  <div style="width: 390px;" class="  w3-modal-content">
    <div class="reaction_container2  w3-container">
      <span onclick="document.getElementById('reaction').style.display='none'"
      class=" cursor w3-display-topright">&times;</span>
       
       <div id="post_reaction" >
       <p id="movie_title"> </p>
      <span style="float: right;" id="reaction_counter" > </span>
       <p class="v_small" id="date"> </p>
       
       	<hr>
       <textarea data-name="reaction_counter" onkeypress="limit(this)" id="reaction_content" name="react" class="" >
       </textarea>
       <br>
       <button onclick="react(this)" style="float: right" class="btn btn-success" >Post Reaction</button>
    </div>

  </div>
 </div>
</div>




<div  class="d profile_container ">




<div id="backdrop" style="background-image: url('/header.jpg')" class="header"></div>

<div class="col-sm-12 empty " >.</div>





</div>
<div class="white_section col-xs-12" >
<div style="margin-left: 25%" class="tab">
  <button class="current_tab tablinks" onclick="change_section(event, 'summary')">Summary</button>
  <button class="tablinks" onclick="change_section(event, 'gallery')">Gallery</button>
  <button class="tablinks" onclick="change_section(event, 'recommendation')">Recommendation</button>
  <button class="tablinks" onclick="change_section(event, 'staff')">Staff</button>
</div>
</div>
<div class="container">

<div  class="col-sm-3 col-xs-12 row " > 
	<div class="col-sm-10 col-xs-10" >
 <img id="poster" class="img-responsive"><br>
            
		
			<div class="btn-groups" >
	@if($rate == null )
			<div class="text-center add-to-library" > Add to Library 
	@else
<div class="text-center add-to-library" > Edit Entry
	@endif
			</div>

	<?php $display = 'block'; ?>
	@if($rate == null )
	<?php  $display = 'none';  ?>
	@endif



	<div id="rating_section" style="display: {{$display}}" class="rating c"> 
	<div class="center-block">

	<i data-rating="1" class="fa stars fa-star-o"></i>
	<i data-rating="2" class="fa stars fa-star-o"></i>
	<i data-rating="3" class="fa stars fa-star-o"></i>
	<i data-rating="4" class="fa stars fa-star-o"></i>
	<i data-rating="5" class="fa stars fa-star-o"></i>
	</div>
	<script >

	console.log({{$rate["rate"]}})
	for(i={{$rate["rate"]}}; i>0; i--){
	$("#rating_section").find(`[ data-rating='`+i+`']`) 
	.addClass('selected fa-star').removeClass('fa-star-o');
	}
</script>
<button onclick="document.getElementById('reaction').style.display='block'"   style="width:  150px; background-color: #1abc9c" class="btn butons" >Add Reaction</button>
	</div>
		@if($rate['status'] == 'WatchList' || $rate == null )
	<button onclick="completed()" style="background-color: #27ae60" class="btn butons" >Watched</button>
	@endif
	<br>
@if($rate == null )
@if($rate == null )
	<button onclick="watchList(this)" id="watch-list" style="background-color: #8e44ad" class="btn butons" >Watch-list</button>
	@endif
	<br>
@if($rate == null )
	
@endif()
@endif()
	</div>
    <input id="score" type="hidden" value=" ">  
    <input id="status" type="hidden" value="">  
    <input value="" type="hidden" class="movie_id">

</div>
</div>

<div class="col-sm-9 col-xs-12" > 
	<div class="common" id="summary" >
	<div class="col-sm-8 col-xs-12"  >
            <div class=""    id="">
            <label class="no_margin_bottom"  id="movie_title">  </label>  
            <div id="bio"></div >
            <br>
            <label class=""  > Keywords </label>  
            <ul class="tags">
            <div id="tagz"></div>
            </ul>
            </div>
            <hr>
 		<div  class="rounded col-sm-12">
            @if(Auth::check() )
            @include('modules.post')
            @endif()
            	<br><br>
<div class="col-sm-12 col-md-12  _4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>

<div class="col-sm-12 col-md-12_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>
            	 </div>
            	</div>
            	
            	 <div class="col-sm-4 col-md-4 col-xs-12" > 


		<a id="video" href="" data-lity>
		<img class="img-responsive " src="/img/trailer.gif">
	    </a> 
	<div class="panel panel-default">
		<div class="text-center panel-heading">Movie Details 



		</div>

		<div class="panel-body">

		<div class="movie_details more">

		<p> Length: <span id="length"></span> 
		<p>Popularity: <span id="popularity"> </span> 
		<p> Vote Count: <span id="votes"> </span>
		<span id="vote_average" align='center'>
		<p>Scored: </span>  
		<label>Genres: </label><span id="ges"></span><br>
		<label>Production: </label><span id="production"></span><br>
		<span id="links" ></span> 
		<span id="pages"></span>

		</div>

		</div>
		</div>
</div>
	</div>

<!-- Hiddin  -->
		<div  style="display: none" id="staff" class="common  col-sm-12">

		<div class="col-sm-12"><h4> Staff </h4></div>

		<div class="staff"></div>

		<h4>Crew</h4>

		<div id="crew"></div>


		</div>
		<div style="display: none;" id="recommendation" class="common col-sm-12">

		</div>

		<div style="display: none;" id="gallery" class="common col-sm-12 ">
		<div id="gallery_photos">
		</div>

		</div>
<!--  -->
</div>


</div>

@endsection 
<script type="text/javascript">
  
 get_post({{$id}});
 document.addEventListener('DOMContentLoaded', function(){ 


 $(window).on('scroll', function() {



      var paginatr = window.moviex_global_next_page;
      paginatr = paginatr.split("=");
      paginatr = paginatr[1];
      console.log(paginatr);
     
        /* Check the location of each desired element */
  if( $('.no_more').isFullyVisible() ){
    $('.no_more').removeClass('no_more');
    get_post(  window.moviex_global_next_page);
  
  }
    
    });

    });
</script>
<script src="/js/header.js"></script>