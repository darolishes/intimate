```php
<?php get_header(); ?>

<main id="main-content">
    <section class="archive-section">
        <header class="archive-header">
            <?php
            the_archive_title('<h1 class="archive-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="archive-posts">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', get_post_format());
                endwhile;
                ?>
            </div>

            <?php the_posts_navigation(); ?>

        <?php else : ?>
            <div class="no-posts">
                <p><?php _e('Sorry, no posts matched your criteria.', 'intimate-tales-theme'); ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
```