<?php
/**
 * Romantic Tendencies Settings for IntimateTales User Plugin
 *
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class IT_RomanticTendencies
 */
class IT_RomanticTendencies {

	/**
	 * User ID
	 *
	 * @var int
	 */
	private $user_id;

	/**
	 * IT_RomanticTendencies constructor.
	 *
	 * @param int $user_id User ID.
	 */
	public function __construct( $user_id ) {
		$this->user_id = $user_id;
	}

	/**
	 * Update Romantic Tendencies
	 *
	 * @param array $romantic_tendencies User's romantic tendencies.
	 *
	 * @return bool|WP_Error True on success, WP_Error on failure.
	 */
	public function updateRomanticTendencies( $romantic_tendencies ) {
		if ( ! is_array( $romantic_tendencies ) ) {
			return new WP_Error( 'invalid_argument', __( 'Invalid Argument. Expected an array.', 'intimatetales' ) );
		}

		$result = update_user_meta( $this->user_id, 'it_romantic_tendencies', $romantic_tendencies );

		if ( false === $result ) {
			return new WP_Error( 'update_failure', __( 'Failed to update romantic tendencies.', 'intimatetales' ) );
		}

		return true;
	}

	/**
	 * Get Romantic Tendencies
	 *
	 * @return array|mixed Romantic tendencies.
	 */
	public function getRomanticTendencies() {
		$romantic_tendencies = get_user_meta( $this->user_id, 'it_romantic_tendencies', true );

		if ( ! $romantic_tendencies ) {
			$romantic_tendencies = array();
		}

		return $romantic_tendencies;
	}
}