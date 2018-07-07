@extends('layouts.app')

@section('content')

<head>
    
    <link rel="stylesheet" href="https://npmcdn.com/flickity@2/dist/flickity.css" media="screen">

<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>

</head>


<div class="carousel"
  data-flickity='{"contain": true, "contcxain": false,  "pageDots": false }'>
<div class="f-cell"></div>
  <div style="" class="quick_container  carousel-cell  ">
    <div class=" " >
    <div class=" quick_action" > 
            <textarea class="form-control" style="resize:none;" ></textarea>
           
           <p style="float:left" > View Discussion </p>
        <div  style="float:left" class="edit" > 
            <div class="col-xs-6" >
<i class="fa fa-edit" style="font-size:18px"></i>
            </div>
            <div class="col-xs-6">
            <button class="btn btn-success" >
            Ep.1
        </button>
    </div>
        </div>

    </div>
                <div id="" class="c row">

                    <div class="col-sm-3 col-xs-3" >  
                            <img class="img-responsive show_img"    src="/3.jpg"> 
                    </div>
                <div class="row quick_progress col-sm-7 col-xs-7" > 

                    <h4 id="quick_show_name" style="bottom: 0%" >Toy Story </h4>
<div id="#p" > <div class="loaded" ><div class="loaded2" >.</div>.</div> </div>
                 <div class="col-xs-12" > 
                    <h6><small>ep 6 of 146</small></h6>  
                </div>
                 

                

                </div>
                </div>
                </div>
             </div>

  <div class="quick_discover carousel-cell">
    Media you've added or updated within your <a href=""> Library </a> will show up here for you to quickly update it.
    <br>
    <button class=" btn btn-success btn-block"> Discover Media </button>
  </div>
  <div class="  empty-cell ">
    <i style="color:rgba(255,255,255,.4)" class="fa fa-5x fa-plus" aria-hidden="true"></i>
</div>
  <div class=" empty-cell  "></div>
  <div class=" empty-cell "></div>
</div>

<div class="app container" >

 
<!-- Flickity HTML init -->


    <div class="row" >
        <div class="col-xs-12 col-sm-3">
            
        <p class="cursor sortBy tablinks" onclick="change_section(event, 'following')" ">
        Following

        <p class="tablinks cursor sortBy" onclick="change_section(event, 'movies')">
        Movies

        <p class="tablinks cursor sortBy" onclick="change_section(event, 'tv')" ">
        Tv-Series

        <p class="tablinks cursor sortBy active" onclick="change_section(event, 'global')"  "> 
        Global

        <br>
            <p>Groups
                <hr>
                <p> Apperantely you are not a mebmer of any group. discover Groups
            <div class="white_box" >
                
            </div>


        </div>
        <div class="col-sm-6 col-xm-12">
         
            @include('modules.post')
<br><br><br><br><br><br> 


            <div id="global" class="common ">
                
                        <div id="new_welcome" >
            <h4> Hey User, Welcome to Moviex </h4>
            <p>This is the global activity feed. It's populated by recent activity from all of Moviex's users - even you! Once you've had a chance to follow a few more interesting users, we'll switch your default feed from Global to Following.</p>
             
            <h5>Why don't you try creating a feed post to introduce yourself using the form below? You can say something as simple as 'Hey everyone, I'm new to Moviex', or you can show us how creative and witty you are! </h5>
                        </div>
<br><br>
                        <div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>

<div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>

            </div> <!-- Global -->
            <div style="display: none" id="tv" class="common ">
                <div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>
<div style="display: none" class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>

            </div> <!-- Tv -->
            <div style="display: none" id="movies" class="common ">
<div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>
<div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>

            </div> <!-- Movies-->
            <div style="display: none" id="following" class="common ">
<div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>
<div class="_4-u2 mbm _2iwp _4-u8" style="max-width: 95%;">
  <div class="_2iwo" data-testid="fbfeed_placeholder_story">
    <div class="_2iwq">
      <div class="_2iwr"></div>
      <div class="_2iws"></div>
      <div class="_2iwt"></div>
      <div class="_2iwu"></div>
      <div class="_2iwv"></div>
      <div class="_2iww"></div>
      <div class="_2iwx"></div>
      <div class="_2iwy"></div>
      <div class="_2iwz"></div>
      <div class="_2iw-"></div>
      <div class="_2iw_"></div>
      <div class="_2ix0"></div>
    </div>
  </div>
</div>

            </div> <!-- Following timeline -->

        </div>
        <div class="col-sm-3">
            
            @include('modules.footer')

        </div>
    </div>




</div>

@endsection()