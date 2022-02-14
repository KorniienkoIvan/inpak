<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'col-6 col-lg-4 product', $product ); ?>>
	<?php 
	global $product;
	$koostis = $product->get_attribute( 'count-in-pack' );	
	?>
	<?php if(get_locale() == 'uk'){
		$outOfStockText = 'Немає в наявності';
		$outOfStockButton = 'Повідомити про наявність';
	}
	elseif(get_locale() == 'ru_RU'){
		$outOfStockText = 'Нет в наличии';
		$outOfStockButton = 'Сообщить о наличии';
	} 
	else {
		$outOfStockText = 'Немає в наявності';
		$outOfStockButton = 'Повідомити про наявність';
	}
	?>
	<a href="<?php the_permalink(  ) ?>">
		<div class="product-image">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		</div>
		<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
		<div class="product-data">
			<div class="product-info"><?php echo $koostis; ?></div>
			<div class="product-price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></div>
		</div>
		<div class="like-icon">

			<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?>
		</div>
		<div class="cart-icon">
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
		<div class="out-of-stock-label-wrapper"><span class="out-of-stock-label"><?php echo $outOfStockText; ?></span></div>
		<div class="out-of-stock-button-wrapper"><a href="<?php if(is_user_logged_in()){ echo get_permalink() . '?_yith_wcwtl_users_list=' . get_the_ID() . '&_yith_wcwtl_users_list-action=register';} ?>" class="button"><?php echo $outOfStockButton; ?></a></div> 
		<?php if(is_user_logged_in()): ?>
		<?php else: ?>
			<div class="yith-wcwtl-output" style="display:none;">
				<form method="post" action="<?php echo get_permalink() . '?_yith_wcwtl_users_list=' . get_the_ID() . '&_yith_wcwtl_users_list-action=register' ?>">
					<label for="yith-wcwtl-email">Адреса електронної пошти<input type="email" name="yith-wcwtl-email" id="yith-wcwtl-email"></label>
					<input type="submit" value="Повідомити про наявність" class="button alt">
				</form>
			</div>  
		<?php endif; ?>
	</a>
</div>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );



	

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	
	?>

