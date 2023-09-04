```php
<?php
/**
 * Plugin Name: IntimateTales Settings Plugin
 * Plugin URI: https://www.intimatetales.com/settings-plugin
 * Description: This plugin manages the settings for the IntimateTales platform.
 * Version: 1.0.0
 * Author: Dawid Rogaczewski
 * Author URI: https://www.dawidrogaczewski.com
 * License: GPL2
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Include the settings file
require_once plugin_dir_path(__FILE__) . 'settings.php';

// Activation and deactivation hooks
register_activation_hook(__FILE__, 'activate_intimatetales_settings');
register_deactivation_hook(__FILE__, 'deactivate_intimatetales_settings');

function activate_intimatetales_settings() {
    // Code to execute on plugin activation
}

function deactivate_intimatetales_settings() {
    // Code to execute on plugin deactivation
}

// Initialize the plugin
function init_intimatetales_settings() {
    // Code to initialize the plugin
}

add_action('init', 'init_intimatetales_settings');
?>
```