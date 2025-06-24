<?php 

/**
 * Template Name: PORTFOLIO PAGE V2 test
 */
get_header();

?>
<style>
/* Pagination Container */
.portfolio-pagination {
    text-align: center;
    margin-top: 30px;
    padding: 10px 0;
}

/* Inner Container for Pagination Links */
.portfolio-pagination-inner {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

/* Pagination Buttons (Normal State) */
.portfolio-pagination a.page-numbers,
.portfolio-pagination .page-numbers {
    display: inline-block;
    padding: 6px 10px;
    font-size: 14px;
    font-weight: 500;
    color: #333333;
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
}

/* Current Page (Active State) */
.portfolio-pagination .page-numbers.current {
    background-color: #007bff;
    color: #ffffff;
    border-color: #007bff;
    cursor: default;
}

/* Hover State for Buttons */
.portfolio-pagination a.page-numbers:hover {
    background-color: #007bff;
    color: #ffffff;
    border-color: #007bff;
    transform: scale(1.05);
    box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
}

/* Disabled State (Optional, for edge cases) */
.portfolio-pagination a.page-numbers.disabled {
    color: #cccccc;
    background-color: #f5f5f5;
    border-color: #e0e0e0;
    cursor: not-allowed;
}


 .portfolio-pagination .page-numbers {
    display: inline-block;
    padding: 6px 10px;
    font-size: 14px;
    font-weight: 500;
    color: #333333;
    /* background-color: #ffffff; */
    /* border: 1px solid #e0e0e0; */
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
}


.portfolio-pagination .page-numbers > span {
    padding: 0;
    border: 0;
    background: transparent;
}

.portfolio-pagination .page-numbers.current > span {
    color: #fff;
}
.portfolio-pagination a.page-numbers:hover span.page-numbers {  color: #ffffff; }

/* Responsive Adjustments */
@media (max-width: 576px) {
    .portfolio-pagination a.page-numbers,
    .portfolio-pagination .page-numbers {
        padding: 8px 12px;
        font-size: 14px;
    }
}
</style>
<?php get_template_part('template-parts/header_v1'); ?>
    <style>
        .portfolio-img{
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
        }
        .portfolio-title a:hover{
        color:#ffbb09;
        }

        .filter-container {
            display: flex;
            gap: 15px;
            align-items: center;
            padding: 20px 0px;
        }
        .filter-box {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .filter-box input, .filter-box select {
            padding: 8px;
/*            width: 150px;*/
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input#search-portfolio {
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .serch.portfolio {
    width: 50%;
}
#portfolio-loader img,#portfolio-loader-2 img {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200px;
    transform: translate(-50%, -50%);
}


.portfolio-item {
    border: 1px solid #00000029;
    border-radius: 10px;
    height: calc(100% - 40px);
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    background: white;
}
.skills {
    margin: 16px 0px 30px;
    display: inline-block;
}
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
.portfolio-title a {
    color: #000;
}

p.portfolio-excerpt {
    color: #000;
}
.skill-badge {
    background-color: #ffbb09;
    color: #fff;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 14px;
}

.author_section {
    padding: 10px 10px;
    margin-bottom: 10px;
}
.heading-section .heading{
  margin: 30px auto 20px;
}
@media(max-width:767px){

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
            column-gap: 10px;
            align-items: center;
            padding: 20px 10px;
        }
        .filter-box:first-child{ width: 100%; }
        .filter-box input, .filter-box select {
           width: 100%;
          }
          .filter-box {
            width: 48%;
            }
            .serch.portfolio {
                width: 100%;
            }

            .portfolio-image .portfolio-caption, .portfolio-image .btn-like, .portfolio-image .btn-save, .portfolio-image::before {
    opacity: 1 !important;
}
        }

    </style>

  


<?php $banner_image =  get_field('banner_image');?>
    <section class="leaderboard-section" style="background-image:linear-gradient(to bottom, rgb(0 0 0 / 62%) 0%, rgb(0 0 0 / 78%) 100%), url(<?php echo $banner_image;?>);">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="leader-content">
                        <h2><?php the_field('banner_heading');?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- featured portfolio  start  -->

<!-- <section class="pt-3 pb-70 bg-gray" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center heading-section">
                <h2 class="mb-3 heading"> <?php the_field('main_heading'); ?></h2>
                <p class="mb-4 subheading"> <?php the_field('main_subheading'); ?></p>
            </div>
        </div>
    </div>
<?php $hidden_users = get_users([
    'meta_key'   => 'hide_portfolio_from_front',
    'meta_value' => 'yes',
    'fields'     => 'ID'
]);

$count_args = [
    'post_type'      => 'portfolios',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'fields'         => 'ids',
];

if (!empty($hidden_users)) {
    $count_args['author__not_in'] = $hidden_users;
}

$portfolio_count_query = new WP_Query($count_args);
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h3 class="portfolio-show">Showing <span class="text-yellow">
                        <?php echo $portfolio_count_query->found_posts; ?></span> Portfolio For You
                    </h3>
                </div>
            </div>
           
        </div>
    </div>

    <div class="container" style="position: relative;">
<div class="filters" >

            <div class="serch portfolio">
                <label></label>
                <input type="text" id="search-portfolio1" placeholder="Search portfolio"> 
            </div>
             <select id="filter-tools" class="filter-select skills_and_tools">
                <option value="">All Tools</option>
                <option value="power_bi">Power BI</option>
                <option value="Python">Python</option>
                <option value="Excel">Excel</option>
                <option value="Qlik">Qlik</option>
                <option value="zoomCharts">ZoomCharts</option>
                <option value="tableau">Tableau</option>
                <option value="other">Other</option>
            </select>
            

            <select id="sort-by1">
                <option value="newest">Newest</option>
                <option value="popular">Popular</option>
                <option value="trending">Trending</option>
            </select>
        </div>


      
    <div id="portfolio-container" class="row" >
        <?php
       // Get all users who want to hide their portfolios
        $hidden_users = get_users([
            'meta_key' => 'hide_portfolio_from_front',
            'meta_value' => 'yes',
            'fields' => 'ID'    
        ]);
        $args = array(
            'post_type'      => 'portfolios',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
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
                             
                                
                            <button class="btn-like like_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'liked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">

                              <i class="fa-regular fa-heart"></i>
                         </button>

                           <button class="btn-save bookmark_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'bookmarked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                                  <i class="fa-regular fa-bookmark"></i>
                         </button>
                            </div>
                        </a>

                      
     <div class="portfolio-content mt-3">
        <h3 class="portfolio-title">
            <a href="<?php echo esc_url($portfolio_link); ?>">
                <?php echo esc_html($portfolio_title); ?>
            </a>
        </h3>
        
        <p class="portfolio-excerpt">
            <?php $excerpt = get_the_excerpt(); 
                echo wp_trim_words($excerpt, 20, '...');
            ?>
        </p>

     <?php   $field = get_field_object('skills_and_tools');

               $skills_and_tools = $field['value'];

            if( $skills_and_tools ){ ?>
            <div class="skills">
                <?php foreach( $skills_and_tools as $skills_and_tool ){ 
                ?>   
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


                                 <div class="d-flex align-items-center">

        <?php
         $author_id = get_the_author_meta('ID');

    // Get profile URL
    $default_url = uwp_build_profile_tab_url($author_id);// userswp plugin author url 
    $username = basename($default_url); 
    $base_url = 'https://datadna.onyxdata.co.uk/profile/';
    $author_profile_url = $base_url . '?uwp_profile=' . urlencode($username);

        ?>
            <a href="<?php echo esc_url( $author_profile_url ); ?>" class="portfolio-view">
                <?php
                $author_id = get_the_author_meta('ID');
                $author_image = get_avatar_url($author_id, ['size' => 100]); // Get author's profile image

                
                if ($author_image) {
                    echo '<img src="' . esc_url($author_image) . '" alt="Author">';
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/view.png" alt="viewer">';
                }
                ?>
           
            <span class="portfolio-viewer-name"> By <?php echo esc_html(get_the_author()); ?> </span>
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

    <div id="portfolio-loading-overlay" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgb(14 12 12 / 42%);; z-index: 9; justify-content: center; align-items: center;">
    <div id="portfolio-loader" style="text-align: center;">
        <img src="https://datadna.onyxdata.co.uk/wp-content/themes/onyxdata-child/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50">
        <p style="color: #333; margin-top: 15px;"></p>
    </div>
</div>

   

    </div>
</section> -->



   

    



<section class="pt-3 pb-70 bg-gray" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center heading-section">
                <h2 class="mb-3 heading"><?php the_field('main_heading'); ?></h2>
                <p class="mb-4 subheading"><?php the_field('main_subheading'); ?></p>
            </div>
        </div>
    </div>

    <?php
    $hidden_users = get_users([
        'meta_key'   => 'hide_portfolio_from_front',
        'meta_value' => 'yes',
        'fields'     => 'ID'
    ]);

    $count_args = [
        'post_type'      => 'portfolios',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ];

    if (!empty($hidden_users)) {
        $count_args['author__not_in'] = $hidden_users;
    }

    $portfolio_count_query = new WP_Query($count_args);
    $total_posts = $portfolio_count_query->found_posts;

    // Initial query for 8 posts
    $paged = max(1, get_query_var('paged') ? get_query_var('paged') : (isset($_GET['paged']) ? intval($_GET['paged']) : 1));
    $args = [
        'post_type'      => 'portfolios',
        'posts_per_page' => 8,
        'post_status'    => 'publish',
        'paged'          => $paged,
    ];

    if (!empty($hidden_users)) {
        $args['author__not_in'] = $hidden_users;
    }

    $portfolio_query = new WP_Query($args);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h3 class="portfolio-show">Showing <span class="text-yellow" id="portfolio-counter"><?php echo $total_posts; ?></span> Portfolio For You</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="position: relative;">
        <div class="filters">
            <div class="serch portfolio">
                <label></label>
                <input type="text" id="search-portfolio1" placeholder="Search portfolio">
            </div>
            <select id="filter-tools1" class="filter-select skills_and_tools1">
                <option value="">All Tools</option>
                <option value="power_bi">Power BI</option>
                <option value="Python">Python</option>
                <option value="Excel">Excel</option>
                <option value="Qlik">Qlik</option>
                <option value="zoomCharts">ZoomCharts</option>
                <option value="tableau">Tableau</option>
                <option value="other">Other</option>
            </select>
            <select id="sort-by1">
                <option value="newest">Newest</option>
                <option value="popular">Popular</option>
                <option value="trending">Trending</option>
            </select>
        </div>

        <div id="portfolio-container" class="row">
            <?php
            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $portfolio_title = get_the_title();
                    $portfolio_link = get_permalink();
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="portfolio-item">
                            <a href="<?php echo esc_url($portfolio_link); ?>" class="portfolio-link">
                                <div class="portfolio-image">
                                    <img src="<?php echo esc_url($portfolio_image); ?>" alt="<?php echo esc_attr($portfolio_title); ?>">
                                    <button class="btn-like like_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'liked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                    <button class="btn-save bookmark_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'bookmarked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                                        <i class="fa-regular fa-bookmark"></i>
                                    </button>
                                </div>
                            </a>

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
                                <?php
                                $field = get_field_object('skills_and_tools');
                                $skills_and_tools = $field['value'];
                                if ($skills_and_tools) : ?>
                                    <div class="skills">
                                        <?php foreach ($skills_and_tools as $skills_and_tool) :
                                            $raw_value = $skills_and_tool;
                                            $label = $field['choices'][$skills_and_tool];
                                            $formatted_label = str_replace('_', ' ', $label);
                                            $formatted_label = ucwords($formatted_label);
                                            if ($raw_value === 'power_bi') {
                                                $formatted_label = 'Power BI';
                                            }
                                            ?>
                                            <span class="skill-badge"><?php echo esc_html($formatted_label); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mt-3 viewer d-flex align-items-center justify-content-between author_section">
                                <div class="d-flex align-items-center">
                                    <?php
                                    $author_id = get_the_author_meta('ID');
                                    $default_url = uwp_build_profile_tab_url($author_id);
                                    $username = basename($default_url);
                                    $base_url = 'https://datadna.onyxdata.co.uk/profile/';
                                    $author_profile_url = $base_url . '?uwp_profile=' . urlencode($username);
                                    ?>
                                    <a href="<?php echo esc_url($author_profile_url); ?>" class="portfolio-view">
                                        <?php
                                        $author_image = get_avatar_url($author_id, ['size' => 100]);
                                        if ($author_image) {
                                            echo '<img src="' . esc_url($author_image) . '" alt="Author">';
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/images/view.png" alt="viewer">';
                                        }
                                        ?>
                                        <span class="portfolio-viewer-name"> By <?php echo esc_html(get_the_author()); ?> </span>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <i class="fa-solid fa-heart"></i>
                                        <span class="portfolio-liked">
                                            <?php
                                            $like_count = (int) get_post_meta(get_the_ID(), 'like_count', true);
                                            echo $like_count ?: 0;
                                            ?>
                                        </span>
                                    </div>
                                    <div class="ms-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span class="portfolio-liked portfolio_view_count">
                                            <?php
                                            $view_count = (int) get_post_meta(get_the_ID(), 'view_count', true);
                                            echo $view_count ?: 0;
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
            else :
                echo '<p>No portfolio items found.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>

        <div id="portfolio-pagination" class="portfolio-pagination col-12" style="text-align: center; margin-top: 30px;">
            <?php
            echo paginate_links([
                'total'   => $portfolio_query->max_num_pages,
                'current' => $paged,
                'format'  => '?paged=%#%',
                'prev_text' => '« Prev',
                'next_text' => 'Next »',
                'before_page_number' => '<span class="page-numbers">',
                'after_page_number'  => '</span>',
                'mid_size' => 2,
            ]);
            ?>
        </div>

        <div id="portfolio-loading-overlay" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgb(14 12 12 / 42%); z-index: 9; justify-content: center; align-items: center;">
            <div id="portfolio-loader" style="text-align: center;">
                <img src="https://datadna.onyxdata.co.uk/wp-content/themes/onyxdata-child/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50">
                <p style="color: #333; margin-top: 15px;"></p>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
<?php get_template_part('template-parts/footer_v1'); ?>