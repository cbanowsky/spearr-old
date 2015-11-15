<?php 
/**
 * Post IOS Slider
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;

/** 
 * Add posts to slider only if the 'Homepage Slider' 
 * custom field checkbox was checked on the Post edit page
**/
$slides_num = get_sub_field( 'slides_to_show' );

$unpress_posts_slider = new WP_Query(
	array(
		'post_type' => 'post',
		'meta_key' => 'homepage_slider',
		'meta_value' => '1',
		'posts_per_page' => $slides_num
	)
);
?>

<div id="home-rotator-container">
<?php if ( $unpress_posts_slider->have_posts() ) : ?>

    <div id="home-rotator">    
		<div class="fluidHeight">
			<div class="sliderContainer">
				<div class="iosSlider">
					<div class="slider">
					
					<?php while ( $unpress_posts_slider->have_posts() ) : $unpress_posts_slider->the_post(); ?>
                    	
                        <div class="item">
							<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                            <div class="inner">
								
								<?php the_post_thumbnail("iosslider"); ?>
								
								<div class="selectorShadow"></div>
								
								<div class="text-external-wrap">
									<div class="text-wrap">
										<div class="text1">
											<span class="category-name"><?php unpress_taxonomy_strip("category");//the_category(' '); ?></span>
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