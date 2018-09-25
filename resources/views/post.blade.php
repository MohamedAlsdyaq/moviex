@extends('layouts.app')

@section('content')
<head>
<style type="text/css">
	.custom_container{
    padding: 0.003% 0 3% 0;
    margin: 5% auto 3% 25%;
    background-color: white;
    width: 50%;
}
	}
</style>
</head>





<div class="custom_container" >




</div>

<div id="user" style="float: ;" >




</div>

<script type="text/javascript">


function get_post(id){
if(id == null)
  return false;
var content = ' ';
  $.ajax({
    type: 'GET',
    url: '/post/get/'+id,
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
   content +='</div>  <div style="display:block; bottom: 0; margin-top:10px; padding:8px;" >'+liking+'<i  data-counter="'+data[i].likes.length+'" data-eligibility="'+eligibility+'" id="post_likes_counter'+data[i].id+'"> '+data[i].likes.length+'</i>    <i onclick="myFunction('+data[i].id+')"  style="float:right ; color: #e8e8e8;" class="dropbtn fa fa-ellipsis-h"></i>    </div> </figure><div id="myDropdown'+data[i].id+'" class="dropdown-content">  <a onclick="copy_link('+data[i].id+')" >Copy Link to Post</a>    <a onclick="block('+data[i].user.id+')"   >Block @'+data[i].user.name+'</a>    <a data-toggle="modal" data-target="#report_modal" onclick="report('+data[i].id+')" >Report Post</a></div > <div style="background-color: #fafafa;  padding: 1% 3% 1% 3%;border-top: 1px solid #dedede;" > <div id="comment-for'+data[i].id+'" ></div> <div id="comments_replies_for'+data[i].id+'" > '+comments+'</div> <br> <form id="comment'+data[i].id+'" >  <div class="input-group"> <input type="hidden" name="post" value="'+data[i].id+'"  > <input name="comment" id="comment_input'+data[i].id+'" class="form-control" maxlength="50" placeholder="Add a comment" type="text">  <span onclick="comment('+data[i].id+')" class="input-group-addon"> <i class="fa fa-send-o"></i></span> </form> </div> </div> </div>' ;

   $('.custom_container').append(content);

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
get_post({{$id}});
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
</script>

@endsection