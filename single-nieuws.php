<?php /* Single nieuws page */ ?>
<?php get_header(); ?>

<div class="content sidebar-right-bg">

  <main class="main-content sidebar-right">

    <?php if (has_post_thumbnail( $post->ID ) ): ?> <!-- Check if post has a thumbnail -->
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <?php endif; ?>

    <?php if (have_posts()): ?>
      <?php while (have_posts()) : the_post() ?>

        <div class="page-header">
          <h1><?php the_title(); ?></h1>
        </div>

        <img class="single-image" src="<?php echo $image[0]; ?>" alt="">
        <?php the_content(); ?>

      <?php endwhile; ?>
    <?php endif; ?>

  </main>

  <aside class="sidebar-right">

    <div class="sticky">

      <h3>Laatste berichten</h3>

      <?php
      // Include the news loop
      get_template_part('inc/news-loop', 'news-loop');
      ?>

    </div>

  </aside>

</div>

<?php get_footer(); ?>
