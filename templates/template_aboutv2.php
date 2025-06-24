<?php 

/**
 * Template Name: ABOUT PAGE V2 
 */
get_header();

?>
<style>
    .team-slider .team-box {
    margin: 0 auto;
    width: 100%;
}

.team-slider .owl-item {
    padding: 15px;
    margin-bottom: 25px;
}

/* Navigation styling */
.team-slider .owl-nav {
    position: absolute;
    top: -50px; 
    right: 0;
    margin-top: 0;
}

.team-slider .owl-nav button {
    margin: 0 5px;
    background: #fff; /* Adjust background color */
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid #ccc; /* Optional: add border */
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.team-slider .owl-nav button:hover {
    background: #f0f0f0; 
}

.team-slider .owl-nav button span {
    display: none; 
}

.team-slider .owl-nav button i {
    font-size: 16px;
    color: #fff; 
}
/*.team-slider .owl-dots {
    margin-top: 20px;
}*/

.team-slider.owl-carousel .owl-nav button.owl-next,.team-slider.owl-carousel .owl-nav button.owl-prev {
    background: #ffbb09;
}
.team-slider .owl-stage {
    display: flex;
    align-items: stretch;
}

.team-slider .owl-item {
    padding: 15px;
    display: flex;
}
.team-section .item {
    width: 100%;
}
    </style>
<?php get_template_part('template-parts/header_v1'); ?>



    <section class="leaderboard-section" style="background-image:linear-gradient(to bottom, <?php the_field('background_color_first'); ?> 0%, <?php the_field('background_color_second'); ?> 100%), url(<?php the_field('banner_image'); ?>);">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="leader-content">
                        <h2><?php echo esc_html( get_field('banner_heading') ); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!--  mission section  -->
	<section class="mission-section pt-5 pb-5" id="mission">
          <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center heading-section mb-4">
                    <h2 class="mb-3 heading"><?php echo the_field('mission__large_title'); ?></h2>
                    <p class="mb-4 subheading"><?php echo the_field('mission_medium_title'); ?></p>
                </div>
            </div>
         </div>



         <div class="container mt-2">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3 ">
                    <div class="row">
					<?php
					$hero = get_field('mission_column_left');
					if( $hero ): ?>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-direction">
                                <div class="mission">
									<img src="<?php echo esc_url( $hero['second_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['second_image']['alt'] ); ?>" />
								</div>
								<div class="mission-img">									
									<img src="<?php echo esc_url( $hero['first_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['first_image']['alt'] ); ?>" />
								</div>                         
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-direction">
                                <div class="mission-img">
                                    <img src="<?php echo esc_url( $hero['third_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['third_image']['alt'] ); ?>" />
                                </div>
                                <div class="mission-inner-box" style="background-color: <?php echo esc_attr( $hero['color_heading_background'] ); ?>;">
                                    <h4><?php echo $hero['heading'] ?></h4>
                                </div>
                            </div>
						</div>
					<?php endif; ?>
                   </div>
                </div>



                <div class="col-lg-6 col-md-6 col-sm-12">
					<?php if( have_rows('mission_column_right') ): ?>
					
						<div class="mission-content">
							<?php while( have_rows('mission_column_right') ): the_row(); ?>
							<div class="mb-3">
								<h2 class="mb-3 heading"><?php echo get_sub_field('title'); ?></h2>
								<?php echo get_sub_field('content'); ?>
							</div>
								
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
                </div>
          </div>
	</section>
	<!--  mission section /  -->



    <!-- team section start -->

     <!-- <section class="team-section pt-5 pb-5" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center heading-section mb-2">
					<h2 class="mb-3 heading"><?php echo the_field('team_large_title'); ?></h2>
                    <p class="mb-4 subheading"><?php echo the_field('team_medium_title'); ?></p>
                </div>
			</div>
        </div>

	<div class="container mt-3">
		<?php if( have_rows('team_member') ): ?>
            <div class="row">
				<?php while( have_rows('team_member') ): the_row(); 
					$image = get_sub_field('image');
				?> 
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-box">
                        <div class="team-member">
                            <div class="team-img">
							<?php if( !empty( $image ) ): ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
                            </div>
                            <div class="team-info mt-4">
                                <h4><?php echo acf_esc_html( get_sub_field('name') ); ?></h4>
                                <span><?php echo acf_esc_html( get_sub_field('details') ); ?></span>
                            </div>
                        </div>
						<?php if( have_rows('social_media') ): ?>
                        <div class="team-social">
						    <?php while( have_rows('social_media') ): the_row(); ?>
								<a href="<?php echo acf_esc_html( get_sub_field('link') ); ?>" class="facebook"><?php echo acf_esc_html( get_sub_field('icon') ); ?></a>
							<?php endwhile; ?>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
			<?php endwhile; ?>
            </div>
		<?php endif; ?>
        </div>
     </section> -->


     <section class="team-section pt-5 pb-4" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center heading-section mb-2">
                <h2 class="mb-3 heading"><?php echo the_field('team_large_title'); ?></h2>
                <p class="mb-4 subheading"><?php echo the_field('team_medium_title'); ?></p>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <?php if( have_rows('team_member') ): ?>
            <div class="owl-carousel owl-theme team-slider">
                <?php while( have_rows('team_member') ): the_row(); 
                    $image = get_sub_field('image');
                ?> 
                <div class="item">
                    <div class="team-box">
                        <div class="team-member">
                            <div class="team-img">
                                <?php if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="team-info mt-4">
                                <h4><?php echo acf_esc_html( get_sub_field('name') ); ?></h4>
                                <span><?php echo acf_esc_html( get_sub_field('details') ); ?></span>
                            </div>
                        </div>
                        <?php if( have_rows('social_media') ){ ?>
                        <div class="team-social">
                            <?php while( have_rows('social_media') ){the_row(); ?>
                                <a href="<?php echo acf_esc_html( get_sub_field('link') ); ?>" class="facebook" target="_blank" rel="noopener noreferrer" ><?php echo acf_esc_html( get_sub_field('icon') ); ?></a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Updated script -->

     <!-- team section end -->

<script>
jQuery(document).ready(function($) {
    var teamSlider = $('.team-slider');

    teamSlider.owlCarousel({
        loop: true,
      
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'], // Custom nav icons
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            992: { items: 3 },
            1200: { items: 4 }
        },
   
    });

    
});
</script>

  

<?php get_footer(); ?>
<?php get_template_part('template-parts/footer_v1'); ?>