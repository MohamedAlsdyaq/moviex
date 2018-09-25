

function copy_link(text, type='post'){
		text = 'www.moviex.com/'+type+'/'+text;
		 var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val(text).select();
		  document.execCommand("copy");
		  $temp.remove();


		navigator.clipboard.writeText(text).then(function() {
		 info('Link Copied!');
		}, function(err) {
		  console.error('Async: Could not copy text: ', err);
		});

}

function check_length(e){
	if ( $.trim( $(e).val() ).length > 1 ){
		$('.reporting_button').replaceWith('  <button onclick="report_ajax()" style="color: white !important; display: block; margin: auto; width: 70%" class="disabled btn btn-lg btn-block reporting_button" >Report </button>')
		$('.reporting_button').removeClass('disabled');
		$('.reporting_button').addClass('btn-success');
		$('.reporting_button').addClass('reporting_button_post');

	}else{
		$('.reporting_button').replaceWith('  <button   style="color: white !important; display: block; margin: auto; width: 70%" class="disabled btn btn-lg btn-block reporting_button" >Report </button>')

		$('.reporting_button').addClass('disabled');
		$('.reporting_button').removeClass('btn-success');
	}
}
function report(id, type){
	content = '<div class="modal fade" id="report_modal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-body"> <h4>Please give a reason for reporting this content. </h4> <form id="report_form"> <input id="modal_report_type" type="hidden" name="type" value="'+type+'" > <select name="reason" style="width: 100%" id="inputState" placeholder="Reason" class="form-control"> <option >Spoiler</option> <option>Offensive</option> <option>Bullying</option> <option>Explicit Content</option> <option>Other</option> </select> <input type="hidden" name="id" id="report_id" value="'+id+'"> <input type="hidden" name="dest" id="modal_dest" value=""> <br> <textarea name="comment" onkeydown="check_length(this)" placeholder="What`s wrong with this content? (Optional)" class="form-control report_reason" rows="3" style="width: 100%" ></textarea><br> </form> </div> <button style="color: white !important; display: block; margin: auto; width: 70%" class="disabled btn btn-lg btn-block reporting_button" >Report </button> <br> </div> </div> </div>';
		$('#target_modals').html(content);

	// manipluate the reporting modal
	// show the modal

	 $('#report_modal').modal('show'); 
	//$('#report_modal').modal({backdrop: true});



}

function block(id){
  $.ajax({
    type: 'GET',
    url: '/block/'+id,
    jsonpCallback: 'testing',
    contentType: 'application/json',
    success: function(ajax) {
    	info('User has been blocked!');
    	   setTimeout(function(){ location.reload(); }, 2000);
    }
});

	
}

function report_ajax(){
	var dest = $('#modal_report_type').val();
				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }

				}); 
					data = $('#report_form').serialize();
					$('.reporting_button').replaceWith('  <button  disabled style="color: white !important; display: block; margin: auto; width: 70%" class="disabled btn btn-lg btn-block reporting_button" >Report </button>')

			 

			  $.ajax({
			    type: 'POST',
			    url: '/report/'+dest,
			    data: data,
			    beforeSend: function(){
					$('.reporting_button').html('<img src="/img/loaderIco.gif">');
			    },
			    success: function(ajax) {

	 $('#report_modal').modal('hide'); 
			  	 danger('Post has been reported. Thanks for your support!');

			  	  }
				});
}

function delete_post(id, type){
 
var data = { 
    id: id
}
	$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }

				}); 
				 
			 

			  $.ajax({
			    type: 'POST',
			    url: '/delete/'+type,
			    data: data,
			    beforeSend: function(){
					$('#'+type+'_instance'+id).html('<img src="/img/loaderIco.gif">');
			    },
			    success: function(ajax) {
			    	$('#'+type+'_instance'+id).fadeOut();
 info('Entry has been deleted!');
			  	  }
				});
}