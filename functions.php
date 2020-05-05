<?php

/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( !function_exists( 'portfolio_setup' ) ) :
  /**
  * Sets up theme defaults and registers support for various WordPress features
  */

  function portfolio_setup() {

    /* ----- Register nav menu's ----- */
    register_nav_menus( array(
       'head-menu'   => __( 'Hoofd menu', 'portfolio' ),
    ) );

    /* ----- Making strings available for translation ----- */
    load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

    /* ----- Add post thumbnails and featured images ----- */
    add_theme_support( 'post-thumbnails' );

    /* ----- Enable support for the following post formats:
     * aside, gallery, quote, image, and video ----- */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    // Add theme support for Custom Logo
    add_theme_support( 'custom-logo', array(
      'flex-width' => false,
    ));

  }

endif; // refresh-media_setup
add_action( 'after_setup_theme', 'portfolio_setup' );

/* ----- Includes the CSS and JS files ----- */

function add_theme_scripts() {
  /* CSS */
  wp_enqueue_style( 'style', get_stylesheet_uri() );

  /* JS */
  wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/2ed38fdfce.js', array (), false, true);
  wp_enqueue_script( 'swup', 'https://unpkg.com/swup@latest/dist/swup.min.js', array (), false, true);
  wp_enqueue_script( 'canvas-background', get_template_directory_uri() . '/js/canvas-background.js', array (), false, true);
  wp_enqueue_script( 'sounds', get_template_directory_uri() . '/js/sounds.js', array (), false, true);
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array (), false, true);

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function refresh_media_widgets_init()
{
  /* ----- Register Sidebars ----- */
  register_sidebar( array(
    'name'          => esc_html__( 'Footer column 1', 'refresh-media' ),
    'id'            => 'footer-col-1',
    'description'   => esc_html__( 'Add widgets here.', 'refresh-media' ),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ));
}

add_action('widgets_init', 'refresh_media_widgets_init');

/* ================================
New functions
================================ */

/* ----- Change amount of excerpt words ----- */
function new_excerpt_length($length) {
  return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* ----- Adds ACF option page ----- */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
  'page_title' 	=> 'Thema instellingen',
  'menu_title'	=> 'Thema instellingen'
));
}

/* ----- Add custom post type ----- */
add_action( 'init', 'customPostTypes' );
function customPostTypes() {

  // Nieuws
   $labels = array(
       "name" => __( "Nieuws", "" ),
       "singular_name" => __( "Nieuws", "" ),
       "menu_name" => __( "Nieuws", "" ),
       "all_items" => __( "Alle berichten", "" ),
       "add_new" => __( "Voeg nieuw bericht toe", "" ),
       "add_new_item" => __( "Voeg nieuw bericht toe", "" ),
       "edit_item" => __( "Bewerk bericht", "" ),
       "new_item" => __( "Nieuw bericht", "" ),
       "view_item" => __( "Bekijk bericht", "" ),
       "view_items" => __( "Bekijk berichten", "" ),
       "search_items" => __( "Zoek berichten", "" ),
       "not_found" => __( "Geen berichten gevonden", "" ),
       "not_found_in_trash" => __( "Geen berichten gevonden in de prullenbak", "" ),
   );

  $args = array(
       "label" => __( "Nieuws", "" ),
       "labels" => $labels,
       "description" => "",
       "public" => true,
       "publicly_queryable" => true,
       "show_ui" => true,
       "show_in_rest" => false,
       "rest_base" => "",
       "has_archive" => true,
       "taxonomies" => array('nieuws', 'projecten' ),
       "show_in_menu" => true,
       "exclude_from_search" => false,
       "capability_type" => "post",
       "map_meta_cap" => true,
       "hierarchical" => false,
       "rewrite" => array( "slug" => "nieuws", "with_front" => true ),
       "query_var" => true,
       "supports" => array( "title", "editor", "thumbnail", "comments", "excerpt", "custom-fields" ),
   );

  register_post_type('nieuws', $args);
}

/* ----- Delete posts form admin ----- */
function post_remove ()
{
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');



?>
