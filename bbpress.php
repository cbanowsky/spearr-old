<?php 
/**
 * bbPress Forum Template 
 *
 * @package UnPress
 * @since 	UnPress 1.2
**/ 
?>

<?php get_header(); ?>
<?php 
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); 
?>
<section class="container bbpress-container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="row">
	
		<div class="col-md-9">
    
			<article class="page">
				
				<div class="entry-content">
					<?php the_content(); ?>		
				</div>
			
				
			</article>
		</div>
       
		<div class="col-md-3">
			<aside class="sidebar">
				<?php dynamic_sidebar("bbpress-sidebar"); ?>
			</aside>
		</div>
        
	</div>
</section>	
<?php
endwhile;
endif;?>	
<?php get_footer(); ?>