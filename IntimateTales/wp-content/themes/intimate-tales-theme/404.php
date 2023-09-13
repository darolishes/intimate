```php
<?php get_header(); ?>

<main id="main-content">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'intimate-tales-theme' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'intimate-tales-theme' ); ?></p>

            <?php get_search_form(); ?>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->
</main><!-- #main-content -->

<?php get_footer(); ?>
```