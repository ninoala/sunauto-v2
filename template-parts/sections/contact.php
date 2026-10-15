<section class="contact" id="contact">

	<div class="container">

		<header class="contact__header">

			<h2 class="contact__title">
				お問い合わせ
			</h2>

			<span
				class="contact__divider"
				aria-hidden="true"
			></span>

		</header>


		<div class="contact__content">

			<div class="contact__map">
            
				<iframe
					class="contact__map-frame"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3163.7747727672668!2d138.90445449999999!3d37.5368062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5ff503d0eb32492b%3A0x7184dc903ac3e405!2s370-1%20Honjomachi%2C%20Mitsuke%2C%20Niigata%20954-0000%2C%20Japan!5e0!3m2!1sen!2sca!4v1789740524788!5m2!1sen!2sca"
					loading="lazy"
					fetchpriority="low"
					referrerpolicy="no-referrer-when-downgrade"
					allowfullscreen
					title="サンオート株式会社へのアクセス"
				></iframe>

			</div>


			<div class="contact__form-card">

				<div class="contact__form-heading">

					<h3 class="contact__form-title">
						お気軽にお問い合わせください
					</h3>

					<p class="contact__form-intro">
						お車に関するご相談・ご質問など、お気軽にお問い合わせください。
					</p>

				</div>


				<form
					class="contact-form"
					action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
					method="post"
				>

					<input
						type="hidden"
						name="action"
						value="sun_auto_contact"
					>

					<?php wp_nonce_field( 'sun_auto_contact', 'sun_auto_contact_nonce' ); ?>


					<div class="contact-form__row">

						<div class="contact-form__field">

							<label
								class="contact-form__label"
								for="contact-name"
							>
								お名前
								<span class="contact-form__required">
									必須
								</span>
							</label>

							<input
								class="contact-form__input"
								id="contact-name"
								name="name"
								type="text"
								autocomplete="name"
								required
							>

						</div>


						<div class="contact-form__field">

							<label
								class="contact-form__label"
								for="contact-email"
							>
								メールアドレス
								<span class="contact-form__required">
									必須
								</span>
							</label>

							<input
								class="contact-form__input"
								id="contact-email"
								name="email"
								type="email"
								autocomplete="email"
								pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
								required
							>

						</div>

					</div>


					<div class="contact-form__field">

						<label
							class="contact-form__label"
							for="contact-subject"
						>
							件名
						</label>

						<input
							class="contact-form__input"
							id="contact-subject"
							name="subject"
							type="text"
						>

					</div>


					<div class="contact-form__field">

						<label
							class="contact-form__label"
							for="contact-message"
						>
							メッセージ
							<span class="contact-form__required">
								必須
							</span>
						</label>

						<textarea
							class="contact-form__textarea"
							id="contact-message"
							name="message"
							rows="6"
							required
						></textarea>

					</div>


					<div
						class="contact-form__honeypot"
						aria-hidden="true"
					>
						<label for="contact-website">
							Website
						</label>

						<input
							id="contact-website"
							name="website"
							type="text"
							tabindex="-1"
							autocomplete="off"
						>
					</div>


					<button
						class="contact-form__submit"
						type="submit"
					>
						<span>
							送信する
						</span>

						<span aria-hidden="true">
							→
						</span>
					</button>

					<p
						class="contact-form__status"
						role="status"
						aria-live="polite"
					></p>

				</form>

			</div>

		</div>

	</div>

</section>