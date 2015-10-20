<?php
if ( get_sub_field( 'latest_posts_sidebar' ) == 'enable'):
	$masonry_class = "post-holder col-lg-3 col-md-12 col-sm-12 col-xs-12";
else:
	$masonry_class = "post-holder col-lg-3 col-md-4 col-sm-6 col-xs-12";
endif;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class($masonry_class); ?>>
    <div class="featured-image image-holder holder">
     <?php unpress_masonry_image(); ?>
    </div><!-- .featured-image -->
    
    <div class="post-content-holder">
        <header>
            <div class="category-crubs"><?php esc_attr( the_category(' | ') ); ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
        </header>
        
        <?php if( get_sub_field( 'latest_posts_excerpt' )=="enable"
				  || get_sub_field( 'featured_posts_excerpt' )=="enable"
				  || get_sub_field( 'category_posts_excerpt' )=="enable"
				  || get_sub_field( 'format_posts_excerpt' )=="enable"
				): ?>
        <div class="post-entry-holder">
            <?php the_excerpt(); ?>
        </div><!-- .post-entry-holder -->
        <?php endif; ?>
    </div><!-- .post-content-holder -->
</div><!-- .post-holder -->