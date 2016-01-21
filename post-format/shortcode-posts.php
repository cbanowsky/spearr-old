<div id="post-<?php the_ID(); ?>" class="single-featured-post">
    <div class="border-holder">
        <div class="featured-image image-holder holder">
            <a href="<?php the_permalink(); ?>">
            <?php
            if (has_post_thumbnail()) {
                $image_link = spearr_aq_resize($post->ID, 400, 400, true);
                echo '<img src="' . $image_link . '" title="' . get_the_title() . '">';
            } else { ?>
                <img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
            </a>
        </div><!-- .featured-image -->
        
        <div class="post-content-holder">
            <div class="post-content-display">
                <header>
                    <h3 class="block_under_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </header>
                <div class="post-entry-holder">
                    <?php the_excerpt(); ?>
                </div><!-- .post-entry-holder -->
            </div>
        </div>
    </div>
</div>