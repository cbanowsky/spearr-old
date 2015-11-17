<div class="featured-image image-holder holder display-post-content-for-mosaic">
    <div class="overlay">
        <?php
        global $meta_prefix;
        $cover_story = get_post_meta($post->ID, $meta_prefix . 'cover_story', true);
        ?>
        <?php if ($cover_story): ?>
        <div class="mosaic-post-content-holder">
            <div class="mosaic-post-content-display">
                <div class="custom-meta-text">
                    <?php echo $cover_story; ?>

                    <!-- hard-coded link -->
                    <a href="<?php the_permalink(); ?>" class="mosaic-post-read-more"><?php _e('VIEW MORE', 'hack.cd'); ?></a>
                </div>
            </div>
        </div>
        <?php endif ?>
        
        <?php 
		if ( has_post_thumbnail() ) {
			the_post_thumbnail("mosaic-size");
		} else { ?>
           ><img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
        <?php } ?>

    </div>
</div>