```php
<?php
/**
 * IntimateTales SEO Optimization Module
 *
 * This module handles the SEO optimization for the IntimateTales WordPress plugin.
 *
 * @package IntimateTales
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class IT_SEO_Optimization {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'add_meta_tags' ) );
	}

	/**
	 * Add meta tags for SEO.
	 */
	public function add_meta_tags() {
		echo '<meta name="description" content="' . esc_attr( get_bloginfo( 'description' ) ) . '">';
		echo '<meta name="keywords" content="IntimateTales, Role-Playing, Couples, Interactive, Stories">';
		echo '<meta name="robots" content="index, follow">';
	}

	/**
	 * Add SEO-friendly URLs.
	 */
	public function add_seo_friendly_urls() {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
	}

	/**
	 * Add sitemap for SEO.
	 */
	public function add_sitemap() {
		// Sitemap generation logic goes here.
	}

	/**
	 * Add schema markup for SEO.
	 */
	public function add_schema_markup() {
		// Schema markup generation logic goes here.
	}

}

new IT_SEO_Optimization();
```