<?php
/**
 * Theme functions.
 *
 * @package Sun_Auto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 */
function sun_auto_setup(): void {

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

    add_image_size(
        'service-card-icon',
        190,
        190,
        false
    );

    add_image_size(
        'news-card-image',
        640,
        0,
        false
    );

	add_theme_support(
		'html5',
		[
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		]
	);
}
add_action( 'after_setup_theme', 'sun_auto_setup' );


/**
 * Enqueue theme assets.
 */
function sun_auto_enqueue_assets(): void {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'sun-auto-style',
		get_stylesheet_uri(),
		[],
		$version
	);

	wp_enqueue_script(
		'sun-auto-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'sun_auto_enqueue_assets' );

/**
 * Register Service custom post type.
 */
function sun_auto_register_service_post_type(): void {

	$labels = [
		'name'               => 'サービス',
		'singular_name'      => 'サービス',
		'menu_name'          => 'サービス',
		'name_admin_bar'     => 'サービス',
		'add_new'            => '新規追加',
		'add_new_item'       => '新しいサービスを追加',
		'edit_item'          => 'サービスを編集',
		'new_item'           => '新しいサービス',
		'view_item'          => 'サービスを表示',
		'search_items'       => 'サービスを検索',
		'not_found'          => 'サービスが見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱にサービスはありません。',
		'all_items'          => 'サービス一覧',
	];

	register_post_type(
		'service',
		[
			'labels'             => $labels,

			'public'             => false,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'publicly_queryable' => false,

			'menu_icon'          => 'dashicons-car',
			'menu_position'      => 20,

			'supports'           => [
				'title',
				'editor',
				'thumbnail',
				'page-attributes',
			],

			'has_archive'        => false,
		]
	);
}
add_action( 'init', 'sun_auto_register_service_post_type' );

/**
 * REST for service dialogues
 */

add_action( 'rest_api_init', function () {
    register_rest_route(
        'sun-auto/v1',
        '/service/(?P<id>\d+)',
        [
            'methods'             => 'GET',
            'callback'            => 'sun_auto_get_service_dialog',
            'permission_callback' => '__return_true',
        ]
    );
} );

function sun_auto_get_service_dialog( WP_REST_Request $request ) {
    $service_id = absint( $request['id'] );
    $service    = get_post( $service_id );

    if (
        ! $service ||
        'service' !== $service->post_type ||
        'publish' !== $service->post_status
    ) {
        return new WP_Error(
            'service_not_found',
            'Service not found.',
            [ 'status' => 404 ]
        );
    }

    $title = get_the_title( $service_id );

    $image = '';

    if ( has_post_thumbnail( $service_id ) ) {
        $image = get_the_post_thumbnail(
            $service_id,
            'medium',
            [
                'class' => 'service-dialog__image',
                'alt'   => '',
            ]
        );
    }

    $content = apply_filters(
        'the_content',
        $service->post_content
    );

    ob_start();
    ?>

    <h2
        class="service-dialog__title"
        id="service-dialog-title"
    >
        <?php echo esc_html( $title ); ?>
    </h2>

    <div class="service-dialog__body">

        <?php if ( $image ) : ?>
            <div class="service-dialog__visual">
                <?php echo $image; ?>
            </div>
        <?php endif; ?>

        <div class="service-dialog__content">
            <?php echo $content; ?>
        </div>

    </div>

    <?php

    return [
        'id'   => $service_id,
        'html' => ob_get_clean(),
    ];
}

add_filter( 'get_custom_logo', function ( $html ) {
    $html = str_replace(
        'class="custom-logo-link"',
        'class="custom-logo-link" aria-label="サンオート ホーム"',
        $html
    );

    return $html;
} );

// ======================================================
// Contact Form
// ======================================================

add_action(
    'admin_post_nopriv_sun_auto_contact',
    'sun_auto_handle_contact'
);

add_action(
    'admin_post_sun_auto_contact',
    'sun_auto_handle_contact'
);


function sun_auto_handle_contact() {

    // --------------------------------------------------
    // Nonce
    // --------------------------------------------------

    $nonce = isset( $_POST['sun_auto_contact_nonce'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['sun_auto_contact_nonce'] )
        )
        : '';

    if (
        ! $nonce ||
        ! wp_verify_nonce(
            $nonce,
            'sun_auto_contact'
        )
    ) {
        wp_send_json_error(
            [
                'message' => '送信に失敗しました。ページを再読み込みして、もう一度お試しください。',
            ],
            403
        );
    }


    // --------------------------------------------------
    // Honeypot
    // --------------------------------------------------

    $website = isset( $_POST['website'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['website'] )
        )
        : '';

    if ( $website !== '' ) {

        // Pretend submission succeeded for bots.
        wp_send_json_success(
            [
                'message' => 'お問い合わせを送信しました。',
            ]
        );
    }


    // --------------------------------------------------
    // Form Data
    // --------------------------------------------------

    $name = isset( $_POST['name'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['name'] )
        )
        : '';

    $email = isset( $_POST['email'] )
        ? sanitize_email(
            wp_unslash( $_POST['email'] )
        )
        : '';

    $subject = isset( $_POST['subject'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['subject'] )
        )
        : '';

    $message = isset( $_POST['message'] )
        ? sanitize_textarea_field(
            wp_unslash( $_POST['message'] )
        )
        : '';


    // --------------------------------------------------
    // Validation
    // --------------------------------------------------

    if (
        $name === '' ||
        $message === '' ||
        ! is_email( $email )
    ) {
        wp_send_json_error(
            [
                'message' => '必須項目をご確認ください。',
            ],
            400
        );
    }


    // --------------------------------------------------
    // Email
    // --------------------------------------------------

    $recipient = 'yegor.nino@gmail.com';

    $mail_subject = $subject !== ''
        ? '【サンオート】' . $subject
        : '【サンオート】Webサイトからのお問い合わせ';


    $mail_body =
        "Webサイトからお問い合わせがありました。\n\n" .
        "お名前: {$name}\n" .
        "メールアドレス: {$email}\n" .
        '件名: ' . (
            $subject !== ''
                ? $subject
                : '（未入力）'
        ) .
        "\n\n" .
        "メッセージ:\n{$message}\n";


    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf(
            'Reply-To: %s <%s>',
            $name,
            $email
        ),
    ];


    $sent = wp_mail(
        $recipient,
        $mail_subject,
        $mail_body,
        $headers
    );


    // --------------------------------------------------
    // Response
    // --------------------------------------------------

    if ( ! $sent ) {
        wp_send_json_error(
            [
                'message' => '送信できませんでした。しばらくしてからもう一度お試しください。',
            ],
            500
        );
    }


    wp_send_json_success(
        [
            'message' => 'お問い合わせありがとうございます。送信が完了しました。',
        ]
    );
}