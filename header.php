<?php
/**
 * Site header.
 *
 * @package Sun_Auto
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        rel="preload"
        href="<?php echo esc_url(
            get_template_directory_uri() . '/assets/images/hero.webp'
        ); ?>"
        as="image"
        type="image/webp"
        fetchpriority="high"
    >

    <script>
        (function(d) {
            var config = {
                kitId: 'qok0jaj',
                scriptTimeout: 3000,
                async: true
            },
            h = d.documentElement,
            t = setTimeout(function() {
                h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
            }, config.scriptTimeout),
            tk = d.createElement("script"),
            f = false,
            s = d.getElementsByTagName("script")[0],
            a;

            h.className += " wf-loading";

            tk.src = "https://use.typekit.net/" + config.kitId + ".js";
            tk.async = true;

            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;

                if (f || a && a != "complete" && a != "loaded") return;

                f = true;
                clearTimeout(t);

                try {
                    Typekit.load(config);
                } catch (e) {}
            };

            s.parentNode.insertBefore(tk, s);
        })(document);
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php esc_html_e( 'Skip to content', 'sun-auto' ); ?>
</a>

<header class="site-header" id="site-header">
    <div class="container site-header__inner">
        <div class="site-header__brand">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <nav class="site-nav" aria-label="メインナビゲーション">
            <ul class="site-nav__list">
                <li><a href="#home">ホーム</a></li>
                <li><a href="#services">サービス内容の紹介</a></li>
                <li><a href="#news">お知らせ</a></li>
                <li><a href="#contact">お問い合わせ</a></li>
                <li>
                    <button
                        class="site-nav__link"
                        type="button"
                        data-service="30"
                        aria-controls="service-30"
                        aria-haspopup="dialog"
                    >
                        社長メッセージ
                    </button>
                </li>
                <li><a href="#company">会社概要</a></li>
            </ul>
        </nav>
    </div>
</header>
