@extends('layouts.app')

@section('content')



<div class="container">
    <div style="margin-top: 15%" class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div><br>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer style="padding: 5%; margin-top: 30%; background-color:white;" class="global_footer footer_1"> <div class="container"> <div class="row"> <div class="side1 col-xs-12 col-sm-6 col-md-6"> <div> <span class="footer_name">Moviex</span> </div> <div>                                Copyright © 2018 All rights reserved
                            </div><div style="margin:5px 0;"><a href="/terms?w=1226476" class="">Terms</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="/privacy?w=1226476" class="">Privacy</a>&nbsp;&nbsp;&nbsp;&nbsp;</div></div> <div class="side2 col-xs-12 col-sm-6 col-md-6"> <ul class="navPages nav navbar-nav hidden-xs" style="opacity: 1;"> <li class="moduleMenu active"> </li> </ul> 
                                <div class="social-icons">
                                    <ul class="list-inline"><li><a href="http://boomer.com" target="_blank"><i class="fa fa-facebook fa-fw fa-2x"></i></a></li><li><a href="http://boomer.com" target="_blank"><i class="fa fa-youtube fa-2x"></i></a></li><li><a href="http://boomer.com" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></li></ul></div></div> </div> </div> </footer>

                                    
@endsection()