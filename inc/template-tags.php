<?php
/**
 * Custom template tags for unpress
 *
 * @package UnPress
 * @since UnPress 1.0
 */

if ( ! function_exists( 'unpress_masonry_image' ) ) :
/**
 * Get masonry layout featured image and tags
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_masonry_image(){
	
	if ( has_post_thumbnail() ): ?>
        <a class="overlay" href="<?php the_permalink(); ?>">
            <span class="hover">
                <span class="hover-btn"><i class="fa fa-angle-right"></i></span>
            </span><!-- .hover -->
            <?php the_post_thumbnail("masonry-size"); ?>
        </a><!-- .overlay -->
        <?php if( has_tag() ): ?>
        <div class="tag-holder">
            <?php esc_attr( unpress_post_tags() );?>
        </div><!-- .tag-holder -->
        <?php endif; ?>
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
        
<?php
	endif;	
}
endif;


if ( ! function_exists( 'unpress_block_image' ) ) :
/**
 * Get block layout featured image and tags
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_block_image(){
	
	if ( has_post_thumbnail() ): ?>
        <a class="overlay" href="<?php the_permalink(); ?>">
            <span class="hover">
                <span class="hover-btn"><i class="fa fa-angle-right"></i></span>
            </span><!-- .hover -->
            <?php the_post_thumbnail("block-size"); ?>
        </a><!-- .overlay -->
        <?php if( has_tag() ): ?>
        <div class="tag-holder">
            <?php esc_attr( unpress_post_tags() );?>
        </div><!-- .tag-holder -->
        <?php endif; ?>
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
<?php
	endif;	
}
endif;


if ( ! function_exists( 'unpress_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&laquo;', 'favethemes' ),
		'next_text' => __( '&raquo;', 'favethemes' ),
	) );

	if ( $links ) :

	?>
    <section class="container text-center">
        <div class="row">
            <div class="pagination-wrap">
                <ul class="pagination">
                  <li><?php echo $links; ?></li>
                </ul>
            </div>
        </div>		
    </section>
	<?php
	endif;
}
endif;

if ( ! function_exists( 'unpress_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
    <section class="pagination-wrapper">
        <div class="pagination mypagi">
            <ul class="page-numbers list-unstyled list-inline">
            <?php if ( is_attachment() ) : ?>
					<li><?php previous_post_link( '%link', __( '<i class="fa fa-angle-left"></i>', 'favethemes' ) ); ?></li>
			<?php else : ?>
					<li><?php previous_post_link( '%link', __( '<i class="fa fa-angle-left"></i>', 'favethemes' ) ); ?></li>
                	<li><?php next_post_link( '%link', __( '<i class="fa fa-angle-right"></i>', 'favethemes' ) ); ?></li>
			<?php endif; ?>
            </ul>
        </div>
    </section><!-- .pagination-wrapper -->
   <?php
}
endif;

if ( ! function_exists( 'unpress_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'favethemes' ) . '</span>';
	}

	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Find out if blog has more than one category.
 *
 * @since UnPress 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function unpress_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'unpress_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'unpress_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so UnPress_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so UnPress_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in UnPress_categorized_blog.
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'unpress_category_count' );
}
add_action( 'edit_category', 'unpress_category_transient_flusher' );
add_action( 'save_post',     'unpress_category_transient_flusher' );