var dtGlobals = {}; // Global storage
dtGlobals.isMobile	= (/(Android|BlackBerry|iPhone|iPod|iPad|Palm|Symbian|Opera Mini|IEMobile|webOS)/.test(navigator.userAgent));
dtGlobals.isAndroid	= (/(Android)/.test(navigator.userAgent));
dtGlobals.isiOS		= (/(iPhone|iPod|iPad)/.test(navigator.userAgent));
dtGlobals.isiPhone	= (/(iPhone|iPod)/.test(navigator.userAgent));
dtGlobals.isiPad	= (/(iPad)/.test(navigator.userAgent));

if(!dtGlobals.isMobile){
	
	jQuery(document).ready(function($) {

		$('.module').each(function () {
			lockscroll($(this));
		});
	
		$(window).bind('resize',function(){
			$.each($(".static_col"), function(i, n){
					var selectedCol = $(n);
					var parOffset = selectedCol.parent().offset();
					parOffset = parOffset.left;
					if(selectedCol.hasClass("fixed")){
						selectedCol.css({'left' : parOffset});
					} else {
						selectedCol.css({'left' : '0'});
					}
			});
		});
	});
}

function lockscroll(element) 
{
	// Floating box margin top
	if (jQuery('div').hasClass('unpress-sticky')) {
			var primary_nav_height = jQuery('.unpress-sticky').height();
	}else{
			var primary_nav_height = 0;
	}
	
	
	jQuery(window).bind('scroll',function(){
		//The module we're currently working with
		var selectedModule = element;
		//The static column we're currently working with
		var selectedCol = element.find('.static_col');
		if(selectedCol.length <= 0)
		{
			return false;
		}
		var parOffset = selectedCol.parent().offset();
		parOffset = parOffset.left;

		//Lowest value the margin can be is zero.
		var startpoint = 0;
		//Viewport points
		var viewportBegin = selectedModule.offset().top - primary_nav_height;
		var viewportEnd = viewportBegin + selectedModule.height();
		//Stop point will always be the height difference between the static column and it's parent.
		//Essentially, that's the maximum value the margin can be
		var stopPoint = (selectedModule.height() - selectedCol.height() - 30);
		//How much of the page have we scrolled?
		var winY = jQuery(window).scrollTop();
		//Do some adjustments if our module is within the viewport
		if(winY >= viewportBegin && winY < viewportEnd)
		{
			//fix our static column to the bottom of the module if we've scroll below our viewport
			if((winY - viewportBegin) >= stopPoint)
			{
				selectedCol.removeClass('fixed').css({'bottom' : '', 'top' : stopPoint, 'left' : 0});
			}
			//fix our static column to the top of the module if we've scrolled above our viewport
			else if((winY - viewportBegin) <= 0)
			{
				selectedCol.removeClass('fixed').css({'top' : 0, 'bottom' : '', 'left' : 0});
			}
			//Animate the margin while scrolling within the viewport
			else
			{
				var offset = (winY - viewportBegin);
				//console.log("winY: " + winY + ", viewportBegin: " + viewportBegin + ", viewportEnd: " + viewportEnd + ", stopPoint: " + stopPoint + ", startPoint: " + startpoint + ', offset: ' + offset);
				selectedCol.addClass('fixed').css({'top' : primary_nav_height, 'bottom' : '', 'left' : parOffset});
			}
		}
		//We're out of the viewport so lock the column back to it's start point
		else
		{
			selectedCol.removeClass('fixed').css({'top' : 0, 'bottom' : '', 'left' : 0});
		}
	}); //End Scroll Event
}; //End Function