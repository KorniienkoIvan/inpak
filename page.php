<?php get_header(); ?>
<div id="app-wrapper" role="main">
    
    <?php 
    /*==============================================*/ 
    /*===============CHANGABLE PART=================*/ 
    /* Dont forget to change dta-namespace */ 
    ?>   

    <div id="app" class="app-container" data-namespace="page">
        <?php /*=====WRITE YOUR CODE HERE=====*/ ?>
            
			<div id="post-<?php the_ID('default-page'); ?>" <?php post_class(''); ?>>
              <?php if(have_rows('flexible_content')):
                while(have_rows('flexible_content')): the_row(); ?>
                  <?php get_template_part('/template-parts/acf-blocks/' . get_row_layout()); ?>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php if(!empty(get_the_content())): ?>
                <div class="container">
                  <?php the_content(  ); ?>
                </div>
              <?php endif; ?>
			</div>
            
        <?php /*=====END OF YOUR CODE=====*/ ?>
    </div>
    <?php /*==============================================*/ ?>

</div>
<?php get_footer(); ?>

<div style="display: none;">
	<?php
	
	// since wordpress 4.5.0
	$args = array(
		'taxonomy'   => "product_cat",
		'number'     => $number,
		'orderby'    => $orderby,
		'order'      => $order,
		'hide_empty' => false,
	);
	$product_categories = get_terms($args);
	
	?>
	
	<table>
		
	
	
	<?php
	
	foreach ($product_categories as $cat) { ?>
		
		<tr>
		<?php echo $cat->name . '</br>'; ?>
		</tr>
		<?php 
	}
	
	?>
		
	</table>
</div>