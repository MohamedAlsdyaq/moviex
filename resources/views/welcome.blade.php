@extends('layouts.app')

@section('content')

<head>
    
    <link rel="stylesheet" href="https://npmcdn.com/flickity@2/dist/flickity.css" media="screen">

<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="/js/update_entry.js"></script>
<link rel="stylesheet" type="text/css" href="/css/movie.css">
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
   <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
   <script src="/js/bootstrap-suggest.js"></script>
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
 
  <div style="{{$style}}     background-size: contain !important; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7) ) , url('{{$tv['show']['show_pic']}}') !important ;" class="quick_container  carousel-cell  ">
    <div class=" " >
    <div class=" quick_action" > 
            <textarea class="form-control" style="resize:none;" ></textarea>
           
           <p style="float:left" > View Discussion </p>
        <div  style="float:left" class="edit" > 
            <div class="col-xs-6" >
<i data-toggle="modal" data-target="#{{$quick_id}}" class="cursor fa fa-edit" style="font-size:18px"></i>
 

            </div>
            <div class="col-xs-6">
            <button data-current="{{$tv['ep_count']}}" onclick="incrment_ep(this, {{$tv['id']}}, {{$tv['show']['ep_count']}})" class="btn btn-sm btn-success" >
         {{$tv['ep_count']}} <i class="fa fa-plus"></i>
        </button>
    </div>
        </div>

    </div>
                <div id="" class="c row">

                    <div class="col-sm-3 col-xs-3" >  
                            <img class="img-responsive show_img"    src="{{$tv['show']['show_pic']}}"> 
                    </div>
                <div class="row quick_progress col-sm-7 col-xs-7" > 
<?php $loader  = $tv['ep_count'] / $tv['show']['ep_count'] * 100 ;   ?>
<script > console.log({{$loader}}) </script>
                    <h4 id="quick_show_name" style="bottom: 0%" >{{$tv['show']['show_id']}}fds </h4>
<div id="#p" > <div class="loaded" ><div style="width: {{$loader}}%" class="loaded2" >.</div>.</div> </div>
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

<div class="app container" >

 
<!-- Flickity HTML init -->


    <div  class="btn-group-vertical col-xs-12 col-sm-3" >
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
 
    <button class="btn btn-light" onclick=" get_post('following'); change_section(event, 'following');" type="radio" name="options" id="option1" autocomplete="off" checked><i class="fab fa-connectdevelop"></i> Following</button>
 
    <button class="btn btn-light" onclick=" get_post('movies'); change_section(event, 'movies');" type="radio" name="options" id="option2" autocomplete="off"><i class="fas fa-film"></i> Movies</button>
  </label>
 
    <button class="btn btn-light" onclick="get_post('tv'); change_section(event, 'tv'); " type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-tv"></i> Tv series</button>
 
 
    <button class="btn btn-light" onclick="get_post('global');change_section(event, 'global'); " type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-globe"></i> Global</button>
 
</div>

     
        <br>
            <p>Groups
                <hr>
                <p> Apperantely you are not a mebmer of any group. discover Groups
            <div class="white_box" >
                
            </div>


        </div>
        <div class="col-sm-6 col-xm-12">
         
            @if(Auth::check() )
            @include('modules.post')
            @endif()
<br><br><br><br><br><br> 


            <div id="global" class="common ">
                
                @if(Auth::check() && Auth::user()->new == 0)
                        <div id="new_welcome" >
            <h4> Hey {{Auth::user()->name}}, Welcome to Moviex </h4>
            <p>This is the global activity feed. It's populated by recent activity from all of Moviex's users - even you! Once you've had a chance to follow a few more interesting users, we'll switch your default feed from Global to Following.</p>
             
            <h5>Why don't you try creating a feed post to introduce yourself using the form below? You can say something as simple as 'Hey everyone, I'm new to Moviex', or you can show us how creative and witty you are! </h5>
                        </div>
                        @endif()
 

                        <div id="posts_loading"></div>
<div class="col-sm-12 col-md-12  _4-u2 mbm _2iwp _4-u8" >
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
<div class="no_more" ></div>
            </div> <!-- Global -->
            <div id="posts_loading"></div>
            <div id="tv">
<div class="col-sm-12 col-md-12  _4-u2 mbm _2iwp _4-u8" >
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


            </div> <!-- Tv -->
             <div style="display: none" id="movies" class="common ">
<div id="posts_loading"></div>
<div class="col-sm-12 col-md-12  _4-u2 mbm _2iwp _4-u8" >
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

            </div> <!-- Movies-->
<div style="display: none" id="following" class="common ">
<div id="posts_loading"></div>
<div class="col-sm-12 col-md-12  _4-u2 mbm _2iwp _4-u8" >
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

            </div> <!-- Following timeline -->

        </div>
        <div class="col-sm-3">
            
            @include('modules.footer')

        </div>
    </div>




</div>
<script >

function get_post(id){
if(id == null)
  return false;
var content = ' ';
  $.ajax({
    type: 'GET',
    url: '/posts/get/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    
    success: function(ajax) {
      console.log(ajax);
data = ajax.data;
 
 $('._4-u8').remove();
if(ajax.next_page_url !== null){
 var o = ajax.next_page_url;
o = o.slice(29);
 window.moviex_id_plus_paginater = o;
 window.moviex_data_paginate_limit = ajax.last_page;
}
console.log(ajax.current_page);
console.log(ajax.last_page);

if(ajax.current_page > ajax.last_page){

window.moviex_id_plus_paginater = null;
//$('.no_more').removeClass('no_more');
return false;

}


 for(i=0; i<data.length; i++){

var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
$('#write_on_me').val(JSON.parse(this.responseText) );
    }
  };
  xhttp.open("GET", "/spoiler/check/"+data[i].show_id, true);
  xhttp.send();
/* Dont Load posts from nlocked users 
/

var xx = new XMLHttpRequest();
  xx.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var det = JSON.parse(this.responseText)  ;
      console.log(det.active);
      window.moviex_stat_blocked = false;
if(det.active === 2) 
window.moviex_stat_blocked = true;
    

    }
  };
  xhttp.open("GET", "/check_relationship/"+data[i].user.id, true);
  xhttp.send();
console.log(window.moviex_stat_blocked);
if(window.moviex_stat_blocked == true){

  continue;
}
*/
 content = ' ';
      content += '<div id="post_s"> <figure id="post'+data[i].id+'"><div class="post_container  col-xs-12" > <div style="padding:5px;" ><img class="img-circle" style="float:left ; margin-right:4px; " src="'+data[i].user.picture+'" height="30" width="30" ><div style="float:left" >'+data[i].user.name+' <span > - '+formatDate(data[i].created_at) +'</span></div><br>    <h6></h6></div> ';
     var imgs = ' ';
        if(data[i].postcontents.length > 0){
          for(j=0; j<data[i].postcontents.length; j++){
            imgs += '<img src="/'+data[i].postcontents[j].content+'" > ';
          }
        }
    if(data[i].spoiler == 1 && data[i].ep_id >= $('#write_on_me').val()){

    content += '<div onclick="spoiler(this,  spoiler'+data[i].id+' )" class="spoilered" > <h5 style="margin:4px;" >'+data[i].content+'</h5>'+imgs+' </div> <div id="spoiler'+data[i].id+'" class="spoiler_alert" ><span class="fa fa-2x fa-eye-slash" ></span> <h4>This Post Contains Spoiler! </h4></div>'; 

    }else{
    content += '<h5 style="margin:4px;" >'+data[i].content+'</h5> '+imgs; 
   

    }
     liking = ' <i data-id="'+data[i].id+'" onclick="like(this, '+data[i].likes.length+')" style="float:left" class="fa heart fa-heart-o"></i>';

if($('#my_id').val() != null){
  
    for(k=0; k<data[i].likes.length; k++){
      console.log(data[i].likes[k].user_id);
      console.log($('#my_id').val() );
      if($('#my_id').val() == data[i].likes[k].user_id){
         liking = '<i style="color:red; float:left" class="fa fa-heart"></i> ';
    liked = true;
    break;
  }
  else{
        console.log('none');
    }
  }
}
 

   content +='</div>  <div style="display:block; bottom: 0; margin-top:10px; padding:8px;" >'+liking+'<span id="new_like'+data[i].id+'" ></span> <span id="like'+data[i].id+'" >  '+data[i].likes.length+'  </span> <i onclick="myFunction('+data[i].id+')"  style="float:right" class="dropbtn fa fa-ellipsis-h"></i> </div> </figure><div id="myDropdown'+data[i].id+'" class="dropdown-content">  <a onclick="copy_link('+data[i].id+')" >Copy Link to Post</a>    <a onclick="block('+data[i].user.id+')"   >Block @'+data[i].user.name+'</a>    <a data-toggle="modal" data-target="#report_modal" onclick="report('+data[i].id+')" >Report Post</a></div> <div style="margin-bottom:7px; padding-bottom:7px;"  onclick="ss('+data[i].id+', this)" >  <h4  class="text-center "  > Show More </h4> </div></div> </div>' ;

   $('#'+id).append(content);

 }
 if(ajax.current_page >= ajax.last_page){

//window.moviex_id_plus_paginater = null;
        $('.no_more').html('<h5> No More Posts to be Showen!</h5> ');
$('.no_more').removeClass('no_more');

return false;

}
}
});


}
get_post('global');
 
     $(window).scroll( function(){
      var paginatr = window.moviex_id_plus_paginater;
      paginatr = paginatr.split("=");
      paginatr = paginatr[1];
      if(paginatr > window.moviex_data_paginate_limit || window.moviex_id_plus_paginater  == null){
        $('.no_more').html('<h5> No More Posts to be Showen!</h5> ');
        $('.no_more').removeClass('no_more');
        return 0;
      }
        /* Check the location of each desired element */
        $('.no_more').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
               get_post(window.moviex_id_plus_paginater );
               window.moviex_id_plus_paginater  = null;
                paginatr++;
                    
            }
            
        }); 
    
    });
 


  function incrment_ep(e, id, limit){

var current = $(e).attr('data-current');
var current_plus = current;
current_plus++;
    if(current >= limit)
      return 0;

$(e).replaceWith(' <button data-current="'+current_plus+'" onclick="incrment_ep(this, '+id+', '+limit+')" class="btn btn-sm btn-success" > '+current_plus+' <i class="fa fa-plus"></i> </button>');
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
        console.log(d);
  check('Keep Watching !');
     $('#'+id).hide(); 
    }
    
});


  }
</script>
@endsection()