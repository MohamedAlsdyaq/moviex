function react(argument) {
	// body...


var reaction = $('#reaction_content').val();
var data = {
		reaction: reaction,
		movie_id: $('.movie_id').val()
    }     
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/reaction/create',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);
document.getElementById('reaction').style.display='none';
  check('Reaction has been posted!');
        
    }
    
}); // end $.ajax()


console.log(reaction);

}

function delete_reaction(id){
    var data = {
        id: id,
        
    }     
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/reaction/delete',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);

  check('Reaction has been deleted!');
  $('#reaction_'+id).fadeOut();
        
    }
    
}); // end $.ajax()

}