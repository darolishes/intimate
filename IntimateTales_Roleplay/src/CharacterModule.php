```php
<?php
/**
 * Character Module for IntimateTales Roleplay
 *
 * @package IntimateTales_Roleplay
 */

class CharacterModule {
    /**
     * Initialize the class
     */
    public function __construct() {
        add_action('init', array($this, 'register_character_post_type'));
        add_action('acf/init', array($this, 'add_character_fields'));
    }

    /**
     * Register the character post type
     */
    public function register_character_post_type() {
        $args = array(
            'public' => true,
            'label'  => 'Characters',
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        register_post_type('character', $args);
    }

    /**
     * Add ACF fields to the character post type
     */
    public function add_character_fields() {
        if(function_exists('acf_add_local_field_group')):
            acf_add_local_field_group(array(
                'key' => 'group_character_fields',
                'title' => 'Character Fields',
                'fields' => array(
                    array(
                        'key' => 'field_character_name',
                        'label' => 'Character Name',
                        'name' => 'character_name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_character_description',
                        'label' => 'Character Description',
                        'name' => 'character_description',
                        'type' => 'textarea',
                    ),
                    // Add more fields as needed
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'character',
                        ),
                    ),
                ),
            ));
        endif;
    }
}

// Initialize the class
$character_module = new CharacterModule();
```