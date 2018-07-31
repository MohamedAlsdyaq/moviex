  <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Moviex') }}</title>
       <!-- Scripts -->

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
    <script src="/js/basic.js"></script>
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

    <style>

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
 }
body {
   
  background: #eee;
  min-height: 520px;
}
        .w3-modal{
          background-color: rgba(0,0,0,0.9); height: 100% margin-bottom:30px;
        }
    </style>
</head>

<body>

<div style="display: none; visibility: hidden;" id="detirmine_height"> </div>

@if(Auth::check())
<input type="hidden" value="{{Auth::user()->id}}" id="my_id">
@endif
   <div id="">
<nav style="    max-height: 54px;" id="real_nav" class="navbar-default transition hd show navbar navbar-dark bg-dark  ">
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
<img style="max-width: 120px" src="/index.png">
</a>

</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">
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
 <ul class="nav navbar-nav ">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i>  </a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
              </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
              <li>
                <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Plato</a> Followed You <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                
                <hr>
                <p class="time">a day ago.</p>
                </div>
              </li>
 
 
            </div>
            <div class="notify-drop-footer text-center">
              <a href=""><i class="fa fa-eye"></i> Mark all seen</a>
            </div>
          </ul>
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

 
<input type="hidden" id="write_on_me" value="">
<script>

    $(function() {
    $('input[class="touchspin-4"]').TouchSpin({
      verticalbuttons: true
    });
  });
    function formatDate(date) {
 
      date = date.toString().split(" ");
      date = date[0].toString().split("-");

  var monthNames = [
    "Jan", "Frb", "Mar",
    "April", "May", "June", "July",
    "Aug", "Sep", "Oct",
    "Nov", "Dec"
  ];

 if(date[1][0] == 0)
    date[1] = date[1].slice(1);
    console.log(date[1]);
date[1] = monthNames[date[1]];
console.log(date);
  return date[2] + '-' + date[1];
}
</script>
 
</body>
</html>
