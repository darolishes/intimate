```php
<?php
/**
 * JSON Configuration Files
 *
 * This file is used to manage the JSON configuration files for advanced field settings.
 *
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to get JSON configuration for a specific field.
 *
 * @param string $field_name The name of the field.
 * @return array The configuration for the field.
 */
function get_json_configuration( $field_name ) {
	// Path to the JSON configuration files.
	$dir = plugin_dir_path( __FILE__ ) . 'json-configurations/';

	// Full path to the JSON file.
	$file = $dir . $field_name . '.json';

	// Check if the file exists.
	if ( ! file_exists( $file ) ) {
		return array();
	}

	// Get the file contents.
	$json = file_get_contents( $file );

	// Decode the JSON into an array.
	$config = json_decode( $json, true );

	return $config;
}
```