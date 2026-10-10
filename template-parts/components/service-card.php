<article class="service-card">

	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		the_post_thumbnail(
			'service-card-icon',
			[
				'class'    => 'service-card__icon',
				'alt'      => '',
				'loading'  => 'lazy',
				'decoding' => 'async',
				'sizes'    => '95px',
			]
		);
		?>
	<?php endif; ?>

	<h3 class="service-card__title">
		<?php the_title(); ?>
	</h3>

	<button
		class="service-card__button"
		type="button"
		data-service="<?php echo esc_attr( get_the_ID() ); ?>"
		aria-controls="service-dialog"
	>
		詳細を見る
		<span aria-hidden="true">→</span>
	</button>

</article>