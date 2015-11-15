<?php
/* Gallery Custom Post Type */
/* Register Custom Taxonomies */

//// FUNCTION TO CREATE IT
function unpress_gallery_register() {  

	global $nt_option;
	
	//// LABELS
	$labels = array(
		'name' => __('Galleries', 'favethemes'),
			'singular_name' => __('Gallery', 'favethemes'),
			'add_new' => __('Add New', 'favethemes'),
			'add_new_item' => __('Add New Gallery', 'favethemes'),
			'edit_item' => __('Edit Gallery', 'favethemes'),
			'new_item' => __('New Gallery', 'favethemes'),
			'all_items' => __('All Galleries', 'favethemes'),
			'view_item' =>__('View Gallery', 'favethemes'),
			'search_items' => __('Search Galleries', 'favethemes'),
			'not_found' =>  __('No Galleries Found', 'favethemes'),
			'not_found_in_trash' => __('No Galleries found in trash.', 'favethemes'),
			'parent_item_colon' => '',
			'menu_name' => 'Galleries'
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
			'has_archive' => true, 
			'hierarchical' => false,
			'menu_position' => 7,
			'menu_icon' => '',
			'supports' => array('title', 'editor', 'thumbnail','comments','revisions','author')
		  
		);  
  
    	//// REGISTERS IT
		register_post_type('gallery', $args);
}  
// Adds Custom Post Type*/
add_action('init', 'unpress_gallery_register'); 

// Taxonomy Categories
function unpress_gallery_categories(){
	register_taxonomy(  
	'gallery-categories', 'gallery',  
	array(  
		'hierarchical' => true,  
		'labels' => array(
			'name' => __( 'Gallery Categories', 'favethemes' ),
			'singular_name' => __( 'Category', 'favethemes' ),
			'search_items' => __( 'Search Categories', 'favethemes' ),
			'popular_items' => __( 'Popular Categories', 'favethemes' ),
			'all_items' => __( 'All Categories', 'favethemes' ),
			'edit_item' => __( 'Edit Category', 'favethemes' ),
			'update_item' => __( 'Update Category', 'favethemes' ),
			'add_new_item' => __( 'Add New Category', 'favethemes' ),
			'new_item_name' => __( 'New Category Name', 'favethemes' ),
			'separate_items_with_commas' => __( 'Separate Categories With Commas', 'favethemes' ),
			'add_or_remove_items' => __( 'Add or Remove Category', 'favethemes' ),
			'choose_from_most_used' => __( 'Choose From Most Used Categories', 'favethemes' ),  
			'parent' => __( 'Parent Category', 'favethemes' )      	
			),
		'query_var' => true,  
		'rewrite' => true  
		)  
	);
}
add_action( 'init', 'unpress_gallery_categories' );

function unpress_gallerycategory() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'gallery-categories', '', ', ', '' ) );
	echo $terms_as_text;
}
// Taxonomy Tags
function unpress_gallery_tags(){
	register_taxonomy(  
	'gallery-tags', 'gallery',  
	array(  
		'hierarchical' => false,  
		'labels' => array(
			'name' => __( 'Gallery Tags', 'favethemes' ),
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
add_action( 'init', 'unpress_gallery_tags' );

function unpress_gallerytags() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'gallery-tags', '', ', ', '' ) );
	echo $terms_as_text;
}



// start Gallery columns

// Change the columns for the edit CPT screen
function unpress_gallery_change_columns( $cols ) {
	$cols = array(
			"cb" => '<input type="checkbox" />',
			"title" => __( "Gallery Title", "favethemes" ),
			"gallery_category" => __( "Category", "favethemes" ),
			"gallery_image" => __( "Picture", "favethemes" ),
			"date" => __( "Last Updated", "favethemes" ),
		);
	return $cols;
}
add_filter( "manage_gallery_posts_columns", "unpress_gallery_change_columns" );

function unpress_gallery_custom_columns( $column, $post_id ) {
	global $ft_option;
	
	switch ( $column ) {
		case "gallery_category":
			$gallery_category = wp_get_post_terms($post_id, 'gallery-categories', array("fields" => "all"));
			$array_category = array();
			foreach($gallery_category as $cat):
				$term_link = get_term_link( $cat, 'gallery-categories' );
				$array_category[] = '<a href="'.$term_link.'">'.$cat->name.'</a>';
			endforeach;
			$res_category = implode(", ",$array_category);
			echo $res_category;
		break;
		case "gallery_image":
			the_post_thumbnail(array( 150,150));
		break;
		
	}
}
add_action( "manage_posts_custom_column", "unpress_gallery_custom_columns", 10, 2 );

// end Gallery columns



/*===========================================
  Filters  
==============================================*/

// Categories
function unpress_restrict_gallery_by_category() {
	global $typenow;
	$post_type = 'gallery'; 
	$taxonomy = 'gallery-categories'; 
	if ($typenow == $post_type) {
		$selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("All Categories", 'favethemes'),
			'taxonomy' => $taxonomy,
			'name' => $taxonomy,
			'orderby' => 'name',
			'selected' => $selected,
			'show_count' => true,
			'hide_empty' => true,
		));
	};
}
add_action('restrict_manage_posts', 'unpress_restrict_gallery_by_category');

function unpress_convert_gallery_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'gallery'; 
	$taxonomy = 'gallery-categories'; 
	$q_vars = &$query->query_vars;
	if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
add_filter('parse_query', 'unpress_convert_gallery_id_to_term_in_query');
?>