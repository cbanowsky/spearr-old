<?php
/**
 * Relatest Posts from the same Category
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option; 

$posts_to_show =  $ft_option['single_related_posts_to_show'];

if($ft_option['single_related_posts_by'] == 'related_tags'){
	/***************** Start by Tag *********************/
	$tags = wp_get_post_tags($post->ID);  
	if ($tags):
	  $tag_ids = array(); 
	  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
	  $args=array( 
		'tag__in' => $tag_ids, 
		'post__not_in' => array($post->ID), 
		'posts_per_page'=> $posts_to_show
	  );      
	  $related_posts = get_posts( $args );
	endif;
	/***************** End by Tag *********************/
}else{
	$categories = get_the_category( $post->ID );
	if ($categories):
	  $cat_ids = array(); 
	  foreach($categories as $individual_cat) $cat_ids[] = $individual_cat->term_id; 
	  $args=array( 
		'category__in' => $cat_ids,
		'post__not_in' => array( $post->ID ),
		'posts_per_page' => $posts_to_show
	  );      
	  $related_posts = get_posts( $args );
	endif;
}
if( $related_posts ) {

if($ft_option['posts_default_sidebar_on']== 0 ):
	if(! get_field( 'post_sidebar' ) || get_field( 'post_sidebar' ) == "post_sidebar_off"):
		$class_section = "container module masonry related-post";
		$class_sticky_box = "col-lg-3 col-md-3 col-sm-4 sticky-col";
		$class_col2 = "col-lg-12 col-md-12 col-sm-12";
		$class_post_holder = "post-holder col-lg-12 col-md-4 col-sm-6 col-xs-12"; 
	else:
		$class_section = "module masonry related-post";
		$class_sticky_box = "col-lg-4 col-md-4 col-sm-4 sticky-col";
		$class_col2 = "col-lg-12 col-md-8 col-sm-8";
		$class_post_holder = "post-holder col-lg-6 col-md-6 col-sm-6 col-xs-12"; 
	endif;

else:
	$class_section = "module masonry related-post";
	$class_sticky_box = "col-lg-3 col-md-4 col-sm-4 sticky-col";
	$class_col2 = "col-lg-12 col-md-8 col-sm-8";
	$class_post_holder = "post-holder col-lg-9 col-md-9 col-sm-9 col-xs-12";
endif;	
?>

<section class="<?php echo $class_section; ?>">
	<div class="row">
		<div class="<?php echo $class_col2; ?>">
			<div class="row post-row">
			<?php foreach( $related_posts as $post ): setup_postdata( $post ); ?>	
			
            	<div class="<?php echo $class_post_holder; ?>">
					<div class="featured-image image-holder holder">
						<?php unpress_masonry_image(); ?>
					</div><!-- .featured-image -->
					
					<div class="post-content-holder">
						<header>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
							<?php if($ft_option["site_author_name"]=="1"):?>
                            <p class="post-author">
								<?php _e("by","favethemes"); ?> 
                            	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?>
                                </a>
                             </p>
                             <?php endif; ?>
                             
						</header>
					</div><!-- .post-content-holder -->
				</div><!-- .post-holder -->
			
			<?php endforeach; ?>	
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
	</div><!-- .row -->
</section><!-- .container -->
<?php
}
wp_reset_postdata();
?>