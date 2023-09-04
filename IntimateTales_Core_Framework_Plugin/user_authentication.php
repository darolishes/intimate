```php
<?php
/**
 * IntimateTales Core Framework Plugin
 * User Authentication Module
 *
 * This file handles user authentication and access permissions throughout the platform.
 *
 * @package IntimateTales_Core_Framework_Plugin
 * @author Dawid Rogaczewski
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class IT_Core_User_Authentication {
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', array($this, 'authenticate_user'));
    }

    /**
     * Authenticate user
     */
    public function authenticate_user() {
        if (!is_user_logged_in()) {
            auth_redirect();
        }
    }

    /**
     * Check user permissions
     *
     * @param string $capability The capability to check.
     * @return bool Whether the user has the given capability.
     */
    public function check_user_permissions($capability) {
        return current_user_can($capability);
    }
}

// Initialize the class
new IT_Core_User_Authentication();
```