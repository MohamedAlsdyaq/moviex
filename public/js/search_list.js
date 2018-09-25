
 $.get( '/lists/get/ids', function( arr ) {
         window.arr_my_lists_ids = arr;
 lists_index("http://moviex.com/lists/index?page=1");

 
              })  ;



function search_list(query) {
	console.log(results_type);
                $('#list_search').attr('onkeyup', ' '); 
                console.log($('#list_search') );
                if( $('#list_search').attr('onkeyup') == ' '){
$.ajax({
            type: 'GET',
            url: '/lists/search?query='+query+results_type+'&page=1',
 
            beforeSend: function() {
                $('#list_search').attr('onkeyup', ' ');
            	$('.no_more').removeClass('no_more');
            	$('.lists_container').html(' ');
        $('.lists_container').append("<img id='loader' src='img/big_ring.gif' >");
            },
            success: function(ajax) {

            	var from = ajax.from;
            	from++;
            	$('#loader').remove();
            	window.moviex_grp_current = ajax.current;
            	window.moviex_grp_last_page = ajax.last_page;

            	console.log(ajax.next_page_url);
            	if(ajax.next_page_url !== null)
            	     	window.moviex_grp_next = '/lists/search?query='+query+results_type+'&page='+from;
            	 


console.log(window.moviex_grp_next);

            	console.log(ajax);
            	data = ajax.data;
            	for(var i=0; i<ajax.data.length; i++){
                     
            	$('.lists_container').append('<div class="" > <div class="search_left" > <a href="/list/'+data[i].id+'" ><img height="100" width="100" src="lists/'+data[i].list_picture+'" ></a> </div> <div class="search_data" > <a href="/list/'+data[i].id+'" ><h4> '+data[i].title+' </h4></a> <h6>'+data[i].list_info+' </h6> <div class="row "> <div class="search_type" > <kdp> '+data[i].type+' </kdp> </div>  <div class="search_right"> <kdp> '+data[i].listentries_count+' Entry </kdp> </div> </div> </div> </div><hr>');
            }
             setTimeout(function(){ $('#list_search').attr("onkeyup",  " setTimeout(function(){ search_list($('#list_search').val()) }, 1000);" ) }, 000);
 
            $('.lists_container').append('<div data-id= "" class="no_more">  </div>');
         $('#list_search').attr("onkeyup", "  delayKeyup(function(){  search_list($('#list_search').val() );}, 2000);");
        }

        });

} // end big if 
else
           setTimeout(function(){ $('#list_search').attr("onkeyup",  " setTimeout(function(){ search_list($('#list_search').val()) }, 1000);" ) }, 000);
 
}

function lists_index(url){

$.ajax({
            type: 'GET',
            url: url,
 
            beforeSend: function() {
            	$('.no_more').removeClass('no_more');
        $('.lists_container').append("<img id='loader' src='img/big_ring.gif' >");
            },
            success: function(ajax) {
            	$('#loader').remove();
            	window.moviex_grp_current = ajax.current;
            	window.moviex_grp_last_page = ajax.last_page;
            	window.moviex_grp_next = ajax.next_page_url;



            	console.log(ajax);
            	data = ajax.data;
            	for(var i=0; i<ajax.per_page; i++){
                     
            $('.lists_container').append('<div class="" > <div class="search_left" > <a href="/list/'+data[i].id+'" ><img height="100" width="100" src="lists/'+data[i].list_picture+'" ></a> </div> <div class="search_data" > <a href="/list/'+data[i].id+'" ><h4> '+data[i].title+' </h4></a> <h6>'+data[i].list_info+' </h6> <div class="row "> <div class="search_type" > <kdp> '+data[i].type+' </kdp> </div>  <div class="search_right"> <kdp> '+data[i].listentries_count+' Entry </kdp> </div> </div> </div> </div><hr>');
             }
            $('.lists_container').append('<div class="no_more">  </div>');
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
			lists_index(window.moviex_grp_next);
		}
		else{
			$('.no_more').remove();
			return 0;
		}
  }
});