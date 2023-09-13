```php
<?php
/**
 * Onboarding process for new users
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function intimate_tales_onboarding() {
    // Check if user is logged in
    if (is_user_logged_in()) {
        // Get current user
        $current_user = wp_get_current_user();

        // Check if user has completed onboarding
        $completed_onboarding = get_user_meta($current_user->ID, 'completed_onboarding', true);

        // If user has not completed onboarding, redirect to onboarding page
        if (!$completed_onboarding) {
            wp_redirect(home_url('/onboarding'));
            exit;
        }
    }
}
add_action('template_redirect', 'intimate_tales_onboarding');

function intimate_tales_onboarding_process() {
    // Check if onboarding form is submitted
    if (isset($_POST['onboarding_submit'])) {
        // Get current user
        $current_user = wp_get_current_user();

        // Update user meta to indicate that user has completed onboarding
        update_user_meta($current_user->ID, 'completed_onboarding', true);

        // Redirect user to dashboard
        wp_redirect(home_url('/dashboard'));
        exit;
    }
}
add_action('init', 'intimate_tales_onboarding_process');
```