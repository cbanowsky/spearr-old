<?php
/**
 * The archive page
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>

<?php get_header(); ?>
<div id="page-wrap">
<?php
// Category Slider
if ( get_field ( 'category_slider', 'category_' . get_query_var('cat') ) == "cat_slider_on" ):
	
	if ( get_field ( 'cat_slider_type', 'category_' . get_query_var('cat') ) == "iosslider" ):
		get_template_part ( 'composer/sliders/category', 'iosslider' );
	
	elseif ( get_field ( 'cat_slider_type', 'category_' . get_query_var('cat') ) == "flexslider" ):
		get_template_part ( 'composer/sliders/category', 'flexslider' );
	
	elseif ( get_field ( 'cat_slider_type', 'category_' . get_query_var('cat') ) == "elasticslider" ):
		get_template_part ( 'composer/sliders/category', 'elasticslider' );
		
	endif;
endif;
?>

<?php
	if ( get_field ( 'category_posts_layout', 'category_' . get_query_var('cat') ) == "cat_layout_masonry" ):
			get_template_part ( 'archive', 'masonry' );
	
	elseif ( get_field ( 'category_posts_layout', 'category_' . get_query_var('cat') ) =="cat_layout_blocks" && get_field('blocks_layout', 'category_' . get_query_var('cat') )=="excerpt_under_image"):
			get_template_part ( 'archive', 'excerpt_under' );
	
	elseif ( get_field ( 'category_posts_layout', 'category_' . get_query_var('cat') ) =="cat_layout_blocks" && get_field('blocks_layout', 'category_' . get_query_var('cat') )=="excerpt_on_hover"):
			get_template_part ( 'archive', 'excerpt_hover' );
	
	elseif ( get_field ( 'category_posts_layout', 'category_' . get_query_var('cat') ) =="cat_layout_mosaic" ):
			get_template_part ( 'archive', 'mosaic' );
			
	else:
			get_template_part ( 'archive', 'masonry' );
	endif;
?>

</div>
<?php get_footer(); ?>
