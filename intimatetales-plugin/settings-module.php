<?php

/**
 * IntimateTales Settings Module
 *
 * Integration with the IntimateTales Settings Plugin for configuration management.
 * Implements settings as ACF (Advanced Custom Fields) JSON files for flexibility.
 * Allows for easy customization through the WordPress admin interface.
 */

// Register the settings page
function intimatetales_register_settings_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'IntimateTales Settings',
            'menu_title' => 'IntimateTales Settings',
            'menu_slug' => 'intimatetales-settings',
            'capability' => 'manage_options',
            'redirect' => false
        ));
    }
}
add_action('acf/init', 'intimatetales_register_settings_page');

// Load the settings from ACF JSON files
function intimatetales_load_settings() {
    if (function_exists('acf_add_local_field_group')) {
        $settings_files = glob(plugin_dir_path(__FILE__) . 'settings/*.json');
        foreach ($settings_files as $file) {
            $settings = json_decode(file_get_contents($file), true);
            acf_add_local_field_group($settings);
        }
    }
}
add_action('acf/init', 'intimatetales_load_settings');

// Customize the settings page
function intimatetales_customize_settings_page() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_intimatetales_settings',
            'title' => 'IntimateTales Settings',
            'fields' => array(
                array(
                    'key' => 'field_intimatetales_logo',
                    'label' => 'Logo',
                    'name' => 'intimatetales_logo',
                    'type' => 'image',
                    'instructions' => 'Upload the logo for IntimateTales.',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_intimatetales_color_scheme',
                    'label' => 'Color Scheme',
                    'name' => 'intimatetales_color_scheme',
                    'type' => 'select',
                    'instructions' => 'Select the color scheme for IntimateTales.',
                    'required' => 1,
                    'choices' => array(
                        'blue' => 'Blue',
                        'green' => 'Green',
                        'purple' => 'Purple',
                    ),
                    'default_value' => 'blue',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'intimatetales-settings',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));
    }
}
add_action('acf/init', 'intimatetales_customize_settings_page');

// Get the value of a setting
function intimatetales_get_setting($name) {
    return get_field($name, 'option');
}

// Example usage: $logo = intimatetales_get_setting('intimatetales_logo');

?>

