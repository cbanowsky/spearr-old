<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package UnPress
 * @since UnPress 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if((! get_field( 'video_post_sidebar' ) || get_field( 'video_post_sidebar' ) == "video_post_sidebar_off")):
	$comment_class_section = "container module comments";
	$comment_class_sticky_box = "col-lg-3 col-md-3 col-sm-4 sticky-col";
	$comment_class_col2 = "col-lg-9 col-md-9 col-sm-8";
else:
	$comment_class_section = "module comments";
	$comment_class_sticky_box = "col-lg-4 col-md-4 col-sm-4 sticky-col";
	$comment_class_col2 = "col-lg-8 col-md-8 col-sm-8";
endif;

?>
<section class="<?php echo $comment_class_section; ?> ">
	<div class="row">
		<div class="<?php echo $comment_class_sticky_box; ?>">
			<div class="category-box sticky-box static_col">
				<h2><?php _e("Comments", "favethemes"); ?></h2>
			</div>
		</div>
		<div class="<?php echo $comment_class_col2; ?>">
		
			<div class="comment-form row ">
                <div>
                 	
                    <?php
					//Custom Fields
					$fields =  array(
						'author'=> '<div class="form-group col-lg-4 col-md-4 col-sm-12">
										<input name="author" id="author" value="" placeholder="'.__('Name','favethemes').'" type="text" class="form-control">
									</div>',
						
						'email' => '<div class="form-group col-lg-4 col-md-4 col-sm-12">
										<input type="text" name="email" id="email" class="form-control" placeholder="'.__('Email','favethemes').'">
									</div>',
						
						'url' 	=> '<div class="form-group col-lg-4 col-md-4 col-sm-12">
										<input class="form-control"  name="url" id="url" placeholder="'.__('Website','realto').'" type="text">
									</div>',
					);
			
					//Comment Form Args
					$comments_args = array(
						'fields' => $fields,
						'title_reply'=>'<h2 class="title"><span>'. __('Leave A Comment', 'favethemes') .'</span></h2>',
						'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.','favethemes' ). '</p>',
						'comment_notes_after' => '',
						'comment_field' => '<div class="form-group col-lg-12 col-md-12 col-sm-12"><textarea class="form-control" name="comment" id="comment"></textarea></div>',
						'label_submit' => __('Post Comment','favethemes')
					);
					
					// Show Comment Form
					comment_form($comments_args); 
				?>
                       
                </div>
			</div>
            
			
			<?php if ( have_comments() ) : ?>

			<h3 class="serif italic">
                <?php
                    printf( _n( '1 Responses to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'realto' ),
                        number_format_i18n( get_comments_number() ), get_the_title() );
                ?>
            </h3>
        
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'realto' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'realto' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'realto' ) ); ?></div>
            </nav><!-- #comment-nav-above -->
            <?php endif; // Check for comment navigation. ?>
            
            <div class="comments">
                <ul class="media-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'avatar_size'=> 100,
                        ) );
                    ?>
                </ul><!-- .comment-list -->
            </div>
            <?php endif; // have_comments() ?>
			
		</div><!-- .col-lg-9 -->
	</div><!-- .row -->
</section><!-- .container -->


