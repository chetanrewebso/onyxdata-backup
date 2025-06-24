<?php
/**
 * Template Name: Data Visualization Page
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
    <?php
    $image = get_field('visualisation_banner');
    if (!empty($image)): ?>
    <div class="onyx-inner entry-header onyx-gallery-header" style="background-image:url(<?php echo esc_url($image['url']); ?>);">
      <div class="container">
        <div class="grid">
          <div class="g-col-xxl-6 g-col-xl-6 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12 onyx-inner-header onyx-gallery-inner-header">
            <h1 class="onyx-inner-title visualisation"><?php echo esc_html(get_field('visualisation_title')); ?></h1>
            <?php echo wp_kses_post(get_field('visualisation_content')); ?>
            <?php
              $link = get_field('visualisation_button');
              if ($link):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a href="<?php echo esc_url($link_url); ?>" class="od-btn" aria-label="Contact Us">
              <?php echo esc_html($link_title); ?>
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>






    <?php
    global $wpdb;
      $current_page_id = $post->ID;
      $current_page = max(1, get_query_var('paged', 1));
      $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
      $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$uri_parts[0]";
      $current_order = 'asc';
      $active_asc_color = 'currentColor';
      $active_desc_color = '#000';
      $where_condition = '';
      if(isset($_GET['order']) && $_GET['order']!=''){
        if($_GET['order']=='desc'){
          $active_asc_color = '#000';
          $active_desc_color = 'currentColor';
          $current_order = 'desc';
        }
      }
      $search_text = '';
      if(isset($_GET['search_text']) && $_GET['search_text']!=''){
        $search_text = $_GET['search_text'];
        $where_condition = " AND $wpdb->posts.post_title LIKE '$search_text%'";
      }
      $search_dataset = '';
      if(isset($_GET['search_dataset']) && $_GET['search_dataset']!=''){
        $search_dataset = $_GET['search_dataset'];
      }
      $search_rank = '';
      if(isset($_GET['search_rank']) && $_GET['search_rank']!=''){
        $search_rank = $_GET['search_rank'];
      }
      $search_year = '';
      if(isset($_GET['search_year']) && $_GET['search_year']!=''){
        $search_year = $_GET['search_year'];
      }
      $search_month = '';
      if(isset($_GET['search_month']) && $_GET['search_month']!=''){
        $search_month = $_GET['search_month'];
        if($search_year==''){
          $search_year = '2024';
        }
      }
    ?>
    <div class="entry-content">
      <!-- Image gallery -->
      <div class="onyx-img-gallery">
        <div class="container" id="ajaxcontent_news">
          <div class="od-heading-box">
            <div class="od-heading mb-3">

              <h3><?php echo esc_html(get_field('image_gallery_title')); ?></h3>
              <div class="od-sorting">
                <h3 class="label">Sort</h3>
                <div class="sorting-indicators">

                  <a href="<?php echo $actual_link; ?>?search_text=<?php echo $search_text; ?>&search_dataset=<?php echo $search_dataset; ?>&search_rank=<?php echo $search_rank; ?>&search_year=<?php echo $search_year; ?>&search_month=<?php echo $search_month; ?>&order=asc" class="sorting-indicator asc" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="<?php echo $active_asc_color; ?>">
                      <path d="M13 12V20H11V12H4L12 4L20 12H13Z"></path>
                    </svg>
                  </a>
                  <a href="<?php echo $actual_link; ?>?search_text=<?php echo $search_text; ?>&order=desc" class="sorting-indicator desc" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="<?php echo $active_desc_color; ?>">
                      <path d="M13 12H20L12 20L4 12H11V4H13V12Z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="onyx-search-form mb-3">
              <form role="search" method="get" class="search-form" action="<?php echo get_permalink($post->ID); ?>">
                <input type="hidden" name="order" value="<?php echo $current_order; ?>">
                <div class="form-group">
                  <label>Title</label>
                  <input type="search" class="form-control" placeholder="<?php echo esc_attr_x('Search Title', 'placeholder'); ?>" value="<?php echo $search_text; ?>" name="search_text" />
                </div>
                <div class="form-group">
                  <label>Dataset</label>
                  <input type="search" class="form-control" placeholder="<?php echo esc_attr_x('Search Dataset', 'placeholder'); ?>" value="<?php echo $search_dataset; ?>" name="search_dataset" />
                </div>
                <div class="form-group">
                  <label>Rank</label>
                  <input type="search" class="form-control" placeholder="<?php echo esc_attr_x('Search Rank', 'placeholder'); ?>" value="<?php echo $search_rank; ?>" name="search_rank" />
                </div>
                <div class="form-group">
                  <label>Year</label>
                  <select class="form-control" name="search_year">
                    <option value="">Select year</option>
                    <?php $c_year = date('Y'); $startYear = 2019; ?>
                    <?php

                      for($c_year; $c_year>= $startYear; $c_year--) {
                        $is_y_sel = '';
                        if($search_year==$c_year){
                          $is_y_sel = 'selected';
                        }
                        echo '<option value="'.$c_year.'" '.$is_y_sel.'>'.$c_year.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Month</label>
                  <select class="form-control" name="search_month">
                    <option value="">Select month</option>
                    <?php
                      $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
                      ?>
                    <?php
                          foreach ($months as $key => $month) {
                            $is_m_sel = '';
                            if($search_month==$key){
                              $is_m_sel = 'selected';
                            }
                            echo '<option value="'.$key.'" '.$is_m_sel.'>'.$key.'</option>';
                          }
                        ?>
                    <!-- <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option> -->
                  </select>
                </div>
                <div class="form-group">
                  <label></label>
                  <button type="submit" class="od-btn"><?php echo _x('Search', 'submit button'); ?></button>
                  <!-- <button type="reset" class="od-btn"><?php echo _x('Reset', 'submit button'); ?></button> -->
                </div>
                <div class="form-group">
                  <label></label>
                  <a href="<?php echo $actual_link; ?>?order=<?php echo $current_order; ?>" class="od-btn" aria-hidden="true">Reset</a>
                  <!-- <button type="reset" class="od-btn"><?php echo _x('Reset', 'submit button'); ?></button> -->
                </div>
              </form>
            </div>
          </div>
          <div class="onyx-fancybox grid">
            <?php
            $gallery_image_ids = get_post_meta( $post->ID, 'images_gallery', true );
            $g_ids = implode(',',$gallery_image_ids);




            // echo "<pre>"; print_r($result); "</pre>";
            // $gallery = get_field('images_gallery');
            $items_per_page = 100;
            // $total_items = count($gallery);
            // $total_pages = ceil($total_items / $items_per_page);
            // $current_page = max(1, get_query_var('paged', 1));
            // $starting_point = ($current_page - 1) * $items_per_page;
            // $images = array_slice($gallery, $starting_point, $items_per_page);

            // $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
            $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $offset = ( $page * $items_per_page ) - $items_per_page;

             $args = array(
              'post_type' => 'attachment',
              'post__in' => $gallery_image_ids,
              'nopaging' => true,
              'orderby' => 'title',
              'order' => $current_order,
            );
            if($search_text!=''){
              $args['s']= $search_text;
            }
            if($search_dataset!=''){
              $args['meta_query'][] =
                array(
                  'key'     => '_od_image_dataset',
                  'value'   => $search_dataset,
                  'compare' => 'LIKE',
                );
            }
            if($search_rank!=''){
              $args['meta_query'][] = array(
                array(
                  'key'     => '_od_image_rank',
                  'value'   => $search_rank,
                  'compare' => 'LIKE',
                ),
              );
            }
            if($search_year!=''){
              $args['meta_query'][] = array(
                array(
                  'key'     => '_od_image_year',
                  'value'   => $search_year,
                  'compare' => 'LIKE',
                ),
              );
            }
            if($search_month!=''){
              $args['meta_query'][] = array(
                array(
                  'key'     => '_od_image_month',
                  'value'   => $search_month,
                  'compare' => 'LIKE',
                ),
              );
            }
            $total_query = get_posts($args);
            // echo "<pre>"; print_r($args); "</pre>";

            // Start total gallery images
            // $total_query = "SELECT *
            //   FROM $wpdb->posts
            //   WHERE $wpdb->posts.ID IN ('$g_ids')
            //   $where_condition
            //   ORDER BY $wpdb->posts.post_title $current_order";
            $total_gallery_images = count($total_query);
            $total_pages = intval($total_gallery_images / $items_per_page) + 1;
            // End total gallery images
            // echo count($total_gallery_images);

            // Start get gallery images by query
            /*$gallery_images = $wpdb->get_results("
              SELECT *
              FROM $wpdb->posts
              WHERE $wpdb->posts.ID IN ('$g_ids')
              $where_condition
              ORDER BY $wpdb->posts.post_title $current_order LIMIT $offset, $items_per_page
            ", ARRAY_A );
            $total_query = count($gallery_images);*/
            $args['numberposts']= $items_per_page;
            $args['offset']= $offset;
            $args['nopaging']= false;
            $gallery_images = get_posts($args);
            // echo "<pre>"; print_r($args); "</pre>";
            $gallery_by_page = count($gallery_images);
            // echo " SELECT `ID`, `post_title`, `post_modified` FROM $wpdb->posts WHERE $wpdb->posts.ID IN ('$g_ids') $where_condition ORDER BY $wpdb->posts.post_title $current_order LIMIT $offset, $items_per_page";
            // echo "<pre>"; print_r($gallery_images); "</pre>";
            if (!empty($gallery_images)):
                $banner_after_some_image = 20;
                $j = 1;
                foreach ($gallery_images as $i => $image):
                  $j++;
                // $feat_image_url = wp_get_attachment_url( $image->ID );
                  $image_url = wp_get_attachment_image_src( $image->ID, 'full' );
                  // echo "<pre>"; print_r($image_url); "</pre>";
                ?>
            <div class="g-col-xxl-3 g-col-xl-3 g-col-lg-4 g-col-md-4 g-col-sm-6 g-col-12 onyx-fancybox-content d-flex flex-column">
              <a href="<?php echo esc_url($image_url[0]); ?>" class="onyx-fancybox-content-img overflow-hidden" data-fancybox="img-gallery" data-image="<?php echo esc_url($image_url[0]); ?>">
                <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_html($image->post_title); ?>" width="<?php echo esc_attr($image_url[1]); ?>" height="<?php echo esc_attr($image_url[2]); ?>">
              </a>
              <p class="fw-bold text-center mb-0"><?php echo esc_html($image->post_title); ?></p>
            </div>
            <?php
             if (($i + 1) % $banner_after_some_image === 0 && ($i + 1) % $items_per_page !== 0): ?>
            <div class="onyx-img-gallery-btn g-col-12 mt-0">
              <?php
              $link = get_field('get_in_touch');
              if ($link):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <a href="<?php echo esc_url($link_url); ?>" class="od-btn" aria-label="Get in touch">
                <?php echo esc_html($link_title); ?>
              </a>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php else: ?>
			  <div class="g-col-xxl-12 g-col-xl-12 g-col-lg-12 g-col-md-12 g-col-sm-12 g-col-12 onyx-fancybox-content d-flex flex-column">
				  <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
			  </div>                
            <?php endif; ?>
          </div>
          <div class="pagination_bottom">
            <?php
            // echo $total_gallery_images;
            // echo $gallery_by_page;
            // echo $total_gallery_images;
            if ($total_gallery_images > $gallery_by_page) {
                $link_unescaped = get_pagenum_link( 1, false ); // esc=false so parse_url works.
                $url_components = wp_parse_url( $link_unescaped );
                $add_args       = array();
                if ( isset( $url_components['query'] ) ) {
                    wp_parse_str( $url_components['query'], $add_args ); // $add_args is updated.
                }
                //echo '<div id="pagination" class="clearfix">';
                $current_page = max(1, get_query_var('paged'));
                echo paginate_links(array(
                  'base'      => strtok( $link_unescaped, '?' ) . '%_%',
                  'format' => 'page/%#%/',
                  'current' => $current_page,
                  'total' => $total_pages,
                  // 'prev_next'    => false,
                  // 'type'         => 'list',
                  'add_args'  => $add_args,
                  ));
                //echo '</div>';
            }
            // echo paginate_links(array(
            //     'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            //     'format' => '?paged=%#%',
            //     'current' => $current_page,
            //     'total' => $total_pages,
            // ));
            ?>
          </div>
        </div>

        <div class="onyx-img-gallery-btn">
          <?php
          $link = get_field('get_in_touch');
          if ($link):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self'; ?>
          <a href="<?php echo esc_url($link_url); ?>" class="od-btn" aria-label="Get in touch">
            <?php echo esc_html($link_title); ?>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <?php $banner_image = get_field('banner_image'); ?>
      <div class="onyx-data-speak" style="background-image:url(<?php echo esc_url($banner_image['url']); ?>);">
        <div class="container">
          <div class="onyx-data-speak-content">
            <div class="od-heading">
              <h2><?php echo wp_kses_post(get_field('make_title')); ?></h2>
              <?php echo wp_kses_post(get_field('make_content')); ?>
              <?php
              $link = get_field('make_button');
              if ($link):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <a href="<?php echo esc_url($link_url); ?>" class="od-btn" aria-label="Participate">
                <?php echo esc_html($link_title); ?>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>




<?php get_footer(); ?>