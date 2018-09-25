function carousoal(){
  
}

function get_post(id){
 
var content = ' ';
  $.ajax({
    type: 'GET',
    url: '/show/posts/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    beforeSend: function(){
 $('#posts_loading').append('<img id="loader_big" src="/img/ring-alt.gif">');
    },
    success: function(ajax) {
data = ajax.data;
 $('#loader_big').remove();
data = ajax.data;
window.moviex_global_next_page = ajax.next_page_url;
window.moviex_data_paginate_limit = ajax.last_page;
 $('._4-u8').remove();

console.log(data);
if(data.length == 0)
{ 
$('#posts_loading').html('<div class="no_posts">        Hmm, there doesn`t seem to be anything here yet.      </div>');
}
 
 

 for(i=0; i<data.length; i++){
 
 content = display_post(data[i]);
   
 $('#posts_loading').append(content[0]);
 
 $('.gallery'+data[i].id).imagesGrid({
    images: content[1],
                align: true
            });
   } // end for
$('.comments').each(function(i, item ) { 
    is = $('#'+item.id).attr('data-comment');
    target = '#'+item.id;
    //console.log(id + ' - '+ target)
     display_comments(is, 10, target); 
});
 
$('#posts_loading').append('<div class="col-xs-12 no_more" ></div>');
}
});


}


     $(window).scroll( function(){
       var previousScroll = 0;
        
       var currentScroll = $(this).scrollTop();
       if (currentScroll > previousScroll){
           $('#real_nav').addClass('navbar bg-dark');
        
       } else {
           $('#real_nav').removeClass('navbar bg-dark');
       }
       previousScroll = currentScroll;


      var paginatr = window.moviex_id_plus_paginater;
      paginatr = paginatr.split("=");
      paginatr = paginatr[1];
      if(paginatr > window.moviex_data_paginate_limit || window.moviex_id_plus_paginater  == null){
        $('.no_more').html('<h5> No More Posts to be Showen!</h5> ');
        $('.no_more').removeClass('no_more');
        return 0;
      }
        /* Check the location of each desired element */
        $('.no_more').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
               get_post(window.moviex_id_plus_paginater );
               window.moviex_id_plus_paginater  = null;
                paginatr++;
                    
            }
            
        }); 
    
    });
 

$(document).on('mouseover', '.heart', function(){
 
     $(this).css('color', 'red');
 
});

$(document).on('mouseout', '.heart', function(){
   $(this).css('color', 'black');
});

function like(e, counter){
   window.moviex_ajax_indicator_for_likes = 0;

  id = $(e).attr('data-id');
   $.ajax({
    type: 'GET',
    url: '/like/post/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    success: function(ajax) {
        id = $(e).attr('data-id');
        console.log(id);
        new_val = counter++;
   $('#like'+id).remove( );
   $('#new_like'+id).text(new_val++);
    $(e).replaceWith('<i style="color:red; float:left" class="fa fa-heart"></i>');
    
    console.log(counter++);
  }
});

}
