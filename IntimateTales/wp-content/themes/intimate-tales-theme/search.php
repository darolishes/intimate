```php
<?php get_header(); ?>

<main id="main-content">
    <section id="search">
        <div class="container">
            <h1><?php printf( __( 'Search Results for: %s', 'intimate-tales-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'intimate-tales-theme' ); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
```