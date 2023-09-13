```php
<?php
/*
Plugin Name: IntimateTales
Plugin URI: https://www.intimatetales.com/
Description: A platform for users to experience personalized stories with features like user login, role-play interaction, pairing system, and gamified elements.
Version: 1.0
Author: IntimateTales Team
Author URI: https://www.intimatetales.com/
License: GPL2
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define INTIMATETALES_PLUGIN_FILE
if (!defined('INTIMATETALES_PLUGIN_FILE')) {
    define('INTIMATETALES_PLUGIN_FILE', __FILE__);
}

// Include the main IntimateTales class
if (!class_exists('IntimateTales')) {
    include_once dirname(__FILE__) . '/includes/class-intimate-tales.php';
}

// Main instance of IntimateTales
function IntimateTales() {
    return IntimateTales::instance();
}

// Begins execution of the plugin
IntimateTales()->run();
```
