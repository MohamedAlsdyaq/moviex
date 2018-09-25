@extends('layouts.app')

@section('content')
<head>
 
<script src="https://unpkg.com/nouislider@10.0.0/distribute/nouislider.min.js"></script>
<script src="https://unpkg.com/wnumb@1.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/nouislider@10.0.0/distribute/nouislider.min.css">
         <script src="/js/search.js"></script>
  <link rel="stylesheet" href="/css/search.css">
<style type="text/css">
    li{
        cursor: pointer;
    }
 
</style>
</head>
<div class="row" >
<div class="col-xs-3 filter_section" >
	 
	<div class="filter" >
	<p style="  float: left;"">Year</p>

		<span style="float: right; background-color: #738182; border-radius: 5px; font-size: 10px" >
<span style="  margin-right: 10px;" id="slider-margin-value-min"></span >  

<span style="" id="slider-margin-value-max"></span >
</span>
<br>
<div style="margin: 4em" class="regular-slider"></div>

	
</div>

    <div class="filter" >
    <p style="  float: left;"">Runtime</p>
        <span style="float: right; background-color: #738182; border-radius: 5px; font-size: 10px;" >
<span style="float: ; margin-right: 10px;" id="runmin"></span >  
<span style="float: " id="runmax"></span >
</span>
<br>
<div style="margin: 4em" class="slider2"></div>

    
</div>


	<div class="filter" >
	<p style="  float: left;"">Average Rating</p>
		<span style="float: right; background-color: #738182; border-radius: 5px; font-size: 10px;" >
<span style="float: ; margin-right: 10px;" id="slidermin"></span >  
<span style="float: " id="slidermax"></span >
</span>
<br>
<div style="margin: 4em" class="slider"></div>

	
</div>


	<div class="filter " style="height: 150px" >
<div class="rating-select">
		<p style="margin-left: 20px;margin-right: 180px; "">Rating</p>
		 
 
<br>
	<ul>
		<li class="certifications active"  onclick="make_me_active(this); certification = '' ; adv_search() ">ALL </li>
        <li  class="certifications" onclick="make_me_active(this); certification = '&certification_country=US&certification=PG'; adv_search(); " >PG </li>
        <li  class="certifications" onclick="adv_search();make_me_active(this); certification = '&certification_country=US&certification=PG-13'; adv_search(); " >PG-13</li>
        <li  class="certifications" onclick="adv_search();make_me_active(this); certification = '&certification_country=US&certification=R'; adv_search(); " >R </li>
        <li  class="certifications" onclick="adv_search();make_me_active(this); certification = '&certification_country=US&certification=NC-17'; adv_search(); " >NC-17</li>
	</ul>
</div>

	
</div>

	<div class="filter" >
	<p style="margin-left: 20px;margin-right: 10px; float: left;"">Categories</p>

<span onclick="keywords = []; generes = [];  $('.selected_check').css('visibility','hidden'); $('.selected').css('color', '#d8d8d8'); adv_search();" id="reset" style="cursor: pointer; float: right; background-color: #738182; border-radius: 2px;padding:3px; font-size: 10px;" >
All
</span>
<br><br>
<div style="width: 100%" class="n">
 <ul style="width:110%;" class="list">
    <li>
        <a class="list-group-item" ><i class="fa fa-plus"></i> Themes</a>
        <ul id="themes">
            
     
            <li    onclick="selected(this); keywords.push(11196); adv_search(); " >rebellion <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(2964); adv_search(); " >future <i class="fas fa-check fa-check-hover"></i> </li>   
                          
            <li  onclick="selected(this); keywords.push(2041); adv_search(); " >island <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(516) ;adv_search(); " >child abuse <i class="fas fa-check fa-check-hover"></i> </li>   
   
            <li  onclick="selected(this); keywords.push(4776) ;adv_search(); " >race against time <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(9826) ;adv_search(); " >murder <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(245403); adv_search(); " >zombis <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(6149) ;adv_search(); " >police <i class="fas fa-check fa-check-hover"></i>  </li>   
            <li  onclick="selected(this); keywords.push(34079); adv_search(); " >death <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(2486) ;adv_search(); " >fantasy <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(4048) ;adv_search(); " >musician <i class="fas fa-check fa-check-hover"></i> </li>   

            <li  onclick="selected(this); keywords.push(210352); adv_search(); " >love <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(13027); adv_search(); " >wedding <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(6270); adv_search(); " >high school <i class="fas fa-check fa-check-hover"></i> </li>   
            <li  onclick="selected(this); keywords.push(6054) ;adv_search(); " >friendship <i class="fas fa-check fa-check-hover"></i> </li>   

        </ul>                
    </li>

    <li>
        <a class="list-group-item" ><i class="fa fa-plus"></i> Generes</a>
        <ul id="themes" >
            
            <li  onclick="selected(this); generes.push(28); adv_search(); " >Action<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(12); adv_search(); " >Adventure<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(16); adv_search(); " >Animation<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(35); adv_search(); " >Comedy<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(80); adv_search(); " >Crime<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(99); adv_search(); " >Documentary<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(10751); adv_search(); " >Family<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(18); adv_search(); " >Drama<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(14); adv_search(); " >Fantasy<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(35); adv_search(); " >History<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(10402); adv_search(); " >Music<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(9648); adv_search(); " >Mystery<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(10749); adv_search(); " >Romance<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(878); adv_search(); " >Science Fiction<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(10770); adv_search(); " >TV Movie<i class="fas fa-check fa-check-hover"></i></li>  
            <li  onclick="selected(this); generes.push(35); adv_search(); " >Thriller<i class="fas fa-check fa-check-hover"></i></li>  
             <li  onclick="selected(this); generes.push(10752); adv_search(); " >War<i class="fas fa-check fa-check-hover"></i></li>  
              <li  onclick="selected(this); generes.push(37); adv_search(); " >Western<i class="fas fa-check fa-check-hover"></i></li>  

            
        </ul>                
    </li>
    
    <li>
        <a class="list-group-item" ><i class="fa fa-plus"></i> Odiance</a>
              <ul id="themes" >
            <li class="radio" onclick="radio(this); adult = '&include_adult=false'; adv_search(); " >SFW <i class="fas fa-check fa-check-hover"></i> </li>  
            <li class="radio" onclick="radio(this); adult = '&include_adult=true'; adv_search(); " >Adults <i class="fas fa-check fa-check-hover"></i> </li>      
        </ul>                
    </li>
</ul>
        </div>
	
</div>



	


</div>

<div id="filtering_results" >

  <form class="search-container">
    <input onkeydown="nor_search(this,1000)" type="text" id="search-bar" placeholder="Search Movie by Name">
    <a href="#"><img onclick="nor_search(document.getElementById('search-bar'), 0)"  class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form>
  
          <p   id="current_sort" role="button" data-toggle="dropdown" href="#">Popularity <b class="caret"></b></p>
          <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="current_sort">
             <li role="presentation"><a onclick="sort = 'popularity'; adv_search(); $('#current_sort').html('Release Date <b class=caret></b>')" role="menuitem" tabindex="-1" href="#">Popularity</a></li>

            <li role="presentation"><a onclick="sort = 'release_date'; adv_search(); $('#current_sort').html('Release Date <b class=caret></b>')" role="menuitem" tabindex="-1" href="#">Release Date</a></li>
            <li role="presentation"><a onclick="sort = 'revenue'; adv_search(); $('#current_sort').html('Revenue <b class=caret></b>')" role="menuitem" tabindex="-1" href="#">Revenue</a></li>

      
            <li role="presentation"><a onclick="sort = 'vote_count'; adv_search(); $('#current_sort').html('Vote Average <b class=caret></b>')" role="menuitem" tabindex="-1" href="#">Vote Average</a></li>
        
            
          </ul>
         
<div class="searching_results">


</div>
 
	

</div>
</div>

<div style="margin: 4em" class="regular-slider"></div>
<script>
    movie_id = null;

 


 
    function make_me_active(e){
       
       $('.active').removeClass('active');
  
        $(e).addClass('active');
    }

    function activated(e){
       
      
        $(e).addClass('activeated');
    }


var regularSlider = document.querySelector('.regular-slider')
// wNumb is their tool to format the number. We us it to format the numbers that appear in the handles
var dollarPrefixFormat = wNumb({prefix: '$', decimals: 0})
var slider = noUiSlider.create(regularSlider, {
    // two handles
    start: [2000, 2019],
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
        to = Math.ceil(values[handle]);
        if(movie_id == null)
        adv_search();
	} else {
		marginMin.innerHTML = Math.ceil(values[handle]);
        froms = Math.ceil(values[handle]);
          if(movie_id == null)
        adv_search();
	}
});

var slider3 = document.querySelector('.slider')
// wNumb is their tool to format the number. We us it to format the numbers that appear in the handles
 
var slider2 = noUiSlider.create(slider3, {
    // two handles
    start: [70, 100],
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
        vote_to = Math.ceil(values[handle]  / 10 );
          if(movie_id == null)
        adv_search();

	} else {
		min.innerHTML = Math.ceil(values[handle]);
        vote_from = Math.ceil(values[handle] / 10 );
          if(movie_id == null)
        adv_search();
	}
});

var slider4 = document.querySelector('.slider2')
// wNumb is their tool to format the number. We us it to format the numbers that appear in the handles
 
var slider5 = noUiSlider.create(slider4, {
    // two handles
    start: [10, 250],
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
    range: {'min':  10,
            'max':  250},
 
});
 


var min = document.getElementById('runmin'),
    max = document.getElementById('runmax');

slider4.noUiSlider.on('update', function ( values, handle ) {
    if ( handle ) {
        console.log(Math.ceil(values[handle]));
        console.log(values[handle]);
        max.innerHTML = Math.ceil(values[handle]);
        runtime_to = Math.ceil(values[handle]    );
          if(movie_id == null)
        adv_search();

    } else {
        min.innerHTML = Math.ceil(values[handle]);
        runtime_from = Math.ceil(values[handle]   );
          if(movie_id == null)
        adv_search();
    }
});

$('.list > li a').click(function() {
    $(this).parent().find('ul').toggle();
});
 
$( ".hoverable" ).hover(
  function() {
    $(this).html($(this).text() + '<i class="fas fa-check fa-check-hover"></i>');
  }, function() {
    $(this).html($(this).text());
  }
);
    


$('.list > li a').click(function() {
    $(this).parent().find('ul').toggle();
});
 
$( ".hoverable" ).hover(
  function() {
    $(this).html($(this).text() + '<i class="fas fa-check fa-check-hover"></i>');
  }, function() {
    $(this).html($(this).text());
  }
);
    

 
function selected(e){
       $(e).addClass('selected');
       $(e).html($(e).text() + '<i class="fas selected_check fa-check"></i>');
       $(e).removeClass('hoverable');
}
function radio(e){
        $(e).addClass('selected');
        $('.radio').css('color', '#d8d8d8');
        $( ".radio" ).each(function( ) {
   $(this).html($(this).text() );
});
      $(e).html($(e).text() + '<i class="fas fa-check"></i>');
       $(e).removeClass('hoverable');
}
 
</script>
@endsection