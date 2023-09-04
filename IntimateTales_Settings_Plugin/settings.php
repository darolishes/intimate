```php
<?php
/**
 * IntimateTales Settings Plugin
 *
 * This file contains all the settings related functionalities.
 *
 * @package IntimateTales_Settings_Plugin
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Class IntimateTales_Settings
 */
class IntimateTales_Settings {

    /**
     * The single instance of the class.
     *
     * @var IntimateTales_Settings
     */
    protected static $_instance = null;

    /**
     * Main IntimateTales_Settings Instance.
     *
     * Ensures only one instance of IntimateTales_Settings is loaded or can be loaded.
     *
     * @return IntimateTales_Settings - Main instance.
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * IntimateTales_Settings Constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Hook into actions and filters.
     */
    private function init_hooks() {
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    /**
     * Add settings page.
     */
    public function add_settings_page() {
        add_options_page(
            'IntimateTales Settings',
            'IntimateTales Settings',
            'manage_options',
            'intimatetales-settings',
            array($this, 'settings_page_content')
        );
    }

    /**
     * Register settings.
     */
    public function register_settings() {
        register_setting('intimatetales-settings-group', 'intimatetales_option_name');
    }

    /**
     * Settings page content.
     */
    public function settings_page_content() {
        // Check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

        // Add error/update messages
        settings_errors('intimatetales_messages');
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                // Output security fields for the registered setting "intimatetales-settings-group"
                settings_fields('intimatetales-settings-group');
                // Output setting sections and their fields
                do_settings_sections('intimatetales-settings-group');
                // Output save settings button
                submit_button('Save Settings');
                ?>
            </form>
        </div>
        <?php
    }
}

/**
 * Main instance of IntimateTales_Settings.
 *
 * Returns the main instance of IntimateTales_Settings to prevent the need to use globals.
 *
 * @return IntimateTales_Settings
 */
function IntimateTales_Settings() {
    return IntimateTales_Settings::instance();
}

// Global for backwards compatibility.
$GLOBALS['intimatetales_settings'] = IntimateTales_Settings();
```