<?php
/**
 * The template for displaying the footer.
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-sidebar-1'  )
		&& ! is_active_sidebar( 'footer-sidebar-2' )
		&& ! is_active_sidebar( 'footer-sidebar-3'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
	
	if(unpress_footer_sidebar_class()=="col-three"):
		$first = "col-md-6"; $second = "col-md-3"; $third = "col-md-3";
	
	elseif(unpress_footer_sidebar_class()=="col-two"):
		$first = "col-md-6"; $second = "col-md-6"; $third = "col-md-6";
	
	elseif(unpress_footer_sidebar_class()=="col-one"):
		$first = "col-md-12"; $second = "col-md-12"; $third = "col-md-12";
	
	endif;
?>
<div class="footer-1-wrapper">
    <div class="container">
        <div class="row">
			
			<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
                <div id="footer-first" class="<?php echo $first; ?>">
                     <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
                <div id="footer-second" class="<?php echo $second; ?>">
                     <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
                <div id="footer-third" class="<?php echo $third; ?>">
                     <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>