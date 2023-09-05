```php
<?php
/**
 * Plugin Name: IntimateTales Couples Interaction Plugin
 * Plugin URI: https://www.intimatetales.com/
 * Description: This plugin enhances the platform's capabilities by enabling shared access and collaborative experiences for couples.
 * Version: 1.0.0
 * Author: Dawid Rogaczewski
 * Author URI: https://www.dawidrogaczewski.com/
 * License: GPL2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin paths
define('IT_CIP_PATH', plugin_dir_path(__FILE__));
define('IT_CIP_URL', plugin_dir_url(__FILE__));

// Include plugin files
require_once IT_CIP_PATH . 'src/CouplesCollaboration.php';
require_once IT_CIP_PATH . 'src/UnifiedDecisionMaking.php';
require_once IT_CIP_PATH . 'src/IntegrationModule.php';
require_once IT_CIP_PATH . 'src/AccessModes.php';
require_once IT_CIP_PATH . 'src/CustomizableTemplates.php';
require_once IT_CIP_PATH . 'src/CompatibilityModule.php';

// Initialize plugin classes
$couplesCollaboration = new CouplesCollaboration();
$unifiedDecisionMaking = new UnifiedDecisionMaking();
$integrationModule = new IntegrationModule();
$accessModes = new AccessModes();
$customizableTemplates = new CustomizableTemplates();
$compatibilityModule = new CompatibilityModule();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, [$couplesCollaboration, 'activate']);
register_deactivation_hook(__FILE__, [$couplesCollaboration, 'deactivate']);

// Hook into WordPress
add_action('init', [$couplesCollaboration, 'init']);
add_action('init', [$unifiedDecisionMaking, 'init']);
add_action('init', [$integrationModule, 'init']);
add_action('init', [$accessModes, 'init']);
add_action('init', [$customizableTemplates, 'init']);
add_action('init', [$compatibilityModule, 'init']);
```
