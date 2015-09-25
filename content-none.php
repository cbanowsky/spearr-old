<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package UnPress
 * @since UnPress 1.0
 */
?>

<section class="container module masonry">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="row post-row">	
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'favethemes' ), admin_url( 'post-new.php' ) ); ?></p>
                <?php else : ?>

                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'favethemes' ); ?></p>
                <?php get_search_form(); ?>
				<?php endif; ?>
                
			</div>
		</div>
	</div>
</section>

