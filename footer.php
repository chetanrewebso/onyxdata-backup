<!-- Footer start -->
<?php if (!is_front_page() && !is_home() && !is_page('about-us')) {?>
<section class="onyx-getintouch">
  <div class="onyx-getintouch-titlebox">
    <div class="section-title">
      <span class="section-title-icon">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon.webp" height="40" width="40" />
      </span>
      Get In Touch
    </div>
    <div class="section-subtitle">
      <?php echo get_field('footer_form_heading_', 'option'); ?>
      <!--  We want to share our location-->
      <!--<span>to find us easily.</span>-->
    </div>
  </div>
  <div class="getintouch-formbox">
    <div class="container">
      <div class="getintouch-form">
        <div class="row">
          <?php echo do_shortcode('[contact-form-7 id="136" html_id="contact-form-136" title="Get in Touch Form"]'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="onyx-contact-detailbox">
          <div class="onyx-contact-detailbox-icon">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pin.svg" alt="locations" />
          </div>
          <div class="onyx-contact-detailbox-text">
            <h4>Office Address</h4>
            <?php echo get_field('office_address', 'option'); ?>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mr">
        <div class="onyx-contact-detailbox">
          <div class="onyx-contact-detailbox-icon">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/call.svg" alt="call" />
          </div>
          <div class="onyx-contact-detailbox-text">
            <h4>Telephone number</h4>
            <?php $phone = get_field('phone', 'option'); ?>
            <a href="tel:+<?php preg_match_all('/([\d]+)/', esc_attr($phone), $match);
                          $match1 = '';
                          foreach ($match[0] as $val) {
                            $match1 = $match1 . $val;
                          }
                          echo $match1; ?>" target="_blank">
              <?php echo $phone; ?>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="onyx-contact-detailbox">
          <div class="onyx-contact-detailbox-icon">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mail.svg" alt="call" />
          </div>
          <div class="onyx-contact-detailbox-text">
            <h4>Mail address</h4>
            <?php $email = get_field('email', 'option'); ?>
            <a href="mailto:<?php echo $email; ?>" target="_blank">
              <?php echo $email; ?>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<?php }?>

<footer class="od-footer">
  <div class="container">
    <div class="grid">
      <div class="g-col-xxl-6 g-col-xl-6 g-col-lg-6 g-col-md-12 g-col-sm-12 g-col-12">
        <h3>QUICK LINKS</h3>
        <?php
            echo wp_nav_menu(array(
              'menu'        => 'Footer Menu',
              'menu_id'     => '',
              'menu_class'  => 'od-footer-link',
              'fallback_cb' => false,
               'depth'       => 1,
            ));
            ?>
        <!-- <ul class="od-footer-link">
          <li><a href="index.html" class="od-active" aria-label="Home">Home</a></li>
          <li><a href="#" aria-label="About us">About Us</a></li>
          <li><a href="#" aria-label="Training">Traning</a></li>
          <li><a href="#" aria-label="Case Studies">Case Studies</a></li>
          <li><a href="#" aria-label="Data DAN">Data DNA</a></li>
          <li><a href="#" aria-label="Contact Us">Contact Us</a></li>
          <li><a href="#" aria-label="Privacy Policy">Privacy Policy</a></li>
          <li><a href="#" aria-label="Terms & Conditions">Terms & Conditions</a></li>
        </ul> -->
      </div>
      <div class="g-col-xxl-3 g-col-xl-3 g-col-lg-3 g-col-md-12 g-col-sm-12 g-col-12 od-footer-contact">
        <div class="od-footer-contact-list">
          <h3>COMPANY NUMBER</h3>
          <a href="tel:+<?php echo esc_url((the_field('company_number', 'option'))); ?>" aria-label="Company number">
            <?php echo esc_html(the_field('company_number', 'option')); ?>
          </a>
        </div>
        <div>
          <div class="od-footer-contact-list">
            <h3>VAT NUMBER</h3>
            <a href="tel:+<?php echo esc_url((the_field('vat_number', 'option'))); ?>" aria-label="Vat number">
              <?php echo esc_html(the_field('vat_number', 'option')); ?>
            </a>
          </div>
        </div>
      </div>
      <div class="g-col-xxl-3 g-col-xl-3 g-col-lg-3 g-col-md-12 g-col-sm-12 g-col-12">
        <ul class="od-footer-social-link">
          <?php
                      if (have_rows('social_links', 'option')): ?>
          <?php while (have_rows('social_links', 'option')): the_row();
                        $s_name = get_sub_field('link_title');
                        $s_link = get_sub_field('links');
                        $s_icon = get_sub_field('icon');
                        ?>
          <li>
            <a href="<?php echo esc_url($s_link); ?>" title="<?php echo esc_attr($s_name); ?>" aria-label="<?php echo esc_attr($s_name); ?>" target="_blank">
              <?php echo $s_icon; ?>
            </a>
          </li>
          <?php endwhile;?>
          <?php endif;?>
        </ul>

      </div>
    </div>
    <div class="od-footer-bottom">
      <div class="od-footer-bottom-content">
        <p>Copyright © <script>document.write( new Date().getFullYear() );</script>. All Rights Reserved.</p>
        <p>Design & Developed by <a href="https://www.onyxdata.co.uk/" target="_blank" aria-label="igexsolutions"> Onyx Data </a></p>
      </div>
    </div>
  </div>
</footer>


<!-- Footer end -->


	<!-- loader start -->
	<div id="ftco-loader" >
    <div class="loader">
      <div class="loader-box">
        <img src="https://onyxdata.co.uk/wp-content/uploads/2025/01/loader.png" alt="Loader">

      </div>
    </div>
    <!--loader end-->
    
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
  jQuery(document).ready(function () {

    jQuery("#contact-form-136").validate({
      rules: {
        nm: "required",
        em: "required",
        ph: "required",
        msg: "required",
      },
      messages: {
        nm: "Please enter your fullname",
        em: "Please enter your valid email",
        ph: "Please enter your valid conatct number",
        msg: "Please enter a message",
      },
    });

    jQuery('#send').on('click', function () {
      // alert('jj');
      jQuery("#contact-form-136").valid();

      //   if (jQuery('#nm').val() == '') {
      //     jQuery('#nm').focus();
      //     return false;
      //   }
      //   if (jQuery('#em').val() == '') {
      //     jQuery('#em').focus();
      //     return false;
      //   }
      //   if (jQuery('#ph').val() == '') {
      //     jQuery('#ph').focus();
      //     return false;
      //   }

      //     if (jQuery("#msg").val()=='') {
      //       jQuery('#msg').focus();
      //       return false;
      //     }

      //   else{
      //       jQuery(this).prop("disabled",true);
      //       jQuery(this).val("Submitting....");
      //   window.setTimeout(function () {
      //       jQuery(".modal").modal("hide");
      //       // location.reload();
      //   }, 4000);
      //}
    });

    // jQuery('#reqbtn').click(function() {
    //   // alert('hh');
    //   var nm = jQuery('#rtxt').val();
    //   var pn = jQuery('#rph').val();
    //   var em = jQuery('#rem').val();
    //   var ser1 = jQuery("#rser1 option:selected").val();
    //   // alert(ser1);
    //   var ser2 = jQuery('#rser2 option:selected').val();
    //   var ser4 = jQuery('#rser4 option:selected').val();
    //   var ser3 = jQuery('#rser3 option:selected').val();
    //   var ser5 = jQuery('#rser5 option:selected').val();
    //   if (nm == '') {
    //     jQuery('.nm.er').html('Please Enter FirstName');
    //     jQuery('#nm').focus();
    //     return false;
    //   }
    //   if (pn == '') {
    //     jQuery('.pn.er').html('Please Enter Phone');
    //     jQuery('#pn').focus();
    //     return false;
    //   }
    //   if (em == '') {
    //     jQuery('.em.er').html('Please Enter Email');
    //     jQuery('#em').focus();
    //     return false;
    //   }
    //   if (ser1 === '') {
    //     jQuery('.ser1.er').html('Please Select Service');
    //     jQuery('#ser1').focus();
    //     return false;
    //   }
    //   if (ser2 === '') {
    //     jQuery('.ser2.er').html('Please Enter Service');
    //     jQuery('#ser2').focus();
    //     return false;
    //   }
    //   if (ser4 === '') {
    //     jQuery('.ser4.er').html('Please Enter Service');
    //     jQuery('#ser4').focus();
    //     return false;
    //   }
    //   if (ser3 === '') {
    //     jQuery('.ser3.er').html('Please Enter Service');
    //     jQuery('#ser3').focus();
    //     return false;
    //   }
    //   if (ser5 === '') {
    //     jQuery('.ser5.er').html('Please Enter Service');
    //     jQuery('#ser5').focus();
    //     return false;
    //   }
    //   // else{
    //   //     jQuery(this).prop("disabled",true);
    //   //     jQuery(this).val("Submitting....");
    //   //     window.setTimeout(function () {
    //   //         location.reload();
    //   //     }, 2000);
    //   //     jQuery('.res').html('Thank you for your message. It has been sent.');
    //   //     // jQuery(".contact-form1234").valid();
    //   // }
    //   // jQuery(".contact-form1234").valid();
    // });
    //Subcribe
    // jQuery('#sbbtn').on('click', function() {
    //   if (jQuery('#nem').val() == '') {
    //     jQuery('#nem').focus();
    //     return false;
    //   }
    //   // else{
    //   //     jQuery(this).prop("disabled",true);
    //   //     jQuery(this).val("Submitting....");
    //   // window.setTimeout(function () {
    //   //     jQuery(".modal").modal("hide");
    //   //     // location.reload();
    //   // }, 4000);
    //   //}

    //   jQuery(".screen-reader-response").remove();
    // });
  });
</script>
<script type="text/javascript">
  (function ($) {

    /**
     * initMap
     *
     * Renders a Google Map onto the selected jQuery element
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   jQuery $el The jQuery element.
     * @return  object The map instance.
     */
    function initMap($el) {

      // Find marker elements within map.
      var $markers = $el.find('.marker');

      // Create gerenic map.
      var mapArgs = {
        zoom: $el.data('zoom') || 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map($el[0], mapArgs);

      // Add markers.
      map.markers = [];
      $markers.each(function () {
        initMarker($(this), map);
      });

      // Center map based on markers.
      centerMap(map);

      // Return map instance.
      return map;
    }

    /**
     * initMarker
     *
     * Creates a marker for the given jQuery element and map.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   jQuery $el The jQuery element.
     * @param   object The map instance.
     * @return  object The marker instance.
     */
    function initMarker($marker, map) {

      // Get position from marker.
      var lat = $marker.data('lat');
      var lng = $marker.data('lng');
      var latLng = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
      };

      // Create marker instance.
      var marker = new google.maps.Marker({
        position: latLng,
        map: map
      });

      // Append to reference for later use.
      map.markers.push(marker);

      // If marker contains HTML, add it to an infoWindow.
      if ($marker.html()) {

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function () {
          infowindow.open(map, marker);
        });
      }
    }

    /**
     * centerMap
     *
     * Centers the map showing all markers in view.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   object The map instance.
     * @return  void
     */
    function centerMap(map) {

      // Create map boundaries from all map markers.
      var bounds = new google.maps.LatLngBounds();
      map.markers.forEach(function (marker) {
        bounds.extend({
          lat: marker.position.lat(),
          lng: marker.position.lng()
        });
      });

      // Case: Single marker.
      if (map.markers.length == 1) {
        map.setCenter(bounds.getCenter());

        // Case: Multiple markers.
      } else {
        map.fitBounds(bounds);
      }
    }

    // Render maps on page load.
    $(document).ready(function () {
      var image = $('noscript').text();
      $("noscript").remove();
      // $("a").append(image);

      $('.acf-map').each(function () {
        var map = initMap($(this));
      });
    });

  })(jQuery);
</script>

 
      <script>
   //  window.addEventListener("load", () => {
   //   const loader = document.getElementById("ftco-loader");
   //   const content = document.getElementById("content");
   
    
   //   setTimeout(() => {
   //     loader.style.display = "none";
   //     content.style.display = "block";
   //   }, 1);
   // });
   
   document.addEventListener("DOMContentLoaded", () => {
  const loader = document.getElementById("ftco-loader");
  const content = document.getElementById("content");

  setTimeout(() => {
    loader.style.display = "none";
    content.style.display = "block";
  }, 1000); 
});

     </script>
    

     

   
<?php wp_footer();?>


</body>
</html>