```php
<?php
// IntimateTales Roleplay Interface

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to start a new story
 */
function start_story() {
    // Fetch story data from database
    $story_data = get_story_data();

    // Check if story data exists
    if($story_data) {
        // Start the story
        echo $story_data['story_start'];
    } else {
        echo 'No story found. Please try again later.';
    }
}

/**
 * Function to handle decision points in the story
 */
function handle_decision($decision) {
    // Fetch next part of the story based on the decision
    $next_part = get_story_part($decision);

    // Check if next part exists
    if($next_part) {
        // Display the next part of the story
        echo $next_part;
    } else {
        echo 'No further part found. Please try again later.';
    }
}

/**
 * Function to end the story
 */
function end_story() {
    // Fetch end of the story from database
    $story_end = get_story_end();

    // Check if end of the story exists
    if($story_end) {
        // End the story
        echo $story_end;
    } else {
        echo 'No end found for the story. Please try again later.';
    }
}

/**
 * Function to get story data from database
 */
function get_story_data() {
    // Fetch story data from database
    // This is a placeholder function and needs to be replaced with actual database query
    return array(
        'story_start' => 'Once upon a time...',
        'story_end' => '...and they lived happily ever after.'
    );
}

/**
 * Function to get next part of the story based on the decision
 */
function get_story_part($decision) {
    // Fetch next part of the story based on the decision from database
    // This is a placeholder function and needs to be replaced with actual database query
    return 'They decided to ' . $decision . '.';
}

/**
 * Function to get end of the story from database
 */
function get_story_end() {
    // Fetch end of the story from database
    // This is a placeholder function and needs to be replaced with actual database query
    return '...and they lived happily ever after.';
}
```