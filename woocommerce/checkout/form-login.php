<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>
<div class="woocommerce-form-login-toggle">
	<?php wc_print_notice( apply_filters( 'woocommerce_checkout_login_message', __( ' ', 'woocommerce' ) ) . ' <a href="#" class="showlogin">' . __( '会員の方はクリックしてログインしてください', 'woocommerce' ) . '</a>', 'notice' ); ?>
</div>
<?php

woocommerce_login_form(
	array(
		'message'  => __( '以前に私たちと買い物をしたことがある場合は、以下に詳細を入力してください. 新規のお客様の場合は、請求とアンプに進んでください。配送セクション.', 'woocommerce' ),
		'redirect' => wc_get_page_permalink( 'checkout' ),
		'hidden'   => true,
	)
);
