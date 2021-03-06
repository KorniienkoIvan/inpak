<?php 
    $partnersTitle = get_sub_field('partnersTitle');
    $partnersTitleBack = get_sub_field('partnersTitleBack');
?>
<section class="">
    <div class="partners__content__wrapper">
        <div class="container titlePseudo--container">
            <?php if ($partnersTitle) : ?>
                <div class="partners__title h2"><?php echo $partnersTitle;?></div>
            <?php endif;?>
            <?php if ($partnersTitleBack) : ?>
                <div class="titlePseudo"><?php echo $partnersTitleBack;?></div>
            <?php endif;?>
        </div>
        <?php if (have_rows('slider_item') ): ?>
            <div class="container">
                <div class="slider">
                    <div class="slick-next"></div>
                    <div class="slick-prev"></div>
                    <div class="partners__row ">
                        <?php while(have_rows('slider_item') ) : the_row();
                            $slider_itemImg = get_sub_field('slider_itemImg'); 
                        ?>
                            <?php if(!empty( $slider_itemImg) ): ?>
                                <img data-lazy="<?php echo esc_url($slider_itemImg['url']);?>" alt="<?php echo esc_attr($slider_itemImg['alt']); ?>" class="slider_itemImg" width="168" height="96">
                            <?php endif;?>
                        <?php endwhile;?>               
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
</section> 