function update_entry(){

data = $('#update_form').serialize();
console.log(data);
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/update/tv/lib',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);
  check('Changes has been Saved!');
      document.getElementById('id01').style.display='none'  
    }
    
});
}
function update_entry_quick(id){

data = $('#update_form'+id).serialize();
console.log(data);
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 

$.ajax({

    //do a call to the list table and add the movie as 
    url: '/update/tv/lib',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);
  check('Changes has been Saved!');
     $('#'+id).hide(); 
    }
    
});
}



function delete_entry(){
   var r = confirm("Are you Sure!");
    if (r == true) {
  
    
data ={id: $('#entry_id').val()
}
console.log(data);
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
    url: '/delete/'+dest+'/lib',
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);
  check('Entry has been Removed!');
  document.getElementById('id01').style.display='none';
       location.reload();  
    }
    
});
        
 }
        

}

  