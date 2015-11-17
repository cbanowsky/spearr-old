<?php
/**
 * UnPress functions and definitions
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option;
/* Content Width */
if ( ! isset( $content_width ) ) $content_width = 1050; /* pixels */

define('FT_FUNCTIONS', get_template_directory()  . '/inc');
define('FT_INDEX_JS', get_template_directory_uri()  . '/js');
define('FT_INDEX_CSS', get_template_directory_uri()  . '/css');
//define('FT_INDEX_FONTS', get_template_directory_uri() . '/fonts');
if ( ! function_exists( 'unpress_setup' ) ) :
/**
 * UnPress setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since UnPress 1.0
 */
function unpress_setup() {
	/*
	 * Make UnPress available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 *
	 */
	load_theme_textdomain( 'favethemes', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', unpress_font_url() ) );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 600, true );
	add_image_size( 'masonry-size', 434, 9999);
	add_image_size( 'mosaic-size', 610, 610, true );
	add_image_size( 'block-size', 432, 432, true );
	//add_image_size( 'gallery-carousel', 320, 320, true );
	add_image_size( 'video-related', 316, 316, true );
	add_image_size( 'gallery-img', 418, 418, false );
	add_image_size( 'gallery-single', 365, 500, false );
	add_image_size( 'interview-carousel', 327, 450, true );
	add_image_size( 'interview-img', 450, 9999);
	add_image_size( 'widget-slider', 580, 580, true );
	add_image_size( 'iosslider', 968, 545, true );
	// add_image_size( 'menu-size', 400, 225, true );
	add_image_size( 'grid-style-1', 833, 540, true );
	
	// This theme uses wp_nav_menu() in one locations.
	register_nav_menus( array(
		'main_menu' => __( 'Main Menu', 'favethemes' ), // Main site menu
		'responsive_main_menu' => __( 'Responsive Main Menu', 'favethemes' ), // Main site menu
		'secondary_menu' => __( 'Secondary Menu', 'favethemes' ), // Main site menu
		'my_account_menu' => __( 'My Account Menu', 'favethemes' ) // Main site menu
		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video','gallery','audio', 'slideshow' ,
	) );
	
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	
}
endif; // unpress_setup
add_action( 'after_setup_theme', 'unpress_setup' );


/* Theme Options */
require_once ( 'admin/index.php' );

if(!class_exists('TwitterOAuth',false)) {
	include (FT_FUNCTIONS. '/twitteroauth/twitteroauth.php');
}

/* Custom Fields */
include_once( 'admin/acf/acf.php' );
include_once( 'admin/acf/acf-fields.php' );

include_once(FT_FUNCTIONS.'/plugins/multiple_sidebars.php' ); // multiple_sidebars
include_once(FT_FUNCTIONS.'/post-like.php' ); // Post Like
include_once(FT_FUNCTIONS.'/fave-views.php' ); // Post view count

/* Google Fonts */
include_once(FT_FUNCTIONS.'/google-fonts.php' ); // Load Fonts from Google

/* Includes */
global $ft_option;
if ( $ft_option['single_wp_gallery'] == 1 ) {
include_once( FT_FUNCTIONS.'/wp-gallery.php' );
}

require_once(FT_FUNCTIONS.'/styling-options.php'); // include styles for the front end.
require_once(FT_FUNCTIONS.'/register-scripts.php'); // include scripts and styles for the front end.
require_once(FT_FUNCTIONS.'/sliders-options.php'); // Slider options
require_once(FT_FUNCTIONS.'/template-tags.php');
require_once(FT_FUNCTIONS.'/gallery-post-type.php'); // Gallery Custom Post Type
require_once(FT_FUNCTIONS.'/video-post-type.php'); // Video Custom Post Type
require_once(FT_FUNCTIONS.'/interview-post-type.php'); // Video Custom Post Type
require_once(FT_FUNCTIONS.'/sidebar.php'); // Widgets sidebar
require_once(FT_FUNCTIONS.'/share_follow.php'); // Share Follow

require_once(FT_FUNCTIONS.'/menu-walker.php'); // Main Menu Walker
require_once(FT_FUNCTIONS.'/secondary-walker.php'); // Secondary Menu Walker

/* Register theme custom widgets */
require_once(FT_FUNCTIONS.'/widgets/unpress-instagram.php'); // A widget that displays a slider with instagram images
require_once(FT_FUNCTIONS.'/widgets/unpress-most-liked.php'); // Most Liked
require_once(FT_FUNCTIONS.'/widgets/unpress-most-viewed.php'); // Most Viewed
require_once(FT_FUNCTIONS.'/widgets/unpress-latest-posts.php'); // Latest posts list or slider
require_once(FT_FUNCTIONS.'/widgets/unpress-interview.php'); // Latest interviewss list or slider
require_once(FT_FUNCTIONS.'/widgets/unpress-video.php'); // Video Widget
require_once(FT_FUNCTIONS.'/widgets/unpress-latest-comments.php'); // Latest post comments
require_once(FT_FUNCTIONS.'/widgets/unpress-featured-posts.php'); // Featured posts list or slider
require_once(FT_FUNCTIONS.'/widgets/unpress-image-banner.php'); // Image Banner
require_once(FT_FUNCTIONS.'/widgets/unpress-code-banner.php'); // Code Banner
require_once(FT_FUNCTIONS.'/widgets/unpress-flickr-photos.php'); // Flickr Photos
require_once(FT_FUNCTIONS.'/widgets/unpress-twitter.php'); // Twitter feeds
require_once(FT_FUNCTIONS.'/widgets/unpress-about-site.php'); // Twitter feeds

require_once('woocommerce-functions.php'); // WooCommerce Functions

/**
 * Register Lato Google font for unPress.
 *
 * @since unPress 1.0
 *
 * @return string
 */
function unpress_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'favethemes' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}


if ( ! function_exists( 'unpress_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since UnPress 1.0
 *
 * @return void
 */
function unpress_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'favethemes' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since UnPress 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function unpress_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'favethemes' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'unpress_wp_title', 10, 2 );

// Get author avatar Url
function unpress_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

// Get post tags
function unpress_post_tags(){
	$posttags = get_the_tags();
	if ($posttags) {
	  foreach($posttags as $tag) {
		echo '<a href="'.get_tag_link($tag->term_id).'">&#35;'.$tag->name.'</a>' . ' '; 
	  }
	}
}

function unpress_taxonomy_strip($term){
	$terms = get_the_term_list( get_the_ID(), $term, '', ', ', '' ); 
	echo strip_tags( $terms );
}

function unpress_custom_post_gallery_tags(){
	
	$gallery_tags = wp_get_post_terms(get_the_ID(), 'gallery-tags', array("fields" => "all"));
	
	if(!empty($gallery_tags)):
	echo '<div class="tags-wrap">';
	echo '<h3>Tags</h3>';
	foreach($gallery_tags as $tag): 
            $term_link = get_term_link( $tag, 'gallery-tags' );
            if( is_wp_error( $term_link ) )
                continue;
           
            echo '<a href="'.$term_link.'">&#35;'.$tag->name.'</a>' . ' '; 
              
    endforeach;
	echo '</div>';
	endif;
}

function unpress_custom_post_video_tags(){
	
	$video_tags = wp_get_post_terms(get_the_ID(), 'video-tags', array("fields" => "all"));
	
	if(!empty($video_tags)):
	echo '<div class="tags-wrap">';
	echo '<h3>Tags</h3>';
	foreach($video_tags as $tag): 
            $term_link = get_term_link( $tag, 'video-tags' );
            if( is_wp_error( $term_link ) )
                continue;
           
            echo '<a href="'.$term_link.'">&#35;'.$tag->name.'</a>' . ' '; 
              
    endforeach;
	echo '</div>';
	endif;
}

function unpress_custom_post_interview_tags(){
	
	$interview_tags = wp_get_post_terms(get_the_ID(), 'interview-tags', array("fields" => "all"));
	
	if(!empty($interview_tags)):
	echo '<div class="tags-wrap">';
	echo '<h3>Tags</h3>';
	foreach($interview_tags as $tag): 
            $term_link = get_term_link( $tag, 'interview-tags' );
            if( is_wp_error( $term_link ) )
                continue;
           
            echo '<a href="'.$term_link.'">&#35;'.$tag->name.'</a>' . ' '; 
              
    endforeach;
	echo '</div>';
	endif;
}

function unpress_custom_post_gallery_cats(){
	
	$gallery_cats = wp_get_post_terms(get_the_ID(), 'gallery-categories', array("fields" => "all"));
	
	if(!empty($gallery_cats)):
	foreach($gallery_cats as $cat): 
            $term_link = get_term_link( $cat, 'gallery-categories' );
            if( is_wp_error( $term_link ) )
                continue;
           
            echo '<li><a href="'.$term_link.'">'.$cat->name.'</a></li>' . ' '; 
              
    endforeach;
	endif;
}

/**
 * Excerpt length
 * Excerpt more
*/
// Excerpt Length
function unpress_excerpt_length( $length ) {
	global $ft_option;
	return $ft_option['site_wide_excerpt_length'];
}
add_filter( 'excerpt_length', 'unpress_excerpt_length' );

// Excerpt more
function unpress_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'unpress_excerpt_more' );

function unress_excerpt(){
	echo substr(get_the_content(), 0,65);
}

/* Count the number of footer sidebars to enable dynamic classes for the footer */
function unpress_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'footer-sidebar-1' ) )
		$count++;

	if ( is_active_sidebar( 'footer-sidebar-2' ) )
		$count++;

	if ( is_active_sidebar( 'footer-sidebar-3' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'col-one';
			break;
		case '2':
			$class = 'col-two';
			break;
		case '3':
			$class = 'col-three';
			break;
	}

	if ( $class )
		return $class;
}

function unpress_author(){
	global $ft_option;
	
	if($ft_option["site_author_name"]=="1"):
    ?>
    	<p class="post-author">
			<?php _e("by", "favethemes");?>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php the_author();?>
            </a>
        </p>
    <?php 
	endif;
}

function unpress_author_box(){
global $ft_option;

if($ft_option["single_author"]=="1"):	
?>
<div class="post-author-wrap ">
    <div class="media">
        <a class="pull-left" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
        </a>
        <div class="media-body">
            <h4 class="media-heading">
            <?php esc_attr( the_author_meta( 'display_name' )); ?>
            </h4>
            <?php if ( get_the_author_meta( 'description' ) ) : ?>
                <p><?php the_author_meta( 'description' ); ?></p>
            <?php endif; ?>
        </div>
    </div>				
</div><!-- .post-author-wrap -->
<?php
endif; 
}

function unpress_share_button(){
	global $ft_option;
	
	if($ft_option["single_social"]=="1"): ?>
    <div class="post-sharing-wrap pull-right">
        <a class="btn-icon btn btn-post-share" id="show-inline" href="#">
            <i class="fa fa-reply"></i>
        </a>
    </div>
    <?php endif;
}


// Get The First Image From a Post
function unpress_first_post_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	if( preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches ) ){
		$first_img = $matches[1][0];
		return $first_img;
	}
}

/*
	Menu Icons
*/
function unpress_add_menu_icons_styles(){?>
 
<style type="text/css">
#adminmenu .menu-icon-video div.wp-menu-image:before {
content: "\f126";
}
#adminmenu .menu-icon-gallery div.wp-menu-image:before{
	content: "\f161";
}
#adminmenu .menu-icon-interview div.wp-menu-image:before{
	content: "\f464";
}
</style>
 
<?php
}
add_action( 'admin_head', 'unpress_add_menu_icons_styles' );

/* ------ AUTHOR PROFILE ------ */
if ( ! function_exists( 'unpress_author_info' ) ) :
/**
 * Adds user custom fields
 *
 * @since unPress 1.1
 */
function unpress_author_info( $contactmethods ) {
	
	$contactmethods['unpress_author_facebook']		= __( 'Facebook', 'favethemes' );
	$contactmethods['unpress_author_linkedin']		= __( 'LinkedIn', 'favethemes' );
	$contactmethods['unpress_author_twitter']		= __( 'Twitter', 'favethemes' );
	$contactmethods['unpress_author_google_plus']	= __( 'Google Plus', 'favethemes' );
	$contactmethods['unpress_author_youtube']		= __( 'Youtube', 'favethemes' );
	$contactmethods['unpress_author_flickr']		= __( 'Flickr', 'favethemes' );
	$contactmethods['unpress_author_pinterest']		= __( 'Pinterest', 'favethemes' );
	$contactmethods['unpress_author_foursquare']	= __( 'FourSquare', 'favethemes' );
	$contactmethods['unpress_author_instagram']		= __( 'Instagram', 'favethemes' );
	$contactmethods['unpress_author_vimeo']			= __( 'Vimeo', 'favethemes' );
	$contactmethods['unpress_author_tumblr']		= __( 'Tumblr', 'favethemes' );
	$contactmethods['unpress_author_dribbble']		= __( 'Dribbble', 'favethemes' );
		
	return $contactmethods;
}
endif; // add_agent_contact_info
add_filter( 'user_contactmethods', 'unpress_author_info', 10, 1 );

/* --------------------------------------------------------------------------
 * [ unpress_element_key - Generate Unique ID each elemement ]
 ---------------------------------------------------------------------------*/
if ( !function_exists('unpress_element_key') ) {

	function unpress_element_key(){

	    $key = uniqid();
	    return $key;
	}
}

/*-----------------------------------------------------
 * Search filter
 *-----------------------------------------------------*/
/*function unpress_search_filter($query) {
if ( !$query->is_admin && $query->is_search) {
$query->set('post_type', array('post') ); // id of page or post
}
return $query;
}
add_filter( 'pre_get_posts', 'unpress_search_filter' );*/

/************ Plugin recommendations **********/
require_once ('inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'favethemes_register_required_plugins' );
function favethemes_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		array(
			'name'     				=> 'WooCommerce', // The plugin name
			'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/woocommerce.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.2.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WooCommerce Shortcodes', // The plugin name
			'slug'     				=> 'woocommerce-shortcodes', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/woocommerce-shortcodes.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Revolution Slider', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Regenerate Thumbnails', // The plugin name
			'slug'     				=> 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/regenerate-thumbnails.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.2.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'YITH WooCommerce Ajax Search', // The plugin name
			'slug'     				=> 'yith-woocommerce-ajax-search', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/yith-woocommerce-ajax-search.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
			array(
			'name'     				=> 'YITH WooCommerce Wishlist', // The plugin name
			'slug'     				=> 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/yith-woocommerce-wishlist.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'favethemes',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', '' ),
			'menu_title'                       			=> __( 'Install Plugins', 'favethemes' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'favethemes' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'favethemes' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'favethemes' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'favethemes' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'favethemes' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
  return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/custom-functions-by-shamim.php';

/**
 * Meta box class
 */
require get_template_directory() . '/CMB/init.php';


/**
 * Add meta boxes
 */
require get_template_directory() . '/inc/spearr-meta-boxes.php';

if (!function_exists('spearr_init_scripts')) {
	function spearr_init_scripts() {
		wp_register_script('gallery-slider', get_template_directory_uri() . '/js/gallery-slider.js', array('jquery'), '20151611', true);
		wp_register_script('jquery-actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '20151611', true);
	}
	add_action('wp_enqueue_scripts', 'spearr_init_scripts');
}