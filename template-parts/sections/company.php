
<?php
/**
 * Company Profile.
 *
 * @package Sun_Auto
 */

$homepage_id = (int) get_option( 'page_on_front' );

$company_name           = get_field( 'company_name', $homepage_id );
$company_representative = get_field( 'representative_name', $homepage_id );
$company_address        = get_field( 'company_address', $homepage_id );
$company_phone          = get_field( 'company_phone', $homepage_id );
$company_fax            = get_field( 'company_fax', $homepage_id );
$company_email          = get_field( 'company_email', $homepage_id );
$company_hours          = get_field( 'business_hours', $homepage_id );
$company_closed         = get_field( 'closed_days', $homepage_id );
$company_established    = get_field( 'established_date', $homepage_id );
$company_services       = get_field( 'business_description', $homepage_id );
$company_capital        = get_field( 'capital', $homepage_id );
$company_technicians    = get_field( 'employee_count', $homepage_id );
$company_payments       = get_field( 'payment_methods', $homepage_id );

$phone_href = preg_replace(
    '/[^0-9+]/',
    '',
    $company_phone ?? ''
);
?>

<section class="company" id="company">

    <div class="container">

        <header class="company__header">

            <h2 class="company__title">
                会社概要
            </h2>

            <span
                class="company__divider"
                aria-hidden="true"
            ></span>

        </header>

        <div class="company__panel">

            <dl class="company__column">

                <div class="company__item">
                    <dt class="company__label">社名</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_name ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">代表取締役</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_representative ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">所在地</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_address ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">電話番号</dt>
                    <dd class="company__value">
                        <?php if ( $company_phone ) : ?>
                            <a href="tel:<?php echo esc_attr( $phone_href ); ?>">
                                <?php echo esc_html( $company_phone ); ?>
                            </a>
                        <?php endif; ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">FAX番号</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_fax ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">E-mail</dt>
                    <dd class="company__value">
                        <?php if ( $company_email ) : ?>
                            <a href="mailto:<?php echo esc_attr( $company_email ); ?>">
                                <?php echo esc_html( $company_email ); ?>
                            </a>
                        <?php endif; ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">営業時間</dt>
                    <dd class="company__value">
                        <?php echo nl2br( esc_html( $company_hours ?? '' ) ); ?>
                    </dd>
                </div>

            </dl>

            <dl class="company__column">

                <div class="company__item">
                    <dt class="company__label">定休日</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_closed ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">設立年月日</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_established ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">業務内容</dt>
                    <dd class="company__value">
                        <?php echo nl2br( esc_html( $company_services ?? '' ) ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">資本金</dt>
                    <dd class="company__value">
                        <?php echo esc_html( $company_capital ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">整備資格者数</dt>
                    <dd class="company__value">
                        <?php echo nl2br( esc_html( $company_technicians ?? '' ) ); ?>
                    </dd>
                </div>

                <div class="company__item">
                    <dt class="company__label">決済方法</dt>
                    <dd class="company__value">
                        <?php echo nl2br( esc_html( $company_payments ?? '' ) ); ?>
                    </dd>
                </div>

            </dl>

        </div>

    </div>

</section>
