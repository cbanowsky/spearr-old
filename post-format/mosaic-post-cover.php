<div class="featured-image image-holder holder display-post-content-for-mosaic">
    <div class="overlay">
        <?php
        global $meta_prefix;
        $cover_story = get_post_meta($post->ID, $meta_prefix . 'cover_story', true);
        $enable_permalink = get_post_meta($post->ID, $meta_prefix . 'enable_permalink', true);
        $permalink_button_text = get_post_meta($post->ID, $meta_prefix . 'permalink_button_text', true);
        if ($permalink_button_text) {
            $button_text = sprintf(__($permalink_button_text), 'hack.cd');
        } else {
            $button_text = sprintf(__('VIEW MORE', 'hack.cd'));
        }
        ?>
        <?php if ($cover_story): ?>
        <div class="mosaic-post-content-holder">
            <div class="mosaic-post-content-display">
                <div class="custom-meta-text">
                    <?php echo $cover_story; ?>

                    <?php if ($enable_permalink == true): ?>
                    <a href="<?php the_permalink(); ?>" class="mosaic-post-read-more"><?php echo $button_text; ?></a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php endif ?>
      <a href="<?php the_permalink(); ?>">
        <?php
		if (has_post_thumbnail()) {
    		the_post_thumbnail("mosaic-size-large");
		} else { ?>
           <img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
        <?php } ?>
    </a>

    </div>
</div>
