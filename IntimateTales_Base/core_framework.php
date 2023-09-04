```php
<?php
/**
 * IntimateTales Base - Core Framework
 *
 * This file forms the core framework of the IntimateTales Base plugin.
 *
 * @package IntimateTales_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'IntimateTales_Base_Core_Framework' ) ) :

class IntimateTales_Base_Core_Framework {

    /**
     * The single instance of the class.
     *
     * @var IntimateTales_Base_Core_Framework
     */
    protected static $_instance = null;

    /**
     * Main IntimateTales_Base_Core_Framework Instance.
     *
     * Ensures only one instance of IntimateTales_Base_Core_Framework is loaded or can be loaded.
     *
     * @return IntimateTales_Base_Core_Framework - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * IntimateTales_Base_Core_Framework Constructor.
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Define IntimateTales Base Constants.
     */
    private function define_constants() {
        $this->define( 'IT_BASE_VERSION', '1.0.0' );
        $this->define( 'IT_BASE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        $this->define( 'IT_BASE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
    }

    /**
     * Include required core files.
     */
    public function includes() {
        include_once IT_BASE_PLUGIN_PATH . 'integration_points.php';
        include_once IT_BASE_PLUGIN_PATH . 'settings_management.php';
        include_once IT_BASE_PLUGIN_PATH . 'acf_integration.php';
        include_once IT_BASE_PLUGIN_PATH . 'wordpress_integration.php';
        include_once IT_BASE_PLUGIN_PATH . 'modular_architecture.php';
        include_once IT_BASE_PLUGIN_PATH . 'api_hooks.php';
    }

    /**
     * Hook into actions and filters.
     */
    private function init_hooks() {
        register_activation_hook( __FILE__, array( $this, 'install' ) );
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    /**
     * Install IntimateTales Base.
     */
    public function install() {
        // Installation related tasks...
    }

    /**
     * Init IntimateTales Base when WordPress Initialises.
     */
    public function init() {
        // Set up localisation...
        // Load class instances...
        // Other init tasks...
    }
}

endif;

/**
 * Main instance of IntimateTales_Base_Core_Framework.
 *
 * Returns the main instance of ITBCF to prevent the need to use globals.
 *
 * @return IntimateTales_Base_Core_Framework
 */
function ITBCF() {
    return IntimateTales_Base_Core_Framework::instance();
}

// Global for backwards compatibility.
$GLOBALS['itbcf'] = ITBCF();
```
