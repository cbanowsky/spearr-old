<?php
/**
 * Variable product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product, $post;
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo $post->ID; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
	<?php if ( ! empty( $available_variations ) ) : ?>
		<div class="variations" cellspacing="0">
				<div class="row">
				<?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++; ?>
				
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="<?php echo sanitize_title($name); ?>"><?php echo wc_attribute_label( $name ); ?></label>
							<select id="<?php echo esc_attr( sanitize_title( $name ) ); ?>" name="attribute_<?php echo sanitize_title( $name ); ?>">
								<option value=""><?php echo __( 'Choose an option', 'woocommerce' ) ?>&hellip;</option>
								<?php
									if ( is_array( $options ) ) {

										if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ) {
											$selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $name ) ];
										} elseif ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) {
											$selected_value = $selected_attributes[ sanitize_title( $name ) ];
										} else {
											$selected_value = '';
										}

										// Get terms if this is a taxonomy - ordered
										if ( taxonomy_exists( $name ) ) {

											$orderby = wc_attribute_orderby( $name );

											switch ( $orderby ) {
												case 'name' :
													$args = array( 'orderby' => 'name', 'hide_empty' => false, 'menu_order' => false );
												break;
												case 'id' :
													$args = array( 'orderby' => 'id', 'order' => 'ASC', 'menu_order' => false, 'hide_empty' => false );
												break;
												case 'menu_order' :
													$args = array( 'menu_order' => 'ASC', 'hide_empty' => false );
												break;
											}

											$terms = get_terms( $name, $args );

											foreach ( $terms as $term ) {
												if ( ! in_array( $term->slug, $options ) )
													continue;

												echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
											}
										} else {

											foreach ( $options as $option ) {
												echo '<option value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
											}

										}
									}
								?>
							</select> 
							
						</div>
					
		        <?php endforeach;?>
		        
		        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        	<div class="reset_variations">
		        		<?php if ( sizeof( $attributes ) == $loop ) echo '<a href="#reset">' . __( 'Clear selection', 'woocommerce' ) . '</a>'; ?>	
		        	</div>
				</div>

			</div>
		</div>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap" style="display:none;">
			<?php do_action( 'woocommerce_before_single_variation' ); ?>

			<div class="single_variation"></div>
			
			<div class="row">
				<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
					<div class="variations_button">
						<button type="submit" class="single_add_to_cart_button button alt btn btn-default add-to-cart-button form-control"><?php echo $product->single_add_to_cart_text(); ?></button>
						
					</div>
				</div>
				<div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
					<?php woocommerce_quantity_input(); ?>
					<input type="hidden" name="add-to-cart" value="<?php echo $product->id; ?>" />
					<input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
					<input type="hidden" name="variation_id" value="" />
				</div>
			</div>

			<?php do_action( 'woocommerce_after_single_variation' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php else : ?>

		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>

	<?php endif; ?>

</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
