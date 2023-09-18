```php
<?php
// Check if ACF is active
if ( ! class_exists('ACF') ) {
    die('Please install and activate Advanced Custom Fields Pro.');
}

// Define the story fields
function intimateTales_story_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_story_fields',
        'title' => 'Story Fields',
        'fields' => array(
            array(
                'key' => 'field_story_description',
                'label' => 'Story Description',
                'name' => 'story_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_narrative_style',
                'label' => 'Narrative Style',
                'name' => 'narrative_style',
                'type' => 'select',
                'choices' => array(
                    'first_person' => 'First Person',
                    'third_person' => 'Third Person',
                ),
            ),
            array(
                'key' => 'field_sharpness_level',
                'label' => 'Sharpness Level',
                'name' => 'sharpness_level',
                'type' => 'number',
                'min' => 1,
                'max' => 5,
            ),
            array(
                'key' => 'field_experience_level',
                'label' => 'Experience Level',
                'name' => 'experience_level',
                'type' => 'number',
                'min' => 1,
                'max' => 5,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'story',
                ),
            ),
        ),
    ));
}

add_action('acf/init', 'intimateTales_story_fields');

// Define the user preference fields
function intimateTales_user_preference_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_user_preference_fields',
        'title' => 'User Preference Fields',
        'fields' => array(
            array(
                'key' => 'field_favorite_narrative_style',
                'label' => 'Favorite Narrative Style',
                'name' => 'favorite_narrative_style',
                'type' => 'select',
                'choices' => array(
                    'first_person' => 'First Person',
                    'third_person' => 'Third Person',
                ),
            ),
            array(
                'key' => 'field_preferred_sharpness_level',
                'label' => 'Preferred Sharpness Level',
                'name' => 'preferred_sharpness_level',
                'type' => 'number',
                'min' => 1,
                'max' => 5,
            ),
            array(
                'key' => 'field_preferred_experience_level',
                'label' => 'Preferred Experience Level',
                'name' => 'preferred_experience_level',
                'type' => 'number',
                'min' => 1,
                'max' => 5,
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

add_action('acf/init', 'intimateTales_user_preference_fields');
```