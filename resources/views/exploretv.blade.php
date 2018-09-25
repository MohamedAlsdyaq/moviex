@extends('layouts.app')

@section('content')
<head>
	<style type="text/css">
	.black > a{
		color: black;

	}
		.black > a:hover{
		text-decoration: none;

	}
		.search_poster{
			margin-top: 0px;
			cursor: pointer;
		}
		.bottom{
			bottom: 20px;
			margin-left: 25px;
		}
	</style>
</head>
<div style="padding: 2%" >
	<div style="float:left;width: 71%" >

<h3 style="font-weight: bold;" >Explore Tv Series </h3>
 
<div style="width: 100%" class="card-body row no-gutters align-items-center">
    
                                    <!--end of col-->
<div class="col-xs-12" style="height: 40px; width: 100%;background: white;">
    <div style="margin: 10px 10px auto 0;  background-color: white; float: left;" class="col-auto">
         <i class="fas fa-search  "></i>
    </div>
  <input style=" width: auto !important; float: left;  border: none;  outline: none;  box-shadow: none;" onkeyup="basic_search2()" class="form-control form-control-lg form-control-borderless" placeholder="What are you searching for?" type="search">
  </div>
 </div>
 
<p>Or, browse with the <a href="/search/tv" > advanced search </a>
 
 

 <div style="width:100%; height: 300px;" >
<h4 style="   font-weight: bold;" > On Air </h4>
 
<?php  $limit = 5 ?>
@foreach($upcoming['results'] as $key=>$data)
@if($key == $limit)
@break
@endif()

@if($data['original_language'] !== 'en')
<?php $limit++ ?>
@continue
@endif()
<?php  $id = $data['id'] ?>
<div onclick="go_to_page('/tv/{{$id}}')" class="search_poster">
 <div data-toggle="popover" data-placement="right" data-original-title="<h6>{{$data['original_name']}}  <span style= &quot;color:#dddddd; &quot; > {{$data['first_air_date']}} </span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity:  {{$data['popularity']}} <sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : {{$data['vote_average']}}</sp></small></h5>" data-content="<div ><h6 style= &quot;font-weight:normal !important;  font-size: 12px; &quot;  >{{$data['overview']}}</h6></div>" id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154{{$data['poster_path']}});" > <a class="bottom btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].show_id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].show_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>

</div> 
</div>
@endforeach()
<br>
<a href="/explore/tv/airing" > <p style="float: right; margin: 1%" >see more </a>
</div>
<br>
 
 

 <div style="width:100%; height: 300px;" >
<h4 style="   font-weight: bold;" > Popular </h4>

<?php  $limit = 5 ?>

@foreach($popular['results'] as $key=>$data)

@if($key == $limit)
@break
@endif()

@if($data['original_language'] !== 'en')
<?php $limit++ ?>
@continue
@endif()
<?php  $id = $data['id'] ?>
<div onclick="go_to_page('/tv/{{$id}}')" class="search_poster">
 <div data-toggle="popover" data-placement="right" data-original-title="<h6>{{$data['original_name']}}  <span style= &quot;color:#dddddd; &quot; > {{$data['first_air_date']}} </span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity:  {{$data['popularity']}} <sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : {{$data['vote_average']}}</sp></small></h5>" data-content="<div ><h6 style= &quot;font-weight:normal !important;  font-size: 12px; &quot;  >{{$data['overview']}}</h6></div>" id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154{{$data['poster_path']}});" > <a class="bottom btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].show_id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].show_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>

</div> 
</div>
@endforeach()
<br>
<a href="/explore/tv/popular" > <p style="float: right; margin: 1%" >see more </a>
</div>

<br>
 
 <div style="width:100%; height: 300px;" >
<h4 style="   font-weight: bold;" > Top Rated </h4>
 
<?php $limit = 5 ?>
@foreach($top_rated['results'] as $key=>$data)

@if($key == $limit)
@break
@endif()

@if($data['original_language'] !== 'en')
<?php $limit++ ?>
@continue
@endif()
<?php  $id = $data['id'] ?>
<div onclick="go_to_page('/tv/{{$id}}')" class="search_poster">
 <div data-toggle="popover" data-placement="right" data-original-title="<h6>{{$data['original_name']}}  <span style= &quot;color:#dddddd; &quot; > {{$data['first_air_date']}} </span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity:  {{$data['popularity']}} <sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : {{$data['vote_average']}}</sp></small></h5>" data-content="<div ><h6 style= &quot;font-weight:normal !important;  font-size: 12px; &quot;  >{{$data['overview']}}</h6></div>" id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154{{$data['poster_path']}});" > <a class="bottom btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].show_id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].show_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>

</div> 
</div>
@endforeach()
<br>
<a href="/explore/tv/top_rated" > <p style="float: right; margin: 1%" >see more </a>
</div>
<br>
 
 <div style="width:100%; height: 300px;" >
<h4 style=" margin-bottom: %; font-weight: bold;" > Airing Today </h4>
 
<?php $limit = 5 ?>
@foreach($box_office['results'] as $key=>$data)
@if($key == $limit)
@break
@endif()

@if($data['original_language'] !== 'en')
<?php $limit++ ?>
@continue
@endif()
<?php  $id = $data['id'] ?>
<div onclick="go_to_page('/tv/{{$id}}')" class="search_poster">

<a href="/movie/{{$data['id']}}" >
 <div data-toggle="popover" data-placement="right" data-original-title="<h6>{{$data['original_name']}}  <span style= &quot;color:#dddddd; &quot; > {{$data['first_air_date']}} </span></h6><small style= &quot; color: #dddddd; &quot; ><h5><span style=&quot;float:left;color:red;margin-right:2px;;&quot; class=&quot; fa fa-heart&quot; ></span>  popularity:  {{$data['popularity']}} <sp style=&quot;float:right;&quot; ><span style=&quot;color:yellow;margin:2px;&quot; class=&quot;fa fa-star&quot; ></span>   Av Rating : {{$data['vote_average']}}</sp></small></h5>" data-content="<div ><h6 style= &quot;font-weight:normal !important;  font-size: 12px; &quot;  >{{$data['overview']}}</h6></div>" id="searc_poster_content" style=" background-image: url(http://image.tmdb.org/t/p/w154{{$data['poster_path']}});" > 

 <a class="bottom btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add to library </a>  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4"><li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].show_id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `watching`, null, '+data[i].ep_count+');" >Watching</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="add_to_lib('+data[i].id+','+data[i].show_pic+'`, `'+data[i].show_name+'`, `completed`, null, '+data[i].ep_count+');" >Completed</a> </li>  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="add_to_lib('+data[i].id+',' +data[i].show_pic+'`, `'+data[i].show_name+'`, `watchlist`, null, '+data[i].ep_count+');" class="dropdown-item" type="button">watch List</a> </li> </ul>

</div> </a>
</div>

@endforeach()
<br>
<a href="/explore/tv/airing_today" > <p style="float: right; margin: 1%" >see more </a>
</div>
<br>

</div>
 
<div class="sticky" style="margin-top:  30px;padding:1%;float:left; width: 28%" >
	
	<div style="padding:3%;" class=" white_box" >

<h5 class="text-uppercase">My Favorite Categories</h5>
<hr style="margin: 2px" > 		
<small>Favoriting categories will improve your recommendations.</small>
<br>
<h5 class="text-uppercase">Categories</h5>
<hr style="margin: 2px" > 
 <div class="panel-body"> 

                <div class="col-sm-6">
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=28">Action </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=12">Adventure </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=16">Animation </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=35"> Comedy</a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=80"> Crime</a>
      <p class="text-center black" ><a class="black" href=" /search/tv?generes=9648"> Mystery</a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=99">Documentary </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=18">Drama </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=10751"> Family</a>
                </div>
                <div class="col-sm-6">
                              
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=14">Fantasy </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=36"> History</a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=10402"> Music </a>
      
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=878"> Sci-Fi</a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=10752"> War</a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=37">Western </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=53">Triller </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=27"> Horror </a>
                    <p class="text-center black" ><a class="black" href=" /search/tv?generes=1077"> TV Movie </a>
                </div>

                
</div>


	</div>


</div>

</div>







@endsection()