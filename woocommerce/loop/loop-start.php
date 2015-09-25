<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

global $ft_option;

$product_per_row = '3';
$product_per_row_full_width = '4';

if($ft_option['category_row_count']){
	$product_per_row = $ft_option['category_row_count'];
}

?>

<?php if($ft_option['main_shop_layout'] == 'right-sidebar' AND is_archive())  { ?>
       	<ul class="products unpress-block-grid-3">
<?php } else if ($ft_option['main_shop_layout'] == 'left-sidebar' AND  is_archive()) { ?>
		<ul class="products unpress-block-grid-3">
<?php } else if (is_archive()) { ?>
		<ul class="products unpress-block-grid-4">
<?php } else if($ft_option['single_product_layout'] == "right-sidebar" || $ft_option['single_product_layout'] == "left-sidebar") { ?>
		<ul class="products unpress-block-grid-3">
<?php } else { ?>
		<ul class="products unpress-block-grid-4">
<?php } ?>
