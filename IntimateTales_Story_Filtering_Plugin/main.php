```php
<?php
/**
 * Plugin Name: IntimateTales Story Filtering Plugin
 * Plugin URI: https://www.intimatetales.com/story-filtering-plugin
 * Description: This plugin provides story filtering functionalities for the IntimateTales platform.
 * Version: 1.0.0
 * Author: Dawid Rogaczewski
 * Author URI: https://www.dawidrogaczewski.com
 * License: GPL2
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
	echo 'Hi there! I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Include dependencies
require_once plugin_dir_path(__FILE__) . 'story_filtering.php';

// Activation and deactivation hooks
register_activation_hook(__FILE__, 'intimatetales_story_filtering_activate');
register_deactivation_hook(__FILE__, 'intimatetales_story_filtering_deactivate');

function intimatetales_story_filtering_activate() {
    // Activation code here...
}

function intimatetales_story_filtering_deactivate() {
    // Deactivation code here...
}

// Initialize the plugin
add_action('init', 'intimatetales_story_filtering_init');

function intimatetales_story_filtering_init() {
    // Initialization code here...
}
```