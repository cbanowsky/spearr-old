<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnPress
 * @since UnPress 1.0
 */

get_header(); ?>

<div id="page-wrap">
<?php if (have_posts()) : ?>
<section class="container module masonry">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="row post-row">
				
				<?php while (have_posts()) : the_post(); ?> 
                
                        <div id="post-<?php the_ID(); ?>" <?php post_class("post-holder col-lg-3 col-md-3 col-sm-6 col-xs-12"); ?>>
                        <div class="featured-image image-holder holder">
                            <?php unpress_masonry_image(); ?>
                        </div><!-- .featured-image -->
                        
                        <div class="post-content-holder">
                            <header>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                
                                <?php unpress_author(); ?>
                                
                            </header>
                            
                            <div class="post-entry-holder">
                                <?php the_excerpt(); ?>
                            </div><!-- .post-entry-holder -->
                            
                        </div><!-- .post-content-holder -->
                    </div><!-- .post-holder -->
                
                <?php endwhile; ?> 
				
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
	</div><!-- .row -->
</section><!-- .container -->
<?php unpress_paging_nav(); ?>
                
<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>
<?php wp_reset_query(); ?>
</div><!-- #page-wrap -->

<?php get_footer(); ?>