@extends('layouts.app')

@section('content')
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

  <div id="edit" class="w3-modal">
    <div id="edit_content"  class="w3-modal-content">
     
      <div class="w3-container">
        <div class="twPc-div">
    <a class="twPc-bg twPc-block">
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
            <i class="fa fa-pencil" ></i>            </label>
        </div>
        <div class="avatar-preview">
            <div class="twPc- " id="imagePreview" style="background-image: url();">
            </div>
        </div>
    </div>
		 
		</a>

		<div class="edits twPc-divUser">
			 <div class=" w3-container">
  
<div class="w3-bar edit_bar">
  <button onclick="change_setting_section(event, 'about')" class="w3-bar-item btn  btn-link stng_active edit_btn">About Me</button>
  <button onclick="change_setting_section(event, 'links')" class="w3-bar-item btn  btn-link edit_btn">Profile Links</button>
  <button onclick="change_setting_section(event, 'favorites')" class="w3-bar-item btn  btn-link edit_btn">Favorites</button>

      
  
</div>
</div>
		</div>

 
	</div>

<div id="about" class="common2">
	<h2> About Me</h2>

	  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Location</label>
    <div  class="col-sm-8">
       <input placeholder="Where do you live?" type="text" name="location" class="form-control">
    </div>
  </div>

  	  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Birthdate</label>
    <div  class="col-sm-8">
       <input placeholder="Where do you live?" type="date" name="birthday" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label col-form-label-lg">Bio</label>
    <div class="col-sm-8">
      <textarea name="bio" style="; resize: none" class="form-control"  rows="3"></textarea>
    </div>
  </div>

</div>

<div id="links" class="common2" style="display: none" >
	<h2>Profile Links</h2>
	<div id="social-icons">
<img style="float: left" src="/48/Youtube-Icon.png">
<img style="float: left" src="/48/Twitter-Icon.png">
<img style="float: left" src="/48/Deviantart-Icon.png">
<img style="float: left" src="/48/Flickr-Icon.png">
<img style="float: left" src="/48/facebook-Icon.png">
<img style="float: left" src="/48/Evernote-Icon.png">
<img style="float: left" src="/48/Myspace-icon.png">
<img style="float: left" src="/48/Linkedin.png">
<img style="float: left" src="/48/Instagram-Icon.png">
<img style="float: left" src="/48/Google-plus-icon.png">
<img style="float: left" src="/48/Path-Icon.png">
<img style="float: left" src="/48/Youtube-Icon.png">
<img style="float: left" src="/48/Tumblr-Icon.png">
<img style="float: left" src="/48/Soundcloud-Icon.png">
<img style="float: left" src="/48/Wordpress-Icon.png">
<img style="float: left" src="/48/Reddit-Icon.png">
<img style="float: left" src="/48/Quora.png">
<img style="float: left" src="/48/Blogger-Icon.png">
<img style="float: left" src="/48/Github-Icon.png">
<img style="float: left" src="/48/Pinterest-Icon.png">
<img style="float: left" src="/48/Vimeo-Icon.png">
<img style="float: left" src="/48/Email-Icon.png">
<img style="float: left" src="/48/Share-Icon.png">
</div>
 <h6 style="visibility: hidden; line-height: 50px;" >.</h6>
 <h3> External Source </h3>
<p>Enter your Reddit username below to add a link to your profile.
	<input type="text" name="link" class="form-control" >


</div>


<div  id="favorites" class="common2" style="display: none" > 
<h2> Favorites </h2>
<p> Set your favorite shows</p>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Movies</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Series</a>
  </li>
  
</ul>
 <h3>  Search</h3>
      <div id="searchfield">
        <form><input placeholder="Search a show by its name.." type="text" name="currency" class="biginput" id="autocomplete"></form>
      </div> 
</div>


</div>
      </div>
      <footer style="width: 70%; padding: 10px; border-top: 1px solid grey;" class="w3-container w3-">
         <p class="v_small">Visit your <a href="/setting/account" >settings </a> page to change your username, email, notification settings, and more.
         	<button style="float: right !important " class="btn float-right btn-success" >Update Profile</button>
      </footer>
    </div>
  </div>


<div  class="profile_container ">




<div style="background-image: url('/header.jpg')" class="header"></div>

<div class="col-sm-12 empty " >.</div>

<div class="account_info row" >
	<div class="col-sm-2 col-xs-4" >
		<img height="100" width="100" src="/av.png">
	</div>
	<div class="col-sm-3 col-xs-4 " >

		<h3 style="color:white" >Name </h3>
		
		<button type="button" class="btn btn- btn- btn-success"> Follow  </button>
		<button onclick="document.getElementById('edit').style.display='block'" type="button" class="btn btn-outline-dark   "> edit  </button>
	</div>
</div>





</div>
<div class="white_section2" >
<div class="tab">
<button class="current_tab tablinks butons" onclick="change_section(event, 'activity')">Activity</button>

<button class="tablinks butons" onclick="change_section(event, 'library')">Library</button>

<button class="tablinks butons" onclick="change_section(event, 'reaction')">Reactions <span class="badge">5</span> </button>

<button class="tablinks butons" onclick="change_section(event, 'lists')">Lists</button>

<button class="tablinks butons" onclick="change_section(event, 'followers')">Followers <span class="badge">5</span></button>

<button class="tablinks butons" onclick="change_section(event, 'following')">Following <span class="badge">5</span></button>
<button class="tablinks butons" onclick="change_section(event, 'groups')">Groups </button>
</div>
</div>

<div class="app container">


<div class="row" > 
	<div id="activity" class="common" >
<div class="col-sm-8 col-md-8  col-xs-8"> 

	@include('modules.post')

<br><br>
<div class="col-sm-12 col-md-12 _4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
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

<div class=" ">
<div class=" ">
 
<!-- code start -->


<!-- code end -->
</div>
</div>


	</div>

<div class="col-sm-4 col-md-4 col-xs-4"> 

	<h4 class="panel-heading" >  About Me </h4>
	<hr class="no_margin" >
	<p> Lorem ipsum <br>

	<h6> <small>  <span class="fa fa-venus-mars fa-lg"></span> </small> Gender:  <small>Female </small></h6>

	<h6> <small>  <span class="fa fa-map-marker fa-lg"></span></small>   Location: <small>127.0.0.1 </small></h6>

	<h6> <small> <i class="fa fa-birthday-cake fa-lg" aria-hidden="true"></i>
	</small> Birthdate: <small> its a secret. </small></h6>

<h6>	<small><i class="fa fa-calendar fa-lg"></i> </small>  joining data:<small>  18-mar 2018</small></h6>

<br>
<h4 class="panel-heading" > Favorite Shows </h4>
<button  onclick="toggle(this, 'thumnail_movies')" class="btn  transparent_btns  active_btn_switcher" >Movies</button>
 <button  onclick="toggle(this, 'thumbnail_series')" class="btn transparent_btns " >Series</button>
<hr style="margin-top: -2px;" >

<div class="th thumnail_movies" >
 <img class="thumbnail_poster" src="/3.jpg" > <img class="thumbnail_poster" src="/3.jpg" > <img class="thumbnail_poster" src="/3.jpg" > <img class="thumbnail_poster" src="/3.jpg" >
</div>

<div style="display: none;" class="th thumbnail_series" >
 <img class="thumbnail_poster" src="/3.jpg" > <img class="thumbnail_poster" src="/3.jpg" >
</div>

</div>


</div>


	<div id="library" style="display: none;" class="common" >
	

		<div class="col-sm-9 col-md-9 col-lg-9 col-xs-9" >
			<input height="50px;" type="text" name="" class="form-control" placeholder="Search this library..." >
			<div class="col-sm-2 col-xs-2">
<i class="fas fa-th"></i>  <i class="fas fa-align-left"></i>
			</div>

<div class="col-sm-6 col-xs-6 "></div>

<div class="col-sm-4 col-xs-4">
	<div class="col-xs-1" > </div>
<div class="col-xs-4" ><h6>Sort by</h6> </div>
<div class="col-xs-6" >
	<select class="select">
  <option >Title</option>
  <option>Rating</option>
  <option>Date Added</option>
  <option>Date Finished</option>
  <option>Date updated</option>
</select>
</div>


 </div>

<br>
			<div class="thumnail_library">

				
	<div id="lib_poster_container" > 

<div style="min-height: 170px; width:100%;" > . </div>
<span  onclick="document.getElementById('id01').style.display='block'"  class="anchors_for_poster btn-outline cursor  stat-item">
more
</span>

<a href="">
<span   class=" anchors_for_poster btn-outline cursor  stat-item">
<i class="far fa-arrow-alt-circle-right"></i>
</span>
</a>
	 </div>

	  <div  id="id01" class=" w3-modal">
	    <div style="max-width: 35%" class="w3-modal-content">
	      <div class="w3-container">
      <header class="w3-container w3-"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3- w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
        <hr>
      </header>

	       <div class="container" >
	       	<div class="form-group " >
	        
	       		<div >


	<form>
		 <fieldset style="border: none" disabled>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label>
    <div  class="col-sm-10">
        <select style="width: 20%" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Currently watching</option>
        <option value="1">Dropped</option>
       
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress</label>
    <div  class="col-sm-10">
      <select  style="width: 20%" class="custom-select  " id="inlineFormCustomSelect">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Rewatch Count</label>
    <div class="col-sm-10">
     <select style="width: 20%" class="custom-select  " id="inlineFormCustomSelect">
        <option selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Started Date</label>
    <div class="col-sm-10">
       <input  style="width: 20%" type="date"  class="form-control " >
    </div>
  </div>
    <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Finished Date</label>
    <div class="col-sm-10">
            <input style="width: 20%" type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Notes</label>
    <div class="col-sm-10">
      <textarea style="width: 20%; resize: none" class="" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  </div>

  		</fieldset>
</form>

	       		</div>
	       	</div>

	       </div>

	      </div>
	    </div>  
	  </div>

	<div id="#p" > <div class="loaded" ><div class="loaded2" >.</div>.</div> </div>
<h5 class="text-center"><small>ep1 <span class="library_rating right" > 3 </span><small><h5>
				
				</div>
		</div>

		<div class="col-sm-3 white_box col-md-3 col-lg-3 col-xs-4" >
			<select style="font-size: 15px;"  class="select custom_btns">
  <option class="custom_btns">Movies</option>
  
  <option class="custom_btns">Series</option>
</select>
			<button class="btn custom_btns btn-primary" >All </button>
			<button class="btn custom_btns btn-info" >Currently watching</button>
			<button class="btn custom_btns btn-success" >Watch-List</button>
			<button class="btn custom_btns btn-danger" >Dropped</button>

		</div>

	</div>



	<div id="reaction" style="display: none;" class="common" >
	
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 reaction_container" style="" >

<span   class="like_reaction cursor  stat-item">
<i class="fa fa-thumbs-up icon"></i>  57
</span>
                     
<i style=" float: right;" class="cursor fas fa-ellipsis-h fa-2x"></i>


<br>
<div class="reaction_info" >
	<p>Toy Story

	<span class="grey" >Movie - 2001 </span>
	<a href="" >	<h4>Expands on the same ninja world as Naruto but I've enjoyed seeing the old characters as adults  how their children take after each parent.
		</h4> </a>
</div>

		</div>

	</div>





	<div id="followers" style="display: none;" class="common" >
	
	<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 box">
	<header2>
	<div class="vv">
	<canvas style="background-image: url('/header.jpg');" class="img-responsive header-bg" width=""  height="70" id="header-blur"></canvas>
	<div class="desc">

	</div>
	</div>

	<div class="avatarcontainer">
	<img src="/av.png" alt="avatar" height="50px" height="50px" class="av img-circle ">

	</div>


	</header2>

	<div style="margin-top: 5%; padding: 5%" class="content">
	<button type="button" class="btn btn-success btn-lg btn-block">Follow</button>


	</div>

	</div>


	</div>
	<div id="following" style="display: none;" class="common" >
  
  </div>

  <div id="lists" style="display: none;" class="common" >
  <h2> User's Lists </h2>
  <div class="lists_container">
    <p style="color:white;  float: right;" > ...
  <div class="list_thumbnail" >

<h2><a href="">My super list </a></h2>
<h4> 24 Items <span>public</span> </h4>
<p>Updated 4 months ago
  </div>
</div>
  </div>

	<div id="groups" style="display: none;" class="common" >
	
	</div>
	
</div>
</div>




</div>

@endsection 

<script >
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
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
   function change_header(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.twPc-bg').css('background-image', 'url('+e.target.result +')');
            $('.twPc-bg').hide();
            $('.twPc-bg').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
 
</script>