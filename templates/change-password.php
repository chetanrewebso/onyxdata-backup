<?php

/**
 * Template Name: change password
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

     margin: 4px 14px;
 transition: .5s;
    cursor: pointer;

}
.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a {
    color: #334155;
    display: block;
    border-radius: 10px;
    font-size: 16px;
         padding: 16px 16px;
  
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
    align-items: center;
}
.profile-card .change-avatar .profile-img{
   
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
.profile-detail{
      border: 1px solid #E2E8F0;
    margin: 0 0 24px;
    padding: 24px 24px 24px;
    border-radius: 10px;
   box-shadow: 0px 7.5px 17.5px 0px rgba(0, 0, 0, 0.0509803922);
       background: #fff;
}
.profile-detail label{
 
    font-size: 16px;

}

.profile-detail .form-control{
 
    border-color: #E2E8F0;
    border-radius: 6px;
    padding: 7px 15px;
    height: 50px;
    box-shadow: none;

}
.profile-detail textarea {
   height:81px!important;
}
.profile-detail .form-control:focus {
    border: 1.5px solid #ffbb09;
}
.change-photo-btn small{
    font-size: 14px;
}
.work-histroy {
    font-size: 18px;
    color: #777777;
    margin-bottom: 15px;
    font-weight: 600;
}

.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a.active{
        color: #ffbb09;
    font-weight: 600;

}
.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a:hover{
        color: #ffbb09;


}

.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a{
    transition:.4s;
}

.eye-icon {
        position: absolute;
    top: 42px;
    right: 31px;
    cursor:pointer;
}

.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a:hover{
        color: #ffbb09;


}

.profile-sidebar .dashboard-widget .dashboard-menu > ul > li a{
    transition:.4s;
}


.profile-sidebar .dashboard-widget .dashboard-menu > ul > li:hover a,
.profile-sidebar .dashboard-widget .dashboard-menu > ul > li.active > a{
    color:#fff;
        background: #ffbb09;
        
    border-radius: 10px;
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
											<li >
												<a href="#" >
													<i class="fas fa-edit me-2"></i>
													<span>Edit Profile</span>
												</a>
											</li>
											
											<li class="active">
												<a href="#">
													<i class="fas fa-lock me-2"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="fas fa-user me-2 "></i>
													<span>Portfolio Highlights</span>
													<small class="unread-msg">2</small>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="fas fa-edit me-2"></i>
													<span>Badges and Points</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="fas fa-edit me-2"></i>
													<span>Settings</span>
												</a>
											</li>
										
										</ul>
									</nav>
								</div>
            </div>
        
       </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
       
               <div>
        

					<!--  Form -->

						<form>
						  
						    
						    <div class="profile-detail">
						  	<div class="row gap-0">
                            <div class=" col-lg-12 mt-3 position-relative">
                                 	<div class="mb-3">
                                  <label for="password-field">Old Password</label>
                                  <input type="password" class="form-control" id="password-field" placeholder="Enter Old Password">
                                  <span toggle="#password-field" class="toggle-password">
                                    <i class="fas fa-eye eye-icon me-1"></i>
                                  </span>
                                    </div>
                              </div>
                              
                               <div class=" col-lg-12   position-relative">
                                   	<div class="mb-3">
                                  <label for="new-password-field">New Password</label>
                                  <input type="password" class="form-control" id="new-password-field" placeholder="Enter New Password">
                                  <span toggle="#new-password-field" class="new-toggle-password">
                                    <i class="fas fa-eye eye-icon me-1"></i>
                                  </span>
                                    </div>
                              </div>
                              
                              
                                 <div class=" col-lg-12   position-relative">
                                   	<div class="mb-3">
                                  <label for="confirm-password-field">Confirm Password </label>
                                  <input type="password" class="form-control" id="confirm-password-field" placeholder="Enter Confirm Password ">
                                  <span toggle="#confirm-password-field" class="confirm-toggle-password">
                                    <i class="fas fa-eye eye-icon me-1"></i>
                                  </span>
                                    </div>
                              </div>
                              
                            
									 
									 


										</div>

										<div class="submit-section">

											<a href="#"  class="btn od-btn">Save Profile</a>

										</div>
						        
						    </div>

									

									</form>

					<!-- / Form -->
			</div>

									

						
        
      </div>
    </div>
    
    </div>
    
</section>


 
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("password-field");
    const togglePassword = document.querySelector(".toggle-password");

    togglePassword.addEventListener("click", function () {
    
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.innerHTML = '<i class="fas fa-eye eye-icon me-1"></i>'; 
      } else {
        passwordField.type = "password";
        togglePassword.innerHTML = '<i class="fas fa-eye-slash eye-icon me-1"></i>'; 
      }
    });
  });
  
//   ------
   document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("new-password-field");
    const togglePassword = document.querySelector(".new-toggle-password");

    togglePassword.addEventListener("click", function () {
    
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.innerHTML = '<i class="fas fa-eye eye-icon me-1"></i>'; 
      } else {
        passwordField.type = "password";
        togglePassword.innerHTML = '<i class="fas fa-eye-slash eye-icon me-1"></i>'; 
      }
    });
  });
  
  
   document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("confirm-password-field");
    const togglePassword = document.querySelector(".confirm-toggle-password");

    togglePassword.addEventListener("click", function () {
    
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.innerHTML = '<i class="fas fa-eye eye-icon me-1"></i>'; 
      } else {
        passwordField.type = "password";
        togglePassword.innerHTML = '<i class="fas fa-eye-slash eye-icon me-1"></i>'; 
      }
    });
  });
</script>