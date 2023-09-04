```php
<?php
/**
 * IntimateTales Story Filtering Plugin
 *
 * @package IntimateTales
 * @subpackage Story_Filtering
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class IntimateTales_Story_Filtering
 */
class IntimateTales_Story_Filtering {

	/**
	 * The single instance of the class.
	 *
	 * @var IntimateTales_Story_Filtering
	 */
	protected static $_instance = null;

	/**
	 * Main IntimateTales_Story_Filtering Instance.
	 *
	 * Ensures only one instance of IntimateTales_Story_Filtering is loaded or can be loaded.
	 *
	 * @return IntimateTales_Story_Filtering - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * IntimateTales_Story_Filtering Constructor.
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Hook into actions and filters.
	 */
	private function init_hooks() {
		add_action( 'init', array( $this, 'init' ), 0 );
	}

	/**
	 * Init IntimateTales_Story_Filtering when WordPress Initialises.
	 */
	public function init() {
		// Set up localisation.
		$this->load_plugin_textdomain();

		// Load class instances.
		$this->story_filtering = new IntimateTales_Story_Filtering_Functions();
	}

	/**
	 * Load Localisation files.
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'intimatetales-story-filtering', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}
}

/**
 * Main instance of IntimateTales_Story_Filtering.
 *
 * Returns the main instance of IntimateTales_Story_Filtering to prevent the need to use globals.
 *
 * @return IntimateTales_Story_Filtering
 */
function IntimateTales_Story_Filtering() {
	return IntimateTales_Story_Filtering::instance();
}

// Global for backwards compatibility.
$GLOBALS['intimatetales-story-filtering'] = IntimateTales_Story_Filtering();
```
