<?php

/**
 * Template Name: About Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
<main id="site-content" role="main">
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header onyx-about-header" style="background-image:url(<?php  echo esc_url($image[0]); ?>);">
      <div class="container">
        <div class="onyx-inner-header">
          <h1 class="onyx-inner-title">
            <?php echo get_field('header_title');?>
          </h1>
          <p>
            <?php echo get_field('header_content');?>
          </p>
          <a href="<?php echo get_field('header_link'); ?>" class="od-btn">Schedule a free consultation ➤</a>
        </div>
      </div>
    </div>
    <div class="entry-content">
		<?php while (have_posts()) : the_post(); ?>

      <section class="onyx-about-content">
        <div class="container">
          <div class="grid">
            <div class="g-col-xxl-8 g-col-xl-8 g-col-md-6 g-col-lg-6 g-col-sm-12 g-col-12 onyx-about-content-text">
              <!-- <p>We are more than just consultants. At Onyx Data, we partner with businesses to deliver real, measurable
                outcomes through AI and data-driven strategies.
                Backed by decades of combined expertise and recognised globally through Microsoft’s MVP program, our team leads digital transformation efforts that drive growth, efficiency, and innovation.</p> -->
              <?php echo $post->post_content; ?>
				<?php 
				$mp4_video = get_field('video');
if( $mp4_video ): ?>
				<div class="onyx-video">
					
				 <video width="100%" height="100%" controls>
				  <source src="<?php echo $mp4_video['url']; ?>" type="video/mp4">
				Your browser does not support the video tag.
				</video> 
					
				</div>
<?php endif; ?>
				
              <?php $about_images_1 = get_field('about_images_1', $post->ID);
                $about_images_2 = get_field('about_images_2', $post->ID);
                $about_images_3 = get_field('about_images_3', $post->ID);
                $about_images_4 = get_field('about_images_4', $post->ID);
                $about_images_5 = get_field('about_images_5', $post->ID);
              ?>
            </div>
            <div class="g-col-xxl-4 g-col-xl-4 g-col-md-6 g-col-lg-6 g-col-sm-12 g-col-12">
              <div class="onyx-about-img">
                <div class="onyx-img-row row1">
                  <img src="<?php echo esc_url($about_images_1['url']); ?>" width="120" height="120" alt="About" class="img-fluid">
                </div>
                <div class="onyx-img-row row2">
                  <img src="<?php echo esc_url($about_images_2['url']); ?>" width="120" height="120" alt="About" class="img-fluid">
                  <img src="<?php echo esc_url($about_images_3['url']); ?>" width="120" height="120" alt="About" class="img-fluid">
                </div>
                <div class="onyx-img-row row3">
                  <img src="<?php echo esc_url($about_images_4['url']); ?>" width=" 120" height="120" alt="About" class="img-fluid">
                  <img src="<?php echo esc_url($about_images_5['url']); ?>" width="120" height="120" alt="About" class="img-fluid">

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Trusted by Start-->
      <section class="od-trusted-by">
        <div class="container">
          <div class="od-heading">
          <h2><?php echo get_field('leading_brands_title',7); ?></h2>
            <!-- <h2>Trusted by <span>Leading</span> Brands Across <span>Industries</span></h2> -->
          </div>
          <div class="owl-carousel owl-theme owl-carousel-two">
            <?php
            $leading_brands = get_field('leading_brands',7);
            $size = 'full';
            // echo "<pre>"; print_r($leading_brands); echo "</pre>";

            ?>
            <?php  foreach( $leading_brands as $image_id ): ?>
            <div class="item">
              <div class="od-brand-box">
                <img src="<?php echo esc_url($image_id['url']); ?>" width="200" height="200" alt="<?php echo esc_attr($image_id['alt']); ?>" class="img-fluid w-auto">
              </div>
            </div>
            <?php endforeach;  ?>

          </div>
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
                //echo "<pre>"; print_r($latest_testimonial); echo "</pre>";
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
            </div>
          </div>
        </div>
      </section>
      <!-- Trusted by End-->
      <!-- partner start-->
      <section class="od-partner">
        <div class="container">
          <div class="od-heading">
            <h2>Our <span>Key Partners</span></h2>
          </div>
          <div class="owl-carousel owl-theme od-partner-slide" id="partnerimage">
            <?php if( have_rows('partners_images_repeater_home',7) ):
                  while ( have_rows('partners_images_repeater_home',7) ) : the_row();
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
      <!-- partner end -->
      <!-- Vission start -->
      <?php
        if (have_rows('our_journey')) :
          while (have_rows('our_journey')) : the_row();
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          $link = get_sub_field('services_page_url');
          $button_title = get_sub_field('button_title');
          $image = get_sub_field('image');
          ?>
      <section class="od-vission">
        <div class="container">
          <div class="grid">
            <div class="g-col-xxl-8 g-col-xl-8 g-col-md-6 g-col-lg-6 g-col-sm-12 g-col-12 od-vission-text">
              <div class="od-heading">
                <h2>
                  <?php echo $title; ?>
                </h2>
              </div>
              <?php echo $content; ?>
              <a href="<?php echo $link; ?>" class="od-btn">
                <?php echo $button_title; ?>
              </a>
            </div>
            <div class="g-col-xxl-4 g-col-xl-4 g-col-md-6 g-col-lg-6 g-col-sm-12 g-col-12 od-vission-img">
              <img src="<?php echo esc_url($image['url']); ?>" width="" height="" alt="About" class="img-fluid">
            </div>
          </div>
        </div>
      </section>

      <?php endwhile; ?>
      <?php endif; ?>
      <!-- Vission end -->
      <!-- Talk to us -->
      <section class="od-talk">
        <div class="container">
          <div class="od-heading">
            <h2>
              <?php echo get_field('talk_to_us_title',7); ?>
            </h2>
            <p>
              <?php echo get_field('talk_to_us_content',7); ?>
            </p>
            <?php
                  $link = get_field('talk_to_us_button',7);
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn">
              <?php echo $link_title; ?>
            </a>
            <?php endif; ?>

          </div>
        </div>
      </section>
    <?php endwhile;
      wp_reset_query(); ?>
      <?php /* while (have_posts()) : the_post(); ?>
        <div class="onyx-about">
          <div class="container">
            <div class="onyx-about-content">
              <h2><?php echo get_field('about_title');?></h2>
              <p><?php echo get_field('about_content');?></p>
            </div>
          </div>
          <div class="onyx-about-deliver">
            <div class="container">
              <h3><?php echo get_field('about_deliver_title');?></h3>
              <p><?php echo get_field('about_deliver_content');?></p>
            </div>
          </div>
          <div class="onyx-about-chart">
            <div class="container">
              <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="onyx-about-chart-content">
                    <h4><?php echo get_field('about_chart_title');?></h4>
                    <p><?php echo get_field('about_chart_content');?></p>
                  </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">

                  <div class="chart-box">
                    <div class="svg-chart"></div>
                  </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
                  <div class="onyx-chart-comtent"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="onyx-about-recognized">
              <h4><?php echo get_field('about_recognized_title');?></h4>
              <p><?php echo get_field('about_recognized_content');?></p>
              <?php if( get_field( 'about_recognized_image' )) {?>
              <img src="<?php echo esc_url(get_field('about_recognized_image')['url']); ?>" width="1110" height="205" class="img-fluid">
              <?php } ?>
            </div>
            <div class="onyx-about-loved">
				
              <h4><?php echo get_field('why_people_love_text');?></h4>
              <div class="row">
				 <?php if(!empty(get_field('why_people_love_image1'))){ ?>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="<?php echo esc_url(get_field('why_people_love_image1')['url']); ?>" width="792" height="827" class="img-fluid">
                </div><?php } ?><?php if(!empty(get_field('why_people_love_image2'))){?>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="<?php echo esc_url(get_field('why_people_love_image2')['url']); ?>" width="792" height="754" class="img-fluid">
                </div><?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  <?php endwhile;
      wp_reset_query(); */ ?>
  </div>
  </article>
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