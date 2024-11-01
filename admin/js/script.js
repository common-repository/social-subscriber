jQuery(document).ready(function($) {	
	
	$('#social_subscriber input:checkbox:checked').each(function(){
		var str = $(this).attr("id");
		var check = str.replace("wow_", "");
		$( "input[name='social_subscriber["+check+"]']" ).val(1);	
		
	});
	
	$('#social_subscriber input[type="checkbox"]').change(function () {
		
		var str = $(this).attr("id");		
		var check = str.replace("wow_", "");
		if($(this).prop('checked')){			
			$( "input[name='social_subscriber["+check+"]']" ).val(1);			
		}
		else {
			$( "input[name='social_subscriber["+check+"]']" ).val(0);
		}
	});	
	
	mailchimp();	
})

function mailchimp(){
	if (jQuery('#wow_mailchimp').is(':checked')){
		jQuery('#mailchimp').css('display', '');
	}
	else {
		jQuery('#mailchimp').css('display', 'none');
	}	
}