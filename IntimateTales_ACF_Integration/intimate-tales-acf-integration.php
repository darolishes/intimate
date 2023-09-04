<?php
/**
 * Plugin Name: IntimateTales ACF Integration
 * Plugin URI: https://www.intimatetales.com/
 * Description: This plugin empowers administrators with the ability to construct and oversee custom post types, taxonomies, and options pages using ACF JSON files.
 * Version: 1.0.0
 * Author: Dawid Rogaczewski
 * Author URI: https://www.dawidrogaczewski.com/
 * License: GPL2
 */

defined('ABSPATH') or die('Direct script access disallowed.');

define('INTIMATE_TALES_ACF_INTEGRATION_DIR', plugin_dir_path(__FILE__));
define('INTIMATE_TALES_ACF_INTEGRATION_URL', plugin_dir_url(__FILE__));

require_once(INTIMATE_TALES_ACF_INTEGRATION_DIR . 'includes/ACFIntegration.php');
require_once(INTIMATE_TALES_ACF_INTEGRATION_DIR . 'includes/CustomPostTypes.php');
require_once(INTIMATE_TALES_ACF_INTEGRATION_DIR . 'includes/Taxonomies.php');
require_once(INTIMATE_TALES_ACF_INTEGRATION_DIR . 'includes/OptionsPages.php');

use IntimateTales_ACF_Integration\ACFIntegration;
use IntimateTales_ACF_Integration\CustomPostTypes;
use IntimateTales_ACF_Integration\Taxonomies;
use IntimateTales_ACF_Integration\OptionsPages;

if (!class_exists('IntimateTales_ACF_Integration')) {
    class IntimateTales_ACF_Integration {
        function __construct() {
            $this->acf_integration = new ACFIntegration();
            $this->custom_post_types = new CustomPostTypes();
            $this->taxonomies = new Taxonomies();
            $this->options_pages = new OptionsPages();
        }

        function register() {
            add_action('init', array($this, 'activate'));
        }

        function activate() {
            $this->acf_integration->init();
            $this->custom_post_types->init();
            $this->taxonomies->init();
            $this->options_pages->init();
        }
    }
}

if (class_exists('IntimateTales_ACF_Integration')) {
    $intimateTalesACFIntegration = new IntimateTales_ACF_Integration();
    $intimateTalesACFIntegration->register();
}
