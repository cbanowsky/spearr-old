<?php

$GLOBALS['meta_prefix'] = '_spearr_';
$GLOBALS['locale'] = 'hack.cd';

// metabox for page layout and sidebar
add_action( 'cmb2_init', 'yourprefix_register_sidebar_metabox' );

function yourprefix_register_sidebar_metabox() {

	global $meta_prefix, $locale;

	$cmb_demo = new_cmb2_box( array(
		'id'           => $meta_prefix . 'cover_story_meta_box',
		'title'        => __( 'Cover Stroy', $locale ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
		'cmb_styles'   => true
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Cover story for this post', $locale ),
		'desc'    => __( 'You can use html, shortcodes here', $locale ),
		'id'      => $meta_prefix . 'cover_story',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 10 ),
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Enable permalink', $locale ),
		'desc'    => __( 'You can enable and disable permalink', $locale ),
		'id'      => $meta_prefix . 'enable_permalink',
		'type'    => 'checkbox'
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Permalink button text', $locale ),
		'desc'    => __( 'You have to enable permalink to show this text on the permalink button', $locale ),
		'id'      => $meta_prefix . 'permalink_button_text',
		'type'    => 'text'
	) );

}


add_action( 'cmb2_init', 'yourprefix_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function yourprefix_register_repeatable_group_field_metabox() {

	// Start with an underscore to hide fields from custom fields list
	global $meta_prefix, $locale;

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $meta_prefix . 'gallery_images_meta_box',
		'title'        => __( 'Gallery Images', $locale ),
		'object_types' => array( 'post' ),
	) );

	// $group_field_id is the field id string, so in this case: $meta_prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $meta_prefix . 'galleries',
		'type'        => 'group',
		'description' => __( 'Add unlimited gallery images for this post', $locale ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', $locale ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', $locale ),
			'remove_button' => __( 'Remove Entry', $locale ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Entry Description', $locale ),
		'description' => __( 'Write a short description for this entry', $locale ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Entry Image', $locale ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image Credit', $locale ),
		'id'   => 'image_credit',
		'type' => 'text',
	) );

}