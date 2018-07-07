//get the movie Id from the url
/*var movie_id = window.location.href;
movie_id = movie_id.split('movie/');
movie_id = movie_id[1].split('?');
movie_id = movie_id[0];
*/
$(document).on('mouseover', '.fa', function(){
 
  //  var selected = $(this).attr('data-rating');
    //console.log(selected);
     $(this).addClass('fa-star').removeClass('fa-star-o');
      $(this).prevAll().removeClass('fa-star-o').addClass('fa-star ');
      $(this).nextAll().removeClass('fa-star').addClass('fa-star-o');
    
   // $(this).prev().addClass('fa-star');     
});

$(document).on('mouseout', '.fa', function(){
  
    $('.fa').addClass('fa-star-o').removeClass('fa-star');
$('.selected').prevAll().addClass('fa-star').removeClass('fa-star-o');    
$('.selected').addClass('fa-star').removeClass('fa-star-o');     
});

$(document).on('click', '.fa', function(){
      $(this).addClass('fa-star selected').removeClass('fa-star-o');
      $(this).prevAll().removeClass('fa-star-o').addClass('fa-star');
      $(this).nextAll().removeClass('selected fa-star').addClass('fa-star-o');
 var tag = "completed";
    var score = $(this).attr('data-rating');
    $('#score').val(score);
     $('#comment').val('.');
    add_to_list();
     
});

$(document).on('click', '.drp', function(e){
    
    e.preventDefault();
    var  str = $(this).attr('data-id');
    var span = '<span class="caret"></span>';   
    $('#dropdownMenu1').html(str+span);
    //  make an ajax call please!! 
    $('#comment').val('.');
    $('#status').val(str);
     add_to_list();
});


function add_to_list(){
   var tag = "completed";
    if ($('#status').val()) {
   tag = $('#status').val();
    }
    
   var data = {
    score: $('#score').val(), tag: tag,
   movie_id: $('.movie_id').val()
    }
       
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
    
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/list',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
    $('#dropdownMenu1').html( '<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i>'); 
// @ call ajax from textarea.js to insert the movie and a new blank post 
   add_movie_and_post(); 
    }, 
    success: function(d){
        console.log(tag);
      $('#dropdownMenu1').html(tag);   
        
    }
    
}); // end $.ajax()
    
}//end function ajax()