```php
<?php
/**
 * IntimateTales ACF Integration Module
 *
 * This module handles the integration of Advanced Custom Fields (ACF) Pro plugin.
 *
 * @package IntimateTales
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('IntimateTales_ACF_Integration')) {

    class IntimateTales_ACF_Integration {

        /**
         * Constructor
         */
        public function __construct() {
            $this->init_hooks();
        }

        /**
         * Initialize hooks
         */
        private function init_hooks() {
            add_action('acf/init', array($this, 'register_acf_fields'));
        }

        /**
         * Register ACF fields
         */
        public function register_acf_fields() {
            if (function_exists('acf_add_local_field_group')) {
                // Load ACF JSON files and register fields
                $this->load_acf_json_files();
            }
        }

        /**
         * Load ACF JSON files
         */
        private function load_acf_json_files() {
            $dir = plugin_dir_path(__FILE__) . '/acf-json';

            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file !== '.' && $file !== '..') {
                            $group = json_decode(file_get_contents($dir . '/' . $file), true);
                            acf_add_local_field_group($group);
                        }
                    }
                    closedir($dh);
                }
            }
        }
    }

    new IntimateTales_ACF_Integration();
}
```