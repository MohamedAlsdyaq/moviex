  function display_post(data){ // get_post() previousely 

//////console.log(data);
   window.moviex_global_indicator_spoiler = false;
   window.moviex_global_indicator_ep_count = data.ep_id ;
 
 content = ' ';
      content += '<div id="post_instance'+data.id+'" class="post_s"> <figure id="post'+data.id+'"><div class="post_container  col-xs-12" > <div style="padding:-3%;" ><img class="img-circle" style="float:left ; margin-right:4px; " src="'+data.user.picture+'" height="40" width="40" ><div style="float:left" ><a style="font-size: 16px;font-weight: 700;" href="/profile/'+data.user.id+'" >'+data.user.name+' </a><p class="time" style="  font-size: 12px; ;color: #999;">  '+formatDate(data.created_at) +' <br></div><br>    <h6></h6></div><br> ';
     var img = '<div class="gallery'+data.id+'" > </div>  ';
     var modals = ' ';
 
imgs = [];
        for(j=0; j<data.postcontents.length; j++){
          imgs.push(data.postcontents[j].content);
        }
thumb = ' ';

if(data.spoiler == 1){
if(data.show_id != null && data.ep_id != null){
  window.moviex_global_indicator_spoiler = 1;
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

     window.moviex_global_indicator_spoiler = JSON.parse(this.responseText  ) ;
    }
  };
  xhttp.open("GET", "/spoiler/check/"+data.show_id+"?ep="+data.ep_id, true);
  xhttp.send();
}
 
  }
 
  if(window.moviex_global_indicator_spoiler == 1){
 
    text = ' <div id="spoiler'+data.id+'" onclick="show_spoiler(this, `'+data.content+'`, 7, '+data.id+' )"  style="cursor:pointer; border-radius: 3px;background-color: #fafafa;border: 1px solid #eee; padding: 2% 2% 2% 2%; margin:2% auto; width: 100% !important;"   class=" show_thumnail  border-dark row col-xs-12" >  <p style="color: #9b9b9b;text-align:center;font-weight: 700;" > This Post contains spoilers. </div> <div style="display:none" class="picture_for'+data.id+'" > '+img +'</div>'; 

    }else{


    text = '<h5 style="margin:10px 0 15px 0;font-family: "Open Sans",sans-serif; font-weight:580; font-size:17px;" >'+data.content+'</h5> '+img  ;
   
   

    }
    
        if(data.show){
   if(data.show.show_type == 'movie'){
      t_type = 'movie';
      }
  if(data.show.show_type == 'tv'){
        t_type = 'tv';
    }
      t_name = data.show.show_name;
      t_id = data.show.id;
      t_bio = data.show.show_bio;
      t_pic = data.show.show_pic;


  
  }
if(data.movie || data.tv || data.show){

  if(data.movie){
    
  t_name = data.movie.show_name;
  t_bio = data.movie.show_bio;
   t_id = data.movie.id;
  t_pic = data.movie.show_pic;
  t_type = 'movie';
  }
  if(data.tv){
  t_name = data.tv.show_name;
    t_id = data.tv.id;
  t_bio = data.tv.show_bio;
  t_pic = data.tv.show_pic;
  t_type = 'tv';
  }

  thumb = '            <div  style="border-radius: 3px;background-color: #fafafa;border: 1px solid #eee; padding: 1% 2% 0 2%; margin:2% auto; width: 100% !important;"   class=" show_thumnail  border-dark row col-xs-12" >                <div style="float: left;">    <img style="max-width: 45px; margin: 4px;" id="" class="poster img-responsive "   src=" http://image.tmdb.org/t/p/w154'+t_pic+'">               </div>  <div style="float:left;width: 80%;">    <a style="color: #337ab7;text-decoration: none;" href="'+t_type+'/'+t_id+'">  <h4  style="font-size: 16px;font-weight: 700;margin: 3% 0.5% 0 2%;  float: left;" id="movie_title" >'+t_name+'</h4> </a> <br><br> <p  style="    margin-top: 2%;font-size: 12px;color: #999;" class="bio v_small grey" >'+t_bio+' (source:tmdb) </div>  </div>';

}
    content += text + thumb;
     liking = ' <i data-id="'+data.id+'" onclick="like_entry('+data.id+', `post`)" style="color:red;float:left; margin: 4px;" class="fa heart fa-heart-o">like</i>';

if($('#my_id').val() != null){
  
    for(k=0; k<data.likes.length; k++){
      
     
      if($('#my_id').val() == data.likes[k].user_id){
         liking = '<i onclick="unlike_entry('+data.id+', `post`)" style="color:red; float:left" class="fa fa-heart">unlike</i> ';
    liked = true;
    break;
  }
  else{
        
    }
  }
}
 comments = '';
if(data.comments.length >= 3)
  comments = '   <p style="color: #276080;cursor: pointer;" onclick="all_comments('+data+' )" > View all comments  '

 
 eligibility = 1;
  for(j=0; j<data.likes.length; j++){
    if(data.likes[j].user_id == $("#my_id").val())
      eligibility = 0;

    break;
  }
  actions = '  <a onclick="block('+data.user.id+')"   >Block @'+data.user.name+'</a>    <a   onclick="report('+data.id+', `post`)" >Report Post</a>';
  if(data.user.id == $("#my_id").val())
    actions = '<a onclick="delete_post('+data.id+', `post`)" >Delete Post</a>  '
   content +='</div>  <div style="display:block; bottom: 0; margin-top:10px; padding:8px;" >'+liking+'<i  data-counter="'+data.likes.length+'" data-eligibility="'+eligibility+'" id="post_likes_counter'+data.id+'"> '+data.likes.length+'</i>    <i onclick="myFunction('+data.id+')"  style="float:right ; color: #c2c2c2;font-size: 20px;" class="dropbtn fa fa-ellipsis-h"></i>    </div> </figure><div id="myDropdown'+data.id+'" class="dropdown-content"> <a onclick="copy_link('+data.id+')" >Copy Link to Post</a>   '+actions+'</div > <div style="overflow:hidden;background-color: #fafafa;margin: 0% -1.2% 0 -1%; padding: 1% 3% 1% 3%;border-top: 1px solid #dedede;" > <div class="comments" id="comment-for'+data.id+'"  data-comment='+data.id+' ></div> <div id="comments_replies_for'+data.id+'" >    <br> <form id="comment'+data.id+'" >  <div class="input-group"> <input type="hidden" name="post" value="'+data.id+'"  > <input name="comment" id="comment_input'+data.id+'" class="form-control" maxlength="50" placeholder="Add a comment" type="text">  <span onclick="add_comment('+data.id+')" class="input-group-addon"> <i class="fa fa-send-o"></i></span> </form> </div> </div> </div>' ;

 

 
return [content, imgs];

}


  function display_comments(id, pivot, target){
     $.ajax({
    type: 'GET',
    url: '/comment/get/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    beforeSend: function(){
      $(target).html('<img src="/img/loaderIco.gif" >');

    } }).done( function(data) {
comment = '';
if(data.length <= 0){
   $(target).html(' ');
}
for(j=0; j < data.length; j++){
    comment = '';
    for(j=0; j< data.length; j++){
  if(data[j].user.id == $("#my_id").val())
    me =  '<li> <a class="dropdown-item" onclick="delete_post('+data[j].id+', `comment`)">Delete Comment</a></li> ';
  else
    me = '';
if(j == pivot)
  break;
 eligibility = 1;

 like = ' <i  id="comment_like'+data[j].id+'" data-id="'+data[j].id+'" onclick="like_entry('+data[j].id+', `comment` )" style="float:left; margin: 4px;" class="fa heart fa-heart-o">like</i> ';
  for(k=0; k<data[j].likes['length'];k++){
    if(data[j].likes[k].user_id == $("#my_id").val())
      eligibility = 0;
    like = ' <i  id="comment_like'+data[j].id+'" data-id="'+data[j].id+'" onclick="unlike_entry('+data[j].id+', `comment` )" style="color:red;float:left; margin: 4px;" class="fa heart fa-heart">unlike</i> ';
       break;
  }
reply = ' ';
  r = display_reply(data[j].replies, 100, data[j].id);
 //console.log(r.length);
   if(r.length > 0){
      reply = '<div class="col-xs-12 replies_container" id="reply_for'+data[j].id+'" > '
 for(n=0; n<r.length; n++){
  reply += r[n];
 }
 reply += '</div>';
   }

  
comment += '<div id="comment_instance'+data[j].id+'" class="col-xs-12" > <img width="30" height="30" src="'+ data[j].user.picture+'">  <a href="/profile/'+ data[j].user.id+'" > '+ data[j].user.name+'</a> '+data[j].content+'<br> <div style="margin: 5px; height:25px" ><span style="float:left;  " > '+like+'<i  data-counter="'+data[j].likes['length']+'" data-eligibility="'+eligibility+'" id="comment_likes_counter'+data[j].id+'"> '+data[j].likes['length']+'</i> </span>     <span style="cursor:pointer;float: left; margin-left:5px" onclick="format_reply('+data[j].id+')"   > Reply </span> <span style="float: left; margin-left:5px"  class="time" > '+formatDate(data[j].created_at)+' </span>   <div style="float: left; margin-left:5px"  class="  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span style="color: #e8e8e8;font-size: 27px" class="fas fa-ellipsis-h" ></span> </div> <div class="dropdown-menu"> <li> <a class="dropdown-item" onclick="copy_link( '+data[j].id+',comment)">Copy Comment link</a></li> <li> <a   class="dropdown-item" onclick=" report( '+data[j].id+', `comment`);    ">Report comment</a></li> '+me+'</div></div> '+reply+'<div id="reply_add'+data[j].id+'" >   </div> </div></div>   ';
}

$(target).html(comment);
}
}).fail(function ( ) {
    $(target).html(' ');
});

  } //end func
  function display_reply(replies, pivot, parent_comment){
  
 
    arr = [];
    if(replies.length <= 0)
      return 0;


    for(k=0; k< replies.length; k++){
  if(replies[k].user.id == $("#my_id").val())
    me_r =  '<li> <a class="dropdown-item" onclick="delete_post('+replies[k].id+', `reply`)">Delete reply</a></li> ';
  else
    me_r = '';
if(k == pivot)
  break;
 eligibility = 1;

 like = ' <i  id="reply_like'+replies[k].id+'" data-id="'+replies[k].id+'" onclick="like_entry('+replies[k].id+', `reply` )" style="float:left; margin: 4px;" class="fa heart fa-heart-o">like</i> ';
  for(n=0; n<replies[n].likes['length'];n++){
    if(replies[k].likes[n].user_id == $("#my_id").val())
      eligibility = 0;
    like = ' <i  id="reply_like'+replies[k].id+'" data-id="'+replies[k].id+'" onclick="unlike_entry('+replies[k].id+', `reply` )" style="color:red;float:left; margin: 4px;" class="fa heart fa-heart">unlike</i> ';
       break;
  }
  
arr.push( '<div id="reply_instance'+replies[k].id+'" class="col-xs-12" > <img width="30" height="30" src="'+ replies[k].user.picture+'">  <a href="/profile/'+ replies[k].user.id+'" > '+ replies[k].user.name+'</a> '+replies[k].content+'<br> <div style="margin: 5px; height:25px" ><span style="float:left;  " > '+like+'<i  data-counter="'+replies[k].likes['length']+'" data-eligibility="'+eligibility+'" id="reply_likes_counter'+replies[k].id+'"> '+replies[k].likes['length']+'</i> </span>     <span style="cursor:pointer;float: left; margin-left:5px" onclick="format_reply('+replies[k].id+', &quot;'+replies[k].user.name+'&quot;, '+parent_comment+', `reply`)"   > Reply </span> <span style="float: left; margin-left:5px"  class="time" > '+formatDate(replies[k].created_at)+' </span>   <div style="float: left; margin-left:5px"  class="  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span style="color: #e8e8e8;font-size: 27px" class="fas fa-ellipsis-h" ></span> </div> <div class="dropdown-menu"> <li> <a class="dropdown-item" onclick="copy_link( '+replies[k].id+',`reply`)">Copy Reply link</a></li> <li> <a   class="dropdown-item" onclick=" report( '+replies[k].id+', `reply`);  ">Report Reply</a></li> '+me_r+'</div></div>  <div id="reply_add'+replies[k].id+'" >   </div> </div>   ');
}
return arr ;
  }
function format_reply( id , name, parent_comment, type='comment'){
  if(type == 'reply'){
    name = '@'+name;
    id = parent_comment;
  }
  else 
    name = '';
  $('#reply_add'+id).html('<form id="reply'+id+'" ><div class="input-group"><input name="type" value="'+type+'" type="hidden"> <input name="comment" value="'+id+'" type="hidden"> <input name="reply" id="reply_input'+id+'" class="form-control" maxlength="50" placeholder="Add a reply.." type="text" value="'+name+' " >  <span onclick="add_reply('+id+', &quot;'+type+'&quot;)" class="input-group-addon"> <i class="fa fa-send-o"></i></span>  </div></from>')
}
function add_reply(e, type){
 var data = $('#reply'+e).serialize();
 //console.log(e);

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/reply/create',
    data: data,
    type: 'POST',
    beforeSend: function(){
      $('#reply_for'+e).append('<img class="loader"src="/img/loaderIco.gif">');
         }, 
    success: function(d){
            $('#reply').val('');
            $('.loader').hide();
            $('#reply_for'+e).append( '<div> <img width="30" height="30" src="">  <a href="/profile/$("#my_id").val() " >  </a> '+$('#comment_input'+e).val()+'<br> <span id="like" style="float:left; margin: 4px;" >  <i data-id="" onclick="likeComment(this,  )" style="float:left; margin: 4px;" class="fa heart fa-heart-o"></i> 0 </span>    </div> <br> <br>')
      check('reply has been sent!');

    }
    
}); // end $.ajax()
}
function show_spoiler(e, content, image, data){
thumb = thumnail(thumb);

var img = '<div class="gallery'+data+'" > </div>  '
    $('#spoiler'+data).replaceWith('<h5 style="margin:10px 0 15px 0;font-family: "Open Sans",sans-serif; font-weight:580; font-size:17px;" >'+content+'</h5> ');
     $('.picture_for'+data).show();
   }
function thumnail(data){

 return ' '; 
}

function add_comment(e){
  var data = $('#comment'+e).serialize();
//////console.log(data);

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/comment/create',
    data: data,
    type: 'POST',
    beforeSend: function(){
         }, 
    success: function(d){
            $('#comment').val('');
            $('#comment-for'+e).append( '<div> <img width="30" height="30" src="">  <a href="/profile/ " >  </a> '+$('#comment_input'+e).val()+'<br> <span id="like" style="float:left; margin: 4px;" >  <i data-id="" onclick="likeComment(this,  )" style="float:left; margin: 4px;" class="fa heart fa-heart-o"></i> 0 </span>    </div> <br> <br>')
      check('Comment has been sent!');
    }
    
}); // end $.ajax()
 

} 
     function delayKeyup (callback, ms){
        var timer = 0;
        $(this).keyup(function(){                   
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        });
        return $(this);
    } 
function get_year(e){
  e = e.split("-");
  return e[0];
}
function ss(i, e){
$(e).replaceWith('<div style="margin-bottom:7px; padding-bottom:7px;"  onclick="less('+i+', this)" >  <h4  class="text-center "  > Show Less </h4> </div>');
$("#post"+i).css('height', 'auto');

}
function less(i, e){
  //////console.log('less' + i);
$(e).replaceWith('<div style="margin-bottom:7px; padding-bottom:7px;"  onclick="ss('+i+', this)" >  <h4  class="text-center "  > Show More </h4> </div>');
$("#post"+i).css('height', '200px');

}
function spoiler(e, i){
  $(i).removeClass('spoilered');
    //////console.log(i);
 
    $(e).remove();
}
function go_to_page(href){
 
   if (this.currentTarget == this)
    return;
    window.location = href;
}
function NavSearch(){
    $('.navs').hide();
    $('#search_container').css('width', '350px;');
}
   $('.search').mouseleave(function(e){
  alert('g');
     $('.navs').fadeIn();
   });   

function up(e) {
  max = $(e).attr('data-limit');
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) {
        document.getElementById("myNumber").value = max;
    }
}
function down(min) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) {
        document.getElementById("myNumber").value = min;
    }
}

function check(text) {

    toastr["success"]('<h5>'+text+'</h5>');
                
    }
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function danger(text) {

    toastr["warning"]('<h5>'+text+'</h5>');
                
    }
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function info(text) {

    toastr["info"]('<h5>'+text+'</h5>');
                
    }
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function limit(e){
  var name = $(e).attr('data-name');

    var tval = $(e).val(),
        tlength = tval.length,
        set = 140,
        remain = parseInt(set - tlength);
    $('#'+name).text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $(e).val((tval).substring(0, tlength - 1))
    }
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction(i) {
    document.getElementById("myDropdown"+i).classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 


function link_img_click(e){
  $('.active_social').removeClass('active_social');
  $(e).addClass('active_social');

  $('#indicator').html('Enter your '+$(e).attr('data-id')+' username below to add a link to your profile.');
  $('#link_input').attr('placeholder', 'Your'+$(e).attr('data-id')+ ' username');





 }



function quick_post(text, id, ep, sid){

 
 
var data = { 
    ep_id: ep,
    post : text,
    spoiler: $('#quick_spoiler_check'+id+':checkbox:checked').length,
    movie_id: sid,
    show_type : 'tv'
    }     
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/post/create',
    data: data,
    type: 'POST',
    beforeSend: function(){
       $('#increment_btn'+id).replaceWith('<button disabled  id="increment_btn'+id+'"  class="disabled btn btn-sm btn-success" ><img src="/img/loadericon.gif" >  </button>');   
   
    }, 
    success: function(d){
    $('#post_a_post').replaceWith('<button id="post_a_post" onclick="react(this)" style="float: right" class="btn btn-success" >Post Reaction</button>');
    $('#exampleFormControlTextarea1').val('');
    $('.creat_post_content').hide();
    $('#tolol').show();
    //////console.log(window.arr_uploaded_images_moviex);
    //////console.log(d);
    document.getElementById('reaction').style.display='none';
    check('Post has been posted!');
        
    }
    
}); // end $.ajax()


 
}


function post(){


imgs = null;

var post = $('#exampleFormControlTextarea1').val();
var data = {
        imgs: window.arr_uploaded_images_moviex,
    post: post,
    ep_id: $('#myNumber').val(),
    spoiler: $('#checkbox6:checkbox:checked').length,
    movie_id: $('.movie_id').val(),
    group_id : $('#group_id').val(),
    show_type : $('.movie_id').val()
    }     
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/post/create',
    data: data,
    type: 'POST',
    beforeSend: function(){
       $('#post_a_post').replaceWith('<button id="post_a_post" style="float: right" class="btn btn-success" > <img src="/img/loadericon.gif" >  </button>');   
   
    }, 
    success: function(d){
    $('#post_a_post').replaceWith('<button id="post_a_post" onclick="react(this)" style="float: right" class="btn btn-success" >Post Reaction</button>');
    $('#exampleFormControlTextarea1').val('');
    $('.creat_post_content').hide();
    $('#tolol').show();
    //////console.log(window.arr_uploaded_images_moviex);
    //////console.log(d);
    document.getElementById('reaction').style.display='none';
    check('Post has been posted!');
        
    }
    
}); // end $.ajax()


 
}

function like_entry(id, liked){
   var eligibility = $('#'+liked+'_likes_counter'+id).attr('data-eligibility');
  if(eligibility == 0)
  return 0;

        $.ajax({
          type: 'GET',
          url: '/like/'+liked+'/'+id,
          data: data,
          success: function(ajax) {
         $(this).removeClass('fa-heart-o').addClass('fa-heart').css('color', 'red');
         var count = $('#'+liked+'_likes_counter'+id).attr('data-counter');
      //////console.log(count);

      count++;
      $('#'+liked+'_likes_counter'+id).attr('data-counter', count);
        $('#'+liked+'_likes_counter'+id).html(count );
        $('#'+liked+'_likes_counter'+id).attr('data-eligibility', 0);
        $('#'+liked+'_like'+id).css('color', 'red');
        $('#'+liked+'_like'+id).removeClass('fa-heart-o').addClass('fa-heart');
        //////console.log('#'+liked+'_like'+id);

          }
        });
}

function include(arr,obj) {
    return (arr.indexOf(obj) != -1);
}

$('.fa-heart-o').hover(function(){

    $(this).css('color', 'red')
},function(){
    $(this).css('color', 'black')
});
;

