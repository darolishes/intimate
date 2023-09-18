```php
<?php
/**
 * IntimateTales Core Framework
 *
 * This file serves as the foundation for all other modules of the IntimateTales WordPress plugin.
 *
 * @package IntimateTales
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'IntimateTales_Core_Framework' ) ) :

class IntimateTales_Core_Framework {

	/**
	 * The single instance of the class.
	 *
	 * @var IntimateTales_Core_Framework
	 */
	protected static $_instance = null;

	/**
	 * Main IntimateTales_Core_Framework Instance.
	 *
	 * Ensures only one instance of IntimateTales_Core_Framework is loaded or can be loaded.
	 *
	 * @return IntimateTales_Core_Framework - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * IntimateTales_Core_Framework Constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
	}

	/**
	 * Define IntimateTales Constants.
	 */
	private function define_constants() {
		$this->define( 'INTIMATETALES_PLUGIN_FILE', __FILE__ );
		$this->define( 'INTIMATETALES_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'INTIMATETALES_VERSION', '1.0.0' );
		$this->define( 'INTIMATETALES_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
		$this->define( 'INTIMATETALES_PLUGIN_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ) );
	}

	/**
	 * Include required core files.
	 */
	public function includes() {
		include_once INTIMATETALES_PLUGIN_PATH . '/settings_module.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/acf_integration_module.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/user_plugin.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/couples_interaction_module.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/role_playing_module.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/seo_optimization.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/accessibility_features.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/scalability_design.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/monetization_options.php';
		include_once INTIMATETALES_PLUGIN_PATH . '/user_feedback_mechanism.php';
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string $name
	 * @param string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
}

endif;

/**
 * Returns the main instance of IntimateTales_Core_Framework to prevent the need to use globals.
 *
 * @return IntimateTales_Core_Framework
 */
function IntimateTales() {
	return IntimateTales_Core_Framework::instance();
}

// Global for backwards compatibility.
$GLOBALS['intimatetales'] = IntimateTales();
```
