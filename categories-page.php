<?php 
/*
Template Name: Categories Page
*/
?>
<?php get_header() ?>
<?php echo get_template_part('template-parts/breadcrumbs') ?>
<seciton class="page_title__wrapper katalog categories_page_title__wrapper">
    <div class="container">
		<div class="katalog-page-title">
			<div class="background-title"><?php the_title(); ?></div>
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
</seciton>
<section class="product_categories">
    <div class="container shop-page-container">
        
        <div class="row">
        <div class="col-md-3 col-12 sidebar filter-col">
            <?php $button_title = get_field('download_button_title'); ?>
            <?php $button_file = get_field('download_button_file'); ?>
            <?php if($button_title && $button_file): ?>
                <div class="above_sidebar_download_button_wrapper">
                    <a href="<?php echo $button_file; ?>" class="above_sidebar_download_button" download><?php echo $button_title; ?></a>
                </div>
            <?php endif; ?>
            <div class="katalog">
                <div class="filter_wrapper category">
                    <div class="filter">
                        <div class="filter_wrapper"><?php dynamic_sidebar('shop-filters');?></div>
                    </div>
                </div>
            </div>
        </div>
		<?php 
		$rows = get_field('page_cat_list');
		if( $rows ) : ?>
            <div class="col-md-9 col-12 product_categories_list">
                <div class="row">
                    <?php foreach( $rows as $row ) :
                        // Load sub field value.
                        $icon = $row['icon'];
						$cat = $row['category'];
						$label = $row['custom_label'];
                        if( $cat ): ?>
                    <a href="<?php echo esc_url( get_term_link( $cat[0] ) ); ?>" class="col-lg-4 col-md-6 col-12 product_category_item__wrapper">
                        <div class="product_category_item">
                            <?php if( !empty($icon)): ?>
                            <div class="product_category_image" data-id="">
                                <?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?>
                            </div>
                            <?php else: ?>
                                <div class="product_category_image">
                                    <img src="<?php echo get_home_url() . '/wp-content/uploads/woocommerce-placeholder.png' ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <div class="product_category_name h5">
                                <?php echo esc_html( $cat[0]->name ); ?>
                            </div>
                        </div>
                    </a>
                    <?php endif; ?>
                    <?php endforeach; ?> 
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer() ?>