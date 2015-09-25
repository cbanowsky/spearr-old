<?php 
/**
 * Revolution Slider
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 2.0
**/
global $ft_option;
?>
<div id="revolution-slider-container-full">
 	<?php
		$slider_alias = get_sub_field( 'select_rev_slider' );
		if (strstr($slider_alias,'revslider'))
		{
			$id = str_replace('revslider-','',$slider_alias);
			echo do_shortcode('[rev_slider '.$id.']');
		}
	?>
</div><!-- #home-rotator-container -->