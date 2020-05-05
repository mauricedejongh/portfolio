<?php /* template name: Nieuws */ ?>
<?php get_header(); ?>

<div class="content">

  <main class="main-content full">

    <div class="page-header">
      <h1><?php echo the_field('news_head', 36); ?></h1>
    </div>

    <section class="post-content-grid-two">

      <?php
      // Include the news loop
      get_template_part('inc/news-loop', 'news-loop');
      ?>

    </section>

  </main>

</div>

<?php get_footer(); ?>
