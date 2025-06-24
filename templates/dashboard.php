<?php

/**
 * Template Name: dashboard
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

?>
<style>
    .profile-sidebar {
    background-color: #ffffff;
    border: 1px solid #f0f0f0;
    margin-bottom: 30px;
    overflow: hidden;
    border-radius: 4px;
    box-shadow:0px 10px 40px 10px rgba(0, 0, 0, 0.0784313725);
}
#profile {
    padding:70px 0 20px;
}
 #profile .profile-sidebar .widget-profile {
    border-bottom: 1px solid #f0f0f0;
    margin: 0;
    padding: 20px;
    text-align: center;
}
 #profile .profile-sidebar .profile-inner-box{
    
    display: block !important;
    text-align: center !important;

}
#profile .profile-sidebar .profile-inner-box .profile-pic{
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

.profile-det-info .mobile-number  {
    color: #757575;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.profile-sidebar .dashboard-widget{
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
.profile-sidebar .dashboard-widget .dashboard-menu > ul > li {
    position: relative;
   border:1px solid #f0f0f0;
}
.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a {
    color: #757575;
    display: block;
    border-radius: 10px;
    font-size: 16px;
    padding: 15px 10px;
}
</style>
<section id="profile" class="profile ">
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-8 col-sm-12">
            <div class="profile-sidebar">
                  <div class="widget-profile">
                 <div class="profile-inner-box">
                     <a href="#" class="profile-pic">
                         <img src ="https://onyxdata.co.uk/onyxdata-stagging/wp-content/uploads/2025/01/profile-pic.jpg "alt="profile image">
                    
                    </a>
                    
                    <div class="profile-det-info">

							<h3>Richard Wilson</h3>
							<h5 class="mobile-number">
					     	    <i class="fas fa-map-0"></i>
					     	    India
					     	</h5>
                           
                        
                	</div>
                </div>
                
                
              </div>
              <div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="doctor-dashboard.html">
													<i class="fas fa-home me-2"></i>
													<span>Work</span>
												</a>
											</li>
											<li>
												<a href="doctor-request.html">
													<i class="fa-solid fa-calendar-check"></i>
													<span>Requests</span>
													<small class="unread-msg">2</small>
												</a>
											</li>
											<li>
												<a href="appointments.html">
													<i class="fa-solid fa-calendar-days"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li>
												<a href="available-timings.html">
													<i class="fa-solid fa-calendar-day"></i>
													<span>Available Timings</span>
												</a>
											</li>
											<li class="active">
												<a href="my-patients.html">
													<i class="fa-solid fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li>
												<a href="doctor-specialities.html">
													<i class="fa-solid fa-clock"></i>
													<span>Specialties &amp; Services</span>
												</a>
											</li>
											<li>
												<a href="reviews.html">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											<li>
												<a href="accounts.html">
													<i class="fa-solid fa-file-contract"></i>
													<span>Accounts</span>
												</a>
											</li>
											<li>
												<a href="invoices.html">
													<i class="fa-solid fa-file-lines"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li>
												<a href="doctor-payment.html">
													<i class="fa-solid fa-money-bill-1"></i>
													<span>Payout Settings</span>
												</a>
											</li>																																				
											<li>
												<a href="chat-doctor.html">
													<i class="fa-solid fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">7</small>
												</a>
											</li>
											<li>
												<a href="doctor-profile-settings.html">
													<i class="fa-solid fa-user-pen"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="social-media.html">
													<i class="fa-solid fa-shield-halved"></i>
													<span>Social Media</span>
												</a>
											</li>
											<li>
												<a href="doctor-change-password.html">
													<i class="fa-solid fa-key"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="login.html">
													<i class="fa-solid fa-calendar-check"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
            </div>
        
       </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        
      </div>
    </div>
    
    </div>
    
</section>