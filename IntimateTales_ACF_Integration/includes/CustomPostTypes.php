<?php
/**
 * Custom Post Types Class
 *
 * @package IntimateTales_ACF_Integration
 */

namespace IntimateTales_ACF_Integration\Includes;

class CustomPostTypes {
    /**
     * Path to the post types JSON configuration file.
     *
     * @var string
     */
    private $post_types_json_path = __DIR__ . '/../acf-json/post_types.json';

    /**
     * CustomPostTypes constructor.
     */
    public function __construct() {
        $this->register_post_types();
    }

    /**
     * Register custom post types from ACF JSON configuration.
     */
    private function register_post_types() {
        $post_types = $this->get_post_types_from_json();

        foreach ($post_types as $post_type) {
            register_post_type($post_type['name'], $post_type['args']);
        }
    }

    /**
     * Get post types from ACF JSON configuration.
     *
     * @return array
     */
    private function get_post_types_from_json() {
        $json = file_get_contents($this->post_types_json_path);
        $post_types = json_decode($json, true);

        return $post_types;
    }
}
