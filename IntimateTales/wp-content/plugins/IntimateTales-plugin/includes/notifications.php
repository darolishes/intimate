```php
<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Function to send notifications to users
 *
 * @param int $user_id User ID
 * @param array $notification_data Notification data
 * @return void
 */
function send_notification( $user_id, $notification_data ) {
    // Validate notification data
    if ( ! is_array( $notification_data ) || empty( $notification_data ) ) {
        return;
    }

    // Get user data
    $user_info = get_userdata( $user_id );

    // Check if user exists
    if ( ! $user_info ) {
        return;
    }

    // Prepare notification content
    $notification_content = sprintf(
        __( 'Hello %s, %s', 'intimatetales' ),
        $user_info->display_name,
        $notification_data['message']
    );

    // Send notification email
    wp_mail(
        $user_info->user_email,
        __( 'Notification from IntimateTales', 'intimatetales' ),
        $notification_content
    );

    // Add notification to user meta for dashboard notifications
    add_user_meta( $user_id, 'intimatetales_notifications', $notification_data );
}

/**
 * Function to get notifications of a user
 *
 * @param int $user_id User ID
 * @return array
 */
function get_user_notifications( $user_id ) {
    // Get notifications from user meta
    $notifications = get_user_meta( $user_id, 'intimatetales_notifications', true );

    return is_array( $notifications ) ? $notifications : array();
}
```
