<?php
/**
 * Interests Configuration for IntimateTales User Plugin
 *
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class IT_User_Interests_Configuration {

	private $user_id;

	public function __construct( $user_id ) {
		$this->user_id = $user_id;
	}

	public function get_user_interests() {
		$interests = get_user_meta( $this->user_id, 'it_user_interests', true );
		return $interests ? $interests : array();
	}

	public function update_user_interests( $interests ) {
		update_user_meta( $this->user_id, 'it_user_interests', $interests );
	}

	public function fetch_interests_options() {
		// Assuming ACF Integration Plugin provides a function to fetch dynamic options
		$acf_plugin = new ACF_Integration_Plugin();
		$options = $acf_plugin->get_dynamic_options( 'interests' );
		return $options;
	}

	public function display_interests_form() {
		$interests = $this->get_user_interests();
		$options = $this->fetch_interests_options();

		echo '<form id="interestsForm">';
		foreach ( $options as $option ) {
			$checked = in_array( $option, $interests ) ? 'checked' : '';
			echo "<input type='checkbox' name='interests[]' value='{$option}' {$checked}> {$option}<br>";
		}
		echo '<input type="submit" value="Update Interests">';
		echo '</form>';
	}
}

// Usage
$user_interests = new IT_User_Interests_Configuration( get_current_user_id() );
$user_interests->display_interests_form();
?>