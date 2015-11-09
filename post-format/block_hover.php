<?php
global $ft_option;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-holder col-lg-9 col-md-4 col-sm-6 col-xs-12'); ?>>
    <div class="featured-image image-holder holder">
        <ul>
            <li class="overlay">
                <div class="hover">
                    <div class="post-content-holder">
                        <div class="post-content-display">
                            <header>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                
								<?php unpress_author(); ?>
                            
                            </header>
                            <?php if( get_sub_field( 'latest_posts_excerpt' )=="enable" 
									  || get_sub_field( 'featured_posts_excerpt' )=="enable"
									  || get_sub_field( 'category_posts_excerpt' )=="enable" 
									  || get_sub_field( 'format_posts_excerpt' )=="enable"
									): ?>
                            <div class="post-entry-holder hidden-md hidden-sm">
                                <?php the_excerpt(); ?>
                            </div><!-- .post-entry-holder hidden-md hidden-sm hidden-sm-->
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="hover-btn">VIEW MORE</a>
                        </div>
                    </div>
                </div><!-- .hover -->
                <?php the_post_thumbnail("block-size"); ?>
            </li><!-- .overlay -->
        </ul>
        <?php
        // Add icon to different post formats
        if ( 'gallery' == get_post_format() ): // Gallery
            echo '<div class="icon-post-holder"><i class="fa fa-picture-o"></i></div>';
        elseif ( 'video' == get_post_format() ): // Video
            echo '<div class="icon-post-holder"><i class="fa fa-video-camera"></i></div>';
        elseif ( 'audio' == get_post_format() ): // Audio
            echo '<div class="icon-post-holder"><i class="fa fa-microphone"></i></div>';
        endif;
        ?>	
    </div><!-- .featured-image -->
</div>