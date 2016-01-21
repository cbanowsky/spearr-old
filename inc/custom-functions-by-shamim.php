<?php

/**
 * Spearr Render Template
 * @param  string $template_name
 * @param  string $template_located
 * @param  array $params
 */
if (!function_exists('spearr_render_template')) {
	function spearr_render_template($template_name, $template_located, $params = array()) {
		global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

		// template name
		$template_name = $template_name . '.php';
		$template_path = "$template_located/$template_name";

		// check if template file exists
		if ($template = locate_template($template_path)) {
			extract($params, EXTR_SKIP);
			require $template;
		} else {
			return '';
		}
	}
}

if (!function_exists('spearr_aq_resize')) {
	function spearr_aq_resize($post_id, $image_width, $image_height, $image_hardcrop, $source = null) {
	    global $lunday_theme_options;

	    // image properties
	    $width    = (int)$image_width;
	    $height   = (int)$image_height;
	    $hardcrop = ($image_hardcrop != 0) ? true : false;

	    if ($source === null) {
		    // aq_resizer
		    $thumb   = get_post_thumbnail_id($post_id);
		    $img_url = wp_get_attachment_url($thumb, 'full');
	    } else {
	    	$img_url = $source;
	    }

	    $aq_image_link = aq_resize($img_url, $width, $height, $hardcrop);

	    if ($aq_image_link != false) {
	        $image_link = $aq_image_link;
	    } else {
	    	$image_link = $img_url;
	    }

	    return $image_link;
	}
}

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

		$html .= '<div class="row mosaic-row">';
			// cover posts
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

			// small posts
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
		$html .= '</div>';

		return $html;
	}
	add_shortcode("mosaic_posts", "register_spearr_mosaic_posts_shortcode");
}

/**
 * Heading Shortcode
 */
if (!function_exists('register_spearr_heading_shortcode')) {
	function register_spearr_heading_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
			'markup'        => 'h1',
			'heading'       => 'The Heading',
			'sub_heading'   => '',
			'margin_top'    => '',
			'margin_bottom' => ''
		), $atts));

		$html = '';
		$style = '';

		if ($margin_top) {
			$style .= 'margin-top: ' . $margin_top . 'px;';
		}
		if ($margin_bottom) {
			$style .= 'margin-bottom: ' . $margin_bottom . 'px;';
		}

		$html .= '<div class="spearr-heading-shortcode" style="' . $style . '">';
			$html .= '<' . $markup . ' class="heading">' . $heading . '</' . $markup . '>';
			if ($sub_heading) {
				$html .= '<div class="subheading">';
					$html .= '<p>' . $sub_heading . '</p>';
				$html .= '</div>';
			}
		$html .= '</div>';

		return $html;
	}
	add_shortcode("spearr_heading", "register_spearr_heading_shortcode");
}

/**
 * Featured Posts Shortcode
 */
if (!function_exists('register_spearr_featured_posts_shortcode')) {
	function register_spearr_featured_posts_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
			'column'    => '4',
			'total'     => '4',
			'post_ids'  => ''
		), $atts));

		$html = '';

		$args = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $total,
			'ignore_sticky_posts' => 1
		);

		if ($post_ids) {
			$post_ids = explode(',', $post_ids);
			$args['post__in'] = $post_ids;
		}

		$the_query = new WP_Query($args);

		if ($the_query->have_posts()) {
			$html .= '<div class="spearr-featured-posts-shortcode">';
				$html .= '<div class="row">';
					$html .= '<div class="column-' . $column . '">';
						while ($the_query->have_posts()) {
							$the_query->the_post();
							ob_start();
							get_template_part('post-format/shortcode-posts');
							$html .= ob_get_clean();
						}
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		}

		wp_reset_query();

		return $html;
	}
	add_shortcode("spearr_featured_posts", "register_spearr_featured_posts_shortcode");
}