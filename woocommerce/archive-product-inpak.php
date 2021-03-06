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
				<h2><?php woocommerce_page_title(); ?></h2>
			</div>
		<?php endif; ?>
	</div>
	<?php
	do_action( 'woocommerce_archive_description' );
	?>
<?php
if ( woocommerce_product_loop() ) {

	?>
	<div class="container" id="shop_container">
        <div class="row">
            <div class="col-lg-3 col-12 filter-col">
				<div class="filter_wrapper"><?php dynamic_sidebar('shop-filters');?></div>
				<div class="filters">
				    <?php

                        // задаем нужные нам критерии выборки данных из БД
                        $args = array(
                            'post_type' => 'product',
                            'orderby' => 'comment_count'
                        );

                        $query = new WP_Query( $args );

                        // Цикл
                        if ( $query->have_posts() ) {
                            $product_attributes_names = array();
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                global $product;

                                //Getting product attributes
                                $product_attributes = $product->get_attributes();
                            
                                if(!empty($product_attributes)){
                                
                                    //Getting product attributes slugs
                                    $product_attribute_slugs = array_keys($product_attributes);
                                    $count_slug = 0;
                                

                                    foreach ($product_attribute_slugs as $product_attribute_slug){
                                        $count_slug++;
                                        $attribute_name =  ucfirst( str_replace('pa_', '', $product_attribute_slug) );
                                        array_push($product_attributes_names, $product_attribute_slug);
                                        $product_attributes_names = array_unique($product_attributes_names);
                                    }

                                }

                            }

                        }
                        // Возвращаем оригинальные данные поста. Сбрасываем $post.
                        wp_reset_postdata();
                    ?>
                    <div class="filter_wrapper">
                        <div class="filter_title"><?php if(get_locale() == 'uk'){echo 'Фільтр';}elseif(get_locale() == 'ru_RU'){echo 'Фильтр';} else {echo 'Фільтр';} ?></div>
                        
                        <div class="price_fields">
                            <div class="price_fields_title"><?php if(get_locale() == 'uk'){echo 'Ціна';}elseif(get_locale() == 'ru_RU'){echo 'Цена';} else {echo 'Ціна';}?></div>
                        <?php
                        get_template_part( '/woocommerce/content-widget-price-filter' ); ?>
                        </div>
                        <?php
                        foreach ($product_attributes_names as $product_attributes_name){ 

                            /*get term name by slug */
                            $product_attributes_slug = str_replace('pa_', 'filter_', $product_attributes_name);
                            //filter_forma_ua 
                            //filter_vysota_ru-ua-en
                            //filter_dlina_ru-ua-en
                            //filter_kolichestvo-v-yashchike
                            //filter_material_ua
                            if($product_attributes_slug =='filter_material_ua' || 
                                $product_attributes_slug =='filter_cvet_ua' || 
                                $product_attributes_slug =='filter_forma_ua' || 
                                $product_attributes_slug =='filter_vysota_ru-ua-en' || 
                                $product_attributes_slug =='filter_dlina_ru-ua-en' || 
                                $product_attributes_slug =='filter_kolichestvo-v-yashchike' ) {
                                    

                                    if ($product_attributes_slug =='filter_cvet_ua') {
                                        $name = 'Колір';
                                    }

                                    elseif ($product_attributes_slug =='filter_material_ua') {
                                        $name = 'Матеріал';
                                    }
                                    elseif ($product_attributes_slug =='filter_forma_ua') {
                                        $name = 'Форма';
                                    }
                                    elseif ($product_attributes_slug =='filter_vysota_ru-ua-en') {
                                        $name = 'Висота';
                                    }
                                    elseif ($product_attributes_slug =='filter_dlina_ru-ua-en') {
                                        $name = 'Довжина';
                                    }
                                    elseif ($product_attributes_slug =='filter_kolichestvo-v-yashchike') {
                                        $name = 'Кількість';
                                    }
                                    else {
                                        wc_attribute_label($product_attributes_name);
                                    }
                            ?>

                            <div class="filter__inner filter__inner-<?php echo $product_attributes_slug; ?>">
                            <div class="filter__titleWrapper">
                                <div class="filter__title" data-sort="<?php echo $product_attributes_slug;?>"><?php echo $name;?></div>
                            </div>
                            <?php

                            $attribute_values = get_terms($product_attributes_name);
                            if( $attribute_values && ! is_wp_error($attribute_values) ){
                                ?>

                                <ul class="filterGroup" data-sort="<?php echo $product_attributes_slug;?>">
                                <?php
                                foreach( $attribute_values as $attribute_values ){
                                    echo "<li data-slug=" .$attribute_values->slug .">". $attribute_values->name ."</li>";
                            
                                }
                                echo "</ul>";
                            }
                            $count_value = 0;
                            foreach($attribute_values as $attribute_value){
                                $count_value++;
                                $attribute_name_value = $attribute_value->name; // name value
                                $attribute_slug_value = $attribute_value->slug; // slug value
                                $attribute_slug_value = $attribute_value->term_id; // ID value
            
                                // Displaying HERE the "names" values for an attribute
                                //echo $attribute_name_value;
                                //if($count_value != count($attribute_values)) echo ', ';
                            }
                            echo '</div>';
                        }
                        }
                        ?>
                        <div class="filter__inner">
                            <div class="inpack_submit button"><?php if(get_locale() == 'uk'){echo 'Показати';}elseif(get_locale() == 'ru_RU'){echo 'Показать';} else {echo 'Показати';} ?></div>
                        </div>

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

                        <script>
                        jQuery(document).ready(function($){
                            let loadedQueryString = window.location.href;
                            //console.log(loadedQueryString);
                            // console.log(window.location.search);
                            let newQueryString = '';
                            $('li').on("click",function(){
                                $(this).closest('.filter-list').find('.perpage').removeClass('active');
                                $(this).toggleClass('active');
                            });
                            
                            $('.inpack_submit').on("click",function(){
                                newQueryString = '';

                                $( ".filter-col li.active" ).each(function() {
                                    $(this).parent().addClass('active');
                                });

                                let filtersSize = $('.filter-col ul.active').size() - 1;

                                $( ".filter-col ul.active" ).each(function(index) {
                                    filterQuery = $(this).data('sort') + '=';
                                    let childrenSize = $(this).find('li.active').size() - 1;
                                    $(this).find('li.active').each(function(index) {

                                        if ( index == childrenSize) {
                                            itemQuery =  $(this).data('slug');
                                        }
                                        else {
                                            itemQuery = $(this).data('slug') + ',';
                                        }
                                        filterQuery = filterQuery + itemQuery;
                                    });

                                    if ( index == filtersSize) {
                                        filterQuery = filterQuery;
                                    } else {
                                        filterQuery = filterQuery + '&';
                                    }
                                    newQueryString = newQueryString + filterQuery;
                                    console.log(index + filterQuery);
                                });

                                newQueryString = '?' + newQueryString;
                                $(location).prop('href', newQueryString);
                            });
                        });
                        </script>

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

                <div class="row">
				<?php
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ):
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					endwhile;

				}

				

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				?>
				
				<div class="show-more-button"><a href="#" class="misha_loadmore"><?php if(get_locale() == 'uk'){echo 'Показати більше';}elseif(get_locale() == 'ru_RU'){echo 'Показать больше';} else {echo 'Показати більше';} ?></a></div>
				<div class="pagination">
					<?php do_action( 'woocommerce_after_shop_loop' ); ?>
				</div>
                
	<?php 
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );
?>
</div>
                
            </div>
        </div>
        
    </div>
</section>
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
<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer(  );
?>

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