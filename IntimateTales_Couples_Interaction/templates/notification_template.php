```php
<?php
/**
 * Notification Template for IntimateTales Couples Interaction Plugin
 * 
 * This template is used to generate notifications for the users.
 * 
 * @package IntimateTales_Couples_Interaction_Plugin
 */

function intimateTales_generate_notification($user_id, $message_name, $data) {
    // Get the user information
    $user_info = get_userdata($user_id);

    // Define the notification message
    $notification_message = "";

    // Switch case for different message names
    switch($message_name) {
        case 'invitation':
            $notification_message = "Hello, {$user_info->display_name}. You have been invited to join a story on IntimateTales.";
            break;
        case 'decision':
            $notification_message = "Hello, {$user_info->display_name}. Your partner has made a decision in the story. Please check it out.";
            break;
        case 'activity':
            $notification_message = "Hello, {$user_info->display_name}. Your partner has started a new activity. Join them now.";
            break;
        default:
            $notification_message = "Hello, {$user_info->display_name}. You have a new notification.";
            break;
    }

    // Use WordPress function to add the notification
    wp_insert_comment(array(
        'user_id' => $user_id,
        'comment_content' => $notification_message,
        'comment_type' => 'notification',
        'comment_approved' => 1,
    ));
}
```