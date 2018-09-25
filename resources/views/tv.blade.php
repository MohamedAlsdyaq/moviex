@extends('layouts.app')

@section('content')
<head>
	<link rel="stylesheet" type="text/css" href="/css/movie.css">
	<script src="/js/tv.js"></script>
	<script src="/js/library.js"></script>
<link rel="stylesheet" href="/css/starrr.css">
    <script src="/js/starrr.js" ></script>
    <script src="/js/react.js" ></script>
    <script src="/js/update_entry.js" ></script>
      <script src="/js/post_control.js"></script>
	<style type="text/css">
  html{
    overflow-x: hidden !important;
  }
		.header{
			 background-repeat: no-repeat !important;
    background-position: 50% 50% !important;
    transition: .5s ease;
    background-size: cover !important;
 
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
  
	margin: 0 ;
	background-color: white;
	height: 450px;
	margin-top: -90px;

	z-index: -1; 
	width: 100%;

		}
		.profile_container{
			height: 300px;
			width: 100%;
		}
    .white_section{
      margin-top: 150;
    }
	</style>
</head>
<script type="text/javascript">
	   
</script>
<input id="movie_name" type="hidden" value="" >
<input id="movie_pic" type="hidden" value="" >
<input id="ep_counts" type="hidden" value="" >
<input id="reported_post" type="hidden">




<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"
   id="id01" >
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h2 style="text-align: center;" id="movie_title" >  </h2>
<hr>
         <div class="" >
          <div style="padding-left: 10%;" class=" " >
          
            <div >


  <form  id="update_form">
  
  @if($rate != null )
  <input id="entry_id" type="hidden" name="id"  value="{{$rate['id']}}">   
  @endif
  <div class=" row">
    <label for="colFormLabelSm" class="col-sm-2 col-xs-2 col-md-2 col-form-label col-form-label-sm">Status</label>
    <div  class="col-sm-8 col-xs-8 col-md-8">
        <select name="status" style="color: black !important" style="" class="butons custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option value="watching" name="started"  >Currently watching</option>
        <option value="completed" name="completed" >Completed</option>
        <option value="dropped" name="dropped" >Dropped</option>
       
      </select>
    </div>
  </div>
 
<?php
$finished_at = '';
$started_at = ' ';
$note = '';
 if($rate != null ){
  $finished_at = $rate['finished_at'];
  $started_at = $rate['started_at'];
  $note = $rate['note'];
 }
$url =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$url = substr($url,10);

if (strpos($url,'tv') !== false || strpos($url,'movie') !== false) {
 $progress = 0;
 if($rate != null )
  $progress = $rate['ep_count'];
 ?>
 <br>
  <div class="f row">
    <label for="colFormLabel" class="col-sm-2 col-sm-2 col-xs-2 col-md-2 col-form-label">Progress</label>
    <div  class="col-sm-8  col-xs-8 col-md-8">

  <div class=" ">
    
<input name="progress" style="width:80%;float: left;" max="" id="number" type="number" class="form-control touchspin" value="{{$progress}}">


<div style="height: 36px; width: 50px; background-color: #ecf0f1; float: right;" id="of_ep"></div>
  </div>

    </div> 

  </div>
  <br>
  <?php } ?>
  <div class="f row">
    <label for="colFormLabelLg" class="col-sm-2 col-lg-2 col-form-label col-form-label-lg">Rewatch Count</label>
    <div class="col-sm-8 c-2 col-xs-8 col-md-8">
   <select name="rewatch" style="color: black !important" class="butons selectpicker">
      <option  data-name="0" >0</option>
      <option data-name="1" >1</option>
      <option data-name="2" >2</option>
    </select>
    </div>
  </div>
  <br>
  <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-sm-2 col-xs-2 col-md-2 col-form-label col-form-label-lg">Started Date</label>
    <div class="col-sm-8 col-sm-2 col-xs-8 col-md-8">
       <input placeholder="{{$started_at}}" name="started_at"    type="date"  class="form-control " >
    </div>
  </div>
  <br>
    <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-xs-2 col-md-2 col-form-label col-form-label-lg">Finished Date</label>
    <div class="col-sm-8 col-xs-8 col-md-8">
            <input placeholder="{{$finished_at}}" value="" name="finished_at"   type="date"  class="form-control " >
    </div>
  </div>
  <br>
  <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-xs-2 col-md-2 col-form-label col-form-label-lg">Notes</label>
    <div class="col-sm-8 col-xs-8 col-md-8">
      <textarea name="note" style=" resize: none" class="form-control" id="" rows="3"> {{$note}} </textarea>
    </div>
  </div>

      
</form>
   </div>
</div>
<hr style="height: 2px;" >
<div style="height: 30px; margin-bottom: 10px;">
   <button onclick="delete_entry()" style="float: left" class="btn btn-default"><i class="fa fa-trash"></i> </button>

          <button onclick="update_entry_quick({{$rate['id']}})" style="float: right" class="btn btn-success"> Save Changes </button>
     
     
  </div>
                </div>
          </div>

           
       
     
      </div>
   
  </div>
</div>
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
       <button id="post_a_post" onclick="react(this)" style="float: right" class="btn btn-success" >Post Reaction</button>
    </div>

  </div>
 </div>
</div>





<div  class="d profile_container ">




<div id="backdrop" style="background-image: url('/header.jpg')" class="header"></div>

 



</div>
<div class="white_section col-xs-12 " >
<div style="margin-left: 25%" class="tab">
  <button class="current_tab tablinks" onclick="change_section(event, 'summary')">Summary</button>
  <button  s class="tablinks" onclick="change_section(event, 'gallery', 'tv')">Gallery</button>
  <button class="tablinks" onclick="change_section(event, 'recommendation', 'tv')">Recommendation</button>
  <button class="tablinks" onclick="change_section(event, 'season', 'tv')">Seasons</button>
  <button class="tablinks" onclick="change_section(event, 'staff', 'tv')">Staff</button>
</div>
</div>
<div class="">

<div  class="col-sm-3 col-xs-3 row " > 
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
<?php
$r = 0;
if(!is_null($rate['rate']))
$r = $rate['rate'];
?>
	console.log({{$rate["rate"]}})
	for(i={{$r}}; i<0; i--){
	$("#rating_section").find(`[ data-rating='`+i+`']`) 
	.addClass('selected fa-star').removeClass('fa-star-o');
	}
</script>
<button onclick="document.getElementById('reaction').style.display='block'"   style="width:  150px; background-color: #1abc9c" class="btn butons" >Add Reaction</button>
	</div>
		@if($rate['status'] == 'WatchList' || $rate == null )
	<button onclick="completed(this)" style="background-color: #27ae60" class="btn butons" >Completed</button>
	@endif
	<br>
@if($rate == null )
@if($rate == null )
	<button onclick="watchList(this)" id="watch-list" style="background-color: #8e44ad" class="btn butons" >Watch-list</button>
	@endif
	<br>
@if($rate == null )
		<button onclick="started(this)" id="started" style="background-color: #3498db" class="btn butons" >Watching</button>
@endif()
@endif()
@if($rate != null )
<p  class="cursor" data-toggle="modal" style="text-align: center;" data-target="#id01">Edit Library Entry </p>
 
@endif
	</div>
    <input id="score" type="hidden" value=" ">  
    <input id="status" type="hidden" value="">  
    <input value="" type="hidden" class="movie_id">

</div>


</div>

<div class="col-sm-9 col-xs-12" > 

	<div style="display: none" class="common" id="season" >
<h2>Seasons</h2>

<div id="sense" ></div>
	 </div>
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
        <div id="posts_loading" >
<div class="col-sm-12 col-md-12  _4-u2 mbm _2iwp _4-u8"  >
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

<div class="col-sm-12 col-md-12_4-u2 mbm _2iwp _4-u8"  >
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
      <div class="col-sm-12 col-xs-12 no_more_inactive" style="text-align: center;" ></div>
            	 </div>
            	</div>
            	
            	 <div class="col-sm-4 col-md-4 col-xs-3" > 


		<a id="video" href="" data-lity>

		<div id="" class="trailer " >
     <img class="img-responsive " src="/img/trailer.gif">
      </div>

	    </a> 
	<div class="panel panel-default">
		<div class="text-center panel-heading">Movie Details 



		</div>

		<div class="panel-body">

		<div class="movie_details more">

		<p> Seasons: <span id="length"></span> 
		<p> Episodes runtime: <span id="ep_run"></span> 
			<p> Total # of Episodes: <span id="no_ep"></span> 
		<p>Popularity: <span id="popularity"> </span> 
		<p> Vote Count: <span id="votes"> </span>
		<p> Status:  <span id="vote_average" align='center'>
		<p>Created By: <spna id="director"> </span>  
		<p>Genres: <span id="ges"></span><br>
		<p>Production: <span id="production"></span><br>
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
<h2>Recommendations</h2>
		</div>

		<div style="display: none;" id="gallery" class="common col-sm-12 ">
      <h2>Gallery</h2>
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