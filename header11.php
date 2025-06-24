<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffbb09">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/media/favicon/favicon.webp">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/media/favicon/favicon.webp" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Alice&family=Inter:wght@500;600&family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
     
    <!-- Drawer-menu start -->
    <div class="od-drawer-menu">
      <div class="od-drawer-menu-wrap">
        <a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-drawer-menu-logo">
            <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
          <img src="<?php echo esc_url($image[0]); ?>" class="img-fluid" alt="Onyx-data" width="70" height="100">
        </a>
        <ul class="od-drawer-menu-nav">
            <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'container' => '',
                            // 'items_wrap' => '%3$s',
                            'theme_location' => 'primary',
                            'add_li_class' => 'nav-barItem',
                            'items_wrap' => '<p>%3$s</p>', 
                            // 'walker'=>new my_extended_walker()
                            'walker' => new UL_Class_Walker(),
                        )
                    );
                } elseif (!has_nav_menu('expanded')) {
                    wp_list_pages(
                        array(
                            // 'menu' => "header menu",
                            'match_menu_classes' => true,
                            'show_sub_menu_icons' => true,
                            'title_li' => false,
                            // 'add_li_class' => 'sub-drop11',
                            // 'walker' => new CSS_Menu_Maker_Walker(),
                        )
                    );
                }
                ?>
          <!-- <li><a href="index.html" class="od-active">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Traning</a></li>
          <li><a href="#">Case Studies</a></li>
          <li><a href="#">Data DNA</a></li>
          <li><a href="#">Careers</a></li> -->
        </ul>
        <div class="od-drawer-menu-wrap-btn">
          <a href="<?php echo esc_url(site_url('contact-us')); ?>" class="od-btn">Contact Us</a>
        </div>
      </div>
    </div>
    <!-- Drawer-menu-end -->
    <!-- Overlay -->
    <div class="od-overlay"></div>
    <!-- Header start-->
    <Header class="od-header">
      <div class="container">
        <div class="od-header-wrap">
          <a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-header-logo" aria-label="Logo">
             <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
            <img src="<?php echo esc_url($image[0]); ?>" alt="Onyx Data" class="img-fluid" width="70" height="100">
          </a>
          <div class="od-header-nav">
            <ul class="sub-drop-menu">
               <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'container' => '',
                            'items_wrap' => '%3$s',
                            'theme_location' => 'primary',
                            'add_li_class' => 'nav-barItem',
                            'walker' => new UL_Class_Walker(),
                        )
                    );
                } elseif (!has_nav_menu('expanded')) {
                    wp_list_pages(
                        array(
                            // 'menu' => "header menu",
                            'match_menu_classes' => true,
                            'show_sub_menu_icons' => true,
                            'title_li' => false,
                            
                        )
                    );
                }
                ?>
              <!-- <li><a href="index.html" class="od-active" aria-label="Home">Home</a></li>
              <li><a href="#" aria-label="About">About</a></li>
              <li><a href="#" aria-label="Services">Services</a></li>
              <li><a href="#" aria-label="Traning">Traning</a></li>
              <li><a href="#" aria-label="Case studies">Case Studies</a></li>
              <li><a href="#" aria-label="Data DNA">Data DNA</a></li>
              <li><a href="#" aria-label="Careers">Careers</a></li> -->
            </ul>
          </div>
          <div class="od-header-nav-button">
            <a href="<?php echo esc_url(site_url('contact-us')); ?>" class="od-btn" aria-label="Contact us">Contact Us</a>
            <div class="od-header-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </Header>
    <!-- Header end -->