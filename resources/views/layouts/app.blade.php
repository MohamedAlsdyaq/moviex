<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <style>
        body{
            background-color: #fff;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
       <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.js">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chang_section.js"></script>
    <script src="/js/basic.js"></script>
</head>

<body>




   <div id="nav">
<nav id="real_nav" class="transition hd show navbar navbar-default navbar-static-top">
<div class="container">
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
Moviex
</a>

</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">
<ul class="nav navbar-nav">
&nbsp;

    
    <li class="navs dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    
  Browse <span class="caret"></span>
</a>

<ul class="dropdown-menu" role="menu">
  <li>
     <a href="/browse/12">
        Action
        </a>

    </li>  
    
    <li>
     <a href="/browse/18">
        Drama
        </a>

    </li>
     <li>
     <a href="/browse/35">
        Comedy
        </a>

    </li>
     <li>
     <a href="/browse/99">
        Documentary
        </a>

    </li>
    
    
    
</ul>
</li>
    
    
   <li id="search_container" >
 <a>      
    <form id="nav-search" action="/search" method="get" role="search">
  <div class="search">

    <input  onclick="NavSearch()"   autocomplete="off"
 type="text" name="q" class="search" placeholder="Search">
  </div>
     </form>
       </a>
    </li> 
   
</ul>
  

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
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
<li class="navs" id="notification_li"><a id="notificationLink" href="/notifications">Notification

<span id="n_count" class="badge"></span></a>

        </li>
    
 
    
<li  class="navs dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    
   <img src="/{{ Auth::user()->picture }}"  height="50px"  width="50px" > <span class="caret"></span>
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
    

</nav>
@yield('content')
</div>


<script>
    $('#real_nav').hover(function () {
      
         $('#real_nav').addClass('navbar-default');
    });

$('#real_nav').mouseleave(function(){
  $('#real_nav').removeClass('navbar-default');
});


    $(window).scroll(function() {
        if ($(window).scrollTop() < 100 ){
            $('#real_nav').removeClass('navbar-default');
        } else {
           $('#real_nav').addClass('navbar-default');
        };
    });
</script>
 
</body>
</html>
