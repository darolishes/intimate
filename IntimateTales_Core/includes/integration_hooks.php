<?php
/**
 * IntimateTales Core Framework Plugin - Integration Hooks
 * 
 * This file contains all the integration hooks for the IntimateTales platform.
 * 
 * @package IntimateTales_Core_Framework_Plugin
 * @author Dawid Rogaczewski
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register all the hooks related to the core functionalities of the plugin.
 */
class IntimateTales_Core_Framework_Integration_Hooks {

    /**
     * Hook into WordPress's plugin loaded action.
     * This ensures that our plugin's functionality is loaded after all other plugins,
     * allowing us to interact with them.
     */
    public function plugin_loaded_action() {
        add_action('plugins_loaded', array($this, 'initialize_core_framework'));
    }

    /**
     * Initialize the core framework of the plugin.
     * This is where we can include files, instantiate classes, or run functions needed for our plugin.
     */
    public function initialize_core_framework() {
        // Include the necessary files
        require_once plugin_dir_path(__FILE__) . 'api_endpoints.php';
        require_once plugin_dir_path(__FILE__) . 'user_authentication.php';

        // Initialize the other plugins
        do_action('intimatetales_initialize_acf_integration');
        do_action('intimatetales_initialize_user_preferences');
        do_action('intimatetales_initialize_story_filtering');
        do_action('intimatetales_initialize_round_based_gameplay');
        do_action('intimatetales_initialize_couples_interaction');
    }
}

// Instantiate the class
$intimatetales_core_framework_integration_hooks = new IntimateTales_Core_Framework_Integration_Hooks();
$intimatetales_core_framework_integration_hooks->plugin_loaded_action();