<?php

/**
 * Add custom meta box for "Cover Story"
 */


/**
 * Posts in Mosaic format shortcode function
 */
if (!function_exists('register_spearr_mosaic_posts_shortcode')) {
	function register_spearr_mosaic_posts_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
		    'small_post_1' => '',
		    'small_post_2' => '',
		    'cover_posts'  => ''
		), $atts));

		$html = '';

		$html .= '<section class="container module">';
			$html .= '<div class="row mosaic-row">';
				$html .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
					if ($small_post_1) {
						$args = array(
							'post_type'   => 'post',
							'post_status' => 'publish',
							'post__in'    => array($small_post_1)
						);
						
						$the_query = new WP_Query($args);

						if ($the_query->have_posts()) {
							$html .= '<div class="post-holder">';
							while ($the_query->have_posts()) {
								$the_query->the_post();
								ob_start();
								get_template_part('post-format/mosaic-post-small', get_post_format());
								$html .= ob_get_clean();
							}
							$html .= '</div>';
						}

						wp_reset_query();
					}

					if ($small_post_2) {
						$args = array(
							'post_type'   => 'post',
							'post_status' => 'publish',
							'post__in'    => array($small_post_2)
						);
						
						$the_query = new WP_Query($args);

						if ($the_query->have_posts()) {
							$html .= '<div class="post-holder last">';
							while ($the_query->have_posts()) {
								$the_query->the_post();
								ob_start();
								get_template_part('post-format/mosaic-post-small', get_post_format());
								$html .= ob_get_clean();
							}
							$html .= '</div>';
						}

						wp_reset_query();
					}
				$html .= '</div>';

				$html .= '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
				if ($cover_posts) {
					// make an array
					$cover_posts = explode(',', $cover_posts);

					$args = array(
						'post_type'   => 'post',
						'post_status' => 'publish',
						'post__in'    => $cover_posts
					);
					
					$the_query = new WP_Query($args);

					if ($the_query->have_posts()) {
						$html .= '<div class="post-holder">';
							$html .= '<div class="mosaic-slider flexslider">';
								$html .= '<div class="slides">';
								while ($the_query->have_posts()) {
									$the_query->the_post();
									ob_start();
									get_template_part('post-format/mosaic-post-cover', get_post_format());
									$html .= ob_get_clean();
								}
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';

						// flexslider scripts
						ob_start();
						?>
						<script type="text/javascript">
						jQuery(document).ready(function($) {
							jQuery('.flexslider').flexslider({
								animation: "slide",
								selector: '.slides > .holder',
								smoothHeight: true,
								slideshow: false,
								controlNav: false, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
								directionNav: true,
								animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
								pauseOnHover: true,
								slideshowSpeed: 6000, //Integer: Set the speed of the slideshow cycling, in milliseconds
								animationSpeed: 500, //Integer: Set the speed of animations, in milliseconds 
							});
						});
						</script>
						<?php
						$html .= ob_get_clean();
					}

					wp_reset_query();
				}
				$html .= '</div>';	
			$html .= '</div>';
		$html .= '</section>';

		// page break
		$html .= '<div class="container">';
			$html .= '<div class="row">';
				$html .= '<div class="cover-break">';
					$html .= '<h1>Break No. 1</h1>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
	add_shortcode("mosaic_posts", "register_spearr_mosaic_posts_shortcode");
}