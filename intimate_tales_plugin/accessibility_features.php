```php
<?php
/**
 * IntimateTales Accessibility Features
 *
 * This file handles the accessibility features of the IntimateTales WordPress plugin.
 *
 * @package IntimateTales
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class IT_Accessibility_Features {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_accessibility_scripts' ) );
		add_filter( 'body_class', array( $this, 'add_accessibility_body_class' ) );
	}

	/**
	 * Enqueue accessibility scripts and styles.
	 */
	public function enqueue_accessibility_scripts() {
		wp_enqueue_script( 'it-accessibility-js', plugins_url( '/js/accessibility.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_style( 'it-accessibility-css', plugins_url( '/css/accessibility.css', __FILE__ ), array(), '1.0.0' );
	}

	/**
	 * Add accessibility class to body.
	 *
	 * @param array $classes Current body classes.
	 * @return array Modified body classes.
	 */
	public function add_accessibility_body_class( $classes ) {
		$classes[] = 'it-accessible';
		return $classes;
	}
}

new IT_Accessibility_Features();
```
