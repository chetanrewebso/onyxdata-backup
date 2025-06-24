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
    <section class="od-banner">
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
      </div>
    </section>
    <!-- Banner end -->

    <!-- Why onyx? start-->
    <section class="od-why">
      <div class="container">
        <div class="od-heading">
          <h2><?php echo get_field('title',''); ?></h2>
        </div>
        <div class="row">
          <?php
                if( have_rows('why') ):
                  while ( have_rows('why') ) : the_row();

                $Image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                ?>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            <div class="od-card">
              <div class="od-card-body">
                <div class="od-card-img">
                <img src="<?php  echo esc_url($Image['url']); ?>" width="<?php  echo esc_attr($Image['width']); ?>" height="<?php  echo esc_attr($Image['height']); ?>" class="img-fluid" alt="<?php echo esc_attr($title); ?>" title="<?php  esc_attr_e($title); ?>" />
                </div>
                <h3><?php echo esc_html($title); ?></h3>
                <p><?php echo esc_html($content); ?></p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
            <?php endif; ?>

        </div>

      </div>
    </section>
    <!-- Why onyx? end -->
    
    <section class="od-partner">
        <div class="container">
          <div class="od-heading">
            <h2>Our <span>Key Partners</span></h2>
          </div>
          <div class="owl-carousel owl-theme" id="partnerimage">
                <?php if( have_rows('partners_images_repeater_home') ):
                  while ( have_rows('partners_images_repeater_home') ) : the_row();
                  $Image1 = get_sub_field('imgpartner');
                ?>
            <div class="item">
              <div class="od-partner-box">
                <img src="<?php echo esc_url($Image1['url']); ?>" width="317" height="84" alt="Logo" class="img-fluid">
              </div>
            </div>
              <?php endwhile; ?>
              <?php endif; ?>
          </div>
        </div>
    </section>

    <!-- Strategy start -->
    <section class="od-strategy">
      <div class="container">

        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="od-strategy-text">
              <div class="od-heading">
                <h2><?php echo esc_html(get_field('our_strategy_title')); ?></h2>
                <h3><?php echo esc_html(get_field('our_strategy_content')); ?></h3>
              </div>
              <?php
                  $link = get_field('book_demo_link');
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                  <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn" aria-label="Book demo"><?php echo $link_title; ?></a>
                      <?php
                      endif;
                  ?>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- Stategy end -->

    <!-- Approach start -->
    <section class="od-approach">
      <div class="container">
        <div class="od-heading">
          <h2><?php echo get_field('approach_heading') ?></h2>
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
          <a href="#approach_<?php echo get_row_index(); ?>" class="<?php echo esc_attr($act_tlt); ?>"><?php echo esc_html($title);  ?></a>
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
                  <h3><?php echo esc_html($title);  ?></h3>
                  <p><?php echo esc_html($tab_content);  ?></p>
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
    </section>
    <!-- Approach end -->

    <!-- latest story start -->
    <section class="od-story">
      <div class="container">
        <div class="od-heading">
          <h2><?php echo get_field('latest_stories_title') ?></h2>
          <?php
                  $link = get_field('latest_stories_button');
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                  <a href="<?php echo esc_url( $link_url ); ?>" class="od-btn" aria-label="view all">View all</a>
                      <?php
                      endif;
                  ?>
        </div>
        <div class="row">
        <?php
            $args = array(
                'numberposts' => 2,
                'post_type'   => 'post',
                'order' => 'DESC',
                'post_status' => 'publish',
              );

              $latest_article = get_posts( $args );
              foreach($latest_article as $post){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            ?>
          <!-- col1 -->
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="od-story-item">
              <div class="od-story-item-img ratio ratio-4x3">
              <img src="<?php  echo esc_url($image[0]); ?>" class="img-fluid" width="80" height="76" alt="<?php echo esc_attr($post->post_title); ?>" title="<?php echo esc_attr($post->post_title); ?>">
              </div>
              <div class="od-story-item-content">
                <div class="od-story-category"><?php $category_object = get_the_category($post->ID);
                  echo $category_object[0]->name;?></div>
                <h3>
                  <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html($post->post_title); ?></a>
                </h3>
              </div>
            </div>
          </div>

          <?php } ?>
        </div>
      </div>
    </section>
</main>
<?php get_footer(); ?>