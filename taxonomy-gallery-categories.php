<?php
/**
 * Taxonomy gallery-tags
 * @package UnPress
 * @since 	UnPress 1.0
 */

get_header(); ?>
<div id="page-wrap">
<?php if (have_posts()) :?>

<section class="container module masonry">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-4 sticky-col">
			<div class="category-box sticky-box static_col">
				<h2><?php single_cat_title(); ?></h2>
			</div>
		</div>
        
        <div class="col-lg-9 col-md-9 col-sm-8">
			<div class="row post-row">
				
				<?php 
					while (have_posts()) : the_post();?> 
					
						<div id="post-<?php the_ID(); ?>" <?php post_class("post-holder col-lg-4 col-md-4 col-sm-6 col-xs-12"); ?>>
							<div class="featured-image image-holder holder">
								<?php unpress_masonry_image(); ?>
							</div><!-- .featured-image -->
							
							<div class="post-content-holder">
								<header>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="post-author"><?php _e("by", "favethemes");?> <?php the_author();?></p>
								</header>
								
								<div class="post-entry-holder">
									<?php the_excerpt(); ?>
								</div><!-- .post-entry-holder -->
								
							</div><!-- .post-content-holder -->
						</div><!-- .post-holder -->
				<?php
					endwhile;
                ?> 
							
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
        
	</div><!-- .row -->
</section><!-- .container -->
<?php
//Page Nav
unpress_paging_nav();
endif;
wp_reset_query();
?>
</div>
<?php get_footer(); ?>
