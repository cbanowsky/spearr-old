<?php 
/**
 * Gallery (Carousel) post format
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/ 
global $ft_option;
?>

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
				<li><?php esc_attr( the_category(', ') ); ?></li>
			</ul>
			<h1 class="post-title"><?php the_title(); ?></h1>	
			<div class="post-meta">
				
				<?php if($ft_option["single_author_name"]=="1"):?>
				<?php _e("by", "favethemes"); ?> 
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a>
                <?php endif; ?>
                
				<?php if($ft_option["single_post_date"]=="1"):?>
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
 		<?php get_template_part( 'inc/post_gallery', 'carousel' ); ?>
	

 </div>
</section>
				
				
<section>

	<?php get_template_part("inc/common-single") ;?>
    
    <div id="share-page" style="display: none;">
		<?php get_template_part ( 'inc/single-post-share');?>
    </div>
	
    <?php if($ft_option['posts_default_sidebar_on']== 0 ): ?>
		<?php if(! get_field( 'post_sidebar' ) || get_field( 'post_sidebar' ) == "post_sidebar_off"):?>
        <div class="container">
            <div class="article_nav single-gallery-article_nav">
                <?php if($ft_option["single_nav_arrows"]=="1"):?>
                <!-- Article nav -->
                <?php get_template_part( 'inc/article_nav' ); ?>
                <!-- End article nav -->
                <?php endif; ?>
            </div>	
        </div>
        <?php endif; ?>
    <?php endif; ?>
	
</section>
<?php endwhile; wp_reset_query(); endif; ?>