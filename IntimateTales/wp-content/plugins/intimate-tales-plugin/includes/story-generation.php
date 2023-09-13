```php
<?php
/**
 * Story Generation Module
 * 
 * This module is responsible for generating stories based on user interactions,
 * global data and predefined algorithms.
 */

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'path-to-your-ai-library.php';

// Use AI library
use YourAILibrary\StoryGenerator;

function generate_story($user_id, $genre) {
    global $wpdb;

    // Get user interactions
    $user_interactions = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}user_interactions WHERE user_id = %d",
            $user_id
        )
    );

    // Get global data
    $global_data = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}global_data WHERE genre = %s",
            $genre
        )
    );

    // Initialize story generator
    $story_generator = new StoryGenerator($user_interactions, $global_data);

    // Generate story
    $story = $story_generator->generate();

    // Insert story into database
    $wpdb->insert(
        "{$wpdb->prefix}stories",
        array(
            'user_id' => $user_id,
            'genre' => $genre,
            'story' => $story
        ),
        array('%d', '%s', '%s')
    );

    return $story;
}

// Hook into WordPress
add_action('init', 'generate_story');
```