```php
<?php
/**
 * WordPress Coding Standards
 *
 * This file is for setting up the WordPress coding standards.
 * It's used to ensure that all PHP files adhere to the same standards.
 *
 * PHP version 8
 *
 * @category Standards
 * @package  IntimateTales_Roleplay
 * @author   Your Name
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link-to-your-website.com
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Include the WordPress Coding Standards.
if (file_exists(dirname(__FILE__) . '/vendor/wp-coding-standards/wpcs/WordPress-Core/ruleset.xml')) {
    // Path to WordPress coding standards.
    $standard = dirname(__FILE__) . '/vendor/wp-coding-standards/wpcs/WordPress-Core/ruleset.xml';
} else {
    // Path to default coding standards.
    $standard = dirname(__FILE__) . '/vendor/squizlabs/php_codesniffer/src/Standards/PSR2/ruleset.xml';
}

// Set the coding standards.
$phpcsConfig = array(
    'standard' => $standard,
    'extensions' => array('php'),
    'ignore' => array('node_modules', 'vendor'),
);

// Run the PHPCS.
exec('vendor/bin/phpcs --config-set installed_paths ' . escapeshellarg($standard));
exec('vendor/bin/phpcs --config-set default_standard ' . escapeshellarg($standard));
exec('vendor/bin/phpcs --config-set ignore ' . escapeshellarg(implode(',', $phpcsConfig['ignore'])));
exec('vendor/bin/phpcs --config-set extensions ' . escapeshellarg(implode(',', $phpcsConfig['extensions'])));
```
