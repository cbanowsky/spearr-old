<div class="category-box sticky-box static_col">
	<?php if( get_sub_field( 'category_main_title' ) ): ?>
            <h2><?php the_sub_field( 'category_main_title' ); ?></h2>
    <?php endif; ?>
    <?php if( get_sub_field( 'category_all_post' ) ): ?>
    <?php $category_link = get_category_link( $cat_id ); ?>
    <?php $category_name = get_the_category_by_ID( $cat_id ); ?> 
    <p><?php the_sub_field( 'category_all_post' ); ?> <a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_attr( $category_name ); ?></a></p>
    <?php endif; ?>
</div>