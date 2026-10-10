<?php
$services = get_posts(
    [
        'post_type'      => 'service',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]
);
?>

<section class="services" id="services">

    <div class="container">

        <div class="services__grid">

            <?php foreach ( $services as $post ) : ?>
                <?php setup_postdata( $post ); ?>

                <?php get_template_part( 'template-parts/components/service-card' ); ?>

            <?php endforeach; ?>

        </div>


        <button
            class="services__president-link"
            type="button"
            data-service="30"
            aria-controls="service-dialog"
            aria-haspopup="dialog"
        >

            <span
                class="services__president-icon"
                aria-hidden="true"
            >
                <img
                    src="<?php echo esc_url(
                        get_template_directory_uri() .
                        '/assets/images/megaphone-64.png'
                    ); ?>"
                    alt=""
                >
            </span>

            <span class="services__president-text">
                社長メッセージ
            </span>

            <span
                class="services__president-hand"
                aria-hidden="true"
            >
                <img
                    src="<?php echo esc_url(
                        get_template_directory_uri() .
                        '/assets/images/hand-64.png'
                    ); ?>"
                    alt=""
                >
            </span>

        </button>


        <div class="services__dialogs">

          	<dialog
				class="service-dialog"
				id="service-dialog"
				aria-labelledby="service-dialog-title"
			>
				<div class="service-dialog__close-bar">
					<button
						class="service-dialog__close"
						type="button"
						aria-label="閉じる"
					>
						×
					</button>
				</div>

				<div class="service-dialog__inner">
					<div class="service-dialog__loaded"></div>
				</div>
			</dialog>

        </div>

    </div>

</section>

<?php wp_reset_postdata(); ?>