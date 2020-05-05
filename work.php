<?php
/* Template name: Work */

get_header(); ?>

<div id="swup">
  <main class="transition-fade">
    <div class="content">
      <div class="transition-fade">

        <article>
          <header>
            <p class="transition-fade article-year"><?php echo the_field('work_year'); ?></p>
            <h1 class="transition-fade article-title"><?php echo the_field('work_title'); ?></h1>
            <a href="<?php echo the_field('work_website_link'); ?>" class="transition-fade article-site"><?php echo the_field('work_website_text'); ?></a>
          </header>

          <div class="article-body transition-fade">

            <?php if (have_posts()): ?>
              <?php while (have_posts()) : the_post() ?>

                <?php the_content(); ?>

              <?php endwhile; ?>
            <?php endif; ?>

          </div>
          <aside class="transition-fade">
            <div class="info-box">
              <h4><?php echo the_field('sidebar_first_heading'); ?></h4>
              <p><?php echo the_field('sidebar_first_text'); ?></p>

              <h4><?php echo the_field('sidebar_second_heading'); ?></h4>
              <ul>

                <?php if (have_rows('sidebar_list')) :
                  while (have_rows('sidebar_list')) : the_row();
                  $listItem = get_sub_field('sidebar_list_item');
                ?>

                <li><i class="fad fa-space-station-moon-alt"></i><?php echo $listItem ?></li>

                <?php endwhile;
                endif; ?>

              </ul>
            </div>
          </aside>
        </article>

      </div>
    </div>

    <a href="<?php echo the_field('arrow_left'); ?>" id="arrow-left"><i class="fad fa-angle-left"></i></a>
    <a href="<?php echo the_field('arrow_right'); ?>" id="arrow-right"><i class="fad fa-angle-right"></i></a>
  </main>

  <img class="planet-saturn-work transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-saturn.svg" alt="">
  <img class="planet-asteroids-work transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-asteroids.svg" alt="">
  <img class="planet-mixed-work transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-mixed.svg" alt="">
</div>

<?php get_footer(); ?>
