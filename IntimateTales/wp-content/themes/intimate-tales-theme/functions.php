```php
<?php
// IntimateTales Theme Functions

// Enqueue Styles and Scripts
function intimate_tales_enqueue_styles_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'intimate_tales_enqueue_styles_scripts');

// Register Navigation Menus
function intimate_tales_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'intimate-tales'),
        'footer' => __('Footer Menu', 'intimate-tales')
    ));
}
add_action('after_setup_theme', 'intimate_tales_register_menus');

// Add Theme Support
function intimate_tales_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'intimate_tales_theme_support');

// Register Sidebars
function intimate_tales_register_sidebars() {
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'intimate-tales'),
        'id' => 'primary-sidebar',
        'description' => __('Main sidebar that appears on the left.', 'intimate-tales'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'intimate_tales_register_sidebars');

// Custom Excerpt Length
function intimate_tales_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'intimate_tales_custom_excerpt_length', 999);

// Custom Excerpt More
function intimate_tales_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'intimate_tales_custom_excerpt_more');
?>
```