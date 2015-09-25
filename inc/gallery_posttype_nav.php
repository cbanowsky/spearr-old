<?php
/*
* Custom post type gallery next prev nav
*/
global $ft_option;
?>
<div class="container">
    <div class="article_nav single-gallery-article_nav">
        <?php if($ft_option["gallery_single_nav_arrows"]=="1"):?>
        <!-- Article nav -->
        <nav class="component_next-previous-articles">
        <!-- Next and previous articles here -->
        <?php 
        $prevPost = get_previous_post();
        if($prevPost) {
            $args = array(
                'posts_per_page' => 1,
                'post_type' => 'gallery',
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) {
                setup_postdata($post);
            ?>
            <a href="<?php the_permalink(); ?>" target="_self">    
            <button class="component_next-article active">
                <i class="fa fa-angle-right"></i>
                <div class="next-article_wrapper">
                    <div class="next-article_details">
                        <header class="next-article_header">
                            <h3><?php the_title(); ?></h3>
                            <em><?php _e("by","favethemes"); ?> <?php the_author(); ?></em>
                        </header>
                        <div class="next-article_image">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                    </div>
                </div>
            </button>
            </a>
            <?php
                    wp_reset_postdata();
                } //end foreach
            } // end if
            
            $nextPost = get_next_post();
            if($nextPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'post_type' => 'gallery',
                    'include' => $nextPost->ID
                );
                $nextPost = get_posts($args);
                foreach ($nextPost as $post) {
                    setup_postdata($post);
            ?>
            <a href="<?php the_permalink(); ?>" target="_self">    	
            <button class="component_previous-article active">
                <i class="fa fa-angle-left"></i>
                <div class="previous-article_wrapper">
                    <div class="previous-article_details">
                        <header class="previous-article_header">
                            <h3><?php the_title(); ?></h3>
                            <em><?php _e("by","favethemes"); ?> <?php the_author(); ?></em>
                        </header>
                        <div class="previous-article_image">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                    </div>
                </div>
            </button>
            </a>
            
            <?php
                    wp_reset_postdata();
                } //end foreach
            } // end if
            ?>
        </nav>
        <!-- End article nav -->
        <?php endif; ?>
    </div>	
</div>