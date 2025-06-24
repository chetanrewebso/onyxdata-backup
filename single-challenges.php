<?php echo get_header();
get_template_part('template-parts/header_v1'); 
?>
            
<style>
section.leaderboard-section {
    min-height: 70vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding-top: 163px;
     height: auto;
}
.leader-content.challance {
    text-align: left;
}
.countdowns {
    text-align: left;
    position: relative;
    padding-top: 35px;
    padding-bottom: 30px;
}
.countdowns:before {
    position: absolute;
    content: '';
    background: #ffbb09;
    height: 3px;
    width: 100px;
    height: 3px;
    top: 0;
    /* border-radius: 50px; */
}
.timer {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    color: #ffffff;
    text-transform: uppercase;
    font-size: 22px;
}
.timer span {
    font-size: 26px;
    color: #ffbb09;
    font-weight: 600;
    text-transform: uppercase;
    margin-top: 5px;
}
a.cta-button.participate {
    padding: 14px 20px;
    background: #ffbb09;
    font-size: 16px;
    font-weight: 600;
    display: inline-block;
    border-radius: 10px;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 30px 0;
}
.form_inner {
    backdrop-filter: blur(5px);
    background-color: rgb(255 255 255);
    padding: 10px 30px;

    top: 0;
    border-radius: 10px; margin-bottom:50px
}
.form_inner h2 {
    font-weight: 600;
    margin-bottom: 30px;
}
section.od-faq {
    padding: 50px;
}
.accordion-button:focus {
    z-index: 3;
    outline: 0;
    box-shadow: none;
}
.accordion-button:not(.collapsed) {
    color: #fff;
    background-color: #ffbb09;}
    .challenge-card li{list-style: disc !important;}
    .challenge-card ul{ padding: 0px 20px;}

    .main-timeline .description{min-height: 89px;}
    
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
#response-message{padding: 13px 0 0 0;}

#portfolio-loader img {
    width: 110px;
}
#portfolio-loader {
    position: absolute;
    top: 63%;
    left: 50%;
    transform: translateX(-50%);
    /* background: rgba(255, 255, 255, 0.8); */
    border-radius: 20px;
}
.dataset_download_btn:focus {
    outline: none;
    border: none; 
    box-shadow: none; 
}


.btn-linkedin {
    background-color: #0077b5; /* LinkedIn blue */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
}

.btn-linkedin:hover {
    background-color: #005582; /* Darker LinkedIn blue */
}
.share_linkedin_section{display:flex;
    justify-content: space-between;
    align-items: center;flex-wrap: wrap;}


     .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group textarea {
            resize: vertical;
            height: 100px;
        }
      
        .rating input[type="radio"] {
            display: none;
        }
        .rating label {
            font-size: 24px;
            cursor: pointer;
            color: #ccc;
        }
        .rating input[type="radio"]:checked ~ label {
            color: #ffcc00;
        }
        /* Style for the rating container */
.rating {
    display: flex;
    gap: 10px;
    flex-direction: row-reverse; /* Display stars from left to right */
    justify-content: flex-end; /* Align stars to the left */
}

/* Hide the radio buttons */
.rating input {
    display: none;
}

/* Style for the stars */
.rating label {
    font-size: 2rem;
    color: #ccc; /* Default star color */
    cursor: pointer;
    transition: color 0.2s;
}

/* Change star color on hover */
.rating label:hover,
.rating label:hover ~ label,
.rating input:checked ~ label {
    color: #ffcc00; /* Yellow color for selected stars */
}

/* Hover effect for stars */
.rating label:hover {
    transform: scale(1.2); /* Slightly enlarge stars on hover */
}
        .submit-btn {
            background-color: #ffcc00;;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #005f8a;
        }

.submit_b_loader {
    display: flex;
    align-items: center;
}
#portfolio-loader1 img {
    width: 100px;
}


/* tabs css */
.tabs-container {
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
/*  font-family: Arial, sans-serif;*/
padding: 20px 0px;
}

.tabs {
  display: flex;
  position: relative;
  border-bottom: 1px solid #ddd;
}

.tab {
  padding: 12px 13px;
  background: none;
  border: none;
  cursor: pointer;
  font-size: 15px;
  position: relative;
  transition: all 0.3s ease;
  white-space: nowrap;
}

.tab:hover {
  color: #212529;
  border-bottom: 4px solid #f2c811;
}

.tab.active {
  color: #212529;
/*  font-weight: bold;*/
  border-bottom: 4px solid #f2c811;
}

.tab-indicator {
  position: absolute;
  bottom: -1px;
  height: 3px;
  background: #f2c811;
  transition: all 0.3s ease;
  border-radius: 3px 3px 0 0;
}

.tab-content {
  display: none;
  padding: 20px;
/*  border: 1px solid #ddd;*/
  border-top: none;
}

.tab-content.active {
  display: block;
}
.tab-content h2,.tab-content h3,.tab-content h4 {padding:10px 0px;}
button.tab {
    border: 1px solid #e5d5d5;
    border-bottom: 4px solid transparent;
}


/*Selected option background color in yellow  */

/*Selected option background color in yellow  */
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #ffbb09;
    color: #fff;
}


/* Select2 Styles */
#dataset-form .select2-container--default .select2-selection--multiple{
border-radius: 15px !important;
    padding:5px 0px;
    padding-bottom: 8px;
}
.select2-container .select2-search--inline .select2-search__field{     margin-left: 5px;}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    display: flex;
    flex-wrap: wrap;
    padding: 4px 8px;
    width: 100%;
    justify-content: flex-start; /* Tags left se start */
}
#dataset-form .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #ffbb09 !important;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 2px 6px;
    padding-left:20px;
    font-size: 14px;
    margin-right: 5px;
}

#datadna-challenge-submit-entry-form .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #ffbb09 !important;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 2px 6px;
    padding-left:20px;
    font-size: 14px;
    margin-right: 5px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff;
    margin-right: 5px;
   
}
.select2-container--default .select2-search--inline .select2-search__field {
    margin: 0;
    padding: 0;
    height: 20px;
    width: auto !important; 
    min-width: 10px; 
    background: transparent;
    border: none;
    outline: none;
    order: 999; 
    text-align: right; 
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    display: flex !important;
    align-items: center;
    flex-grow: 1;
}

.select2-container--default .select2-results__option {
    padding: 6px 10px;
    color: #697177;
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #f0c24b;
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
.owl-carousel {
    max-width: 100%; /* Prevent overflow */
    overflow: hidden; /* Hide anything outside the container */
}

#dataset-form .select2-container--default .select2-selection--multiple:after {
    content: '\25BC'; /* Unicode for down arrow ▼ */
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    color: #697177;
    pointer-events: none; 
}

#datadna-challenge-submit-entry-form .select2-container--default .select2-selection--multiple:after {
    content: '\25BC'; /* Unicode for down arrow ▼ */
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    color: #697177;
    pointer-events: none; 
}

 .btn-primary:focus{box-shadow: 0 0 0 0.25rem rgb(223 223 223 );
}
.tab-content h2 {font-size:24px;}
.challenge-thumbnail img {max-width: 600px;width:100%}
@media (max-width: 991px) {
    .tab-indicator {
        display: none;
    }
    .tab-content{padding:0px;}
}
/* 🔹 Responsive Design for Tablet (768px and below) */

@media (max-width: 768px) {
    button.tab {
    border: 1px solid #e5d5d5;
    border-bottom: 4px solid #e5d5d5;
}
    .tabs {
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 10px;
    }
    .tab {
        flex: 1 1 45%; 
        text-align: center;
        padding: 12px;
    }
     .tab-indicator {
        display: none; 
    }
    a.cta-button.participate {
    padding: 10px 15px;}
    .timer{font-size: 18px;}
    .timer span{font-size: 20px;}

.form-container{
    padding: 20px 10px;
    box-shadow: none;
}
.challenge-card {
    padding: 20px 10px;
}
.submission-form{ padding: 20px 10px;
}

}

/* 🔹 Responsive Design for Mobile (480px and below) */
@media (max-width: 480px) {
    .tabs {
        flex-direction: column; /* Tabs ek column me aa jayenge */
        align-items: center;
    }
    .tab {
        width: 100%; /* Full width tabs */
        text-align: center;
        padding: 5px;
    }
    .tab-indicator {
        display: none; /* Mobile me indicator hide kar diya */
    }
}
</style>            
            

         
   
<?php
$challenge_date = get_field('challenges_date');
$submission_timestamp = strtotime(str_replace("/", "-", $challenge_date));
$today_timestamp = time();


date_default_timezone_set('Europe/London');

$challenge_date = str_replace("/", "-", $challenge_date);
$submission_timestamp = strtotime($challenge_date . ' 23:59'); // exact end of the day UK time

date_default_timezone_set('UTC');

$prize_pool = get_field('prize_pool'); 

$overview = get_field('challenge_overview'); 
//$rules = get_field('rules_guidelines'); 
//$submission_deadline = get_field('challenges_date'); 
//$dataset_name = get_field('dataset_name'); 
//$dataset_size = get_field('dataset_size');
//$dataset_url = get_field('dataset_url');
$challenges_content = get_field('challenges_content');

?>

<section class="leaderboard-section" style="background-image:linear-gradient(to bottom, rgb(0 0 0 / 62%) 0%, rgb(0 0 0 / 78%) 100%), url(<?php echo get_template_directory_uri(); ?>/assets/images/office-with-computer-glass-table.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="leader-content challance">

                    <h2><?php the_title(); ?></h2>

                    <p class="text-white"><?php echo get_field('challenge_description'); ?></p>
                </div>
                <div class="countdowns">


                     <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if ($thumbnail_url) { ?>
                    <div class="challenge-thumbnail mb-4">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded">
                    </div>
                <?php } ?>
                    <h3 class="text-white">Submission Deadline</h3>

                    <?php if ($submission_timestamp > $today_timestamp) : ?>
                        <div class="timer">
                            <span id="days">0</span> Days : 
                            <span id="hours">0</span> Hours : 
                            <span id="minutes">0</span> Minutes : 
                            <span id="seconds">0</span> Seconds
                        </div>
                        
                    <a href=" https://www.linkedin.com/groups/9075495/?lipi=urn%3Ali%3Apage%3Ad_flagship3_groups_index%3BeKJZJX0PQdeUQaz8EGsr5Q%3D%3D" class="cta-button participate" target="_blank" rel="noopener noreferrer">Join DataDNA Community</a>

                    <?php else : ?>
                        <div class="timer">Submission Date Over</div>
                    <?php endif; ?>

                    
                </div>
            </div>

            <div class="col-md-5">
                <div class="form_inner">
                    <h2> <?php echo get_field('dataset_download_heading'); ?></h2>

                      
        <p><?php echo get_field('dataset_download_subheading'); ?></p>
           
       <?php    $fullname = '';
                $email = '';
if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $fullname = !empty($current_user->display_name) ? $current_user->display_name : $current_user->user_login;
    $email = $current_user->user_email;
}     ?>

      <form id="dataset-form" method="POST" action="">
                    <input type="hidden" name="action" value="handle_dataset_download">
                   <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
           
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" value="<?php echo esc_attr($fullname); ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" value="<?php echo esc_attr($email); ?>" required>
                        </div>
          <div class="mb-3">
                <select class="form-control visualisation-dataset-tool-select select2" style="color:#697177;background-color:#F3F6F9;border-radius:5px;font-weight:400" name="visualisation_tool[]" multiple required>
                    <option value="">Visualisation Tool</option>
                    <option value="Power BI">Power BI</option>
                    <option value="Excel">Excel</option>
                    <option value="Qlik">Qlik</option>
                    <option value="Tableau">Tableau</option>
                    <option value="Astrato Analytics">Astrato Analytics</option>
                     <option value="ZoomCharts">ZoomCharts</option>
                    <option value="Other">Other</option>
                </select>
            </div>
                        <button type="submit" class="btn btn-primary dataset_download_btn"> <?php echo the_field('dataset_download_button_text');?></button>
                    </form>
                    <div id="response-message"></div> 
                 
                 <div id="portfolio-loader" style="display: none; text-align: center;">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50"></div>

               <p style="font-size: 12px; margin-top: 10px;">
                  <div class="privacy_content" style="font-size: 12px; margin-top:10px;">
                 <?php echo the_field('dataset_download_disclaimer_text');?>
                    </div>
                </p>
                </div>
            </div>


        </div>
    </div>
</section>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="challenge-card">
                    <?php if(!empty($prize_pool)){ ?>
                    <div class="prize-badge">
                        <i class="fa fa-trophy"></i>
                         Prize Pool: <?php echo $prize_pool; ?>
                    </div>
                 <?php } ?>

                 <?php echo $challenges_content;?>
                  
     

 

<div class="tabs-container">
  <div class="tabs">
    <button class="tab active" data-tab="tab1">Submit Your Entry</button>
    <button class="tab" data-tab="tab2">ZoomCharts Mini Challenge</button>
    <button class="tab" data-tab="tab3">Judging Criteria</button>
    <button class="tab" data-tab="tab4">Webinars</button>
    <button class="tab" data-tab="tab5">Timeline</button>
    <div class="tab-indicator"></div>
   
  </div>
  
  <div class="tab-content active" id="tab1">

    <div class="submission-form">
    <div class="submit-instructions">
  <?php  $submit_your_entry_content = get_field('submit_your_entry_content');
  echo $submit_your_entry_content;  ?>
    
</div>
        <div class="share_linkedin_section">
            <h4>Submit Your Entry</h4>
          <div class="mb-3 ">
                        <a id="linkedin-share-btn" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>&text=Check out my visualization for the Onyx Data Challenge! @OnyxData @ZoomCharts @EnterpriseDNA @BCS, the chartered institute for it @SmartFramesUI @DataCareerJumpstart %23dataDNA" target="_blank" class="btn btn-primary">Share on LinkedIn
        </a></div>
</div>
            

    <div class="form-container">
            <h2>DataDNA Challenge Submission Form</h2>
            <p>Fill out the form to participate</p>
            <form id="datadna-challenge-submit-entry-form" action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fullname">1. Full name <span style="color:red;font-size: 20px;">*</span></label>
                    <input type="text" id="fullname_challenge" name="fullname_challenge" required placeholder="Enter your answer">
                </div>
                <div class="form-group">
                    <label for="email">2. Email address <span style="color:red;font-size: 20px;">*</span></label>
                    <input type="email" id="email_challenge" name="email_challenge" required placeholder="Enter your answer">
                </div>
                <div class="form-group">
                    <label for="linkedin-url">3. LinkedIn Entry Post URL (Click the 3 dots on your post and select "Copy Links to Post") <span style="color:red;font-size: 20px;">*</span></label>
                    <input type="url" id="linkedin_url_challenge" name="linkedin_url_challenge" placeholder="Enter your answer" required>
                </div>
                <div class="form-group">
                    <label for="profile-url">4. Your LinkedIn Profile URL <span style="color:red;font-size: 20px;">*</span></label>
                    <input type="url" id="profile_url_challenge" name="profile_url_challenge" placeholder="Enter your answer" required>
                </div>
                <div class="form-group">
                    <label for="tool">5.Tool Used (e.g Power BI, Tableau, Excel, etc) <span style="color:red;font-size: 20px;">*</span></label>
                    <!-- <input type="text" id="tool_challenge" name="tool_challenge" placeholder="Enter your answer"> -->
                

            <div class="mb-3">
                <select class="form-control visualisation-dataset-tool-select select2" style="color:#697177;background-color:#F3F6F9;border-radius:5px;font-weight:400" name="visualisation_tool_entry[]" multiple required>
                    <option value="">Visualisation Tool</option>
                    <option value="Power BI">Power BI</option>
                    <option value="Excel">Excel</option>
                    <option value="Qlik">Qlik</option>
                    <option value="Tableau">Tableau</option>
                    <option value="Astrato Analytics">Astrato Analytics</option>
                     <option value="ZoomCharts">ZoomCharts</option>
                    <option value="Other">Other</option>
                </select>
            </div>
       </div>
                 <div class="form-group">
                <label>6. How would you rate this month's dataset? (1 = Poor - 5 = Amazing) <span style="color:red;font-size: 20px;">*</span></label>
                <div class="rating">
                    <input type="radio" id="star5" name="rating_challenge" value="5">
                    <label for="star5" data-rating="5">★</label>   
                    <input type="radio" id="star4" name="rating_challenge" value="4">
                    <label for="star4" data-rating="4">★</label> 
                    <input type="radio" id="star3" name="rating_challenge" value="3">
                    <label for="star3" data-rating="3">★</label>
                    <input type="radio" id="star2" name="rating_challenge" value="2">
                    <label for="star2" data-rating="2">★</label>
                    <input type="radio" id="star1" name="rating_challenge" value="1" required>
                    <label for="star1" data-rating="1">★</label>          
                </div>
            </div>

                <div class="form-group">
                    <label for="feedback">7. What would you like to see in future DataDNA Dataset Challenge? <span style="color:red;font-size: 20px;">*</span></label>
                    <textarea id="feedback_challenge" name="feedback_challenge" required placeholder="Enter your answer"></textarea>
                </div>

                <!-- Power BI Report Fields -->
        <div class="form-group">
            <label for="powerbi_report">8. Upload Power BI Report (.pbix) – Max 50MB</label>
            <input type="file" id="powerbi_report" name="powerbi_report" accept=".pbix">
        </div>
        <div class="form-group">
            <label for="powerbi_report_url">OR Paste Power BI Report Link</label>
            <input type="url" id="powerbi_report_url" name="powerbi_report_url" placeholder="Paste Power BI Report URL here">
        </div>

        <!-- Portfolio Association Status -->
       <div class="mb-3">
        <label class="form-label">Associated Portfolio (Optional)</label>
        <select class="form-control" id="portfolio_select" name="portfolio_id">
            <option value="">None</option>
            <?php
            if (is_user_logged_in()) {
                $user_id = get_current_user_id();
                $current_challenge_id = get_the_ID(); // Current challenge post ID

                $args = array(
                    'post_type'      => 'portfolios',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'author'         => $user_id,
                );
                $portfolio_query = new WP_Query($args);

                if ($portfolio_query->have_posts()) {
                    while ($portfolio_query->have_posts()) {
                        $portfolio_query->the_post();
                        $portfolio_id = get_the_ID();
                        $portfolio_title = get_the_title();
                        $portfolio_url = get_permalink();
                        $associated_challenges = get_field('associated_challenges', $portfolio_id);

                        // Extract challenge ID from "Title (ID: X)" format
                        $portfolio_challenge_id = '';
                        if ($associated_challenges) {
                            preg_match('/ID: (\d+)/', $associated_challenges, $matches);
                            $portfolio_challenge_id = !empty($matches[1]) ? intval($matches[1]) : 0;
                        }

                        // Pre-select if it matches current challenge
                        $selected = ($portfolio_challenge_id === $current_challenge_id) ? 'selected' : '';
                        echo '<option value="' . esc_attr($portfolio_id) . '" data-url="' . esc_url($portfolio_url) . '" ' . $selected . '>' . esc_html($portfolio_title) . '</option>';
                    }
                    wp_reset_postdata();
                }
            }
            ?>
        </select>
    </div>

                <div class="submit_b_loader">
                <button type="submit" class="btn btn-primary submit-btn submit_entry_challenge">Submit</button>
                 <div id="portfolio-loader1" style="display: none; text-align: center;">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50"></div>
     </div>
            </form>
        </div>
</div>
  </div>

  <div class="tab-content" id="tab2">
   <!-- <h2>How to Enter ZoomCharts Mini Challenge for Power BI</h2>
    <ol>
        <li><b>Step 1:</b> Register for ZoomCharts Mini Challenge <a href="https://zoomcharts.com/en/microsoft-power-bi-custom-visuals/challenges/onyx-data-march-2025?utm_source=challenge&utm_medium=onyxdata&utm_campaign=onyxdata_web_march&utm_term=register&utm_content=registration">here</a> and receive a Drill Down Visuals Developer License for Power BI.</li>
        <li><b>Step 2:</b> Create a Power BI report including at least <b>2 ZoomCharts Drill Down Visuals</b> in one report page!</li>
        <li><b>Step 3:</b> <a href="https://zoomcharts.com/en/microsoft-power-bi-custom-visuals/challenges/onyx-data-march-2025?utm_source=challenge&utm_medium=onyxdata&utm_campaign=onyxdata_web_march&utm_term=register&utm_content=registration">Submit your entry here to be verified.<a/><br>
            (If your submission doesn’t match the challenge criteria, you will be notified by email, so make sure you have time for revision and resubmission if needed. Feel free to resubmit your entry as many times as necessary before the deadline.)        </li>
        <li><b>Step 4:</b> Follow <a href="https://www.linkedin.com/company/zoomcharts/" target="_blank">ZoomCharts on LinkedIn</a></li>
        <li><b>Step 5:</b> Share a LinkedIn post on your profile that contains:
            <ul>
                <li><b>Mentions:</b> @ZoomCharts, @OnyxData, @Enterprise DNA, @BCS (The Chartered Institute for IT), @Smart Frames UI, @Data Career Jumpstart</li>
                <li><b>Hashtags:</b> #dataDNA, #builtwithzoomcharts</li>
            </ul>
        </li>
    </ol> -->
    <?php  $zoomcharts_mini_challenge_content = get_field('zoomcharts_mini_challenge_content');
  echo $zoomcharts_mini_challenge_content;  ?>
    

  </div>
  <div class="tab-content" id="tab3">
<?php  $judging_criteria = get_field('judging_criteria');
  echo $judging_criteria;  ?>

    <!-- <h2>Judging Criteria for Power BI Reports1</h2>
    <p>Business users use reports to make data-driven decisions. That’s why reports are called effective if they enable users to drill down and filter data quickly and intuitively to find answers to any question they might have and analyze data in all possible directions and dimensions.</p>
    
    <h3>We will evaluate:</h3>
    
    <h4>1) How easy is it to understand the data? (Max 10 points)</h4>
    <ul>
        <li>Is too much text used for explanation?</li>
        <li>Are the indicative colors in charts instinctually understandable?</li>
        <li>Does it tell a story?</li>
    </ul>

    <h4>2) How easy-to-use is the report? (Max 14 points)</h4>
    <ul>
        <li>Cross-chart filtering implementation across the report. Can other visuals provide relevant data as the user explores the report?</li>
        <li>Response time</li>
        <li>Drill Down: Multi-layer data exploration. Can the user drill down and gain additional insights within the report?</li>
        <li>Use of tutorial overlays and other elements to assist new users. Can a new user start using this report straight away with just the guidance provided within the report itself?</li>
    </ul>

    <h4>3) How good is the report design and is it suitable for its purpose? (Max 10 points)</h4>
    <ul>
        <li>Visual design: Is the overall look consistent, no empty spaces, no overcrowding?</li>
        <li>Interface design: Are there unnecessary visualizations/buttons/complexity in use?</li>
        <li>UX design: Is the produced report usable?</li>
        <li>Report design: Is the main challenge answered?</li>
        <li>Technical: Are all the fonts used the same, are the sizes readable?</li>
    </ul>

    <p><b>You are encouraged to use various techniques at your disposal</b>, such as tooltips, drill-throughs, drill-downs, cross-chart filtering, and page navigation features, to enhance your analysis.</p>

    <h4>Resources</h4>
    <p>Here are some useful links to learn more about ZoomCharts and get inspiration for your report:</p>
    <ul>
        <li><b>Use-Case Gallery:</b> Try live demos and download reports made by the ZoomCharts team.</li>
        <li><b>Video Tutorials:</b> Watch engaging video guides on how to set up and use the visuals.</li>
        <li><b>Documentation:</b> Technical deep-dive about ZoomCharts visuals.</li>
        <li><b>ZoomCharts Blog:</b> Useful tips & tricks for data visualization and report creation.</li>
        <li><b>Visuals Gallery:</b> Explore all the possible customization options for Drill Down Visuals.</li>
    </ul> -->
  </div>

  <div class="tab-content" id="tab4">

    <style>.upcoming-webinars {
    padding: 20px;
    background: #f9f9f9;
    border-radius: 8px;
}

.upcoming-webinars h2 {
    font-size: 22px;
    margin-bottom: 15px;
}

.webinar-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.webinar-item {
    background: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
}

.webinar-item img {
    width: 100%;
/*    border-radius: 5px;*/
}

.webinar-meta {
    font-size: 16px;
    color: #666;
    margin: 10px 0;
}

.webinar-btn {
    display: inline-block;
    background: #ffcc00;
    padding: 10px 15px;
    text-align: center;
    border-radius: 5px;
    font-weight: bold;
    color: black;
    text-decoration: none;
}
.webinars-section{max-width: 400px;}
.webinars-section h2{font-size: 25px;margin: 10px 0px;}
.webinar-item h3{
    font-size:22px;
}
</style>
    <?php
// Fetch the latest webinars
$today = date('d/m/Y'); 

// WP_Query to fetch all webinars (future & past)
$args = array(
    'post_type'      => 'webinars',
    'posts_per_page' => -1,
    'meta_key'       => 'webinar_date',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => 'webinar_date',
            'compare' => 'EXISTS',
        ),
    ),
);

$query = new WP_Query($args);
$upcoming_webinar = null;
$past_webinar = null;

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        
        $webinar_date = get_field('webinar_date');
        $webinar_time = get_field('webinar_time');

        // Convert ACF date format for comparison
        $formatted_webinar_date = DateTime::createFromFormat('d/m/Y', $webinar_date);
        $formatted_today = DateTime::createFromFormat('d/m/Y', $today);

        if ($formatted_webinar_date >= $formatted_today && !$upcoming_webinar) {
            // First upcoming webinar found
            $upcoming_webinar = get_the_ID();
        }
        
        if ($formatted_webinar_date < $formatted_today) {
            // Keep updating with the latest past webinar
            $past_webinar = get_the_ID();
        }
    }
}

wp_reset_postdata();
?>

<section class="webinars-section">
    <!-- Upcoming Webinar -->
    <h2>Upcoming Webinar</h2>
    <?php if ($upcoming_webinar): ?>
        <?php
        $title = get_the_title($upcoming_webinar);
        $date = get_field('webinar_date', $upcoming_webinar);
        $time = get_field('webinar_time', $upcoming_webinar);
        $image = get_the_post_thumbnail_url($upcoming_webinar, 'medium');
        ?>
        <div class="webinar-item">
            <a href="<?php echo get_permalink($upcoming_webinar); ?>">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
            </a>
            <h3><?php echo esc_html($title); ?></h3>
            <div class="webinar-meta">
                <span class="webinar-date">📅 <?php echo esc_html($date); ?></span>
                <span class="webinar-time">⏰ <?php echo esc_html($time); ?></span>
            </div>
            <a class="webinar-btn" href="<?php echo get_permalink($upcoming_webinar); ?>">Learn more</a>
        </div>
    <?php else: ?>
        <p>No upcoming webinars available.</p>
    <?php endif; ?>

    <!-- Past Webinar -->
    <h2>Past Webinar</h2>
    <?php if ($past_webinar): ?>
        <?php
        $title = get_the_title($past_webinar);
        $date = get_field('webinar_date', $past_webinar);
        $time = get_field('webinar_time', $past_webinar);
        $image = get_the_post_thumbnail_url($past_webinar, 'medium');
        ?>
        <div class="webinar-item">
            <a href="<?php echo get_permalink($past_webinar); ?>">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
            </a>
            <h3><?php echo esc_html($title); ?></h3>
            <div class="webinar-meta">
                <span class="webinar-date">📅 <?php echo esc_html($date); ?></span>
                <span class="webinar-time">⏰ <?php echo esc_html($time); ?></span>
            </div>
            <a class="webinar-btn" href="<?php echo get_permalink($past_webinar); ?>">Learn more</a>
        </div>
    <?php else: ?>
        <p>No past webinars available.</p>
    <?php endif; ?>
</section>

  </div>


  <div class="tab-content" id="tab5">
<!-- <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center heading-section">
                <h2 class="mb-3 heading">Timeline</h2> 
            </div>
        </div>
        <div class="main-timeline">

            <?php
            $post_id = get_the_ID();
            // Query for past challenges
            // $args = array(
            //     'post_type'      => 'challenges',
            //     'posts_per_page' => -1,
            //     'meta_key'       => 'challenges_date',
            //     'orderby'        => 'meta_value',
            //     'order'          => 'DESC',
            // );

            //$query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $title = get_the_title();

                    // Check if Repeater has data
                    if (have_rows('challenge_timeline', $post_id)) :
                        while (have_rows('challenge_timeline')) : the_row();
                            $event_date = get_sub_field('timeline_date'); 
                            $event_title = get_sub_field('timeline_title'); 
                            $event_description = get_sub_field('timeline_description'); 

                            
                            $formatted_date = DateTime::createFromFormat('d/m/Y', $event_date);
                            $date_month = $formatted_date ? $formatted_date->format('d F') : ''; 
                            $year = $formatted_date ? $formatted_date->format('Y') : '';  // Year (e.g., 2025)

                            ?>
                            <div class="timeline">
                                <div class="icon"></div>
                                <div class="date-content">
                                    <div class="date-outer">
                                        <span class="date">
                                            <span class="month"><?php echo esc_html($date_month); ?></span>
                                            <span class="year"><?php echo esc_html($year); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h5 class="title"><?php echo esc_html($event_title); ?></h5>
                                    <p class="description"><?php echo esc_html($event_description); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">No timeline events found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>   -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center heading-section">
                <h2 class="mb-3 heading">Timeline</h2> 
            </div>
        </div>
        <div class="main-timeline">
            <?php
            $post_id = get_the_ID(); // 🔥 Get current post ID

            if (have_rows('challenge_timeline', $post_id)) :
                while (have_rows('challenge_timeline', $post_id)) : the_row();
                    $event_date = get_sub_field('timeline_date'); 
                    $event_title = get_sub_field('timeline_title'); 
                    $event_description = get_sub_field('timeline_description'); 

                    $formatted_date = DateTime::createFromFormat('d/m/Y', $event_date);
                    $date_month = $formatted_date ? $formatted_date->format('d F') : ''; 
                    $year = $formatted_date ? $formatted_date->format('Y') : '';
                    ?>
                    <div class="timeline">
                        <div class="icon"></div>
                        <div class="date-content">
                            <div class="date-outer">
                                <span class="date">
                                    <span class="month"><?php echo esc_html($date_month); ?></span>
                                    <span class="year"><?php echo esc_html($year); ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <h5 class="title"><?php echo esc_html($event_title); ?></h5>
                            <p class="description"><?php echo esc_html($event_description); ?></p>
                        </div>
                    </div>
                    <?php
                endwhile;
            else :
                echo '<p class="text-center">No timeline events found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
  </div>
</div>

                     <div class="social-share-box mt-5">
                        <div class="social-heading">
                            <h2>Share The challenge</h2>
                        </div>
                        <div class="social-share-icon mt-3">
        
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank">
            <i class="fa-brands fa-linkedin"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank">
            <i class="fa-brands fa-twitter"></i>
        </a>
        <a href="mailto:?subject=<?php the_title(); ?>&body=Check this out: <?php the_permalink(); ?>">
            <i class="fa-solid fa-envelope"></i>
        </a>
    </div>
                    </div>
                </div>
            </div>

           <div class="col-lg-4">
    <div class="challenge-card">
        <h3>Past Challenges</h3>

        <?php
        // Get today's date in Ymd format
        $today = date('Ymd');

        // Query to fetch past challenges
        $args = array(
            'post_type'      => 'challenges',
            'posts_per_page' => 3, // Limit to latest 3 past challenges
            'meta_key'       => 'challenges_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC', // Show latest past challenges first
            'meta_query'     => array(
                array(
                    'key'     => 'challenges_date',
                    'value'   => $today,
                    'compare' => '<', // Only past challenges
                    'type'    => 'DATE'
                )
            )
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $title = get_the_title();
                $permalink = get_permalink();
                $short_description = get_field('desciption');
                $challenge_date = get_field('challenges_date'); 
                $winner = get_field('winner'); // ACF field for winner status

                // Convert ACF date (d/m/Y) to readable format
                $formatted_date = DateTime::createFromFormat('d/m/Y', $challenge_date);
                $formatted_date = $formatted_date ? $formatted_date->format('F Y') : '';
        ?>

        <div class="past-challenge">
            <h5><?php echo esc_html($title); ?>
                <?php //if ($winner) : ?>
                    <span class="winner-badge">Winner</span>
                <?php // endif; ?>
            </h5>
            <p class="text-muted"><?php echo esc_html($formatted_date); ?></p>
            <p><?php echo esc_html($short_description); ?></p>
            <a href="<?php echo esc_url($permalink); ?>" class="btn btn-sm btn-outline-primary">View Details</a>
        </div>

        <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>No past challenges found.</p>
        <?php endif; ?>

        <a href="<?php echo get_site_url(); ?>/challenges-v2" class="btn btn-outline-secondary w-100 mt-3">View All Past Challenges</a>
    </div>
</div>



        </div>

    </div>

  

   
 
<!--  <?php if( have_rows('sponsors','option') ):

  ?>
<section class="py-5 bg-light">
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
           
                <?php while( have_rows('sponsors','option') ): the_row(); 
                    $logo = get_sub_field('sponsor_image');

                    $alt_text = get_sub_field('sponsor_alt');
                ?>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="sponsor-img">
                        <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <?php endwhile; ?>
        </div>
    </div>
</section>
  <?php endif; ?> -->
    <!-- sponser section end -->

<!-- sponser section with slider -->
<?php if (have_rows('sponsors', 'option')): ?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-6 heading-section">
                <h2 class="mb-3 heading"><?php echo the_field('sponsor_heading','option');?></h2>
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
                    <?php while (have_rows('sponsors', 'option')): the_row(); 
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



<?php if( have_rows('faq_section','option') ):

 ?> 
<section class="od-faq">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-12 heading-section text-center">
                <h2 class="mb-3 heading"><?php echo the_field('faq_heading','option');?></h2>
            </div>
        </div>

        <div class="accordion accordion-flush" id="faqAccordion">
            <?php 
            $count = 1; // Counter for unique IDs
            while( have_rows('faq_section','option') ): the_row(); 
                $faq_question = get_sub_field('faq_question'); // Get Question
                $faq_answer = get_sub_field('faq_answers'); // Get Answer
                $unique_id = 'flush-collapse' . $count; // Unique ID for accordion
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $count; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $unique_id; ?>" aria-expanded="false" aria-controls="<?php echo $unique_id; ?>">
                            <?php echo $faq_question; ?>
                        </button>
                    </h2>
                    <div id="<?php echo $unique_id; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $count; ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?php echo $faq_answer; ?>
                        </div>
                    </div>
                </div>
                <?php 
                $count++; 
            endwhile; 
            ?>
        </div>
    </div>
</section>
<?php endif; ?>


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


    <script>
                            function startCountdown(deadline) {
                                function updateTimer() {
                                    let now = new Date().getTime();
                                    let timeLeft = deadline - now;

                                    if (timeLeft <= 0) {
                                        clearInterval(timerInterval);
                                        document.querySelector(".timer").innerHTML = "Submission Date Ended";
                                        return;
                                    }

                                    let d = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                                    let h = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    let m = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                                    let s = Math.floor((timeLeft % (1000 * 60)) / 1000);

                                    document.getElementById("days").innerText = d;
                                    document.getElementById("hours").innerText = h;
                                    document.getElementById("minutes").innerText = m;
                                    document.getElementById("seconds").innerText = s;
                                }

                                let timerInterval = setInterval(updateTimer, 1000);
                                updateTimer();
                            }

                            let challengeDeadline = new Date(<?php echo $submission_timestamp * 1000; ?>);
                            startCountdown(challengeDeadline);
                        </script>



<script>
jQuery(document).ready(function($) {
    $('.select2').select2({
        placeholder: 'Select Visualisation Tools',
        allowClear: true,
        width: '100%',
        dropdownAutoWidth: true,
        maximumSelectionLength: 10
    });

    //Dataset download form ajax
    $('#dataset-form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        $('#portfolio-loader').show();
        $('.dataset_download_btn').prop('disabled', true);

        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {

                 $('#portfolio-loader').hide();
                 $('.dataset_download_btn').prop('disabled', false);

                if (response.success) {
                    // Handle success (e.g., show download link or redirect)
                    $('#response-message').html('Downloaded!').css({ 'color': 'green', 'font-weight': 'bold' });;
                  
                     if (response.data.redirect_url && response.data.redirect_url.url) {

                        window.location.href = response.data.redirect_url.url;
                    }
                    $('#dataset-form')[0].reset();
                   // Reset Select2 fields
                   $('#dataset-form .select2').val([]).trigger('change');

                } else {
                    // Handle error
                    $('#response-message').html(response.data.message).css({ 'color': 'red', 'font-weight': 'bold' });
                    $('#dataset-form')[0].reset();
                   // Reset Select2 fields
                   $('#dataset-form .select2').val([]).trigger('change'); 
                }

                setTimeout(function() {
                    $('#response-message').hide();
                       if (response.data.login_required) {
                         window.location.href = response.data.login_url;}
                }, 5000); 
            },
            error: function() {
                 $('#portfolio-loader').hide();
                 $('.dataset_download_btn').prop('disabled', false);

                $('#response-message').html('An error occurred.');
                 $('#dataset-form')[0].reset();
                   // Reset Select2 fields
                   $('#dataset-form .select2').val([]).trigger('change'); 

                // Hide message after 5 seconds
                setTimeout(function() {
                    $('#response-message').hide();
                }, 5000); 
            }
        });
    });



$('#datadna-challenge-submit-entry-form').on('submit', function(e) {
        e.preventDefault();

        if (ajax_object.is_logged_in === 'false') {
            alert('Please login first to submit the entry');
            window.location.href = ajax_object.site_url + '/login';
            return;
        }

        // File size validation
        var fileInput = $('#powerbi_report')[0];
        var maxSize = 50 * 1024 * 1024; // 50 MB in bytes
        if (fileInput.files && fileInput.files[0]) {
            if (fileInput.files[0].size > maxSize) {
                alert('File size exceeds 50 MB limit. Please upload a smaller file.');
                return; // Stop form submission
            }
        }

        $('#portfolio-loader1').show();
        $('.submit_entry_challenge').prop('disabled', true);

        // FormData object banaye file aur text data ke liye
        var formData = new FormData(this);
        formData.append('action', 'save_datadna_challenge_data_submit_entry');
        formData.append('post_id', ajax_object.post_id);
        formData.append('user_id', ajax_object.current_user_id);


        // Add portfolio URL to form data
        var selectedPortfolio = $('#portfolio_select option:selected');
        var portfolio_url = selectedPortfolio.data('url') || '';
        formData.append('portfolio_url', portfolio_url);
        
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            processData: false, 
            contentType: false, 
            dataType: 'json',
            success: function(response) {
                $('#portfolio-loader1').hide();
                $('.submit_entry_challenge').prop('disabled', false);

                if (response.success) {
                $('#datadna-challenge-submit-entry-form')[0].reset();
 
                    alert('Form submitted successfully!');
                } else {
                    // Display specific error message
                    alert(response.data || 'Error submitting form. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                $('#portfolio-loader1').hide();
                $('.submit_entry_challenge').prop('disabled', false);
                alert('An error occurred: ' + error);
                console.log('AJAX Error:', xhr.responseText);
            }
        });
    });


//Become a sponsor form to send mails to users
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

//Below js for switching between tabs on single challenge page.
document.querySelectorAll('.tab').forEach(tab => {
  // Initialize indicator position for first tab
  if(tab.classList.contains('active')) {
    updateIndicator(tab);
  }
  
  tab.addEventListener('click', () => {
    // Remove active class from all tabs and contents
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
    
    // Add active class to clicked tab and corresponding content
    tab.classList.add('active');
    document.getElementById(tab.dataset.tab).classList.add('active');
    
    // Update indicator position
    updateIndicator(tab);
  });
});

function updateIndicator(activeTab) {
  const indicator = document.querySelector('.tab-indicator');
  const tabRect = activeTab.getBoundingClientRect();
  const tabsRect = activeTab.parentNode.getBoundingClientRect();
  
  //indicator.style.left = `${tabRect.left - tabsRect.left}px`;
  //indicator.style.width = `${tabRect.width}px`;
}

// Handle window resize
window.addEventListener('resize', () => {
  const activeTab = document.querySelector('.tab.active');
  if(activeTab) {
    updateIndicator(activeTab);
  }
});

});
</script>




<?php get_footer(); ?>
<?php get_template_part('template-parts/footer_v1'); ?>