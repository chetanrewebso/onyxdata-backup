<?php

/**
 * Template Name: Home Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header(); ?>
<section class="onlx-topsection">
<!--     <div class="onlx-banner"> -->
        <?php //echo do_shortcode('[smartslider3 slider="1"]');
        ?>
        <?php echo do_shortcode('[rev_slider alias="slider-11"][/rev_slider]'); ?>

        <!-- <img src="<//?php echo get_stylesheet_directory_uri(); ?>/assets/images/slider-1.jpg"> -->
<!--     </div> -->
</section>
<section class="onlx-aboutus">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                <div class="onlx-aboutus-content-left " id="imgcontainer">
                    <img src="<?php echo esc_url(get_field('left_image1')['url']); ?>" alt="abnout1" class="imageone" id="floatingBox">
                    <img src="<?php echo esc_url(get_field('left_image2')['url']); ?>" alt="abnout2" class="imagetwo">
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                <div class="onlx-aboutus-content-right">
                    <div class="onlx-about-title">
                        <span class="onlx-about-title-icon">
                            <img src="<?php echo esc_url(get_field('right_image1')['url']); ?>">
                        </span>
                        <?php echo get_field('about_title'); ?>
                    </div>
                    <?php echo get_field('about_content'); ?>
                    <a href="<?php echo get_permalink(get_page_by_path('about-us')); ?>" class="about-readmore">read more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="onlx-whyus">
    <div class="onlx-topsection">
        <div class="onlx-topsection-title">
            <span class="onlx-topsection-title-icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diamond-icon.svg">
            </span>
            We can solve your problems
        </div>
        <div class="onlx-topsection-subtitle">Our Expertise</div>
        <div class="onlx-topsection-iconbox tabs">
            <ul class="tabs-nav">
                <?php if (have_rows('our_expertise')) :
                    while (have_rows('our_expertise')) :

                        the_row();
                        $tab_title = get_sub_field('tab_title');
                        $tab_icon = get_sub_field('tab_icon');
                        $tab_content = get_sub_field('tab_content');
                ?>
                        <li class="onlx-topsection-iconbox-icon tab-active <?php if (get_row_index() == 1) {
                                                                                echo "active";
                                                                            } ?>" id="tabli<?php echo get_row_index(); ?>">
                            <a href="javascript:void(0)" onclick="swipeTabs('tab<?php echo get_row_index(); ?>','tabli<?php echo get_row_index(); ?>')">
                                <?php echo $tab_icon; ?>
                            </a>
                        </li>
                <?php
                    endwhile;
                endif; ?>

            </ul>
            <div class="tabs-stage">
                <?php if (have_rows('our_expertise')) :
                    while (have_rows('our_expertise')) :

                        the_row();
                        $tab_title = get_sub_field('tab_title');
                        $tab_icon = get_sub_field('tab_icon');
                        $tab_content = get_sub_field('tab_content');
                        $index = get_row_index();
                ?>
                        <div id="tab<?php echo $index; ?>" class="<?php echo $index == 1 ? '' : 'd-none'; ?>">
                            <div class="onlx-databox">
                                <?php if ($tab_title != '') { ?>
                                    <h4><?php echo $tab_title; ?></h4>
                                <?php } ?>
                                <p><?php echo $tab_content; ?>.</p>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="onlx-bottomsection">
        <div class="onlx-bottomsection-black"></div>
        <div class="onlx-bottomsection-content">
            <div class="container">
                <div class="onlx-bottomsection-content-detail">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="whyus-text-content-box">
                                <div class="section-title">
                                    <span class="section-title-icon">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diamond-icon.svg">
                                    </span>
                                    <?php echo get_field('whyus_title'); ?>
                                </div>
                                <div class="section-subtitle"> <?php echo get_field('whyus_subtitle'); ?></div>
                                <p><?php echo get_field('whyus_content'); ?></p>
                                <div class="whyus-text-content-box-detail">
                                    <?php while (have_rows('content-box-detail')) :
                                        the_row();
                                        $image = get_sub_field('img');
                                        $title = get_sub_field('title');
                                        $content = get_sub_field('content');
                                    ?>
                                        <div class="whyus-text-content-box-detail-boxs">
                                            <div class="whyus-text-content-box-detail-boxs-icon">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Stockholm-icons---General---Shield-check.svg" alt="shield">
                                            </div>
                                            <div class="whyus-text-content-box-detail-boxs-content">
                                                <h6><?php echo $title; ?></h6>
                                                <!-- <p><?php echo $content; ?></p> -->
                                            </div>
                                        </div>
                                    <?php
                                    endwhile; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="whyus-image-content-box">
                                <div class="whyus-image-content-box-title" data-aos="fade" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0" data-aos-once="true"><?php echo get_field('image-content-box-title'); ?></div>
                                <div class="whyus-image-content-box-images" data-aos="fade" data-aos-easing="ease-in-back" data-aos-delay="600" data-aos-offset="0" data-aos-once="true">
                                    <img src="<?php echo esc_url(get_field('image-content-box-imag1')['url']); ?>" alt="image1">
                                </div>
                                <div class="whyus-image-content-box-images" data-aos="fade" data-aos-easing="ease-in-back" data-aos-delay="900" data-aos-offset="0" data-aos-once="true">
                                    <img src="<?php echo esc_url(get_field('image-content-box-imag2')['url']); ?>" alt="image2">
                                </div>
                                <div class="whyus-image-content-box-images" data-aos="fade" data-aos-easing="ease-in-back" data-aos-delay="1200" data-aos-offset="0" data-aos-once="true">
                                    <img src="<?php echo esc_url(get_field('image-content-box-imag3')['url']); ?>" alt="image3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="onyx-services">
    <div class="container">
        <div class="onyx-titlebox">
            <div class="section-title">
                <span class="section-title-icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diamond-icon.svg">
                </span>
                How can we support your organisation
            </div>
            <div class="section-subtitle">Our Services</div>
        </div>
        <div class="row">
            <?php
            $args = [
                'posts_per_page' => 4,
                'offset' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'servicess',
                'post_status' => 'publish',
                'suppress_filters' => true,
            ];
            $services_array = get_posts($args);
            foreach ($services_array as $services) { ?>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="onyx-services-box">
                        <div class="onyx-services-image">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($services->ID), 'full'); ?>" alt="port1">
                        </div>
                        <div class="onyx-services-content">
                            <div class="onyx-services-title"><a href="<?php echo get_permalink($services->ID); ?>"><?php echo $services->post_title; ?></a></div>
                            <p class="onyx-services-desc"><?php echo $services->post_excerpt; ?>...</p>
                            <a href="<?php echo get_permalink($services->ID); ?>" class="onyx-services-btn">
                                <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow.svg" alt="roundarrow"></span>read more
                            </a>
                        </div>

                    </div>
                </div><?php } ?>

        </div>
    </div>
    </div>
</section>
<section class="onyx-casestudy">
    <div class="container">
        <div class="onyx-titlebox">
            <div class="section-title">
                <span class="section-title-icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diamond-icon.svg">
                </span>
                Find out how clients utilised our services
            </div>
            <div class="section-subtitle">Case Studies</div>
        </div>
    </div>
    <div class="onyx-casestudy-content">
        <div class="container">
            <div class="row">
                <?php
                $args = [
                    'posts_per_page' => 1,
                    'offset' => 0,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_type' => 'case_studie',
                    'post_status' => 'publish',
                    'suppress_filters' => true,
                ];
                $case_studie_array = get_posts($args);
                foreach ($case_studie_array as $case_studie) { ?>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="onyx-casestudy-image">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($case_studie->ID), 'full'); ?>" alt="casestudy">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="onyx-casestudy-image-content">
                            <h2><?php echo $case_studie->post_title; ?></h2>
                            <p><?php echo $case_studie->post_excerpt; ?></p>
                            <a href="<?php echo get_permalink(get_page_by_path('case-studies')); ?>" class="case-study-readmore">read more</a>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="onyx-news">
    <div class="container">
        <div class="onyx-news-title-box">
            <div class="onyx-news-title-box-title">
                <div class="section-title">
                    <span class="section-title-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diamond-icon.svg">
                    </span>
                    Codesk Updates
                </div>
                <div class="section-subtitle">News & articles.</div>
            </div>
            <a href="<?php echo get_permalink(get_page_by_path('category/data-dna')); ?>" class="newsbtn">view all</a>
        </div>
        <div class="blankdiv">
            <div class="row">
                <div class="owl-carousel owl-theme" id="news">
                    <?php
                    $args = [
                        'posts_per_page' => -1,
                        'offset' => 0,
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'suppress_filters' => true,
                    ];
                    $posts_array = get_posts($args);
                    foreach ($posts_array as $blogs) { ?>
                        <div class="item">
                            <div class="articlesbox">
                                <div class="onlxarticlesboxdetail">
                                    <div class="articlesbox-image">
                                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($blogs->ID), 'full'); ?>" alt="port1">
                                    </div>
                                    <div class="articlesbox-content">
                                        <div class="articlesbox-content-text"><span class="article-time"><?php echo date('M d, Y', strtotime($blogs->post_date)); ?></span>
                                            <p class="articletext"><?php echo $blogs->post_title; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="onyx-border">
                                    <a href="<?php echo get_permalink($blogs->ID); ?>" class="newsarticlebtn">
                                        <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow.svg" alt="roundarrow"></span>read more
                                    </a>
                                </div>

                            </div>
                        </div>
                    <?php }
                    ?>

                </div>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>