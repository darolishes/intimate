```php
<?php
// Register Custom Post Type Story
function create_story_cpt() {

	$labels = array(
		'name' => _x( 'Stories', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Story', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Stories', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Story', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Story Archives', 'textdomain' ),
		'attributes' => __( 'Story Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Story:', 'textdomain' ),
		'all_items' => __( 'All Stories', 'textdomain' ),
		'add_new_item' => __( 'Add New Story', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Story', 'textdomain' ),
		'edit_item' => __( 'Edit Story', 'textdomain' ),
		'update_item' => __( 'Update Story', 'textdomain' ),
		'view_item' => __( 'View Story', 'textdomain' ),
		'view_items' => __( 'View Stories', 'textdomain' ),
		'search_items' => __( 'Search Story', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Story', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Story', 'textdomain' ),
		'items_list' => __( 'Stories list', 'textdomain' ),
		'items_list_navigation' => __( 'Stories list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Stories list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Story', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'author'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'story', $args );

}
add_action( 'init', 'create_story_cpt', 0 );
```