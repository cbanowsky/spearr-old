jQuery(document).ready(function($){
	
/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/
	$('#page_template').change(checkTemplate);
	
	function checkTemplate(){
		var template = $('#page_template').attr('value');
		
		//only run on the posts page
		if(template == 'default' || template == 'template-interview.php' || template == 'template-contact.php' ){
			$('#acf_26').fadeIn("slow");
			$('#acf_acf_page-options').fadeIn("slow");
			
		}else{
			$('#acf_26').fadeOut("slow");
			$('#acf_acf_page-options').fadeOut("slow");
		}
		
		// Show hide sidebar options
		if(template == 'page-composer.php' || template == 'template-video.php' || template == 'template-gallery.php' ){
			$('.unpress_unlimited_sidebars').fadeOut("slow");
		}else{
			$('.unpress_unlimited_sidebars').fadeIn("slow");
		}
		  
		
	}
	$(window).load(function(){
		checkTemplate();
	})
});


