function change_setting_section(evt, name){
 var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("common2");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("w3-bar-item");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("stng_active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " stng_active";
  
}

var api_key = '54f297aa644bf4f27044771fc75cbb64';
function change_section(evt, name) {
 var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("common");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("current_tab", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " current_tab";
     var movie_id = window.location.href;
  movie_id = movie_id.split('movie/');
 type = 'movie';
  var id = movie_id[1];
     if(window.location.href.indexOf("?") > -1) {
  movie_id = movie_id[1].split('?');
  var id = movie_id[0];
}

   if(window.location.href.indexOf("tv") > -1) // This doesn't work, any suggestions?
    {
       var movie_id = window.location.href;
  movie_id = movie_id.split('tv/');
  var id = movie_id[1];
     if(window.location.href.indexOf("?") > -1) {
  movie_id = movie_id[1].split('?');
  var id = movie_id[0];
}
  type = 'tv';
    }

    if(name != 'summary')
    window[name](id, type);

}
function imageExists(image_url){


 var http = jQuery.ajax({
    type:"HEAD",
    url: image_url,
    async: false
  })
  return http.status == 200;
      // this will return 200 on success, and 0 or negative value on error
}

function gallery(id, type){


  var url = 'https://api.themoviedb.org/3/'+type+'/'+id+'/images?api_key='+api_key+'&language=en-US&include_image_language=en';
    $.ajax({
        type: 'GET',
        url: url,
        jsonpCallback: 'testing',
        contentType: 'application/json',
        dataType: 'jsonp',
            xhrFields: {
        withCredentials: true
    },
       beforeSend: function() {
         $('#gallery_photos').html('<img class="loading" src="/img/big_ring.gif" >');
            },
        success: function(ajax) {
            console.log(ajax);
              var images = ajax.posters;
             $('.loading').hide();


            if(images[12]){

            for(i=0; i<13; i += 1){
              $('#gallery_photos').append('<a href="http://image.tmdb.org/t/p/w500'+images[i].file_path+'"" data-lity  ><img class="max" src="http://image.tmdb.org/t/p/w500'+images[i].file_path+'"></a>');
                 }
            }
            else
              $('#gallery_photos').html('<div class="col-sm-12"> <h4>No Images Found for This Movie</h4>')

            //
          }
              });
}

function recommendation(id, type){
 
   
  var url = 'https://api.themoviedb.org/3/'+type+'/'+id+'/recommendations?api_key='+api_key+'&language=en-US&include_image_language=en';
 
    $.ajax({
        type: 'GET',
        url: url,
        jsonpCallback: 'testing',
        contentType: 'application/json',
        dataType: 'jsonp',
            xhrFields: {
        withCredentials: true
    },
       beforeSend: function() {
         $('#recommendation').html('<div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> <div class="custom_card2">  <img style="background-color: lightgrey" width="110" height="190" src="ht">   <h5  class="text-center"><small>         <small><h5></div> ');   },
        success: function(ajax) {
         console.log(ajax);
              $('#recommendation').html(' ');
    var movies = ajax.results;
    if(type == 'movie' ){
    for(i=0; i<20; i++){
        $('#recommendation').append(' <div class="custom_card2"><a href="/movie/'+movies[i].id+' ">           <img width="110" height="190" src="http://image.tmdb.org/t/p/w500'+movies[i].poster_path+'"> </a> <h5 class="text-center"><small>'+movies[i].original_title+'<small><h5></a></div>');
    }
  }
        if(type == 'tv' ){
    for(i=0; i<20; i++){
        $('#recommendation').append(' <div class="custom_card2"><a href="/movie/'+movies[i].id+' ">           <img width="110" height="190" src="http://image.tmdb.org/t/p/w500'+movies[i].poster_path+'"> </a> <h5 class="text-center"><small>'+movies[i].original_name+'<small><h5></a></div>');
    }
  }



          }
              });
}

function staff(id, type){
  
  var url = 'https://api.themoviedb.org/3/'+type+'/'+id+'/credits?api_key='+api_key+'&language=en-US&include_image_language=en';
 
    $.ajax({
        type: 'GET',
        url: url,
        jsonpCallback: 'testing',
        contentType: 'application/json',
        dataType: 'jsonp',
            xhrFields: {
        withCredentials: true
    },
       beforeSend: function() {
           $('#crew').html('<img class="loading" src="/img/big_ring.gif" >');
            },
        success: function(ajax) {
              $('.loading').hide();
            console.log(ajax);
              var crew = ajax.crew;
              var cast = ajax.cast;
            
              if(crew){
              for(i=0; i<cast.length; i += 1){
                image_url = "http://image.tmdb.org/t/p/w500"+cast[i].profile_path+"";
                if(imageExists(image_url))
                 $('.staff').append('<div class="app-img-wrapper">  <a href="/actor/'+cast[i].cast_id+'" class="app-img-link" title="Image 1"><img src="http://image.tmdb.org/t/p/w500'+cast[i].profile_path+'" class="img-responsive app-img" alt="App"><h4 class="app-img-text">'+cast[i].character + ' (<small>'+cast[i].name+'</small>)'+'</h4></a></div> ');
                else
                  continue;
                 }


              for(i=0; i<crew.length; i += 1){
                image_url = "http://image.tmdb.org/t/p/w500"+crew[i].profile_path+"";
                if(imageExists(image_url))
                  $('#crew').append('<div class="app-img-wrapper">  <a class="app-img-link" title="Image 1"><img src="http://image.tmdb.org/t/p/w500'+crew[i].profile_path+'" class="img-responsive app-img" alt="App"><h4 class="app-img-text">'+crew[i].name + ' (<small>'+crew[i].job+'</small>)'+'</h4></a></div> ');
                else
                 {
 $('#crew').append('<h3 class="text-center" >No Data Avaliable</h3>');
                  continue;

                }
                   }
            }
          }
              });
}
