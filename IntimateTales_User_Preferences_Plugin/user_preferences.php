```php
<?php
/**
 * IntimateTales User Preferences Plugin
 *
 * @package IntimateTales_User_Preferences_Plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main User Preferences Class.
 *
 * @class IntimateTales_User_Preferences
 */
final class IntimateTales_User_Preferences {

	/**
	 * The single instance of the class.
	 *
	 * @var IntimateTales_User_Preferences
	 */
	protected static $_instance = null;

	/**
	 * Main IntimateTales_User_Preferences Instance.
	 *
	 * Ensures only one instance of IntimateTales_User_Preferences is loaded or can be loaded.
	 *
	 * @static
	 * @return IntimateTales_User_Preferences - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * IntimateTales_User_Preferences Constructor.
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Hook into actions and filters.
	 */
	private function init_hooks() {
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'init', array( $this, 'init_user_preferences' ) );
	}

	/**
	 * Load the plugin textdomain for translation.
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'intimatetales-user-preferences', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Initialize user preferences.
	 */
	public function init_user_preferences() {
		// Code to initialize user preferences goes here.
	}
}

/**
 * Returns the main instance of IntimateTales_User_Preferences to prevent the need to use globals.
 *
 * @return IntimateTales_User_Preferences
 */
function ITUP() {
	return IntimateTales_User_Preferences::instance();
}

// Global for backwards compatibility.
$GLOBALS['intimatetales-user-preferences'] = ITUP();
```