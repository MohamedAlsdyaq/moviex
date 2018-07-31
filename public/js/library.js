function completed(){
$('.butons').hide();
$('#rating_section').show();
add_to_list('completed', 0);
	//ajax call
$('.add-to-library').html('Edit Entry');
}

function watchList(e){
add_to_list('WatchList', 0);
$('.butons').hide();
$('#rating_section').show();
  $(e).hide();
	$('.add-to-library').html('Edit Entry');
	//action taken // 
}
function started(e){
add_to_list('started', 0);
$('.butons').hide();
$('#rating_section').show();
  $(e).hide();
  $('.add-to-library').html('Edit Entry');
  //action taken // 
}
