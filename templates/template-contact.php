<?php

/**

 * Template Name: Contact Page

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since 1.0

 */

get_header();

?>

<main id="site-content" role="main">

<article <?php post_class();?> id="post-<?php the_ID();?>">

<div class="entry-content">

    <?php while (have_posts()): the_post();?>

    <div class="est-inner">

      <?php get_template_part('template-parts/entry-header'); ?>



      <div class="est-inner-content">

        <div class="container">

            <div class="row">

            <div class="col-lg-5">

              <h2><?php echo get_field('contact_header');?></h2>

              <div class="list-author">

                <div class="info-author clearfix">

                  <?php echo get_field('contact_content');?>

                </div>

              </div>

            </div>

            <div class="col-lg-7">

              <div class="est-form">

                <?php echo do_shortcode('[contact-form-7 id="141" title="contact us page"]'); ?>

              </div>

            </div>



          </div>

        </div>

      </div>

    </div>

    <?php endwhile;

    wp_reset_query();?>

</div>

</article>

</main>

<?php get_footer();?>