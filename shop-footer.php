<?php
/**
 * The template for displaying the Shop footer
 *
 * Contains Shop footer content.
 *
 * @package UnPress
 * @since UnPress 2.0
 */
 global $ft_option;
?>
<?php if ( is_active_sidebar( 'footer1-sidebar' ) ) : ?>
<div class="shop-footer">
	<div class="container">
    	<div class="row">
        	
				<?php dynamic_sidebar(' footer1-sidebar '); ?>
            
        </div>
    </div>
</div>
<?php endif; ?>