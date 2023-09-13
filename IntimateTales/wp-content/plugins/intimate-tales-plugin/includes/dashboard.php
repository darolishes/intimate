```php
<?php
// IntimateTales User Dashboard

function intimate_tales_dashboard() {
    // Check if user is logged in
    if(is_user_logged_in()) {
        global $current_user;
        get_currentuserinfo();

        echo '<div id="user-dashboard">';
        echo '<h2>Welcome, ' . $current_user->user_login . '</h2>';

        // Display user activities
        $user_id = $current_user->ID;
        $user_posts = count_user_posts($user_id);
        $user_comments = get_comments(array('user_id' => $user_id, 'count' => true));

        echo '<p>You have created ' . $user_posts . ' stories.</p>';
        echo '<p>You have posted ' . $user_comments . ' comments.</p>';

        // Display user's stories
        $args = array(
            'author'        =>  $user_id,
            'orderby'       =>  'post_date',
            'order'         =>  'ASC',
            'posts_per_page' => -1
        );
        $user_stories = get_posts($args);

        echo '<h3>Your Stories</h3>';
        echo '<ul>';
        foreach ($user_stories as $story) {
            echo '<li><a href="' . get_permalink($story->ID) . '">' . $story->post_title . '</a></li>';
        }
        echo '</ul>';

        echo '</div>';
    } else {
        echo '<p>Please <a href="' . wp_login_url() . '">log in</a> to view your dashboard.</p>';
    }
}

add_shortcode('intimate_tales_dashboard', 'intimate_tales_dashboard');
?>
```