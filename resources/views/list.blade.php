@extends('layouts.app')

@section('content')
<head>
 
<link rel="stylesheet" href="/css/mylist.css">

</head>

<div id="list_intro">
<div class="container">
<h2> Best Movies List </h2>
<div style="margin-right: 20px;float: left;">
<img style=" margin-right: 8px; float: left;" width="50" height="50" src="/av.png">
<span style="float: left;">
	<h4> A list By </h4>
	<a><h4 style="margin-top: -10px;" > User7645 </h4></a>
</span>
<h4 style="font-weight: bold;">About this list</h4>

<h4>My home collection</h4>

</div>

<button class="btn btn-default" >Sort By</button>
<button class="btn btn-default" >Share</button>
</div>
</div>

<br>
<div id="list_summary">
<div>
<h2> 24 </h2>
<h3> ITEMS ON THIS LIST </h3>
</div>
<div>
<h2> 24 </h2>
<h3>Average Rating</h3>
</div>
<div>
<h2> 24 </h2>
<h3> Total Runtime</h3>
</div>
<div>
<h2> 24 </h2>
<h3> Total Revenue</h3>
</div>
</div>


<div class="container" id="list_entries">

<div class="list_entry">

<img class="list_poster" src="/3.jpg"><br>
<div class="list_info" >
	
<span style="float: left;" >1</span >
<span style="text-align: center;"><p>Toy Story </span> 
<span style=" margin-top: 5px	;float: right ; vertical-align: center;" class="fa fa-star fa-lg" aria-hidden="true">9.4</span>
</div>

</div>


</div>













@endsection