```php
<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_1',
    'title' => 'Character Fields',
    'fields' => array(
        array(
            'key' => 'field_1',
            'label' => 'Character Name',
            'name' => 'character_name',
            'type' => 'text',
        ),
        array(
            'key' => 'field_2',
            'label' => 'Character Description',
            'name' => 'character_description',
            'type' => 'textarea',
        ),
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

acf_add_local_field_group(array(
    'key' => 'group_2',
    'title' => 'Story Fields',
    'fields' => array(
        array(
            'key' => 'field_3',
            'label' => 'Story Title',
            'name' => 'story_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_4',
            'label' => 'Story Description',
            'name' => 'story_description',
            'type' => 'textarea',
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

endif;
?>
```