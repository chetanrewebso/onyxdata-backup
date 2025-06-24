<?php

/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>
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

                <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
                <img width="<?php echo $image_data[1]; ?>" height="<?php echo $image_data[2]; ?>" src="<?php echo $image_data[0]; ?>" class="img-fluid">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-bottom onyx-win-voucher">
                <?php echo get_post_meta($post->ID, 'page_content1', true); ?>
              </div>
            </div>
            <!-- Challenge Winner -->
            <?php $chlaimg =  get_field('challenge_winner_entry_image');
            $chlacontent =  get_field('challenge_winner_entry_content');
            if (!empty($chlaimg) && !empty($chlacontent)) : ?>
              <h3>Challenge Winner</h3>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="onyx-page-details-img">
                  <img width="<?php echo $image_data[1]; ?>" height="<?php echo $image_data[2]; ?>" src="<?php echo esc_url($chlaimg['url']); ?>" class="img-fluid">
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="onyx-page-details-bottom onyx-win-voucher">
                  <?php echo $chlacontent; ?>
                </div>
              </div><?php endif; ?>
            <!-- challenges winner end -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-bottom onyx-win-voucher onyx-win-voucher-center">
                <?php echo the_content(); ?>
				   <?php
                                //$link = get_field('form_download_link_button');
                                //if( $link ):
                                //$link_url = $link['url'];
                                //$link_title = $link['title'];
                                //$link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
<!--                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     <div class="onyx-download-template-form">
                            <form name="downloadReport" id="downloadReport" method="post" action=""> 
                                <div class="form-group">
                                    <label for="onyx-d-name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="onyx-d-name" name="first_name" placeholder="John Deo" required>
                                </div>
                                <div class="form-group">
                                    <label for="onyx-d-email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="onyx-d-email" name="email_address" placeholder="johndeo@gmail.com" required>
                                </div>
                               
                                <input type="button" class="onyx-btn onyx-btn-primary" id="submitDemo" name="downloadReportBtn" value="Download">
                            </form>
                        </div>
                 </div> -->
                <?php $images = get_field('challenge_entries_gallery');
                if ($images) : ?>
                  <div class="onyx-page-details-bottom onyx-datadna-gallery">
                    <h3>Entries</h3>
                    <div class="owl-carousel owl-theme" id="galleryimage">
                      <?php foreach ($images as $image) : ?>
                        <div class="item">
                          <div class="gallery-image">
                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" class="img-fluid">
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div><?php endif; ?>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="onyx-page-details-bottom previews-challenge">
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

          <?php $images = get_field('gallery');
          if ($images) :  ?>
            <div class="onyx-page-details-bottom onyx-datadna-gallery">
              <h3>Onyx Data - Gallery</h3>
              <div class="owl-carousel owl-theme" id="galleryimage">
                <?php foreach ($images as $image) : ?>
                  <div class="item">
                    <div class="gallery-image">
                      <img src="<?php echo $image['sizes']['thumbnail']; ?>" class="img-fluid">
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div><?php endif; ?>
        </div>
      </div>
    </div>
     <script>
            jQuery(document).ready(function() {
                jQuery('#submitDemo').click(function() {
                    // alert('kk');
                var url = '<?php echo esc_url($link_url) ?>';
                window.location.href = url;

                });
            });
    </script>
  </article>
</main>
<?php get_footer(); ?>