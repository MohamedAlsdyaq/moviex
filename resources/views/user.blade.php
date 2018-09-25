@extends('layouts.app')

@section('content')
<head>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="/js/follow.js"></script>
 
<script src="/js/header.js"></script>
<script src="/js/update_entry.js"></script>
 
	<style type="text/css">
  .common{

  }
		.header{
     
	  background:rgba(0,0,0,0.5);
      background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2) ) , url('{{$user['header']}}')
    opacity: 1;
    background-repeat: no-repeat;
    background-size: cover;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
	opacity: 0.9;
	overflow: hidden; 
	position: absolute;
	margin: 0 ;
	background-color: white;
	height: 400px;
	margin-top: -80px;

	z-index: -1;
	width: 100%;
  background: linear-gradient(  rgba(0,0,0,0.5), rgba(0,0,0,0.5) ) , url('{{$user['header']}}')
		}
		.profile_container{
			height: 300px;
			width: 100%;
		}
     .popover-header{

  font-size: 10px;
 }
 .search_poster{
 
 
   font-weight: normal !importantm;
     min-width: 160px;
     margin-top: 60px;
     margin-left: 0px;
}
 .popover-body{
font-size: 12px;
  font-weight: normal !important;
  
 }

 
 
 a{
 
     color: #003366  !important;
 
  text-decoration: none !important;
}
 a:hover{
 color: rgb(140,180,255) !important;
}

	</style>
  <link rel="stylesheet" type="text/css" href="/css/search.css">
</head>
<script type="text/javascript">
	  
       window.moviex_data_type = 'tv';
       window.moviex_data_sort = 'created_at';
</script>
<?php
$my_id = 0;
if(Auth::check()){
$my_id = Auth::user()->id;
  $class = 'cl';
}
  else
    $class = 'guest';
?>
<input type="hidden" id="user" name="">
<input type="hidden" id="username" value="{{$user['name']}}" name="">
 <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-">
    
      <div class="modal-body">
       
      <div class="">
        <div class="twPc-div">
    <a style="background-image: url({{$user['header']}});" class="twPc-bg twPc-block">

       <input onchange="change_header(this)" type='file' style="display: none" id="headerUpload" accept=".png, .jpg, .jpeg" />

       <label for="headerUpload">
    <i style="color: white" class="cursor fas fa-1x fa-camera">  </i>
       </label>

    </a>

  <div>
    <div class="twPc-button">
           
    </div>
<input type="file" name="header" style="display: none">
    <a   class="twPc-avatarLink">

           <div class="avatar-upload">
        <div class="avatar-edit">
            <input onchange="change_pic(this)" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload">
            <i class="  fa fa-file-picture-o" ></i>            </label>
        </div>
        <div class="avatar-preview">
            <div class="twPc- " id="imagePreview" style="background-image: url({{$user['picture']}});">
            </div>
        </div>
    </div>
     
    </a>

    <div class="edits twPc-divUser">
       <div class=" w3-container">
  
<div class="w3-bar edit_bar">
  <button data-indicator="about" onclick="change_edit_section(event, 'about')" class="w3-bar-item btn  btn-link stng_active edit_btn">About Me</button>
  <button data-indicator="links" onclick="change_edit_section(event, 'links')" class="w3-bar-item btn  btn-link edit_btn">Profile Links</button>
  <button data-indicator="favorites" onclick="change_edit_section(event, 'favorites')" class="w3-bar-item btn  btn-link edit_btn">Favorites</button>

      
  
</div>
</div>
    </div>

 
  </div>

<div id="about" class="common2">
  <h2> About Me</h2>
<form id="edit_pr_form" >
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Location</label>
    <div  class="col-sm-9">
       <input onkeypress="check_length_user(this, 'update_profile')" value="{{$user['location']}}" placeholder="Where do you live?" type="text" name="location" class="form-control">
    </div>
  </div>

      <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Birthdate</label>
    <div  class="col-sm-9">
       <input onkeypress="check_length_user(this, 'update_profile')" value="{{$user['birthday']}}" placeholder="Where do you live?" type="date" name="birthday" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label col-form-label-lg">Bio</label>
    <div class="col-sm-9">
      <textarea onkeypress="check_length_user(this, 'update_profile')" placeholder="Write something about yourself.." value="{{$user['bio']}}" name="bio" style="; resize: none" class="form-control"  rows="3"></textarea>
    </div>
  </div>
</form>
</div>

<div id="links" class="common2" style="display: none" >
  <h2>Profile Links</h2>
  <div id="social-icons">
<img onclick="link_img_click(this)" data-id="youtube" style="float: left" src="/48/Youtube-Icon.png">
<img onclick="link_img_click(this)" data-id="twitter" style="float: left" src="/48/Twitter-Icon.png">
<img onclick="link_img_click(this)" data-id="devintart" style="float: left" src="/48/Deviantart-Icon.png">
<img onclick="link_img_click(this)" data-id="flicker" style="float: left" src="/48/Flickr-Icon.png">
<img onclick="link_img_click(this)" data-id="facebook" style="float: left" src="/48/facebook-Icon.png">
<img onclick="link_img_click(this)" data-id="evernote" style="float: left" src="/48/Evernote-Icon.png">
<img onclick="link_img_click(this)" data-id="myspace" style="float: left" src="/48/Myspace-icon.png">
<img onclick="link_img_click(this)" data-id="linkedin" style="float: left" src="/48/Linkedin.png">
<img onclick="link_img_click(this)" data-id="instgram" style="float: left" src="/48/Instagram-Icon.png">
<img onclick="link_img_click(this)" data-id="google" style="float: left" src="/48/Google-plus-icon.png">
<img onclick="link_img_click(this)" data-id="path" style="float: left" src="/48/Path-Icon.png">
 
<img onclick="link_img_click(this)" data-id="tumbler" style="float: left" src="/48/Tumblr-Icon.png">
<img onclick="link_img_click(this)" data-id="soundcloud" style="float: left" src="/48/Soundcloud-Icon.png">
<img onclick="link_img_click(this)" data-id="wordpress" style="float: left" src="/48/Wordpress-Icon.png">
<img onclick="link_img_click(this)" data-id="reddit" style="float: left" src="/48/Reddit-Icon.png">
<img onclick="link_img_click(this)" data-id="quora" style="float: left" src="/48/Quora.png">
<img onclick="link_img_click(this)" data-id="blogger" style="float: left" src="/48/Blogger-Icon.png">
<img onclick="link_img_click(this)" data-id="github" style="float: left" src="/48/Github-Icon.png">
<img onclick="link_img_click(this)" data-id="pinterest" style="float: left" src="/48/Pinterest-Icon.png">
<img onclick="link_img_click(this)" data-id="vimeo" style="float: left" src="/48/Vimeo-Icon.png">
<img onclick="link_img_click(this)" data-id="email" style="float: left" src="/48/Email-Icon.png">
<img onclick="link_img_click(this)" data-id="website" style="float: left" src="/48/Share-Icon.png">
</div>
 <h6 style="visibility: hidden; line-height: 50px;" >.</h6>
 <h3> External Source </h3>
<p id="indicator" >

  <div class="input-group mb-3">
  <input id="link_input" type="text" data-target="" class="form-control" placeholder=""  aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button onclick="link()" class="btn btn-outline-secondary" type="button">Save</button>
  </div>
</div>



</div>


<div  id="favorites" class="common2" style="display: none" > 
<h2> Favorites </h2>
<p> Set your favorite shows</p>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a   onclick="fav_toggle(event, 'fav_movies')" class="nav-link active" href="#">Movies</a>
  </li>
  <li class="nav-item">
    <a onclick="fav_toggle(event, 'fav_tvs')"  class="nav-link" href="#">Series</a>
  </li>
  
</ul>
 <h3>  Search</h3>
      <div id="searchfield">
        <form><input placeholder="Search a show by its name.." type="text" name="currency" class="biginput" id="autocomplete"></form>
      </div> 

      <div class="common3" id="fav_movies">
       @foreach($favs as $fav)
@if($fav['type'] == 1)
  @continue
 @endif
 <div id="fav{{$fav['id']}}" class="fav_container" > 
 <a href="/movie/{{$fav['show_id']}}"" >
  <img style="margin-top: -20px; overflow: hidden; float: left;" class="thumbnail_poster" src="{{$fav['show']['show_pic']}}" > 
<h5 style="float: left;" >{{$fav['show']['show_name']}} </h5>
   </a>
<i onclick="delete_fav(this, {{$fav['id']}})" style="float: right;" class="fas fa-window-close"></i>
 
</div>
@endforeach 
      </div>

      <div class="common3" style="display: none" id="fav_tvs">
       @foreach($favs as $fav)
@if($fav['type'] == 0)
  @continue
 @endif
<div id="fav{{$fav['id']}}" class="fav_container" > 
 <a href="/movie/{{$fav['show_id']}}"" >
  <img style="margin-top: -20px; overflow: hidden; float: left;" class="thumbnail_poster" src="{{$fav['show']['show_pic']}}" > 
<h5 style="float: left;" >{{$fav['show']['show_name']}} </h5>
   </a>
<i onclick="delete_fav(this, {{$fav['id']}})" style="float: right;" class="fas fa-window-close"></i>
 
</div>
@endforeach 
      </div>



</div>


</div>
      </div>
     
         <p class="v_small">Visit your <a href="/setting/account" >settings </a> page to change your username, email, notification settings, and more.
          <button id="update_profile"  style="float: right !important " class="btn disabled float-right  " >Update Profile</button>
    
      </div>
    </div>
  </div>
</div>


<div  class="profile_container ">



<input type="hidden" value="{{$user['id']}}" id="user_id">
<div   class="header"></div>

 

<div class="account_info row" >
	<div style="margin-left: 70px;float: left" >
		<img style="" class="img-circle" height="100" width="100" src="{{$user['picture']}}">
	</div>
	<div style="margin-left: 20px; float: left" >

		<h3 style="font-weight: 500; font-size: 30px; color:white" >{{$user['name']}} </h3>
		 @if(  $user['id'] != $my_id && $is_friended == false)
   <button id="follow_button" class="btn follow {{$class}} btn-success">Follow</button>
    @endif
         @if(  $user['id'] != $my_id && $is_friended == false)
 <button  class="btn unfollow {{$class}} btn-outline-dark -">Following</button>
         @endif
    @if(Auth::check() && $user['id'] == Auth::user()->id)
		<div style="border:1px solid #afafaf; font-weight: 500;" aria-pressed="true"   data-toggle="modal" data-target="#edit" type="button" class=" edit-btn"> Edit  </div>
    @endif
	</div>
</div>

<div style="margin: 1%" >
<div style="padding:3%;float: right;bottom: 0;display: block;position: absolute; right: 0; width: 50%;" > 
@foreach($links as $link)
<a href="https://{{$link['link']}}" >
<img style="float: right; margin-right:  5px;" width="38" height="38" class="social_media" data-vendor="{{$link['vendor']}}" src="/48/{{ucfirst($link['vendor'])}}-Icon.png">
</a>
@endforeach()


</div>


</div>


</div>
<div class="white_section2" >
<div class="tab">

<button class="current_tab tablinks butons" onclick="change_section_user(event, 'activity')">Activity</button>

<button class="tablinks butons" onclick="change_section_user(event, 'library'); library(<?php echo $user['id'] ?>, 'tv')">Library</button>

<button class="tablinks butons" onclick="change_section_user(event, 'reaction'); reaction(`{{$user['id']}}`)">Reactions   </button>

<button class="tablinks butons" onclick="change_section_user(event, 'lists'); list(`{{$user['id']}}`)">Lists</button>

<button class="tablinks butons" onclick="change_section_user(event, 'followers'); follower(`{{$user['id']}}`);">Followers </button>

<button class="tablinks butons" onclick="change_section_user(event, 'following'); following(`{{$user['id']}}`)">Following</button>
<button class="tablinks butons" onclick="change_section_user(event, 'groups'); groups(`{{$user['id']}}`)">Groups</button>
</div>
</div>

<div class="app container">


<div class="row" > 
	<div id="activity" class="common" >
    <div class="col-sm-1 col-md-1  col-xs-1" ></div>
<div class="col-sm-7 col-md-7  col-xs-7"> 

 @if(Auth::check() )
            @include('modules.post')
            @endif()
<br><br>
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

<div class=" ">
<div class=" ">
<div id="modal_target" ></div>
<!-- code start -->


<!-- code end -->
</div>
</div>


	</div>

<div class="col-sm-4 col-md-4 col-xs-4"> 

	<h4 class="panel- " >  About Me </h4>
	<hr class="no_margin" >
	<p> {{$user['bio']}} <br>

	<h6>    <span class="fa fa-venus-mars fa-lg"></span> Gender:    {{$user['sex']}} </small></h6>

	<h6>    <span class="fa fa-map-marker fa-lg"></span></small>   Location:  {{$user['location']}}  </h6>

	<h6>   <i class="fa fa-birthday-cake fa-lg" aria-hidden="true"></i>
	  Birthdate:   {{$user['birthdate']}}  </h6>

<h6>	 <i class="fa fa-calendar fa-lg"></i>    joining data:   </h6>

<br>
<h4 class="panel-heading" > Favorite Shows </h4>
<button  onclick="toggle(this, 'thumnail_movies')" class="btn  transparent_btns  active_btn_switcher" >Movies</button>
 <button  onclick="toggle(this, 'thumbnail_series')" class="btn transparent_btns " >Series</button>
<hr style="margin-top: -2px;" >

<div class="th thumnail_movies" >
  @if($favs == [])
    <button class="btn btn-success btn-block" >Add Movie to your favorites</button>
  @endif()
@foreach($favs as $fav)
@if($fav['type'] == 1)
  @continue
 @endif
 <a id="fav{{$fav['id']}}" href="/movie/{{$fav['show_id']}}"" ><img class="thumbnail_poster" src="{{$fav['show']['show_pic']}}" >  </a>

@endforeach
</div>

<div style="display: none;" class="th thumbnail_series" >

@foreach($favs as $fav)
@if($fav['type'] == 0)
  @continue
 @endif
 <a id="fav{{$fav['id']}}" href="/tv/{{$fav['show_id']}}"" ><img class="thumbnail_poster" src="{{$fav['show']['show_pic']}}" >  </a>

@endforeach
</div>

</div>


</div>


	<div id="library" style="display: none;" class="common" >
	  <h2> {{$user['name']}}'s Library </h2>

		<div class="col-sm-9 col-md-9 col-lg-9 col-xs-9" >
			<input height="50px;" type="text" name="" class="form-control" placeholder="Search this library..." >
			<div class="col-sm-2 col-xs-2">
<i class="fas fa-th"></i>  <i class="fas fa-align-left"></i>
			</div>

<div class="col-sm-6 col-xs-6 "></div>

<div class="col-sm-4 col-xs-4">
	<div class="col-xs-1" > </div>
<div class="col-xs-4" ><h6> Sort by </h6> </div>
<div class="col-xs-6" >
	<select class="select">
  <option onclick=" sort = 'shows.show_name' ; library() "  >Title</option>
  <option onclick=" sort = 'rate' ; library()" >Rating</option>
  <option onclick=" sort = 'shows.show_date' ; library() " >Release Date</option>
  <option onclick=" sort = 'finished_at' ; library() " >Date Finished</option>
  <option onclick=" sort = 'updated_at' ; library() " >Date updated</option>
  <option onclick=" sort = 'started_at' ; library() " >Date Started</option>
</select>
</div>


 </div>

<br>
<div id="set_modals" ></div>
			<div class="libs">
 	
				</div>
        <div class="no_more" ></div>
		</div>


		<div class="col-sm-3 white_box col-md-3 col-lg-3 col-xs-4" >
			<select style="font-size: 15px;"  class="select custom_btns">
  <option onclick=" g_type = ''; library()" class="custom_btns">Movies</option>
  
  <option onclick=" g_type = 'tv';  library()" class="custom_btns">Series</option>
</select>
			<button style="opacity: 1" onclick="active_btn(this); status = ''; library()" class="btn custom_btns btn-primary" >All </button>

      <button onclick="active_btn(this);  status = '&status=completed'; library()" class="btn custom_btns btn-warning" >Completed </button>

		<button onclick="active_btn(this);  status = '&status=watching'; library()" class="btn custom_btns btn-info" >Currently watching</button>

			<button onclick="active_btn(this);  status = '&status=watchlist'; library()" class="btn custom_btns btn-success" >Watch-List</button>

			<button onclick="active_btn(this); status = '&status=dropped'; library()" class="btn custom_btns btn-danger" >Dropped</button>

		</div>

	</div>

  

	<div id="reaction" style="display: none;" class="reaction common" >
	
	</div>





	<div id="followers" style="display: none;" class="common" >
	
 


	</div>
	<div id="following" style="display: none;" class="common" >
  
  </div>

  <div id="lists" style="display: none;" class="common" >
    <h2> {{$user['name']}}'s Lists </h2>
  
  <div class="lists_container">
    
</div>

  </div>

	<div id="groups" style="display: none;" class="common" >
	  <div style="padding-top: 1%;" class="col-sm-7 col-xs-12 white_box" >
      <input id="group_search" onkeydown="   setTimeout(function(){ groups($('#group_search').val()) }, 1000);"  class="form-control " type="text" placeholder="Filter .. ">
 
    <button class="btn btn-light" onclick="results_type = '&type=movies';  groups($('#group_search').val());" type="radio" name="options" id="option2" autocomplete="off"><i class="fas fa-film"></i> Movies</button>
  </label>
 
    <button class="btn btn-light" onclick="results_type = '&type=tv'; groups($('#group_search').val()); " type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-tv"></i> Tv series</button>

      <hr>

      <div class="groups_container">
 

      </div>
      <br>
      <p href="#" style="text-align: center;" >Back to Top
    </div>
	</div>
	
</div>
</div>




</div>


  <div id="modal_" class="w3-modal">
    <div class="w3-modal-content">
      <div id="lib_modal" class="w3-container">
        <span onclick="document.getElementById('modal_').style.display='none'" class=" w3-display-topright">&times;</span>
       
      </div>
    </div>
  </div>


<script src="/js/load.js"></script>
@endsection 

<script>
 var g_type = 'tv';
 var sort = 'shows.show_name';
 var status = '';
  function active_btn(e){
  
    $('.custom_btns').css('opacity', '0.2');
    $(e).css('opacity', '1');
  }
function library(){

 
 
    $('.libs').html(' ');
 $.get( "/get/library"+g_type+"/{{$user['id']}}?page=1"+status+'&sort='+sort, function( ajax ) {
 


window.moviex_data_global_limit = ajax.last_page;
window.moviex_data_global_current = ajax.current_page;
if(ajax.next_page_url !== null)
window.moviex_data_global_next = ajax.next_page_url+status+'&sort='+sort;


data = ajax.data; 
 for(var i=0; i<15; i++ ){
  me = ' ' ;
if({{Auth::user()->id}} !== {{$user['id']}})
    me = disabled
  content = '<div  style="font-size: 14px !important;" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="lib'+data[i].id+'"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h2 style="text-align: center;" id="movie_title" > '+data[i].show_name+'<hr> <div class="" > <div style="padding-left: 10%;" class=" " > <div > <form id="update_form" style="font-size:14px; font-weight: normal" > <fieldset style="border: none" '+me+'>';
  
 content +='    <input id="entry_id" type="hidden" name="id"  value="'+data[i].id+'">';
 
  content += ' <div class=" row"> <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label> <div class="col-sm-8"> <select name="status" style="color: black !important" style="" class="butons custom-select mr-sm-2" id="inlineFormCustomSelect"> <option value="watching" name="started" >Currently watching</option> <option value="completed" name="completed" >Completed</option> <option value="dropped" name="dropped" >Dropped</option> </select> </div> </div>';
 
 finished_at = data[i].finished_at;
  started_at = data[i].started_at;
  note = data[i].note;
  progress = data[i].ep_count;

content += ' <br> <div class="f row"> <label for="colFormLabel" class="col-sm-2 col-form-label">Progress</label> <div class="col-sm-8"> <div class=" "> <input name="progress" style="width:80%;float: left;" max="'+data[i].show_ep_count+'" id="number" type="number" class="form-control touchspin" value="'+progress+'"><div style="height: 36px; width: 50px; background-color: #ecf0f1; float: right;" id="of_ep">'+data[i].show_ep_count+'</div> </div> </div> </div> <br> <div class="f row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"> </label> <div class="col-sm-8"> <select name="rewatch" style="color: black !important" class="butons selectpicker"> <option data-name="0" >0</option> <option data-name="1" >1</option> <option data-name="2" >2</option> </select> </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Started Date</label> <div class="col-sm-8"> <input placeholder="'+started_at+'" name="started_at" type="date" class="form-control " > </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Finished Date</label> <div class="col-sm-8"> <input placeholder="'+finished_at+'" value="" name="finished_at" type="date" class="form-control " > </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Notes</label> <div class="col-sm-8"> <textarea name="note" style=" resize: none" class="form-control" id="" rows="3"> '+note+' </textarea> </div> </div> </fieldset></form> </div></div><hr style="height: 2px;" ><div style="height: 30px; margin-bottom: 10px;"> <button onclick="delete_entry()" style="float: left" class="btn btn-default"><i class="fa fa-trash"></i> </button> <button onclick="update_entry()" style="float: right" class="btn btn-success"> Save Changes </button>  </div> </div> </div> </div> </div>';

$('#set_modals').append(content);

var loader = parseInt(data[i].ep_count) / parseInt(data[i].show_ep_count) * 100;
anchors = '<div class="bordered_btn"><a href="/'+window.moviex_data_type+'/'+data[i].id+'"><i style="color:grey;margin-top:4px;" class="fa fa-arrow-right" aria-hidden="true"> </i></a></div>';

anchors += '<div  class="bordered_btn" style="width:85px;"><span data-toggle="modal" data-target="#lib'+data[i].id+'"  > Edit Entry </span></div>';

if({{Auth::user()->id}} !== {{$user['id']}})
  anchors = '<a class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].original_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].original_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].original_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>';
  $('.libs').append( '  <div data-toggle="popover" data-placement="right" data-original-title="<h6>'+data[i].show_name + '<span style= &quot;color:#dddddd; &quot; > '+ get_year(data[i].show_date)+'</span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].show_popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].show_rating+'</sp></small></h5>" data-content="<div ><h6 style= &quot; font-weight:normal !important;  font-size: 12px; &quot;  >'+data[i].show_bio+'</h6></div>" onclick="go_to_page("/movie/'+data[i].show_id+'")" class="search_poster" style="height: 255px;background-color: #2c3e50;max-width: 110px;margin-left: 7px;border-radius: 3px;"> <div id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].show_pic+');" > <div class="bottom dropdown"> '+anchors+'</div></div> <div id="#p" > <div class="loaded" ><div style="width: '+loader+'%" class="loaded2" ></div></div> </div> <span style="margin:5px;float:left; color:grey; font-size:10px" > Ep.'+data[i].ep_count+' </span> <span style="margin:5px;float:right; color:grey; font-size:10px">'+data[i].rate+'</span></div> </div></div>');
  
 }
 $('.libs').append('<br> <br> <div class="no_more" >  </div> ');
});

}

 function load_more(){
 
  $.ajax({
            type: 'GET',
            url: window.moviex_data_global_next ,
            beforeSend: function(){
              $('.libs').append('<img class="loader" style="display:block; margin:auto" src="/img/big_ring.gif" >')
              $('.no_more').removeClass('no_more');
            },
            success: function(ajax) { 
              window.moviex_data_global_next = ajax.next_page_url;

               $('.loader').remove();
  data = ajax.data;
  
  for(i=0; i<15; i++){
     
   content = '<div  style="font-size: 14px !important;" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="lib'+data[i].id+'"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h2 style="text-align: center;" id="movie_title" > '+data[i].show_name+'<hr> <div class="" > <div style="padding-left: 10%;" class=" " > <div > <form id="update_form"> <fieldset style="border: none" '+me+'>';
 
 content +='    <input id="entry_id" type="hidden" name="id"  value="'+data[i].id+'">';
 
  content += ' <div class=" row"> <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label> <div class="col-sm-8"> <select name="status" style="color: black !important" style="" class="butons custom-select mr-sm-2" id="inlineFormCustomSelect"> <option value="watching" name="started" >Currently watching</option> <option value="completed" name="completed" >Completed</option> <option value="dropped" name="dropped" >Dropped</option> </select> </div> </div>';
 
 finished_at = data[i].finished_at;
  started_at = data[i].started_at;
  note = data[i].note;
  progress = data[i].ep_count;

content += ' <br> <div class="f row"> <label for="colFormLabel" class="col-sm-2 col-form-label">Progress</label> <div class="col-sm-8"> <div class=" "> <input name="progress" style="width:80%;float: left;" max="" id="number" type="number" class="form-control touchspin" value="'+progress+'"><div style="height: 36px; width: 50px; background-color: #ecf0f1; float: right;" id="of_ep"></div> </div> </div> </div> <br> <div class="f row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Rewatch Count</label> <div class="col-sm-8"> <select name="rewatch" style="color: black !important" class="butons selectpicker"> <option data-name="0" >0</option> <option data-name="1" >1</option> <option data-name="2" >2</option> </select> </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Started Date</label> <div class="col-sm-8"> <input placeholder="'+started_at+'" name="started_at" type="date" class="form-control " > </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Finished Date</label> <div class="col-sm-8"> <input placeholder="'+finished_at+'" value="" name="finished_at" type="date" class="form-control " > </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Notes</label> <div class="col-sm-8"> <textarea name="note" style=" resize: none" class="form-control" id="" rows="3"> '+note+' </textarea> </div> </div> </fieldset></form> </div></div><hr style="height: 2px;" ><div style="height: 30px; margin-bottom: 10px;"> <button onclick="delete_entry()" style="float: left" class="btn btn-default"><i class="fa fa-trash"></i> </button> <button onclick="update_entry()" style="float: right" class="btn btn-success"> Save Changes </button>  </div> </div> </div> </div> </div>';

$('#set_modals').append(content);

var loader = parseInt(data[i].ep_count) / parseInt(data[i].show_ep_count) * 100;
anchors = '<div class="bordered_btn"><a href="/'+window.moviex_data_type+'/'+data[i].show_id+'"><i style="color:grey;margin-top:4px;" class="fa fa-arrow-right" aria-hidden="true"> </i></a></div>';

anchors += '<div  class="bordered_btn" style="  width:85px;"><span data-toggle="modal" data-target="#lib'+data[i].id+'"  > Edit Entry </span></div>';

if({{Auth::user()->id}} !== {{$user['id']}})
  anchors = '<a class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].original_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].original_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].original_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>';
  $('.libs').append( '  <div data-toggle="popover" data-placement="right" data-original-title="<h6>'+data[i].show_name + '<span style= &quot;color:#dddddd; &quot; > '+ get_year(data[i].show_date)+'</span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].show_popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].show_rating+'</sp></small></h5>" data-content="<div ><h6 style= &quot;font-weight:normal !important;  font-size: 12px; &quot;  >'+data[i].show_bio+'</h6></div>" onclick="go_to_page("/movie/'+data[i].show_id+'")" class="search_poster" style="height: 255px;background-color: #2c3e50;max-width: 110px;margin-left: 7px;border-radius: 3px;"> <div id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].show_pic+');" > <div class="bottom dropdown"> '+anchors+'</div></div> <div id="#p" > <div class="loaded" ><div style="width: '+loader+'%" class="loaded2" ></div></div> </div> <span style="margin:5px;float:left; color:grey; font-size:10px" > Ep.'+data[i].ep_count+' </span> <span style="margin:5px;float:right; color:grey; font-size:10px">'+data[i].rate+'</span></div> </div></div>');
  
          }
            } // end success 
    
    });// end ajax 

}
 


document.addEventListener('DOMContentLoaded', function(){ 


 $(window).on('scroll', function() {

  if( $('.no_more').isFullyVisible() ){
    $('.no_more').removeClass('no_more');
    load_more();
  
  }
    if( $('.no_more_activity').isFullyVisible() ){

    $('.no_more_activity').removeClass('no_more_activity');
    load_post(window.moviex_global_var_pivot  , window.moviex_global_var_pivot + 10);
 
   
  }
    if( $('.no_more_groups').isFullyVisible() ){
    //$('.no_more').removeClass('no_more');
  var next = window.moviex_grp_next.split('page=');

    if(window.moviex_grp_last_page !== next[1] && window.moviex_grp_next !== null){
      groups_index(window.moviex_grp_next);
    }
    else{
     
      return 0;
    }
  }
      if( $('.no_more_lists').isFullyVisible() ){
    //$('.no_more').removeClass('no_more');
  var next = window.moviex_grp_next.split('page=');

    if(window.moviex_grp_last_page !== next[1] && window.moviex_grp_next !== null){
      groups_index(window.moviex_grp_next);
    }
    else{
     
      return 0;
    }
  }
});
    //$('.no_more').removeClass('no_more');
  

}, false);
 


function reaction(id){
    $('.reaction').html(' ');
 $.get( "/get/reaction/"+$('#user_id').val(), function( ajax ) {
  me = '';
   $('.reaction').append( '    <h2> {{$user["name"]}}\'s Reactions </h2>');
  
 for(var i=0; i<ajax.data.length; i++ ){
  data = ajax.data;
 eligibility = 1;
  for(j=0; j<data[i].likes.length; j++){
    if(data[i].likes[j].user_id == {{Auth::user()->id}})
      eligibility = 0;
  
    break;
  }
 if({{Auth::user()->id}} == {{$user['id']}})
 me = '<li> <a class="dropdown-item" onclick="delete_reaction('+data[i].id+')">Delete Reaction</a></li> ';
var rea = 'reaction';
  $('.reaction').append( '   <div id="reaction_'+data[i].id+'" style="  background-repeat: no-repeat !important;    background-size: cover !important; background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5) ) , url(http://image.tmdb.org/t/p/w500'+data[i].show.show_header+') !important ;" class="col-sm-4 col-md-4 col-lg-4 col-xs-6 reaction_container" style="" ><span class="like_reaction cursor stat-item"> <i onclick="like('+data[i].id+',`reaction`)" style=" class="fa heart fa-heart-o"> LIKE </i><i  data-counter="'+data[i].likes.length+'" data-eligibility="'+eligibility+'" id="reaction_likes_counter'+data[i].id+'"> '+data[i].likes.length+'</i></span>    <div class="">  <div style="margin-left:5%; float: right" class="  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span style="color: #e8e8e8;" class="fas fa-ellipsis-h" ></span> </div> <div class="dropdown-menu"> <li> <a class="dropdown-item" onclick="copy_link( '+data[i].id+',reaction)">Copy Reaction link</a></li> <li> <a data-toggle="modal" data-target="#report_modal" class="dropdown-item" onclick=" report( '+data[i].id+'); document.getElementById("modal_dest").value = "reaction" ">Report Reaction</a></li> '+me+' </div></div> <br><div class="reaction_info" ><p> '+data[i].show.show_name+' <span class="grey" > </span> <h5>'+data[i].reaction+'</h5>  </div></div>');
  
 }
});

}
 

function list(){
  
     $('.list').html(' ');
 $.get( "/get/list/"+{{$user['id']}}, function( ajax ) {
 
 for(var i=0; i<ajax.per_page; i++ ){
  data = ajax.data;
  me = '<li> <a class="dropdown-item" onclick="delete_reaction('+data[i].id+')">Delete Reaction</a></li> ';
 
  $('.lists_container').append( ' <div style="margin:2%; float: right" class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span style="color: #e8e8e8;" class="fas fa-ellipsis-h" ></span> </div> <div class="dropdown-menu"> <li> <a href="/list/'+data[i].id+'" class="dropdown-item" >View List</a></li> <li> <a class="dropdown-item" onclick="copy_link( '+data[i].id+',list)">Save List</a></li> '+me+' </div> <div class="list_thumbnail" ><h2> '+data[i].title+' </h2><h4> '+data[i].listentries_count+' Items <span>public</span> </h4><p>Updated '+data[i].updated_at +' </div> ');
  
 }
});
}


function follower(id){
$('#followers').html(' ');

   $.get( '/get/follower/'+id, function( data ) {
 
 $('#followers').append(' <h2> {{$user["name"]}}\'s Followers </h2>' );
      for(var i=0; i<data.length; i++ ){

 $('#followers').append('   <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 box"><header2><div class="vv"><canvas style="background-image: url('+data[i].header+');" class="img-responsive header-bg" width="" height="70" id="header-blur"></canvas><div class=""></div></div><div class="avatarcontainer"><a href="/user/'+data[i].id+'" ><img src="'+data[i].picture+'" alt="avatar" height="50px" height="50px" class="av img-circle "></a></div></header2><div style="margin-top: 5%; padding: 5%" class="content"><button  onclick="follow('+data[i].id+')" type="button" class="cursor btn btn-success -lg btn-block">Follow</button></div></div>');
         
          }
        
              })  ;
}


function following(id){
  $('#following').html(' ');

    $.get( '/get/follower/'+id, function( data ) {
 
 $('#following').append(' <h2> {{$user["name"]}}\'s Following </h2>');
      for(var i=0; i<data.length; i++ ){

 $('#following').append('   <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 box"><header2><div class="vv"><canvas style="background-image: url('+data[i].header+');" class="img-responsive header-bg" width="" height="70" id="header-blur"></canvas><div class=""></div></div><div class="avatarcontainer"><a href="/user/'+data[i].id+'" ><img src="'+data[i].picture+'" alt="avatar" height="50px" height="50px" class="av img-circle "></a></div></header2><div style="margin-top: 5%; padding: 5%" class="content"><button  onclick="follow('+data[i].id+')" type="button" class="cursor btn btn-success -lg btn-block">Follow</button></div></div>');
         
          }
        
              })  ;
}

var results_type = '';
var query = '';
function groups(id){
  
 
 $.get( '/groups/get/ids', function( arr ) {
         groups_append(id, arr);
              })  ;

}

function groups_append(id, arr){
  $.ajax({
            type: 'GET',
            url: '/groups/get?'+query+''+results_type+'id={{$user["id"]}}&page=1',
 
            beforeSend: function() {
               
              $('.groups_container').html(' ');
        $('.groups_container').append("<img id='loader' src='img/big_ring.gif' >");
            },
            success: function(ajax) {
              var from = ajax.from;
              from++;
              $('#loader').remove();
              window.moviex_grp_current = ajax.current;
              window.moviex_grp_last_page = ajax.last_page;
       
           
              if(ajax.next_page_url !== null)
                    window.moviex_grp_next = '/groups/search?query='+query+results_type+'&page='+from;
               
 
             
              data = ajax.data;
              for(var i=0; i<ajax.per_page; i++){


              button = '<button data-id="'+data[i].group.id+'" onclick="join_group('+data[i].group.id+')" class="btn btn-sm btn-success" > Join this Group </button> ';
 



              $('.groups_container').append('<div class="row" > <div class="col-sm-3 col-lg-2 col-xs-4" > <img height="100" width="100" src="/'+data[i].group.picture+'" > </div> <div class="col-sm-9 col-lg-10 col-xs-8" > <h4> '+data[i].group.name+' </h4> <h6>'+data[i].group.bio+' </h6> <div class="row "> <div class="col-sm-6" >  '+button+'        <kdp> '+data[i].group.type+' </kdp> </div> <div class="col-sm-4 col-xs-1"></div> <div class="col-sm-2 col-xs-4">  </div> </div> </div> </div><hr>');
            }
            $('.groups_container').append('<div data-id= "" class="no_more_groups">  </div>');
        }

        });
}




function toggle(e, c){
	$('.transparent_btns').removeClass('active_btn_switcher');
	$(e).addClass('active_btn_switcher');
	$('.th').hide();
	$('.'+c).show();

}
function change_pic(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

             data = {
              image:   e.target.result
            };
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/profile/update_picturer',
    data: data,
    type: 'POST',
    beforeSend: function(){
      
    }, 
    success: function(d){
$('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
  
        
    }
    
});
        
      };
        reader.readAsDataURL(input.files[0]);
    }
}
   function change_header(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
           
             data = {
              header:   e.target.result
            }
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/profile/UpdateHeader',
    data: data,
    type: 'POST', 
    beforeSend: function(){
      
    }, 
    success: function(d){
       $('.twPc-bg').css('background-image', 'url('+data.header +')');
       $('.twPc-bg').hide();
       $('.twPc-bg').fadeIn(650);
        
    }
    
});
        }
        reader.readAsDataURL(input.files[0]);
    }
}
 
 function save_changes(){

  active = $('.stng_active').attr('data-indicator');
  var data = $('#edit_pr_form').serialize();

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/profile/update_info',
    data: data,
    type: 'POST',
    beforeSend: function(){
      $(this).html('<img src="/img/loadericong.gif"> ');
    }, 
    success: function(d){
  cehck('updates has been saved!');
        
    }
    
});


 }

 function link(){
  var data = {
      vendor:   $('.active_social').attr('data-id'),
      link: 'www.'+ $('.active_social').attr('data-id') + '.com/user/'+$('#link_input').val()
  }

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
  url: '/profile/add_link',
    data: data,
    type: 'POST',
    beforeSend: function(){
      $(this).html('<img src="/img/loadericong.gif"> ');
    }, 
    success: function(d){
  cehck('Link has been saved!');
        
    }
    
});
 }
 
 function check_length_user(e, title){
 
  if ( $.trim( $(e).val() ).length > 1 ){
     $('#'+title).replaceWith('   <button id="update_profile" onclick="save_changes()" style="float: right !important " class="btn float-right btn-success" >Update Profile</button>');
     $('#'+title).removeClass('disabled');
     $('#'+title).addClass('btn-success');
     

  } 

 }
 function delete_fav(e, div){

 $.get( "/favorites/delete/"+div, function( ajax ) {
    $('#fav'+div).fadeOut();
 });

}

 $(document).ready(function(){
     var url = window.location.href;
     url = url.split("/");
 if(url[5]) {
    window[url[5]]();
  
}


});
 


</script>