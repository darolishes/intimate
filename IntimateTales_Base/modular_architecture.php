```php
<?php
/**
 * IntimateTales_Base - Modular Architecture
 *
 * This file handles the modular architecture of the IntimateTales Base plugin.
 *
 * @package IntimateTales_Base
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'IntimateTales_Base_Modular_Architecture' ) ) :

class IntimateTales_Base_Modular_Architecture {

	/**
	 * Holds the singleton instance of this class
	 * @var IntimateTales_Base_Modular_Architecture
	 */
	private static $instance;

	/**
	 * Returns the singleton instance of this class.
	 * @return IntimateTales_Base_Modular_Architecture
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof IntimateTales_Base_Modular_Architecture ) ) {
			self::$instance = new IntimateTales_Base_Modular_Architecture();
			self::$instance->initialize();
		}
		return self::$instance;
	}

	/**
	 * Initializes the plugin by setting up the core functions and loading all necessary dependencies.
	 */
	private function initialize() {
		// Load the core framework
		require_once plugin_dir_path( __FILE__ ) . 'core_framework.php';

		// Load the integration points
		require_once plugin_dir_path( __FILE__ ) . 'integration_points.php';

		// Load the settings management
		require_once plugin_dir_path( __FILE__ ) . 'settings_management.php';

		// Load the ACF integration
		require_once plugin_dir_path( __FILE__ ) . 'acf_integration.php';

		// Load the WordPress integration
		require_once plugin_dir_path( __FILE__ ) . 'wordpress_integration.php';

		// Load the API hooks
		require_once plugin_dir_path( __FILE__ ) . 'api_hooks.php';
	}
}

endif;

// Initialize the class
IntimateTales_Base_Modular_Architecture::instance();
```