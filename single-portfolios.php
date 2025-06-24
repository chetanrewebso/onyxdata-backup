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
<?php get_template_part('template-parts/header_v1'); ?>
  <style>
       

        .portfolio-detail {
            border: 1px solid #E6E8EE;
            background-color: #FFF;
            border-radius: 10px;
            padding: 25px 30px;
            margin-bottom: 24px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .portfolio-detail-img {
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
/*            height: 400px;*/
            position: relative;
        }

        .portfolio-detail-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .portfolio-detail-img:hover img {
/*            transform: scale(1.05);*/
        }

        .portfolio-header h2 {
            font-size: 24px;
            font-weight: 700;
        }

        .author {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .author img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .author-info h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .author-info p {
            font-size: 13px;
            color: #757575;
        }

        .project-description {
            font-size: 16px;
            line-height: 1.6;
            margin: 20px 0;
        }

        .skills {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
    margin-top: 19px;
}

        .skill-badge {
            background-color: #ffbb09;
            color: #fff;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .live-demo-btn {
            background: #007bff;
            color: white;
            padding: 12px 18px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }

        .comments-section {
            margin-top: 40px;
        }

        .comment {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .comment img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comment-content {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
        }

        .related-projects {
            margin-top: 50px;
        }

        .social{
    display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        flex-wrap: wrap;
        padding:8px 35px 0 0px;
}
.social li {
    width: 42px;
    text-align: center;
    background-color: #ffc107;
    color: #ffffff;
    margin-right: 20px;
    padding: 5px;
    border-radius: 33px;
    transition: all .25s linear;
    height: 42px;
    line-height: 36px;
    border: 1px solid #fff;
}

.social li a i {
    color: #000;
    transition: all .25s linear;
    font-size: 18px;
}
.social li:hover{
 
    background-color: #000;
    cursor: pointer;
    transition: all .25s linear;
}
.social li:hover a i{
    color: #ffc107;
   
}
.likes-save-btn {
    position: absolute;
    top: 10px;
    right: 10px; 
    display: flex;
    gap: 10px;
}

.likes-save-btn .btn-like, 
.likes-save-btn .btn-save { 
    background-color: #fffffffc;
    border: none;
    color: #000000;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.5s ease-in-out;
    z-index: 2;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    line-height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1; 
}
.likes-save-btn .btn-save {
    right: 51px;
    top: 0;
}
.prtfol_views{
    display: flex;
    justify-content: space-between;
}
i.fa-solid.fa-heart {
    color: #d75e5e;
}



.portfolio-gallery h4 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #333;
}

.portfolio-card {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.portfolio-card:hover {
    transform: translateY(-5px);
}

.portfolio-card img {
    width: 100%;
    height: 200px; /* Fixed height for consistency */
    object-fit: cover; /* Image ko crop karke fit karega */
    display: block;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.portfolio-card:hover .overlay {
    opacity: 1;
}

.zoom-icon {
    color: #fff;
    font-size: 24px;
}

@media(max-width:540px){
    .portfolio-detail-img {
    height: 246px; 
}
.portfolio-detail{    padding: 25px 10px;box-shadow:none;}
}
</style> <!-- Header Section -->

    <?php while (have_posts()) : the_post(); ?>
      <section class="leaderboard-section" style="background-image:linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/images/portfolio-detail.jpg);">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="leader-content">
                        <h2>Portfolio Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Detail Section -->
    <section class="pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="portfolio-detail">
                        <div class="portfolio-header">
                            <h2><?php the_title(); ?></h2>
                            <?php
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_email = get_the_author_meta('user_email', $author_id);
    $author_image = get_avatar_url($author_email, ['size' => 100]);

// Get profile URL
$default_url = uwp_build_profile_tab_url($author_id);// userswp plugin author url 
$username = basename($default_url); 
$base_url = 'https://datadna.onyxdata.co.uk/profile/';
$author_profile_url = $base_url . '?uwp_profile=' . urlencode($username);

        
            ?>
                    <div class="prtfol_views">
                        <a class="author mt-2 mb-3" href="<?php echo esc_url($author_profile_url); ?>" class="author-link">
                                <img src="<?php echo esc_url($author_image); ?>" alt="Author">
                                <div class="author-info">
                                    <h4><?php echo esc_html($author_name); ?></h4>
                                    <!-- <p>UI/UX Designer</p> -->
                                </div>
                          </a>

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
        $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $encoded_image = urlencode($portfolio_image);
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

                        <div class="portfolio-detail-img ">
                            <!-- Display Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
            
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>">
            
        <?php endif; ?>
                           <div class="likes-save-btn">
                            <!--    <button class="btn-like"><i class="fa-regular fa-heart"></i></button>-->
                            <!--<button class="btn-save"><i class="fa-regular fa-bookmark"></i></button>-->
                              <button class="btn-like like_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'liked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">

                                    <i class="fa-regular fa-heart"></i>
                                </button>

                            <button class="btn-save bookmark_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'bookmarked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                                      <i class="fa-regular fa-bookmark"></i>
                            </button>
                            </div>
                           
                        </div>

                              
        <!-- Portfolio Images from ACF Repeater -->
        <!-- <?php if (have_rows('portfolio_images', get_the_ID())) : ?>
            <div class="portfolio-gallery mt-4">
                <h4>Portfolio Images</h4>
                <div class="row">
                    <?php while (have_rows('portfolio_images', get_the_ID())) : the_row(); ?>
                        <?php 
                        $image_url = get_sub_field('image'); // Direct URL fetch karo
                        $image_alt = get_the_title(); // Alt text ke liye post title use karo (ya custom field add karo)
                        if ($image_url) : // Agar URL valid hai toh display karo
                        ?>
                            <div class="col-md-4 mb-3">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid rounded">
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php else : ?>
            <p>No portfolio images found.</p>
        <?php endif; ?> -->

        <?php if (have_rows('portfolio_images', get_the_ID())) : ?>
    <div class="portfolio-gallery mt-4">
        <h4>Other Portfolio Images </h4>
        <div class="row">
            <?php while (have_rows('portfolio_images', get_the_ID())) : the_row(); ?>
                <?php 
                $image_url = get_sub_field('image'); // URL-based approach
                $image_alt = get_the_title();
                if ($image_url) :
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="portfolio-card">
                            <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($image_alt); ?>">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid rounded">
                                <div class="overlay">
                                    <span class="zoom-icon"><i class="fas fa-search-plus"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
                                  
                        <p class="project-description">
                          <?php the_field('description');?>
                        </p>

                    <?php the_field('skills_&_tools');?>
                        <h4>Skills & Tools Used:</h4>
                       
<?php
$field = get_field_object('skills_and_tools');
$skills_and_tools = $field['value'];

if( $skills_and_tools ){?>
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
                      

                           <!-- Social Media Share Section -->
        <h4 class="mt-4">Share this Project:</h4>
        <ul class="social">
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/uptowncow/" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/@uptowncow6241" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </li>
           
            
        </ul>
                    </div>

                   

                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>

     <!-- Related Projects Section -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
<!-- Add before </body> -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Optional settings
    });
</script>
    <?php get_footer(); ?>
    <?php get_template_part('template-parts/footer_v1'); ?>