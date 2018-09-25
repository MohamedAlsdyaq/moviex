@extends('layouts.app')

@section('content')

<head>
    
    <link rel="stylesheet" href="https://npmcdn.com/flickity@2/dist/flickity.css" media="screen">

<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="/js/update_entry.js"></script>

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
   <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
   <script src="/js/bootstrap-suggest.js"></script>
   <style type="text/css">
   #thumbnails:hover{
  border-radius: 5px;

  background-color: #dadede !important;
}
   #thumbnails{
  height: 30px;
  width: 80%;
}
     .active{
      background-color: white !important;
      outline: none !important;
      border: 0 !important;
      transition: .3s ease;
 box-shadow: none !important;
 border-radius: 0px !important;
     }
     .current_tab{
         background-color: white !important;
     }
     @media only screen and (max-width: 1024px) {

     }
   </style>
</head>
 @foreach($tvs as $tv)

<?php $quick_id = $tv['id'];  ?>

  <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"
   id="{{$quick_id}}" >
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h2 id="movie_title" >{{$tv['show']['show_id']}}  </h2>
  
      </div>

        <div class="modal-body">
          <div style="padding-left: 10%; " >
          
            <div >


  <form  id="update_form{{$quick_id}}">
  
  @if($tv != null )
  <input id="entry_id" type="hidden" name="id"  value="{{$tv['id']}}">   
  @endif
  <div class=" row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label>
    <div  class="col-sm-8">
        <select name="status" style="color: black !important" style="" class="butons custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option value="watching" name="started"  >Currently watching</option>
        <option value="completed" name="completed" >Completed</option>
        <option value="dropped" name="dropped" >Dropped</option>
       
      </select>
    </div>
  </div>
<br>
<?php
$finished_at = '';
$started_at = ' ';
$note = '';
 if($tv != null ){
  $finished_at = $tv['finished_at'];
  $started_at = $tv['started_at'];
  $note = $tv['note'];
 }
 
  $progress = $tv['ep_count'];
 ?>
  <div class=" row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress</label>
    <div  class="col-sm-8">

  <div >
    
<input name="progress" style="width:82%;float: left;" max="" id="number" type="number" class="form-control touchspin" value="{{$progress}}">


<div style="height: 36px; width: 50px; background-color: #ecf0f1; float: right;text-align: center;vertical-align: center" id="of_ep">{{$tv['show']['ep_count']}}</div>
  </div>

    </div> 

  </div>
 <br>
  <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Rewatch Count</label>
    <div class="col-sm-8">
   <select name="rewatch" style="color: black !important; float: right;" class="butons selectpicker">
      <option selected  data-name="0" >0</option>
      <option data-name="1" >1</option>
      <option data-name="2" >2</option>
    </select>
    </div>
  </div>
  <br>
  <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Started Date</label>
    <div class="col-sm-8">
       <input  style="float: right;" placeholder="{{$started_at}}" name="started_at"    type="date"  class="form-control " >
    </div>
  </div>
  <br>
    <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Finished Date</label>
    <div class="col-sm-8">
            <input  style="float: right;" placeholder="{{$finished_at}}" value="" name="finished_at"   type="date"  class="form-control " >
    </div>
  </div>

  <br>
  <div class=" row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Notes</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="note" style="float: right; resize: none" class="" id="" rows="3"> {{$note}} </textarea>
    </div>
  </div>
  <br>

      
</form>
   </div>
</div>
<hr style="height: 2px; width: 100%;">
<div style="height: 30px; margin-bottom: 10px;">
   <button onclick="delete_entry()" style="float: left" class="btn btn-default"><i class="fa fa-trash"></i> </button>

          <button onclick="update_entry_quick({{$tv['id']}})" style="float: right" class="btn btn-success"> Save Changes </button>
     
     
  </div>
                </div>
          </div>

           
       
     
      </div>
    </>
  </div>
</div>


@endforeach
<div class="carousel"

  data-flickity='{"contain": true, "contcxain": false,  "pageDots": false }'>




<div class="f-cell"></div>
  @foreach($tvs as $key=>$tv)

<?php
if($key == 0){$style = "   margin-left: 150px !important;";}
  else{$style = " ";}
 $quick_id = $tv['id'];  ?>
 <form id="quick_form_{{$tv['id']}}" >
  <div style="{{$style}}  background-position: center !important;   background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7) ) , url('http://image.tmdb.org/t/p/w500{{$tv['show']['show_header']}}') !important ;  background-position: 50% 0 !important;      background-repeat: no-repeat !important;" class="quick_container  carousel-cell  ">
    <div class=" " >
    <div class=" quick_action" > 

            <input style="height: 70px;" type="text" onkeypress="quick_type(this, {{$quick_id}})" max="250" id="quick_input_{{$tv['id']}}" class="form-control" style="resize:none;" > 
           <div id="quick_spoiler_{{$tv['id']}}" style="visibility: hidden; float: left;">

            <div style=" ;" class="funkyradio">
              <div class="funkyradio-default">
                <div class="funkyradio-info">
                  <input type="checkbox" name="checkbox" id="quick_spoiler_check{{$tv['id']}}" />
                  <label for="checkbox6">Spoiler</label>
                </div>
              </div>
            </div>

        </div>
          
        <div  style="float: right; margin-right: 10px;" class="edit" > 
             
<i data-toggle="modal" data-target="#{{$quick_id}}" class="cursor fa fa-edit" style="font-size:18px"></i>
   
            
            <button id="increment_btn{{$tv['id']}}" data-current="{{$tv['ep_count']}}" onclick="incrment_ep(this, {{$tv['id']}}, {{$tv['show']['ep_count']}}, {{$tv['show_id']}} )" class="btn btn-sm btn-success" >
         {{$tv['ep_count']}}  <i class="fa fa-plus"></i>
        </button>
    
        </div>

    </div>
  </form>
                <div id="" class="c row">

                    <div class="col-sm-3 col-xs-3" >  
                            <img class="img-responsive show_img"    src="http://image.tmdb.org/t/p/w154{{$tv['show']['show_pic']}}"> 
                    </div>
                <div class="row quick_progress col-sm-7 col-xs-7" > 
<?php $loader  = $tv['ep_count'] / $tv['show']['ep_count'] * 100 ;   ?>
<script > //////console.log({{$loader}}) </script>
        <a class="anchor" href="tv/{{$tv['show']['id']}}" > <h4 id="quick_show_name" style="bottom: 0%" >{{$tv['show']['show_name']}} </h4> </a>
<div id="#p" > <div class="loaded" ><div style="width: {{$loader}}%" class="loaded2" ></div></div> </div>
                 <div class="col-xs-12" > 
                    <h6><small>Ep {{$tv['ep_count']}} of {{$tv['show']['ep_count']}}</small></h6>  
                </div>
                 

                

                </div>
                </div>
                </div>
             </div>
@endforeach

@if(count($tvs) <= 2)
  <div class="quick_discover carousel-cell">
    Media you've added or updated within your <a href=""> Library </a> will show up here for you to quickly update it.
    <br>
    <button class=" btn btn-success btn-block"> Discover Media </button>
  </div>
@endif
@if(count($tvs) <= 2)
  <div class="  empty-cell ">
    <i style="color:rgba(255,255,255,.4)" class="fa fa-5x fa-plus" aria-hidden="true"></i>
</div>
@endif
@if(count($tvs) <= 3)
  <div class=" empty-cell  "></div>
  <div class=" empty-cell "></div>
@endif
</div>

<div class="" >

 
<!-- Flickity HTML init -->


    <div  class="sticky btn-group-vertical   col-lg-3 col-md-3 col-sm-3 col-xs-2 " >
      <div   class=" btn-group btn-group-toggle" data-toggle="buttons">
 
    <button class="btn btn-light" onclick="$('.current_tab').removeClass('active').removeClass('current_tab');  get_post('following', '/posts/get/following'); call_type = 'following'; change_section(event, 'following');" type="radio" name="options" id="option1" autocomplete="off" checked><i class="fab fa-connectdevelop"></i> Following</button>
 
    <button class="btn btn-light" onclick="$('.current_tab').removeClass('active').removeClass('current_tab');  get_post('movies', '/posts/get/movies'); call_type = 'movies'; change_section(event, 'movies');" type="radio" name="options" id="option2" autocomplete="off"><i class="fas fa-film"></i> Movies</button>
  </label>
 
    <button class="btn btn-light" onclick="$('.current_tab').removeClass('active').removeClass('current_tab'); get_post('tv', '/posts/get/tv'); call_type = 'tv'; change_section(event, 'tv'); " type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-tv"></i> Tv series</button>
 
 
    <button class="current_tab btn btn-light" onclick="$('.current_tab').removeClass('active').removeClass('current_tab'); get_post('global', '/posts/get/global'); call_type = 'global'; change_section(event, 'global'); " type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-globe"></i> Global</button>
 
</div>

     
      

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col ">
         
            @if(Auth::check() )
            @include('modules.post')
            @endif()
            


            <div id="global" class="common ">
                
                @if(Auth::check() && Auth::user()->new == 0)
                        <div id="new_welcome" >
            <h4> Hey {{Auth::user()->name}}, Welcome to Moviex </h4>
            <p>This is the global activity feed. It's populated by recent activity from all of Moviex's users - even you! Once you've had a chance to follow a few more interesting users, we'll switch your default feed from Global to Following.</p>
             
            <h5>Why don't you try creating a feed post to introduce yourself using the form below? You can say something as simple as 'Hey everyone, I'm new to Moviex', or you can show us how creative and witty you are! </h5>
                        </div>
                        @endif()
 

        <div id="global"></div>



 
            </div> <!-- Global -->
            <div id="posts_loading"></div>
               <div style="display: none" id="tv" class="common ">
 


            </div> <!-- Tv -->
             <div style="display: none" id="movies" class="common ">
 

            </div> <!-- Movies-->
<div style="display: none" id="following" class="common ">
 
            </div> <!-- Following timeline -->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
          
            <p style="font-weight: bold; margin-left: -.0%" >My Groups
           @if(count($groups) == 0)            
   <p> Apperantely you are not a mebmer of any groups.  <a href="/discover/groups" >discover Groups </a>
    @endif()
    @foreach($groups as $group)
    <div style=" " id="thumbnails" > 
       <img width="30" height="30" src="{{$group['group']['picture']}}" style=" margin-right: 7px;float: left;" > 
       <a href="/group/{{$group['group']['id']}}" > <p  style="margin-top: 7px;float: left; margin-bottom: 7px;" >  {{$group['group']['name']}} </a>
        <p style=" margin-left:90%;" > 0
    </div>
<br>
@endforeach()
    <hr><br>
        <p style="font-weight: bold; margin-left: -.0%" >My Lists
           
           @if(count($lists) == 0)   
                <p> Apperantely you dont have any lists. <a href="/discover/lists" >discover Lists </a>
          @endif
    @foreach($lists as $list)
    <div  id="thumbnails" > 
       
       <a href="/list/{{$list['id']}}" > <p  style="margin-top: 7px;float: left; margin-bottom: 7px;" >  {{$list['title']}} </a>
        <p style=" margin-left:90%;" > {{$list['listentries_count']}}
    </div>
<br>
@endforeach()  
            @include('modules.footer')

        </div>
    </div>




</div>
<script >
call_type = 'global';
function get_post(id, uri=false){
  if(uri == false)
    uri = id
var content = ' ';
  $.ajax({
    type: 'GET',
    url: uri,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    beforeSend: function(){
      $('#'+id).append('<img id="loader_big" src="/img/ring-alt.gif">');
    },
    success: function(ajax) {
 $('#loader_big').remove();
data = ajax.data;
window.moviex_global_next_page = ajax.next_page_url;
window.moviex_data_paginate_limit = ajax.last_page;
 $('._4-u8').remove();
 for(i=0; i<data.length; i++){
 
 content = display_post(data[i]);
   
 $('#'+id).append(content[0]);
 console.log(content[1]);
 $('.gallery'+data[i].id).imagesGrid({
    images: content[1],
                align: true
            });
   } // end for
$('.comments').each(function(i, item ) { 
    is = $('#'+item.id).attr('data-comment');
    target = '#'+item.id;
    //console.log(id + ' - '+ target)
     display_comments(is, 10, target); 
});
  console.log(id);
$('#'+id).append('<div class="col-xs-12 no_more" ></div>');
  } //end success
});
}
get_post('global', '/posts/get/global');
document.addEventListener('DOMContentLoaded', function(){ 


 $(window).on('scroll', function() {



      var paginatr = window.moviex_global_next_page;
      paginatr = paginatr.split("=");
      paginatr = paginatr[1];
      console.log(paginatr);
     
        /* Check the location of each desired element */
  if( $('.no_more').isFullyVisible() ){
    $('.no_more').removeClass('no_more');
    get_post(call_type , window.moviex_global_next_page);
  
  }
    
    });

    });
 


  function incrment_ep(e, id, limit, sid){
if($('#quick_input_'+id).val().length > 0  )
  quick_post($('#quick_input_'+id).val(), id, $(e).attr('data-current'), sid);
 

var current = $(e).attr('data-current');
var current_plus = current;
current_plus++;
    if(current >= limit)
      return 0;

var data = {id: id, current: current}
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 

$.ajax({

    //do a call to the list table and add the movie as 
    url: '/tv/update/quick',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
      
       
  check('Keep Watching !');
   
$('#increment_btn'+id).replaceWith(' <button id="increment_btn'+id+'" data-current="'+current_plus+' " onclick="incrment_ep(this, '+id+', '+limit+')" class="btn btn-sm btn-success" > '+current_plus+' <i class="fa fa-plus"></i> </button>');
    }
    
});

return false;
  }

  function quick_type(e, id){
    //////console.log($('#quick_input_'+id).val());
    if($('#quick_input_'+id).val().length > 0)
     $('#quick_spoiler_'+id).css('visibility', 'visible');
      else
       $('quick_spoiler_'+id).css('visibility', 'hidden'); 
  }
 
document.addEventListener('DOMContentLoaded', function(){ 

 $(window).on('scroll', function() {
 var paginatr = window.moviex_global_next_page;
      paginatr = paginatr.split("=");
      paginatr = paginatr[1];
      if(paginatr > window.moviex_data_paginate_limit || window.moviex_id_plus_paginater  == null){

  if( $('.no_more').isFullyVisible() ){
    $('.no_more').removeClass('no_more');
    get_post(call_type, window.moviex_global_next_page);
  
  }

}
});
});
  
</script>
@endsection()