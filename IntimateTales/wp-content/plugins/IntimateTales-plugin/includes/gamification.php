```php
<?php
// Gamification Module for IntimateTales Plugin

// Function to calculate user points
function calculate_user_points($user_id) {
    $user_points = get_user_meta($user_id, 'user_points', true);
    if(empty($user_points)) {
        $user_points = 0;
    }
    return $user_points;
}

// Function to update user points
function update_user_points($user_id, $points) {
    $user_points = calculate_user_points($user_id);
    $user_points += $points;
    update_user_meta($user_id, 'user_points', $user_points);
}

// Function to award points for reading a story
function award_points_for_reading($user_id, $story_id) {
    $points_for_reading = 10; // Define how many points for reading a story
    update_user_points($user_id, $points_for_reading);

    // Update the user's read stories
    $read_stories = get_user_meta($user_id, 'read_stories', true);
    if(empty($read_stories)) {
        $read_stories = array();
    }
    array_push($read_stories, $story_id);
    update_user_meta($user_id, 'read_stories', $read_stories);
}

// Function to award points for sharing a story
function award_points_for_sharing($user_id) {
    $points_for_sharing = 5; // Define how many points for sharing a story
    update_user_points($user_id, $points_for_sharing);
}

// Function to award points for rating a story
function award_points_for_rating($user_id) {
    $points_for_rating = 3; // Define how many points for rating a story
    update_user_points($user_id, $points_for_rating);
}

// Hook into WordPress to award points when a story is read
add_action('intimatetales_story_read', 'award_points_for_reading', 10, 2);

// Hook into WordPress to award points when a story is shared
add_action('intimatetales_story_shared', 'award_points_for_sharing', 10, 1);

// Hook into WordPress to award points when a story is rated
add_action('intimatetales_story_rated', 'award_points_for_rating', 10, 1);
?>
```