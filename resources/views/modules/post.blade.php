<head>
  <link rel="stylesheet" type="text/css" href="/css/post.css">
 
</head>

<div class="create_post_wrapper" >

<div onclick="post_effect(this)" class="post_thumnail post_padding" >  
  <img class="tolol img-circle" height="40" width="40" src="{{Auth::user()->picture}}"  style="float: left;" >
  <p class="tolol" style="color:#969696; font-weight: 400; font-size: 20px;  " > Post Something .. 
</div>

 <div  style="display:   none" class="  creat_post_content">
  <div class="post_padding">
  <img class="  img-circle" height="40" width="40" src="{{Auth::user()->picture}}"  style="float: left;" >
    <h5 style="font-weight: 600; font-size: 17px; color: #23527c" > {{Auth::user()->name}} </h5>
      <textarea maxlength="140" style=" margin-top: 3%; font-weight: 900; line-height: 18px; " data-name="post_counter"  onkeypress="limit(this)" class="form" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>
      <div style="height: 100px;" id="uploading_section" >
      <div  style="  float: left;" class="upload-btn-wrapper">
        <button class="upload">Upload Image</button>
        <input accept=".png, .jpg, .jpeg" onchange="upload(this)" type="file" name="myfile" />
     </div>


        <div  id="upload_target" >

        <div> </div>
        </div> </div>
 
<!-- set the thumnail of the show -->
<?php
  $url =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $url = substr($url,10);

  if (strpos($url,'tv') !== false || strpos($url,'/movie') !== false) {
   ?>
     <div style="width: 100%;" id="posting" class="row" >
            
             <div  style="background-color: #fafafa; padding: 1% 2% 0 2%; margin:2% 2% 1% 2%; width: 100% !important;"   class=" show_thumnail  border-dark row col-xs-12" >
                <div style="float: left;"> 
                 <img style="max-width: 45px; margin: 4px;" id="" class="poster img-responsive "   src=" ">
               </div>

               
                    <h4  style="margin: 3% 0.5% 0 2%;  float: left;" id="movie_title" ></h4>
                  <p  style="    margin-top: 2%;" class="bio v_small grey" >
                

             </div>
         </div> <?php } 
             if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']  == "moviex.com"  || $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']  == "moviex.com/") { ?>
               
            <div style="width: 100%; border-top :1px solid #e5e5e5;;  " >
             <input   id="searchlist" onkeyup="basic_search(`listauto`, `searchlist`, `movies_list`, `tv_list`)" style="margin-left: 15px; margin:4px; color: #969696; font-size: 20px; font-weight: 400; margin-left: 2%;float:left"  autocomplete="off" type="text" name="q" class="search" placeholder="Link Post to a show..">

            </div>
         
            <div   style="display: none; 
            width: 70%;
            box-shadow: 5px 5px;
            z-index: 100;
            position: absolute;
            margin-top: 4%;" id="listauto" class="  panel panel-default" style=":  ;">
                                <!-- List group -->
                                <ul class="list-group">
                                    <div id="autocompleteTest">


                        </div>
                        
                          <div style="background-color: rgba(172, 172, 172, 0.11) !important; color: black; font-weight: bold;" id="fav" class="list-group-item">
                            <div class="row">
                                <div id="favorites" class="">
                                    <div class="">
                                         <b style="float: left;" >Movies</b>
                         <b style="font-weight: normal; font-size: 12px; float: right;"><a id="load_movies" href="/search/movies" > load more </a></b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <li class="list-group-item">
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div id="movies_list" class=' media-middle'>
                                        <a href='#'>
                                            <img style="float: left;" class='media-object img-circle' src='http://placehold.it/40x40'>
                                          <p style="margin: 10px; float: left;" > Fdds 
                                        </a>
                                    </div>
                             
                                </div>
                            </div>
                        </li>

                          <div style="background-color: rgba(172, 172, 172, 0.11) !important; color: black; font-weight: bold;" id="fav" class="list-group-item">
                            <div class="row">
                                <div id="favorites" class="">
                                    <div class="">
                                         <b style="float: left;" >TV Series</b>
                                             <b style="font-weight: normal; font-size: 12px;  float: right;"><a id="load_tv" href="/search/tv" > load more </a></b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <li class="list-group-item">
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div id="tv_list" class=' media-middle'>
                                        <a href='#'>
                                            <img style="float: left;" class='media-object img-circle' src='http://placehold.it/40x40'>
                                          <p style="margin: 10px; float: left;" > Fdds 
                                        </a>
                                    </div>
                             
                                </div>
                            </div>
                        </li>


                       
                     
               
                    </ul>

                </div>


 
  <?php } ?>
 <br> 
             <hr style="  border-top: 1px solid #e5e5e5; ">
   
<!-- last section spoiler ep and post -->

<?php
      if (strpos($url,'tv') !== false || strpos($url,'movie') !==   false) {
       ?>
        <div style="float: left;">

            <div class="funkyradio">
              <div class="funkyradio-default">
                <div class="funkyradio-info">
                  <input type="checkbox" name="checkbox" id="checkbox6" checked/>
                  <label for="checkbox6">Spoiler</label>
                </div>
              </div>
            </div>

        </div>

          <?php } 

       if (strpos($url,'tv') !== false) {
         ?>
      </div>
          <div id="posting" class="row col-sm-12">
              <hr style="width: 150%; margin-left: -10%;" >
            <b style="margin-right: 2%; float: left;" >Episode:  </b>
           
      <div style="float: left; " >

        <div style="max-width: 250px" class="form-group">
              <div  class="input-group">
                  <div class="input-group-btn">
                      <button id="down" class="btn btn-default" onclick=" down('0')"><span class="glyphicon glyphicon-minus"></span></button>
                  </div>
                  <input style="height: 28px !important;" type="text" id="myNumber" class="form-control" value="{{$progress}}" />
                  <div class="input-group-btn">
              <button id="up" class="btn btn-default" data-limit="" onclick="up(this)"><span class="glyphicon glyphicon-plus"></span></button>
                  </div>
              </div>
          </div>

      </div>
        <?php
          } 
          ?>

           <div id="post_a_post"  onclick="post()" style=" margin: 0 10px 0 0;float: right "    " > <button class="btn btn-success btn-lg" > Post </button>  </div>


</div> <!-- Post  hidden content  -->


</div> <!-- Create post wrapper -->

 

 
<script >
  $(document).ready(function(event) {
  $('#target').on('keydown',function() {

  if( $.trim( $('.input-block-level').val() ).length > 2 )
      search($.trim( $('.input-block-level').val() ), 'here');
    });
  });

  function post_effect(e){

$('.creat_post_content').show();
$('.tolol').hide();
$('.post_thumnail').css('height', '0px');
$('.creat_post_content').css('min-height', '410px');
  }
function add_to_list(id, e){
 
tv = null ;
movie = null;
if($(e).attr('data-type') ==  'tv'){
t = '<input type="hidden" value="'+tv+'" class="movie_id" > ';
ty = 'tv';
}
if($(e).attr('data-type') ==  'movie')
{t = '<input type="hidden" value="'+movie+'" class="movie_id" > ';
ty = 'movie';
}
$('#listauto').append(t);
 $('#searchlist').html(' ');
$('#listauto').hide();

var url = 'http://api.themoviedb.org/3/'+ty+'/'+id+'?api_key=54f297aa644bf4f27044771fc75cbb64 ';

$.ajax({
            type: 'GET',
            url: url,
 
            beforeSend: function() {
      //  $('#load').attr("src", "img/ring.gif");
            },
            success: function(ajax) {


if(ajax.original_title)
  name = ajax.original_title;
if(ajax.original_name)
  name = ajax.original_title;

$('#searchlist').replaceWith(' <div style="margin:10px;width: 100%;" id="posting" class="row" >   <div  style="background-color: #fafafa; padding: 1% 2% 0 2%; margin:2% 2% 1% 2%; width: 100% !important;"   class=" show_thumnail  border-dark row col-xs-12" >   <div style="float: left;">   <img style="max-width: 45px; margin: 4px;" id="" class="poster img-responsive "   src="http://image.tmdb.org/t/p/w92/'+ajax.poster_path+'"> </div>    <h4  style="margin: 3% 0.5% 0 2%;  float: left;" id="movie_title" >'+name+'</h4>       <p  style="    margin-top: 2%;" class="bio v_small grey" >'+ajax.overview+'    </div>    </div> ');
 }
          });
}
</script>