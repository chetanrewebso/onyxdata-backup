<?php

/**
 * Template Name: Privacy Policy Page
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
    <div class="onyx-inner entry-header onyx-about-header">
      <div class="container">
        <div class="onyx-inner-header">
          <div class="onyx-inner-title"><?php echo $post->post_title; ?></div>
         
        </div>
      </div>
    </div>
  
    <div class="entry-content">
        <div class="container">
           <?php echo the_content();?>
        </div>
    </div>
  </article>
</main>
<?php get_footer(); ?>