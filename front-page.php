<?php
/**
 * The template for displaying the homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portfolio
 */

get_header(); ?>

<div id="swup">
  <main class="intro transition-fade">
    <div class="content">
      <h1>Hi, I'm maurice</h1>
      <h3>Front-end developer / Artist / Javascript fanatic</h3>
      <a href="/about" class="btn">Explore</a>
    </div>

    <div id="comet"></div>
    <img class="planet-craters-half-home transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-craters-half.svg" alt="">
    <img class="planet-mixed-home transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-mixed.svg" alt="">
    <img class="planet-saturn-home transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-saturn.svg" alt="">
  </main>
</div>

<?php get_footer(); ?>
