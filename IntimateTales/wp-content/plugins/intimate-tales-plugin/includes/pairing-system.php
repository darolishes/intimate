```php
<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class for handling the pairing system
 */
class IntimateTales_Pairing_System {

    /**
     * Constructor
     */
    public function __construct() {
        add_action('wp_ajax_send_pairing_request', array($this, 'send_pairing_request'));
        add_action('wp_ajax_accept_pairing_request', array($this, 'accept_pairing_request'));
    }

    /**
     * Send pairing request
     */
    public function send_pairing_request() {
        // Check nonce for security
        check_ajax_referer('intimate_tales_nonce', 'nonce');

        $requester_id = get_current_user_id();
        $requested_id = intval($_POST['requested_id']);

        // Insert pairing request into database
        global $wpdb;
        $wpdb->insert(
            "{$wpdb->prefix}intimate_tales_pairing_requests",
            array(
                'requester_id' => $requester_id,
                'requested_id' => $requested_id,
                'status' => 'pending'
            ),
            array('%d', '%d', '%s')
        );

        wp_send_json_success(array('message' => 'Pairing request sent.'));
    }

    /**
     * Accept pairing request
     */
    public function accept_pairing_request() {
        // Check nonce for security
        check_ajax_referer('intimate_tales_nonce', 'nonce');

        $requester_id = intval($_POST['requester_id']);
        $requested_id = get_current_user_id();

        // Update pairing request status in database
        global $wpdb;
        $wpdb->update(
            "{$wpdb->prefix}intimate_tales_pairing_requests",
            array('status' => 'accepted'),
            array(
                'requester_id' => $requester_id,
                'requested_id' => $requested_id
            ),
            array('%s'),
            array('%d', '%d')
        );

        wp_send_json_success(array('message' => 'Pairing request accepted.'));
    }
}

new IntimateTales_Pairing_System();
```