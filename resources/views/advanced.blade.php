@extends('layouts.app')

@section('content')
<head>
<style type="text/css" href="search.css"></style>
<script src="https://unpkg.com/nouislider@10.0.0/distribute/nouislider.min.js"></script>
<script src="https://unpkg.com/wnumb@1.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/nouislider@10.0.0/distribute/nouislider.min.css">

<link rel="stylesheet" href="/css/search.css">
</head>
<div class="row" >
<div class="col-xs-4 filter_section" >
	 
	<div class="filter" >
	<p style="margin-left: 20px;margin-right: 180px; float: left;"">Year</p>

		<span style="float: left; background-color: #738182; border-radius: 5px; font-size: 10px" >
<span style="float: left; margin-right: 10px;" id="slider-margin-value-min"></span >  

<span style="float: left" id="slider-margin-value-max"></span >
</span>
<br>
<div style="margin: 4em" class="regular-slider"></div>

	
</div>


	<div class="filter" >
	<p style="margin-left: 20px;margin-right: 140px; float: left;"">Average Rating</p>
		<span style="float: left; background-color: #738182; border-radius: 5px; font-size: 10px;" >
<span style="float: left; margin-right: 10px;" id="slidermin"></span >  
<span style="float: left" id="slidermax"></span >
</span>
<br>
<div style="margin: 4em" class="slider"></div>

	
</div>


	<div class="filter " style="height: 150px" >
<div class="rating-select">
		<p style="margin-left: 20px;margin-right: 180px; "">Rating</p>
		 
 
<br>
	<ul>
		<li class="active" >ALL </li><li>PG </li><li>PG-13</li><li>R </li><li>NC-17</li>
	</ul>
</div>

	
</div>

	<div class="filter" >
	<p style="margin-left: 20px;margin-right: 180px; float: left;"">Categories</p>

<span id="reset" style="float: left; background-color: #738182; border-radius: 2px;padding:3px; font-size: 10px;" >
All
</span>
<br><br>
<div style="width: 100%" class="n">
 <ul class="list">
    <li>
        <a class="list-group-item" ><i class="fa fa-plus"></i> Themes</a>
        <ul>
            <li>M16</li>  
            <li>MP5</li>  
            <li>AR15</li>  
            <li>M16A1</li>            
        </ul>                
    </li>

    <li>
        <a class="list-group-item" ><i class="fa fa-plus"></i> Generes</a>
        <ul>
            <li>M16</li>  
            <li>MP5</li>  
            <li>AR15</li>  
            <li>M16A1</li>            
        </ul>                
    </li>
    
    <li>
        <a class="list-group-item" ><i class="fa fa-plus"></i> Odiance</a>
        <ul>
            <li>Kids</li>  
            <li>Adults</li>      
        </ul>                
    </li>
</ul>
        </div>
	
</div>



	


</div>

<div id="filtering_results" >

  <form class="search-container">
    <input type="text" id="search-bar" placeholder="Search Movie by Name">
    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form>

<div class="search_poster">
	<div id="searc_poster_content" style=" background-image: url(/3.jpg);" > 
<div class="bottom btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Add to Library
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>
	</div>
	Toy
</div>
<div class="search_poster">
	<div id="searc_poster_content" style=" background-image: url(/3.jpg);" > </div>
	Toy
</div>
	

</div>
</div>

<div style="margin: 4em" class="regular-slider"></div>
<script>
var regularSlider = document.querySelector('.regular-slider')
// wNumb is their tool to format the number. We us it to format the numbers that appear in the handles
var dollarPrefixFormat = wNumb({prefix: '$', decimals: 0})
var slider = noUiSlider.create(regularSlider, {
    // two handles
    start: [0, 2019],
    // they are connected
    	
  connect: true,
  animate: true,    // their minimal difference is 5 - this makes sense, because we want the user to always find items
    margin: 1,
    // tooltip for handle 1 and handle 2
     
    pips: { 
    	mode: 'range',
      density: 50
    },
    tooltip: true,
    // start and end point of the slider - we are going to calculate that later based on a set of items
    range: {'min':  1900,
			'max':  2019},
 
});
 


var marginMin = document.getElementById('slider-margin-value-min'),
	marginMax = document.getElementById('slider-margin-value-max');

regularSlider.noUiSlider.on('update', function ( values, handle ) {
	if ( handle ) {
		console.log(Math.ceil(values[handle]));
		console.log(values[handle]);
		marginMax.innerHTML = Math.ceil(values[handle]);
	} else {
		marginMin.innerHTML = Math.ceil(values[handle]);
	}
});

var slider3 = document.querySelector('.slider')
// wNumb is their tool to format the number. We us it to format the numbers that appear in the handles
 
var slider2 = noUiSlider.create(slider3, {
    // two handles
    start: [0, 100],
    // they are connected
    	
  connect: true,
  animate: true,    // their minimal difference is 5 - this makes sense, because we want the user to always find items
    margin: 1,
    // tooltip for handle 1 and handle 2
     
    pips: { 
    	mode: 'range',
      density: 50
    },
    tooltip: true,
    // start and end point of the slider - we are going to calculate that later based on a set of items
    range: {'min':  0,
			'max':  100},
 
});
 


var min = document.getElementById('slidermin'),
	max = document.getElementById('slidermax');

slider3.noUiSlider.on('update', function ( values, handle ) {
	if ( handle ) {
		console.log(Math.ceil(values[handle]));
		console.log(values[handle]);
		max.innerHTML = Math.ceil(values[handle]);
	} else {
		min.innerHTML = Math.ceil(values[handle]);
	}
});

$('.list > li a').click(function() {
    $(this).parent().find('ul').toggle();
});

</script>
@endsection