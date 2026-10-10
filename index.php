<?php
/**
 * Main fallback template.
 *
 * @package Sun_Auto
 */

get_header();
?>

<main id="main-content" class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php get_template_part( 'template-parts/content/content', get_post_type() ); ?>
            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
