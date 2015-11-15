<?php
/* Interview Custom Post Type */
/* Register Custom Taxonomies */

//// FUNCTION TO CREATE IT
function unpress_interview_register() {  

	global $nt_option;
	
	//// LABELS
	$labels = array(
		'name' => __('Interviews', 'favethemes'),
			'singular_name' => __('Interview', 'favethemes'),
			'add_new' => __('Add New', 'favethemes'),
			'add_new_item' => __('Add New Interview', 'favethemes'),
			'edit_item' => __('Edit Interview', 'favethemes'),
			'new_item' => __('New Interview', 'favethemes'),
			'all_items' => __('All Interviews', 'favethemes'),
			'view_item' =>__('View Interview', 'favethemes'),
			'search_items' => __('Search Interviews', 'favethemes'),
			'not_found' =>  __('No Interviews Found', 'favethemes'),
			'not_found_in_trash' => __('No Interviews found in trash.', 'favethemes'),
			'parent_item_colon' => '',
			'menu_name' => 'Interviews'
	);
	
    //// ARGUMENTS
		$args = array(
		
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => false, 
			'hierarchical' => false,
			'menu_position' => 8,
			'menu_icon' => '',
			'supports' => array('title', 'editor', 'thumbnail','comments','revisions','author')
		  
		);  
  
    	//// REGISTERS IT
		register_post_type('interview', $args);
}  
// Adds Custom Post Type*/
add_action('init', 'unpress_interview_register'); 

// Taxonomy Tags
function unpress_interview_tags(){
	register_taxonomy(  
	'interview-tags', 'interview',  
	array(  
		'hierarchical' => true,  
		'labels' => array(
			'name' => __( 'Interview Tags', 'favethemes' ),
			'singular_name' => __( 'Tag', 'favethemes' ),
			'search_items' => __( 'Search Tags', 'favethemes' ),
			'popular_items' => __( 'Popular Tags', 'favethemes' ),
			'all_items' => __( 'All Tags', 'favethemes' ),
			'edit_item' => __( 'Edit Tag', 'favethemes' ),
			'update_item' => __( 'Update Tag', 'favethemes' ),
			'add_new_item' => __( 'Add New Tag', 'favethemes' ),
			'new_item_name' => __( 'New Tag Name', 'favethemes' ),
			'separate_items_with_commas' => __( 'Separate Tags With Commas', 'favethemes' ),
			'add_or_remove_items' => __( 'Add or Remove Tag', 'favethemes' ),
			'choose_from_most_used' => __( 'Choose From Most Used Tags', 'favethemes' ),  
			'parent' => __( 'Parent Tag', 'favethemes' )      	
			),
		'query_var' => true,  
		'rewrite' => true  
		)  
	);
}
add_action( 'init', 'unpress_interview_tags' );


function unpress_interviewtags() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'interview-tags', '', ', ', '' ) );
	echo $terms_as_text;
}



// start Interview columns

// Change the columns for the edit CPT screen
function unpress_interview_change_columns( $cols ) {
	$cols = array(
			"cb" => '<input type="checkbox" />',
			"title" => __( "Interview Title", "favethemes" ),
			"interview_image" => __( "Picture", "favethemes" ),
			"interview_description" => __( "Description", "favethemes" ),
			"date" => __( "Last Updated", "favethemes" ),
		);
	return $cols;
}
add_filter( "manage_interview_posts_columns", "unpress_interview_change_columns" );

function unpress_interview_custom_columns( $column, $post_id ) {
	global $ft_option;
	
	switch ( $column ) {
		case "interview_image":
			the_post_thumbnail(array( 150,150));
		break;
		case "interview_description":
			the_excerpt();
		break;
		
	}
}
add_action( "manage_posts_custom_column", "unpress_interview_custom_columns", 10, 2 );

// end Interview columns
?>