```php
<?php
/**
 * Character Module for IntimateTales Roleplay
 */

class Character {
    private $character_id;
    private $user_id;
    private $character_name;
    private $character_description;
    private $character_custom_fields;

    public function __construct($user_id, $character_name, $character_description, $character_custom_fields) {
        $this->user_id = $user_id;
        $this->character_name = $character_name;
        $this->character_description = $character_description;
        $this->character_custom_fields = $character_custom_fields;
    }

    public function createCharacter() {
        $this->character_id = wp_insert_post(array(
            'post_title'    => $this->character_name,
            'post_content'  => $this->character_description,
            'post_status'   => 'publish',
            'post_author'   => $this->user_id,
            'post_type'     => 'character',
        ));

        foreach ($this->character_custom_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $this->character_id);
        }

        return $this->character_id;
    }

    public function updateCharacter($character_id, $character_name, $character_description, $character_custom_fields) {
        wp_update_post(array(
            'ID'            => $character_id,
            'post_title'    => $character_name,
            'post_content'  => $character_description,
        ));

        foreach ($character_custom_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $character_id);
        }

        return true;
    }

    public function deleteCharacter($character_id) {
        wp_delete_post($character_id, true);
        return true;
    }

    public function getCharacter($character_id) {
        $character = get_post($character_id);
        $character_meta = get_post_meta($character_id);

        return array(
            'character' => $character,
            'character_meta' => $character_meta
        );
    }
}
```