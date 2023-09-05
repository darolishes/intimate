<?php
/**
 * Integration.php
 *
 * Handles the integration of the IntimateTales Roleplay module with the IntimateTales Core Plugin and other plugins.
 *
 * @package IntimateTales_Roleplay
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Integration {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Initialize the integration
	 */
	public function init() {
		$this->load_dependencies();
		$this->sync_data();
	}

	/**
	 * Load the necessary dependencies for this plugin.
	 */
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/acf-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'src/Storyline.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'src/Character.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'src/Interaction.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'src/Progress.php';
	}

	/**
	 * Sync data with IntimateTales Core and plugins
	 */
	private function sync_data() {
		// Sync data code goes here
	}
}

new Integration();