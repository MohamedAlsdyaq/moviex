
function join_group(id, className='btn-sm', actio='this group') {
	 

$.ajax({

    //do a call to the list table and add the movie as 
  url: '/group/join/'+id,
    
    type: 'GET',
    beforeSend: function(){
      $('#button_group'+id).html('<img id="button_group'+id+'" src="/img/loaderIcon.gif"> ');
    }, 
    success: function(d){
   $('#button_group'+id).replaceWith('    <button id="button_group'+id+'" data-id="'+id+'" onclick="leave_group('+id+',  ` `, `  `)" class="btn   '+className+' custom_dark_btn " > Leave '+actio+' </button>  ');
       
    }
    
});

	 }


function leave_group(id, className='btn-sm', actio='this group') {
	 

$.ajax({

    //do a call to the list table and add the movie as 
  url: '/group/leave/'+id,
    
    type: 'GET',
    beforeSend: function(){
      $('#button_group'+id).html('<img id="button_group'+id+'" src="/img/loaderIcon.gif"> ');
    }, 
    success: function(d){
   $('#button_group'+id).replaceWith('    <button id="button_group'+id+'" data-id="'+id+'" onclick="join_group('+id+', ` `, ` `)" class="btn   '+className+' btn-success" > Join  '+actio+' </button>  ');
       
    }
    
});

	 }