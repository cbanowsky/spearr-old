<?php
/**
 * Interview Related Posts from the same Tags
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option; 

$tags = wp_get_post_terms($post->ID, 'interview-tags', array("fields" => "all"));
$terms_id = $tags[0]->term_id;

$interviews_to_show =  $ft_option['single_related_interviews_to_show'];

$args = array(
'posts_per_page' => $interviews_to_show,
'post__not_in' => array( $post->ID ),
'tax_query' => array(
	array(
		'taxonomy' => 'interview-tags',
		'field' => 'id',
		'terms' => $terms_id
	)
)
);
$query = new WP_Query( $args ); 

if($query->have_posts()):

if(! get_field( 'interview_posts_sidebar' ) || get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_off"):
	$class_section = "container module masonry related-post";
	$class_sticky_box = "col-lg-3 col-md-3 col-sm-4 sticky-col";
	$class_col2 = "col-lg-9 col-md-9 col-sm-8";
	$class_post_holder = "post-holder col-lg-4 col-md-4 col-sm-6 col-xs-12"; 
else:
	$class_section = "module masonry related-post";
	$class_sticky_box = "col-lg-4 col-md-4 col-sm-4 sticky-col";
	$class_col2 = "col-lg-8 col-md-8 col-sm-8";
	$class_post_holder = "post-holder col-lg-6 col-md-6 col-sm-6 col-xs-12"; 
endif;
?>


<section class="<?php echo $class_section; ?>">
	<div class="row">
		<div class="<?php echo $class_sticky_box; ?>">
			<div class="category-box sticky-box static_col">
				<h2><?php _e( $ft_option["interview_single_related_title"], "favethemes" ); ?></h2>
			</div>
		</div>
        
		<div class="<?php echo $class_col2; ?>">
			<div class="row post-row">
			<?php
				while($query->have_posts()): $query->the_post(); ?>	
			
            	<div class="<?php echo $class_post_holder; ?>">
					<div class="featured-image image-holder holder">
						<?php unpress_masonry_image(); ?>
					</div><!-- .featured-image -->
					
					<div class="post-content-holder">
						<header>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="post-author"><?php _e("by", 'favethemes'); ?> 
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a></p>
						</header>
					</div><!-- .post-content-holder -->
				</div><!-- .post-holder -->
			
			<?php endwhile; ?>	
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
	</div><!-- .row -->
</section><!-- .container -->
<?php
endif;
wp_reset_query();
?>