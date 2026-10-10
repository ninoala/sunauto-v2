<?php
/**
 * 404 template.
 *
 * @package Sun_Auto
 */

get_header();
?>

<main id="main-content" class="error-404">
    <div class="error-404__inner">

        <p class="error-404__code">
            404
        </p>

        <h1 class="error-404__title">
            お探しのページが見つかりません
        </h1>

        <p class="error-404__text">
            ページが移動または削除された可能性があります。
        </p>

        <a
            class="error-404__button"
            href="<?php echo esc_url( home_url( '/' ) ); ?>"
        >
            ホームへ戻る
        </a>

    </div>
</main>

<?php get_footer(); ?>