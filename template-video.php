<?php 
/**
 * Template Name: Videos Template
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>

<?php get_header(); ?>
<div id="page-wrap">
<section class="container archive archive-video">
	
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>
	
	<?php
		
        /*=== Homepage Builder ===*/ 
        while( has_sub_field( "video_composer" ) ):
            
            /* Posts Slider */ 
            if( get_row_layout() == "custom_post_featured_video" ):
                
                get_template_part ( 'composer/videos/featured', 'video' );
                
            elseif( get_row_layout() == "custom_post_videos" ):
				
				get_template_part ( 'composer/videos/videos', '' );
                
            endif;
            
        endwhile;
		wp_reset_query();
        ?>
	
	
</section>

</div>
<?php get_footer(); ?>