```php
<?php
/**
 * IntimateTales_Base ACF Integration
 *
 * This file handles the integration of Advanced Custom Fields (ACF) into the IntimateTales Base plugin.
 *
 * @package IntimateTales_Base
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialize ACF integration.
 */
function intimate_tales_base_acf_init() {
	// Check if ACF is active.
	if ( ! class_exists( 'ACF' ) ) {
		return;
	}

	// Define ACF fields.
	intimate_tales_base_define_acf_fields();
}

add_action( 'init', 'intimate_tales_base_acf_init' );

/**
 * Define ACF fields.
 */
function intimate_tales_base_define_acf_fields() {
	// Define fields here.
	// Use the ACF functions like acf_add_local_field_group() and acf_add_local_field().
}

/**
 * Get ACF field value.
 *
 * @param string $field_name The name of the field.
 * @param int    $post_id    The ID of the post.
 *
 * @return mixed The value of the field.
 */
function intimate_tales_base_get_acf_field( $field_name, $post_id ) {
	// Check if ACF is active.
	if ( ! class_exists( 'ACF' ) ) {
		return null;
	}

	// Get field value.
	return get_field( $field_name, $post_id );
}

/**
 * Update ACF field value.
 *
 * @param string $field_name The name of the field.
 * @param mixed  $value      The value to set.
 * @param int    $post_id    The ID of the post.
 *
 * @return bool True on success, false on failure.
 */
function intimate_tales_base_update_acf_field( $field_name, $value, $post_id ) {
	// Check if ACF is active.
	if ( ! class_exists( 'ACF' ) ) {
		return false;
	}

	// Update field value.
	return update_field( $field_name, $value, $post_id );
}
```
