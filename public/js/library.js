function completed(){
$('.butons').hide();
$('#rating_section').show();
	//ajax call
	//edit add to library
}

function watch_list(e){
	$(e).hide();

	//ajax call
	//edit add to library
	//action taken // 
}
function started(e){
	$(e).hide();

	//ajax call

	//edit add to library

	//action taken // save in currently watching 

}


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