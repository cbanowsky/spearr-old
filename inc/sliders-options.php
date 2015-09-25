<?php
/**
 * @package UnPress
 * @since 	UnPress 1.2.7
**/
function unpress_sliders_options(){
	global $ft_option;
	
	if($ft_option['auto_slide'] == 0){
		$auto_slide = 'false';
	}else{
		$auto_slide = 'true';
	}
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			//////////////////////////////////////////////
		// ISO SLIDER
		//////////////////////////////////////////////
		$('.iosSlider').iosSlider({
			desktopClickDrag: true,
			snapToChildren: true,
			infiniteSlider: true,
			snapSlideCenter: true,
			navPrevSelector: '#prev',
			navNextSelector: '#next',
			onSlideComplete: slideComplete,
			onSliderLoaded: sliderLoaded,
			onSlideChange: slideChange,
			autoSlide: <?php echo $auto_slide; ?>,
			autoSlideTimer:<?php echo $ft_option['autoslide_timer'];?>,
			keyboardControls: true,
			responsiveSlides: true,
			responsiveSlideContainer: true,
			elasticPullResistance: 0.6,
			frictionCoefficient: 0.92,
			elasticFrictionCoefficient: 0.6,
			snapFrictionCoefficient: 0.92,
			
			
		});
		
		
		function slideChange(args) {
			jQuery('.sliderContainer .slider .item').removeClass('selected');
			jQuery('.sliderContainer .slider .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
		}
		
		function slideComplete(args) {
			if(!args.slideChanged) return false;
		}
		
		function sliderLoaded(args) {		
			slideChange(args);
		}
			
		});
    </script>
<?php
}
if(!is_admin()){
	add_action( 'wp_footer', 'unpress_sliders_options', 100 );
}