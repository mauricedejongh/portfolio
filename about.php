<?php
/* Template name: About */

get_header(); ?>

<div id="swup">
  <main class="transition-fade">
    <div class="content">

      <article>

        <div class="article-body">

          <h1><?php echo the_field('intro_heading'); ?></h1>
          <p>
            <?php echo the_field('intro_text'); ?>
          </p>

          <blockquote>
            <?php echo the_field('intro_quote'); ?>
          </blockquote>

          <?php if (have_posts()): ?>
            <?php while (have_posts()) : the_post() ?>

              <?php the_content(); ?>

            <?php endwhile; ?>
          <?php endif; ?>


          <div class="info-box">
            <ul>

              <?php if (have_rows('icon_item_list')) :
                while (have_rows('icon_item_list')) : the_row();
                $listIcon = get_sub_field('list_icon');
                $listItem = get_sub_field('list_item');
                $listText = get_sub_field('list_text');
              ?>

              <li><i class="fad <?php echo $listIcon ?>"></i></i><strong><?php echo $listItem ?></strong>
                <?php echo $listText ?>
              </li>

              <?php endwhile;
              endif; ?>

            </ul>
          </div>

        </div>

        <aside>
          <div class="image-box">
            <!--<img class="transition-fade" id="astronaut">-->
          </div>
          <div class="info-box">
			  <h4>Skills</h4>
			  <ul>
				<li><i class="fad fa-space-station-moon-alt"></i>UI/UX design</li>
				<li><i class="fad fa-space-station-moon-alt"></i>Photo editing</li>
				<li><i class="fad fa-space-station-moon-alt"></i>HTML5</li>
				<li><i class="fad fa-space-station-moon-alt"></i>CSS3/ SCSS<li>
				<li><i class="fad fa-space-station-moon-alt"></i>Vanilla JS/ jQuery</li>
				<li><i class="fad fa-space-station-moon-alt"></i>PHP</li>
			  </ul>

			  <h4>Tools</h4>
			  <ul>
				<li><i class="fad fa-space-station-moon-alt"></i>Photoshop</li>
				<li><i class="fad fa-space-station-moon-alt"></i>XD</li>
				<li><i class="fad fa-space-station-moon-alt"></i>Wordpress</li>
				<li><i class="fad fa-space-station-moon-alt"></i>CI</li>
				<li><i class="fad fa-space-station-moon-alt"></i>GIT</li>
			  </ul>
		  </div>
        </aside>

      </article>

      <div class="btn-container">
        <h2>Interested in viewing my work?</h2>
        <a href="/work/" class="btn">Explore deeper</a>
      </div>

    </div>

  </main>

  <img class="planet-rivers-about transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-rivers.svg" alt="">
  <img class="planet-mixed-about transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-mixed-reversed.svg" alt="">
  <img class="planet-craters-about transition-scale" src="<?php echo get_template_directory_uri(); ?>/images/planet-craters.svg" alt="">

</div>

<?php get_footer(); ?>
