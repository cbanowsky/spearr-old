<?php
/**
 * Register our sidebars and widgetized areas.
 * @package UnPress
 * @since UnPress 1.0
 * Author: Favethemes
 *
 */
function favethemes_widgets_init() {

	
	// Blog Sidebar
	register_sidebar( array(
		'name' => 'Magazine Sidebar',
		'id' => 'magazine-sidebar',
		'description'   => __( 'These are widgets for the magazine page.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Page Sidebar
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'description'   => __( 'These are widgets for the pages.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Interview Sidebar
	register_sidebar( array(
		'name' => 'Interview Sidebar',
		'id' => 'interview-sidebar',
		'description'   => __( 'These are widgets for the interview page.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// BBPress Sidebar
	register_sidebar( array(
		'name' => 'BBPress Sidebar',
		'id' => 'bbpress-sidebar',
		'description'   => __( 'These are widgets for the Bbpress Forum.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// WooCommerce Sidebar
	register_sidebar( array(
		'name' => 'WooCommerce Sidebar',
		'id' => 'woocomerce-sidebar',
		'description'   => __( 'These are widgets for the WooCommerce Shop.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Newsletter Sidebar
	register_sidebar( array(
		'name' => 'Newsletter Sidebar',
		'id' => 'footer-newsletter-sidebar',
		'description'   => __( 'Put the subscribe widget here.','favethemes' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer 1
	register_sidebar( array(
		'name' => 'Footer 1 ( 4 Column )',
		'id' => 'footer1-sidebar',
		'description'   => __( 'These are widgets for the Footer 1.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Area One
	register_sidebar( array(
		'name' => 'Footer Area One',
		'id' => 'footer-sidebar-1',
		'description'   => __( 'These are widgets for the footer area one.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Footer Area Two
	register_sidebar( array(
		'name' => 'Footer Area Two',
		'id' => 'footer-sidebar-2',
		'description'   => __( 'These are widgets for the footer area two.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Footer Area Three
	register_sidebar( array(
		'name' => 'Footer Area Three',
		'id' => 'footer-sidebar-3',
		'description'   => __( 'These are widgets for the footer area three.','favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
}
add_action( 'widgets_init', 'favethemes_widgets_init' );
?>