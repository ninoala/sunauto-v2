<section class="gallery" id="gallery">

	<div class="container">

		<header class="gallery__header">

			<h2 class="gallery__title">
				ギャラリー
			</h2>

			<span
				class="gallery__divider"
				aria-hidden="true"
			></span>

		</header>


		<div class="gallery__grid">

			<?php for ( $i = 1; $i <= 6; $i++ ) : ?>

				<div class="gallery__item gallery__item--<?php echo esc_attr( $i ); ?>">

					<img
						class="gallery__image"
						src="<?php echo esc_url(
							get_template_directory_uri() .
							'/assets/images/gallery/gallery-' .
							$i .
							'.webp'
						); ?>"
						alt=""
						loading="lazy"
					>

				</div>

			<?php endfor; ?>

		</div>

	</div>

</section>