  <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Moviex') }}</title>
       <!-- Scripts -->
   <link rel="stylesheet" type="text/css" href="/css/movie.css">    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.js">
   
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chang_section.js"></script>
        <script src="/js/follow.js"></script>
    <script src="/js/basic.js"></script>
     <script src="/js/group_controll.js"></script>
        <script src="/js/prover.js"></script>
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
    <script src="/js/guest.js"></script>
       <script src="/js/upload.js"></script>
              <script src="/js/post_anchor.js"></script>
        
                 <link rel="stylesheet" href="/css/ajax-bootstrap-select.min.css">
  <script src="/js/ajax-bootstrap-select.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js "></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.2.2/lity.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.2.2/lity.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/images-grid.css">
<script type="text/javascript" src="/js/images-grid.js"></script>
    <style>
    html{
      min-width: 1299px;
    }
 .sticky {
   position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 9px;
  
 }
#searc_poster_content{
    z-index: 5; 
    background-repeat: no-repeat !important;
    background-position: 70% 0% !important;
    transition: .5s ease;
    background-size: cover !important;
min-height: 231px;
  min-width: 140px;
  max-width: 160px;
        border-radius: 3px;
}
  #searc_poster_content:after{
  display: none;
  vertical-align: bottom;
  content: '  ';
  text-align: center;
  color: white;
min-height: 231px;
  min-width: 140px;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
         
    
}
#searc_poster_content:hover .bottom{
  display: block;
}

#searc_poster_content:hover:after{
  display: block;
}
. .media-left{
  display: block !important ; 
}
.search_poster{
 
  position: relative;
  float:left;
  text-align: center;
   font-weight: normal;
     min-width: 175px;
     margin-top: 60px;
     margin-left: 0px;
}


.search-container{
  width: 100%;
  margin-left: -35px !important ;
  margin-top:  -30px !important;
  display: block;
 position: relative;
margin-bottom: 30px;

}

#color_black{
  color: black !important;
}
.bottom{
  display: none;
  bottom: 40px;
  margin-left: 15px;
  position: absolute;
}
input#search-bar::-webkit-input-placeholder{
      transition: opacity 0.45s ease; 
      opacity: 0;
     }
input#search-bar:-moz-placeholder {
      transition: opacity 0.45s ease; 
      opacity: 0;
     }
 
input#search-bar:-ms-placeholder {
     transition: opacity 0.45s ease; 
     opacity: 0;
     }    
input#search-bar{
  margin: 0 auto;
  width: 105%;

  height: 60px;
  padding: 0 20px;
  font-size: 1rem;
  border: 1px solid #D0CFCE;
  outline: none;
}
.search-icon{
  position: relative;
  float: right;
  width: 75px;
  height: 75px;
  top: -62px;
  
}


.ellipsis{

   overflow: hidden;
    text-overflow: ellipsis; 
     white-space: nowrap; 
     width: 160px; 
}
.ellipsis > a{
 
    color: #2A364C;
  font-size: 1.2em;
   
  text-decoration: none;
}
h6 {
    font-weight: bold !important;
 
}
.ellipsis > a:hover{
   
    color: rgb(140,180,255);
  
}
    .popover > .arrow{
      border-top-color: #7f8c8d !important; 
      top: 10px !important; 
      right:-20px !important; 
          -webkit-transform: rotate(-90deg) !important;
           
    -moz-transform: rotate(-90deg) !important;
    -o-transform: rotate(-90deg) !important;
    -ms-transform: rotate(-90deg) !important;
    transform: rotate(-90deg) !important;

    }
 .fade{
 opacity: 1 !important;
 }
 .popover .popover-content {

overflow: auto; }
 .popover .fa {

opacity: 0.5; }
 .popover{
  background-color: #7f8c8d;
  padding: 1%;
  color: white;
  font-weight: bold;
  
 }
 .no_more{
  margin-top: 100px;

 }
 .popover-body{
   overflow: hidden;
    text-overflow: ellipsis; 
     
     max-height: 150px; 
  
 }
 .popover-body:before {
    content:'';
    width:100%;
    height:100%;    
    position:absolute;
    left:0;
    top:0;
    background:linear-gradient(transparent 170px, #7f8c8d);
}
 .popover-header > span{
  color: #d3d3d3;
 
 }
  .popover-header > i{
  color: #d3d3d3;
  float: right
 }
 .nav-avatar{
  border: 2px solid rgb(180,220,255) ;
  margin-top: -5px;
  margin-bottom: -10px;
 }
body {
   
  background: #f7f7f7;
  min-height: 520px;
}
        .w3-modal{
          background-color: rgba(0,0,0,0.9); height: 100% margin-bottom:30px;
        }
        .slider{
          font-weight: normal !important;
        }
.bordered_btn{
  float: right;
  cursor: pointer;
  border-radius: 2px;
  margin-right: 5px;
  border: 1px grey solid;
  color: grey;
  padding : 0%;
  width: 30px;
  height : 20px;
  text-align: center;
  font-size: 13px;
}
.bordered_btn:hover{
  border: 1px #83b6db solid;
  color: white;
}
.bordered_btn>a{
  text-decoration: none;
  color: black;
}
.navbar-default .navbar-nav > li > a {
  color: #dadede !important;
  font-weight: bold;
  
}
#search_container{
  width: 400px;
}
 
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > li > a:hover {
 
    color: #f6f5f5 !important;
  
}
body{
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif !important;

  font-weight: 400 !important;
  src: url("https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-regular-webfont.woff")  !important;

}
h1{
  font-family: Asap,sans-serif;
  font-size: 15px;
}
 .bg-dark{color: white !important; transition: .5s ease;
  min-height: 50px;
  border-radius: 0px !important; background-color: #667273; border: #667273 !important; color: white !important; position: fixed; z-index: 1000 !important;  max-height: 39px !important; width: 100%;
}
hr{
  margin-top: 30px;
}

    </style>
</head>

<body>

 <input type="hidden" id="my_id" value="{{Auth::user()->id}}" name="">   

<div style="display: none; visibility: hidden;" id="detirmine_height"> </div>

@if(Auth::check())
<input type="hidden" value="{{Auth::user()->id}}" id="my_id">
@endif
   <div id="">

<nav style="" id="real_nav" class="navbar-default transition hd show navbar navbar-dark bg-dark  ">
<div class="">
<div class="navbar-header">

<!-- Collapsed Hamburger -->
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<!-- Branding Image -->
<a class="navbar-brand" href="{{ url('/') }}">
<img style="  margin-top: -5px; max-width: 120px" src="/index.png">
</a>

</div>

<div  >
<ul class="nav  navbar-nav">
&nbsp;

    
    <li class="navs dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    
  Browse <span class="caret"></span>
</a>

<ul class="dropdown-menu" role="menu">
  <li>
     <a href="/search/movies">
        Explore Movies
        </a>

    </li>  
    
      <li>
     <a href="/search/tv">
        Explore TV Series
        </a>

    </li>  
    
    
    
</ul>
</li>

    <li class="navs ">
<a href="/group"  >
    
  Groups 
</a>

 
</li>

    <li class="navs ">
<a href="/list"  >
    
  Lists 
</a>

 
</li>
    
    
   <li id="search_container" >
                 <div>
                    <!-- Default panel contents -->
                    <div class="">
                       

                        <a>      
    <form id="nav-search" action="/search" method="get" role="search">
  <div class="search">

    <input id="searchText" onkeyup="basic_search('autolist', 'searchText', 'movies_results', 'tv_results')" style="color:white;   height: 50px;"  autocomplete="off"
 type="text" name="q" class="search" placeholder="Search">
  

  </div>
     </form>
       </a>


                         
                            
                        
                    </div>
<div   style="display: none; " id="autolist" class="  panel panel-default" style=":  ;">
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
                                    <div id="movies_results" class=' media-middle'>
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
                                    <div id="tv_results" class=' media-middle'>
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

          
             </li> 
            <ul style=" float: right; margin-left: 220px;" class="nav navbar-nav navbar-right">
<!-- Authentication Links -->
@if (Auth::guest())
<li class="navs"><a href="{{ url('/login') }}">Login</a></li>
<li class="navs"><a href="{{ url('/register') }}">Register</a></li>
@else
 <li>
     <a href="{{ url('/') }}" >
    
         Home
         
     </a>
    
</li>       
 <li class="nav navbar-brandv ">
        <li class="dropdown">
          <a style=" " s href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i onclick="setTimeout(function(){ all_seen( ); }, 2500);" class="far fa-bell"></i>  </a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
              <div class="row">
                <div style="color: black; margin: 0 0 0 4%;" class=" "> <a href="/notifications" >NOTIFICATIONS (<b class="far fa-bell" > </b>) </a> </div>
               
              </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
            <div id="notification_body"></div>
 
            </div>
            <div class="notify-drop-footer text-center">
              <a onclick="all_seen( )" href="#"><i class="fa fa-eye"></i> Mark all seen</a>
            </div>
          </li>
        </li>
      </ul>
<span id="n_count" class="badge"></span></a>

        </li>
    
 
    
<li  class="navs dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    
   <img class="nav-avatar img-circle" src="{{ Auth::user()->picture }}"  height="35px"  width="35px" > <span class="caret"></span>
</a>

<ul class="dropdown-menu" role="menu">
    <li>
     <a href="{{ url('profile/'.Auth::user()->id) }}">
       <i class="fa fa-paper-plane" aria-hidden="true"></i>
        My Profile
        </a>

    </li>
    
    <li>
     <a href="{{ url('list/'.Auth::user()->id) }}">
       <i class="fa fa-list-ul" aria-hidden="true"></i>
        My Library
        </a>

    </li>
        <li>
        <a href="{{ url('/setting/account') }}"
            >
         <i class="fa fa-sign-out" aria-hidden="true"></i>
            Settings
        </a>

        
    </li>

    <li>
        <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
         <i class="fa fa-sign-out" aria-hidden="true"></i>
            Logout
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
</li>
@endif
</ul>
  </div>
    </div>
 
 
   


<!-- Right Side Of Navbar -->

</div>

</div>
    

</nav>




















 <div style="content: ' ' ;  height: 72px;" > </div>
    <div id="login-form" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('login-form').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                <heading>
                     <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'new_signup')">Signup</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'new_login')">Login</button>

  </div>
                </heading>
            </div>

 <div class="new_container city" id="new_login" >
           <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}

              <h2>Login</h2>
             
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autofocus required="required">
                  @if(isset($errors))
                  @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                  @endif
                 
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input id="password" type="password"   type="password" class="form-control" name="password" placeholder="Password" required="required">
                  @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
              </div>
               
                <div class="form-group">
                                  <div class="">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                          </label>
                                      </div>
                                  </div>
                              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success  bt">Login</button>
              </div>
          </form>
</div>

<div  class="new_container city" id="new_signup">
  <form action="{{ route('register') }}" method="post">
            {{ csrf_field() }}
                 <div class="form-group"> 
                   <div class="row">
                <div class="col-xs-6"><input type="text" class="form-control" name="name" placeholder="Display Name" required="required"></div>
                <div class="col-xs-6"><input type="text" class="form-control" name="username" placeholder="Username" required="required"></div>
            </div>  
<br>
                    <input id="email" name="email" placeholder="email" class="form-control" required="" data-msg-required="This field is required." aria-required="true" type="text"> </div> <div class="form-group"> 

                <input type="password" id="pass" name="password" placeholder="password" class="form-control" type="text"> </div>
                 <div class="form-group"> 

                <input type="password" id="contact_phone" name="password_confirmation" placeholder="confirm password" class="form-control" type="text"> </div>


              

                 <button type="submit" class="btn btn-primary ">Sign Up</button>

                   <input name="w" value="1226476" type="hidden"> <input name="websiteID" value="1226476" type="hidden"> 
                     <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="/terms">Terms of Use</a> &amp; <a href="/Privacy">Privacy Policy</a></label>
                     </div>
                   </form>   @endif
</div>
        </div>
    </div>
@yield('content')
</div>

 <div id="target_modals" ></div>
<input type="hidden" id="write_on_me" value="">
<script>

 
    function formatDate(date) {

      time = new Date;
      
      date = date.toString().split(" ");

 
     
       

       b = date[0].split("-");
      //console.log(b);
       
        if(time.getFullYear() > b[0]) // check yrs
          return  time.getFullYear() - b[0] + 'years ago';
        if(time.getMonth()+1 > b[1]) // check months
          return time.getMonth()+1 - b[1] +' months ago';
         if(time.getDate() > b[2]) // check days
          return time.getDate() - b[2] +' days ago';

        d = date[1].split(":");
            //console.log(d);
         if( 24 - time.getHours() > d[0]) // check hourse
          return 24 -time.getHours() - d[0] +' hourse ago';
        if(time.getMinutes() > d[1]) // check minutes
          return time.getMinutes()  - d[1] +' hourse ago';

         return 'a few seconds ago'; 
      
      
      date = date[0].toString().split("-");


  var monthNames = [
    "Jan", "Frb", "Mar",
    "April", "May", "June", "July",
    "Aug", "Sep", "Oct",
    "Nov", "Dec"
  ];

 if(date[1][0] == 0)
    date[1] = date[1].slice(1);
   
date[1] = monthNames[date[1]];
 
  return date[2] + '-' + date[1];
}

/**
 * Created by Mitko on 9/8/2016.
 */
function basic_search(e, i,movieshtml, tvshtml){
  if($('#'+i).val().length >= 3){
        $("#"+e).css('display', 'block');
      $('.media-middle').html('<img style="display: block;margin-left: auto;margin-right: auto;" src="/img/loaderIco.gif" >') ; 
      search_movie( $('#'+i).val(),  search_tv ,movieshtml, tvshtml );
      
      }
  else
      $("#"+e).css('display', 'none');
      
    } 
    function search_movie(query, callback, movieshtml, tvshtml){
      $('#load_movies').attr('href', '/search/movies?q='+query);
      var url = 'http://api.themoviedb.org/3/',
mode = 'search/movie?query=',
input,
query,
key = '&api_key=54f297aa644bf4f27044771fc75cbb64&language=en';

$.ajax({
            type: 'GET',
            url: url + mode + query + key,
            async: true,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            success: function(ajax) {
        //console.log(ajax);
                $('#'+movieshtml).html('');
                j=0;
              for (var i = 0; j <=3; i++) {
                 j++;
                if(ajax.results[i].original_language != "en"){
                       j--;
                  continue;
                }
                //console.log(j);
               $('#'+movieshtml).append("  <div data-type='movie' data-movie='"+ajax.results[i].id+"' data-type='movie' onclick='add_to_list("+ajax.results[i].id+", this)' class='one_result col-md-12' style='width: 100%' ><a   href='/movie/"+ajax.results[i].id+"'>                                            <img style='max-width: 45px; float: left;' class='media-object img-'   src='http://image.tmdb.org/t/p/w92"+ajax.results[i].poster_path+"'>  <p class='search_elipsis' style='margin: 10px; float: left;' > "+ajax.results[i].original_title+"                                        </a></div><br>");
              
              }

               callback(query, tvshtml);
            }

          });



    }
     function search_tv(query, tvshtml){
       $('#load_tv').attr('href', '/search/tv?q='+query);
      var url = 'http://api.themoviedb.org/3/',
input,
query,
key = '&api_key=54f297aa644bf4f27044771fc75cbb64&language=en-US';



$.ajax({
            type: 'GET',
            url: url + 'search/tv?query=' + query + key,
            async: true,
            jsonpCallback: 'testing',
            contentType: 'application/json',
            dataType: 'jsonp',
            success: function(ajax) {
              j = 0;
              if(ajax.results.length <= 0)
                 $('#'+tvshtml).html('<p> No results found');
              //console.log(ajax);
                $('#tv_results').html('');
              for (var i = 0; j <=3; i++) {
                j++;
                if(ajax.results[i].original_language !== 'en'){
                  j--;
                  continue;
                }
               $('#'+tvshtml).append("  <div data-type='tv' data-movie='"+ajax.results[i].id+"' onclick='add_to_list("+ajax.results[i].id+", this)' class='one_result live_result col-md-12' style='width: 100%' ><a  href='/tv/"+ajax.results[i].id+"'>                                            <img style='float: left;max-width: 45px;' class='media-object -circle'   src='http://image.tmdb.org/t/p/w92"+ajax.results[i].poster_path+"'>  <p class='search_elipsis' style='margin: 10px; float: left;' > "+ajax.results[i].name+"                                        </a></div><br>");

             
              }
            }

          });

    }
 


 
            $.ajax({
          type: 'GET',
          dataType: "json",
          url: '/notifications/count',
           
          success: function(e){
            if(!e == 0)
        $('.fa-bell').append(e);
          }
        });

             $.ajax({
          type: 'GET',
          dataType: "json",
          url: '/notifications/get',
           
          success: function(e){
for(i=0; i<e.length; i++){
  
  style = 'style';

  action = '';
  if(e[i].type == "comment")
    action = ' left a comment on your post';
  if(e[i].type == "mention")
    action = 'mentioned you ';

  if(e[i].type == "like")
    action = 'liked your comment';

 $('#notification_body').append( '<div class="noti'+e[i].saw+' '+style+'" style=" width: 100%; color:black; padding: 2%" id=" color_black" > <div style="" > <div style="float:left "><div class="notify-img"><a href="/profile/'+e[i].user.name+'"><img style="margin: 2%" width="40" height="40" src="'+e[i].user.picture+'" alt=""></a></div></div> <div style="margin-left: 4%;float:left "><a href="/profile/'+e[i].user.name+'">'+e[i].user.name+'</a>  '+action+'           <p style="color: #999" class="time">'+formatDate(e[i].created_at)+'</p>             </div> </div><br><br> </div>');
 }
          }
        });

    function all_seen(){
$.ajax({
          type: 'GET',
          dataType: "json",
          url: '/notifications/saw',
          success: function(e){
            $('.fa-bell').html('');    
            $('.noti0').removeClass('noti0');
          }
        });

    }
    function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
$(document).ready(function(){
  $(button).click(function(e){
    e.preventDefault();
  });
   $(document).click(function(e){
 
 if(e.target.offsetParent.id != "search_container"){
      $('#autolist').hide();
    }

    }); 
});
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
bounds.top =    bounds.top ;
bounds.bottom =   win.height() - bounds.bottom;
bounds.right = bounds.left + this.outerWidth();
//console.log('Win Height '+ $('body').innerHeight()+'viewport.bottom '+ viewport.bottom + ' &bounds.top '+ bounds.top +'viewport top '+viewport.top + ' bounds.bottom '+bounds.bottom );

return (!( viewport.bottom  < bounds.top   ));

}
</script>
 
</body>
</html>
