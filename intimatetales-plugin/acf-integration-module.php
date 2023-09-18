<?php

/**
 * ACF Integration Module
 *
 * This module utilizes ACF (Advanced Custom Fields) for creating and managing configurations,
 * options pages, post types, taxonomies, and more.
 *
 * @package IntimateTales
 * @subpackage ACFIntegrationModule
 */

/**
 * Load ACF configurations from JSON files.
 *
 * @param string $folder_path The path to the folder containing ACF JSON files.
 */
function load_acf_configurations($folder_path) {
    // Get all JSON files in the folder
    $json_files = glob($folder_path . '/*.json');

    // Loop through each JSON file and load the configuration
    foreach ($json_files as $json_file) {
        $config = json_decode(file_get_contents($json_file), true);

        // Check if the configuration is valid
        if (is_array($config) && !empty($config)) {
            // Load the ACF configuration
            acf_add_local_field_group($config);
        }
    }
}

/**
 * Synchronize ACF configurations as JSON for efficient management and deployment.
 *
 * @param string $folder_path The path to the folder where ACF JSON files will be saved.
 */
function synchronize_acf_configurations($folder_path) {
    // Get all ACF field groups
    $field_groups = acf_get_field_groups();

    // Loop through each field group and save the configuration as JSON
    foreach ($field_groups as $field_group) {
        $config = acf_get_field_group($field_group['key']);

        // Check if the field group has fields
        if (isset($config['fields']) && is_array($config['fields']) && !empty($config['fields'])) {
            // Generate a unique filename based on the field group key
            $filename = $folder_path . '/' . $field_group['key'] . '.json';

            // Save the field group configuration as JSON
            file_put_contents($filename, json_encode($config, JSON_PRETTY_PRINT));
        }
    }
}

// Example usage:
// Load ACF configurations from the 'acf-configurations' folder
load_acf_configurations(__DIR__ . '/acf-configurations');

// Example usage:
// Synchronize ACF configurations as JSON in the 'acf-configurations' folder
synchronize_acf_configurations(__DIR__ . '/acf-configurations');

?>

This code represents the ACF Integration Module for the IntimateTales WordPress plugin. It includes functions to load ACF configurations from JSON files and synchronize ACF configurations as JSON for efficient management and deployment. The code demonstrates how to use the ACF functions `acf_add_local_field_group` and `acf_get_field_groups` to interact with ACF field groups and their configurations.