<?php
/**
 * Front page template.
 *
 * @package Sun_Auto
 */

get_header();
?>

<main id="main-content">
    <?php get_template_part( 'template-parts/sections/hero' ); ?>
    <?php get_template_part( 'template-parts/sections/booking-cta' ); ?>
    <?php get_template_part( 'template-parts/sections/services' ); ?>
    <?php get_template_part( 'template-parts/sections/news' ); ?>
    <?php get_template_part( 'template-parts/sections/gallery' ); ?>
    <?php get_template_part( 'template-parts/sections/company' ); ?>
    <?php get_template_part( 'template-parts/sections/contact' ); ?>
</main>

<?php get_footer(); ?>
