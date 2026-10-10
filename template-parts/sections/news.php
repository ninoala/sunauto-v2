<?php
$news_query = new WP_Query(
	[
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 4,
		'ignore_sticky_posts' => true,
	]
);
?>

<?php if ( $news_query->have_posts() ) : ?>

	<section class="news" id="news">

		<div class="container">

			<header class="news__header">

				<h2 class="news__title">
					お知らせ
				</h2>

				<span
					class="news__divider"
					aria-hidden="true"
				></span>

			</header>

			<div class="news__list">

				<?php while ( $news_query->have_posts() ) : ?>
					<?php $news_query->the_post(); ?>

					<?php
					get_template_part(
						'template-parts/components/news-card'
					);
					?>

				<?php endwhile; ?>

			</div>

		</div>

	</section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>