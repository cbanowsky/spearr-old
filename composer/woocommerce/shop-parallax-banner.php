<?php 
/*
	Shop parallax banner
	@unPress
*/


$rnd_id = unpress_element_key();
$token = wp_generate_password(5, false, false);

wp_enqueue_script('ft-custom-parallax', get_template_directory_uri() . '/js/custom/custom-parallax.js', array('ft-jquery.parallax'), '1.0', true ); 
wp_localize_script( 'ft-custom-parallax', 'ft_parallax_'. $token, array( 'id' => $rnd_id) );
?>

<div data-token="<?php echo $token; ?>" class="parallax-bag-<?php echo $rnd_id; ?> parallax-banner banner-bg" <?php if( get_sub_field( 'background_image' ) ){?>style="background-image: url('<?php echo get_sub_field( 'background_image' );?>'); <?php } ?>">
	<div class="text-external-wrap">
		<div class="text-wrap">
			<div class="text1">
				<div class="parallax-banner-body fadeIn fadeIn-1s">
					<?php if( get_sub_field( 'parallax_editor' ) ){?>
                            <?php the_sub_field( 'parallax_editor' ); ?>
                    <?php } ?>
					
                    <?php if( get_sub_field( 'parallax_banner_buttons' ) ): ?>
                    <div class="parallax-banner-buttons">
						<ul class="list-inline">
							<?php while( has_sub_field('parallax_banner_buttons' ) ): ?>	
                            
                            <?php if( get_sub_field( 'button_text' ) !="" ):?>
                            	<li><a href="<?php the_sub_field( 'button_link' ); ?>" class="btn btn-parallax-banner"><?php the_sub_field( 'button_text' ); ?></a></li>
                            <?php endif; ?>
                            <?php endwhile; ?>
						</ul>
					</div>
                    <?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</div>