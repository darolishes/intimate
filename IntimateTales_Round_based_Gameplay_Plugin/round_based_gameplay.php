```php
<?php
/**
 * IntimateTales Round-based Gameplay Plugin
 *
 * @package IntimateTales
 * @subpackage Round_based_Gameplay
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class IntimateTales_Round_Based_Gameplay
 */
class IntimateTales_Round_Based_Gameplay {

	/**
	 * The single instance of the class.
	 *
	 * @var IntimateTales_Round_Based_Gameplay
	 */
	protected static $_instance = null;

	/**
	 * Main IntimateTales_Round_Based_Gameplay Instance.
	 *
	 * Ensures only one instance of IntimateTales_Round_Based_Gameplay is loaded or can be loaded.
	 *
	 * @return IntimateTales_Round_Based_Gameplay - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * IntimateTales_Round_Based_Gameplay Constructor.
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
	 * Initialize round based gameplay.
	 */
	public function init() {
		// Initialize gameplay data
		$this->gameplay_data = get_option( 'intimatetales_gameplay_data' );

		// Register API endpoints
		add_action( 'rest_api_init', array( $this, 'register_api_endpoints' ) );
	}

	/**
	 * Register API endpoints for round based gameplay.
	 */
	public function register_api_endpoints() {
		register_rest_route( 'intimatetales/v1', '/gameplay/start', array(
			'methods'  => 'POST',
			'callback' => array( $this, 'start_gameplay' ),
		) );

		register_rest_route( 'intimatetales/v1', '/gameplay/end', array(
			'methods'  => 'POST',
			'callback' => array( $this, 'end_gameplay' ),
		) );
	}

	/**
	 * Start gameplay.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_REST_Response
	 */
	public function start_gameplay( $request ) {
		// Start gameplay logic here

		return new WP_REST_Response( 'Gameplay started.', 200 );
	}

	/**
	 * End gameplay.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_REST_Response
	 */
	public function end_gameplay( $request ) {
		// End gameplay logic here

		return new WP_REST_Response( 'Gameplay ended.', 200 );
	}
}

/**
 * Main instance of IntimateTales_Round_Based_Gameplay.
 *
 * Returns the main instance of IntimateTales_Round_Based_Gameplay to prevent the need to use globals.
 *
 * @return IntimateTales_Round_Based_Gameplay
 */
function INTIMATETALES_GAMEPLAY() {
	return IntimateTales_Round_Based_Gameplay::instance();
}

// Global for backwards compatibility.
$GLOBALS['intimatetales_gameplay'] = INTIMATETALES_GAMEPLAY();
```