<head>
	<link rel="stylesheet" type="text/css" href="/css/post.css">
<script type="text/javascript" src="/js/post_textarea.js" ></script>
<link rel="stylesheet" type="text/css" href="/css/checkbox.css">
</head>

<div id="post" onclick="post_effect(this)" height="" class="cursor row col-sm-12 col-xm-12 white_box">

<div class="col-sm-2" > 
<img class="img-circle" height="40px" width="40px" src="/av.png">
</div>
<div class="col-sm-10" >
 <p id="tolol" class="center center-v"> Post Someting about Movie.
 </div>
 <div  style="display: none" class="col-sm-12 creat_post_content">
 		 <textarea  class="form" id="exampleFormControlTextarea1" rows="5"></textarea>
 		 <hr>

 		 <div id="posting" class="row" >
 		 	<div class="col-xs-2" ></div>
			 <div  class=" show_thumnail  border-dark row col-xs-10" >
			 	<div class="col-xs-4">  <img class="img-responsive"  max-height="150px" max-width="100px" src="/3.jpg"></div>
			 	<div class="col-xs-8" > 
			 		<h4>Toy Story </h4>
			 		Lorem ispu, fijnfpm this is what ti olki make this toy story dan tom hanks.
			 	</div>
			 </div>
 		 </div>
 		
 		 <div id="posting" class="row col-sm-12">
 		 	 <hr>
 		  
 		 

 		 	 <div class="col-xs-2" >      <p >Episode:  </p></div>
 		 
<div class="col-xs-5">

	<div style="max-width: 150px" class="form-group">
        <div  class="input-group">
            <div class="input-group-btn">
                <button id="down" class="btn btn-default" onclick=" down('0')"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
            <input style="height: 28px !important;" type="text" id="myNumber" class="form-control" value="1" />
            <div class="input-group-btn">
                <button id="up" class="btn btn-default" onclick="up('10')"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
    </div>

</div>
 		
	<div class="col-xs-3">

			<div class="funkyradio">
				<div class="funkyradio-default">
					<div class="funkyradio-info">
						<input type="checkbox" name="checkbox" id="checkbox6" checked/>
						<label for="checkbox6">Spoiler</label>
					</div>
				</div>
			</div>

 		 	 </div>

 		 	 <div class="col-xs-2  " > <button class="btn btn-success" > Post </button>  </div>
 		 </div>

 </div>
</div> 
<script >
	var upURL = "https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_keyboard_arrow_up_48px-32.png";

var downURL = "https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_keyboard_arrow_down_48px-32.png";


$(function(){
  $('input.number').each(function(){
    $(this).before('<img src="'+upURL+'" class="arrow up"></img>').after('<img src="'+downURL+'" class="arrow down"></img>')
  });
  $('.number-wrap').on('click', '.arrow', function(e){
    var input = $(this).parents('div.number-wrap').children('input');
    var value = parseInt(input.attr('value'));
    var min = parseInt(input.attr('min'));
    var max = parseInt(input.attr('max'));
    if ($(this).hasClass('up')) { var op = +1;} else {var op = -1;}
    if (!(min==value && op == -1) && !(max==value && op == +1)) {
        input.attr('value', value + op)
    }
  })
});


function post_effect(e){

$('.creat_post_content').show();
$('#tolol').hide();
	}
</script>