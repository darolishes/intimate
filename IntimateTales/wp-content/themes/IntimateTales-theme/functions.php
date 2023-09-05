```php
<?php
// IntimateTales Theme Functions

// Enqueue Styles and Scripts
function intimateTales_enqueue_styles_scripts() {
    wp_enqueue_style('intimateTales-style', get_stylesheet_uri());
    wp_enqueue_style('intimateTales-responsive', get_template_directory_uri() . '/responsive.css');
    wp_enqueue_script('intimateTales-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'intimateTales_enqueue_styles_scripts');

// Register Navigation Menus
function intimateTales_register_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'intimateTales'),
        'footer-menu' => __('Footer Menu', 'intimateTales')
    ));
}
add_action('init', 'intimateTales_register_menus');

// Register Sidebar
function intimateTales_register_sidebar() {
    register_sidebar(array(
        'name' => __('Sidebar', 'intimateTales'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'intimateTales'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'intimateTales_register_sidebar');

// Add Theme Support
function intimateTales_add_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'intimateTales_add_theme_support');

// Include SEO Functions
require get_template_directory() . '/seo.php';

// Include Onboarding Functions
require get_template_directory() . '/onboarding.php';
?>
```