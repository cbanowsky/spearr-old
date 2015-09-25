<?php 
/**
 * The template for displaying all pages
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/ 
?>

<?php get_header(); ?>
<div id="page-wrap">
<?php 
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); 
?>
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="row">
	<?php if ( get_field( 'page_sidebar' ) == 'page_sidebar_on' ):?>
		<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
    <?php else: ?>
    	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">    
    <?php endif; ?>
			<article class="page">
				
				<div class="entry-content">
					<?php the_content(); ?>		
				</div>
			
				
			</article>
		</div>
        
        <?php if ( get_field( 'page_sidebar' ) == 'page_sidebar_on' ):?>
		<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
			<aside class="sidebar">
				<?php generated_dynamic_sidebar(); ?>
			</aside>
		</div>
        <?php endif; ?>
	</div>
</section>	
<?php
endwhile;
endif;?>	
</div>
<?php get_footer(); ?>