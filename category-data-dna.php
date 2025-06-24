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
          <div class="onyx-inner-title">Blog</div>
          <div class="breadcrumbs onyx-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <!--<ul>-->
            <!--  <//?php if (function_exists('bcn_display')) {-->
            <!--    bcn_display();-->
            <!--  } ?>-->
            <!--</ul>-->
            <ul>
              <!-- Breadcrumb NavXT 7.2.0 -->
                <li class="home">
                    <a property="item" typeof="WebPage" title="Go to Onyx Data." href="https://onyxdata.co.uk/?swcfpc=1"><span property="name">Home</span></a><meta property="position" content="1"></li><li class="post post-page"><a property="item" typeof="WebPage" title="Go to Data DNA." href="https://onyxdata.co.uk/data-dna/?swcfpc=1" class="post post-page"><span property="name">Data DNA</span></a><meta property="position" content="2"></li><li class="post-root post post-post"><a property="item" typeof="WebPage" title="Go to Blogs" href="https://onyxdata.co.uk/data-dna/category/?swcfpc=1" class="post-root post post-post"><span property="name">Blogs</span></a><meta property="position" content="3"></li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to th Category archives." href="https://onyxdata.co.uk/category/data-dna/?swcfpc=1" class="archive taxonomy category current-item" aria-current="page"><span property="name"></span></a><meta property="position" content="4"></span>            
                </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="entry-content">
      <div class="container">
        <div class="onyx-blog">
          <div class="row">
            <?php $args = array(
              'posts_per_page' => 28,
              'offset' => 0,
              'orderby' => 'date',
              'order' => 'DESC',
              'post_type' => 'post',
              'post_status' => 'publish',
              'suppress_filters' => true,
            );
            $posts_array = get_posts($args);
            foreach ($posts_array as $service) { ?>
              <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="onyx-blog-item">
                  <div class="onyx-blog-item-img">
                    <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($service->ID), "full"); ?>
                    <img width="<?php echo $image_data[1]; ?>" height="<?php echo $image_data[2]; ?>" src="<?php echo $image_data[0]; ?>" class="img-fluid">
                  </div>
                  <div class="onyx-blog-item-content">
                    <h2 class="onyx-blog-item-content-title"><?php echo $service->post_title; ?></h2>
                    <a href="<?php echo get_permalink($service->ID); ?>" class="readmorebtn">Read more</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php next_posts_link(); ?>
            <?php previous_posts_link(); ?>

          </div>
        </div>
      </div>

  </article>
</main>
<?php get_footer(); ?>