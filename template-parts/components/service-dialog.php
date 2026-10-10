<?php
$service_id = get_the_ID();
?>

<dialog
	class="service-dialog service-dialog--<?php echo esc_attr( $service_id ); ?>"
	id="service-<?php echo esc_attr( $service_id ); ?>"
>

	<div class="service-dialog__close-bar">

		<button
			class="service-dialog__close"
			type="button"
			aria-label="Close"
		>
			×
		</button>

	</div>

	<div class="service-dialog__inner">

		<h2 class="service-dialog__title">
			<?php the_title(); ?>
		</h2>

		<div class="service-dialog__body">

			<?php if ( has_post_thumbnail() ) : ?>

				<div class="service-dialog__visual">

					<?php
					the_post_thumbnail(
						'medium',
						[
							'class' => 'service-dialog__image',
							'alt'   => '',
						]
					);
					?>

				</div>

			<?php endif; ?>

			<div class="service-dialog__content">
				<?php the_content(); ?>
			</div>

		</div>

	</div>

</dialog>