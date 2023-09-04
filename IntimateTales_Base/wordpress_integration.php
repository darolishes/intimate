```php
<?php
/**
 * IntimateTales WordPress Integration
 *
 * This file handles the integration of the IntimateTales Base with WordPress.
 *
 * @package IntimateTales_Base
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'IntimateTales_WordPress_Integration' ) ) :

class IntimateTales_WordPress_Integration {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->initialize();
	}

	/**
	 * Initialize WordPress integration
	 */
	public function initialize() {
		add_action( 'init', array( $this, 'register_hooks' ) );
	}

	/**
	 * Register WordPress hooks
	 */
	public function register_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts and styles
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'intimate-tales-base', plugins_url( 'intimate-tales-base/css/style.css' ), array(), '1.0.0', 'all' );
		wp_enqueue_script( 'intimate-tales-base', plugins_url( 'intimate-tales-base/js/script.js' ), array( 'jquery' ), '1.0.0', true );
	}

	/**
	 * Enqueue admin scripts and styles
	 */
	public function admin_enqueue_scripts() {
		wp_enqueue_style( 'intimate-tales-base-admin', plugins_url( 'intimate-tales-base/css/admin-style.css' ), array(), '1.0.0', 'all' );
		wp_enqueue_script( 'intimate-tales-base-admin', plugins_url( 'intimate-tales-base/js/admin-script.js' ), array( 'jquery' ), '1.0.0', true );
	}
}

endif;

// Initialize the class
new IntimateTales_WordPress_Integration();
```