
<?php
/**
 * Site footer.
 *
 * @package Sun_Auto
 */

$homepage_id = (int) get_option( 'page_on_front' );

// Company information from ACF.
$company_name    = get_field( 'company_name', $homepage_id );
$company_address = get_field( 'company_address', $homepage_id );
$company_phone   = get_field( 'company_phone', $homepage_id );
$company_email   = get_field( 'company_email', $homepage_id );
$business_hours  = get_field( 'business_hours', $homepage_id );
$closed_days     = get_field( 'closed_days', $homepage_id );

// Format phone number for tel: links.
$phone_href = preg_replace(
    '/[^0-9+]/',
    '',
    $company_phone ?: ''
);

// Split business hours into separate lines.
$hours_lines = preg_split(
    '/\r\n|\r|\n/',
    trim( $business_hours ?: '' )
);
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
                                alt="<?php echo esc_attr( $company_name . ' ロゴ' ); ?>"
                            >
                        </div>

                        <div class="site-footer__brand-text-group">
                            <p class="site-footer__brand-name">
                                <?php echo esc_html( $company_name ); ?>
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

                    <p>
                        <?php echo nl2br( esc_html( $company_address ?: '' ) ); ?>
                    </p>

                    <p>
                        <a href="tel:<?php echo esc_attr( $phone_href ); ?>">
                            <?php echo esc_html( $company_phone ); ?>
                        </a>
                    </p>

                    <p>
                        <a href="mailto:<?php echo esc_attr( $company_email ); ?>">
                            <?php echo esc_html( $company_email ); ?>
                        </a>
                    </p>

                </address>

            </div>


            <div class="site-footer__hours">

                <h2 class="site-footer__heading">
                    営業時間
                </h2>

                <div class="site-footer__hours-list">

                    <?php foreach ( $hours_lines as $line ) : ?>

                        <?php
                        $line = trim( $line );

                        if ( $line === '' ) {
                            continue;
                        }

                        // Separate day label from time range.
                        if ( preg_match(
                            '/^(.*?)\s+([0-9０-９]{1,2}[:：][0-9０-９]{2}\s*[～〜~-]\s*[0-9０-９]{1,2}[:：][0-9０-９]{2})$/u',
                            $line,
                            $matches
                        ) ) {
                            $day_label = $matches[1];
                            $time_range = $matches[2];
                        } else {
                            $day_label = $line;
                            $time_range = '';
                        }
                        ?>

                        <div class="site-footer__hours-item">
                            <span><?php echo esc_html( $day_label ); ?></span>
                            <strong><?php echo esc_html( $time_range ); ?></strong>
                        </div>

                    <?php endforeach; ?>

                    <div class="site-footer__hours-item">
                        <span>定休日</span>
                        <strong>
                            <?php echo esc_html( $closed_days ); ?>
                        </strong>
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
                &copy; <?php echo esc_html( wp_date( 'Y' ) ); ?>
                <?php echo esc_html( $company_name ); ?>
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
