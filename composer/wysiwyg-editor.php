<?php 
/**
 * Wysiwyg Section
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.2
**/
?>

<section class="container module wysiwyg_editor_section">
	<div class="row">
		
        <?php 
		if(!get_sub_field( 'wysiwyg_title_postion' ) || get_sub_field( 'wysiwyg_title_postion' )=="left_side"):
        		$class_box_title = "title-box-left";
        elseif(get_sub_field( 'wysiwyg_title_postion' )=="right_side"):
        		$class_box_title = "title-box-right";
        endif; ?>
        
        <?php
        if(!get_sub_field( 'wysiwyg_disable_title_box' ) || get_sub_field( 'wysiwyg_disable_title_box' )=="enable"):?>
			<?php if( get_sub_field( 'wysiwyg_editor_title' ) ): ?>
            <div class="col-lg-3 col-md-3 col-sm-4 sticky-col <?php echo $class_box_title; ?>">
                <div class="category-box sticky-box static_col">
                     <h2><?php the_sub_field( 'wysiwyg_editor_title' ); ?></h2>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        
        
        <?php
        if(!get_sub_field( 'wysiwyg_disable_title_box' ) || get_sub_field( 'wysiwyg_disable_title_box' )=="enable"):
				$width_classess = "col-lg-9 col-md-9 col-sm-12";
		else:
				$width_classess = "col-lg-12 col-md-12 col-sm-12";
		endif;
        ?>
        <div class="<?php echo $width_classess; ?>">
			<div class="post-row">
				<?php the_sub_field( 'unpress_wysiwyg_editor' ); ?>
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
        
      </div><!-- .row -->
</section><!-- .container -->