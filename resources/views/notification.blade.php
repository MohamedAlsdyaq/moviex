@extends('layouts.app')

@section('content')
<head>
 
 <link href="/css/noti.css" rel="stylesheet">
</head>

 
   <div class="notification_container ">

<h5 class=" card-title">
  <span onclick="ChangeContet(this, 'all')" class="tog " >Interactions </span>   
    <span onclick="ChangeContet(this, 'mention')" class="tog grey"> Mentions</span>
  </h5>

@foreach($notifications as $n)
<?php
     $thumnail = ' ';
 
if($n['type'] ==  "follow"){
      $post = ' ';
      $action = ' Followed you ';
 
      
    }
if($n['type'] ==  "like"){
      $post = "<a style='color: #337ab7;' href='/post/".$n['post']['id']."' > post </a>";
      $action = ' Liked your ';
//$thumnail = "<a href='/post/".$n['post']['id']."' ><div class='post_thumnail' >       <h6 style='font-weight: 200; margin: 15px 0 0 15px;  ' >".$n['post']['user']['name'] ." </h6>       <h6 style='font-weight: normal;' >". $n['post']['content']." </h6></div></a>";
 }
   if($n['type'] ==  "comment"){
            $post = "<a style='color: #337ab7;' href='/post/".$n['post']['id']."' > post </a>";
      $action = ' Replied to your ';
     // $thumnail = "<a href='/post/".$n['post']['id']."' ><div class='post_thumnail' >       <h6 style='font-weight: 200; margin: 15px 0 0 15px;   ' >".$n['post']['user']['name'] ." </h6>       <h6 style='font-weight: normal;' >". $n['post']['content']." </h6></div></a>";
      }
?>
<div class="noti" > 

  <div> 
 <img style="float:left; max-width: 45px;" src="{{ $n['user']['picture'] }}">
   
    </div>
    <div style="float: left;" >
    <a style="color: #337ab7;" href="/profile/{{ $n['user']['id'] }}" >
    <h6 style="font-weight: 200; margin: 15px 0 0 15px;   " >{{ $n['user']['name'] }}</a>  {!!$action!!} {!!$post!!}. <span class="time" >{{$n['created_at'] }} </span>
    </h6>
  <div style="float: right; margin-bottom: 20px;" > {!!$thumnail!!} </div>
 </div>

</div>

<hr style="margin: 1px; width: 120%" >
@endforeach()
<br>
<a style="color: black; font-weight: 500;" href="#" ><p style="text-align: center; " > Back to Top </a>
 </div>

 
  

@endsection