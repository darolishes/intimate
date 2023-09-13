```php
<?php get_header(); ?>

<main id="main-content">
    <section class="category-section">
        <header class="category-header">
            <h1 class="category-title"><?php single_cat_title(); ?></h1>
            <div class="category-description"><?php echo category_description(); ?></div>
        </header>

        <?php if (have_posts()) : ?>
            <div class="story-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer">
                            <span class="story-author"><?php the_author(); ?></span>
                            <span class="story-date"><?php the_date(); ?></span>
                            <span class="story-comments"><?php comments_number(); ?></span>
                        </footer>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php _e('Sorry, no stories were found in this category.', 'intimate-tales-theme'); ?></p>
        <?php endif; ?>
    </section>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
```