```php
<?php
// IntimateTales Search Functionality

function intimate_tales_search_stories($keyword, $genre, $author) {
    global $wpdb;

    // Prepare SQL query
    $sql = $wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}posts 
        WHERE post_type = 'story' 
        AND post_status = 'publish' 
        AND (post_title LIKE %s OR post_content LIKE %s)",
        '%' . $wpdb->esc_like($keyword) . '%',
        '%' . $wpdb->esc_like($keyword) . '%'
    );

    // Add genre filter if provided
    if (!empty($genre)) {
        $sql .= $wpdb->prepare(" AND post_category = %s", $genre);
    }

    // Add author filter if provided
    if (!empty($author)) {
        $sql .= $wpdb->prepare(" AND post_author = %s", $author);
    }

    // Execute query
    $results = $wpdb->get_results($sql);

    return $results;
}

// Register AJAX action for search
add_action('wp_ajax_intimate_tales_search', 'intimate_tales_search_stories');
add_action('wp_ajax_nopriv_intimate_tales_search', 'intimate_tales_search_stories');
```