<div class="featured-image image-holder holder display-post-content-for-mosaic">
    <div class="overlay">
        <?php
        global $meta_prefix;
        $cover_story = get_post_meta($post->ID, $meta_prefix . 'cover_story', true);
        ?>
        <?php if ($cover_story): ?>
        <div class="mosaic-post-content-holder">
            <div class="mosaic-post-content-display">
                <?php echo $cover_story; ?>
            </div>
        </div>
        <?php endif ?>
        <a href="<?php the_permalink(); ?>">
            <?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("mosaic-size");
			} else { ?>
               ><img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
        </a>

    </div>
</div>