<?php 

/**
 * Template Name: HOME PAGE V2 
 */
get_header();

?>
<?php get_template_part('template-parts/header_v1'); ?>

<style>
.sponsor-img {
    width: 100%;
    height: 165px;
/*    border: 1px solid #f2f2f2;*/
    border-radius: 5px;
    margin-bottom: 20px;
/*    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;*/
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all .9s ease-in-out;
}
.sponsor-img img {
    max-width: 115px;
    max-height: 95px;
    object-fit: contain;
    transition: all 0.9s ease-in-out !important;
}
.sponsor-img:hover img {
    transform: rotateY(180deg);

}

    #hero_section{

    background: url(<?php the_field('banner_image')?>) no-repeat center center;
    background-size: cover;
    height: 100vh;
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    padding-top: 140px!important;
}



section#hero_section::before {
    align-items: center;
 background: linear-gradient(to bottom, rgb(0 0 0 / 62%) 0%, rgb(0 0 0 / 78%) 100%);
    box-sizing: border-box;
    color: #fff;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    left: 0;
    padding: 20px;
    position: absolute;
    text-align: center;
    top: 0;
    width: 100%;
    content: "";
}

#hero_section .hero-content {
    color: #fff;
    text-align: center;
}



#hero_section .hero-content  .hero_para{
    font-size: 16px;
    letter-spacing: 1.2px;
    color: #dbd8d8;
}

/* hero  css end */

.btn-cancel{
    background-color: transparent!important;
    color: #444;
    border: 1px solid #444!important;
    border-radius: 36px!important;
    padding: 12px 31px!important;
    font-weight: 600!important;
    font-size: 16px!important;
    transition: all .5s ease-in-out;
}


 .logo_author_parent {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo_author_parent img {
background: #fff;
padding: 10px;
}
.testimonial-card .testimonial-desc {
    font-size: 19px;
    }

    .portfolio-image .btn-like.like_click.active {
    background: #f71846;
}
.portfolio-image .btn-like.like_click.active i {
    color: #fff;
}
.portfolio-title a:hover{
        color:#ffbb09;
        }
.viewer i.fa-solid.fa-heart {
    color: #d75e5e;
}
button.btn-save.bookmark_click.active {
    background: #f71846;
    color: #fff;
} 

.sponsor-item a:hover .sponsor-img {
    transform: scale(1.05); /* Hover effect */
}

/* Owl Carousel Navigation */
 .owl-nav {
    position: absolute;
    top: 40%;
    width: 100%;
    transform: translateY(-50%);
}

.owl-prev, .owl-next {
    position: absolute;
    width: 30px;
    height: 30px;
    background: #ffbb09 !important;
    border-radius: 50%;
    color: #fff !important;
    font-size: 20px !important;
    line-height: 30px !important;
    text-align: center;
}

.owl-prev {
    left: -40px;
}

.owl-next {
    right: -40px;
}

.owl-prev:hover, .owl-next:hover {
    background: #ffbb09 !important;
}

.owl-prev span, .owl-next span {
    display: block;
    line-height: 30px;
}

.testimonial-desc p {
    color: #fff;
}
p.challenge-decription {
    text-align: left;
}

section.insights {
/*    margin-top: 50px;*/
    background: #f1f0f0;
    padding: 50px 0 50px 0;
}
        .round-border{
    text-align: center;
    border: 1px solid black;
    width: max-content;
    padding: 10px 20px;
    border-radius: 70px;
    color: black;
    font-size: 14px;
}
.insights-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.con-heading {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 30px;
    margin-bottom: 30px;
}

.con-heading h2 {
    font-size: 48px;
    font-weight: 700;
    line-height: 48px;
    text-align: center;
}
.con-heading p {
    font-size: 18px;
    font-weight: 400;
    line-height: 27px;
    text-align: center;
    margin-top: 20px;
    color: #64748b;
}
a.community {
    border: 1px solid #ffbb09;
    padding: 10px 20px;
    border-radius: 6px;
    background: #ffbb09;
    text-decoration: none;
    color: black;
    font-weight: 600;
}
a.projects {
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-weight: 600;
    background: black;
    border: 1px solid black;
}
.all-button-insight {
    display: flex;
    align-items: center;
    gap: 15px;
}
a.projects:hover {
    background: rgb(43, 40, 40);
    color: white;
    border: 1px solid rgb(17, 17, 17);
    transition: 0.5s ease-in-out;
}
a.community:hover {
    background-color: #d19803;
    transition: 0.5s ease-in-out;
}
.all-button-insight i {
    padding-right: 5px;
}

.join-section {
    display: flex;
    gap: 12px;
    justify-content: space-around;
    align-items: center;
    margin-top: 30px;
}

.avatars {
  display: flex;
}

.avatars img {
  width: 40px;
  height: 40px;
  object-fit: cover;
  border-radius: 50%;
  border: 2px solid #fff;
  margin-left: -10px;
}

.avatars img:first-child {
  margin-left: 0;
}

.join-text {
  font-size: 16px;
  color: #4a5568;
}

.join-text strong {
  font-weight: bold;
  color: #2d3748;
}


section.data-stories {
    margin: 50px 0 0 0;
    background: #f1f0f0;
    padding: 120px 0 30px 0;
}
.round-border-line {
    text-align: center;
    border: 1px solid #000;
    width: max-content;
    padding: 10px 20px;
    border-radius: 70px;
    color: black;
    font-size: 14px;
}
.rank-buttons {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0px 60px;
}
.rank-section {
    margin-top: 30px;
    width: 100%;
}
span.text-con {
    font-size: 16px !important;
    color: #64748b;
    line-height: 27px;
}
.rank-buttons span {
    font-size: 28px;
}
a.started {
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-weight: 600;
    background: black;
    border: 1px solid black;
}
a.started::after {
    content: "\2192";
    padding-left: 10px;
    font-size: 16px;
}
a.Explore-pro {
    border: 1px solid #ffbb09;
    padding: 10px 20px;
    border-radius: 6px;
    background: #ffbb09;
    text-decoration: none;
    color: black;
    font-weight: 600;
}

a.started:hover {
    color: #ffffffc7;
}
.portfolio-tabs {
    border-bottom: none;
    margin-bottom: 30px;
    padding: 8px 10px;
    width: fit-content;
    background: #f1f5f9;
    border-radius: 10px;
}

.portfolio-tabs .nav-item {
    margin-right: 8px;
    padding:0;
}

.portfolio-tabs .nav-link {
    color: #5e5e5e;
    font-weight: 500;
    padding: 6px 20px;
    border: none;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.portfolio-tabs .nav-link:hover {
    background-color: transparent;
    color: #000;
}

.portfolio-tabs .nav-link.active {
    color: #242424;
    background-color: #fff;
    font-weight: 600;
}


p.mb-4.subheading.portfolio_s {
    text-align: left;
}
#portfolio-loader img {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200px;
    transform: translate(-50%, -50%);
}
.text-lg-end{padding-top: 20px;}


.portfolio-content {
    padding: 10px 10px;
}

.portfolio-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    margin-top: 10px;
    color: #333;
}

.portfolio-excerpt {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.portfolio-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}
.portfolio-title a {color:#000;}

.portfolio-item {
    border: 1px solid #00000029;
    border-radius: 10px;
    height: calc(100% - 40px);
    display:flex;
    justify-content: space-between;
    flex-direction: column;
    background: white;
}
.skills {
    margin: 16px 0px 30px;
    display: inline-block;
}
p.portfolio-excerpt {
    color: #000;
    }

.portfolio-image {border-bottom:1px solid #00000029;}
.author_section{padding: 10px 10px;    margin-bottom: 10px;}
.skill-badge {
    background-color: #ffbb09;
    color: #fff;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 14px;
}
@media (max-width: 768px) {
    .text-lg-end{padding-top: 0px;}
    .portfolio-tabs .nav-item {
        margin-right: 10px; 
    }
    .portfolio-tabs .nav-link {
        padding: 8px 15px;
        font-size: 14px;
    }
}
@media(max-width: 480px){
    .all-button-insight a{
    font-size: 10px;
}
a.started::after {
    font-size: 10px !important;
}

}

@media (max-width: 768px) {
.sponsor-slider button.owl-next {right:0;}

.sponsor-slider button.owl-prev {left:0;}
#testimonial  .owl-nav button.owl-next{
  right: 20px;
  background: #fff;
}
#dataset_challenge .owl-nav button.owl-next{
  right: 20px;
  background: #fff;
}


 .con-heading h2 {
    font-size: 24px;
    line-height: 32px;
}
.con-heading p {
    font-size: 16px;
    line-height: 24px;
    margin-top: 10px;
}
.join-section {
    display: flex;
    gap: 12px;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
    flex-direction: column;
}
.join-text {
    text-align: center;
}
.rank-buttons {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
}
#portfolio{padding-top: 30px;}

}

 


/* Insights Content End  */



/*.owl-carousel {
    max-width: 100%; 
    overflow: hidden; 
    <a href=" https://www.linkedin.com/groups/9075495/?lipi=urn%3Ali%3Apage%3Ad_flagship3_groups_index%3BeKJZJX0PQdeUQaz8EGsr5Q%3D%3D" class="cta-button participate" data-faitracker-click-bind="true">Join DataDNA Community</a>
}*/

</style>

    <section class="data-stories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="insights-content">
                        <div class="round-border-line">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles mr-2 h-3.5 w-3.5 text-data-purple"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path><path d="M20 3v4"></path><path d="M22 5h-4"></path><path d="M4 17v2"></path><path d="M5 18H3"></path></svg>
                            <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>  Community-driven insights
                        </div>
                        <div class="con-heading">
                            <h2><?php the_field('heading');?></h2>
                             <p><?php the_field('content');?></p>
                        </div>
                     
                          
                      

                         <div class="all-button-insight">

                                <?php 
                        $link = get_field('button_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                          <a href="<?php echo esc_url( $link_url ); ?>" class="started" target="<?php echo esc_attr( $link_target ); ?>" ><i class="fa fa-users"></i><span><?php echo esc_html( $link_title ); ?></span></a>
                    <?php endif; ?>

                     <?php 
                        $link = get_field('button_link_second');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                          <a href="<?php echo esc_url( $link_url ); ?>" class="Explore-pro" target="<?php echo esc_attr( $link_target ); ?>"><i class="fa fa-bar-chart"></i><span><?php echo esc_html( $link_title ); ?></span></a>
                    <?php endif; ?>
                          
                        </div>

                        

    <div class="rank-section">
    <div class="row">
        <?php
        if (have_rows('rank_items')) {
            while (have_rows('rank_items')) {
                the_row();
                $icon = get_sub_field('icon') ?: 'fa-users';
                $count = get_sub_field('count') ?: '5,000+';
                $content = get_sub_field('content') ?: 'Community members';
                ?>
                <div class="col-lg-4 col-sm-12 col-md-4">
                    <div class="rank-buttons">
                        <span><i class="fa <?php echo esc_attr($icon); ?>"></i></span>
                        <span><strong><?php echo esc_html($count); ?></strong></span>
                        <span class="text-con"><?php echo esc_html($content); ?></span>
                    </div>
                </div>
                <?php
            }
        } 
        ?>
    </div>
  </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <!-- featured portfolio  start  -->
    <section class="pt-70 pb-70 " id="portfolio">
        <div class="container ">
            <div class="row portfolio-header-row">
                <!-- <div class="col-lg-8 mx-auto text-center heading-section"> -->
                    <div class="col-lg-8 heading-section">
                    <h2 class="mb-3 heading"><?php the_field('portfolio_heading');?></h2>
                    <p class="mb-4 subheading portfolio_s"><?php the_field('portfolio_subheading');?></p>
                    <ul class="nav nav-tabs portfolio-tabs" id="portfolioTabs" role="tablist">
                   <li class="nav-item"><a class="nav-link active" data-term="newest" href="#newest" role="tab">Newest</a></li>
                   <li class="nav-item"><a class="nav-link" data-term="popular" href="#popular" role="tab">Popular</a></li>
                   <li class="nav-item"><a class="nav-link" data-term="trending" href="#trending" role="tab">Trending</a></li>
                </ul>
                </div>
                <div class="col-lg-4 text-lg-end">
                <a href="https://datadna.onyxdata.co.uk/portfolio" class="btn btn-primary view-all">View All</a>
            </div>

            </div>
        </div>

<div class="container position-relative">

     <div id="portfolio-loading-overlay" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(14, 12, 12, 0.42); z-index: 9;  justify-content: center; align-items: center;">
                <div id="portfolio-loader" style="text-align: center;">
                    <img src="https://datadna.onyxdata.co.uk/wp-content/themes/onyxdata-child/custom-function/images/Loading-icon-unscreen.gif" alt="" width="50">
                    <p style="color: #333; margin-top: 15px;">Loading...</p>
                </div>
            </div>

    <div class="row" id="portfolio-items">
        <?php
      $hidden_users = get_users([
        'meta_key' => 'hide_portfolio_from_front',
        'meta_value' => 'yes',
        'fields' => 'ID'
    ]);
    $args = array(
        'post_type'      => 'portfolios',
        'posts_per_page' => 8,
        'post_status'    => 'publish',
        'orderby' => 'date',
            'order' => 'DESC',
    );

    if (!empty($hidden_users)) {
        $args['author__not_in'] = $hidden_users;
    }
        $portfolio_query = new WP_Query($args);

        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $portfolio_title = get_the_title();
                $portfolio_link  = get_permalink();
                $portfolio_author = get_the_author();
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="portfolio-item">
                        <div>
                        <a href="<?php echo esc_url($portfolio_link); ?>" class="portfolio-link">
                            <div class="portfolio-image">
                                <img src="<?php echo esc_url($portfolio_image); ?>" alt="<?php echo esc_attr($portfolio_title); ?>">
                                <!-- <div class="portfolio-caption">
                                    <h3 class="portfolio-title"><?php echo esc_html($portfolio_title); ?></h3>
                                </div> -->
                               
                <button class="btn-like like_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'liked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">

                  <i class="fa-regular fa-heart"></i>
             </button>

       <button class="btn-save bookmark_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'bookmarked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
              <i class="fa-regular fa-bookmark"></i>
     </button>
   </div>
                        </a>

<!-- new title content -->
     <div class="portfolio-content mt-3">
        <h3 class="portfolio-title">
            <a href="<?php echo esc_url($portfolio_link); ?>">
                <?php echo esc_html($portfolio_title); ?>
            </a>
        </h3>
        
        <p class="portfolio-excerpt">
            <?php 
                $excerpt = get_the_excerpt(); 
                echo wp_trim_words($excerpt, 20, '...');
            ?>
        </p>

     <?php   $field = get_field_object('skills_and_tools');

$skills_and_tools = $field['value'];

if( $skills_and_tools ){ ?>
<div class="skills">
    <?php foreach( $skills_and_tools as $skills_and_tool ){ 
    ?>    <!-- <span class="skill-badge"><?php echo $field['choices'][ $skills_and_tool ]; ?></span> -->
    <?php    $raw_value = $skills_and_tool;
        
            $label = $field['choices'][$skills_and_tool];
            
            $formatted_label = str_replace('_', ' ', $label); 
            $formatted_label = ucwords($formatted_label); 
            
            // Special case for "Power BI" (if needed)
            if ($raw_value === 'power_bi') {
                $formatted_label = 'Power BI';
            }
        ?>
            <span class="skill-badge"><?php echo esc_html($formatted_label); ?></span>
    <?php }  ?>
 </div>
<?php }  ?>
                      
    </div>

</div>

   <div class="mt-3 viewer d-flex align-items-center justify-content-between author_section">
     <div >

        <?php
        $author_id = get_the_author_meta('ID');
        // Get profile URL
        $default_url = uwp_build_profile_tab_url($author_id);// userswp plugin author url 
        $username = basename($default_url); 
        $base_url = 'https://datadna.onyxdata.co.uk/profile/';
        $author_profile_url = $base_url . '?uwp_profile=' . urlencode($username);

    ?>
        <a href="<?php echo esc_url($author_profile_url) ;?>" class="portfolio-view d-flex align-items-center">
            <?php
            $author_id = get_the_author_meta('ID');
            $author_image = get_avatar_url($author_id, ['size' => 100]); // Get author's profile image

            if ($author_image) {
                echo '<img src="' . esc_url($author_image) . '" alt="Author">';
            } else {
                echo '<img src="' . get_template_directory_uri() . '/assets/images/view.png" alt="viewer">';
            }
            ?>
        
        <span class="portfolio-viewer-name">By <?php echo esc_html(get_the_author()); ?></span>
        </a>    
    </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                             <span class="portfolio-liked">
                                <?php $like_count = (int) get_post_meta(get_the_ID(), 'like_count', true);
                                    echo $like_count ? $like_count : 0; 
                                 ?>
                             </span>
                                </div>
                                <div class="ms-2">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                            <span class="portfolio-liked portfolio_view_count">
                            <?php $view_count = (int) get_post_meta(get_the_ID(), 'view_count', true);
                                  echo $view_count ? $view_count : 0; 
                             ?>
                                    </span>
                                </div>
              <div class="ms-2 position-relative">
   <i class="fa-solid fa-share-nodes" 
   onclick="toggleShareWidget(this)" 
   style="cursor:pointer;"
   data-title="<?php echo esc_attr($portfolio_title); ?>"
   data-url="<?php echo esc_url($portfolio_link); ?>">
</i>

    <?php
        $encoded_link = urlencode($portfolio_link);
        $encoded_title = urlencode($portfolio_title);
    ?>
    <div class="share-widget" style="display:none;">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_link; ?>" target="_blank" class="share-icon fb" title="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $encoded_link; ?>&text=<?php echo $encoded_title; ?>" target="_blank" class="share-icon x" title="Share on X"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $encoded_link; ?>&title=<?php echo $encoded_title; ?>" target="_blank" class="share-icon linkedin" title="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="https://wa.me/?text=<?php echo $encoded_title . '%20' . $encoded_link; ?>" target="_blank" class="share-icon whatsapp" title="Share on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
    </div>
</div>

                            </div>

                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No portfolio items found.</p>';
        endif;
        ?>
    </div>
</div>
    </section>

<!-- Dataset Challenges Section -->

<!-- Dataset Challenges Section -->

  <section class="pt-5 pb-5 bg-gray" id="dataset_challenge">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center heading-section">
                <h2 class="mb-3 heading"><?php the_field('dataset_challenges_heading'); ?></h2>
                <p class="mb-4 subheading"><?php the_field('dataset_challenges_subheading'); ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="owl-carousel owl-theme carousel-two">
                <?php
                // $args = array(
                //     'post_type'      => 'challenges',
                //     'posts_per_page' => -1,
                //     'post_status'    => 'publish',
                //     'orderby'        => 'meta_value_num',

                //     'meta_query'     => array(
                //     array(
                //         'key'     => 'challenges_end_date',
                //         'value'   => date('Ymd'), // today
                //         'compare' => '>=',
                //         'type'    => 'NUMERIC'
                //     )
                // )
                // );
               $today = date('Ymd');
               $args = array(
                'post_type'      => 'challenges',
                'posts_per_page' => -1, 
                'meta_key'       => 'challenges_date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC', // Show upcoming challenges first
                'meta_query'     => array(
                    array(
                        'key'     => 'challenges_date',
                        'value'   => $today,
                        'compare' => '>=', 
                        'type'    => 'DATE'
                    )
                )
            );
                $query = new WP_Query($args);


                if ($query->have_posts()) {
                    while ($query->have_posts()) : $query->the_post();
                        $title = get_the_title();
                        $permalink = get_permalink();
                        $description = get_field('desciption');
                        $short_description = wp_trim_words($description, 20, '...');
                        $end_date = get_field('challenges_date'); // End date field

                        // Debug: Print raw value
                        echo "<!-- Debug: Post ID: " . get_the_ID() . ", Raw End Date: '$end_date' -->";

                        // Format the end date from DD/MM/YYYY
                        $formatted_end_date = '';
                        if ($end_date) {
                            $date_obj = DateTime::createFromFormat('d/m/Y', $end_date);
                            $formatted_end_date = $date_obj ? $date_obj->format('d F Y') : 'Invalid Date';
                        }
                ?>
                    <div class="item">
                        <div class="dataset-challenge-item">
                            <h1><?php echo esc_html($title); ?></h1>
                            <p class="challenge-decription"><?php echo esc_html($short_description); ?></p>
                            <?php if ($end_date) : ?>
                                <p class="date">End Date: <?php echo esc_html($formatted_end_date); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($permalink); ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                } else {
                    echo "<p>Currently No challenges found.</p>";  
                }
                ?>
            </div>
        </div>
    </div>
</section>



<!-- Dataset Challenges Section End -->

<section class="pt-3 pb-4" id="testimonial" style="background: url('https://onyxdata.co.uk/wp-content/uploads/2025/02/bg-scaled.jpg') no-repeat center center; background-size: cover;"
>
    <div class="container position-relative z-1 ">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center heading-section mt-5">
                <h2 class="mb-3 heading text-white">DataDNA Community Success</h2> 
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme carousel-one">
                <?php
                $args = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $testimonial_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                         $testimonial_content = wpautop(wp_kses_post(get_the_content()) );
                        $testimonial_author = get_the_title();
                        $testimonial_role = get_field('role');
                        $testimonial_rating = get_field('testimonial_rating');
                        $testimonial_logo = get_field('logo');
                        $linkedin_url = get_field('linkedin_url');
                ?>
                <div class="item">
                    <div class="testimonial-card m-0">
                        <div class="row testimonial-row">
                            <div class="col-lg-3 testimonial-col d-flex align-items-center">
                                <div class="testimonial-img">
                                    <img src="<?php echo esc_url($testimonial_image); ?>" class="img-fluid rounded b-shadow-a" alt="<?php echo esc_attr($testimonial_author); ?>">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="testimonial-detail">
                                    <!-- <h2 class="testimonial-heading">What Our Clients Say</h2> -->
                                    <!-- <p class="testimonial-desc"><?php echo $testimonial_content; ?></p> -->
                                    <div class="testimonial-desc">
                                        <?php echo apply_filters('the_content', $testimonial_content); ?>
                                    </div>
                                    <div class="testimonial-rating">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $testimonial_rating) {
                                                echo '<i class="fas fa-star"></i>';
                                            } else {
                                                echo '<i class="far fa-star"></i>';
                                            }
                                        } ?>
                                    </div>
                                    <!-- <h6><?php echo esc_html($testimonial_author); ?></h6>
                                    <span>- <?php echo esc_html($testimonial_role); ?></span> -->
                                <div class="logo_author_parent">
                                    <div>
                                    <h6> 
                               <?php  if ($linkedin_url) { ?>
               <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo esc_attr($testimonial_author); ?>">
                                        <?php echo esc_html($testimonial_author); ?>
                </a>
    <?php }else { ?>
        <?php echo esc_html($testimonial_author); ?>
    <?php } ?>
                                    </h6>
                                    <span>- <?php echo esc_html($testimonial_role); ?></span>
                                    </div>
                                   <!--  <div>  //logo hide
                                     <img src="<?php echo   $testimonial_logo['url']; ?>">
                                    </div> -->
                                   </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section> 
<!-- Testimonial new end -->

 
<section class="counter-section pb-5" id="counter">
    <div class="container mt-3 position-relative">
        <div class="row">
            <?php if( have_rows('counter_section') ): ?>
                <?php while( have_rows('counter_section') ): the_row(); 
                    $icon = get_sub_field('counter_icon');
                    $value = get_sub_field('counter_value');
                    $text = get_sub_field('counter_text');
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-box">
                        <div class="counter-icon">
                            <i class="<?php echo esc_attr($icon); ?>"></i>
                        </div>
                        <h2 class="counter-number" data-target="<?php echo esc_attr($value); ?>">0</h2>
                        <p class="counter-text"><?php echo esc_html($text); ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Sponsor Section -->



<!-- <section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-6 heading-section">
                <h2 class="mb-3 heading">Our Sponsors</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sponsorModal">
                    Become a Sponsor
                </button>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php if( have_rows('sponsors') ): ?>
                <?php while( have_rows('sponsors') ): the_row(); 
                    $logo = get_sub_field('sponsor_image');

                    $alt_text = get_sub_field('sponsor_alt');
                ?>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="sponsor-img">
                        <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($alt_text); ?>">
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section> -->


<?php if (have_rows('sponsors')): ?>
<section class="py-5 bg-light logo_sponsor">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-6 heading-section">
                <h2 class="mb-3 heading">Our Sponsors</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sponsorModal">
                    Become a Sponsor
                </button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="owl-carousel owl-theme sponsor-slider">
                    <?php while (have_rows('sponsors')): the_row(); 
                      

                        $logo = get_sub_field('sponsor_image');
                        $alt_text = get_sub_field('sponsor_alt');
                        $sponsor_url = get_sub_field('sponsors_website_link'); // New ACF field for URL
                    ?>
                    <div class="sponsor-item sponsor-img">
                        <a href="<?php echo esc_url($sponsor_url ?: '#'); ?>" target="_blank">
                            <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid sponsor-img" alt="<?php echo esc_attr($alt_text); ?>">
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

    <!-- sponser section end -->

  <!-- Sponsor Request Modal -->
  <!-- Sponsor Request Modal -->
  <div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sponsorModalLabel">Become a Sponsor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="sponsorForm" method="POST">
                    <div class="mb-3">
                        <label for="sponsorName" class="form-label">Your Name</label>
                        <input type="text" id="sponsorName" name="sponsor_name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="sponsorEmail" class="form-label">Your Email</label>
                        <input type="email" id="sponsorEmail" name="sponsor_email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" id="companyName" name="company_name" class="form-control" placeholder="Enter your company name" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 sponsor-submit-btn">Submit Request</button>
                    <div id="sponsorResponse" class="mt-3" style="display: none;"></div>
                </form>
        </div>
      </div>
    </div>
  </div>




    
    <!--  New section-->
    <section class="insights">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="insights-content">
                        <div class="round-border">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles mr-2 h-3.5 w-3.5 text-data-purple"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path><path d="M20 3v4"></path><path d="M22 5h-4"></path><path d="M4 17v2"></path><path d="M5 18H3"></path></svg>
                            <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                            Join our growing community
                        </div>
                        <div class="con-heading">
                            <h2><?php the_field('heading');?></h2>
                            <p><?php the_field('subheading');?></p>
                        </div>
                        <div class="all-button-insight">

                                <?php 
                        $link = get_field('button_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                          <a href="<?php echo esc_url( $link_url ); ?>" class="community" target="<?php echo esc_attr( $link_target ); ?>" ><i class="fa fa-users"></i><span><?php echo esc_html( $link_title ); ?></span></a>
                    <?php endif; ?>

                     <?php 
                        $link = get_field('button_link_second');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                          <a href="<?php echo esc_url( $link_url ); ?>" class="projects" target="<?php echo esc_attr( $link_target ); ?>"><i class="fa fa-bar-chart"></i><span><?php echo esc_html( $link_title ); ?></span></a>
                    <?php endif; ?>
                          
                        </div>

<div class="join-section">
    <div class="avatars">
        <?php
        $avatars = get_field('data_professionals_images');
        if ($avatars) {
            foreach ($avatars as $avatar) {
                echo wp_get_attachment_image($avatar['ID'], 'thumbnail', false, array(
                    'alt' => esc_attr($avatar['alt'] ?: 'User Avatar'),
                    'class' => 'avatar-image'
                ));
            }
        } else {
            // Fallback images
            echo '<img src="https://i.pravatar.cc/150?img=11" alt="User 1">';
            echo '<img src="https://i.pravatar.cc/150?img=12" alt="User 2">';
            echo '<img src="https://i.pravatar.cc/150?img=13" alt="User 3">';
            echo '<img src="https://i.pravatar.cc/150?img=14" alt="User 4">';
            echo '<img src="https://i.pravatar.cc/150?img=15" alt="User 5">';
        }
        ?>
    </div>
    <div class="join-text">
       <?php echo get_field('data_professional_content') ; ?>
    </div>
</div>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New section end -->

<script>
jQuery(document).ready(function($) {
$('.sponsor-slider').owlCarousel({
        items: 4, 
        loop: true, 
        margin: 30, 
        autoplay: true,
        autoplayTimeout: 3000, 
        autoplayHoverPause: false, 
        nav: true, 
        dots: false , 
        responsive: {
            0: {
                items: 1 // Small mobile
            },
            576: {
                items: 2 // Mobile
            },
            768: {
                items: 3 // Tablet
            },
            992: {
                items: 4 // Desktop
            }
        }
    });


var sponsorForm = jQuery('#sponsorForm');
    sponsorForm.on('submit', function(event) {
        event.preventDefault(); 

        var form = sponsorForm;
        var submitButton = form.find('.sponsor-submit-btn');
        var responseDiv = jQuery('#sponsorResponse');

        submitButton.prop('disabled', true);
        responseDiv.hide().removeClass('alert-success alert-danger');

        // Form ka data collect karo
        var formData = form.serialize();
        formData += '&action=handle_sponsor_request'; 

        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                submitButton.prop('disabled', false);

                if (response.success) {
                    responseDiv
                        .text('Request send to Team , We will contact you shortly!')
                        .addClass('alert alert-success')
                        .show();
                    form[0].reset(); 
                    
                    // setTimeout(function() {
                    //     var modal = jQuery('#sponsorModal');
                    //     modal.modal('hide'); 
                    //     responseDiv.hide();
                    // }, 3000);
                } else {
                    responseDiv
                        .text(response.data || 'Something went wrong.')
                        .addClass('alert alert-danger')
                        .show();
                }
            },
            error: function(xhr) {
                submitButton.prop('disabled', false).text('Submit Request');
                responseDiv
                    .text('An error occurred: ' + xhr.responseText)
                    .addClass('alert alert-danger')
                    .show();
            }
        });
    });
 });


document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter-number');

    const animateCounter = (counter) => {
        const targetString = counter.getAttribute('data-target'); // e.g., "25,000+", "4.7", "4000"
        const hasPlus = targetString.includes('+');
        const hasDecimal = targetString.includes('.');
        const hasComma = targetString.includes(',');
        
        // Clean the string for parsing (remove commas and plus)
        const cleanNumberString = targetString.replace(/,/g, '').replace('+', '');
        const numberPart = parseFloat(cleanNumberString);

        if (isNaN(numberPart)) {
            counter.innerText = targetString; // Show original if not a number
            return;
        }

        const duration = 2000;
        const increment = numberPart / (duration / 60);
        let current = 0;

        const formatNumber = (num) => {
            let formatted;
            
            if (hasComma) {
                // Format with commas for thousands
                formatted = num.toLocaleString('en-US', {
                    maximumFractionDigits: hasDecimal ? 1 : 0
                });
            } else if (hasDecimal) {
                formatted = num.toFixed(1);
            } else {
                formatted = Math.round(num).toString();
            }
            
            // Add plus sign back if needed
            if (hasPlus && num >= numberPart) {
                formatted += '+';
            }
            
            return formatted;
        };

        const updateCounter = () => {
            current += increment;
            if (current >= numberPart) {
                counter.innerText = formatNumber(numberPart);
            } else {
                counter.innerText = formatNumber(current);
                requestAnimationFrame(updateCounter);
            }
        };
        
        updateCounter();
    };

    // Intersection Observer setup
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
});


jQuery(document).ready(function($) {
    $('.portfolio-tabs .nav-link').on('click', function(e) {

        e.preventDefault();
        var term = $(this).data('term');
 
        $('.portfolio-tabs .nav-link').removeClass('active');
        $(this).addClass('active');
        $('#portfolio-loading-overlay').fadeIn(200);
        ajaxInProgress = true;

        $.ajax({
           url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_portfolios_home',
                term: term,
            },
            success: function(response) {
                console.log(response)
                $('#portfolio-items').html(response.html);
            },
            error: function(xhr, status, error) {
                $('#portfolio-items').html('<p>Error loading portfolios: ' + error + '</p>');
                console.log('AJAX Error:', xhr.responseText);
            },
            complete: function() {
                // Hide loading overlay
                $('#portfolio-loading-overlay').fadeOut(200);
                ajaxInProgress = false;
            }
        });
    });
});
</script>
    <!-- featured portfolio  end  -->
<?php get_footer(); ?>
<?php get_template_part('template-parts/footer_v1'); ?>



