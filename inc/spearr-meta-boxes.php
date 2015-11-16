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

}
