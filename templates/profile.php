<?php

/**
 * Template Name: profile
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
if (!is_user_logged_in()) {
    wp_redirect('/onyxdata-stagging/login/');
    exit;
}


?>

<style>
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
        align-items: center;
        flex-wrap: wrap;

    }

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


    .profile-sidebar .dashboard-widget .dashboard-menu>ul>li a:hover {
        color: #ffbb09;


    }

    .profile-sidebar .dashboard-widget .dashboard-menu>ul>li a {
        transition: .4s;
    }


    .profile-sidebar .dashboard-widget .dashboard-menu>ul>li:hover a,
    .profile-sidebar .dashboard-widget .dashboard-menu>ul>li.active>a {
        color: #fff;
        background: #ffbb09;

        border-radius: 10px;
    }

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

    textarea::placeholder {
        color: rgba(0, 0, 0, 0.5);
        /* Adjust the color as needed */
    }

    @media(max-width:440px) {
        .profile-card .change-avatar {

            justify-content: center;
        }

        .profile-card .change-avatar .profile-img {

            margin-bottom: 20px;

            margin-right: 3px !important;
        }

        .profile-card .change-avatar .change-photo-btn {

            margin: auto;
        }
    }
</style>



<!-- header end -->

<section class="leaderboard-section"
    style="background-image:linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url(assets/images/portfolio-detail.jpg);">
    <div class="container text-white text-center">
        <h1>Edit Profile</h1>
    </div>
</section>
<!--  -->
<section id="profile" class="profile ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="profile-sidebar">
                    <div class="widget-profile">
                        <div class="profile-inner-box">
                           
                           <?php
if (is_user_logged_in()) {
    $profile_image = get_user_meta(get_current_user_id(), 'profile_image', true);
     $user_location = get_user_meta(get_current_user_id(), 'user_location', true);
    $avatar = !empty($profile_image) ? esc_url($profile_image) : get_template_directory_uri() . '/assets/images/pic.jpg';
} else {
    $avatar = get_template_directory_uri() . '/assets/images/pic.jpg'; // Default avatar for guests
}
?>

                            <a href="#" class="profile-pic">
                                <img src="<?php echo esc_url($avatar); ?>" alt="profile image"></a>
                            <?php
                            if (is_user_logged_in()) {
                                $current_user = wp_get_current_user();
                                $user_name = $current_user->display_name; // You can also use $current_user->user_firstname for the first name
                            
                                echo '<div class="profile-det-info">';
                                echo '<h3>' . esc_html($user_name) . '</h3>';
                                echo '<h5 class="mobile-number">';
                                echo '<i class="fas fa-map-marker-alt"></i> ' .$user_location.''; // Corrected the icon class
                                echo '</h5>';
                                echo '</div>';
                            }
                            ?>

                        </div>


                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="active">
                                    <a href="profile.html">
                                        <i class="fas fa-edit me-2"></i>
                                        <span>Edit Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="change-password.html">
                                        <i class="fas fa-lock me-2"></i>
                                        <span>Change Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="portfolio-highlight.html">
                                        <i class="fas fa-briefcase me-2"></i>
                                        <span>Portfolio Highlights</span>

                                    </a>
                                </li>
                                <li>
                                    <a href="badges.html">
                                        <i class="fa-solid fa-ranking-star me-2"></i>
                                        <span>Badges and Points</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="setting.html">
                                        <i class="fa-solid fa-gear  me-2"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="delete-account.html">
                                        <i class="fas fa-trash me-2"></i>
                                        <span>Delete Account</span>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">

                <div>


                    <!--  Form -->
<form id="custom-profile-form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('update_profile_nonce'); ?>">
    <div class="profile-card">
        <div class="row">
            <div class="col-lg-12">
                <div class="change-avatar">
                    <div class="profile-img">
                        <?php
                        $profile_image = get_user_meta(get_current_user_id(), 'profile_image', true);
                        if ($profile_image) {
                            echo '<img src="' . esc_url($profile_image) . '" alt="Profile Image"/>';
                        }
                        ?>
                    </div>

                    <div class="upload-img">
                        <div class="change-photo-btn">
                            <span>
                                <i class="fas fa-upload"></i> Upload Photo
                            </span>
                            <input type="file" class="upload" name="profile_image" id="profile_image" accept="image/*">
                        </div>
                        <small class="form-text text-muted">JPG, GIF, or PNG. Max size of 800K</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="profile-detail">
        <div class="row gap-0">
            <div class="col-lg-12 col-md-6">
                <div class="mb-3">
                    <label class="mb-2">First Name</label>
                    <input type="text" class="form-control" name="first_name"
                        value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'first_name', true)); ?>">
                </div>
                <div class="mb-3">
                    <label class="mb-2">Last Name</label>
                    <input type="text" name="last_name" class="form-control"
                        value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'last_name', true)); ?>">
                </div>
            </div>

            <div class="col-lg-12 col-md-6">
                <div class="mb-3">
                    <label class="mb-2">Location</label>
                    <input type="text" placeholder="Enter Location" name="user_location_x" class="form-control"
                        value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'user_location', true)); ?>">
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="mb-3">
                    <label class="mb-2">Bio</label>
                    <textarea name="description" class="form-control"
                        placeholder="Enter your Bio"><?php echo esc_textarea(get_user_meta(get_current_user_id(), 'description', true)); ?></textarea>
                </div>
            </div>
        </div>

        <div class="submit-section">
            <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
        </div>
    </div>
</form>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#custom-profile-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);
        formData.append('action', 'update_profile_ajax'); // Add AJAX action

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#custom-profile-form input[type="submit"]').val('Updating...').prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data.message);
                    $('#custom-profile-form')[0].reset(); // Reset form fields
                } else {
                    alert('Error: ' + response.data.message);
                }
                $('#custom-profile-form input[type="submit"]').val('Update Profile').prop('disabled', false);
            },
            error: function() {
                alert('Something went wrong. Please try again.');
                $('#custom-profile-form input[type="submit"]').val('Update Profile').prop('disabled', false);
            }
        });
    });
});
</script>

                    <!-- / Form -->
                </div>





            </div>
        </div>

    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</section>


<?php get_template_part('template-parts/footer_v1'); ?>