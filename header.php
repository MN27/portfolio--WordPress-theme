<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portfolio - Makoto Nakamura</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bind/css/style.min.css">
  <noscript>
    <!-- JavaScriptがオフの場合に適用するCSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bind/css/noscript.css">
  </noscript>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/bind/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/bind/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/bind/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/bind/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/bind/favicon/safari-pinned-tab.svg" color="#666666">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>
<body>
  
  <?php if (is_front_page()) : //トップページ用のheader?>

  <header>
    <h1 class="logo"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/bind/images/logo.svg" alt=""></a></h1>
    <div class="trigger_wrap sp">
    <a class="menu_trigger no_scroll" href="#">
        <span></span>
        <span></span>
        <span></span>
    </a>
    </div>
    
    <nav>
      <ul class="sp">
        <li><a class="present" href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#works">Works</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <ul class="pc">
        <li><a class="present" href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#works">Works</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  <?php elseif (is_post_type_archive('works') || is_singular('works') || is_tax('skill')) : //works関連ページ用のheader?>
  
  <header>
    <h1 class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/bind/images/logo.svg" alt=""></a></h1>
    <div class="trigger_wrap sp">
    <a class="menu_trigger no_scroll" href="#">
        <span></span>
        <span></span>
        <span></span>
    </a>
    </div>
    
    <nav>
      <ul class="sp">
        <li><a href="<?php echo home_url(); ?>#about">About</a></li>
        <li><a href="<?php echo home_url(); ?>#skills">Skills</a></li>
        <li><a class="in_single_work" href="<?php echo get_post_type_archive_link('works'); ?>">Works</a></li>
        <li><a href="<?php echo home_url(); ?>#contact">Contact</a></li>
      </ul>
      <ul class="pc">
        <li><a href="<?php echo home_url(); ?>#about">About</a></li>
        <li><a href="<?php echo home_url(); ?>#skills">Skills</a></li>
        <li><a class="in_single_work" href="<?php echo get_post_type_archive_link('works'); ?>">Works</a></li>
        <li><a href="<?php echo home_url(); ?>#contact">Contact</a></li>
      </ul>
    </nav>
  </header>
  
  <?php else : //その他のページ用のheader?>
  
  <header>
    <h1 class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/bind/images/logo.svg" alt=""></a></h1>
    <div class="trigger_wrap sp">
    <a class="menu_trigger no_scroll" href="#">
        <span></span>
        <span></span>
        <span></span>
    </a>
    </div>
    
    <nav>
      <ul class="sp">
        <li><a href="<?php echo home_url(); ?>#about">About</a></li>
        <li><a href="<?php echo home_url(); ?>#skills">Skills</a></li>
        <li><a href="<?php echo home_url(); ?>#works">Works</a></li>
        <li><a href="<?php echo home_url(); ?>#contact">Contact</a></li>
      </ul>
      <ul class="pc">
        <li><a href="<?php echo home_url(); ?>#about">About</a></li>
        <li><a href="<?php echo home_url(); ?>#skills">Skills</a></li>
        <li><a href="<?php echo home_url(); ?>#works">Works</a></li>
        <li><a href="<?php echo home_url(); ?>#contact">Contact</a></li>
      </ul>
    </nav>
  </header>
  
  <?php endif; ?>