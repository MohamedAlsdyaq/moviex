//get the movie Id from the url
function imageExists(image_url){


 var http = jQuery.ajax({
    type:"HEAD",
    url: image_url,
    async: false
  })
  return http.status == 200;
      // this will return 200 on success, and 0 or negative value on error
}

var movie_id = window.location.href;
movie_id = movie_id.split('tv/');
movie_id = movie_id[1].split('?');
movie_id = movie_id[0];

var url = 'http://api.themoviedb.org/3/tv/'+movie_id+'?api_key=54f297aa644bf4f27044771fc75cbb64&append_to_response=videos,keywords';

$.ajax({
            type: 'GET',
            url: url,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function() {
      //  $('#load').attr("src", "img/ring.gif");

            },
            success: function(ajax) {
                     //      $('.disabled').addClass('disabled');
    
              console.log(ajax);
                console.log(ajax);
var pic = 'http://image.tmdb.org/t/p/w342'+ajax.poster_path
var name = ajax.name;
var length = ajax.number_of_seasons;
var no_ep = ajax.number_of_episodes;
var id = ajax.id;
var backdrop = 'http://image.tmdb.org/t/p/w1280'+ajax.backdrop_path;
var thumb_backdrop = 'http://image.tmdb.org/t/p/w300'+ajax.backdrop_path;
var bio = ajax.overview;
var score = ajax.vote_average;
var vote = ajax.vote_count;
var popularity = ajax.popularity;
var date = ajax.first_air_date;

if( typeof ajax.videos.results[0] !== 'undefined')
var video = 'https://www.youtube.com/watch?v='+ajax.videos.results[0].key;
 
var tags = ajax.keywords.results;

if(typeof video !== 'undefined')
$('#video').attr('href', video);
         
for(i=0; i<ajax.production_companies.length; i +=1){
    $('#production').append('<u> '+ ajax.production_companies[i].name+'</u>');
    $('#production').append(', ');
    
    }

for(i=0; i<ajax.genres.length; i +=1){        
          $('#ges').append('<u> '+ajax.genres[i].name+'</u>');
          $('#ges').append(', ');
    }
    if(typeof tags  != 'undefined'){
    console.log(tags[0].name)
  for(i=0; i<tags.length; i++){
          $('#tagz').append('<a style="color: black" href="/search/tv?keywords='+tags[i].id+'" > <li><span class="tag">'+tags[i].name+'</span></li> </a>')
   }          
    }

var imdb = '<a href="http://www.imdb.com/title/'+ajax.imdb_id+'"> IMDB </a>';
var homepage = '<a href="'+ajax.homepage+'"> Show Page </a>';


            $('#poster').css('background-image', 'url('+pic+')' );
            $('#p_anchor').attr('href', pic); 
             $('.poster').attr('src', pic); 
              $('.reaction_container2').css({
            'background': 'linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ) , url('+backdrop+')',

            }); 
               $('.bio').html(bio);    
            $('#backdrop').css({
            
            'background': 'linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ) , url('+backdrop+')',

            }); 
            $('.trailer').css({
            
            'background': 'linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ) , url('+thumb_backdrop+')',

            }); 
            $('#movie_name').val(name);
            $('#movie_pic').val(pic);
            $('#ep_counts').val(no_ep);
            $('#up').attr('data-limit', no_ep); 
            $('#number').attr('max', no_ep); 
            $('#movie_title').html(name);
            $('title').html(name+' | Nanashi');
            $('#links').html(imdb+' . '+homepage);
            $('#bio').html(''+bio);
            $('#length').html(' '+length+' Season(s)') ;
            $('#ep_run').html(' '+ajax.episode_run_time[0]+' ') ;
            $('#no_ep').html(' '+no_ep+' ') ;
             $('#of_ep').html('of '+no_ep+' ') ;
            $('#date').html(' '+date) ;
            $('#vote_average').append(ajax.status) ;
            $('#director').html('<span>'+ajax.created_by[0].name+'</span>');
            $('#popularity').html(popularity) ;
            $('#votes').html(vote) ;   
            $('#movie_name').val(name);         
            $('.movie_id').val(id);         
            $('#movie_pic').val(pic); 
     
for(i=0; i<ajax.genres.length; i +=1){            
       $('#movie_g'+i).val(ajax.genres[i].name);         
       }
       $('#movie_date').val(date);         
       $('#movie_rate').val(score);         
       $('#movie_bio').val(bio);         
       $('#movie_length').val(length);                
for (i= 0; i<ajax.seasons.length; i++) {

 $('#sense').append(' <div style="background-color: #F4F4F4; font-weight:bold; margin-bottom:15px; width:95%;" class=" col-sm-12 col-xs-12 " > <img style="float:left" height="250px"  width=""  src="http://image.tmdb.org/t/p/w342'+ajax.seasons[i].poster_path+'" class="poster_contener" > <div style="max-width: 550px;margin-left:2%;margin-top:4%;float:left" > <h4>'+ajax.seasons[i].name+' | '+ajax.seasons[i].episode_count+' Episodes</h4> <p>'+ajax.seasons[i].name + ' of '+ ajax.name+ ' premiered on ' +get_year(ajax.seasons[i].air_date) +' </p><p class="v_small" >'+ajax.seasons[i].overview +' </p></div></div>');
}
           // $('#movie_date').html(data) ;
            
       $('.no_more_inactive').addClass('no_more');        
            }//end ajax success
    
});//end ajax
/*
function get_credits(){
  var movie_id = window.location.href;
movie_id = movie_id.split('movie/');
movie_id = movie_id[1].split('?');
movie_id = movie_id[0];
var url = 'http://api.themoviedb.org/3/movie/'+id+'/credits?api_key=54f297aa644bf4f27044771fc75cbb64&language=en-US&page=1';
$.ajax({
            type: 'GET',
            url: url,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function() {
      //  $('#load').attr("src", "img/ring.gif");
            },
            success: function(ajax) {
      var crew = ajax.crew;
      var cast = ajax.cast;
     if(crew){
for(i=0; i<cast.length/2; i += 1){

image_url = "http://image.tmdb.org/t/p/w500"+cast[i].profile_path+"";

if(imageExists(image_url))
  $('.staff').append('<div class="app-img-wrapper">  <a href="" class="app-img-link" title="Image 1"><img src="http://image.tmdb.org/t/p/w500'+cast[i].profile_path+'" class="img-responsive app-img" alt="App"><h4 class="app-img-text">'+cast[i].character + ' (<small>'+cast[i].name+'</small>)'+'</h4></a></div> ');
else
  continue;
}


for(i=0; i<crew.length/2; i += 1){

image_url = "http://image.tmdb.org/t/p/w500"+crew[i].profile_path+"";

if(imageExists(image_url))
  $('#crew').append('<div class="app-img-wrapper">  <a href="http://kenwheeler.github.io/slick/img/fonz1.png" class="app-img-link" title="Image 1"><img src="http://image.tmdb.org/t/p/w500'+crew[i].profile_path+'" class="img-responsive app-img" alt="App"><h4 class="app-img-text">'+crew[i].name + ' (<small>'+crew[i].job+'</small>)'+'</h4></a></div> ');
else
  continue;

          });
}

function get_recommendations(id){
var url = 'http://api.themoviedb.org/3/movie/'+id+'/recommendations?api_key=54f297aa644bf4f27044771fc75cbb64&language=en-US&page=1';
$.ajax({
            type: 'GET',
            url: url,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function() {
      //  $('#load').attr("src", "img/ring.gif");
            },
            success: function(ajax) {
          
         

         });
}

function get_images(id){
var url = 'http://api.themoviedb.org/3/movie/'+id+'/images?api_key=54f297aa644bf4f27044771fc75cbb64&language=en-US&page=1';
$.ajax({
            type: 'GET',
            url: url,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function() {
      //  $('#load').attr("src", "img/ring.gif");
            },
            success: function(ajax) {
          
         
var image_url, checker;
if(crew){
for(i=0; i<cast.length/2; i += 1){

image_url = "http://image.tmdb.org/t/p/w500"+cast[i].profile_path+"";

if(imageExists(image_url))
  $('.staff').append('<div class="app-img-wrapper">  <a href="" class="app-img-link" title="Image 1"><img src="http://image.tmdb.org/t/p/w500'+cast[i].profile_path+'" class="img-responsive app-img" alt="App"><h4 class="app-img-text">'+cast[i].character + ' (<small>'+cast[i].name+'</small>)'+'</h4></a></div> ');
else
  continue;
}


for(i=0; i<crew.length/2; i += 1){

image_url = "http://image.tmdb.org/t/p/w500"+crew[i].profile_path+"";

if(imageExists(image_url))
  $('#crew').append('<div class="app-img-wrapper">  <a href="http://kenwheeler.github.io/slick/img/fonz1.png" class="app-img-link" title="Image 1"><img src="http://image.tmdb.org/t/p/w500'+crew[i].profile_path+'" class="img-responsive app-img" alt="App"><h4 class="app-img-text">'+crew[i].name + ' (<small>'+crew[i].job+'</small>)'+'</h4></a></div> ');
else
  continue;

}


if(images[12]){
for(i=0; i<13; i += 1){

  $('#gallery_photos').append('<a href="http://image.tmdb.org/t/p/w500'+images[i].file_path+'"" data-lity  ><img class="max" src="http://image.tmdb.org/t/p/w500'+images[i].file_path+'"></a>');

}
}
else
  $('#gallery_photos').html('<div class="col-sm-12"> <h4>No Images Found for This Movie</h4>')

} //  @@ if images exsists !!
 });
}
*/
