```php
<?php
/**
 * IntimateTales User Plugin: Account Security
 * 
 * This file handles the account security settings for the user.
 * 
 * @package IntimateTales_User_Plugin
 * @subpackage Account_Security
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Update user password.
 *
 * @param int $user_id User ID.
 * @param string $new_password New password.
 * @return bool True on success, false on failure.
 */
function updateUserPassword( $user_id, $new_password ) {
	$user_data = array(
		'ID'        => $user_id,
		'user_pass' => $new_password,
	);

	$user_id = wp_update_user( $user_data );

	if ( is_wp_error( $user_id ) ) {
		// There was an error; possibly this user doesn't exist.
		return false;
	} else {
		return true;
	}
}

/**
 * Enable two-factor authentication for the user.
 *
 * @param int $user_id User ID.
 * @return bool True on success, false on failure.
 */
function enableTwoFactorAuthentication( $user_id ) {
	// This is a placeholder function. The actual implementation will depend on the two-factor authentication method used.
	// For example, you might integrate with a service like Google Authenticator or Authy here.
	return true;
}

/**
 * Disable two-factor authentication for the user.
 *
 * @param int $user_id User ID.
 * @return bool True on success, false on failure.
 */
function disableTwoFactorAuthentication( $user_id ) {
	// This is a placeholder function. The actual implementation will depend on the two-factor authentication method used.
	// For example, you might integrate with a service like Google Authenticator or Authy here.
	return true;
}
```