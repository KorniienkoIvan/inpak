<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php echo get_template_part('template-parts/breadcrumbs') ?>
<?php if(get_locale() == 'uk'){
	$priceLabel = 'Ціна';
	$descriptionLabel = 'Опис:';
	$productSliderTitle = 'З цим товаром купують';
	$addToCartButtonLabel = 'Додати у кошик';
	$mobileAddToCartButtonLabel = 'У кошик';
	$quantityLabel = 'Кількість';
}
elseif(get_locale() == "ru_RU"){
	$priceLabel = 'Цена';
	$descriptionLabel = 'Описание:';
	$productSliderTitle = 'С этим товаром покупают';
	$addToCartButtonLabel = 'Добавить в корзину';
	$mobileAddToCartButtonLabel = 'В корзину';
	$quantityLabel = 'Количество';
}
else {
	$priceLabel = 'Ціна';
	$descriptionLabel = 'Опис:';
	$productSliderTitle = 'З цим товаром купують';
	$addToCartButtonLabel = 'Додати у кошик';
	$mobileAddToCartButtonLabel = 'У кошик';
	$quantityLabel = 'Кількість';
}
?>
<style>
	.product-page.sale .container .product-page-right-col .product-page-data-wrapper .product-page-data div.price p.price del > span::before,
	.product-page.sale .container .product-page-right-col .product-page-data-wrapper .product-page-data div.price p.price ins > span::before {
		content: "<?php echo $priceLabel; ?>";
	}
	.product-page .container .product-page-right-col .product-page-data .add-to-cart-button form .quantity:before{
		content: "<?php echo $quantityLabel; ?>";
		left: <?php if(get_locale() == 'uk'){echo '38px';}elseif(get_locale() == 'ru_RU'){echo '31px';} else {echo '38px';}?>
	}
	<?php if(get_locale() == "ru_RU"): ?>
		@media(max-width:768px){
			.product-page .container .product-page-right-col .product-page-data-wrapper .product-page-data .add-to-cart-button form .quantity:before{
				left: 14px;
			}
		}
	<?php endif; ?>
</style>

<section id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-page', $product ); ?>>
    <div class="container">
        <div class="row">
			<div class="col-4 product-page-left-col">
				<?php do_action( 'product_image' ); ?>
			</div>
			<div class="col-md-8 col-12 product-page-right-col">
                <div class="product-page-data-wrapper">
                    <div class="product-page-data">
                        <?php do_action('product_title'); ?>
						<?php 
							do_action('woocommerce_before_add_to_cart_button');
						?>
                        <div class="like-button"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?></div>
						<div class="mobile_product_image mobile">
							<?php do_action( 'product_image' ); ?>
						</div>
                        <div class="description">
                            <div class="description-title"><?php echo $descriptionLabel; ?></div>
                            <div class="product-attributes">
							<table class="woocommerce-product-attributes shop_attributes">
								<tbody>
									
						<?php 

						
						
						$product_attr = get_post_meta( get_the_ID(), '_product_attributes' );
          				foreach ($product_attr as $attr) {
              				foreach ($attr as $attribute) {

								
											

				   			$attrnames = str_replace("pa_", "", $attribute['name']);
							$attribuleLabel = str_replace("-", " ", $attrnames);

							?>
								<!-- <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cvet_en">
												<th class="woocommerce-product-attributes-item__label"><?php echo $attribuleLabel ;?></th>
												<td class="woocommerce-product-attributes-item__value"><p><?php echo $attrvalues;?></p></td>
											</tr> -->
											
								<?php 
							if ($attribuleLabel == 'cvet_ua' || 
								$attribuleLabel == 'material_ua' || 
								$attribuleLabel == 'forma_ua' || 
								$attribuleLabel == 'vysota_ru ua en' || 
								$attribuleLabel == 'dlina_ru ua en' || 
								$attribuleLabel == 'kolichestvo v yashchike')

							  {
							
							if ($attribuleLabel == 'cvet_ua') {
								$label = 'Колір';
							}
							elseif ($attribuleLabel == 'material_ua') {
								$label = 'Матеріал';
							}
							elseif ($attribuleLabel == 'forma_ua') {
								$label = 'Форма';
							}
							elseif ($attribuleLabel == 'vysota_ru ua en') {
								$label = 'Висота';
							}
							elseif ($attribuleLabel == 'dlina_ru ua en') {
								$label = 'Довжина';
							}
							elseif ($attribuleLabel == 'kolichestvo v yashchike') {
								$label = 'Кількість';
							}

                     		$attrvalue = array( wc_get_product_terms( get_the_ID(), $attribute['name'], array( 'fields' => 'names' ) ) );
                        	$attrvalues = implode(",", $attrvalue[0]);
							
							if ($attrvalue ) :
							?>
							
								
								
											<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cvet_en">
												<th class="woocommerce-product-attributes-item__label"><?php echo $label;?></th>
												<td class="woocommerce-product-attributes-item__value"><p><?php echo $attrvalues;?></p></td>
											</tr>
								<?php endif; ?>
									
									


										<?php  } } } ?>
<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cvet_en">
												<th class="woocommerce-product-attributes-item__label">Код товару</th>
												<td class="woocommerce-product-attributes-item__value"><p><?php echo $product->get_sku();?></p></td>
											</tr>
									
							</tbody>
						</table>
					</div>
							<?php if(!empty(get_the_content())): ?>
                            	<div class="description-text"><?php the_content(); ?></div>
							<?php endif; ?>
                        </div>
                        <div class="price h4">
                            <?php echo $priceLabel . ':'; ?> <?php do_action('product_price'); ?>
                        </div>
						<div class="add-to-cart-button"><?php do_action('product_add_to_cart'); ?></div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $id = get_the_ID() ?>
<section class="product-slider-section">
    <div class="container">
        <div class="h2"><?php echo $productSliderTitle; ?></div>
        <div class="product-slider">
			<?php 
			// параметры по умолчанию
			$posts = get_posts( array(
				'numberposts' => 6,
				'category'    => 0,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'include'     => array(),
				'exclude'     => $id,
				'meta_key'    => '',
				'meta_value'  =>'',
				'post_type'   => 'product',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			) );

			foreach( $posts as $post ){
				setup_postdata($post);?>
					<?php
					global $product;

					// Ensure visibility.
					if ( empty( $product ) || ! $product->is_visible() ) {
						return;
					}
					?>
					<div <?php wc_product_class( 'product-slider-item', $product ); ?> style="display: block;">
						<a href="<?php the_permalink(); ?>" style="position: relative;">
							<div class="slider-item-image">
								<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
							</div>
							<div class="slider-item-body">
								<div class="product-title-wrapper"><?php do_action('product_title'); ?></div>
								<div class="price h4"><?php do_action( 'woocommerce_after_shop_loop_item_title' ) ?></div>
							</div>
							
							<div class="like-icon">
								<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
							</div>
							<div class="cart-icon">
								<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
							</div>
						</a>
					</div>
					
				<?php
				}

			wp_reset_postdata(); // сброс
			?>
        </div>
    </div>

</section>
<?php //do_action( 'related_products' ); ?>
<?php //do_action( 'woocommerce_after_single_product' ); ?>
<script>
	var $ = jQuery;
	$('.quantity input[type="number"]').niceNumber();
	$('.quantity input[type="number"]').each(function(){
		var itemAttr = this.getAttribute('max');
		$(this).removeAttr('data-nice-number-initialized');
		$(this).parent().find('.plus').click(function(event){
			event.preventDefault();
			var numberField = $(this).parent().find('input[type="number"]');
			var currentValue = $(numberField).val();
			$(numberField).attr('value', parseInt(currentValue));
		});
		if(itemAttr == ""){
			this.removeAttribute('max');
		}
	});
	$('.single_add_to_cart_button').click(function(){
		$('.add_to_cart_popup').addClass('active');
	});
</script>
<script>
	var w = jQuery(window).width();
	jQuery(document).ready(function(){
		if(w > 768){
			jQuery('.single-product .single_add_to_cart_button').html('<?php echo $addToCartButtonLabel; ?>');
		}
		else{
			jQuery('.single-product .single_add_to_cart_button').html('<?php echo $mobileAddToCartButtonLabel; ?>');
		}
	});
</script>
<script>
	var $ = jQuery;
	$(document).ready(function(){
		var removeLink = '<?php echo the_permalink(); ?>?_yith_wcwtl_users_list=<?php echo get_the_ID(); ?>&_yith_wcwtl_users_list-action=leave';
		var wooMessage = $('.woocommerce_message .woocommerce-message').size();
		var buttonLink = $('#yith-wcwtl-output a').attr('href');
		if(wooMessage == 1 && buttonLink == removeLink){
			jQuery('.woocommerce_message').html("<?php echo get_template_part('template-parts/waiting_list_message'); ?>");
			jQuery('.woocommerce_message').addClass('waiting_list_message_wrapepr');
			jQuery('body').addClass('open-popup');
			$('.waiting_list_message_wrapepr .close_popup_cross').click(function(){
				jQuery('body').removeClass('open-popup');
				jQuery('.woocommerce_message').remove()
			});
		}
	});
	$(document).ready(function(){
		if($('#yith-wcwtl-output a').attr('href') == "<?php echo get_permalink(  ) . '?_yith_wcwtl_users_list=' . get_the_ID() . '&_yith_wcwtl_users_list-action=register' ?>"){
			$('#yith-wcwtl-output a').html('<?php if(get_locale() == 'uk'){echo 'Повідомити про наявність';}elseif(get_locale() == 'ru_RU'){echo 'Сообщить о наличии';} else {echo 'Повідомити про наявність';}?>');
		}
		else{
			$('#yith-wcwtl-output a').html('<?php if(get_locale() == 'uk'){echo 'Не повідомляти про наявність';}elseif(get_locale() == 'ru_RU'){echo 'Не сообщать о наличии';} else {echo 'Не повідомляти про наявність';} ?>');
		}
		$('#yith-wcwtl-output a').css('opacity', '1');
	});
</script>