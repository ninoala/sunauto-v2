<?php
/**
 * Site footer.
 *
 * @package Sun_Auto
 */
?>
<footer class="site-footer">

	<div class="site-footer__inner">

		<div class="site-footer__main">

			<div class="site-footer__brand">

				<a
					class="site-footer__brand-link"
					href="<?php echo esc_url( home_url( '/' ) ); ?>"
				>

					<div class="site-footer__brand-top">

						<div class="site-footer__logo">
							<img
								src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.webp' ); ?>"
								alt="サンオート株式会社 ロゴ"
							>
						</div>

						<div class="site-footer__brand-text-group">
							<p class="site-footer__brand-name">
								サンオート株式会社
							</p>
						</div>

					</div>

				</a>

				<p class="site-footer__brand-text">
					街の車のお医者さんとして、<br>
					お客様のカーライフをサポートします。
				</p>

			</div>


			<div class="site-footer__info">

				<h2 class="site-footer__heading">
					店舗情報
				</h2>

				<address class="site-footer__address">

					<p>新潟県見附市本所町370番地1</p>

					<p>
						<a href="tel:0258611212">
							0258-61-1212
						</a>
					</p>

					<p>
						<a href="mailto:sunautomitsuke@gmail.com">
							sunautomitsuke@gmail.com
						</a>
					</p>

				</address>

			</div>


			<div class="site-footer__hours">

				<h2 class="site-footer__heading">
					営業時間
				</h2>

				<div class="site-footer__hours-list">

					<div class="site-footer__hours-item">
						<span>月〜金曜日</span>
						<strong>8:30〜19:00</strong>
					</div>

					<div class="site-footer__hours-item">
						<span>土曜日</span>
						<strong>8:30〜18:00</strong>
					</div>

					<div class="site-footer__hours-item">
						<span>定休日</span>
						<strong>日曜日・祝日</strong>
					</div>

				</div>

			</div>

		</div>


		<nav
			class="site-footer__nav"
			aria-label="フッターナビゲーション"
		>
			<a href="#services">サービス</a>
			<a href="#news">お知らせ</a>
			<a href="#gallery">ギャラリー</a>
			<a href="#company">会社概要</a>
			<a href="#contact">お問い合わせ</a>
		</nav>


		<div class="site-footer__bottom">

			<p class="site-footer__copyright">
				&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> サンオート株式会社
			</p>

			<p class="site-footer__credit">
				Website by
				<a
					href="https://ninoweb.net"
					target="_blank"
					rel="noopener noreferrer"
				>
					NinoWeb
				</a>
			</p>

		</div>

	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
