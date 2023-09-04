<?php
/**
 * Relationship Status Module for IntimateTales User Plugin
 * 
 * This module allows users to choose and display their current relationship status.
 * 
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class IT_User_Relationship_Status {

	private $user_id;

	public function __construct( $user_id ) {
		$this->user_id = $user_id;
	}

	/**
	 * Get the current user's relationship status.
	 *
	 * @return string The user's relationship status.
	 */
	public function get_relationship_status() {
		return get_user_meta( $this->user_id, 'relationship_status', true );
	}

	/**
	 * Update the user's relationship status.
	 *
	 * @param string $new_status The new relationship status.
	 * @return bool True on success, false on failure.
	 */
	public function update_relationship_status( $new_status ) {
		return update_user_meta( $this->user_id, 'relationship_status', $new_status );
	}

	/**
	 * Display the relationship status update form.
	 */
	public function display_form() {
		$current_status = $this->get_relationship_status();
		?>
		<form id="relationshipStatus" method="post">
			<label for="relationship_status">Relationship Status:</label>
			<select name="relationship_status" id="relationship_status">
				<option value="single" <?php selected( $current_status, 'single' ); ?>>Single</option>
				<option value="in_a_relationship" <?php selected( $current_status, 'in_a_relationship' ); ?>>In a Relationship</option>
				<option value="married" <?php selected( $current_status, 'married' ); ?>>Married</option>
				<option value="divorced" <?php selected( $current_status, 'divorced' ); ?>>Divorced</option>
				<option value="widowed" <?php selected( $current_status, 'widowed' ); ?>>Widowed</option>
			</select>
			<input type="submit" value="Update">
		</form>
		<?php
	}
}

// Instantiate the class for the current user.
$current_user_id = get_current_user_id();
$it_user_relationship_status = new IT_User_Relationship_Status( $current_user_id );

// Display the form.
$it_user_relationship_status->display_form();

// If form is submitted, update the relationship status.
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['relationship_status'] ) ) {
	$new_status = sanitize_text_field( $_POST['relationship_status'] );
	$it_user_relationship_status->update_relationship_status( $new_status );
}
?>