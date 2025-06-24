<?php
/**
 * Template Name: CHALLENGES PAGE V2 
 */
get_header();
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
    padding: 30px;

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
    

.dataset-challenge-item2 {
   
    padding: 40px;
    background: #ffbb09;
    border-radius: 10px;
    box-shadow: 0px 7.5px 17.5px 0px rgba(0, 0, 0, 0.0509803922);
    text-align: left;
   
}
.dataset-challenge-item2 a.btn.btn-primary {
    background: #fff !important;
    width: 50%;
    color: #000;
    padding: 14px !important;
    letter-spacing: 0.5px;
}
.dataset-challenge-item2 h1 {
    font-size: 20px;
    font-weight: 600;
    color: #4a2c00;
    font-size: 26px;
    margin-bottom: 15px;
}
.dataset-challenge-item2 p {
    margin-top: 0;
    margin-bottom: 1rem;
    font-size: 16px;
    color: #4a2c00;
    letter-spacing: 0.5px;
}
    .card-subtitle.d-flex.align-items-center.mb-3 p{margin-bottom:0;}
.card-subtitle.d-flex.align-items-center.mb-3 i {
    margin-right: 7px;
    /* color: #fff; */
    font-size: 14px;
}
section.past_challange {
    padding: 70px 0px;
    background: #f7f7f7;
    margin-top: 70px;
}
.past_inner {
    padding: 30px;
    border: 1px solid #e7e7e7;
    border-radius: 15px;
    box-shadow: 0px 7.5px 17.5px 0px rgba(0, 0, 0, 0.0509803922);
    min-height: 225px;
}
.leader-content.challance p {
    font-size: 16px;
}
.challenge-featured-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>            
            
 <?php  $banner_image = get_field('banner_image');
        $banner_heading = get_field('banner_heading');
        $banner_subheading = get_field('banner_subheading');
    ?>
         <section class="leaderboard-section" style="background-image:linear-gradient(to bottom, rgb(0 0 0 / 62%) 0%, rgb(0 0 0 / 78%) 100%), url('<?php echo esc_url($banner_image);?>');">
            <div class="container">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="leader-content challance">
                            <h2><?php echo $banner_heading;?></h2>
                            <p class="text-white mt-2"><?php echo $banner_subheading;?></p>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </section>


    
    <section class="ongoing_challenges">
    <div class="container mt-5">
        <div class="heading-section mb-4">
            <h2 class="mb-3 heading">Ongoing Challenges</h2>
        </div>
        <div class="row">
            <?php
            // Get today's date in Ymd format for comparison
            $today = date('Ymd');

            // Query for future challenges
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

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $title = get_the_title();
                    $permalink = get_permalink();
                    $short_description = get_field('desciption');
                    $challenge_date = get_field('challenges_begins_date'); 
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

                    $formatted_date = DateTime::createFromFormat('d/m/Y', $challenge_date);
                    $begins_date = $formatted_date ? $formatted_date->format('d F Y') : '';
                    ?>
                    <div class="col-lg-6">
                        <div class="dataset-challenge-item2">
                            <?php if ($featured_image) : ?>
                                <div class="challenge-featured-image mb-3">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid rounded">
                                </div>
                            <?php endif; ?>
                            <h1><?php echo esc_html($title); ?></h1>
                            <p><?php echo esc_html($short_description); ?></p>
                            <div class="card-subtitle d-flex align-items-center mb-3">
                                <i class="fas fa-calendar-alt"></i>
                                <p><strong>BEGINS: </strong><?php echo esc_html($begins_date); ?></p>
                            </div>
                            <a href="<?php echo esc_url($permalink); ?>" class="btn btn-primary mt-3">Learn More</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No upcoming challenges found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
    
    <!-- <section class="past_challange">
    <div class="container">
    <div class="heading-section mb-4">
    <h2 class="mb-3 heading">Past Challenges</h2>
    </div>
    <div class="row">
    <div class="col-md-4">
    <div class="past_inner">
     <h5>Retail Sales Analysis
                            <span class="winner-badge">Winner</span>
                        </h5>
                        <p class="text-muted">January 2024</p>
                        <p>Predictive analysis of holiday season sales patterns.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                    </div>
    
    </div>
    
    <div class="col-md-4">
    <div class="past_inner">
     <h5>Healthcare Analytics
                            <span class="winner-badge">Winner</span>
                        </h5>
                        <p class="text-muted">January 2024</p>
                        <p>Patient outcome prediction using historical data.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                    </div>
    
    </div>
    
    <div class="col-md-4">
    <div class="past_inner">
     <h5>Financial Market Trends

                            <span class="winner-badge">Winner</span>
                        </h5>
                        <p class="text-muted">January 2024</p>
                        <p>Analysis of cryptocurrency market volatility.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                    </div>
    
    </div>
    
    </div>
    
    
    
    
    </div>
    </div>
    </section>
     -->
    
    <section class="past_challange">
    <div class="container">
        <div class="heading-section mb-4">
            <h2 class="mb-3 heading">Past Challenges</h2>
        </div>
        <div class="row">
            <?php
            // Get today's date in Ymd format for comparison
            $today = date('Ymd');

            // Query for past challenges
            $args = array(
                'post_type'      => 'challenges',
                'posts_per_page' => -1, // Fetch all past challenges
                'meta_key'       => 'challenges_date',
                'orderby'        => 'meta_value',
                'order'          => 'DESC', // Show latest past challenges first
                'meta_query'     => array(
                    array(
                        'key'     => 'challenges_date',
                        'value'   => $today,
                        'compare' => '<', // Get only past challenges
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
                    $winner = get_field('winner'); // Assuming "winner" is a checkbox or text field

                    // Convert ACF date (d/m/Y) to readable format
                    $formatted_date = DateTime::createFromFormat('d/m/Y', $challenge_date);
                    $formatted_date = $formatted_date ? $formatted_date->format('F Y') : '';

                    ?>
                    <div class="col-md-4">
                        <div class="past_inner">
                            <h5>
                                <?php echo esc_html($title); ?>
                              
                                    <span class="winner-badge">Winner</span>
                                
                            </h5>
                            <p class="text-muted"><?php echo esc_html($formatted_date); ?></p>
                            <p><?php echo esc_html($short_description); ?></p>
                            <a href="<?php echo esc_url($permalink); ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No past challenges found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>


     
   
  <!-- Sponsor Section -->
  

    <!-- sponser section end -->








  <!-- Sponsor Request Modal -->
  <div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sponsorModalLabel">Become a Sponsor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="sponsorName" class="form-label">Your Name</label>
              <input type="text" id="sponsorName" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="sponsorEmail" class="form-label">Your Email</label>
              <input type="email" id="sponsorEmail" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="companyName" class="form-label">Company Name</label>
              <input type="text" id="companyName" class="form-control" placeholder="Enter your company name" required>
            </div>
            <div class="mb-3">
              <label for="sponsorReason" class="form-label">Why do you want to sponsor?</label>
              <textarea id="sponsorReason" class="form-control" rows="3" placeholder="Tell us why you want to sponsor" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit Request</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php get_footer(); ?>
<?php get_template_part('template-parts/footer_v1'); ?>