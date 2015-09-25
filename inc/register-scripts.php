<?php
/**
 * Register jQuery scripts and 
 * CSS Styles only for the front-end
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

function ft_theme_scripts(){	
	global $ft_option;
	/**
	 * Register CSS styles
	 */

	 wp_register_style( 'ft-bootstrap.min', get_template_directory_uri(). '/css/bootstrap.min.css', array(), '1', 'all' );
	 wp_register_style( 'ft-isotope', get_template_directory_uri(). '/css/isotope.css', array(), '1', 'all' );
	 wp_register_style( 'ft-font-awesome.min', get_template_directory_uri(). '/css/font-awesome.min.css', array(), '1', 'all' );
	 wp_register_style( 'ft-ilightbox', get_template_directory_uri(). '/css/ilightbox.css', array(), '1', 'all' );
	 wp_register_style( 'ft-animate', get_template_directory_uri(). '/css/animate.css', array(), '1', 'all' );
	 wp_register_style( 'ft-colors', get_template_directory_uri(). '/css/colors.css', array(), '1', 'all' );
	 wp_register_style( 'ft-flexslider', get_template_directory_uri(). '/css/flexslider.css', array(), '1', 'all' );
	 wp_register_style( 'ft-elasticslider', get_template_directory_uri(). '/elasticSlider/css/style.css', array(), '1', 'all' );
	 wp_register_style( 'ft-slide_menu', get_template_directory_uri(). '/css/slide_menu.css', array(), '1', 'all' );
	 wp_register_style( 'ft-owl.carousel', get_template_directory_uri(). '/css/owl.carousel.css', array(), '1.3.3', 'all' );
	 wp_register_style( 'ft-bbpress-ext', get_template_directory_uri(). '/bbpress/css/bbpress-ext.css', array(), '1', 'all' );
	 
	 if($ft_option["unpress_main_skin"]=="black_skin"):
	 	wp_register_style( 'ft-black-skin', get_template_directory_uri(). '/style_black.css', array(), '1', 'all' );
	 endif;
	 
	 wp_register_style( 'ft-media_queries', get_template_directory_uri(). '/css/media-queries.css', array(), '1', 'all' );
	 
	 wp_enqueue_style( 'ft-bootstrap.min' );
	 wp_enqueue_style( 'ft-isotope');
	 wp_enqueue_style( 'ft-font-awesome.min' );
	 wp_enqueue_style( 'ft-ilightbox' );
	 wp_enqueue_style( 'ft-animate' );
	 wp_enqueue_style( 'ft-colors' );
	 wp_enqueue_style( 'ft-flexslider' );
	 wp_enqueue_style( 'ft-elasticslider' );
	 wp_enqueue_style( 'ft-slide_menu' );
	 wp_enqueue_style( 'ft-owl.carousel' );
	 wp_enqueue_style( 'ft-bbpress-ext' );
	 
	 if($ft_option["unpress_main_skin"]=="black_skin"):
	 	wp_enqueue_style( 'ft-black-skin' );
	 else:
	 	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1', 'all' );
	 endif;
	 
	 
	 wp_enqueue_style( 'ft-media_queries' );
	 
	
	 wp_enqueue_script( 'jquery', false, array(), false, true);
     wp_enqueue_script( 'ft-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '1', true );
     wp_enqueue_script( 'ft-masonry.pkgd.min', get_template_directory_uri() . '/js/masonry.pkgd.min.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery', '1.3', true );
	 wp_enqueue_script( 'ft-sticky.box', get_template_directory_uri() . '/js/sticky.box.js', 'jquery', '1', true );
	 wp_enqueue_script( 'ft-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-jquery.isotope.min', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'ft-jquery.isotope.sloppy-masonry.min', get_template_directory_uri() . '/js/jquery.isotope.sloppy-masonry.min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'ft-jquery.requestAnimationFrame', get_template_directory_uri() . '/js/jquery.requestAnimationFrame.js', 'jquery', '1', true );
	 wp_enqueue_script( 'ft-ilightbox.packed', get_template_directory_uri() . '/js/ilightbox.packed.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-jquery.flexslider-min', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'ft-jquery.iosslider.min', get_template_directory_uri() . '/js/jquery.iosslider.min.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'nt-elastic_two', get_template_directory_uri() . '/elasticSlider/js/jquery.eislideshow.js', 'jquery', '2.1', true );
	 
	 wp_enqueue_script( 'ft-plugins', get_template_directory_uri() . '/js/plugins.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-jquery.ba-throttle-debounce.min', get_template_directory_uri() . '/js/jquery.ba-throttle-debounce.min.js', 'jquery', '1.1', true );	
	 wp_enqueue_script( 'ft-jquery.carouFredSel-6.2.1-packed', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', 'jquery', '6.2.1', true );
	 wp_enqueue_script( 'ft-jquery.mousewheel.min', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', 'jquery', '3.0.6', true );
	 wp_enqueue_script( 'ft-jquery.transit.min', get_template_directory_uri() . '/js/jquery.transit.min.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js', 'jquery', '1', true );
	 wp_enqueue_script( 'ft-jquery.parallax', get_template_directory_uri() . '/js/jquery.parallax.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'ft-custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '1', true );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}

if(!is_admin()){
	add_action( 'wp_enqueue_scripts', 'ft_theme_scripts' );
}

if (is_admin() ){
	function favethemes_admin_scripts(){	
		wp_register_script('ftmetajs', get_template_directory_uri() .'/js/admin/init.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('ftmetajs');
	}
}

add_action('admin_enqueue_scripts', 'favethemes_admin_scripts');

// Header custom JS
function header_scripts(){
	global $ft_option;
	
	if ( isset($ft_option['custom_js_header']) != '' ){
		echo '<script type="text/javascript">'."\n",
				$ft_option['custom_js_header']."\n",
			 '</script>'."\n";
	}
}
if(!is_admin()){
	add_action('wp_head', 'header_scripts');
}

// Footer custom JS
function footer_scripts(){
	global $ft_option;
	
	if ( isset($ft_option['custom_js_footer']) != '' ){
		echo '<script type="text/javascript">'."\n",
				$ft_option['custom_js_footer']."\n",
			 '</script>'."\n";
	}
}
if(!is_admin()){
	add_action( 'wp_footer', 'footer_scripts', 100 );
}