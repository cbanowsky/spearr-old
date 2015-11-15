<?php
$gallery_cats = get_sub_field("custom_gallery_categories");
global $query_string;
	
$args = array(
	'post_type' => 'gallery',
	'tax_query' => array(
		array(
			'taxonomy' => 'gallery-categories',
			'field' => 'id',
			'terms' => $gallery_cats,
			'operator' => 'IN'
		)
	)
);
query_posts( $args );
?>
<div id="homepage-gallery-carousel">
	<div id="homepage-gallery-carousel-navigation-wrapper">
		<div class="homepage-gallery-carousel-navigation clearfix">
            <?php if( get_sub_field( 'gallery_section_title' ) ): ?>
                    <h3><?php the_sub_field( 'gallery_section_title' ); ?></h3>
            <?php endif; ?>
			<div class="homepage-gallery-carousel-arrows">
				<a href="#" id="gallery-carousel-prev"><i class="fa fa-angle-left"></i></a>
				<a href="#" id="gallery-carousel-next"><i class="fa fa-angle-right"></i></a>
			</div>
		    
		</div>
	</div>
	<div id="unPress-Homepage-Gallery-Carousel">
		
        <?php 
		if (have_posts()) :
		while (have_posts()) : the_post(); 
		if (has_post_thumbnail( $post->ID ) ):
			$gallery = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-carousel' );
		?>
		
        	<div class="slide">
                <a href="<?php the_permalink(); ?>">
                    <div class="gallery-carousel-slide-title">
                    	<span class="galleries-slide-category"><?php echo unpress_taxonomy_strip("gallery-categories"); ?></span>
                    	<h4 class="galleries-slide-sub-title"><?php the_title(); ?></h4>	
                    </div>
                    <img class="gallery-carousel-slide-image" src="<?php echo $gallery[0]; ?>" data-original="<?php echo $gallery[0]; ?>" alt="image">
                </a>
            </div>		
				
		<?php
		endif;
		endwhile; 
		wp_reset_query();
		endif;
		?> 
		
		
	</div>
</div>