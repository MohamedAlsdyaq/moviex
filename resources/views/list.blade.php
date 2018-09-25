@extends('layouts.app')

@section('content')
<head>
 
<link rel="stylesheet" href="/css/mylist.css">

</head>

<div id="list_intro">
<div class="container">

<h2 style="font-style: italic; font-size: 60px" > {{$data['title']}} </h2>
<div style="margin-right: 20px;float: left;">
<img class="img-circle" style=" margin-right: 8px; float: left;" width="50" height="50" src="{{$data['user']['picture']}}">
<span style="float: left;">
	<h4> A list By <a>{{$data['user']['name']}} </a> </h4>
	
</span>
<br><h4 style="" style="font-weight: bold;">About this list</h4>



</div>
<button style="float: left;" data-toggle="dropdown"  class="btn btn-default" >Sort By <i class="fas fa-sort-amount-down"></i> </button>


 <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
 	<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="sort = 'show_name'; shows(1)" > Title</a> </li> 
 	 <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="sort = 'show_rating'; shows(1) " >Rating</a> </li> 
 	 <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="sort = 'show_popularity'; shows(1) "> Popularity</a> </li>
 	   </ul>
<?php
if(Auth::check() )
$id = Auth::user()->id;
else 
  $id = 0;
?>
@if($data['type'] == "Public" || $data['user']['id'] == $id)
<button style="float: left;" onclick="add_show_list(this)" class="btn btn-default" >Add new Show <i class="fa fa-plus"></i> </button>
@endif
<div   style="display: none; 
 
width: 30%;

margin-left: 23%;

box-shadow: 5px 5px;

z-index: 100;

position: absolute;

margin-top: 2.8%;" id="listauto" class="  panel panel-default" style=":  ;">
                    <!-- List group -->
                    <ul class="list-group">
                        <div id="autocompleteTest">


                        </div>
                        
                          <div style="background-color: rgba(172, 172, 172, 0.11) !important; color: black; font-weight: bold;" id="fav" class="list-group-item">
                            <div class="row">
                                <div id="favorites" class="">
                                    <div class="">
                                         <b style="float: left;" >Movies</b>
                         <b style="font-weight: normal; font-size: 12px; float: right;"><a id="load_movies" href="/search/movies" > load more </a></b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <li class="list-group-item">
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div id="movies_list" class=' media-middle'>
                                        <a href='#'>
                                            <img style="float: left;" class='media-object img-circle' src='http://placehold.it/40x40'>
                                          <p style="margin: 10px; float: left;" > Fdds 
                                        </a>
                                    </div>
                             
                                </div>
                            </div>
                        </li>

                          <div style="background-color: rgba(172, 172, 172, 0.11) !important; color: black; font-weight: bold;" id="fav" class="list-group-item">
                            <div class="row">
                                <div id="favorites" class="">
                                    <div class="">
                                         <b style="float: left;" >TV Series</b>
                                             <b style="font-weight: normal; font-size: 12px;  float: right;"><a id="load_tv" href="/search/tv" > load more </a></b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <li class="list-group-item">
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div id="tv_list" class=' media-middle'>
                                        <a href='#'>
                                            <img style="float: left;" class='media-object img-circle' src='http://placehold.it/40x40'>
                                          <p style="margin: 10px; float: left;" > Fdds 
                                        </a>
                                    </div>
                             
                                </div>
                            </div>
                        </li>


                       
                     
                 <h6 style="float:right: margin:1%; color: " > <a href="/search/movies" > advanced search      </a> </h6>
                    </ul>

                </div>


</div>

<h4 style="margin-left:  30px;" >{{$data['list_info']}} </h4>
<br>
</div>

<br>
<div style="position: absolute;" id="list_summary">
<div style="width: 30%" >
<h2> {{count($data['listentries'])}} </h2>
<h3> ITEMS ON THIS LIST </h3>
</div>
<div style="width: 30%" >
<h2 id="rating" > # </h2>
<h3>Average Rating</h3>
</div>
<div style="width: 30%" >
<h2 id="runtime" > 1h,43min  </h2>
<h3> Total Runtime</h3>
</div>
 
</div>


<div style="margin-top: 13%;" class="container" id="list_entries">



</div>





<script >
	var sort = 'show_name';
	function shows(pivot) {
		 $('#list_entries').html(' ');
 $.get( "/get/list/entries/"+{{$data['id']}} + '?sort='+sort, function( ajax ) {
  console.log(ajax);
  var vaar ;
 for(var i=0; i<ajax.length; i++ ){
 
 		vaar =  parseInt(Math.round(ajax[i].show_rating) )  + vaar;

  data = ajax;
 
 var dropdown = '<a class="bottom btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].show_id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].show_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>';

  $('#list_entries').append( ' <div onclick="go_to_page("/movie/'+data[i].id+'")" class="search_poster"> <div data-toggle="popover" data-placement="right" data-original-title="<h6>'+data[i].show_name + '<span style= &quot;color:#dddddd; &quot; > '+ get_year(data[i].show_date)+'</span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity: '+Math.round(data[i].show_popularity)+'<sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : '+data[i].show_rating+'</sp></small></h5>" data-content="<div ><h6 style= &quot;font-weight:normal !important;  font-size: 12px; &quot;  >'+data[i].show_bio+'</h6></div>" id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154'+data[i].show_pic+');" > '+dropdown+'</div><div class="ellipsis"><a href="/movie/'+data[i].id+'"><h6>'+data[i].show_name+'</h6></a></div></div> ');
  
 }
});
 console.log(vaar);
	}
	shows(1);
function add_show_list(e){

	$(e).replaceWith('  <input id="searchlist" onkeyup="basic_search(`listauto`, `searchlist`, `movies_list`, `tv_list`)" style="margin-left: 1%;float:left"  autocomplete="off" type="text" name="q" placeholder="Search">');
}
function add_to_list(id, e){
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
tv = null ;
movie = null;
if($(e).attr('data-type') ==  'tv')
tv = $(e).attr('data-type')

if($(e).attr('data-type') ==  'movie')
movie = $(e).attr('data-type')

$.ajax({

    //do a call to the list table and add the movie as 
    url: '/list/entry/add',
    data: {
		movie_id: $(e).attr('data-movie'),
		list_id : {{$data['id']}},
		movie   : movie,
		tv      : tv
    	
},
    type: 'POST',
    success: function(d){
$('#listauto').hide();
shows(1);

    }
});


}
</script>







@endsection