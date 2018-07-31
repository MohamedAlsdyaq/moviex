<head>
	<link rel="stylesheet" type="text/css" href="/css/post.css">
 
</head>

<div id="post" onclick="post_effect(this)" style="border-bottom: 7px solid #f5f8fa;" class="cursor row col-sm-12 col-xm-12 white_box">

<div class="col-sm-2" > 
<img class="img-circle" height="40px" width="40px" src="/av.png">
</div>
<div class="col-sm-10" >
 <p id="tolol" style="vertical-align: center" class="center center-v"> Post Someting <span id="movie_title"> </span>...
 </div>
 <div  style="display:     none" class="col-sm-12 creat_post_content">
 		 <textarea data-name="post_counter"  onkeypress="limit(this)" class="form" id="exampleFormControlTextarea1" rows="5"></textarea>

 <div id="uploading_section" >
    <div  style="  float: left;" class="upload-btn-wrapper">
     <button class="upload">Upload Image</button>
     <input accept=".png, .jpg, .jpeg" onchange="upload(this)" type="file" name="myfile" />
    </div>
    

    <div id="upload_target" >
       
<div> </div>
    </div>
  </div>

     <span id="post_counter" style="margin-right: 10px; margin-top:10px;float: right;" > </span>

 		 
<?php
$url =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$url = substr($url,10);

if (strpos($url,'tv') !== false || strpos($url,'/movie') !== false) {
   ?>
 <div style="width: 100%;" id="posting" class="row" >
            
             <div  style="margin:4px; width: 100% !important;"   class=" show_thumnail  border-dark row col-xs-12" >
                <div class="col-xs-4"> 
                 <img style="margin: 4px;" id="" class="poster img-responsive "  max-height="150px" max-width="100px" src=""></div>
                <div class="col-xs-8" > 
                    <h4 id="movie_title" ></h4>
                  <p  class="bio v_small grey" >
                </div>
             </div>
         </div>
   <?php
}

?>
 		
 		
 		 <div id="target"  class="row col-sm-12">
 		 	 <hr style="margin-top: 1px;" >
 	<?php	  
 		 
if (strpos($url,'tv') !== false) {
   ?>
</div>
    <div id="posting" class="row col-sm-12">
        <hr>
      <p >Episode:  </p>
 		 
<div class="col-xs-7">

	<div style="max-width: 250px" class="form-group">
        <div  class="input-group">
            <div class="input-group-btn">
                <button id="down" class="btn btn-default" onclick=" down('0')"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
            <input style="height: 28px !important;" type="text" id="myNumber" class="form-control" value="1" />
            <div class="input-group-btn">
        <button id="up" class="btn btn-default" data-limit="" onclick="up(this)"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
    </div>

</div>
 	<?php
    }	
    ?>
<?php

if (strpos($url,'tv') !== false || strpos($url,'movie') !== false) {
 ?>
	<div  class="col-xs-4">

			<div class="funkyradio">
				<div class="funkyradio-default">
					<div class="funkyradio-info">
						<input type="checkbox" name="checkbox" id="checkbox6" checked/>
						<label for="checkbox6">Spoiler</label>
					</div>
				</div>
			</div>

 	</div>

    <?php }else { ?>

 <select class="form-control selectpicker" id="select-country" data-live-search="true">
                <option data-tokens="china">China</option>
  <option data-tokens="malayasia">Malayasia</option>
  <option data-tokens="singapore">Singapore</option>
                </select>


   <?php } ?>

 		 	 <div  onclick="post()" style="float: right" class="col-xs-1  " > <button class="btn btn-success" > Post </button>  </div>
 		 </div>

 </div>
 <br><br>
</div> 
<br><br>
<script >
  $(document).ready(function(event) {
  $('#target').on('keydown',function() {

  if( $.trim( $('.input-block-level').val() ).length > 2 )
      search($.trim( $('.input-block-level').val() ), 'here');
    });
  });

  function post_effect(e){

$('.creat_post_content').show();
$('#tolol').hide();
  }

</script>