@extends('layouts.app')

@section('content')
<head>
	<style type="text/css">
		.custom_dark_btn{
			color: black !important;
			background-color: #fafafa !important;
		}
	</style>
</head>
<script type="text/javascript">
	var results_type = '' ;
</script>
<script src="/js/search_group.js"></script>

<div class="container  groups">
	<div class="row">

<div class="col-sm-3 ">
 <br> 
 <div style="padding: 7%;" class=" white_box" >
<h6 style="font-weight: 9000; text-align: center;">Anyone can create and discover groups. Each group centers around a topic or activity.</h6>
<div class=" text-center"> 
	<a href="/groups/create" class="center btn btn-success btn-sm" >Create a Group </a>
</div>
 </div>

	@include('modules.footer')

</div>

	  <div class="col-xs-12 col-sm-3">
            

 
 
 
	        <br>  </div>

	  <div style="padding-top: 1%;" class="col-sm-7 col-xs-12 white_box" >
	  	<input id="group_search"   onkeyup="       $('#group_search').attr('onkeyup', ' ');  setTimeout(function(){
      search_group($('#group_search').val() );}, 2000);"  class="form-control " type="text" placeholder="Filter .. ">
 
    <button class="btn btn-light" onclick="results_type = '&type=movies';console.log(results_type); search_group($('#group_search').val());" type="radio" name="options" id="option2" autocomplete="off"><i class="fas fa-film"></i> Movies</button>
  </label>
 
    <button class="btn btn-light" onclick="results_type = '&type=tv';console.log(results_type); search_group($('#group_search').val()); " type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-tv"></i> Tv series</button>

	  	<hr>

	  	<div class="groups_container">
 

	  	</div>
	  	<br>
	  	<a href="#" style="text-align: center; color: black" >Back to Top </a>
	  </div>

</div>
</div>


@endsection()