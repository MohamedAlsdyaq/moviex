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
		.cursor{
  cursor: pointer;
}
	</style>

<script src="/js/group_controll.js"></script>

</head>
   <?php
  if(Auth::check())
    $class = 'cl';
  else
    $class = 'guest';
  ?>

<div  class="profile_container ">




<div style="background-image: url('/header.jpg')" class="header"></div>

<div class="col-sm-12 empty " >.</div>

<div class="account_info row" >
	<div class="col-sm-2 col-xs-4" >
		<img height="100" width="100" src="/av.png">
	</div>
	<div class="col-sm-3 col-xs-4 " >

		<h3 style="color:white" >{{$group['name']}} </h3>
		
		
			 @if( $subscribtion == 0)
   <button id="button_group{{$group['id']}}" onclick="join_group({{$group['id']}}, '', '')" id="follow_button" class="btn follow {{$class}} btn-success">Join</button>
    @endif
        	 @if( $subscribtion == 1)
 <button id="button_group{{$group['id']}}" onclick="leave_group({{$group['id']}}, '', '')"  class="btn custom_dark_btn {{$class}}  -">Leave</button>
         @endif
 
	

	</div>
</div>





</div>
<div class="white_section" >
<div class="tab">
  <button class="current_tab tablinks" onclick="change_section(event, 'activity')">Activity</button>
  <button class="tablinks" onclick="change_section(event, 'members')">members</button>
 
  <button class="tablinks" onclick="change_section(event, 'rules')">Rules</button>
</div>
</div>


<div class="app container">


<div class="row" > 
<div id="activity" class="common">
	 <div class="col-sm-1 col-md-1  col-xs-1" ></div>
<div  class="col-sm-7 col-md-7  col-xs-7  " > 
 @if(Auth::check() )
            @include('modules.post')
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
</div>




<div class="col-sm-4" > 

	<h4 class="panel- " >  About {{$group['name']}} </h4>
	<hr class="no_margin" >
	<p> {{$group['bio']}} <br>

 

	<h6> <small>  <span class="fa fa-map-marker fa-lg"></span></small>   Type: <small>{{$group['type']}} </small></h6>

	 

<h6>	<small><i class="fa fa-calendar fa-lg"></i> </small>  Created:<small>  {{$group['created_at']}}</small></h6>

<br>
 
<h4 class="panel- " >  Members  </h4>
 
 <hr class="no_margin" >
@foreach($group['groupentries'] as $key=>$entry)
	@if($key == 27)
		@break
	@endif()
	<a style="margin-right: 3% " href="/profile/{{$entry['user']['id']}}" > 
		<img data-toggle="tooltip" title="{{$entry['user']['name']}}!" style="float: left;" height="40" width="40" class="img-circle" src="{{$entry['user']['picture']}}">
	</a>

@endforeach()
</div>
</div>
<div id="members" style="display: none;" class="common" >

</div>
<div id="rules" style="font-family: Asap,sans-serif; display: none; width: 90%" class="common container" >

							<h2>Community Rules</h2>

							<h3 style="font-weight: bold;" >Moviex Community Guidelines</h3>

							Everything you need to know to be an awesome community member and leader within our community can be found here. This should help you navigate the dos and don’ts of Moviex.
							<hr>

							<h2>How to behave on Moviex</h2>
							<h4 class="custom_heading" >Civility </h4>
							<p>
							Treat each other respectfully. Of course there will be heated discussions and disagreements; that's normal human emotion interjecting itself into your very rational debate. You can still remain respectful and refrain from personal attacks or harassment. Attack the idea, not the person.
							<h4  class="custom_heading" >Self Expression</h4>
							<p>
							Be creative, exchange ideas, build and join groups around the things you care about, or just read along quietly if you prefer. You're welcome at Moviex so long as you adhere to the very basic rule of being civil. We believe in you. Don't make us tell Mom.
							<h4 class="custom_heading" >Harassment</h4>
							<p>
							Harassment is behavior directed at a specific person that causes substantial emotional distress and serves no legitimate purpose. Do not engage in or provide a platform for harassment of users or groups. Harassment will not be tolerated.

							<h4 class="custom_heading" >Privacy Violations</h4>
							<p>
							Do not post your own or other people's private information, which includes but is not limited to real names, addresses, phone numbers, email addresses, and nonconsensual sexualized images or media (often referred to as “revenge porn”). We are against doxxing regardless of how awful you may think a person is. It can lead to dangerous real life situations and unnecessary legal consequences. Doxxing is a form of harassment, and we're not cool with it.
							<h4 class="custom_heading" >Malicious Speech</h4>
							<p>
							Don't encourage violence or hatred on the basis of things like race, ethnic origin, religion, disability, gender, age, veteran status, sexual orientation, or any other characteristics. We encourage you to dismantle negative speech through discussion rather than censorship.

							You're still welcome to express your opinions, even if they are offensive to some users. We want honest and open discussion to happen on Moviex from all sides. However, these opinions cross the line into malicious speech when they specifically incite violence or hatred, or make people fear you will act against them in a violent manner. We reserve the right to flush anything overtly malicious right down our digital toilet.
							<h4 class="custom_heading" >Harm to Minors</h4>
							<p>
							Be thoughtful when posting anything involving a minor. Don't post or solicit anything relating to minors that is sexually suggestive or violent. Don't bully or harass minors, even if you are one.
							<h4 class="custom_heading" >Promotion or Glorification of Self-Harm </h4>
							<p>
							Do not post content that actively promotes or glorifies self-harm. This includes content that urges or encourages others to: cut or injure themselves; embrace anorexia, bulimia, or other eating disorders; or commit suicide. Online communities can be extraordinarily helpful to people struggling with these difficult conditions, and we welcome communities on these topics that do not actively encourage this kind of behavior. We believe in facilitating awareness, support and recovery.

							<h4 class="custom_heading" >Gore, Mutilation, Bestiality, or Necrophilia </h4>
							<p>
							Don't post the mutilation, torture, or abuse of human beings, animals, or their remains.
							<h4 class="custom_heading" >NSFW Content</h4>
							<p>
							Moviex is home to a diverse population with different standards and needs. Please label not safe for work content accordingly. NSFW content is, in general terms, content that may be inappropriate in a professional environment, including images that are sexually suggestive or contain nudity, news photos or videos that have potentially upsetting or graphic content, excessive explicit language in videos, etc. This allows users to simply scroll past the NSFW content and still allow you the freedom to post it without conflict.
							<h4 class="custom_heading" >Terrorism </h4>
							<p>
							The support of terrorist groups, their propaganda, or recruiting efforts on Moviex is prohibited. We encourage political discourse and a wide breadth of opinions, but not the use of violence and intimidation in the pursuit of political aims.
							<h4 class="custom_heading" >Vote Manipulation
							<p>
							Do not engage in behaviors to drive up artificial traffic or popularity of content. Conversely, do not create artificial opposition to content.
							Deceptive or Fraudulent Links
							<p>
							Don't post deceptive or fraudulent links in your posts. This includes giving links misleading descriptions, putting the wrong “source” field in a post, or embedding links to interstitial or pop-up ads.
							<h4 class="custom_heading" >Group Name Squatting
							<p>
							Group names are a key part of creating a common identity, and we want everyone to be able to get access to the names that suit them best. Please only create communities that you plan on actively participating in so that others can use those names if you will not. Do not squat on Group names.
							<h4 class="custom_heading" >Spam
							<p>
							Sending or posting spam is not allowed. Spam is defined as the use of electronic messaging systems to send unsolicited messages, especially advertising, as well as sending or posting messages or links repeatedly on the same site.
							<h4 class="custom_heading" >Confusion or Impersonation
							<p>
							Don't do things that would cause confusion between you, your community, and a person or company. Satire and parody are acceptable, but you cannot misrepresent yourself as a different person or company.
							<h4 class="custom_heading" >Unlawful Use
							<p>
							Illegal behavior, including but not limited to fraud, phishing, promoting harm to minors, or inciting violence is not acceptable and will result in termination of your account/s.
							<h4 class="custom_heading" >Copyright/Trademark Infringement
							<p>
							Don’t infringe the copyright or trademark of others. If you don’t have the right to use the copyright or trademark owned by someone else, don’t post it on Moviex. We respond to notices of alleged copyright infringement as per the Digital Millennium Copyright Act.
							<h4 class="custom_heading" >Violations </h4>
							<p>
							Any user found violating any of these rules, may be punished at the sole discretion of Moviex through any of the following means: permanent removal from Moviex, partial removal, temporary removal, and/or removal of functionality. Please don’t violate these rules. That’s not fun for anyone.

</div>

</div>

</div>

</div>

<script type="text/javascript">
	
function get_post(id){
if(id == null)
  return false;
var content = ' ';
  $.ajax({
    type: 'GET',
    url: '/group/retrive_posts/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    beforeSend: function(){
      $('#'+id).html('<div class="col-sm-12 col-md-12_4-u2 mbm _2iwp _4-u8" > <div class="_2iwo" data-testid="fbfeed_placeholder_story"> <div class="_2iwq"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div> </div></div>');

    },
    success: function(ajax) {
      $('#'+id).html(' ');
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
      content += '<div id="post_s"> <figure id="post'+data[i].id+'"><div class="post_container  col-xs-12" > <div style="padding:-3%;" ><img class="img-circle" style="float:left ; margin-right:4px; " src="'+data[i].user.picture+'" height="40" width="40" ><div style="float:left" ><a href="/profile/'+data[i].user.id+'" >'+data[i].user.name+' </a><span > - '+formatDate(data[i].created_at) +'</span></div><br>    <h6></h6></div> ';
     var imgs = '  ';
     var modals = ' ';
        if(data[i].postcontents.length > 0){
            modals = ' <div class="modal fade and carousel slide" id="lightbox">    <div class="modal-dialog">      <div class="modal-content">        <div class="modal-body">          <ol class="carousel-indicators">';
            imgs = '<div class="view_grid_'+data[i].postcontents.length+'" > ';
  for(j=0; j<data[i].postcontents.length; j++){
            active = 'active';
            if(j != 0)
              active = ' ';
modals += ' <li data-target="#lightbox" data-slide-to="'+j+'" class="'+active+'"></li>       ';
}
modals += '</ol> <div class="carousel-inner">';
          for(j=0; j<data[i].postcontents.length; j++){
 
            if(j == 4){
              imgs += '<div style="float:left; nargin: 3px; cursor: pointer;   width: 33%;   max-width: 30%;height: 124px;background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)) repeat scroll 0% 0%, rgba(0, 0, 0, 0) url(/'+data[i].postcontents[j].content+')"   class="post_img_more" > <h1 style="color:white; vertical-align: center; margin-top: 50px; text-align: center; " >+'+data[i].postcontents.length+' </h1> </div>'
            }
            else
             imgs += '<img href="#lightbox" data-toggle="modal" data-slide-to="'+j+'" class="img-responsive cursor " id="img'+j+'" src="/'+data[i].postcontents[j].content+'" > ';
  modals += ' <div class="item active"> <img src="/'+data[i].postcontents[j].content+'" alt="'+j+'st slide">            </div>'
          }
        modals += '     </div>    <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">            <span class="glyphicon glyphicon-chevron-left"></span>          </a>          <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">            <span class="glyphicon glyphicon-chevron-right"></span>          </a></div></div></div></div>';

          imgs += '</div>';
        }
    if(data[i].spoiler == 1 && data[i].ep_id >= $('#write_on_me').val()){

    content += '<div id="spoiler'+data[i].id+'" class="spoilered" > <h5 style="margin:4px;" >'+data[i].content+'</h5>'+imgs+' </div> <div id="spoiler'+data[i].id+'" onclick="spoiler(this,  spoiler'+data[i].id+' )" class="spoiler_alert" ><span   class="fa fa-2x fa-eye-slash" ></span> <h4>This Post Contains Spoiler! </h4></div>'; 

    }else{
    content += '<h5 style="margin:4px;" >'+data[i].content+'</h5> '+imgs + modals;
    console.log(modals) 
   

    }
     liking = ' <i data-id="'+data[i].id+'" onclick="like('+data[i].id+', `post`)" style="color:red;float:left; margin: 4px;" class="fa heart fa-heart-o">like</i>';

if($('#my_id').val() != null){
  
    for(k=0; k<data[i].likes.length; k++){
      console.log(data[i].likes[k].user_id);
      console.log($('#my_id').val() );
      if($('#my_id').val() == data[i].likes[k].user_id){
         liking = '<i onclick="unlike('+data[i].id+', `post`)" style="color:red; float:left" class="fa fa-heart">unlike</i> ';
    liked = true;
    break;
  }
  else{
        console.log('none');
    }
  }
}
 comments = '';
if(data[i].comments.length >= 3)
  comments = '   <p style="color: #276080;cursor: pointer;" onclick="all_comments('+data[i]+' )" > View all comments  '

comments += display_comments(data[i], 3);
 eligibility = 1;
  for(j=0; j<data[i].likes.length; j++){
    if(data[i].likes[j].user_id == {{Auth::user()->id}})
      eligibility = 0;

    break;
  }
   content +='</div>  <div style="display:block; bottom: 0; margin-top:10px; padding:8px;" >'+liking+'<i  data-counter="'+data[i].likes.length+'" data-eligibility="'+eligibility+'" id="post_likes_counter'+data[i].id+'"> '+data[i].likes.length+'</i>    <i onclick="myFunction('+data[i].id+')"  style="float:right ; color: #e8e8e8;" class="dropbtn fa fa-ellipsis-h"></i>    </div> </figure><div id="myDropdown'+data[i].id+'" class="dropdown-content">  <a onclick="copy_link('+data[i].id+')" >Copy Link to Post</a>    <a onclick="block('+data[i].user.id+')"   >Block @'+data[i].user.name+'</a>    <a data-toggle="modal" data-target="#report_modal" onclick="report('+data[i].id+')" >Report Post</a></div > <div style="background-color: #fafafa;margin: 0% -1.2% 0 -1%; padding: 1% 3% 1% 3%;border-top: 1px solid #dedede;" > <div id="comment-for'+data[i].id+'" ></div> <div id="comments_replies_for'+data[i].id+'" > '+comments+'</div> <br> <form id="comment'+data[i].id+'" >  <div class="input-group"> <input type="hidden" name="post" value="'+data[i].id+'"  > <input name="comment" id="comment_input'+data[i].id+'" class="form-control" maxlength="50" placeholder="Add a comment" type="text">  <span onclick="comment('+data[i].id+')" class="input-group-addon"> <i class="fa fa-send-o"></i></span> </form> </div> </div> </div>' ;

   $('#posts_loading').append(content);

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

  function display_comments(data, pivot){
    comment = '';
    for(j=0; j< data.comments.length; j++){
  if(data.comments[j].user.id == {{Auth::user()->id}})
    me =  '<li> <a class="dropdown-item" onclick="delete_comment('+data.comments[j].id+')">Delete Comment</a></li> ';
  else
    me = '';
if(j == pivot)
  break;
 eligibility = 1;
 console.log(data.comments[j].likes.length);
 like = ' <i  id="comment_like'+data.comments[j].id+'" data-id="'+data.comments[j].id+'" onclick="like('+data.comments[j].id+', `comment` )" style="float:left; margin: 4px;" class="fa heart fa-heart-o">like</i> ';
  for(k=0; k<data.comments[j].likes.length;k++){
    if(data.comments[j].likes[k].user_id == {{Auth::user()->id}})
      eligibility = 0;
    like = ' <i  id="comment_like'+data.comments[j].id+'" data-id="'+data.comments[j].id+'" onclick="unlike('+data.comments[j].id+', `comment` )" style="color:red;float:left; margin: 4px;" class="fa heart fa-heart">unlike</i> ';
       break;
  }
comment += '<div> <img width="30" height="30" src="'+ data.comments[j].user.picture+'">  <a href="/profile/'+ data.comments[j].user.id+'" > '+ data.comments[j].user.name+'</a> '+data.comments[j].content+'<br> <span style="float:left; margin: 4px;" > '+like+'<i  data-counter="'+data.comments[j].likes.length+'" data-eligibility="'+eligibility+'" id="comment_likes_counter'+data.comments[j].id+'"> '+data.comments[j].likes.length+'</i> </span>   <div style="margin-left:5%; float: left" class="  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span style="color: #e8e8e8;" class="fas fa-ellipsis-h" ></span> </div> <div class="dropdown-menu"> <li> <a class="dropdown-item" onclick="copy_link( '+data.comments[j].id+',comment)">Copy Comment link</a></li> <li> <a data-toggle="modal" data-target="#report_modal" class="dropdown-item" onclick=" report( '+data.comments[j].id+'); document.getElementById("modal_dest").value = "comment" ">Report comment</a></li> '+me+' </div></div> <br> <br> <hr style="margin: -17px 0 4px 0;">'
}
return comment;
  }

get_post({{$group['id']}});

function members(){
$.get( '/get/follower/ids', function( data ) {
	var arr = data;  following({{$group['id']}}, arr);   })  ;

}

function following(id, arr){
  $('#members').html(' ');

    $.get( '/group/users/'+id, function( data ) {
console.log(data);
  
      for(var i=0; i<data.length; i++ ){
 button = '<button id="follow'+data[i].user.id+'" onclick="follow('+data[i].user.id+')" type="button" class="cursor btn btn-success -lg btn-block">Follow</button>';
if(arr.includes(data[i].user.id)){
button = '<button id="unfollow'+data[i].user.id+'" onclick="unfollow('+data[i].user.id+')" type="button" class="btn cursor   unfollow  - btn-block">Unfollow</button>';
}
 $('#members').append('   <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 box"><header2><div class="vv"><canvas style="background-image: url('+data[i].user.header+');" class="img-responsive header-bg" width="" height="70" id="header-blur"></canvas><div class=""></div></div><div class="avatarcontainer"><a href="/user/'+data[i].user.id+'" ><img src="'+data[i].user.picture+'" alt="avatar" height="50px" height="50px" class="av img-circle "></a></div></header2><div style="margin-top: 5%; padding: 5%" class="content">'+button+'</div></div>');
         
          }
        
              })  ;

}
</script>
@endsection 