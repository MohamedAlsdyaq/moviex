function follow(id){
    
  
    $.ajax({
        url: '/follow/'+id,
         
        type: 'GET',
        beforeSend: function(){
          $('#follow'+id).removeClass('follow');  
         $('#follow'+id).html('<img src="/img/loaderIcon.gif">');  
         
        },
        success: function(d){

          $('#follow'+id).replaceWith(' <button id="unfollow'+id+'" onclick="unfollow('+id+')" type="button" class="btn cursor  unfollow   - btn-block">Unfollow</button>');   
         
        }
        
    });
    
}

function unfollow(id){
    
  
    $.ajax({
        url: '/unfollow/'+id,
       
        type: 'GET',
        beforeSend: function(){
          $('#unfollow'+id).removeClass('follow');  
         $('#unfollow'+id).html('<img src="/img/loaderIcon.gif">');  
         
        },
        success: function(d){

          $('#unfollow'+id).replaceWith(' <button id="follow'+id+'" onclick="follow('+id+')" type="button" class="btn cursor  btn-success   - btn-block">Follow</button>');   
         
        }
        
    });
    
}
 