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
?>
<style type="text/css">
  .acf-map {
    width: 100%;
    height: 520px;
  }

  .acf-map img {
    max-width: inherit !important;
  }
</style>

<main id="site-content" role="main">
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header">
      <div class="container">
        <div class="onyx-inner-header">
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
    <div class="entry-content mt-0">
      <div class='acf-map'>
        <?php $location = get_field('map', 'option');
        if (!empty($location)) { ?>
          <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
            <p class="address"><?php echo $location['address']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </article>
</main>
<?php get_footer(); ?>