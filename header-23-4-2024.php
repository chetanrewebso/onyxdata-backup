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
        <!-- <ul class="od-drawer-menu-nav"> -->
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
                            // 'walker' => new UL_Class_Walker(),
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
        <!-- </ul> -->
        <div class="od-drawer-menu-wrap-btn">
          <a href="<?php echo esc_url("https://onyxdata.co.uk/contact-us/"); ?>" class="od-btn">Contact Us</a>
        </div>
      </div>
    </div>
    <!-- Drawer-menu-end -->
    <!-- Signup drawer -->
    <div class="od-signup-drawer">
      <div class="od-signup-drawer-wrap">
        <div class="od-signup-drawer-wrap-header">
          <div class="od-signup-drawer-wrap-header-head">
            <a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-drawer-menu-logo">
              <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
              <img src="<?php echo esc_url($image[0]); ?>" class="img-fluid" alt="Onyx-data" width="70" height="100">
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg od-sign-close" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
          </div>
          <h1>We Can Simplify Your Data</h1>
          <a href="#" class="od-btn od-btn-login">Login</a>
        </div>
        <div class="od-signup-drawer-wrap-body">
          <h2>Create Account</h2>
          <p>Join a community of the most creative Business Intelligence Professionals</p>
          <div class="od-account-btn">
            <?php echo do_shortcode('[miniorange_social_login shape="longbuttonwithtext" theme="default" ]');?>
          </div>
          <form id="sign_up_form" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <lable for="email">Email</lable>
              <input type="email" class="form-control" palceholder="enter email" name="user_email" id="user_email">
            </div>
            <div class="form-group">
              <div class="form-group">
                <div class="od-password">
                  <lable for="password">Password
                </div>
                </lable>
                <a href="https://onyxdata.co.uk/wp-login.php?action=lostpassword">Forgot Password?</a>
              </div>
              <input type="password" class="form-control" palceholder="password" name="user_pass" id="user_pass">
            </div>
            <div class="form-group">
              <lable for="c_password">Confirm Password</lable>
              <input type="password" class="form-control" palceholder="confirm password" name="c_password" id="c_password">
              <div class="sign_success"></div>
              <div class="sign_error"></div>
            </div>
            <input type="hidden" name="action" value="sign_up_form">
            <button type="submit" id="submit_btn" name="submit_btn" class="od-btn">Submit</button>
          </form>

          <p class="od-footer-text">By Signing Up to <a href="<?php echo site_url();?>">onyxdata.co.uk</a> you Agree to onyxdata's <a href="https://onyxdata.co.uk/terms-conditions/">Terms of Service</a>,<a href="https://onyxdata.co.uk/privacy-policy/"> Privacy Policy</a></p>
        </div>
      </div>
    </div>
    <!-- Signup drawer -->
    <!-- Login drawer -->
    <div class="od-login-drawer">
      <div class="od-login-drawer-wrap">
        <div class="od-login-drawer-wrap-header">
          <div class="od-login-drawer-wrap-header-head">
            <a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-drawer-menu-logo">
              <?php
                      $custom_logo_id = get_theme_mod('custom_logo');
                      $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
              <img src="<?php echo esc_url($image[0]); ?>" class="img-fluid" alt="Onyx-data" width="70" height="100">
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg od-login-close" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
          </div>
          <h1>We Can Simplify Your Data</h1>
          <a href="#" class="od-btn od-btn-signup">Or Signup</a>
        </div>
        <div class="od-login-drawer-wrap-body">
          <h2>Welcome Back!</h2>
          <p>Join a community of the most creative Business Intelligence Professionals</p>
          <div class="od-account-btn">
            <?php echo do_shortcode('[miniorange_social_login shape="longbuttonwithtext" theme="default" ]');?>
            <!-- <a href="#" class="od-btn">Signup with Google</a>
            <a href="#" class="od-btn">Signup with Google</a>
            <a href="#" class="od-btn">Signup with Google</a> -->
          </div>
          <form id="login" action="login" method="post">
            <div class="form-group">
              <lable for="email">Email</lable>
              <input type="email" class="form-control" palceholder="enter email" name="user_email" id="user_email">
            </div>
            <div class="form-group">
              <div class="od-password">
                <lable for="password">Password

                </lable>
                <a href="https://onyxdata.co.uk/wp-login.php?action=lostpassword">Forgot Password?</a>
              </div>
              <input type="password" class="form-control" palceholder="password" name="user_pass" id="user_pass">
            </div>
            <input type="hidden" name="action" value="login_form">
            <button type="submit" id="login_btn" name="submit" class="od-btn" value="Login">Continue Via Email</button>
          </form>

          <p class="od-footer-text">By Signing Up to <a href="<?php echo site_url();?>">onyxdata.co.uk</a> you Agree to onyxdata's <a href="https://onyxdata.co.uk/terms-conditions/">Terms of Service</a>,<a href="https://onyxdata.co.uk/privacy-policy/"> Privacy Policy</a></p>
        </div>
      </div>
    </div>
    <!-- Login drawer -->
   
    <!-- Overlay -->
    <div class="od-overlay"></div>
    <!-- Header start-->
    <Header class="od-header" id="header">
      <div class="container">
        <div class="od-header-wrap">
          <a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-header-logo" aria-label="Logo">
             <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
            <img src="<?php echo esc_url($image[0]); ?>" alt="Onyx Data" class="img-fluid" width="70" height="100">
          </a>
          <div class="od-header-nav">
            <!-- <ul class="sub-drop-menu"> -->
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
            <!-- </ul> -->
          </div>
          <div class="od-header-nav-button ">
            <?php if ( !is_user_logged_in() ) {  ?>
<!--             <a href="#" class="od-btn-signup">Sign up</a>
            <a href="#" class="od-btn-login">Login</a> -->
              <?php } ?>
            <div class="od-header-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
              </svg>
            </div>

          <?php 
          if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            $user_email= $current_user->user_email;
            $char = substr($user_email, 0, 1);
           $current_user = wp_get_current_user();
             ?>
          <?php if ( is_user_logged_in() ) {  ?>
          <div class="od-header-nav-user-profile d-none">
            <!-- Dropdown -->
            <div class="dropdown">
              <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span><?php echo $char ?></span>
              </button>
              <ul class="dropdown-menu">
                <li class="user-name-item">
                  <span class="dropdown-item user-name"><?php echo $char ?></span>
                  <?php echo $current_user->user_nicename;  $nicename = $current_user->user_nicename;?>
                </li>
                <?php } ?>
                <li>
                  <a class="dropdown-item" href="<?php echo site_url().'/author/'.$nicename;?>">
                    About Me &raquo;
                  </a>
                  <!-- <ul class="dropdown-menu dropdown-submenu">
                    <li>
                      <a class="dropdown-item" href="#">About Me &raquo; </a> -->
                      <ul class="dropdown-menu dropdown-submenu">
                        <li>
                          <a class="dropdown-item" href="<?php echo site_url().'/author/'.$nicename;?>">View</a>
                        </li>

                        <li>
                          <a class="dropdown-item" href="<?php echo site_url('edit-profile'); ?>">Edit</a>
                        </li>

                      <!-- </ul>
                    </li> -->
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <?php } ?>
          </div>
          <!--<div class="od-header-nav-button">-->
          <!--  <a href="<?php echo esc_url("https://onyxdata.co.uk/contact-us/"); ?>" class="od-btn" aria-label="Contact us">Contact Us</a>-->
          <!--  <div class="od-header-icon">-->
          <!--    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">-->
          <!--      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />-->
          <!--    </svg>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      </div>
    </Header>
    <!-- Header end -->