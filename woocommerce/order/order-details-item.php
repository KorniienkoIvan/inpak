<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>
<div class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'woocommerce-table__line-item order_item row', $item, $order ) ); ?>">

		<?php
		$is_visible        = $product && $product->is_visible();
		$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
		//$product_image = $product->get_image();
		$product_name = $item->get_name();
		$product_price = $product->get_price_html();
		$product_count = $item->get_quantity();
		$sub_total = $order->get_formatted_order_total( $item );
	
	
		$product   = $item->get_product(); // Get the WC_Product object (from order item)
        $product_image = $product->get_image(array( 36, 36)); // Get the product thumbnail (from product object)
		?>
		<div class="col-md-5 col-12 product-name--image-wrapper">
			<div class="product-image">
				<?php echo $product_image; ?>
			</div>
			<div class="product-name">
				<?php echo $product_name; ?>
			</div>
		</div>
		<div class="col-1 item_prce">
			<?php echo $product_price; ?>
		</div>
		<div class="col-1 quantity">
			<?php echo $product_count . ' шт'; ?>
		</div>
		<div class="col-1 subtotal">
			<?php echo $sub_total ?>
		</div>
		<div class="col-4 product-details-button-wrapper">
			<div class="button"><a href="<?php //echo wp_nonce_url( add_query_arg( 'order_again', $order->get_id(), wc_get_cart_url() ), 'woocommerce-order_again' ); ?>">Повторити замовлення</a></div>
		</div>
</div>

<div class="mobile_product_data_wrapper row">
	<div class="col-4 mobile_product_data">
		<div class="mobile_product_data_title">
			<?php _e('Ціна:') ?>
		</div>
		<div class="mobile_product_data_content">
			<?php echo $product_price; ?>
		</div>
	</div>
	<div class="col-4 mobile_product_data">
		<div class="mobile_product_data_title">
			<?php _e('Кількість:') ?>
		</div>
		<div class="mobile_product_data_content">
			<?php echo $product_count . ' шт'; ?>
		</div>
	</div>
	<div class="col-4 mobile_product_data">
		<div class="mobile_product_data_title">
			<?php _e('Сумма:') ?>
		</div>
		<div class="mobile_product_data_content">
			<?php echo $sub_total; ?>
		</div>
	</div>
</div>
