<div class="featured-image image-holder holder display-post-content-for-mosaic">
    <ul class="overlay">
		<span class="hover"></span>
        <div class="mosaic-post-content-holder">
            <div class="mosaic-post-content-display hidden-md hidden-sm">
                <header>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    
					<?php unpress_author(); ?>
                
                </header>
                <?php if( get_sub_field( 'latest_posts_excerpt' )=="enable" 
						  || get_sub_field( 'featured_posts_excerpt' )=="enable"
						  || get_sub_field( 'category_posts_excerpt' )=="enable" 
						  || get_sub_field( 'format_posts_excerpt' )=="enable"
						): ?>
                <div class="post-entry-holder">
                    <?php the_excerpt(); ?>
                </div><!-- .post-entry-holder hidden-md hidden-sm hidden-sm-->
                <?php endif; ?>
                <div class="mosaic-hover-holder">
	                <a href="<?php the_permalink(); ?>" class="mosaic-post-read-more">VIEW MORE</a>
                </div>
            </div><!-- .post-content-display hidden-md hidden-sm -->
        </div>
        <a href="<?php the_permalink(); ?>">
            <?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("mosaic-size");
			} else { ?>
               ><img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
        </a>

    </ul>
    <?php
	// Add icon to different post formats
	if ( 'gallery' == get_post_format() ): // Gallery
		echo '<div class="icon-post-holder"><h3>Gallery</h3></div>';
	elseif ( 'video' == get_post_format() ): // Video
		echo '<div class="icon-post-holder"><h3>Video</h3></div>';
	elseif ( 'audio' == get_post_format() ): // Audio
		echo '<div class="icon-post-holder"><h3>Audio</h3></div>';
	endif;
	?>	
</div>