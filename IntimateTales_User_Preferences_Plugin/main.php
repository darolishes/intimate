```php
<?php
/**
 * Plugin Name: IntimateTales User Preferences Plugin
 * Plugin URI: https://www.intimatetales.com/user-preferences-plugin
 * Description: This plugin manages user preferences on the IntimateTales platform.
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

// Include the User Preferences class file
require_once(plugin_dir_path(__FILE__) . 'user_preferences.php');

// Initialize the User Preferences class
if(class_exists('IntimateTales_User_Preferences')) {
    $intimateTales_User_Preferences = new IntimateTales_User_Preferences();
}

// Activation and Deactivation Hooks
register_activation_hook(__FILE__, array($intimateTales_User_Preferences, 'activate'));
register_deactivation_hook(__FILE__, array($intimateTales_User_Preferences, 'deactivate'));

?>
```