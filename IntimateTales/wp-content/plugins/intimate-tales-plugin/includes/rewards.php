```php
<?php
// IntimateTales Rewards System

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Function to calculate user points
function calculate_user_points($user_id) {
    global $wpdb;

    // Query to get user points
    $points = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM {$wpdb->prefix}usermeta WHERE user_id = %d AND meta_key = 'user_points'", $user_id));

    return $points;
}

// Function to update user points
function update_user_points($user_id, $points) {
    update_user_meta($user_id, 'user_points', $points);
}

// Function to check if user is eligible for reward
function check_reward_eligibility($user_id) {
    $points = calculate_user_points($user_id);

    // Check if user points are enough for reward
    if ($points >= 1000) {
        return true;
    } else {
        return false;
    }
}

// Function to give reward to user
function give_reward($user_id) {
    if (check_reward_eligibility($user_id)) {
        // Give reward
        update_user_meta($user_id, 'premium_membership', true);

        // Deduct points
        $points = calculate_user_points($user_id);
        update_user_points($user_id, $points - 1000);

        return true;
    } else {
        return false;
    }
}
```