<?php get_header(); ?>
<section class="post">
  <div class="container">
    <div class="post_thumbnail">
      <?php the_post_thumbnail( ) ?>
    </div>
    <div class="post_title">
      <h2><?php the_title(); ?></h2>
    </div>
    <div class="post_text">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>