<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php 
/** Output the WooCommerce Breadcrum  */
$defaults = array(
        'delimiter'  => '',
        'wrap_before'  => '<ol class="breadcrumb woocommerce-breadcrumb">',
        'wrap_after' => '</ol>',
        'before'   => '<li>',
        'after'   => '</li>',
        'home'    => true
    );
$args = wp_parse_args(  $defaults  );
woocommerce_get_template( 'shop/breadcrumb-single-product.php', $args );
?>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>