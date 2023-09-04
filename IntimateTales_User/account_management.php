<?php
/**
 * Account Management Module for IntimateTales User Plugin
 * 
 * This module handles user data download and account deactivation
 * 
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class IT_Account_Management {
    /**
     * Initialize the class
     */
    public function __construct() {
        add_action('wp_ajax_download_user_data', array($this, 'download_user_data'));
        add_action('wp_ajax_deactivate_account', array($this, 'deactivate_account'));
    }

    /**
     * Download User Data
     */
    public function download_user_data() {
        // Check if user is logged in
        if (!is_user_logged_in()) {
            wp_send_json_error('You must be logged in to download your data.', 401);
            exit;
        }

        $user_id = get_current_user_id();
        $user_data = get_userdata($user_id);

        // Send user data as JSON
        wp_send_json_success($user_data);
    }

    /**
     * Deactivate Account
     */
    public function deactivate_account() {
        // Check if user is logged in
        if (!is_user_logged_in()) {
            wp_send_json_error('You must be logged in to deactivate your account.', 401);
            exit;
        }

        $user_id = get_current_user_id();

        // Deactivate user account
        if (wp_delete_user($user_id)) {
            wp_send_json_success('Your account has been deactivated.');
        } else {
            wp_send_json_error('There was an error deactivating your account. Please try again.');
        }
    }
}

new IT_Account_Management();