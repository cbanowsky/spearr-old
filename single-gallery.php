<?php 
/**
 * The Template for displaying all single custom post type gallery
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;
?>

<?php get_header(); ?>
<div id="page-wrap">
<?php 
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
  // Set post view
  fave_setPostViews(get_the_ID()); 
?>

<section class="container gallery gallery-title">
	<div class="row">
		<div class="col-md-12">
			<ul class="list-inline post-category">
				<?php unpress_custom_post_gallery_cats(); ?>
			</ul>
			<h1 class="post-title"><?php the_title(); ?></h1>	
			<div class="post-meta">
				<?php if($ft_option["gallery_single_author_name"]=="1"):?>
				<?php _e("by", "favethemes"); ?> 
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a>
                <?php endif; ?>
                
				<?php if($ft_option["gallery_post_date"]=="1"):?>
					<?php _e("on", "favethemes"); ?> 
                    <?php the_time(get_option('date_format')); ?>
                <?php endif; ?>
           </div>
           
           <?php
			// Post likes and views
			get_template_part("inc/likes-views");
			?>
           
		</div>
	</div>
</section>

<section class="gallery-container">
	<div class="container">
		<?php get_template_part( 'inc/single_gallery', 'carousel' ); ?>
	</div>
</section>
				
				
<section>
	<div class="container">
		<div class="row">
<!-- 			<?php 
			if(! get_field( 'gallery_post_sidebar' ) || get_field( 'gallery_post_sidebar' ) == "gallery_post_sidebar_off"):
				echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
			else:
				echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
			endif;
			?> -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
                
                <?php
				if( get_field( 'gallery_post_sidebar' ) == "gallery_post_sidebar_on"):?>
					
					<?php unpress_custom_post_gallery_tags(); ?>
                    <?php if($ft_option["gallery_single_author"]=="1"):?>
                    <div class="post-author-wrap ">
                        <div class="media">
                            <a class="pull-left" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                <?php esc_attr( the_author_meta( 'display_name' )); ?>
                                </h4>
                                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                    <p><?php the_author_meta( 'description' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>				
                    </div><!-- .post-author-wrap -->
                    <?php endif; ?>
					
					
					<?php
					if($ft_option["gallery_single_related"]=="1"):
						// Related Posts 
						get_template_part( 'inc/related', 'gallery' );
					endif; 
				
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template('/comments-galleries.php');
					}
					?>
					
                    <?php get_template_part("inc/gallery_posttype_nav"); ?>
                    
				<?php endif ?>
                
			</div>
            
            <?php
			if(! get_field( 'gallery_post_sidebar' ) || get_field( 'gallery_post_sidebar' ) == "gallery_post_sidebar_off"):?>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <?php unpress_custom_post_gallery_tags(); ?>
                    <?php if($ft_option["gallery_single_author"]=="1"):?>
                    <div class="post-author-wrap ">
                        <div class="media">
                            <a class="pull-left" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                <?php esc_attr( the_author_meta( 'display_name' )); ?>
                                </h4>
                                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                    <p><?php the_author_meta( 'description' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>				
                    </div><!-- .post-author-wrap -->
                    <?php endif; ?>
                </div>
                
				<?php else: ?>
            <?php endif ?>
            
		</div>
	</div>
    
    <div id="share-page" style="display: none;">
		<?php get_template_part ( 'inc/single-post-share');?>
    </div>
    
    <?php 
	if(! get_field( 'gallery_post_sidebar' ) || get_field( 'gallery_post_sidebar' ) == "gallery_post_sidebar_off"):
		 get_template_part("inc/gallery_posttype_nav"); 
    endif; 
	?>
	
</section>

<?php
if(! get_field( 'gallery_post_sidebar' ) || get_field( 'gallery_post_sidebar' ) == "gallery_post_sidebar_off"): 
	if($ft_option["gallery_single_related"]=="1"):
		// Related Posts 
		get_template_part( 'inc/related', 'gallery' );
	endif; 

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template('/comments-galleries.php');
	}
endif;
?>

<?php endwhile; wp_reset_query(); endif; ?>
</div>
<?php get_footer(); ?>