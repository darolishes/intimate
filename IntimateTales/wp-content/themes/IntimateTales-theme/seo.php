```php
<?php
// SEO optimization for IntimateTales theme

// Add SEO meta tags to the header
function intimateTales_add_meta_tags() {
    if (is_single()) {
        global $post;
        $meta_description = get_post_meta($post->ID, 'meta_description', true);
        $meta_keywords = get_post_meta($post->ID, 'meta_keywords', true);

        echo '<meta name="description" content="' . esc_attr($meta_description) . '">';
        echo '<meta name="keywords" content="' . esc_attr($meta_keywords) . '">';
    }
}
add_action('wp_head', 'intimateTales_add_meta_tags');

// Add SEO fields to the story post type
function intimateTales_add_seo_fields() {
    add_meta_box(
        'seo_fields',
        'SEO Fields',
        'intimateTales_seo_fields_callback',
        'story',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'intimateTales_add_seo_fields');

// Callback function for displaying SEO fields
function intimateTales_seo_fields_callback($post) {
    $meta_description = get_post_meta($post->ID, 'meta_description', true);
    $meta_keywords = get_post_meta($post->ID, 'meta_keywords', true);

    echo '<label for="meta_description">Meta Description:</label>';
    echo '<input type="text" id="meta_description" name="meta_description" value="' . esc_attr($meta_description) . '">';
    echo '<label for="meta_keywords">Meta Keywords:</label>';
    echo '<input type="text" id="meta_keywords" name="meta_keywords" value="' . esc_attr($meta_keywords) . '">';
}

// Save SEO fields
function intimateTales_save_seo_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, 'meta_description', sanitize_text_field($_POST['meta_description']));
    }

    if (isset($_POST['meta_keywords'])) {
        update_post_meta($post_id, 'meta_keywords', sanitize_text_field($_POST['meta_keywords']));
    }
}
add_action('save_post', 'intimateTales_save_seo_fields');
?>
```