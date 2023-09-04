<?php
/**
 * ACF Integration Plugin
 *
 * This file is responsible for integrating the Advanced Custom Fields (ACF) plugin
 * to fetch dynamic options for user preferences.
 *
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACF_Integration_Plugin {

	/**
	 * Fetches the dynamic options for user preferences.
	 *
	 * @param string $field_key The key of the field.
	 * @return array The options for the field.
	 */
	public function fetch_dynamic_options( $field_key ) {
		$field = get_field_object( $field_key );

		if ( $field ) {
			return $field['choices'];
		}

		return array();
	}

	/**
	 * Fetches the dynamic options for interests configuration.
	 *
	 * @return array The options for interests configuration.
	 */
	public function fetch_interests_configuration() {
		return $this->fetch_dynamic_options( 'interests_configuration' );
	}

	/**
	 * Fetches the dynamic options for roleplay preferences.
	 *
	 * @return array The options for roleplay preferences.
	 */
	public function fetch_roleplay_preferences() {
		return $this->fetch_dynamic_options( 'roleplay_preferences' );
	}
}

$acf_integration_plugin = new ACF_Integration_Plugin();