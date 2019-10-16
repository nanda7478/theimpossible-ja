<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<!-- <ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul> -->
  
	  <ul>
        <?php if(is_wc_endpoint_url('orders') || is_wc_endpoint_url('edit-account') ){ ?>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
        <a href="<?php echo site_url();?>/myaccount/">ライブラリ</a>
      </li>
    <?php } else { ?>
      <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard <?php if(is_account_page()){ echo 'is-active'; } ?>">
        <a href="<?php echo site_url();?>/myaccount/">ライブラリ</a>
      </li>
    <?php } ?>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders <?php if(is_wc_endpoint_url('orders')){ echo 'is-active'; }?>">
        <a href="<?php echo site_url();?>/myaccount/orders/">注文履歴</a>
      </li>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account <?php if(is_wc_endpoint_url('edit-account')){ echo 'is-active'; }?>">
        <a href="<?php echo site_url();?>/myaccount/edit-account/">アカウント詳細</a>
      </li>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
        <a href="<?php echo wp_logout_url(home_url('/myaccount'));?>">ログアウト</a>
      </li>
      </ul>
   

</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
