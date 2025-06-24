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
    <div class="entry-content">
      <div class="container">
        <!-- All your data start -->
      <section class="od-all-data">
        <div class="container">
          <div class="od-heading">
            <h2> <?php echo get_field('data_heading');?></h2>
          </div>
          <div class="row">
             <?php
                if( have_rows('data_relaeater') ):
                  while ( have_rows('data_relaeater') ) : the_row();
                  $Image = get_sub_field('data_image');
                  // $title = get_sub_field('title');
                  $content = get_sub_field('content');
             ?>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <div class="od-all-data-content">
                <div class="od-all-data-content-img">
                  <img src="<?php echo esc_url($Image['url']); ?>" class="img-fluid" width="120" height="121" alt="Unify your data estate">
                </div>
                <div class="od-all-data-content-text">
                  <?php echo $content;?>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
          
          </div>
        </div>
      </section>
      <!-- All your data end -->

      <!-- Reshape start -->
      <section class="od-reshape">
        <div class="container">
          <div class="od-heading">
           <?php echo get_field('reshape_heading');?>
          </div>
          <div class="row">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
              <div class="accordion accordion-flush" id="accordionFlush">
                 <?php $i=1; $nf = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                  if( have_rows('reshape_repeater') ):
                  while ( have_rows('reshape_repeater') ) : the_row();
                  //$Image = get_sub_field('data_image');
                  $title = get_sub_field('reshape_heading');
                  $content = get_sub_field('reshape_content');
                 ?>
                <!-- item1 -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo $nf->format($i);?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $nf->format($i);?>" aria-expanded="false" aria-controls="collapse<?php echo $nf->format($i);?>">
                      <?php echo $title;?>
                    </button>
                  </h2>
                  <div id="collapse<?php echo $nf->format($i);?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $nf->format($i);?>" data-bs-parent="#accordionFlush">
                    <div class="accordion-body">
                      <div class="od-reshape-button">
                           <?php 
                            if( have_rows('reshape_content') ):
                              $j=1;
                              while ( have_rows('reshape_content') ) : the_row();
                              $Image = get_sub_field('img');
                              $title = get_sub_field('title');
                            ?>
                        <button class="reshape-tablinks <?php if($i==1 && $j==1){ echo 'reshape-is-active';}else{ };?>" data-tech="reshape<?php echo $i.'_'.$j; ?>">
                          <?php echo $title;?>
                        </button>
                        <?php $j++; endwhile; ?>
                        <?php endif; ?>
                      
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; endwhile; ?>
                <?php endif; ?>
                
              </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
              <!-- item1 -->
              <?php  $k=1;
                if( have_rows('reshape_repeater') ):
                while ( have_rows('reshape_repeater') ) : the_row();
                    $count = count(get_sub_field("reshape_content")); 
                if( have_rows('reshape_content') ): $j=1;
                  while ( have_rows('reshape_content') ) : the_row(); 
                  $Image = get_sub_field('img');
                  $content = get_sub_field('content');
                ?>
              <div class="od-reshape-box reshape-tabcontent <?php if($k==1 && $j==1){ echo 'reshape-is-active';}else{ };?>" id="reshape<?php echo $k.'_'.$j; ?>">
                <div class="od-reshape-box-active">
                  <div class="od-reshape-box-img">
                    <img src="<?php echo esc_url($Image['url']); ?>" class="img-fluid" alt="tab-img" width="1173" height="636">
                    <p><?php echo $content;?></p>
                  </div>
                </div>
              </div>
                <?php $j++; endwhile; ?>
                <?php endif; ?>
                <?php $k++; endwhile; ?>
                <?php endif; ?>
              
            </div>
          </div>
        </div>
      </section>
      <!-- Reshape end -->

      <!-- Explore Fabric start -->
      <section class="od-explore-fabric">
        <div class="container">
          <div class="od-heading">
            <h2><?php echo get_field('explore_org_heading');?></h2>
          </div>
          <div class="od-explore-fabric-content">
            <div class="row">
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="od-explore-fabric-content-left">
                 <?php echo get_field('explore_right_content');?>
                </div>
              </div>
              <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="od-explore-fabric-content-right">
                  <?php echo get_field('explore_left_content');?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Explore Fabric end -->

      <!-- Explore organization start -->
      <section class="od-explore-org">
        <div class="container">
          <div class="od-heading">
            <h2><?php echo get_field('fabric_heading');?></h2>
          </div>
          <div class="od-org-tab">
            <div class="od-org-list">
                <?php $i=1;
                if( have_rows('explore_org_repeater') ):
                  while ( have_rows('explore_org_repeater') ) : the_row();
                  $Image = get_sub_field('company_image');
                  $title = get_sub_field('company_contents');
                  $img = get_sub_field('image');
                ?>
              <div class="od-org-button">
                <button class="org-tablinks <?php if($i==1){ echo'is-active';}else{ };?>" data-tech="org<?php echo $i;?>">
                  <img src="<?php echo esc_url($Image['url']); ?>" class="img-fluid" alt="organization" width="200" height="48">
                </button>
              </div>
              <?php $i++;endwhile; ?>
              <?php endif; ?>
              
            </div>
          </div>
          <?php $i=1;
            if( have_rows('explore_org_repeater') ):
              while ( have_rows('explore_org_repeater') ) : the_row();
              $Image = get_sub_field('company_image');
              $title = get_sub_field('company_contents');
              $img = get_sub_field('image');
            ?>
          <div class="od-org-box org-tabcontent <?php if($i==1){echo'is-active';}else{ }?>" id="org<?php echo $i;?>">
            <div class="od-org-box-active">
              <div class="od-org-box-img">
                <img src="<?php echo esc_url($img['url']); ?>" class="img-fluid" alt="tab-img" width="1595" height="600">
                <div class="od-org-box-content">
                  <?php echo $title;?>
                </div>
              </div>
            </div>
          </div>
          <?php $i++;endwhile; ?>
          <?php endif; ?>
          
        </div>
      </section>
      <!-- Explore organization end -->

      <!-- Learn more start -->
      <section class="od-learn-more">
        <div class="container">
          <div class="od-heading">
            <h2><?php echo get_field('learn_more_heading');?></h2>
          </div>
          <div class="row">
              <?php $args = array(
                  'posts_per_page' => 4,
                  'offset' => 0,
                  'orderby' => 'date',
                  'order' => 'ASC',
                  'post_type' => 'trainings',
                  'post_status' => 'publish',
                  'suppress_filters' => true,
                );
                $posts_array = get_posts($args);
                foreach ($posts_array as $case) { ?>
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="od-card">
                <div class="od-card-header">
                  <a href="<?php echo get_permalink($case->ID); ?>" class="od-card-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($case->ID), 'thumbnail'); ?>" alt="course" width="380" height="318" class="img-fluid">
                  </a>
                  <h3><?php echo $case->post_title; ?></h3>
                </div>
                <a href="<?php echo get_permalink($case->ID); ?>" class="od-btn">Read More</a>
              </div>
            </div>
           <?php } ?>
          </div>
        </div>
      </section>
      <!-- Learn more end -->

      <!-- Faq start -->
      <section class="od-faq">
        <div id="scrollspyHeading4">
          <div class="container">
            <div class="od-heading">
            <?php if( have_rows('faq_repeate') ){?>
              <h2>FAQ</h2><?php }?>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <?php $i=1;
                if( have_rows('faq_repeate') ):
                  while ( have_rows('faq_repeate') ) : the_row();
                  $que = get_sub_field('que');
                  $ans = get_sub_field('ans');
                ?>
              <div class="accordion-item" data-animation="slideInUp" data-animation-delay=".1s">
                <h2 class="accordion-header" id="flush-heading<?php echo get_row_index();?>">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo get_row_index();?>" aria-expanded="false" aria-controls="flush-collapse<?php echo get_row_index();?>">
                    <?php echo $que;?>
                  </button>
                </h2>
                <div id="flush-collapse<?php echo get_row_index();?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo get_row_index();?>" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body"><?php echo $ans;?>.</div>
                </div>
              </div>
              <?php $i++;endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>od-learn-more
      </section>
      <!-- Faq end -->

      <!-- Find more start -->
      <section class="od-find-more">
        <div class="container">
          <div class="od-heading">
            <h2><?php echo get_field('find-more_heading');?></h2>
          </div>
          <p><?php echo get_field('find-more_contents');?></p>
          <div class="od-find-more-btn">
              <?php $link = get_field('try_for_free_button');
              if( $link ){?>
            <a href="<?php echo esc_url( get_field('try_for_free_button')['url']); ?>" class="od-btn"><?php echo get_field('try_for_free_button')['title'];?></a><?php } ?>
            <?php $link2 = get_field('sign_up_button');
              if( $link2 ){?>
            <a href="<?php echo esc_url( get_field('sign_up_button')['url']); ?>" class="od-btn"><?php echo get_field('sign_up_button')['title'];?></a><?php } ?>
          </div>
        </div>
      </section>
      <!-- Find more end -->
      </div>
    </div>

  </article>
</main>

<?php get_footer(); ?>