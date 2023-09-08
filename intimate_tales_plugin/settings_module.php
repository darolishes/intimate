```php
<?php
/**
 * IntimateTales Settings Module
 *
 * This module integrates with the IntimateTales Settings Plugin for configuration management.
 * Settings are implemented as ACF JSON files for flexibility.
 * Settings can be easily customized through the WordPress admin interface.
 *
 * @package IntimateTales
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'IntimateTales_Settings_Module' ) ) :

class IntimateTales_Settings_Module {

	/**
	 * The single instance of the class.
	 *
	 * @var IntimateTales_Settings_Module
	 */
	protected static $_instance = null;

	/**
	 * Main IntimateTales_Settings_Module Instance.
	 *
	 * Ensures only one instance of IntimateTales_Settings_Module is loaded or can be loaded.
	 *
	 * @return IntimateTales_Settings_Module - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * IntimateTales_Settings_Module Constructor.
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Hook into actions and filters.
	 */
	private function init_hooks() {
		add_action( 'acf/init', array( $this, 'register_settings' ) );
	}

	/**
	 * Register the settings page using ACF.
	 */
	public function register_settings() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( array(
				'page_title' => 'IntimateTales Settings',
				'menu_title' => 'IntimateTales Settings',
				'menu_slug'  => 'intimate-tales-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			) );
		}
	}
}

endif;

/**
 * Main instance of IntimateTales_Settings_Module.
 *
 * Returns the main instance of IntimateTales_Settings_Module to prevent the need to use globals.
 *
 * @return IntimateTales_Settings_Module
 */
function intimate_tales_settings_module() {
	return IntimateTales_Settings_Module::instance();
}

// Global for backwards compatibility.
$GLOBALS['intimate_tales_settings_module'] = intimate_tales_settings_module();
```
