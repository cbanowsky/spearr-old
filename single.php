<?php 
/**
 * The Template for displaying all single blog posts
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;
?>

<?php get_header(); ?>
<div id="page-wrap">
<?php 
if ( ! get_post_format() ): // Standard
	get_template_part( 'post-format/format', 'standard' );
elseif ( 'video' == get_post_format() ): // Video
	get_template_part( 'post-format/format', 'video' );
elseif ( 'audio' == get_post_format() ): // Audio
	get_template_part( 'post-format/format', 'audio' );
elseif ( 'gallery' == get_post_format() ): // Gallery
	get_template_part( 'post-format/format', 'gallery' );
endif;
?>

<!-- Related Posts -->

<?php
	if($ft_option['posts_default_sidebar_on']== 0 ):
	if((! get_field( 'post_sidebar' ) || get_field( 'post_sidebar' ) == "post_sidebar_off")):
		if($ft_option["single_related"]=="1"): 
			get_template_part( 'inc/related', 'posts' ); 
		endif;
		
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endif;
endif;
?>
</div>	
<?php get_footer(); ?>