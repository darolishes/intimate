<?php
/**
 * Class Taxonomies
 *
 * This class is responsible for defining custom taxonomies.
 *
 * @package IntimateTales_ACF_Integration
 */

namespace IntimateTales_ACF_Integration\Includes;

class Taxonomies {

    /**
     * The ACF JSON configurations for taxonomies.
     *
     * @var array
     */
    private $acf_json_configurations;

    /**
     * Taxonomies constructor.
     */
    public function __construct() {
        $this->acf_json_configurations = $this->load_acf_json_configurations();
        $this->define_taxonomies();
    }

    /**
     * Load ACF JSON configurations for taxonomies.
     *
     * @return array
     */
    private function load_acf_json_configurations() {
        $json_file_path = plugin_dir_path( __FILE__ ) . '../acf-json/taxonomies.json';
        $json_data = file_get_contents($json_file_path);
        return json_decode($json_data, true);
    }

    /**
     * Define custom taxonomies based on ACF JSON configurations.
     */
    private function define_taxonomies() {
        foreach ($this->acf_json_configurations as $taxonomy => $args) {
            register_taxonomy($taxonomy, null, $args);
        }
    }
}

new Taxonomies();