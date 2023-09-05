```php
<?php get_header(); ?>

<div id="category-container">
    <?php if (have_posts()) : ?>
        <h1><?php single_cat_title(); ?></h1>
        <?php while (have_posts()) : the_post(); ?>
            <div class="story-item">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                </a>
                <p><?php the_excerpt(); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Keine Geschichten in dieser Kategorie.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
```