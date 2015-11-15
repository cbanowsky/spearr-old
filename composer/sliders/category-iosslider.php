<?php 
/**
 * Category IOS Slider
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

<div id="home-rotator-container">
<?php if ( $unpress_cat_slider->have_posts() ) : ?>

    <div id="home-rotator">    
		<div class="fluidHeight">
			<div class="sliderContainer">
				<div class="iosSlider">
					<div class="slider">
					
					<?php while ( $unpress_cat_slider->have_posts() ) : $unpress_cat_slider->the_post(); ?>
                    	
                        <div class="item">
							<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                            <div class="inner">
								<?php the_post_thumbnail("iosslider"); ?>
								
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
                            </a>
						</div>
					
					<?php endwhile; ?>
                    	
					</div><!-- .slider -->
				</div><!-- .iosSlider -->
				
			</div><!-- .sliderContainer -->
		</div><!-- .fluidHeight -->
		<div class="home-rotator-navigation">
			<div class="sliderPrev" id="prev"><i class="fa fa-angle-left"></i></div>
			<div class="sliderNext" id="next"><i class="fa fa-angle-right"></i></div>
		</div>
	</div><!-- #home-rotator -->

<?php endif; ?>
<?php wp_reset_query(); ?>    

</div><!-- #home-rotator-container -->