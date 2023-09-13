```php
<?php get_header(); ?>

<main id="main-content">
    <section class="tag-page">
        <header class="page-header">
            <h1 class="page-title">
                <?php single_tag_title('Tag: '); ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>
            <div class="tag-stories">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                        </header>

                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p><?php _e('Sorry, no stories tagged with this tag.', 'intimate-tales-theme'); ?></p>
        <?php endif; ?>
    </section>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
```