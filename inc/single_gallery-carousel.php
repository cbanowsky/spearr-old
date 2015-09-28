<?php 
// Check if gallery was uploaded
if( get_field( 'custom_gallery_images' ) ): ?>

<div id="single-galleries-carousel">
	<div id="single-galleries-carousel-navigation-wrapper">
		<div class="single-galleries-carousel-navigation clearfix">
		
        	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small'); ?>
			<div class="single-galleries-carousel-arrows">
				<a class="btn-icon btn ilightbox" href="<?php echo $large_image_url[0]; ?>"><i class="fa fa-arrows-alt"></i></a>
				<a href="#" id="single-galleries-carousel-prev" class="btn btn-icon"><i class="fa fa-angle-left"></i></a>
				<span class="slide-counter"></span>
				<a href="#" id="single-galleries-carousel-next" class="btn btn-icon"><i class="fa fa-angle-right"></i></a>
                
                <a href="#" id="show-inline" class="btn-icon btn btn-post-share">
                    <i class="fa fa-reply"></i>
                </a>
    
			</div>
		    
		</div>
	</div>
	<div id="unPress-Single-Gallery-Carousel">
	
		
        <?php
		// Output the uploaded images as gallery
        $images = get_field( 'custom_gallery_images' );
		
        if ( $images ):
            foreach( $images as $image ):
                if ( !empty ( $image['alt'] ) ){
                    $alt = $image['alt'];
                } else {
                    $alt = $image['title'];
                }
                $img_src = $image['sizes']['gallery-single'];
				$caption = $image['caption'];
				$img_src_full = $image['sizes']['large'];
				?>
                
                <div class="slide">
                    <a class="ilightbox" href="<?php echo $img_src_full; ?>">
                        <div class="image-caption"><?php echo "$caption"; ?></div>
                        <img class="single-galleries-carousel-slide-image" src="<?php echo $img_src; ?>" alt="<?php echo $alt; ?>" />
                    </a>
                </div>
                   
        <?php        
            endforeach;
        endif;
        
        ?>
		
	</div>
</div>
<?php endif; ?>