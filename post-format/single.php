<?php echo function_exists('dpc_metadescription') ? dpc_metadescription() : ''; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <header class="text-center mar-b30 col-sm-12 col-lg-10 col-lg-offset-1">
                <div class="post-icon"><i class="fa fa-file-o"></i></div>
                <?php get_template_part( 'inc/meta-single' ); ?>
                <h1 class="post-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content col-sm-12 col-lg-10 col-lg-offset-1">
            <?php if ( is_search() ) : ?>
			<?php the_excerpt(); ?>
            <?php else : ?>
            <?php
                the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'favethemes' ) );

                $args = array(
                    'before' => '<div class="link-pages">' . __( 'Pages:', 'favethemes' ),
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                );
                wp_link_pages( $args );
            ?>
            <?php endif; ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
    <div class="post-divisor"></div>
</article>
