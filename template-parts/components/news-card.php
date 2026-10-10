<?php
$content = get_the_content();

$has_content = trim(
	wp_strip_all_tags(
		strip_shortcodes( $content )
	)
) !== '';

$has_image = has_post_thumbnail();

$card_classes = [
	'news-card',
];

if ( $has_content && $has_image ) {
	$card_classes[] = 'news-card--with-content';
} elseif ( $has_image ) {
	$card_classes[] = 'news-card--image-only';
} elseif ( $has_content ) {
	$card_classes[] = 'news-card--text-only';
}
?>

<article class="<?php echo esc_attr( implode( ' ', $card_classes ) ); ?>">

	<div class="news-card__top">

		<time
			class="news-card__date"
			datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
		>
			<span class="news-card__date-year">
				<?php echo esc_html( get_the_date( 'Y年' ) ); ?>
			</span>

			<span class="news-card__date-day">
				<?php echo esc_html( get_the_date( 'm月d日' ) ); ?>
			</span>
		</time>

		<h3 class="news-card__title">
			<?php the_title(); ?>
		</h3>

	</div>


	<?php if ( $has_content || $has_image ) : ?>

		<div class="news-card__body">

			<?php if ( $has_content ) : ?>

				<div class="news-card__content">
					<?php the_content(); ?>
				</div>

			<?php endif; ?>


			<?php if ( $has_image ) : ?>

				<figure class="news-card__figure">

					<?php
					the_post_thumbnail(
						'news-card-image',
						[
							'class' => 'news-card__image',
							'alt'   => '',
						]
					);
					?>

				</figure>

			<?php endif; ?>

		</div>

	<?php endif; ?>

</article>