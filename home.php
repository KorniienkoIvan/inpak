

<?php get_header(); ?>
<?php get_template_part('/template-parts/breadcrumbs') ?>
<seciton class="page_title__wrapper katalog categories_page_title__wrapper">
    <div class="container">
		<div class="katalog-page-title">
			<div class="background-title"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></div>
			<h2><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h2>
		</div>
	</div>
</seciton>
<section class="blog_wrapper">
	<div class="container">
		<?php if(have_posts()): ?>
			<div class="row posts_block_wrapper">
				<?php $i = 1; ?>
				<?php 
					add_filter( 'excerpt_length', function(){
						return 24;
					} );
					add_filter('excerpt_more', function($more) {
						return '...';
					});
				?>
				<?php while(have_posts()): the_post(); ?>
					<?php if($i == 1 || $i == 2): ?>
						<?php if($i == 1): ?><div class="col-lg-7 two posts_block"><?php endif; ?>
							<div class="post">
								<div class="post_image">
									<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
								</div>
								<div class="post_body">
									<div class="post_title h2">
										<?php the_title(); ?>
									</div>
									<div class="post_desc">
										<?php the_excerpt(); ?>
									</div>
									<div class="post_read_more_wrapper">
										<a href="<?php echo get_the_permalink(  ) ?>" class="post_read_more">Читати далі</a>
									</div>
								</div>
							</div>
						<?php if($i == 2): ?></div><?php endif; ?>
					<?php endif; ?>
					<?php if($i == 3): ?>
					<div class="col-lg-5 one posts_block">
						<div class="post">
							<div class="post_image">
								<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
							</div>
							<div class="post_body">
								<div class="post_title h2">
									<?php the_title(); ?>
								</div>
								<div class="post_desc">
									<?php the_excerpt(); ?>
								</div>
								<div class="post_read_more_wrapper">
									<a href="<?php echo get_the_permalink(  ) ?>" class="post_read_more">Читати далі</a>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				<?php $i++ ?>
				<?php if($i == 4): ?>
					</div>
					<div class="row posts_block_wrapper">
					<?php $i = 1; ?>
				<?php endif; ?>
			<?php endwhile; ?>

			</div>
		<?php endif; ?>
		<?php 
			$args = array(
				'end_size'     => 1,     // количество страниц на концах
				'mid_size'     => 1,     // количество страниц вокруг текущей
				'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
				'prev_text'    => __(''),
				'next_text'    => __(''),
				'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
				'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
				'screen_reader_text' => __( 'Posts navigation' ),
			);
		?>
		<div class="pagination"><?php the_posts_pagination( $args );?></div>
	</div>
</section>
<?php get_footer(); ?>