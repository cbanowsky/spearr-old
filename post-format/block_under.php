<?php
if ( get_sub_field( 'latest_posts_sidebar' ) == 'enable' ):
	$css_class = "post-holder col-lg-6 col-md-12 col-sm-12 col-xs-12";
else:
	$css_class = "post-holder col-lg-6 col-md-4 col-sm-6 col-xs-12";
endif;
?>
<div id="post-<?php the_ID(); ?>" class="<?php post_class($css_class); ?>" style="text-align: center; margin: 0 0 auto; float: none;">
    <div class="featured-image image-holder holder" style="margin: 0 0 auto;">
            <?php unpress_block_image(); ?>
    </div><!-- .featured-image -->
    
    <div class="post-content-holder">
        <div class="post-content-display">
            <header>
                <h3 class="block_under_title" style="text-align: center;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                
                <?php unpress_author(); ?>
                
            </header>
            <?php if( get_sub_field( 'latest_posts_excerpt' )=="enable" 
					  || get_sub_field( 'featured_posts_excerpt' )=="enable"
					  || get_sub_field( 'category_posts_excerpt' )=="enable"
					  || get_sub_field( 'format_posts_excerpt' )=="enable"
					  ): ?>
            <div class="post-entry-holder hidden-md hidden-sm" style="text-align: center;">
                <?php the_excerpt(); ?>
            </div><!-- .post-entry-holder hidden-md hidden-sm hidden-sm-->
            <?php endif; ?>
        </div>
    </div>
</div>