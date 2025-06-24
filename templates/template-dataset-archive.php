<?php

/**
 * Template Name: DataDna DataSet Archive
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
        <div class="onyx-dataset-archive">
          <div class="row">
            <?php echo $post->post_content; ?>
          </div>

          <div class="row">
            <?php if (have_rows('data_archive_repeater')) : ?>
              <?php while (have_rows('data_archive_repeater')) : the_row();
                $title = get_sub_field('data_title');
                $content = get_sub_field('data_content');
                $link = get_sub_field('data_download_url');
                if ($link) :
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_blank';
              ?>
                <?php endif; ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                  <div class="onyx-dataset-archive-item">
                    <div class="onyx-dataset-archive-item-wrap">
                      <h3><?php echo $title; ?></h3>
                      <p><?php echo $content; ?></p>
                    </div>
                    <a target="_blank" href="<?php echo esc_url($link_url); ?>">
                      <input type="button" class="onyx-btn onyx-btn-primary" id="downlaodlink" name="" value="Download">
                    </a>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>