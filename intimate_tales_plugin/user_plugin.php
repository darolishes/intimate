```php
<?php
/**
 * IntimateTales User Plugin
 *
 * @package     IntimateTales
 * @subpackage  UserPlugin
 * @since       1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('IntimateTales_UserPlugin')) {

    class IntimateTales_UserPlugin {

        /**
         * Constructor.
         */
        public function __construct() {
            add_action('init', array($this, 'register_user_fields'));
        }

        /**
         * Register user fields.
         */
        public function register_user_fields() {
            if (function_exists('acf_add_local_field_group')) {
                acf_add_local_field_group(array(
                    'key' => 'group_user_preferences',
                    'title' => 'User Preferences',
                    'fields' => array(
                        array(
                            'key' => 'field_likes',
                            'label' => 'Likes',
                            'name' => 'likes',
                            'type' => 'checkbox',
                            'choices' => array(
                                'choice_1' => 'Choice 1',
                                'choice_2' => 'Choice 2',
                            ),
                        ),
                        array(
                            'key' => 'field_dislikes',
                            'label' => 'Dislikes',
                            'name' => 'dislikes',
                            'type' => 'checkbox',
                            'choices' => array(
                                'choice_1' => 'Choice 1',
                                'choice_2' => 'Choice 2',
                            ),
                        ),
                        array(
                            'key' => 'field_inclinations',
                            'label' => 'Inclinations',
                            'name' => 'inclinations',
                            'type' => 'checkbox',
                            'choices' => array(
                                'choice_1' => 'Choice 1',
                                'choice_2' => 'Choice 2',
                            ),
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'user_form',
                                'operator' => '==',
                                'value' => 'all',
                            ),
                        ),
                    ),
                ));
            }
        }
    }

    new IntimateTales_UserPlugin();
}
```
