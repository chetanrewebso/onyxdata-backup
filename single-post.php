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
$f_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

?>



<main id="site-content" role="main">
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header onyx-about-header" style="background-image:url(<?php  echo esc_url($f_image[0]); ?>);">
      <div class="container">
        <div class="onyx-inner-header">
          <div class="onyx-inner-title">
            <?php echo $post->post_title; ?>
          </div>
<!--           <div class="breadcrumbs onyx-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <ul>
<li class="home"><a property="item" typeof="WebPage" title="Go to Onyx Data." href="https://onyxdata.co.uk/?swcfpc=1"><span property="name">Home</span></a><meta property="position" content="1"></li><li class="post post-page"><a property="item" typeof="WebPage" title="Go to Data DNA." href="https://onyxdata.co.uk/data-dna/?swcfpc=1" class="post post-page"><span property="name">Data DNA</span></a><meta property="position" content="2"></li><li class="post-root post post-post"><a property="item" typeof="WebPage" title="Go to Blogs" href="https://onyxdata.co.uk/data-dna/category/?swcfpc=1" class="post-root post post-post"><span property="name">Blogs</span></a><meta property="position" content="3"></li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to th Category archives." href="https://onyxdata.co.uk/category/data-dna/?swcfpc=1" class="taxonomy category"><span property="name"></span></a><meta property="position" content="4"></span><li class="post post-post current-item"><a property="item" typeof="WebPage" title="Go to The Benefits of End-to-End Data Strategy and Execution." href="https://onyxdata.co.uk/the-benefits-of-end-to-end-data-strategy-and-execution/?swcfpc=1" class="post post-post current-item" aria-current="page"><span property="name">The Benefits of End-to-End Data Strategy and Execution</span></a><meta property="position" content="5"></li>            </ul>
          </div> -->
        </div>
      </div>
    </div>
    <div class="entry-content">
      <div class="container">
        <div class="onyx-blog-details">
          <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
              <div class="onyx-blog-details-left">
                <div class="onyx-post-content">
                  <?php echo the_content(); ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
              <div class="onyx-blog-details-right">
                <div class="onyx-post-content">
                  <h4>Recent Articles</h4>

                  <div class="onyx-post-content-wrap grid">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                      'numberposts' => 3, // Number of recent posts thumbnails to display
                      'post_status' => 'publish' // Show only the published posts
                    ));
                    foreach ($recent_posts as $post_item) :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_item['ID'] ), 'single-post-thumbnail' );
                     ?>
                    <a href="<?php echo get_permalink($post_item['ID']) ?>" class="g-col-12">
                      <img src="<?php  echo esc_url($image[0]); ?>" width="512" height="366" alt="Blog" class="img-fluid w-auto">
                    </a>
                    <?php endforeach; ?>
                    <!-- <a href="#" class="g-col-12">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/project.png" width="512" height="366" alt="Blog" class="img-fluid w-auto">
                    </a> -->
                  </div>

                </div>
                <div class="onyx-post-content">

                  <?php
                  $has_sidebar_2 = is_active_sidebar('sidebar-2');
                  if ($has_sidebar_2) { ?>
<!--                     <div class="footer-widgets column-two grid-item">
                      <?php // dynamic_sidebar('sidebar-2'); ?>
                    </div> -->
                  <?php } ?>
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