
var to = 2018;
var froms = 1900;
var vote_from = 0;
var vote_to = 100;
var adult = '&include_adult=false';
var sort = 'vote_count';
var certification = '&certification_country=US&certification=';
var generes = [];
var keywords = [];
var runtime_from = '';
var runtime_to = '';
var u = window.location.href;
if(window.location.href.indexOf("?") > -1) {
  u = u.split('?');
  data = u[1].split('=');
  var setting = data[0];
  var id = data[1];
 
  eval(setting).push(id);
  
}
if(window.location.href.indexOf("?q") > -1) {
  u = u.split('?q=');
  var id = u[1];
 
  nor_search(id, 10);
  
}
function themes(id){
    console.log(id);
   $.ajax({
            type: 'GET',
            url:'https://api.themoviedb.org/3/search/keyword?query='+id+'&api_key=54f297aa644bf4f27044771fc75cbb64&page=1' ,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            success: function(ajax) {
              console.log('hai'+ajax.results[0].id);
              keywords.push(ajax.results[0].id);
              adv_search();

            }
          });
 

}

function nor_search(query, wait){
  query = query.value;
   setTimeout(function(){ 
  window.moviex_global_url = 'https://api.themoviedb.org/3/search/tv?api_key=54f297aa644bf4f27044771fc75cbb64&language=en-US&query='+query+'&include_null_first_air_dates=true&include_adult=false&page=1';
 console.log(window.moviex_global_url);
  $.ajax({
            type: 'GET',
            url: window.moviex_global_url ,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function(){
              $('.searching_results').html('<img style="display:block; margin:auto" src="/img/big_ring.gif" >')
            },
            success: function(ajax) {
                $('.searching_results').html('');
  data = ajax.results;
  console.log(data);
  for(i=0; i<data.length; i++){
    if(data[i].original_language != 'en')
      continue;
    bio = data[i].overview.replace(/"/g, '`');

    heart = "fa heart fa-heart"; 
   // style = ' style=`  overflow: hidden;    text-overflow: ellipsis;     white-space: nowrap; height: 20px; `';
  $('.searching_results').append('<div data-toggle="popover" data-placement="left" data-original-title="<h6>'+data[i].original_name + '<span> '+ get_year(data[i].first_air_date)+'</span></h6><h6><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].vote_average+'</sp></h6>" data-content="<div ><h6>'+bio+'</h6></div>" onclick="go_to_page("/movie/'+data[i].id+'")" class="search_poster"> <div id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].poster_path+');" > <div class="bottom dropdown"> <a class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1"   onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1"    onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul></div></div><div class="ellipsis"><a href="/tv/'+data[i].id+'"><h6 >'+data[i].original_name+'</h6></a></div></div>');
    }
    if(data.length <= 0)
       $('.searching_results').html('<div  ><h3 class="text_center" > No Results Found .. </h3> </div>');
 $('.searching_results').append( '<br><br><div class="no_more" >  </div> ' );   
            } // end success 
    
    });// end ajax 

}, wait);
}
function adv_search(){
 console.log(keywords);
window.moviex_global_url = 'https://api.themoviedb.org/3/discover/tv?api_key=54f297aa644bf4f27044771fc75cbb64&language=en-US&sort_by='+sort+'.desc'+certification+ adult+'&include_video=false&with_genres='+generes+ '&with_keywords=' +keywords+'&vote_average.gte='+vote_from+'&vote_average.lte='+vote_to+'&first_air_date.gte='+froms+'&first_air_date.lte='+to+'&with_runtime.gte='+runtime_from+'&with_runtime.lte='+runtime_to+'&page=1'; 
console.log(generes);
 console.log(window.moviex_global_url);
$.ajax({
            type: 'GET',
            url: window.moviex_global_url ,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function(){
              $('.searching_results').html('<img style="display:block; margin:auto" src="/img/big_ring.gif" >')
            },
            success: function(ajax) {
                $('.searching_results').html('');
  data = ajax.results;
  console.log(data);
  for(i=0; i<data.length; i++){
    if(data[i].original_language != 'en')
      continue;
    bio = data[i].overview.replace(/"/g, '`');
    if( data[i] > 1)
      sesns = '(Seasons)';
   // style = ' style=`  overflow: hidden;    text-overflow: ellipsis;     white-space: nowrap; height: 20px; `';
  $('.searching_results').append('<div data-toggle="popover" data-placement="left" data-original-title="<h6>'+data[i].original_name + '<span> '+ get_year(data[i].first_air_date)+'</span></h6><h6><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].vote_average+'</sp></h6>" data-content="<div ><h6>'+bio+'</h6></div>" onclick="go_to_page("/movie/'+data[i].id+'")" class="search_poster"> <div id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].poster_path+');" > <div class="bottom dropdown"> <a class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1"   onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `watching`, null);" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1"   onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `completed`, null);" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1"    onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `watchlist`, null);" class="dropdown-item" type="button">watch List</a> </li> </ul></div></div><div class="ellipsis"><a href="/tv/'+data[i].id+'"><h6 >'+data[i].original_name+'</h6></a></div></div>');
    }
    if(data.length <= 0)
       $('.searching_results').html('<div  ><h3 class="text_center" > No Results Found .. </h3> </div>');
 $('.searching_results').append( '<br> <br> <div class="no_more" >  </div> ' );   
            } // end success 
    
    });// end ajax 

}

function load_more(){
   
  url = window.moviex_global_url.split('page=');
console.log('url[1] is  '+url[1]);  
  current = url[1];
  current++;

  uri = url[0] + 'page='+current;
  console.log(uri);
window.moviex_global_url = uri;
console.log(uri);
  $.ajax({
            type: 'GET',
            url: uri ,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            beforeSend: function(){
              $('.searching_results').append('<img class="loader" style="display:block; margin:auto" src="/img/big_ring.gif" >')
              $('.no_more').removeClass('no_more');
            },
            success: function(ajax) {
               $('.loader').remove();
  data = ajax.results;
  console.log(data);
  for(i=0; i<data.length; i++){
    if(data[i].original_language != 'en')
      continue;
      bio = data[i].overview.replace(/"/g, '`');
  $('.searching_results').append('<div data-toggle="popover" data-placement="left" data-original-title="<h6>'+data[i].original_name + '<span> '+ get_year(data[i].first_air_date)+'</span></h6><h6><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].vote_average+'</sp></h6>" data-content="<div ><h6>'+bio+'</h6></div>" onclick="go_to_page("/movie/'+data[i].id+'")" class="search_poster"> <div id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].poster_path+');" > <div class="bottom dropdown"> <a class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1"   onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `watching`, null);" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1"   onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `completed`, null);" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1"    onclick="add_to_lib('+data[i].id+', `http://image.tmdb.org/t/p/w154'+data[i].poster_path+'`, `'+data[i].original_name+'`, `watchlist`, null);" class="dropdown-item" type="button">watch List</a> </li> </ul></div></div><div class="ellipsis"><a href="/tv/'+data[i].id+'"><h6 >'+data[i].original_name+'</h6></a></div></div>');
 
    }

 $('.searching_results').append( '<br><br><div class="no_more" >  </div> ' );   
            } // end success 
    
    });// end ajax 

}

function add_to_lib(id, pic, name, status, score, ep_count){
 



var url = 'http://api.themoviedb.org/3/tv/'+id+'?api_key=54f297aa644bf4f27044771fc75cbb64';

$.ajax({
            type: 'GET',
            url: url,
            async: false,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            success: function(ajax) {
              window.moviex_global_ep_count = ajax.number_of_episodes;
              window.moviex_global_seasons = ajax.number_of_seasons;

}
});
   var data = {
    status: status,
    score: score,  
   movie_id: id,
   movie_pic: pic,
   movie_name: name,
  ep_count: window.moviex_global_ep_count,
  seasons: window.moviex_global_seasons,


    }
       
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
 
$.ajax({

    //do a call to the list table and add the movie as 
    url: '/entry/tv/lib/'+id,
    data: data,
    type: 'POST',
    beforeSend: function(){
        
   
    }, 
    success: function(d){
        console.log(d);
  check('Series has been added to '+status+' successfuly!');
        
    }
    
}); // end $.ajax()
    
}//end function ajax()


// Create jQuery Method
jQuery.fn.isFullyVisible = function(){

var win = $(window);

var viewport = {
    top : win.scrollTop(),
    left : win.scrollLeft()
};
viewport.right = viewport.left + win.width();
viewport.bottom = viewport.top + win.height();

var elemtHeight = this.height();// Get the full height of current element
elemtHeight = Math.round(elemtHeight);// Round it to whole humber

var bounds = this.offset();// Coordinates of current element
bounds.top =  bounds.top + win.height();
bounds.right = bounds.left + this.outerWidth();
bounds.bottom = bounds.top + this.outerHeight();
//console.log('Win Height '+ $('body').innerHeight()+'viewport.bottom '+ viewport.bottom + ' &bounds.top '+ bounds.top +'viewport top '+viewport.top + ' bounds.bottom '+bounds.bottom );

return (!( viewport.bottom > $('body').innerHeight()    ));

}

//Usage:
$(window).on('scroll', function() {

  if(! $('.no_more').isFullyVisible() ){
    //$('.no_more').removeClass('no_more');
    load_more();
  }
});

 

    $(document).ready(function(){
        $('a').click(function(event){
    event.preventDefault();
 console.log('fdsfdsfsd');
  
    }); });