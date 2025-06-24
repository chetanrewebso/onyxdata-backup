<?php 

/**
 * Template Name: FAQ PAGE V2 
 */
get_header();

?>
<?php get_template_part('template-parts/header_v1'); ?>

    <?php  $banner_image= get_field('banner_image');?>

  <section class="leaderboard-section" style="background-image:linear-gradient(to bottom, rgb(0 0 0 / 62%) 0%, rgb(0 0 0 / 78%) 100%), url('<?php echo esc_url($banner_image); ?>');">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="leader-content">
                    <h2>FAQ's</h2>
                </div>
            </div>
        </div>
    </div>
</section>



    <!--  faq section  -->
<?php  $heading= get_field('heading');
       $subheading= get_field('subheading');
      $faq_image= get_field('faq_image');
?>
    <section class="faq-section pt-5 pb-5" id="faq">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 mx-auto text-center heading-section mb-4">
                  <h2 class="mb-3 heading"><?php echo $heading; ?></h2>
                  <p class="mb-4 subheading"><?php echo $subheading; ?></p>
              </div>
          </div>
       </div>


       <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="faq-img">
                    <img src="<?php echo esc_url($faq_image);?>" alt="Faq">
                </div>
            </div>
            <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How do I create a portfolio on the platform?
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        To create a portfolio, navigate to the "Portfolio" section in the main menu. Click on the "Create Portfolio" button. Fill out your personal and project details, upload images or links related to your work, and click "Save" to publish your portfolio.
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

<?php if( have_rows('faq_section') ): ?> 
<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="accordion" id="accordionExample">
        <?php 
        $count = 1; 
        while( have_rows('faq_section') ): the_row(); 
            $faq_question = get_sub_field('faq_question'); 
            $faq_answer = get_sub_field('faq_answers'); 
            $unique_id = 'collapse' . $count; 
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $unique_id; ?>" aria-expanded="false" aria-controls="<?php echo $unique_id; ?>">
                    <?php echo $faq_question; ?>
                </button>
            </h2>
            <div id="<?php echo $unique_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
<?php endif; ?>


        </div>
      </div>      

       </section>

        <!--  faq section /  -->

        <!-- contact section -->

         <!-- <section class="contact-section pt-5 pb-5" id="contact">

            <div class="container">

                <div class="row mb-4 mt-3">

                    <div class="col-md-12 text-center">

                        <h2 class="section-title">Contact Us</h2>

                        <p class="section-subtitle">We'd love to hear from you!</p>

                        

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row">

                   

                    <div class="col-lg-6 col-md-8 col-sm-12 mt-3 mx-auto">

                        <div class="contact-form">

                       

                          <form action="#" method="POST">

                            <div class="mb-3">

                              <label for="name" class="form-label">Your Name</label>

                              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">

                            </div>

                            

                            <div class="mb-3">

                              <label for="email" class="form-label">Your Email</label>

                              <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">

                            </div>

                            

                            <div class="mb-3">

                              <label for="subject" class="form-label">Subject</label>

                              <input type="text" class="form-control" id="subject" name="subject" required placeholder="Subject of your query">

                            </div>

                      

                            <div class="mb-3">

                              <label for="message" class="form-label">Message</label>

                              <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Write your message here..."></textarea>

                            </div>

                      

                            

                      

                            <button type="submit" class="btn btn-primary">Submit</button>

                          </form>

                        </div>

                      </div>

                      

                </div>

            </div>

         </section> -->

        




   <?php get_footer(); ?>
<?php get_template_part('template-parts/footer_v1'); ?>
