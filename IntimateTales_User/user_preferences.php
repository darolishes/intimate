<?php
/**
 * User Preferences Module for IntimateTales User Plugin
 * 
 * This module handles the user preferences settings.
 * 
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class IT_User_Preferences {

	private $user_id;

	public function __construct($user_id) {
		$this->user_id = $user_id;
	}

	public function get_user_preferences() {
		$display_name = get_user_meta($this->user_id, 'display_name', true);
		$profile_picture = get_user_meta($this->user_id, 'profile_picture', true);

		return array(
			'display_name' => $display_name,
			'profile_picture' => $profile_picture
		);
	}

	public function update_user_preferences($display_name, $profile_picture) {
		update_user_meta($this->user_id, 'display_name', $display_name);
		update_user_meta($this->user_id, 'profile_picture', $profile_picture);

		return array(
			'message' => 'updateSuccess',
			'data' => $this->get_user_preferences()
		);
	}
}

// Usage
$user_preferences = new IT_User_Preferences($user_id);
$user_preferences_data = $user_preferences->get_user_preferences();
$user_preferences->update_user_preferences($new_display_name, $new_profile_picture);
