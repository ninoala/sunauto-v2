<?php
/**
 * Standard page template.
 *
 * @package Sun_Auto
 */

get_header();
?>

<main id="main-content" class="section">
    <div class="container content-narrow">
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <article <?php post_class( 'entry' ); ?>>
                <header class="entry__header">
                    <?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
                </header>
                <div class="entry__content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
