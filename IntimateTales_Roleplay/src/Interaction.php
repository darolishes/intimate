```php
<?php
/**
 * Interaction Class for IntimateTales Roleplay
 *
 * Handles all the interaction functionalities
 *
 * @package IntimateTales_Roleplay
 */

class Interaction {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action('wp_ajax_send_message', array($this, 'send_message'));
        add_action('wp_ajax_nopriv_send_message', array($this, 'send_message'));
    }

    /**
     * Send message function
     */
    public function send_message() {
        // Check if the request has necessary parameters
        if (!isset($_POST['message']) || !isset($_POST['character_id'])) {
            wp_send_json_error('Invalid parameters');
        }

        // Get the current user
        $current_user = wp_get_current_user();

        // Insert the message into the database
        global $wpdb;
        $table_name = $wpdb->prefix . 'interaction';
        $wpdb->insert(
            $table_name,
            array(
                'user_id' => $current_user->ID,
                'character_id' => $_POST['character_id'],
                'message' => $_POST['message'],
                'time' => current_time('mysql'),
            ),
            array('%d', '%d', '%s', '%s')
        );

        // Send the response
        wp_send_json_success('Message sent successfully');
    }
}

// Initialize the class
$interaction = new Interaction();
```