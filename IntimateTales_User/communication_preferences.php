<?php
/**
 * Communication Preferences
 *
 * This file handles the management of user communication preferences.
 *
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Update Communication Preferences
 *
 * @param int $user_id User ID.
 * @param array $preferences User communication preferences.
 * @return bool True on success, false on failure.
 */
function updateCommunicationPreferences( $user_id, $preferences ) {
	// Sanitize and validate input.
	if ( ! is_array( $preferences ) ) {
		_doing_it_wrong( __FUNCTION__, __( 'Preferences must be an array.', 'intimatetales' ), '1.0.0' );
		return false;
	}

	// Update user meta.
	$result = update_user_meta( $user_id, 'communication_preferences', $preferences );

	// Check for errors.
	if ( false === $result ) {
		_doing_it_wrong( __FUNCTION__, __( 'Failed to update communication preferences.', 'intimatetales' ), '1.0.0' );
		return false;
	}

	return true;
}

/**
 * Get Communication Preferences
 *
 * @param int $user_id User ID.
 * @return array|false User communication preferences, or false on failure.
 */
function getCommunicationPreferences( $user_id ) {
	// Get user meta.
	$preferences = get_user_meta( $user_id, 'communication_preferences', true );

	// Check for errors.
	if ( false === $preferences ) {
		_doing_it_wrong( __FUNCTION__, __( 'Failed to get communication preferences.', 'intimatetales' ), '1.0.0' );
		return false;
	}

	return $preferences;
}
