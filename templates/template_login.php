<?php

/**
 * Template Name: login page v2
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
   
   /*-login css start--*/
   #login_section .login-container {
    margin-top: 179px;
    margin-bottom: 50px;
}
.bg-login{
    
    background-image: url('assets/images/login.jpg');

     background-repeat: no-repeat;
    background-size: cover;
   min-height: 600px;
    width:100%;
    background-position: center;
    position:relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height:100%;

}
.bg-login::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #1508039e;
    content: "";
    border-radius: 10px 0 0px 10px;
}
.login-inner-box{
        position: relative;
    padding: 32px;
    text-align: center;
}
.login-heading{
    font-size: 34px;
    font-weight: 600;
    color: #fff;
    line-height: 36px;
}
.login-desc {
    color: #fff;
    margin: 30px auto;
    letter-spacing: .8px;
}
.login-form {
    padding: 30px 10px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 0px 10px 10px 0px;
}
.login-form .form-control{
        border: 1.5px solid #e7e7e9;
    border-radius: 25px;
    height: 50px;
    font-size: 15px;
}
.custom-checkbox{
    display:none;
}

.custom-checkbox + .form-check-label {
  position: relative;
  padding-left: 30px; 
  cursor: pointer;
}
.custom-checkbox + .form-check-label::before {
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

.custom-checkbox:checked + .form-check-label::before {
  background-color: #ffbb09; 
  border-color: #ffbb09;
}

.custom-checkbox:checked + .form-check-label::after {
  content: "✓"; 
  position: absolute;
  left: 3px;
  top: 50%;
  transform: translateY(-50%);
  color: #fff;
  font-size: 14px;
}
.login-form h2{
        font-weight: 600;
    font-size: 29px;
}
.login-or {
    color: #d4d4d4;
    position: relative;
    margin: 20px 0;
    padding: 10px 0;
}
.or-line {
    background-color: #e5e5e5;
    height: 1px;
    margin-bottom: 0;
    margin-top: 0;
    display: block;
}
.span-or {
    background-color: #ffffff;
    display: block;
    margin-left: -20px;
    text-align: center;
    width: 42px;
    position: absolute;
    top: -3px;
    left: 50%;
}
.btn-google {
    background-color: #dd4b39;
    color: #ffffff;
    font-size: 13px;
    padding: 8px 12px;
        border-radius: 25px;
}
.btn-google:hover {
    background-color: transparent;
     border: 1.5px solid #dd4b39;
    color: #dd4b39;
}
.btn-facebook {
    background-color: #3a559f;
    color: #ffffff;
    font-size: 13px;
    padding: 8px 12px;
        border-radius: 25px;
}
.btn-facebook:hover {
  
    background: transparent;
    border: 1.5px solid #3a559f;
    color: #3a559f;

}
.login-btn{
        height: 50px;

}
.login-form .dont-have {
    color: #3d3d3d;
    margin-top: 20px;
    font-size: 15px;
}
.login-form  .dont-have a {
    color: #ffbb09;
}
.eye-icon {
        position: absolute;
    top: 42px;
    right: 31px;
    cursor:pointer;
}
.checkbox-label{
  
    font-size: 15px;
}

.btn-linkedin{

    background-color: #0a66c2;
    color: #ffffff;
    font-size: 13px;
    padding: 8px 12px;
    border-radius: 25px;
}
.btn-linkedin:hover {
    background-color: transparent;
     border: 1.5px solid #0a66c2;
    color: #0a66c2;
}

.login-form .form-control:focus {
    border: 1.5px solid #ffbb09;
  box-shadow: none !important;
}
.forgort-pwd{
    font-size: 14px;
    color: #ffbb09;
}

</style>



      

    <section id="login_section">
        <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                    <div class="bg-login">
                         <div class="login-inner-box">
                             <h1 class="login-heading">To keep connected with Largest E-Commerce Company in the World</h1>
                             <p class="login-desc" >We are glad to see you again! Get access to your Orders, Wishlist and Recommendations.</p>
                             
                             
                         </div>
                    
                        
                    </div>
                 
                    <!--<img src="https://onyxdata.co.uk/onyxdata-stagging/wp-content/uploads/2025/01/login-bg.jpg" alt="Loader">-->
               
                
            </div>
            <!---->
<div class="col-lg-6 col-md-6 col-sm-12 p-0">
    <div class="login-form row">
        <?php if (is_user_logged_in()): ?>
            <!-- Show Logout Button if User is Logged In -->
            <div class="col-lg-12 text-center">
                <h3>Welcome, <?php echo wp_get_current_user()->display_name; ?>!</h3>
                <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn btn-danger w-100">Logout</a>
            </div>
        <?php else: ?>
            <!-- Show Login Form if User is Not Logged In -->
            <h2 class="text-center">Login</h2>
            <form id="custom-login-form" class="col-lg-9 mx-auto">
                <div class="row">
                    <div class="form-group col-lg-12 mb-3">
                        <label for="login-email">Email</label>
                        <input type="email" class="form-control" id="login-email" name="username" placeholder="Enter email" required>
                    </div>
                    <div class="form-group col-lg-12 position-relative mb-3">
                        <label for="login-password">Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Password" required>
                        <span toggle="#login-password" class="toggle-password">
                            <i class="fas fa-eye eye-icon me-1"></i>
                        </span>
                    </div>
                    <div class="form-check col-lg-12 mb-3 d-flex justify-content-between">
                        <input type="checkbox" class="custom-checkbox" id="remember-me" name="remember">
                        <label class="form-check-label" for="remember-me">
                            <span class="checkbox-label">Remember Me</span>
                        </label>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <button type="submit" class="text-white d-inline-block text-center od-btn btn-primary w-100">Login</button>
                    </div>
                    <p id="login-message" class="text-center mt-2"></p>
                </div>
            </form>
            
        <?php endif; ?>
    </div>
</div>

<script>
document.getElementById("custom-login-form")?.addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    formData.append("action", "custom_wp_login");

    fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("login-message").innerText = data.message;
        if (data.success) {
            //window.location.reload(); 
        const basePath = window.location.origin + (window.location.pathname.includes('/onyxdata-stagging') ? '/onyxdata-stagging' : '');
         window.location.href = basePath + "/account";

        }
    });
});
</script>


                
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
  </script>
  



<script>
    jQuery(document).ready(function($) {
        $('.toggle-password').on('click', function() {
            var targetId = $(this).attr('toggle');
            var $passwordField = $(targetId);
            var $icon = $(this).find('i');

            if ($passwordField.attr('type') === 'password') {
                $passwordField.attr('type', 'text');
                $icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $passwordField.attr('type', 'password');
                $icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
    </script>

<?php get_template_part('template-parts/footer_v1'); ?>