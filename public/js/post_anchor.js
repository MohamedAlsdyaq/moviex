

function copy_link(text){
		text = 'moviex.com/post/'+text;
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
function report(id){


	// manipluate the reporting modal
	// show the modal

	$('#report_id').val(id);
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
				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }

				}); 
					data = $('#report_form').serialize();
					$('.reporting_button').replaceWith('  <button  disabled style="color: white !important; display: block; margin: auto; width: 70%" class="disabled btn btn-lg btn-block reporting_button" >Report </button>')

			 

			  $.ajax({
			    type: 'POST',
			    url: '/report/post',
			    data: data,
			    beforeSend: function(){
					$('.reporting_button').html('<img src="ring-alt.gif">');
			    },
			    success: function(ajax) {
			  	 danger('Post has been reported. Thanks for your support!');

			  	  }
				});
}