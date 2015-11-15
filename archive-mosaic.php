<?php
/**
 * The archive page
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>

<?php get_header(); ?>

<?php if (get_field ( 'category_ad', 'category_' . get_query_var('cat') )):?>
<section class="container category_advertising">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row post-row">
            
            <?php the_field ( 'category_ad', 'category_' . get_query_var('cat')); ?>
                        
        </div><!-- .row -->
    </div><!-- .col-lg-12 -->
</section><!-- .container -->
<?php endif; ?>

<?php if (have_posts()) :?>

<section class="container module mosaic masonry">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-4 sticky-col">
			<div class="category-box sticky-box static_col">
				<h2>
                	<?php if (is_category()) { ?>
					<?php single_cat_title(); ?>
                    
                    <?php } elseif(is_tag()) { ?>
                    <?php single_tag_title(); ?>
                    
                    <?php } elseif (is_day()) { ?>
                    <?php printf( __( '%s', 'favethemes' ), get_the_date() ); ?>
                    
                    
                    <?php } elseif (is_month()) { ?>
                    <?php printf( __( '%s', 'favethemes' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'favethemes' ) ) ); ?>
                    
                    <?php } elseif (is_year()) { ?>
                    <?php printf( __( '%s', 'favethemes' ), get_the_date( _x( 'Y', 'yearly archives date format', 'favethemes' ) ) ); ?>
                    
                    <?php } elseif ( get_post_format() ) { ?>
                    <?php echo get_post_format(); ?>
                    
                    <?php } elseif (is_author()) { ?>
                    <?php _e ( 'Author Archive', 'favethemes' ); ?>
                    
                    <?php } ?>
                </h2>
			</div>
		</div>
		<?php
        if (!get_field ( 'category_sidebar', 'category_' . get_query_var('cat') ) || get_field ( 'category_sidebar', 'category_' . get_query_var('cat') ) == "cat_sidebar_on" ):
			echo '<div class="col-lg-6 col-md-6 col-sm-4">';
		else:
			echo '<div class="col-lg-8 col-md-9 col-sm-8">';
		endif;
		?>
		
			<div class="row post-row">
				<?php 
					$i=0;
					
					if (have_posts()) :
                        while (have_posts()) : the_post(); $i++;  
                        	
							if($i==2 || $i==4):
								echo '<div id="post-'.get_the_ID().'" class="post-holder col-lg-8 col-md-8 col-sm-12 col-xs-12">';
							else:
                            	echo '<div id="post-'.get_the_ID().'" class="post-holder col-lg-4 col-md-4 col-sm-12 col-xs-12">';
							endif;
							?>
                                <?php get_template_part( 'post-format/mosaic', get_post_format() ); ?>
                                
                            </div>
            	
				<?php
						if($i==6){ $i=0; }
                    	endwhile; 
                endif;
				wp_reset_query();
                ?> 

			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
        
        <?php
        if ( !get_field ( 'category_sidebar', 'category_' . get_query_var('cat') ) || get_field ( 'category_sidebar', 'category_' . get_query_var('cat') ) == "cat_sidebar_on" ):
        	
			echo '<div class="col-md-8 col-sm-4">';
            	 	get_sidebar();
            echo '</div>';
		endif;
		?>
        
	</div><!-- .row -->
</section><!-- .container -->

<?php
//Page Nav
unpress_paging_nav();
 
else:
	get_template_part( 'content', 'none' );
endif;
wp_reset_query();
?>	
<?php get_footer(); ?>