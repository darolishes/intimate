```php
<?php
/**
 * The template for displaying the home page
 *
 * @package WordPress
 * @subpackage IntimateTales
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <section id="login-form">
        <?php
        if (!is_user_logged_in()) {
            echo do_shortcode('[login_form]'); // Replace with your login form shortcode
        } else {
            echo '<p>Welcome back, ' . wp_get_current_user()->user_login . '</p>';
        }
        ?>
    </section>

    <section id="story-container">
        <?php
        $args = array(
            'post_type' => 'story',
            'posts_per_page' => 5,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/content', get_post_format());
            }
        } else {
            echo '<p>No stories found.</p>';
        }
        wp_reset_postdata();
        ?>
    </section>

    <section id="category-container">
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<div class="category">';
            echo '<h2>' . $category->name . '</h2>';
            echo '<p>' . $category->description . '</p>';
            echo '<a href="' . get_category_link($category->term_id) . '">View Stories</a>';
            echo '</div>';
        }
        ?>
    </section>
</main>

<?php get_footer(); ?>
```