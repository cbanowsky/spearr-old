<div class="featured-image image-holder holder display-post-content-for-mosaic">
    <div class="overlay">
		<span class="hover"></span>
        <div class="mosaic-post-content-holder">
            <div class="mosaic-post-content-display">
                <header>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    
					<?php unpress_author(); ?>
                
                </header>
                <div class="post-entry-holder">
                    <?php the_excerpt(); ?>
                </div><!-- .mosaic-post-content-display -->
                <div class="mosaic-hover-holder">
	                <a href="<?php the_permalink(); ?>" class="mosaic-post-read-more">VIEW MORE</a>
                </div>
            </div><!-- .post-content-display hidden-md hidden-sm -->
        </div>
        <a href="<?php the_permalink(); ?>">
            <?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("mosaic-size-small");
			} else { ?>
               <img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
        </a>

    </div>
</div>