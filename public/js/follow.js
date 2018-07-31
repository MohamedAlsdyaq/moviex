$(document).on('click', '.follow', function(){
    
    var data = {
        user2: $('#user_id').val()
    }
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
    
    $.ajax({
        url: '/follow',
        data: data,
        type: 'POST',
        beforeSend: function(){
          $('#follow_button').removeClass('follow');  
         $('#follow_button').html('<img src="/img/loaderIcon.gif">');  
         
        },
        success: function(d){

          $('#follow_button').replaceWith(' <button  class="btn unfollow  btn-outline-dark -">Following</button>');   
         
        }
        
    });
    
});

$(document).on('click', '.follow', function(){
    
    var data = {
        user2: $('#user_id').val()
    }
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
    
    $.ajax({
        url: '/unfollow',
        data: data,
        type: 'POST',
        beforeSend: function(){
          $('.unfollow').removeClass('unfollow');  
         $('.unfollow').html('<img src="/img/loaderIcon.gif">');  
         
        },
        success: function(d){

          $('.unfollow').replaceWith(' <button id="follow_button" class="btn follow btn-success">Follow</button>');   
         
        }
        
    });
    
});