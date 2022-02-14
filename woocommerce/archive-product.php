<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php echo get_template_part('template-parts/breadcrumbs') ?>

<a class="back_button" href="#">
	Головна
</a>

<section class="katalog">
    <div class="container">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<div class="katalog-page-title">
				<div class="background-title"><?php woocommerce_page_title(); ?></div>
				<h1><?php woocommerce_page_title(); ?></h1>
			</div>
		<?php endif; ?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>

<?php
if ( woocommerce_product_loop() ) { ?>

    <div class="container" id="shop_container">
        <div class="row">
            <div class="col-lg-3 col-12 filter-col">

				<div class="filter_wrapper">
                    <?php dynamic_sidebar('shop-filters');?>
                </div>

                <div class="filters">
                    <div class="filter_wrapper">

                        <div class="filter_title">
                            <?php if(get_locale() == 'uk'){echo 'Фільтр';}elseif(get_locale() == 'ru_RU'){echo 'Фильтр';} else {echo 'Фільтр';} ?>
                        </div>
                        
                        <div class="price_fields">
                            <div class="price_fields_title"><?php if(get_locale() == 'uk'){echo 'Ціна';}elseif(get_locale() == 'ru_RU'){echo 'Цена';} else {echo 'Ціна';} ?></div>
                            <?php get_template_part( '/woocommerce/content-widget-price-filter' ); ?>
                        </div>

						<?php dynamic_sidebar('price');?>

                        <!-- sort filtres -->
                        <?php

                        if(isset($_GET['perpage'])) { ?>
                            
                            <script>

                                jQuery(document).ready(function($){
                                    let perpage = '.perpage-' + <?php echo $_GET['perpage']; ?>;
                                    $('.perpage').removeClass('active');
                                    $(perpage).addClass('active');
                                });

                            </script>

                            <?php
                        } else { ?>
                            <script>

                                jQuery(document).ready(function($){
                                    $('.perpage-9').addClass('active');
                                });

                            </script>
                        <?php } ?>

                        <?php

                        foreach($_GET as $key => $value) {
                            ?>
                            <script>
                                jQuery(document).ready(function($){
                                    let key = '<?php echo $key; ?>';
                                    let value = '<?php echo $value; ?>';

                                    $('ul[data-sort="' + key + '"] li[data-slug="' + value + '"]').addClass('active');
                                    $('ul[data-sort="' + key + '"]').slideToggle();
                                    
                                });
                            </script>
                            <?php
                        }

                        ?>

                        <style>
                            li.active {
                                color: green;
                            }
                            .filter-wrapper-artykul {
                                display: none;
                            }
                        </style>
                    </div>
                </div>

            </div>

            <div class="col-lg-9 col-12 katalog-items">
				<?php 
				if(get_locale() == 'uk'){
					$mobileFiltersLabel = 'Фільтри';
					$sortByLabel = 'Сортування';
					$sortBtCountLabel = 'Кількість товару';
				} 
				elseif(get_locale() == 'ru_RU'){
					$mobileFiltersLabel = 'Фильтры';
					$sortByLabel = 'Сортировка';
					$sortBtCountLabel = 'Количество товара';
				}
				else {
					$mobileFiltersLabel = 'Фільтри';
					$sortByLabel = 'Сортування';
					$sortBtCountLabel = 'Кількість товару';
				}
				?>
                <div class="top-filter-row">
					<div class="mobile_open_filter_button">
						<?php echo $mobileFiltersLabel; ?>
					</div>
					<div class="sort_by">
						<div class="filter-title"><?php echo $sortByLabel; ?>:</div>
						<ul class="filter-list">
							<?php do_action( 'woocommerce_before_shop_loop' ); //Фильтр архивной страницы ?>
						</ul>
					</div>
					<div class="count">
						<div class="filter-title"><?php echo $sortBtCountLabel; ?>:</div>
						<?php do_action('woocommerce_count_filter'); ?>
					</div>
                </div>
            
    <?php   

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
    //do_action( 'woocommerce_before_shop_loop' );
    
    woocommerce_output_all_notices();

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) { ?>

    <div class="row">

		<?php while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

    woocommerce_product_loop_end(); 

    ?>

        <div class="show-more-button">
            <a href="#" class="misha_loadmore"><?php if(get_locale() == 'uk'){echo 'Показати більше';}elseif(get_locale() == 'ru_RU'){echo 'Показать больше';} else {echo 'Показати більше';} ?></a>
        </div>
		<div class="pagination">
			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		</div>
    
    
    <?php } else {

        /**
         * Hook: woocommerce_no_products_found.
         *
         * @hooked wc_no_products_found - 10
         */
        do_action( 'woocommerce_no_products_found' ); 

    } ?>

    </div> <!-- row for products end -->
</div>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

?>

</section> <!-- Section "catalog" end -->

<?php get_footer(); ?>

<script>
//Sort By
var $ = jQuery;
$(document).ready(function(){
	var sort = '.<?php echo $orderby; ?>';
	var activeFormItem = '.' + jQuery('.woocommerce-ordering select option[selected="selected"]').attr('value');
	if(activeFormItem == '.price' || activeFormItem == '.price-desc'){
		$(activeFormItem).addClass('active');
	}
	// else{
	// 	$(sort).addClass('active');
	// }
});
</script>
<script>
	$(document).ready(function(){
		$('.katalog-items a').each(function(){
			if((this).hasAttribute('href')){
				
			}
			else{
				$(this).remove();
			}
		});
	});
</script>

<script>
	window.onload = function(){
		slideOne();
		slideTwo();
	}
	let sliderOne = document.getElementById("slider-1");
	let sliderTwo = document.getElementById("slider-2");
	let minGap = 0;
	let sliderTrack = document.querySelector(".slider-track");
	let sliderMaxValue = document.getElementById("slider-1").max;
	function slideOne(){
		if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
			sliderOne.value = parseInt(sliderTwo.value) - minGap;
		}
		jQuery('.price_slider_amount #min_price').attr('value', sliderOne.value);
	}
	function slideTwo(){
		if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
			sliderTwo.value = parseInt(sliderOne.value) + minGap;
		}
		jQuery('.price_slider_amount #max_price').attr('value', sliderTwo.value);
	}
</script>
<script>
	jQuery(document).ready(function(){
		var lang = jQuery('.weglot-ru').length;
		if(lang > 0){
			jQuery('select[name="product-search-filter-pa_cvet"]').closest('.product-search-filter-terms').find('.product-search-filter-attribute-heading').html('Колір');
			jQuery('select[name="product-search-filter-pa_diametr"]').closest('.product-search-filter-terms').find('.product-search-filter-attribute-heading').html('Діаметр');
			jQuery('select[name="product-search-filter-pa_dlina"]').closest('.product-search-filter-terms').find('.product-search-filter-attribute-heading').html('Довжина');
			jQuery('select[name="product-search-filter-pa_kolichestvo-v-yashchike"]').closest('.product-search-filter-terms').find('.product-search-filter-attribute-heading').html('Кількість в ящику');
			jQuery('select[name="product-search-filter-pa_material"]').closest('.product-search-filter-terms').find('.product-search-filter-attribute-heading').html('Матеріал');
			jQuery('select[name="product-search-filter-pa_vysota"]').closest('.product-search-filter-terms').find('.product-search-filter-attribute-heading').html('Висота');
		}
	});
</script>