<section class="best_products">
    <?php $block_title = get_sub_field('block_title'); ?>
    <?php if($block_title): ?>
        <div class="container block_title_container">
            <div class="background_block_title"><?php echo $block_title; ?></div>
            <h2 class="block_title"><?php echo $block_title; ?></h2>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="woocommerce columns-3">
            <ul class="products columns-3">
                <?php 
				$my_posts = get_posts( array(
						'posts_per_page' => 6,
                        'post_type'      => 'product',
                        'meta_key' => 'total_sales',
                        'orderby' => 'meta_value_num',
                        'meta_query' => array(
                            array(
                                'key' => '_stock_status',
                                'value' => 'instock',
                                'compare' => '=',
                            ),
                        ),
				) );

                                
                    foreach( $my_posts as $post ){
                        setup_postdata( $post );
                            wc_get_template_part( 'content', 'product' );
                    }
                    
                    wp_reset_postdata();
                            
                ?>
            </ul>
        </div>

        <?php $button = get_sub_field('button'); ?>
        <?php if($button): ?>
            <div class="button_wrapper"><a href="<?php echo $button['url'] ?>" class="button"><?php echo $button['title'] ?></a></div>
        <?php endif; ?>
    </div>
</section>