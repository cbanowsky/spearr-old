<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop, $ft_option, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

?>

<li class="product-holder">
    <div class="product-image image-holder holder">
        <?php woocommerce_get_template( 'loop/sale-flash.php' ); ?>
        <a href="<?php the_permalink(); ?>">
            <div class="front-image"><?php echo get_the_post_thumbnail( $post->ID, 'shop_catalog') ?></div>
            <?php

						if ( $attachment_ids ) {
					
							$loop = 0;				
							
							foreach ( $attachment_ids as $attachment_id ) {
					
								$image_link = wp_get_attachment_url( $attachment_id );
					
								if ( ! $image_link )
									continue;
								
								$loop++;
								
								printf( '<div class="back-image back">%s</div>', wp_get_attachment_image( $attachment_id, 'shop_catalog' ) );
								
								if ($loop == 1) break;
							
							}
					
						} else {
						?>
                        
                        <div class="back-image"><?php echo get_the_post_thumbnail( $post->ID, 'shop_catalog') ?></div>
                        
                        <?php
							
						}
					?>
        </a><!-- .overlay -->
        
		<?php if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                   <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
       <?php } ?>
    </div><!-- .featured-image -->
    
    <div class="product-content-holder text-center">
        <div>
            <div class="shop-category">
                <?php $product_cats = strip_tags($product->get_categories('|', '', '')); ?>
          		<?php list($firstpart) = explode('|', $product_cats); echo $firstpart; ?>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        <?php woocommerce_template_loop_add_to_cart(); ?>
        
    </div><!-- .post-content-holder -->
</li><!-- .post-holder -->
