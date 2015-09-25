<?php
/**
 * Interview Relatest Posts from the same Tags
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option; 

$tags = wp_get_post_terms($post->ID, 'gallery-categories', array("fields" => "all"));
$terms_id = $tags[0]->term_id;

$galleries_to_show =  $ft_option['single_related_galleries_to_show'];

$args = array(
'posts_per_page' => $galleries_to_show,
'post__not_in' => array( $post->ID ),
'tax_query' => array(
	array(
		'taxonomy' => 'gallery-categories',
		'field' => 'id',
		'terms' => $terms_id
	)
)
);
$query = new WP_Query( $args ); 
?>
<?php if($query->have_posts()):

if(! get_field( 'gallery_post_sidebar' ) || get_field( 'gallery_post_sidebar' ) == "gallery_post_sidebar_off"):
	$class_container = "container";
else:
	$class_container = "";
endif;
?>

<div class="<?php echo $class_container; ?>">
	<div id="related-gallery-carousel">
		<div id="related-gallery-carousel-navigation-wrapper">
			<div class="related-gallery-carousel-navigation clearfix">
				<h3><?php _e( $ft_option["gallery_single_related_title"], 'favethemes'); ?></h3>
				<div class="related-gallery-carousel-arrows">
					<a href="#" id="galleries-carousel-prev"><i class="fa fa-angle-left"></i></a>
					<a href="#" id="galleries-carousel-next"><i class="fa fa-angle-right"></i></a>
				</div>
			    
			</div>
		</div>
		<div id="unPress-Carousel-Related-Gallery">
			<?php
			while($query->have_posts()): $query->the_post();
			
            $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'gallery-img'); ?>
            
			<div class="slide">
				<ul class="list-unstyled">
					<li class="gallery-slide-wrap">
						<a href="<?php the_permalink(); ?>">
                        <div class="galleries-carousel-slide-title">
							<span class="galleries-slide-category">
								<?php unpress_taxonomy_strip('gallery-categories'); ?>
                            </span>
							<h4 class="galleries-slide-sub-title"><?php the_title(); ?></h4>
						</div>
						<img class="galleries-carousel-slide-image" alt="" src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>">
                        </a>
					</li>
				</ul>
			</div>
		   <?php endwhile; wp_reset_query();?>
		</div>
	</div>
</div>
<?php endif; ?>
