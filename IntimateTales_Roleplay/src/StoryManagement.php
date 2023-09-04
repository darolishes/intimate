```php
<?php
/**
 * Story Management Module for IntimateTales Roleplay
 */

// Include WordPress and ACF dependencies
require_once(ABSPATH . 'wp-load.php');
require_once('includes/acf-fields.php');

class StoryManagement {
    // Database table names
    private $table_storylines;

    public function __construct() {
        global $wpdb;
        $this->table_storylines = $wpdb->prefix . 'storylines';
    }

    // Function to create a new storyline
    public function createStoryline($title, $description, $author_id) {
        global $wpdb;
        $wpdb->insert(
            $this->table_storylines,
            array(
                'title' => $title,
                'description' => $description,
                'author_id' => $author_id
            ),
            array('%s', '%s', '%d')
        );
    }

    // Function to update a storyline
    public function updateStoryline($storyline_id, $title, $description) {
        global $wpdb;
        $wpdb->update(
            $this->table_storylines,
            array(
                'title' => $title,
                'description' => $description
            ),
            array('ID' => $storyline_id),
            array('%s', '%s'),
            array('%d')
        );
    }

    // Function to delete a storyline
    public function deleteStoryline($storyline_id) {
        global $wpdb;
        $wpdb->delete(
            $this->table_storylines,
            array('ID' => $storyline_id),
            array('%d')
        );
    }

    // Function to get all storylines
    public function getAllStorylines() {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM $this->table_storylines");
        return $results;
    }

    // Function to get a storyline by ID
    public function getStorylineByID($storyline_id) {
        global $wpdb;
        $result = $wpdb->get_row("SELECT * FROM $this->table_storylines WHERE ID = $storyline_id");
        return $result;
    }
}

// Instantiate the StoryManagement class
$storyManagement = new StoryManagement();
?>
```