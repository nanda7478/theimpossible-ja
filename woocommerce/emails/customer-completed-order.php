<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer last name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_last_name() ) ); ?></p>
<?php /* translators: %s: Site title */ ?>
<p><?php printf( esc_html__( 'Your %s order has been marked complete on our side.', 'woocommerce' ), esc_html( wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES ) ) ); ?></p>

<h2>発送について</h2>
<?php
	       $method = get_post_meta( $order->id, "j_shipping_method", true );
	       $tracking = get_post_meta( $order->id, "j_tracking_number", true );
	       $trackurl = 'https://trackings.post.japanpost.jp/services/srv/search/direct?locale=ja&reqCodeNo1=';
	       $company = '日本郵便';
	        echo '<p><strong>発送方法 :</strong>'. $method .'<br/>
	               <strong>追跡番号 :</strong>'. $tracking .'</p>
	               <p><a href="'. $trackurl . $tracking.'">⇒クリックすると'. $company .'の荷物追跡ページが開きます</a></p>';
	?>

<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

?>
<p>
<?php esc_html_e( 'Thanks for shopping with us.', 'woocommerce' ); ?>
</p>
<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
