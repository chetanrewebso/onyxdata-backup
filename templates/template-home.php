<?php

/**
 * Template Name: Home Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header(); ?>
<main>
    
  <!-- Banner start -->
  <section class="od-banner overflow-hidden">
    <div class="container">
      <div class="row">
        
        <?php echo do_shortcode('[rev_slider alias="slider-110"][/rev_slider]'); ?>
        <!--  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

              <div class="od-banner-text">

          <span>GOT DATA?</span>
              <h1>MAKE SUCCESS!</h1>
              <p>We are data analytics partner that specialises in using our technology and data expertise to provide end-to-end data strategy and execution form design to build.</p>
              <a href="#" class="od-btn" aria-label="Action">Action</a>
            </div> -->
      </div>
    </div>
  </section>
  <!-- Banner end -->
  <!-- Strategy start -->
  <section class="od-strategy">
    <div class="container">
      <div class="grid">
        <div class="g-col-xxl-6 g-col-xl-6 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12 od-strategy-text">
          <div class="od-heading">
			<!--  <h2>Are You <span>AI Ready?</span></h2> -->
            <h2>
                <?php echo esc_html(get_field('our_strategy_title')); ?>
              </h2>
            <p>
              <?php echo esc_html(get_field('our_strategy_content')); ?>
            </p>
          </div>
          <?php
                  $link = get_field('book_demo_link');
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self'; ?>
          <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn" aria-label="Book demo">
            <?php echo $link_title; ?>
          </a>
          <?php
                      endif;
                  ?>
        </div>
        <div class="g-col-xxl-6 g-col-xl-6 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12">
			 <?php 
			$videofile = get_field('our_strategy_upload_video');
            $videourl = get_field('our_strategy_video_url');
			if( !empty( $videofile ) ){ ?>
        <video width="954" height="535" controls class="tm-mb-40">
          <source src="<?php echo $videofile['url']; ?>" type="video/mp4"> 
        </video>
      <?php }else{ ?>
        <video width="954" height="535" controls class="tm-mb-40">
          <source src="<?php echo $videourl['url']; ?>" type="video/mp4"> 
        </video>
      <?php }?>
      <!-- <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" width="798" height="550" alt="<?php echo esc_attr($image['alt']); ?>"> -->
			

        </div>
      </div>
    </div>
  </section>
 
	
	<!-- Trusted by Start-->
  <section class="od-trusted-by">
    <div class="container">
      <div class="od-heading">
        <h2><?php echo get_field('leading_brands_title'); ?></h2>
        <!-- <h2>Trusted by <span>Leading</span> Brands Across <span>Industries</span></h2> -->
      </div>
  <div class="owl-carousel owl-theme owl-carousel-two">
    <?php
    $leading_brands = get_field('leading_brands');
    if ($leading_brands && is_array($leading_brands)) {
        foreach ($leading_brands as $image_id) {
            $image_url = isset($image_id['url']) ? esc_url($image_id['url']) : '';
            $image_alt = isset($image_id['alt']) ? esc_attr($image_id['alt']) : '';
            ?>
            <div class="item">
                <div class="od-brand-box">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid w-auto" />
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>No brands found.</p>';
    }
    ?>
</div>


   
     
       
        <!-- <div class="g-col-xxl-2 g-col-xl-2 g-col-lg-3 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-brand-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/1.png" width="200" height="200" alt="Logo" class="img-fluid w-auto">
          </div>
        </div>
        <div class="g-col-xxl-2 g-col-xl-2 g-col-lg-3 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-brand-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/2.png" width="200" height="200" alt="Logo" class="img-fluid w-auto">
          </div>
        </div>
        <div class="g-col-xxl-2 g-col-xl-2 g-col-lg-3 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-brand-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/3.png" width="200" height="200" alt="Logo" class="img-fluid w-auto">
          </div>
        </div>
        <div class="g-col-xxl-2 g-col-xl-2 g-col-lg-3 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-brand-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/4.png" width="200" height="200" alt="Logo" class="img-fluid w-auto">
          </div>
        </div>
        <div class="g-col-xxl-2 g-col-xl-2 g-col-lg-3 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-brand-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/5.png" width="200" height="200" alt="Logo" class="img-fluid w-auto">
          </div>
        </div>
        <div class="g-col-xxl-2 g-col-xl-2 g-col-lg-3 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-brand-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/6.png" width="200" height="200" alt="Logo" class="img-fluid w-auto">
          </div>
        </div> -->
      </div>
      <!-- Testimonial -->
      <div class="od-testimonial">
        <div class="owl-carousel owl-theme od-testimonial-slide">
          <?php
            $args = array(
                'numberposts' => 3,
                'post_type'   => 'testimonial',
                'order' => 'DESC',
                'post_status' => 'publish',
              );

              $latest_testimonial = get_posts( $args );
              foreach($latest_testimonial as $testimonial){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ), 'single-post-thumbnail' );
                $t_logo = get_field('logo', $testimonial->ID);
            ?>
          <div class="item">
            <div class="od-testimonial-box">
              <div class="od-box-top">
                <p>
                  <?php echo $testimonial->post_content; ?>
                </p>
                 <div class="od-client-img">
                  <img src="<?php  echo esc_url($image[0]); ?>" alt="client" width="100" height="100" class="">
                </div>

              </div>
              <div class="od-box-bottom">
               <div class="od-brand-img">
                  <img src="<?php echo esc_url($t_logo['url']); ?>" width="" height="" alt="Logo" class="img-fluid w-auto">
                </div>
                <div class="od-client">
                  <p class="od-client-name">
                    <?php echo $testimonial->post_title; ?>
                  </p>
                  <p class="od-client-role">
                    <?php echo get_field('role',$testimonial->ID); ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="item">
            <div class="od-testimonial-box">
              <div class="od-box-right">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <div class="od-brand-img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/2.png" width="" height="" alt="Logo" class="img-fluid w-auto">
                </div>
              </div>
              <div class="od-box-left">
                <div class="od-client-img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Leon-Gordon-Onyx-Data.jpg" alt="client" width="100" height="100" class="">
                </div>
                <div class="od-client">
                  <p class="od-client-name">Jimmy Grewal</p>
                  <p class="od-client-role">Director</p>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="od-testimonial-box">
              <div class="od-box-right">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <div class="od-brand-img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand/2.png" width="" height="" alt="Logo" class="img-fluid w-auto">
                </div>
              </div>
              <div class="od-box-left">
                <div class="od-client-img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Leon-Gordon-Onyx-Data.jpg" alt="client" width="100" height="100" class="">
                </div>
                <div class="od-client">
                  <p class="od-client-name">Jimmy Grewal</p>
                  <p class="od-client-role">Director</p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>
  <!-- Trusted by End-->

  

  <section class="od-partner">
    <div class="container">
      <div class="od-heading">
        <h2>Our <span>Key Partners</span></h2>
      </div>
      <div class="owl-carousel owl-theme od-partner-slide" id="partnerimage">
        <?php if( have_rows('partners_images_repeater_home') ):
                  while ( have_rows('partners_images_repeater_home') ) : the_row();
                  $Image1 = get_sub_field('imgpartner');
                ?>
        <div class="item">
          <div class="od-partner-box">
            <img src="<?php echo esc_url($Image1['url']); ?>" width="<?php  echo esc_attr($Image1['width']); ?>" height="<?php  echo esc_attr($Image1['height']); ?>" alt="Logo" class="img-fluid w-auto">
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  

  <section class="od-case-study">
    <div class="container">
      <div class="od-heading">
        <h2><?php echo get_field('case_studies_title',7); ?></h2>
        <h3><?php echo get_field('case_studies_heading',7); ?></h3>
        <p><?php echo get_field('case_studies_content',7); ?></p>
        <?php
          $link = get_field('case_studies_button',7);
          if( $link ):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn"> <?php echo $link_title; ?> </a>
        <?php endif; ?>
      </div>
      <div class="grid">
      <?php
            $args = array(
                'numberposts' => 3,
                'post_type'   => 'case_studie',
                'orderby' => 'publish_date',
                'order' => 'DESC',
                'post_status' => 'publish',
              );

              $caseStudies = get_posts( $args );
              foreach($caseStudies as $c_study){
                $image = get_field('image',$c_study->ID);
                //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $c_study->ID ), 'single-post-thumbnail' );
            ?>
        <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-4 g-col-md-12 g-col-sm-12 g-col-12 od-case-study-box">
          <div class="od-case-study-box-img">
              <?php
                if (!empty($image)) : ?>
            <a href="<?php echo esc_url(get_permalink($c_study->ID)); ?>">
            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" width="520" height="400" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($c_study->post_title); ?>">
                </a>
            <?php endif; ?>
          </div>         
          <h4><a href="<?php echo esc_url(get_permalink($c_study->ID)); ?>"><?php echo esc_html($c_study->post_title); ?></a></h4>          
        </div>
        <?php } ?>
        <!-- <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-4 g-col-md-12 g-col-sm-12 g-col-12 od-case-study-box">
          <div class="od-case-study-box-img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/media/case-study/image.webp" class="img-fluid" width="520" height="368" alt="Transforming Operations">
          </div>
          <h4><a href="#">Transforming Operations at a Global Motorcycle Manufacturer</a></h4>
        </div>
        <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-4 g-col-md-12 g-col-sm-12 g-col-12 od-case-study-box">
          <div class="od-case-study-box-img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/media/case-study/image.webp" class="img-fluid" width="520" height="368" alt="Optimising Container Management">
          </div>
          <h4><a href="#">Optimising Container Management How Onyx Data Automated Shipping Port Operations and Reduced Fines by 30%</a></h4>
        </div> -->
      
      </div>
    </div>
  </section>

  <!-- Approach start -->
  <!-- <section class="od-approach">
    <div class="container">
      <div class="od-heading">
        <h2>
          <?php echo get_field('approach_heading') ?>
        </h2>
      </div>

      <div class="od-approach-tab">
        <?php
                if( have_rows('approach_repeaters') ):
                  while ( have_rows('approach_repeaters') ) : the_row();
                $title = get_sub_field('title');
                $act_tlt = '';
                if(get_row_index()==1){
                  $act_tlt = 'active';
                }
                ?>
        <a href="#approach_<?php echo get_row_index(); ?>" class="<?php echo esc_attr($act_tlt); ?>">
          <?php echo esc_html($title);  ?>
        </a>
        <?php
            endwhile;
              endif;
            ?>
      </div>
      <div class="scroll-tab-content">
        <?php
                if( have_rows('approach_repeaters') ):
                  while ( have_rows('approach_repeaters') ) : the_row();
                    $tab_icon = get_sub_field('tab_icon');
                    $title = get_sub_field('title');
                    $tab_content = get_sub_field('tab_content');
                    $act = '';
                    $indx = trim(get_row_index());
                if((int)$indx==1){
                  $act = 'active';
                }
                ?>
        <div class="scroll-tab <?php echo esc_attr($act); ?>" id="approach_<?php echo esc_attr($indx); ?>">
          <div class="row">

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 col">
              <div class="od-approach-img active-img" id="rotate<?php echo $indx; ?>">
                <?php echo $tab_icon;  ?>
              </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 col">
              <div class="od-approach-text">
                <h3>
                  <?php echo esc_html($title);  ?>
                </h3>
                <p>
                  <?php echo esc_html($tab_content);  ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php
              endwhile;
              endif;
            ?>
      </div>
    </div>
  </section> -->
  <!-- Approach end -->

  <!-- Why onyx? start-->
  <section class="od-why">
    <div class="container">
      <div class="od-heading">
        <h2>
          <?php echo get_field('title',''); ?>
        </h2>
      </div>
      <div class="grid">
        <?php
                if( have_rows('why') ):
                  while ( have_rows('why') ) : the_row();

                $Image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
		  $link = get_sub_field('link');
                ?>
        <a href="<?php echo esc_html($link); ?>" class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-6 g-col-sm-12 g-col-12">

          <div class="od-card">
            <div class="od-card-img">
              <img src="<?php  echo esc_url($Image['url']); ?>" width="<?php  echo esc_attr($Image['width']); ?>" height="<?php  echo esc_attr($Image['height']); ?>" class="img-fluid" alt="<?php echo esc_attr($title); ?>" title="<?php  esc_attr_e($title); ?>" />
            </div>
            <div class="od-card-body">

              <h3>
                <?php echo esc_html($title); ?>
              </h3>
              <p>
                <?php echo esc_html($content); ?>
              </p>
            </div>
          </div>
        </a>
        <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </section>
  <!-- Why onyx? end -->
<!-- Free Consultation -->
  <div class="od-free-cons">
    <a href="<?php echo get_field('our_services_button_1_url'); ?>" class="od-btn"><?php echo get_field('our_services_button_1_title'); ?> ➤ </a>
  </div>
  <!-- Free Consultation -->
	
	<section class="od-our-service">
    <div class="container">
      <div class="od-heading">
      <?php echo get_field('our_services_title'); ?>
      </div>
      <div class="od-service-content">
        <div class="owl-carousel owl-theme od-service-slide">
          <?php
            $args = array(
                'numberposts' => -1,
                'post_type'   => 'our_services',
                'order' => 'DESC',
                'post_status' => 'publish',
              );

              $latest_serv = get_posts( $args );
              foreach($latest_serv as $serv){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $serv->ID ), 'single-post-thumbnail' );
                $t_logo = get_field('logo', $serv->ID);
                $sub_title = get_field('content_title', $serv->ID);
                $sub_content = get_field('content', $serv->ID);
            ?>

          <div class="item">
            <div class="od-service-box">
              <div class="grid">
                <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12">
                  <div class="od-service-img">
                  <img src="<?php echo esc_url($image[0]); ?>" alt="client" width="512" height="250" class="">
              </div>
                </div>
                <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12 od-service-text">
                  <h6><?php echo $serv->post_title; ?></h6>
                  <?php echo $serv->post_content; ?>
                </div>
                <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12 od-service">
                  <div class="od-service-list">
                    <h6><?php echo $sub_title; ?></h6>
                    <?php echo $sub_content; ?>
                  </div>
                  <a href="<?php echo get_field('our_services_button_1_url'); ?>" class="od-btn"><?php echo get_field('our_services_button_1_title'); ?></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="item">
            <div class="od-service-box">
              <div class="grid">
                <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-6 g-col-sm-12 g-col-12">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/project.png" alt="client" width="512" height="360" class="">
                </div>
                <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-6 g-col-sm-12 g-col-12 od-service-text">
                  <h6>AI & Data Analytics Consulting</h6>
                  <p>Unlock the power of analytics and AI.
                    Our team will design and implement advanced models to give your business a competitive edge with data-driven insights.</p>
                </div>
                <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-6 g-col-md-6 g-col-sm-12 g-col-12 od-service">
                  <div class="od-service-list">
                    <h6>Includes:</h6>
                    <ul>
                      <li>Monthly Power BI report modifications</li>
                      <li>Data model tuning and optimizations</li>
                      <li>On-demand support for analytics issues</li>
                      <li>Quarterly health checks and strategy updates</li>
                    </ul>
                  </div>
                  <a href="#" class="od-btn">Schedule a Free Consultation</a>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <a href="<?php echo get_field('our_services_button_2_url'); ?>" class="od-btn"><?php echo get_field('our_services_button_2_title'); ?></a>
      </div>
    </div>
  </section>
  <!-- Our services end -->

  <!-- latest story start -->
  <section class="od-story">
    <div class="container">
      <div class="od-heading">
        <h2>
          <?php echo get_field('latest_stories_title') ?>
        </h2>
        <h3><?php echo get_field('sub_title') ?></h3>
        <p><?php echo get_field('sub_content') ?></p>
        <!-- <a href="<?php //echo esc_url( $link_url ); ?>" class="od-btn" aria-label="view all blog">View all blog</a> -->
        <?php
            $link = get_field('latest_stories_button');
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn" aria-label="view all blog"><?php echo $link_title; ?></a>
        <?php endif;  ?>
      </div>
      <div class="grid">
        <?php
            $args = array(
                'numberposts' => 3,
                'post_type'   => 'post',
                'order' => 'DESC',
                'post_status' => 'publish',
              );

              $latest_article = get_posts( $args );
              foreach($latest_article as $post){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            ?>
        <!-- col1 -->
        <div class="g-col-xxl-4 g-col-xl-4 g-col-lg-4 g-col-md-6 g-col-sm-12 g-col-12">
          <div class="od-story-item">
            <div class="od-story-item-img">
              <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                <img src="<?php  echo esc_url($image[0]); ?>" class="img-fluid" width="520" height="400" alt="<?php echo esc_attr($post->post_title); ?>" title="<?php echo esc_attr($post->post_title); ?>">
              </a>
            </div>
            <!-- <div class="od-story-item-content"> -->
            <!-- <div class="od-story-category">
                <?php $category_object = get_the_category($post->ID);
                  echo $category_object[0]->name;?>
              </div> -->
            <h3>
              <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                <?php echo esc_html($post->post_title); ?>
              </a>
            </h3>
            <!-- </div> -->
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Talk to us -->
  <section class="od-talk">
    <div class="container">
      <div class="od-heading">
        <h2><?php echo get_field('talk_to_us_title',7); ?></h2>
        <p><?php echo get_field('talk_to_us_content',7); ?></p>
        <?php
                  $link = get_field('talk_to_us_button',7);
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn"><?php echo $link_title; ?></a>
        <?php endif; ?>

      </div>
    </div>
  </section>
</main>

  <script>
      jQuery(document).ready(function($) {
  $('.owl-carousel-two').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    dots: false,
    nav: false,
    responsive: {
      0: { items: 2 },
      600: { items: 2 },
      1000: { items: 5 },
    }
  });
});

  </script>


    
      


      

   

<?php get_footer(); ?>