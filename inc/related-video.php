<?php
/**
 * Video Related Posts from the same Tags
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option; 

$tags = wp_get_post_terms($post->ID, 'video-categories', array("fields" => "all"));
$terms_id = $tags[0]->term_id;

$videos_to_show =  $ft_option['single_related_videos_to_show'];

$args = array(
'posts_per_page' => $videos_to_show,
'post__not_in' => array( $post->ID ),
'tax_query' => array(
	array(
		'taxonomy' => 'video-categories',
		'field' => 'id',
		'terms' => $terms_id
	)
)
);
$query = new WP_Query( $args ); 
?>
<?php if($query->have_posts()):

if(! get_field( 'video_post_sidebar' ) || get_field( 'video_post_sidebar' ) == "video_post_sidebar_off"):
	$class_container = "container";
else:
	$class_container = "";
endif;
?>
<div class="<?php echo $class_container; ?>">
	<div id="related-video-carousel">
		<div id="related-video-carousel-navigation-wrapper">
			<div class="related-video-carousel-navigation clearfix">
				<h3><?php _e( $ft_option["video_single_related_title"], 'favethemes' ); ?></h3>
				<div class="related-video-carousel-arrows">
					<a href="#" id="videos-carousel-prev"><i class="fa fa-angle-left"></i></a>
					<a href="#" id="videos-carousel-next"><i class="fa fa-angle-right"></i></a>
				</div>
			    
			</div>
		</div>
		<div id="unPress-Carousel-Related-Video">
			
            <?php
			while($query->have_posts()): $query->the_post();
			
            $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'video-related'); ?>
            
			<div class="slide">
				<ul class="list-unstyled">
					<li class="video-slide-wrap">
						<div class="videos-carousel-slide-title">
							<span class="videos-slide-category">
                            	<?php unpress_taxonomy_strip('video-categories'); ?>
                            </span>
							<h4 class="videos-slide-sub-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div>
						<img class="videos-carousel-slide-image" src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" data-original="<?php echo $src[0]; ?>" />
					</li>
				</ul>
			</div>
			
            <?php endwhile; wp_reset_query();?>
		
		</div>
	</div>
</div>

<?php endif; ?>
