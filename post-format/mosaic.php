<div class="featured-image image-holder holder">
    <ul>        <li class="overlay">
            <div class="hover">
                <div class="post-content-holder">
                    <div class="post-content-display">
                        <div class="post-entry-holder hidden-md hidden-sm">
							<?php if( get_sub_field( 'latest_posts_excerpt' )=="enable" 
									  || get_sub_field( 'featured_posts_excerpt' )=="enable"
									  || get_sub_field( 'category_posts_excerpt' )=="enable"
									  || get_sub_field( 'format_posts_excerpt' )=="enable"
									  ): ?>
                            <?php endif; ?>
                        </div><!-- .post-entry-holder hidden-md hidden-sm -->
                        <a style="color: black;" href="<?php the_permalink(); ?>" class="hover-btn"> VIEW MORE</a>
                    </div>
                </div>
            </div><!-- .hover -->
                <a href="<?php the_permalink(); ?>">
            <?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("mosaic-size");
			} else { ?>
               ><img class="alter_img" src="<?php echo get_template_directory_uri(); ?>/images/pixel.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
        </a>
        </li><!-- .overlay -->
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