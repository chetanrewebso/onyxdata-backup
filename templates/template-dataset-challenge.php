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

    <div class="entry-content">
        <!-- Data speak start -->
      <section class="od-data-speak">
        <div class="container od-particpt">
             
          <div class="row overflow">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-animation="slideInRight" data-animation-delay=".1s">
              <div class="od-data-speak">
                  <?php 
                    $image = get_field('speak_image');
                    if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="Data-speak" width="789" height="755" class="img-fluid">
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center" data-animation="slideInLeft" data-animation-delay=".1s">
              <div class="od-data-speak-text">
                <div class="od-heading">
                 <?php the_field('heading_content');?>
                </div>
                <a href="<?php echo esc_url( get_field('speak_button')['url']); ?>" class="od-btn" aria-label="Book demo">Participate</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Data speak end -->

      <!-- Mission start -->
      <section class="od-mission">
        <div class="container">
          <div class="od-heading">
           <?php echo get_field('mission_heading');?>
          </div>
        </div>
      </section>
      <section class="od-mission-content">
        <div class="container">
          <div class="row">
              <?php
                if( have_rows('mission_repeater') ):
                  while ( have_rows('mission_repeater') ) : the_row();
                // $Image = get_sub_field('image');
                // $title = get_sub_field('title');
                $content = get_sub_field('misson_conetnet');
                ?>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" data-animation="slideInUp" data-animation-delay=".1s">
              <div class="od-mission-content">
                <p><?php echo $content;?></p>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            
          </div>
        </div>
      </section>
      <!-- Mission end -->

      <!-- Participate start -->
      <section class="od-participate">

        <div class="container">
          <div class="od-heading">
           <?php echo get_field('participate_heading');?>
          </div>
          <div class="row">
              <?php
                if( have_rows('participate_conetent_repeater') ):
                 while ( have_rows('participate_conetent_repeater')) : the_row();
                $Image = get_sub_field('participant_img');
                // $title = get_sub_field('title');
                $content = get_sub_field('participant_content');
                ?>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="od-participate-content">
                <img src="<?php  echo esc_url($Image['url']); ?>" alt="Professionals" width="80" height="80" class="img-fluid" id="rotate5">
                <?php echo $content;?>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>

      </section>
      <!-- Participate end -->

      <!-- Prize fund start -->
      <section class="od-prize-fund">
        <div class="container">
          <div class="od-prize-fund-content">
            <div class="od-heading">
              <?php echo get_field('prize_headings_');?>
            </div>
            <div class="row">
              <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 d-flex justify-content-around" data-animation="slideInRight" data-animation-delay=".1s">
                <div class="od-prize-fund-img">
                  <img src="<?php echo esc_url(get_field('prize_image')['url']); ?>" alt="Prize Fund" width="706" height="644" class="img-fluid">
                </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 d-flex align-items-center" data-animation="slideInLeft" data-animation-delay=".1s">
                <div class="od-prize-count">
                    <?php $i = 1;
                    if( have_rows('prize_repetaer') ):
                     while ( have_rows('prize_repetaer')) : the_row();
                    $content = get_sub_field('prize_numbers');
                    ?>
                  <div class="od-prize <?php if($i % 2 != 0){ echo 'count';}else{ echo ' ';}?>">
                    <span><?php echo $i;?></span>
                    <?php echo $content;?>
                  </div>
                  <?php $i++; endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <a href="<?php echo esc_url( get_field('prize_button')['url']); ?>" class="od-btn">Participate</a>
          </div>
        </div>
      </section>
      <!-- Prize fund end -->

      <!-- Award Timeline start -->
      <section class="od-timeline">
        <div class="container">
          <div class="od-heading">
              <?php echo get_field('timeline_heading');?>
          </div>
          <ul class="od-timeline-prize-content">
               <?php $i=1;
                if( have_rows('timeline_conetnt') ):
                 while ( have_rows('timeline_conetnt')) : the_row();
                $content = get_sub_field('time_text');
                ?>
            <li class="od-timeline-prize <?php if($i % 2 == 0){ echo 'even';}else{ echo '';}?>" data-animation="slideInLeft" data-animation-delay=".3s">
              <div class="od-timeline-prize-count">
                <p><?php echo $i;?></p>
              </div>
              <div class="od-timeline-prize-text">
               <?php echo  $content;?>
              </div>
            </li>
            <?php $i++; endwhile; ?>
            <?php endif; ?>
            <!--<li class="od-timeline-prize even">-->
            <!--  <div class="od-timeline-prize-count">-->
            <!--    <p>4</p>-->
            <!--  </div>-->
            <!--  <div class="od-timeline-prize-text">-->
            <!--    <p>FEB 09 - FEB 10, 2023</p>-->
            <!--    <h3>Award ceremony at Eurasian DataViz ConferenceOnline</h3>-->
            <!--  </div>-->
            <!--</li>-->
          </ul>
        </div>
      </section>
      <!-- Award Timeline end -->

      <!-- Selection criteria start -->
      <section class="od-criteria">
        <div class="container">
          <div class="od-criteria-content">
            <div class="od-heading">
             <?php echo get_field('criteria_heading');?>
            </div>
            <div class="row">
                 <?php
                if( have_rows('criteria_repeater') ):
                 while ( have_rows('criteria_repeater')) : the_row();
                $Image = get_sub_field('cre_img');
                // $title = get_sub_field('title');
                $content = get_sub_field('crie_text');
                ?>
              <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12" data-animation="slideInUp" data-animation-delay=".3s">
                <div class="od-criteria-box">
                  <div class="od-criteria-icon">
                    <img src="<?php  echo esc_url($Image['url']); ?>" alt="Visual Design" width="80" height="80" class="img-fluid">
                  </div>
                  <div class="od-criteria-text">
                    <?php echo $content; ?>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
              <?php endif; ?>
            </div>
            <a href="<?php echo esc_url( get_field('criteria_button')['url']); ?>" class="od-btn" aria-label="Read the competition regulations">Read the competition regulations</a>
          </div>
        </div>
      </section>
      <!-- Selection criteria end -->

      <!-- participate start -->
      <section class="od-participate-challenge" data-bs-spy="scroll" data-bs-target="#tab" data-bs-offset="0" tabindex="0">
        <div id="participate">
          <div class="container">
            <div class="od-heading">
             <?php echo get_field('challenge_for_participate_title');?>
            </div>
            <p><?php echo get_field('challenge_for_participate_content');?></p>
            <div class="od-participate-challenge-btn">
              <a href="<?php echo esc_url( get_field('for_participate_button')['url']); ?>" class="od-btn" data-animation="slideInRight" data-animation-delay=".3s" aria-label="Participate">Participate</a>
              <a href="<?php echo esc_url( get_field('archived_dataset_button')['url']); ?>" class="od-btn" data-animation="slideInLeft" data-animation-delay=".3s" aria-label="Archived Datasets">Archived Datasets</a>
            </div>
          </div>
        </div>
      </section>
      <!-- participate end -->

      <!-- Faq start -->
      <section class="od-faq">
        <div class="container">
          <div class="od-heading">
            <h2>FAQ</h2>
          </div>
          <div class="accordion accordion-flush" id="accordionFlushExample">
              <?php $i=1; $nf = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                if( have_rows('faq_repeaters') ):
                  while ( have_rows('faq_repeaters') ) : the_row();
                // $Image = get_sub_field('image');
                  $question = get_sub_field('question');
                  $ans = get_sub_field('answer');
                ?>
            <div class="accordion-item" data-animation="slideInUp" data-animation-delay=".1s">
              <h2 class="accordion-header" id="flush-heading<?php echo $nf->format($i);?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $nf->format($i);?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $nf->format($i);?>">
                  <?php echo $question; ?>
                </button>
              </h2>
              <div id="flush-collapse<?php echo $nf->format($i);?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $nf->format($i);?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><?php echo $ans; ?></div>
              </div>
            </div>
             <?php $i++; endwhile; ?>
             <?php endif; ?>
            <!--<div class="accordion-item">-->
            <!--  <h2 class="accordion-header" id="flush-headingTwo">-->
            <!--    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">-->
            <!--      Will certificates be provided for the contest participants?-->
            <!--    </button>-->
            <!--  </h2>-->
            <!--  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">-->
            <!--    <div class="accordion-body">-->
            <!--      You will receive a confirmation email from info@data2speak.com. Check your spam folder and promotions. In case you did not-->
            <!--      receive an email - write to award@data2speak.com</div>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
      </section>
      <!-- Faq end -->

      <!-- partner start -->
      <section class="od-partner">
        <div class="container">
          <div class="od-heading">
            <h2>Partners</h2>
          </div>
          <div class="owl-carousel owl-theme">
              <?php
                if( have_rows('partner_repeater_') ):
                 while ( have_rows('partner_repeater_')) : the_row();
                $Image = get_sub_field('img');
                ?>
            <div class="item">
              <div class="od-partner-box">
                <img src="<?php  echo esc_url($Image['url']); ?>" width="317" height="84" alt="Logo" class="img-fluid">
              </div>
            </div>
              <?php endwhile; ?>
              <?php endif; ?>
          </div>
        </div>
      </section>
      <!-- partner end -->
</article>
</main>
<?php get_footer(); ?>