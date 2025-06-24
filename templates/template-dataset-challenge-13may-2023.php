<?php

/**
 * Template Name: Dataset Challenge
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header(); ?>
<main id="site-content" role="main">
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header">
      <div class="container">
        <div class="onyx-inner-header">
          <h1 class="onyx-inner-title"><?php echo $post->post_title; ?></h1>
          <div class="breadcrumbs onyx-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <ul>
              <?php if (function_exists('bcn_display')) {
                bcn_display();
              } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="entry-content">
       
      <div class="container">
        <div class="onyx-page-details">
           
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-img">
                <!-- <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post), 'full'); ?>"> -->
                <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
                <img width="<?php echo $image_data[1]; ?>" height="<?php echo $image_data[2]; ?>" src="<?php echo $image_data[0]; ?>" class="img-fluid">
              </div>
            </div>
           
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-top">
                <!-- <h2><?php echo get_field('main_page_title'); ?></h2> -->
                <?php the_content(); ?>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-bottom onyx-win-voucher">
                <?php echo get_field('voucher_content'); ?>
                <div class="onyx-win-voucher onyx-win-voucher-center">
                  <h3><?php echo get_field('badge_title'); ?></h3>
                  <img src="<?php echo esc_url(get_field('badge_image')['url']); ?>" width="<?php echo (get_field('badge_image')['width']); ?>" height="<?php echo (get_field('badge_image')['height']); ?>" class="img-fluid" />
                </div>
                <?php echo get_field('badge_content'); ?>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-bottom data-chalange">
                <h4>Data DNA - Dataset Challenge</h4>
                <div class="row">
                  <div class="col-xl-6 col-lg-6-col-sm-6 col-sm-12 col-12">
                    <div class="data-chalange-img">
                      <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
                      <img width="<?php echo $image_data[1]; ?>" height="<?php echo $image_data[2]; ?>" src="<?php echo $image_data[0]; ?>" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6-col-sm-6 col-sm-12 col-12">
                    <div class="data-chalange-content">
                      <h5><?php echo get_field('datset_title'); ?></h5>
						<?php $link = get_field('click_here_button');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self'; ?>
                     <a href="<?php echo esc_url( $link_url ); ?>" target="_blank" class="onyx-btn onyx-btn-primary">Click here</a><?php endif; ?>
                    </div>
                  </div>
                </div>
                <p class="my-3 text-center"><?php echo get_field('dataset_sub_title'); ?></p>
              </div>
              <div class=" onyx-page-details-bottom previews-challenge">
                <h4 class="previews-challenge-box-title">View Previous Challenges</h4>
                <div class="row">
                  <?php
                  $args = [
                    'posts_per_page' => -1,
                    'offset' => 0,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'post_type' => 'dataset_challenge',
                    'post_status' => 'publish',
                    'suppress_filters' => true,
                  ];
                  $dataset = get_posts($args);
                  foreach ($dataset as $data) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                      <a href="<?php echo get_permalink($data->ID); ?>" class="onyx-btn onyx-btn-primary w-100"><?php echo $data->post_title; ?></a>
                    </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>

          <div class="onyx-page-details-bottom onyx-datadna-gallery">
            <h4>Onyx Data - Gallery</h4>
            <div class="owl-carousel owl-theme" id="galleryimage">
              <?php while (have_rows('gallery_images')) : the_row();
                $image = get_sub_field('gimg');
              ?>
                <div class="item">
                  <div class="gallery-image">
                    <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>



    </div>

    </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>