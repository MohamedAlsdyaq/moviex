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

function display_lib(data){
 
 username = $('#username').val();
  
 var modal = '<div class="modal fade" id="modal'+data.id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">    <div class="modal-content">  <div class="modal-body"><div  class=" row"> <div style="background-color:white; margin-bottom:7px;max-width:95.5%; ;"  ><div class="col-xs-3"> <img style="margin-right: 10px margin:10px;float:left" src="http://image.tmdb.org/t/p/w154'+data.show.show_pic+'" width="120" height="170"> </div> <div class="co-8" > <div style="background-color:white;padding-bottom: 3px; padding-top:3px;" > <h5 style="margin-left: 10px; margin:5px" >'+data.show.show_name+'</h5> <time class="timeline-time" datetime="2014-01-10T03:45"><span>'+formatDate(data.updated_at)+'</span> <span></span></time></div><div style="float:left"></div><div class="timeline-centered"><article class="timeline-entry"><div id="timeline'+data.id+'" class="timeline-entry-inner">';

var g_type = 0;
if(data.type == 1)
  g_type = 'tv';

 var content = '<div  class="  "> <div style="background-color:white;font-weight: normal !importnat; font-size: 12px !importnat; margin-bottom:7px; height: 200px;"  > <img style="margin:10px;float:left" src="http://image.tmdb.org/t/p/w154'+data.show.show_pic+'" width="120" height="170"> <div style="background-color:white;padding-bottom: 3px; padding-top:3px;" ><a href="/'+g_type+'/'+data.show.id+'" > <h5 style="margin-left: 10px; margin:5px" >'+data.show.show_name+'</h5>  </a><time class="timeline-time" datetime="2014-01-10T03:45"><span>'+formatDate(data.updated_at)+'</span> <span></span></time></div><div style="float:left"></div><div class="timeline-centered"><article class="timeline-entry"><div id="timeline'+data.id+'" class="timeline-entry-inner">';

     for(k=data.history.length-1; k > 0; k--){   
        if(data.history[k].type == 'ep_seen')  
        // continue;
 
content += '';

if(k + 3 == data.history.length ){
content += '  <div class="timeline-more"> <span class="see_more_buton btn b btn-xs " data-toggle="modal" data-target="#modal'+data.id+'" onclick="collapse('+data+');"  >See More</span></div>';
  
  }

  var rating = '';
  if(data.history[k].rate !== null)
    rating = '- rated it '+data.history[k].rate;
  
    if(data.history[k].rate == data.history[k - 1].rate)
    rating = '';
  
 var status = data.history[k].status;
  if(data.history[k].status == 'watching')
        status = 'Currently Watching'
if(k + 2 >= data.history.length){
  content += '<div class="vl"></div><div class="timeline-icon '+data.history[k].status+' bg-success"><i class="entypo-feather"></i></div><div class=" -label"><h6><a href="#"> '+username+'</a> moved  this to <span>'+status+' '+ rating+'</span></h6> </div>';

      } 
       modal += '<div class="vl"></div><div class="timeline-icon '+data.history[k].status+' bg-success"><i class="entypo-feather"></i></div><div class=" -label"><h6><a href="#"> '+username+'</a> moved this to <span>'+status+' '+ rating+'</span></h6> </div>';
     
        }
          modal += '</div></div></div></div></article></div></div></div></div>';
      $('#modal_target').append(modal); 
        content += '</div></div></div></article>';
 return [content, false];

 
}

function activity_feed(id ){

  $.ajax({
    type: 'GET',
    url: '/get/post/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    
    success: function(ajax) {
 $('._4-u8').remove();
 
var data = ajax.data;

console.log(data);
 for(i=0; i<data.length; i++){
      if(data[i].type == 'post'){
        content = display_post(data[i].post); 
  
      } // display_post condidtion 
      if(data[i].type == 'library'){
        content = display_lib(data[i].library);

        }
       $('#posts_loading').append(content[0]);
       if(content[1] !== false){
 $('.gallery'+data[i].id).imagesGrid({
        images: content[1],
        align: true
        });
      } // if content !== false

   } // end for
$('.comments').each(function(i, item ) { 
    id = $('#'+item.id).attr('data-comment');
    target = '#'+item.id;
    //console.log(id + ' - '+ target)
     display_comments(id, 10, target); 
});
    } // end success
});

}

function collapse(data){
   username = $('#username').val();
 
 var content = '<div  class=" row"> <div style="background-color:white; height: 200px;" id="post_s" > <img style="margin:10px;float:left" src="http://image.tmdb.org/t/p/w154'+data.show.show_pic+'" width="120" height="170"> <div style="background-color:white;padding-bottom: 3px; padding-top:3px;" > <h5 style="margin-left: 10px; margin:5px" >'+data.show.show_name+'</h5> <time class="timeline-time" datetime="2014-01-10T03:45"><span>'+formatDate(data.updated_at)+'</span> <span></span></time></div><div style="  posistion:absolute;  margin-left:30px;  border-right: 4px solid #f5f5f6;height: 100px;float:left; z-index:-100; overflow:hiddenfloat:left"></div><div class="timeline-centered"><article class="timeline-entry"><div id="timeline'+data.id+'" class="timeline-entry-inner">';

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

activity_feed($('#my_id').val());