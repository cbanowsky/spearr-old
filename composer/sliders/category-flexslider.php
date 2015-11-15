<?php 
/**
 * Category Flex Slider
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;

/** 
 * Add posts to slider only if the 'Category Slider' 
 * custom field checkbox was checked on the Post edit page
**/

$current_category = get_term_by('name', single_cat_title('',false), 'category');
$current_category = $current_category->slug;

$unpress_cat_slider = new WP_Query(
	array(
		'post_type' => 'post',
		'meta_key' => 'add_category_slider',
		'meta_value' => 1,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' =>  $current_category
			)
		)
	)
);
?>

<div id="flexslider-rotator-container">
<?php if ( $unpress_cat_slider->have_posts() ) : ?>

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="flexslider">
					<ul class="slides">
						
                    <?php while ( $unpress_cat_slider->have_posts() ) : $unpress_cat_slider->the_post(); ?>
                        
                        <li class="item">
							<div class="inner">
								<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail("iosslider"); ?>
								</a>
								<div class="selectorShadow"></div>
								
								<div class="text-external-wrap">
									<div class="text-wrap">
										<div class="text1">
											<span class="category-name"><?php the_category(' '); ?></span>
											<span class="post-title-name"><?php the_title(); ?></span>
										</div>
									</div>
								</div>		
							</div>
						</li>
					
					<?php endwhile; ?>	
												
					</ul>
				</div>
			</div>
		</div>
	</div>  

<?php endif; ?>
<?php wp_reset_query(); ?>
</div><!-- #home-rotator-container -->