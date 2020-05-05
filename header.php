<?php
/**
 * The header for our theme
 */
?>

<!DOCTYPE html>
<html class="is-animating" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?php the_title() ?></title>

  <!-- Favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon"/>

  <script type"text/javascript">
    //====== Create template directory snippet ======//
    const templateDirectoryUri = "<?php echo get_template_directory_uri(); ?>";
  </script>

  <?php wp_head(); ?>

</head>
<body>

  <div id="interface">
    <div id="volume">
      <i class="fa fa-volume-mute" id="sound-off"></i>
      <i class="fa fa-volume" id="sound-on"></i>
    </div>

    <a href="/" class="logo hover-up" id="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="">
      <span>Maurice de Jongh</span>
    </a>

    <button class="burger burger-squeeze" id="burger-toggle">
      <div class="burger-lines">
      </div>
    </button>
  </div>

  <nav id="menu">
    <div id="menu-screen-left">
      <div id="icon-container">
        <i class="fad fa-galaxy menu-icons"></i>
        <i class="fad fa-starship menu-icons"></i>
        <i class="fad fa-user-astronaut menu-icons"></i>
        <i class="fad fa-atom-alt menu-icons"></i>
      </div>
    </div>

    <div id="menu-screen-right">
      <ul id="menu-nav">
        <li class="menu-item soundhover"><a href="/">Home</a></li>
        <li class="menu-item soundhover"><a href="/about/">About me</a></li>
        <li class="menu-item soundhover"><a href="/work/">Work</a></li>
      </ul>
    </div>
  </nav>
