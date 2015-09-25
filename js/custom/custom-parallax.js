// Parallax Bgs //
	

jQuery(window).load( function() {

	// Parallax Bgs for rows
	
	jQuery('div[class*="parallax-bag"]').each(function() {
		
		var $div = jQuery(this);
		var token = $div.data('token');
		var settingobject = window['ft_parallax_' + token];
		
		if(!( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )) {	
			jQuery('.parallax-bag-'+settingobject.id+'').parallax("50%", 0.4, false);
		}
		
		// Parallax Fix for Mobile Devices
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			jQuery('.parallax-bag-'+settingobject.id+'').css({'background-attachment': 'scroll'});
		}
        
    });

});