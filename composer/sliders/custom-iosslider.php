<?php 
/**
 * Custom IOS Slider
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>

<?php if( get_sub_field( 'custom_add_new_slide' ) ): ?>
<div id="home-rotator-container">
    <div id="home-rotator">    
		<div class="fluidHeight">
			<div class="sliderContainer">
				<div class="iosSlider">
					<div class="slider">
					
					<?php while( has_sub_field('custom_add_new_slide' ) ): ?>	
                    <?php if ( get_sub_field( 'slide_image' ) ): ?>
                    
                    	<?php
							$attachment_id = get_sub_field( 'slide_image' );
							$iosslider = 'iosslider';
							$iosslider = wp_get_attachment_image_src( $attachment_id, $iosslider );
                       	?>    
                        <div class="item">
							<div class="inner">
                                <a title="<?php the_sub_field( 'slide_title' ); ?>" rel="bookmark" href="<?php the_sub_field( 'url' ); ?>">
                                    <img src="<?php echo $iosslider[0]; ?>" width="<?php echo $iosslider[1]; ?>" height="<?php echo $iosslider[2]; ?>" alt="<?php the_sub_field( 'slide_title' ); ?>"/>
                                
								<div class="selectorShadow"></div>
								<div class="text-external-wrap">
									<div class="text-wrap">
										<div class="text1">
											<span class="post-title-name"><?php the_sub_field( 'slide_title' ); ?></span>
										</div>
									</div>
								</div>
                                </a>		
							</div>
						</div><!-- item -->
                    <?php endif; ?>    
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
</div><!-- #home-rotator-container -->
<?php endif; ?>