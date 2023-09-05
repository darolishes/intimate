```php
<?php
/**
 * Plugin Name: IntimateTales Plugin 3
 * Plugin URI: https://www.intimatetales.com/plugin3
 * Description: This is the third plugin of the IntimateTales Plugin Ecosystem.
 * Version: 1.0.0
 * Author: IntimateTales Team
 * Author URI: https://www.intimatetales.com
 * License: GPL2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include dependencies
require_once plugin_dir_path(__FILE__) . 'functions.php';

// Include ACF fields
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(json_decode(file_get_contents(plugin_dir_path(__FILE__) . 'acf-fields.json'), true));
}

// Enqueue styles and scripts
function intimateTales_plugin3_enqueue() {
    wp_enqueue_style('intimateTales-plugin3-styles', plugin_dir_url(__FILE__) . 'styles.css');
    wp_enqueue_script('intimateTales-plugin3-scripts', plugin_dir_url(__FILE__) . 'scripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'intimateTales_plugin3_enqueue');

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'intimateTales_plugin3_activate');
register_deactivation_hook(__FILE__, 'intimateTales_plugin3_deactivate');
```