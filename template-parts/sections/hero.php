<section class="hero section">
    <div class="hero__panels">
            <div class="hero__panel hero__panel--1"></div>
            <div class="hero__panel hero__panel--2"></div>
            <div class="hero__panel hero__panel--3"></div>
            <div class="hero__panel hero__panel--4"></div>
            <div class="hero__panel hero__panel--5"></div>
        </div>

        <div class="hero__content">

            <img
                class="hero__logo"
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.webp'); ?>"
                alt="サンオート"
            >

            <div class="animated-image">

        <div class="animated-image__car-container">

            <img
                src="<?php echo get_theme_file_uri('assets/images/car-no-wheels.webp'); ?>"
                alt="Image of a car"
                class="animated-image__car"
            >

            <img
                src="<?php echo get_theme_file_uri('assets/images/wheel-front.webp'); ?>"
                alt="Front wheel of a car"
                class="animated-image__wheel-front"
            >

            <img
                src="<?php echo get_theme_file_uri('assets/images/wheel-back.webp'); ?>"
                alt="Back wheel of a car"
                class="animated-image__wheel-back"
            >

        </div>

       <?php
        $hero_running_text = function_exists( 'get_field' )
            ? get_field( 'hero_running_text' )
            : '';
        ?>

        <?php if ( $hero_running_text ) : ?>
            <span class="animated-image__text">
                <?php echo esc_html( $hero_running_text ); ?>
            </span>
        <?php endif; ?>

</section>