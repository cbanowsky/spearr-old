<?php 
/**
 * Latest Posts
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $tf_option;

$posts_per_page = get_sub_field("latest_number_of_posts");

if(get_sub_field('latest_posts_pagination')=="enable"){
	//adhere to paging rules
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	global $query_string;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'post_type'       => 'post',
			'paged'				=> $paged,
			'post_status'     => 'publish'
		);
}
else
{
	global $query_string;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'post_type'       => 'post',
			'post_status'     => 'publish'
		);
}
query_posts( $args );
?>

<section class="container module masonry">
	<div class="row">
		<?php 
		if(!get_sub_field( 'latest_section_title_position' ) || get_sub_field( 'latest_section_title_position' )=="left_side"):
        		$class_box_title = "title-box-left";
        elseif(get_sub_field( 'latest_section_title_position' )=="right_side"):
        		$class_box_title = "title-box-right";
        endif; ?>        
        
        <?php
		if ( get_sub_field( 'latest_posts_sidebar' ) == 'disable' ):
			
			echo '<div class="col-lg-12 col-md-6 col-sm-4">';
		else:
			echo '<div class="col-lg-12 col-md-9 col-sm-8">';
		endif;
		?>
			<div class="row post-row">
				
				<?php 
					if (have_posts()) :
                        while (have_posts()) : the_post(); 
						
							get_template_part( 'post-format/masonry', get_post_format() );
            
                    	endwhile; 
                endif;
                ?> 
							
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
        
        <?php
        // Enable/Disable sidebar based on the field selection
		if ( get_sub_field( 'latest_posts_sidebar' ) == 'enable' ):
		?>
        	<div class="col-md-3 col-sm-4">
            	<?php dynamic_sidebar("magazine-sidebar"); ?>
            </div>
        
        <?php endif; ?>
        
	</div><!-- .row -->
</section><!-- .container -->
<?php
if(get_sub_field('latest_posts_pagination')=="enable"):
		unpress_paging_nav(); 
endif;
?>
<?php wp_reset_query(); ?>