<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => -1,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() ),
) ) );
?>
<div style="display: none;">
<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>

<p><?php
	printf(
		__( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
?></p>
</div>
<?php
	if(isset($customer_orders)){
?>
<table class="shop_table shop_table_responsive my_account_orders">

		<thead>
			<tr>
				<th>商品名</th>
				<th>ダウンロード</th>
				<th>再生</th>
				
			</tr>
			

		</thead>
		<?php
		if(isset($customer_orders)){
foreach ( $customer_orders as $customer_order ) {
           $order = wc_get_order( $customer_order->ID );
            $items = $order->get_items();
            foreach ( $items as $item ) {
            $product_id = $item->get_product_id();
            $product_ids[] = $product_id;
        }
}
}
		?>

		<tbody>
			   <?php
			   if(isset($product_ids)){
                    foreach ($product_ids as  $value) {
                    	$productdata = wc_get_product($value);
					 ?>
			   <?php $video_section =  get_field('add_video_demo_url',$value); ?>
			   <?php
				if($video_section)
				  {
				?>
				<tr class="order">
					
						<td>
							
							<?php 
							 echo $productdata->name;
							?>
							
						</td>
						<td>
							<?php 
							  
							  if($video_section)
							  {
								     echo '<a href="'.$video_section.'" class="donwlod-icons" alt="Download" title="Download"> <img src="http://theimpossibleco.com/ja/wp-content/themes/theimpossibleco-ja/images/iconfinder_download2_172461.png" alt="Download"> </a>';    
							  } ?> 

								</td>    
								<td>                          
								<?php
							    if($video_section){
                                 ?>
                                 <a href="<?php echo site_url();?>/videoplay/?video_id=<?php echo $value;?>" id="openvideop" class="plays-icon" title="Play" alt="Play">  <img src="http://theimpossibleco.com/ja/wp-content/themes/theimpossibleco-ja/images/iconfinder_play_1894657.png" alt="Play">  </a>
    
						     <!-- <div  id="video">
						     	<div  class="videoinner">

							   <iframe id="frame177444"  src="<?php echo $video_section; ?>" width="700" height="390" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>				 
						</div>
						</div> -->
                                 <?php
							    } 
							?>

							
						</td>
					
				</tr>
				<?php } ?>
			<?php  } } ?>
			
		</tbody>
	</table>

<?php
}
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
