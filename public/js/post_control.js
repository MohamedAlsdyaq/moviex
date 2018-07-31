function ss(i, e){
$(e).replaceWith('<div style="margin-bottom:7px; padding-bottom:7px;"  onclick="less('+i+', this)" >  <h4  class="text-center "  > Show Less </h4> </div>');
$("#post"+i).css('height', 'auto');

}
function less(i, e){
  console.log('less' + i);
$(e).replaceWith('<div style="margin-bottom:7px; padding-bottom:7px;"  onclick="ss('+i+', this)" >  <h4  class="text-center "  > Show More </h4> </div>');
$("#post"+i).css('height', '200px');

}
function spoiler(e, i){
    console.log(i);
    $(e).removeClass('spoilered');
    $(i).remove();
}
function post(){


imgs = null;

var post = $('#exampleFormControlTextarea1').val();
var data = {
        imgs: window.arr_uploaded_images_moviex,
		post: post,
		ep_id: $('#myNumber').val(),
		spoiler: $('#checkbox6:checkbox:checked').length,
		movie_id: $('.movie_id').val()
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
    console.log(window.arr_uploaded_images_moviex);
    console.log(d);
    document.getElementById('reaction').style.display='none';
    check('Post has been posted!');
        
    }
    
}); // end $.ajax()


 
}

function get_post(id){
if(id == null)
  return false;
var content = ' ';
  $.ajax({
    type: 'GET',
    url: '/show/posts/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    
    success: function(ajax) {
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
 

$(document).on('mouseover', '.heart', function(){
 
     $(this).css('color', 'red');
 
});

$(document).on('mouseout', '.heart', function(){
   $(this).css('color', 'black');
});

function like(e, counter){
   window.moviex_ajax_indicator_for_likes = 0;

  id = $(e).attr('data-id');
   $.ajax({
    type: 'GET',
    url: '/like/post/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    success: function(ajax) {
        id = $(e).attr('data-id');
        console.log(id);
        new_val = counter++;
   $('#like'+id).remove( );
   $('#new_like'+id).text(new_val++);
    $(e).replaceWith('<i style="color:red; float:left" class="fa fa-heart"></i>');
    
    console.log(counter++);
  }
});

}