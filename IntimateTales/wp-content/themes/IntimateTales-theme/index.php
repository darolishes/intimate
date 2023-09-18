```php
<?php get_header(); ?>

<main id="main-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php if (comments_open() || get_comments_number()) : comments_template(); endif; ?>

        </article>

    <?php endwhile; else : ?>

        <article>
            <h1><?php _e('Sorry, no posts were found.', 'intimatetales-theme'); ?></h1>
        </article>

    <?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
```