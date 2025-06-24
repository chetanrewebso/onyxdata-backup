<?php

/**
 * Template Name: Blog Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_header();
?>

<main id="site-content" role="main">
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header">
      <div class="container">
        <div class="onyx-inner-header">
          <div class="row">
            <div class="onyx-inner-title"><?php echo $post->post_title; ?></div>
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
    </div>
    </div>
    <div class="entry-content">
      <?php while (have_posts()) : the_post(); ?>
        <div class="onyx-inner">
          <div class="onyx-inner-header">
            <div class="container">
              <div class="row">
                <div class="onyx-inner-title"><?php echo $post->post_title; ?></div>
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
          <div class="onyx-datadna-content">
            <div class="container">
              <div class="row">
                <?php $args = array(
                  'posts_per_page' => 6,
                  'offset' => 0,
                  'orderby' => 'date',
                  'order' => 'ASC',
                  'post_type' => 'blog',
                  'post_status' => 'publish',
                  'suppress_filters' => true,
                );
                $posts_array = get_posts($args);
                foreach ($posts_array as $service) { ?>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="onyx-blog-box">
                      <div class="onyx-blog-box-image"><img width="400" height="500" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($service->ID), 'small'); ?>"></div>
                      <div class="onyx-blog-box-content">
                        <div class="onyx-blog-box-content-title"><?php echo $service->post_title; ?></div>
                        <p class="text-p"><?php echo $service->post_content; ?></p>
                        <a href="<?php echo get_permalink($service->ID); ?>" class="readmorebtn">read more</a>
                      </div>
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>
      <?php endwhile;
      wp_reset_query(); ?>
    </div>
  </article>
</main>
<?php get_footer(); ?>