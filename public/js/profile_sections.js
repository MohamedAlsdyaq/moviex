
  function active_btn(e){
 
    console.log(window.moviex_data_type);
    $('.custom_btns').css('opacity', '0.4');
    $(e).css('opacity', '1');
  }
function library(uri, type){

window.moviex_data_global_uri = uri;
 
    $('.libs').html(' ');
 $.get( "/get/library"+window.moviex_data_type+"/"+uri, function( ajax ) {
 


window.moviex_data_global_limit = ajax.last_page;
window.moviex_data_global_current = ajax.current_page;
window.moviex_data_global_next = ajax.next_page_url;


data = ajax.data;
console.log(ajax);
 for(var i=0; i<15; i++ ){

  content = '<div  style="font-size: 14px !important;" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="lib'+data[i].id+'"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h2 style="text-align: center;" id="movie_title" > '+data[i].show.show_name+'<hr> <div class="" > <div style="padding-left: 10%;" class=" " > <div > <form id="update_form"> <fieldset style="border: none" disabled>';
  if(data[i].rate !== null ){
 content +='    <input id="entry_id" type="hidden" name="id"  value="'+data[i].rate+'">';
 }
  content += ' <div class=" row"> <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label> <div class="col-sm-8"> <select name="status" style="color: black !important" style="" class="butons custom-select mr-sm-2" id="inlineFormCustomSelect"> <option value="watching" name="started" >Currently watching</option> <option value="completed" name="completed" >Completed</option> <option value="dropped" name="dropped" >Dropped</option> </select> </div> </div>';
 
 finished_at = data[i].finished_at;
  started_at = data[i].started_at;
  note = data[i].note;
  progress = data[i].ep_count;

content += ' <br> <div class="f row"> <label for="colFormLabel" class="col-sm-2 col-form-label">Progress</label> <div class="col-sm-8"> <div class=" "> <input name="progress" style="width:80%;float: left;" max="" id="number" type="number" class="form-control touchspin" value="'+progress+'"><div style="height: 36px; width: 50px; background-color: #ecf0f1; float: right;" id="of_ep"></div> </div> </div> </div> <br> <div class="f row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Rewatch Count</label> <div class="col-sm-8"> <select name="rewatch" style="color: black !important" class="butons selectpicker"> <option data-name="0" >0</option> <option data-name="1" >1</option> <option data-name="2" >2</option> </select> </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Started Date</label> <div class="col-sm-8"> <input placeholder="'+started_at+'" name="started_at" type="date" class="form-control " > </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Finished Date</label> <div class="col-sm-8"> <input placeholder="'+finished_at+'" value="" name="finished_at" type="date" class="form-control " > </div> </div> <br> <div class=" row"> <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Notes</label> <div class="col-sm-8"> <textarea name="note" style=" resize: none" class="form-control" id="" rows="3"> '+note+' </textarea> </div> </div> </fieldset></form> </div></div><hr style="height: 2px;" ><div style="height: 30px; margin-bottom: 10px;"> <button onclick="delete_entry()" style="float: left" class="btn btn-default"><i class="fa fa-trash"></i> </button> <button onclick="update_entry_quick{'+data[i].id+')" style="float: right" class="btn btn-success"> Save Changes </button>  </div> </div> </div> </div> </div>';

$('#set_modals').append(content);

var loader = parseInt(data[i].ep_count) / parseInt(data[i].show.ep_count) * 100;
anchors = '<div class="bordered_btn"><a href="/'+window.moviex_data_type+'/'+data[i].show.id+'"><i style="color:grey;margin-top:4px;" class="fa fa-arrow-right" aria-hidden="true"> </i></a></div>';

anchors += '<div  class="bordered_btn" style="width:85px;"><span data-toggle="modal" data-target="#lib'+data[i].id+'"  > Edit Entry </span></div>';

if({{Auth::user()->id}} !== {{$user['id']}})
  anchors = '<a class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show.show_pic+'`, `'+data[i].original_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show.show_pic+'`, `'+data[i].original_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show.show_pic+'`, `'+data[i].original_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>';
  $('.libs').append( '  <div data-toggle="popover" data-placement="right" data-original-title="<h6>'+data[i].show.show_name + '<span style= &quot;color:#dddddd; &quot; > '+ get_year(data[i].show.show_date)+'</span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].show.show_popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].show.show_rating+'</sp></small></h5>" data-content="<div ><h6 style= &quot; font-size: 14px; &quot;  >'+data[i].show.show_bio+'</h6></div>" onclick="go_to_page("/movie/'+data[i].show.id+'")" class="search_poster" style="height: 255px;background-color: #2c3e50;max-width: 110px;margin-left: 7px;border-radius: 3px;"> <div id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].show.show_pic+');" > <div class="bottom dropdown"> '+anchors+'</div></div> <div id="#p" > <div class="loaded" ><div style="width: '+loader+'%" class="loaded2" ></div></div> </div> <span style="margin:10px;float:left; color:grey; font-size:10px" > Ep.'+data[i].ep_count+' </span> <span style="margin:10px;float:right; color:grey; font-size:10px">'+data[i].rate+'</span></div> </div></div>');
  
 }
 $('.libs').append('');
});

}
 



function reaction(id){
    $('.reaction').html(' ');
 $.get( "/get/reaction/"+$('#user_id').val(), function( ajax ) {
 for(var i=0; i<ajax.data.length; i++ ){
  data = ajax.data;
 
 
  $('.reaction').append( '<div style=" background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5) ) , url(http://image.tmdb.org/t/p/w780'+data[i].show.show_header+') !important ;" class="col-sm-4 col-md-4 col-lg-4 col-xs-6 reaction_container" style="" ><span class="like_reaction cursor stat-item"><i class="fa fa-thumbs-up icon"></i> '+data[i].likes.length+'</span><div style=" float: right;"  class="dropdown"> <i class="cursor fas fa-ellipsis-h fa-2x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i><div class="dropdown-menu" aria-labelledby="dropdownMenuButton">  <div class="dropdown-menu dropdown-menu-right"> <button class="dropdown-item" type="button">Action</button><button class="dropdown-item" type="button">Another action</button>    <button class="dropdown-item" type="button">Something else here</button>  </div></div></div><br><div class="reaction_info" ><p>'+data[i].show.show_name+'<span class="grey" > </span><a href="" ><h4>'+data[i].reaction+'</h4> </a></div></div>');
  
 }
});

}
 

function list(id){
  
     $('.list').html(' ');
 $.get( "/get/list/"+id, function( ajax ) {
 for(var i=0; i<ajax.data.length; i++ ){
  data = ajax.data;
 
 
  $('.list').append( ' ');
  
 }
});
}


function follower(id){
$('#followers').html(' ');

   $.get( '/get/follower/'+id, function( data ) {
console.log(data);
      for(var i=0; i<data.length; i++ ){

 $('#followers').append('<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 box"><header2><div class="vv"><canvas style="background-image: url('+data[i].header+');" class="img-responsive header-bg" width="" height="70" id="header-blur"></canvas><div class="desc"></div></div><div class="avatarcontainer"><a href="/user/'+data[i].id+'" ><img src="'+data[i].picture+'" alt="avatar" height="50px" height="50px" class="av img-circle "></a></div></header2><div style="margin-top: 5%; padding: 5%" class="content"><button  onclick="follow('+data[i].id+')" type="button" class="cursor btn btn-success -lg btn-block">Follow</button></div></div>');
         
          }
        
              })  ;
}


function following(id){
  $('#following').html(' ');

    $.get( '/get/follower/'+id, function( data ) {
console.log(data);
      for(var i=0; i<data.length; i++ ){

 $('#following').append('<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 box"><header2><div class="vv"><canvas style="background-image: url('+data[i].header+');" class="img-responsive header-bg" width="" height="70" id="header-blur"></canvas><div class="desc"></div></div><div class="avatarcontainer"><a href="/user/'+data[i].id+'" ><img src="'+data[i].picture+'" alt="avatar" height="50px" height="50px" class="av img-circle "></a></div></header2><div style="margin-top: 5%; padding: 5%" class="content"><button  onclick="follow('+data[i].id+')" type="button" class="cursor btn btn-success -lg btn-block">Follow</button></div></div>');
         
          }
        
              })  ;
}


function group(id){
  
 
    $.ajax({
        type: 'GET',
        url: '/get/group/'+id,
        jsonpCallback: 'testing',
        contentType: 'application/json',
        dataType: 'jsonp',
       beforeSend: function() {
           
            },
        success: function(ajax) {
 
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
console.log($.trim( $(e).val() ).length);
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

