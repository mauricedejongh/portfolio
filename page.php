<?php
/**
 * The template for displaying all default pages
 * @package Refresh Media
 */

get_header(); ?>

<main class="transition-fade" id="swup">
  <div class="content">

    <?php if (have_posts()): ?>
      <?php while (have_posts()) : the_post() ?>

        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
