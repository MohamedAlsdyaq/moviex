
 $.get( '/groups/get/ids', function( arr ) {
         window.arr_my_groups_ids = arr;
 groups_index("http://moviex.com/groups/index?page=1");

 
              })  ;



function search_group(query) {
	console.log(results_type);
$.ajax({
            type: 'GET',
            async: false,
            url: '/groups/search?query='+query+results_type+'&page=1',
 
            beforeSend: function() {

            	$('.no_more').removeClass('no_more');
            	$('.groups_container').html(' ');
        $('.groups_container').append("<img id='loader' src='img/big_ring.gif' >");
            },
            success: function(ajax) {

            	var from = ajax.from;
            	from++;
            	$('#loader').remove();
            	window.moviex_grp_current = ajax.current;
            	window.moviex_grp_last_page = ajax.last_page;

            	console.log(ajax.next_page_url);
            	if(ajax.next_page_url !== null)
            	     	window.moviex_grp_next = '/groups/search?query='+query+results_type+'&page='+from;
            	 


console.log(window.moviex_grp_next);

            	console.log(ajax);
            	data = ajax.data;
            	for(var i=0; i<ajax.data.length; i++){
                     button = ' <button id="button_group'+data[i].id+'" data-id="'+data[i].id+'" onclick="join_group('+data[i].id+')" class="btn btn-sm btn-success" > Join this Group </button>';
       if(window.arr_my_groups_ids.includes(data[i].id)){
        button = ' <button id="button_group'+data[i].id+'" data-id="'+data[i].id+'" onclick="leave_group('+data[i].id+')" class="btn btn-sm custom_dark_btn" > Leave this Group </button>';
       }
            	$('.groups_container').append('<div class=" " >  <div class="search_left" >  <a href="/group/'+data[i].id+'" ><img height="100" width="100" src="groups/'+data[i].picture+'" > </a></div> <div class="search_data" ><a href="/group/'+data[i].id+'" > <h4> '+data[i].name+' </h4> </a><h6>'+data[i].bio+' </h6> <div class="row "> <div style="float" >'+button+' <kdp> '+data[i].type+' </kdp> </div> <div class="search_right" style="margin-right: 50px;" > <kdp> '+data[i].groupentries_count+' Users</kdp> </div> </div> </div> </div><hr>');
            }
            setTimeout(function(){ $('#group_search').attr("onkeyup",  " setTimeout(function(){ search_group($('#group_search').val()) }, 1000 );" ) }, 000);
            $('.groups_container').append('<div data-id= "" class="no_more">  </div>');
                         ;
         $('.groups_container').attr("onkeyup", "  delayKeyup(function(){  search_group($('#group_search').val() );}, 2000);");
   
        }

        });

}

function groups_index(url){

$.ajax({
            type: 'GET',
            url: url,
 
            beforeSend: function() {
            	$('.no_more').removeClass('no_more');
        $('.groups_container').append("<img id='loader' src='img/big_ring.gif' >");
            },
            success: function(ajax) {
            	$('#loader').remove();
            	window.moviex_grp_current = ajax.current;
            	window.moviex_grp_last_page = ajax.last_page;
            	window.moviex_grp_next = ajax.next_page_url;



            	console.log(ajax);
            	data = ajax.data;
            	for(var i=0; i<ajax.per_page; i++){
                     button = ' <button id="button_group'+data[i].id+'" data-id="'+data[i].id+'" onclick="join_group('+data[i].id+')" class="btn btn-sm btn-success" > Join this Group </button>';
       if(window.arr_my_groups_ids.includes(data[i].id)){
        button = ' <button id="button_group'+data[i].id+'" data-id="'+data[i].id+'" onclick="leave_group('+data[i].id+')" class="btn btn-sm custom_dark_btn" > Leave this Group </button>';
       }
            $('.groups_container').append('<div class=" " >  <div class="search_left" >  <a href="/group/'+data[i].id+'" ><img height="100" width="100" src="groups/'+data[i].picture+'" > </a></div> <div class="search_data" ><a href="/group/'+data[i].id+'" > <h4> '+data[i].name+' </h4> </a><h6>'+data[i].bio+' </h6> <div class="row "> <div style="" >'+button+' <kdp> '+data[i].type+' </kdp> </div> <div class="search_right" style="margin-right: 50px;"> <kdp> '+data[i].groupentries_count+' Users</kdp> </div> </div> </div> </div><hr>');
          }
            $('.groups_container').append('<div class="no_more">  </div>');
        }

        });
}



jQuery.fn.isFullyVisible = function(){

var win = $(window);

var viewport = {
    top : win.scrollTop(),
    left : win.scrollLeft()
};
viewport.right = viewport.left + win.width();
viewport.bottom = viewport.top + win.height();

var elemtHeight = this.height();// Get the full height of current element
elemtHeight = Math.round(elemtHeight);// Round it to whole humber

var bounds = this.offset();// Coordinates of current element
bounds.top =  bounds.top + win.height();
bounds.right = bounds.left + this.outerWidth();
bounds.bottom = bounds.top + this.outerHeight();
//console.log('Win Height '+ $('body').innerHeight()+'viewport.bottom '+ viewport.bottom + ' &bounds.top '+ bounds.top +'viewport top '+viewport.top + ' bounds.bottom '+bounds.bottom );
return (!( viewport.bottom >= $('body').innerHeight() - 30   ));

}

//Usage:
$(window).on('scroll', function() {

 
  if(! $('.no_more').isFullyVisible() ){
    //$('.no_more').removeClass('no_more');
var next = window.moviex_grp_next.split('page=');
    if(window.moviex_grp_last_page !== next[1] && window.moviex_grp_next !== null){
			groups_index(window.moviex_grp_next);
		}
		else{
			$('.no_more').remove();
			return 0;
		}
  }
});