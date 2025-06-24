<?php
/**
 *  The template for displaying archive pages
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
$current_user_id = get_current_user_id();
$current_author = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
$user_id = $current_author->ID;
$user= get_userdata($current_author->ID);

$defaultbaner = get_stylesheet_directory_uri(); '/assets/images/da_banner-scaled.jpg';
$portbanner_avatar = get_user_meta($user_id, 'PortfolioImg', true);
$banner_url = $portbanner_avatar ? $portbanner_avatar : $defaultbaner; 

global $wpdb; $islike = ''; $likes_table = $wpdb->prefix . "iup_likes";

$sb_title = get_author_posts_url( $current_author->ID );
$sb_url = get_author_posts_url( $current_author->ID );

$twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=wpvkp';
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
$whatsappURL = 'whatsapp://send?text='.$sb_title . ' ' . $sb_url;
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;

?>
<main id="site-content" role="main">
	<article <?php post_class(); ?> id="post-
		<?php the_ID(); ?>">
		<div class="onyx-inner entry-header" style="background-image:url(<?php echo $banner_url;?>">
			<div class="container">

			</div>
		</div>
		<div class="entry-content">
			<div class="container">
				<div class="od-profile-content">
					<div class="od-profile">
					<?php $loc_avatar = get_user_meta($user_id, 'simple_local_avatar', true);
						$img_url = $loc_avatar ? $loc_avatar['full'] : $loc_avatar; ?>
						<!-- <span>a</span> -->
						<img class="od-profile ls-is-cached lazyloaded"  src="<?php echo esc_url($img_url); ?>">
					</div>
					<div class="od-profile-dis">
						<p><?php echo get_user_meta($user_id, 'first_name',true);?></p>
						<h2 class="od-inner-title"><?php echo get_user_meta($user_id, 'iup_portfolio_tagline',true);?></h2>
						<p class="od-profile-about"><?php echo get_user_meta($user_id, 'iup_portfolio_subtagline',true);?></p>
					</div>
					<div class="od-profile-follow">
						<div class="od-profile-portfolio">
							<!-- Button trigger modal -->
							<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#portfolioModal">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
									<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
								</svg>
							</button><!-- Modal -->
							<div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="portfolioModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<!-- Logo -->
											<a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-header-logo" aria-label="Logo">
												<?php
                                                $custom_logo_id = get_theme_mod('custom_logo');
                                                $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
												<img src="<?php echo esc_url($image[0]); ?>" alt="Onyx Data" class="img-fluid" width="70" height="100">
											</a>
											<!-- Logo -->
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="modal-profile">
												<div class="od-profile">
													<!-- <span>a</span> -->
                                                    <img class="od-profile ls-is-cached lazyloaded"  src="<?php echo esc_url($img_url); ?>">
												</div>
												<div class="od-profile-dis">
                                                <p><?php echo get_user_meta($user_id, 'first_name',true);?></p>
                                                <h2 class="od-inner-title"><?php echo get_user_meta($user_id, 'iup_portfolio_tagline',true);?></h2>
                                                <p class="od-profile-about"><?php echo get_user_meta($user_id, 'iup_portfolio_subtagline',true);?></p>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button class="od-btn" type="button">Report this member</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $follow_table = $wpdb->prefix . "iup_user_follow";
						  $is_follow = $wpdb->get_row("SELECT * FROM $follow_table WHERE follower_id='$current_user_id' AND followed_user_id='$user_id'");
						  if(empty($is_follow)){
							$follow = 'Follow Me';
						  }else{
							$follow = 'Following';
						  }
						?>
						<?php if ( is_user_logged_in() ) {  ?>
						<button class="od-btn Follow" name="addpostsFollowUnFollow" data-id="<?php echo $user_id;?>" id="addpostsFollowUnFollow"><?php echo $follow;?></button>
						<?php }else{?>
						<button class="od-btn Follow" name="" data-bs-toggle="modal" data-bs-target="#LoginModal"><?php echo $follow;?></button>
						<?php } ?>
						<div class="od-profile-share">
							<!-- Button trigger modal -->
							<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#shareModal">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
									<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
								</svg>
							</button><!-- Modal -->
							<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<div class="modal-header-head">
												<a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-drawer-menu-logo">
													<?php
                                                    $custom_logo_id = get_theme_mod('custom_logo');
                                                    $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
													<img src="<?php echo esc_url($image[0]); ?>" class="img-fluid" alt="Onyx-data" width="70" height="100">
												</a>
												<div data-bs-dismiss="modal" aria-label="Close">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg btn-close" viewBox="0 0 16 16">
														<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
													</svg>
												</div>
											</div>
											<h1>We Can Simplify Your Data</h1>
											<!-- <span class="od-btn">View my portfolio</span> -->
										</div>
										<div class="modal-body">
												<?php the_content();?>
											<div class="od-social-links">
												<!-- facebook -->
												<a href="<?php echo $facebookURL;?>" class="od-social-links-icon">
													<svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
														<path d="M640 317.9C640 409.2 600.6 466.4 529.7 466.4C467.1 466.4 433.9 431.8 372.8 329.8L341.4 277.2C333.1 264.7 326.9 253 320.2 242.2C300.1 276 273.1 325.2 273.1 325.2C206.1 441.8 168.5 466.4 116.2 466.4C43.4 466.4 0 409.1 0 320.5C0 177.5 79.8 42.4 183.9 42.4C234.1 42.4 277.7 67.1 328.7 131.9C365.8 81.8 406.8 42.4 459.3 42.4C558.4 42.4 640 168.1 640 317.9H640zM287.4 192.2C244.5 130.1 216.5 111.7 183 111.7C121.1 111.7 69.2 217.8 69.2 321.7C69.2 370.2 87.7 397.4 118.8 397.4C149 397.4 167.8 378.4 222 293.6C222 293.6 246.7 254.5 287.4 192.2V192.2zM531.2 397.4C563.4 397.4 578.1 369.9 578.1 322.5C578.1 198.3 523.8 97.1 454.9 97.1C421.7 97.1 393.8 123 360 175.1C369.4 188.9 379.1 204.1 389.3 220.5L426.8 282.9C485.5 377 500.3 397.4 531.2 397.4L531.2 397.4z" />
													</svg>
												</a>
												<!-- twitter -->
												<a href="<?php echo $twitterURL;?>" class="od-social-links-icon">
													<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
														<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
													</svg>
												</a>
												<!-- linkdin -->
												<a href="<?php echo $linkedInURL;?>" class="od-social-links-icon">
													<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
														<path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
													</svg>
												</a>
												<!-- whatsapp -->
												<a href="<?php echo $whatsappURL;?>" class="od-social-links-icon">
													<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
														<path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
													</svg>
												</a>
											</div>
											<div class="od-profile-link">
												<p><a target="_blank" href="<?php echo esc_url( get_author_posts_url( $current_author->ID ) ); ?>"><?php echo esc_url( get_author_posts_url( $current_author->ID ) ); ?></a></p>
												<!-- <div class="od-profile-link-copy">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
														<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
														<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
													</svg>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Tab -->
				<div class="od-profile-tab">
					<div class="od-profile-list">
						<div class="od-profile-button">
							<button class="profile-tablinks is-active" data-tech="tab1">
								About
							</button>
						</div>
						<div class="od-profile-button">
							<button class="profile-tablinks" data-tech="tab2">
								Project
							</button>
						</div>
					</div>
					<!-- Tab content -->
					<!-- About -->
					<div class="od-profile-box profile-tabcontent is-active" id="tab1">
						<div class="od-profile-box-list">
							<!-- about-->
							<div class="od-profile-box-list-content">
								<div class="card">
									<div class="card-header">
										About Me
									</div>
									<div class="card-body">
										<p class="card-text"><?php echo get_user_meta($user_id, 'iup_user_about',true);?></p>
									</div>
								</div>
							</div>
							<!-- work exp-->
							<div class="od-profile-box-list-content">
								<div class="card od-workexp-card">
									<div class="card-header">
										Work Experience
									</div>
									<div class="card-body od-workexp-card-body">
										<!-- exp1 -->
										<?php global $wpdb;
										$work_experience_table = $wpdb->prefix . 'iup_work_experience';
										$exp = $wpdb->get_results("SELECT * FROM $work_experience_table Where created_by='$user_id'");
										foreach($exp as $val){?>
										<div class="od-exp-content">
											<div class="od-exp-content-img">
											    <?php $default = get_stylesheet_directory_uri().'/assets/images/profile.png';
												$wimg = $val->company_logo;
												$exp_img_url = $wimg ? $wimg : $default; ?>
												<img src="<?php echo esc_url($exp_img_url); ?>" alt="Logo" height="512" width="512" class="img-fluid">
											</div>
											<div class="od-exp-content-details">
												<div class="od-exp-content-details-dis">
													<h4><?php echo $val->role;?></h4>
													<div class="od-exp-details">
														<p><?php echo $val->company_name;?></p>-<p><?php echo $val->role_type;?></p>-<p><?php echo $val->work_location;?></p>
													</div>
													<div class="od-exp-date">
														<p><?php echo $val->start_date;?></p>-<p><?php if(!empty($val->end_date) || $val->end_date!=''){ echo $val->end_date; }else{ echo "Present";}?></p>
													</div>
												</div>
												<div class="od-exp-content-details-acco">
													<p><?php echo $val->accomplishments;?></p>
												</div>
											</div>
										</div><?php } ?>
									</div>
								</div>
							</div>
							<!-- skill -->
							<div class="od-profile-box-list-content">
								<div class="card od-workexp-card">
									<div class="card-header">
										Skills & Knowledge
									</div>
									<div class="card-body od-skill-card-body">
										<div class="row">
											<!-- skill1 -->
											<?php global $wpdb;
											$skills_table = $wpdb->prefix . 'iup_skills';
											$skl = $wpdb->get_results("SELECT * FROM $skills_table Where created_by='$user_id'");
											// echo "<pre>";print_r($skl);
											foreach($skl as $sk){ $sid = $sk->id;?>
											<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
												<div class="od-skill">
													<!-- Button trigger modal -->
													<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#skillModal_<?php echo $sid;?>">
														<div class="od-skill-box">
															<div class="od-skill-box-head">
																<h5><?php echo $sk->name;?></h5>
																<span><?php echo $sk->rattings;?></span>
															</div>
															<p><?php echo $sk->accomplishment;?></p>
														</div>
													</button><!-- Modal -->
													<div class="modal fade" id="skillModal_<?php echo $sid;?>" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered">
															<div class="modal-content">
																<div class="modal-header">
																	<!-- Logo -->
																	<a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-header-logo" aria-label="Logo">
																		<?php
																		$custom_logo_id = get_theme_mod('custom_logo');
																		$image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
																		<img src="<?php echo esc_url($image[0]); ?>" alt="Onyx Data" class="img-fluid" width="70" height="100">
																	</a>
																	<!-- Logo -->
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<div class="modal-profile">
																		<div class="od-profile">
																			<!-- <span>a</span> -->
																			<img class="od-profile"  src="<?php echo esc_url($img_url); ?>">
																		</div>
																		<div class="od-profile-dis">
																		<p><?php echo get_user_meta($user_id, 'first_name',true);?></p>
																		<h2 class="od-inner-title"><?php echo get_user_meta($user_id, 'iup_portfolio_tagline',true);?></h2>
																		<p class="od-profile-about"><?php echo get_user_meta($user_id, 'iup_portfolio_subtagline',true);?></p>
																		</div>
																	</div>
																	<div class="od-skill-box">
																		<div class="od-skill-box-head">
																			<h5><?php echo $sk->name;?></h5>
																			<span><?php echo $sk->rattings;?></span>
																		</div>
																		<p><?php echo $sk->accomplishment;?></p>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
											</div><?php } ?>

										</div>
									</div>
								</div>
							</div>
							<!-- certificate -->
							<div class="od-profile-box-list-content">
								<div class="card od-certificate-card">
									<div class="card-header">
										Certificates
									</div>
									<div class="card-body od-certificate-card-body">
										<div class="row">
										<?php global $wpdb;
										$certi_table = $wpdb->prefix . 'iup_certificates';
										$certis = $wpdb->get_results("SELECT * FROM $certi_table Where created_by='$user_id'");
										// echo "<pre>";print_r($certis);
										foreach($certis as $ct){ $cid = $ct->id;?>
										<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
											<div class="od-certificate">
												<!-- Button trigger modal -->
												<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#certificateModal_<?php echo $cid?>">
													<div class="od-certificate-box">
													    <?php $default1 = get_stylesheet_directory_uri().'/assets/images/profile.png';
														$cimg = $ct->logo;
														$exp_img_url = $cimg ? $cimg : $default1; ?>
														<img src="<?php echo esc_url($cimg);?>" alt="Project" height="827" width="792" class="img-fluid">
														<div class="od-certificate-box-head">
															<h5><?php echo $ct->certificate_name;?></h5>
															<span><?php echo $ct->orgname;?></span>
														</div>
													</div>
												</button><!-- Modal -->
												<div class="modal fade" id="certificateModal_<?php echo $cid?>" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<!-- Logo -->
																<a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-header-logo" aria-label="Logo">
																	<?php																                $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
																	<img src="<?php echo esc_url($image[0]); ?>" alt="Onyx Data" class="img-fluid" width="70" height="100">
																	
																</a>
																<!-- Logo -->
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<div class="modal-profile">
																	<div class="od-profile">
																		<!-- <span>a</span> -->
																		<img class="od-profile ls-is-cached lazyloaded"  src="<?php echo esc_url($img_url); ?>">
																	</div>
																	<div class="od-profile-dis">
																	    <p><?php echo get_user_meta($user_id, 'first_name',true);?></p>
																		<h2 class="od-inner-title"><?php echo get_user_meta($user_id, 'iup_portfolio_tagline',true);?></h2>
																		<p class="od-profile-about"><?php echo get_user_meta($user_id, 'iup_portfolio_subtagline',true);?></p>
																	</div>
																</div>
																<div class="od-certificate-box">
																	<div class="od-certificate-box-head">
																		<h5><?php echo $ct->certificate_name;?></h5>
																		<span><?php echo $ct->orgname;?></span>
																	</div>
                                                                    <?php $defaultcertiimg = get_stylesheet_directory_uri().'/assets/images/profile.png';
                                                                    $certiimgg = $ct->certificate_img;
                                                                    $certi_img_url = $certiimgg ? $certiimgg : $defaultcertiimg; ?>
																	<img src="<?php echo esc_url($certi_img_url);?>" alt="Project" height="827" width="792" class="img-fluid">
																</div>
															</div>
															

														</div>
													</div>
												</div>
											</div>
										</div><?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Project -->
					<div class="od-profile-box profile-tabcontent" id="tab2">
						<div class="od-profile-box-list">
							<!-- project listing -->
							<div class="od-profile-box-list-content">
								<!-- <div class="input-group flex-nowrap">
									<span class="input-group-text" id="search">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
											<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
										</svg>
									</span> -->
									<!-- <input type="text" class="form-control" placeholder="Type something" aria-label="Search" aria-describedby="search"> -->
								</div>
								<div class="row">
                                    <?php $args = array(
                                    'posts_per_page' => 6,
                                    'offset' => 0,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post_type' => 'projects',
                                    'post_status' => 'publish',
                                    'author' => $user_id,
                                    'suppress_filters' => true,
                                    );
                                    $posts_array = get_posts($args);
                                    foreach ($posts_array as $service) { 
									$getlikes = $wpdb->get_results("select * from $likes_table where post_id= '$service->ID' AND reaction='1'");?>
									
									<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
										<a href="<?php echo get_permalink($service->ID); ?>">
											<div class="od-project-thumbnail">
												<img src="<?php echo get_post_meta($service->ID,'iup_pro_coverphoto',true);?>" alt="Project" height="366" width="512" class="img-fluid">
												<div class="od-project-thumbnail-like">
													<span class="od-btn">
													  <?php $view_html = kp_display_post_view_count($service->ID);
														echo $view_html;
													  ?>
													</span>
													<span class="od-btn">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
														</svg>
														<?php echo count($getlikes);?> Likes</span>
												</div>
												<div class="od-project-thumbnail-footer">
													<div class="od-project-thumbnail-footer-content">
														<div class="od-project-thumbnail-user">
															<span><?php echo substr($user->user_nicename,0,1);?></span>
															<div class="od-project-thumbnail-user-dis">
                                                            <p><a href="<?php echo get_permalink($service->ID); ?>" ><?php echo $service->post_title; ?></a></p>
															<p><?php echo $user->user_nicename;?></p>
															</div>
														</div>
														<div class="od-project-thumbnail-share">
															<div class="od-profile-share">

																<!-- Button trigger modal -->
																<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#shareModal">
																	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
																		<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
																	</svg>
																</button><!-- Modal -->
																<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered">
																		<div class="modal-content">
																			<div class="modal-header">
																				<div class="modal-header-head">
																					<a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-drawer-menu-logo">
																						<?php
																								                      $custom_logo_id = get_theme_mod('custom_logo');
																								                      $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
																						<img src="<?php echo esc_url($image[0]); ?>" class="img-fluid" alt="Onyx-data" width="70" height="100">
																					</a>
																					<div data-bs-dismiss="modal" aria-label="Close">
																						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg btn-close" viewBox="0 0 16 16">
																							<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
																						</svg>
																					</div>
																				</div>
																				<h1>We Can Simplify Your Data</h1>
																				<span class="od-btn">View my portfolio</span>
																			</div>
																			<div class="modal-body">
																				<div class="od-social-links">
																					<!-- facebook -->
																					<a href="#" class="od-social-links-icon">
																						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
																							<path d="M640 317.9C640 409.2 600.6 466.4 529.7 466.4C467.1 466.4 433.9 431.8 372.8 329.8L341.4 277.2C333.1 264.7 326.9 253 320.2 242.2C300.1 276 273.1 325.2 273.1 325.2C206.1 441.8 168.5 466.4 116.2 466.4C43.4 466.4 0 409.1 0 320.5C0 177.5 79.8 42.4 183.9 42.4C234.1 42.4 277.7 67.1 328.7 131.9C365.8 81.8 406.8 42.4 459.3 42.4C558.4 42.4 640 168.1 640 317.9H640zM287.4 192.2C244.5 130.1 216.5 111.7 183 111.7C121.1 111.7 69.2 217.8 69.2 321.7C69.2 370.2 87.7 397.4 118.8 397.4C149 397.4 167.8 378.4 222 293.6C222 293.6 246.7 254.5 287.4 192.2V192.2zM531.2 397.4C563.4 397.4 578.1 369.9 578.1 322.5C578.1 198.3 523.8 97.1 454.9 97.1C421.7 97.1 393.8 123 360 175.1C369.4 188.9 379.1 204.1 389.3 220.5L426.8 282.9C485.5 377 500.3 397.4 531.2 397.4L531.2 397.4z" />
																						</svg>
																					</a>
																					<!-- twitter -->
																					<a href="#" class="od-social-links-icon">
																						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
																							<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
																						</svg>
																					</a>
																					<!-- linkdin -->
																					<a href="#" class="od-social-links-icon">
																						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
																							<path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
																						</svg>
																					</a>
																					<!-- whatsapp -->
																					<a href="#" class="od-social-links-icon">
																						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
																							<path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
																						</svg>
																					</a>
																				</div>
																				<div class="od-profile-link">
																					<p></p>
																					<div class="od-profile-link-copy">
																						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
																							<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
																							<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
																						</svg>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<?php global $wpdb; $islike = '';
															$getpostslikes = $wpdb->get_results("select * from $likes_table where post_id= '$service->ID' AND user_id='$user_id' AND reaction='1'");
																
																if(!empty($getpostslikes)){
																	$islike = 'od-profile-liked';
																}
															?>
															<?php if ( is_user_logged_in() ) {  ?>
															<button type="button" id="Like_<?php echo $service->ID;?>" class="addpostsLikeUnlike od-profile-like <?php echo $islike;?>" data-id="<?php echo $service->ID;?>">
																<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M7.283 2.01135L7.99978 2.74816L8.71656 2.01135C10.4007 0.280124 13.4854 0.877623 14.5992 3.05271C15.123 4.07567 15.2408 5.55229 14.2853 7.43743C13.3651 9.25301 11.452 11.4264 7.99976 13.7946C4.54752 11.4266 2.63448 9.25336 1.71424 7.43785C0.758747 5.55277 0.876539 4.07611 1.40038 3.05307C2.51423 0.877776 5.59891 0.2802 7.283 2.01135Z" fill="black" stroke="#FF0000" stroke-width="2" />
																</svg>
															</button>
															<?php }else{ ?>
															<button type="button" class="od-profile-like" data-id="" data-bs-toggle="modal" data-bs-target="#LoginModal">
																<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M7.283 2.01135L7.99978 2.74816L8.71656 2.01135C10.4007 0.280124 13.4854 0.877623 14.5992 3.05271C15.123 4.07567 15.2408 5.55229 14.2853 7.43743C13.3651 9.25301 11.452 11.4264 7.99976 13.7946C4.54752 11.4266 2.63448 9.25336 1.71424 7.43785C0.758747 5.55277 0.876539 4.07611 1.40038 3.05307C2.51423 0.877776 5.59891 0.2802 7.283 2.01135Z" fill="black" stroke="#FF0000" stroke-width="2" />
																</svg>
															</button>
															<?php } ?>
															<!-- Add Project Edit/Delete -->
															<?php if ( is_user_logged_in() ) { 
															if($current_author->ID == $current_user_id ){ ?>
																<a href="<?php echo site_url().'/edit-project?id='.$service->ID;?>" class="btn" data-id="<?php echo $service->ID;?>" id="editProject">
																	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
																	<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
																	<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
																	</svg>
																</a>
																<button type="button" class="btn deleteProjects" data-id="<?php echo $service->ID;?>" id="">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
																<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
																</svg>
																</button>
															<?php } } ?>
															
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
									<?php } ?>
								</div>
							</div>
							<!-- create new project -->
							<div class="od-profile-box-list-content">
								<div class="od-create-project" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/create.png);">
									<div class="row">
										<div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
											<div class="od-create-project-text">
											    <?php echo get_field('portfolio_create_project_content', 'option');?>
												<?php if ( is_user_logged_in() ) {  ?>
												<a href="<?php echo site_url().'/create-project'?>" class="od-btn">Create a Project</a>
												<?php } else {?>
												<a href="#" class="od-btn" data-bs-toggle="modal" data-bs-target="#LoginModal">Create a Project</a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</main><!-- #site-content -->

<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
			        
				<div class="modal-header-head">
					<a href="<?php echo get_site_url('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="od-drawer-menu-logo">
						<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
						<img src="<?php echo esc_url($image[0]); ?>" class="img-fluid" alt="Onyx-data" width="70" height="100">
					</a>
					
				</div>
				<div data-bs-dismiss="modal" aria-label="Close">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg btn-close" viewBox="0 0 16 16">
						<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
					</svg>
				</div>
				
			</div>
			<div class="modal-body">
			    <div class="h-100 d-flex align-items-center justify-content-center">
				    <button class="btn od-btn w-100"><a href="#" class="od-btn-login">Join now !</a></button>
				</div>
				<div class="h-100 d-flex align-items-center justify-content-center">
				    Already a Member ?  <a href="#" class="od-btn-login">Sign in</a>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
.modal-profile .od-profile {
    width: 9.375rem;
    height: 9.375rem;
    border-radius: 100%;
    background-color: #1f273b;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<script>
// profile tab

var orgtabLinks = document.querySelectorAll(".profile-tablinks");
var orgtabContent = document.querySelectorAll(".profile-tabcontent");

orgtabLinks.forEach(function (el) {
  el.addEventListener("click", openTab);
});

function openTab(el) {
  var btnTarget = el.currentTarget;
  var tech = btnTarget.dataset.tech;

  orgtabContent.forEach(function (el) {
    el.classList.remove("is-active");
  });

  orgtabLinks.forEach(function (el) {
    el.classList.remove("is-active");
  });

  document.querySelector("#" + tech).classList.add("is-active");
  btnTarget.classList.add("is-active");
}


// // tab
</script>
<?php
get_footer();
