```php
<?php
/**
 * Plugin Name: IntimateTales ACF Integration Plugin
 * Plugin URI: https://www.intimatetales.com/
 * Description: This plugin integrates Advanced Custom Fields (ACF) with the IntimateTales platform.
 * Version: 1.0.0
 * Author: Dawid Rogaczewski
 * Author URI: https://www.dawidrogaczewski.com/
 * License: GPL2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Check if IntimateTales Core Framework Plugin is activated
if (!in_array('IntimateTales_Core_Framework_Plugin/main.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    return;
}

// Include ACF Integration file
require_once plugin_dir_path(__FILE__) . 'acf_integration.php';

// Plugin activation
function activate_intimatetales_acf_integration_plugin() {
    // Check if ACF is activated
    if (!class_exists('acf')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die(__('This plugin requires the Advanced Custom Fields plugin to be installed and active.', 'intimatetales-acf-integration'));
    }
}

// Plugin deactivation
function deactivate_intimatetales_acf_integration_plugin() {
    // Actions to perform when the plugin is deactivated
}

register_activation_hook(__FILE__, 'activate_intimatetales_acf_integration_plugin');
register_deactivation_hook(__FILE__, 'deactivate_intimatetales_acf_integration_plugin');
```