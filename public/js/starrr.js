//get the movie Id from the url
/*var movie_id = window.location.href;
movie_id = movie_id.split('movie/');
movie_id = movie_id[1].split('?');
movie_id = movie_id[0];
*/
$(document).on('mouseover', '.stars', function(){
 
  //  var selected = $(this).attr('data-rating');
    //console.log(selected);
     $(this).addClass('fa-star').removeClass('fa-star-o');
      $(this).prevAll().removeClass('fa-star-o').addClass('fa-star ');
      $(this).nextAll().removeClass('fa-star').addClass('fa-star-o');
    
   // $(this).prev().addClass('fa-star');     
});

$(document).on('mouseout', '.stars', function(){
  
    $('.fa').addClass('fa-star-o').removeClass('fa-star');
$('.selected').prevAll().addClass('fa-star').removeClass('fa-star-o');    
$('.selected').addClass('fa-star').removeClass('fa-star-o');     
});

$(document).on('click', '.stars', function(){
      $(this).addClass('fa-star selected').removeClass('fa-star-o');
      $(this).prevAll().removeClass('fa-star-o').addClass('fa-star');
      $(this).nextAll().removeClass('selected fa-star').addClass('fa-star-o');
 var tag = "completed";
    var score = $(this).attr('data-rating');
    $('#score').val(score);
 add_to_list('completed', 4);
     
});

$(document).on('click', '.drp', function(e){
    
    e.preventDefault();
    var  str = $(this).attr('data-id');
    var span = '<span class="caret"></span>';   
    $('#dropdownMenu1').html(str+span);
    //  make an ajax call please!! 
   
    
});


function add_to_list(status, score){

    
   var data = {
    status: status,
    score: score,  
   movie_id: $('.movie_id').val(),
   movie_pic: $('#movie_pic').val(),
   movie_name: $('#movie_name').val(),
   ep_count: $('#ep_counts').val(),


    }
       
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
var dest = 'movie';
    if(window.location.href.indexOf("tv") > -1) {
      var dest = 'tv';
    } 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/entry/'+dest+'/lib/'+$('.movie_id').val(),
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);
  check('Entry has been added to library successfuly!');
        
    }
    
}); // end $.ajax()
    
}//end function ajax()