```php
<?php
/**
 * IntimateTales_Base/integration_points.php
 *
 * This file provides the API endpoints and integration hooks for the IntimateTales Base plugin.
 *
 * @package IntimateTales_Base
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialize the integration points for the plugin.
 */
function intimate_tales_base_initialize_integration_points() {
	// Register the API endpoints.
	add_action( 'rest_api_init', 'intimate_tales_base_register_api_endpoints' );

	// Register the integration hooks.
	add_action( 'plugins_loaded', 'intimate_tales_base_register_integration_hooks' );
}

/**
 * Register the API endpoints for the plugin.
 */
function intimate_tales_base_register_api_endpoints() {
	// Register the settings endpoint.
	register_rest_route( 'intimate-tales-base/v1', '/settings', array(
		'methods'  => 'GET',
		'callback' => 'intimate_tales_base_get_settings',
	) );

	// Register the ACF fields endpoint.
	register_rest_route( 'intimate-tales-base/v1', '/acf-fields', array(
		'methods'  => 'GET',
		'callback' => 'intimate_tales_base_get_acf_fields',
	) );
}

/**
 * Register the integration hooks for the plugin.
 */
function intimate_tales_base_register_integration_hooks() {
	// Register the settings updated hook.
	add_action( 'intimate_tales_base_settings_updated', 'intimate_tales_base_on_settings_updated' );

	// Register the ACF field added hook.
	add_action( 'intimate_tales_base_acf_field_added', 'intimate_tales_base_on_acf_field_added' );
}

// Initialize the integration points.
intimate_tales_base_initialize_integration_points();
```