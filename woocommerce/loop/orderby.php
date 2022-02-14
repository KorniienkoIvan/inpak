<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form class="woocommerce-ordering" method="get" style="display: none;">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
</form>
<?php 
if(get_locale() == 'uk'){
	$byPopularityLabel = 'за популярністю';
	$byPriceLabel = 'за зростанням ціни';
	$byPriceDescLabel = 'за зменшенням ціни';
	$byAlphabet = 'за алфавітом';
}
elseif(get_locale() == 'ru_RU'){
	$byPopularityLabel = 'по популярности';
	$byPriceLabel = 'по возрастанию цены';
	$byPriceDescLabel = 'по убыванию цены';
	$byAlphabet = 'по алфавиту';
}
else {
	$byPopularityLabel = 'по популярности';
	$byPriceLabel = 'по возрастанию цены';
	$byPriceDescLabel = 'по убыванию цены';
	$byAlphabet = 'по алфавиту';
}

$actual_link = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
?>


<style>
	.katalog .container .katalog-items .top-filter-row .filter-list .filter-list-item.price:before {
		content: "<?php echo $byPriceLabel; ?>";
	}
	.katalog .container .katalog-items .top-filter-row .filter-list .filter-list-item.price-desc:before {
		content: "<?php echo $byPriceDescLabel; ?>";
	}
</style>
<a href="<?php echo $actual_link ?>" class="popularity first filter-list-item"><?php echo $byPopularityLabel; ?></a>
<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
	<a href="<?php echo $actual_link . '?orderby=' . esc_attr( $id ) ?>" class="<?php echo esc_attr( $id ); ?> filter-list-item" id="<?php esc_attr( $id ) ?>"><?php echo esc_html( $name ); ?><?php echo $paged; ?></a>
<?php endforeach; ?>
<a href="<?php echo $actual_link . '?orderby=title' ?>" class="title filter-list-item"><?php echo $byAlphabet; ?></a>
<input type="hidden" name="paged" value="1" />
<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
<script>
	jQuery(document).ready(function(){
		jQuery('form.woocommerce-ordering option').each(function(){
			var currentElement = jQuery(this).attr('selected') == 'selected';
			if(currentElement == true) {
				return;
			}
		});	
	});
</script>
