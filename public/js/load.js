// Hello.
//
// This is JSHint, a tool that helps to detect errors and potential
// problems in your JavaScript code.
//
// To start, simply enter some JavaScript anywhere on this page. Your
// report will appear on the right side.
//
// Additionally, you can toggle specific options in the Configure
// menu.


function get_post(id){

  $.ajax({
    type: 'GET',
    url: '/get/post/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    
    success: function(ajax) {
data = ajax;

 $('._4-u8').remove();
  
 
var i=0;
 for(i; i<10; i++){
  console.log(typeof data[i].comments);
if(typeof data[i].comments != "undefined"){
   
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
$('#write_on_me').val(JSON.parse(this.responseText) );
    }
  };
  xhttp.open("GET", "/spoiler/check/"+data[i].show_id, true);
  xhttp.send();

var content = ' ';
      content += '<div id="lib_entry" style="margin-left: -15px; width:100%"> <figure id="post'+data[i].id+'"><div class="post_container   " > <div style="padding:5px;" ><img class="img-circle" style="float:left ; margin-right:4px; " src="'+data[i].user.picture+'" height="30" width="30" ><div style="float:left" >'+data[i].user.name+' <span > @'+data[i].user.name+'</span></div><br>    <h6 class="timeline-time" >'+formatDate(data[i].created_at)+'</h6></div> ';
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

if($('#my_id').val() !== null){
  
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
 

   content +='</div>  <div style="display:block; bottom: 0; margin-top:10px; padding:8px;" >'+liking+'<span id="new_like'+data[i].id+'" ></span> <span id="like'+data[i].id+'" >  '+data[i].likes.length+'  </span> <i onclick="myFunction('+data[i].id+')"  style="float:right" class="dropbtn fa fa-ellipsis-h"></i> </div> </figure><div id="myDropdown'+data[i].id+'" class="dropdown-content">  <a onclick="copy_link('+data[i].id+')" >Copy Link to Post</a>    <a onclick="block('+data[i].user.id+')"   >Block @'+data[i].user.name+'</a>    <a onclick="report('+data[i].id+')" >Report Post</a></div> <div style="margin-bottom:7px; padding-bottom:7px;"  onclick="ss('+data[i].id+', this)" >  <h4  class="text-center "  > Show More </h4> </div></div> </div>' ;

   $('#posts_loading').append(content);
console.log($('#post'+data[i].id).outerHeight());
 } 
else{
  username = $('#username').val();
  console.log(data);
 var modal = '<div class="modal fade" id="modal'+data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">    <div class="modal-content">  <div class="modal-body"><div  class=" row"> <div style="background-color:white; margin-bottom:7px;max-width:95.5%; ;"  ><div class="col-xs-3"> <img style="margin-right: 10px margin:10px;float:left" src="'+data[i].show.show_pic+'" width="120" height="170"> </div> <div class="co-8" > <div style="background-color:white;padding-bottom: 3px; padding-top:3px;" > <h5 style="margin-left: 10px; margin:5px" >'+data[i].show.show_name+'</h5> <time class="timeline-time" datetime="2014-01-10T03:45"><span>'+formatDate(data[i].updated_at)+'</span> <span></span></time></div><div style="float:left"></div><div class="timeline-centered"><article class="timeline-entry"><div id="timeline'+data[i].id+'" class="timeline-entry-inner">';

 var content = '<div  class=" row"> <div style="background-color:white; margin-bottom:7px;max-width:95.5%; height: 200px;"  > <img style="margin:10px;float:left" src="'+data[i].show.show_pic+'" width="120" height="170"> <div style="background-color:white;padding-bottom: 3px; padding-top:3px;" > <h5 style="margin-left: 10px; margin:5px" >'+data[i].show.show_name+'</h5> <time class="timeline-time" datetime="2014-01-10T03:45"><span>'+formatDate(data[i].updated_at)+'</span> <span></span></time></div><div style="float:left"></div><div class="timeline-centered"><article class="timeline-entry"><div id="timeline'+data[i].id+'" class="timeline-entry-inner">';

     for(k=data[i].history.length-1; k > 0; k--){   
        if(data[i].history[k].type == 'ep_seen')  
        // continue;
console.log(data[i][k]);
content += '';

if(k + 3 == data[i].history.length ){
content += '  <div class="timeline-more"> <span class="see_more_buton btn b btn-xs " data-toggle="modal" data-target="#modal'+data[i].id+'" onclick="collapse('+data[i]+');"  >See More</span></div>';
  
  }

  var rating = '';
  if(data[i].history[k].rate !== null)
    rating = '- rated it '+data[i].history[k].rate;
  
    if(data[i].history[k].rate == data[i].history[k - 1].rate)
    rating = '';
  
 var status = data[i].history[k].status;
  if(data[i].history[k].status == 'watching')
        status = 'Currently Watching'
if(k + 2 >= data[i].history.length){
  content += '<div class="vl"></div><div class="timeline-icon '+data[i].history[k].status+' bg-success"><i class="entypo-feather"></i></div><div class=" -label"><h6><a href="#"> '+username+'</a> moved  <a href="">  '+data[i].show.show_name+'</a>  to <span>'+status+' '+ rating+'</span></h6> </div>';

      } 
       modal += '<div class="vl"></div><div class="timeline-icon '+data[i].history[k].status+' bg-success"><i class="entypo-feather"></i></div><div class=" -label"><h6><a href="#"> '+username+'</a> moved  <a href="">  '+data[i].show.show_name+'</a>  to <span>'+status+' '+ rating+'</span></h6> </div>';
     
        }
          modal += '</div></div></div></div></article></div></div></div></div>';
      $('#modal_target').append(modal); 
        content += '</div></div></div></article>';
   $('#posts_loading').append(content);
}
}

    }
});


}
get_post(1);

function collapse(data){
   username = $('#username').val();
  console.log(data);
 var content = '<div  class=" row"> <div style="background-color:white; height: 200px;" id="post_s" > <img style="margin:10px;float:left" src="'+data.show.show_pic+'" width="120" height="170"> <div style="background-color:white;padding-bottom: 3px; padding-top:3px;" > <h5 style="margin-left: 10px; margin:5px" >'+data.show.show_name+'</h5> <time class="timeline-time" datetime="2014-01-10T03:45"><span>'+formatDate(data.updated_at)+'</span> <span></span></time></div><div style="  posistion:absolute;  margin-left:30px;  border-right: 4px solid #f5f5f6;height: 100px;float:left; z-index:-100; overflow:hiddenfloat:left"></div><div class="timeline-centered"><article class="timeline-entry"><div id="timeline'+data.id+'" class="timeline-entry-inner">';

        for(k=0; k<data.history.length; k++){     
content += '';
 
  var rating = '';
  if(data.history[k].rate !== null)
    rating = '- rate it '+data.history[k].rate;

  content += '<div class="timeline-icon '+data.history[k].status+' bg-success"><i class="entypo-feather"></i></div><div class=" -label"><h6><a href="#"> '+username+'</a> <span>'+data.history[k].status+' <a href=""> '+data.show.show_name+'</a> '+ rating+'</span></h6> </div>';
        }
        content += '</div></div></div></article>';
   $('#lib_modal').html(content);
   $('#modal_').show();
}