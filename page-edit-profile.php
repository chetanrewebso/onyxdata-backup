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
?>
<?php
$user_id = get_current_user_id();
$user=wp_get_current_user();
?>

<main id="site-content" role="main">
	<article <?php post_class(); ?> id="post-
		<?php the_ID(); ?>">
		<div class="onyx-inner entry-header" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg);">
			<div class="container">
				<div class="onyx-inner-header">

					<div class="breadcrumbs onyx-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<ul>
							<?php if (function_exists('bcn_display')) {
                bcn_display();
              } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="entry-content">
			<div class="fixed-msg">
				<!-- <div class="alert alert-success d-flex align-items-center" id="success-alert" role="alert">
					<div id="messages_content"></div>
				</div> -->
			</div>
			<div class="container">
				<div class="od-edit-profile">
					<div class="accordion" id="editprofileaccordion">
						<!-- Portfolio Url1 -->
						<form class="form-horizontal form" id="userprofileForm" method="POST" action="" enctype="multipart/form-data">
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
										<div class="accordion-header-inner">
											<h2>Portfolio's URL</h2>
											<p>A URL slug is the last part each of your portfolio's pages' URL that serves as a unique identifier of the page.</p>
										</div>
									</button>
								</h2>
								<div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show">
									<div class="accordion-body">
										<div class="user-url">
											<p>URL's Slug</p>
											<span>Update your portfolio's slug, make it short, make it relevant.</span>
										</div>
										<input type="text" class="form-control" value="<?php echo $user->user_nicename;?>" name="nicename" id="nicename">
										
										<div class="od-portfolio-url">
											<div class="od-portfolio-url-left">
												<span>Your OnyxData's Portfolio URL:</span>
												<span>
													<?php echo site_url().'/author/'.$user->user_nicename;?>
													
												</span>
											</div>
											<div class="od-portfolio-url-right">
												<button class="od-btn addUserprofile" type="button" id="">Save</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Username & Picture2 -->
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="true" aria-controls="panelsStayOpen-collapse2">
										<div class="accordion-header-inner">
											<h2>Username & Picture</h2>
											<p>Update your Username and Profile Picture.</p>
										</div>
									</button>
								</h2>
								<div id="panelsStayOpen-collapse2" class="accordion-collapse collapse show">
									<div class="accordion-body">

										<div class="od-user-profile-img">
											<div class="form-group">
												<label for="ProfileImg" class="form-label">
													<div id="od-img-preview" class="ratio ratio-1x1 ">
														<div class="od-img-preview-icon">
															<?php $loc_avatar = get_user_meta($user_id, 'simple_local_avatar', true);
													        $user_img_url = $loc_avatar ? $loc_avatar['full'] : get_stylesheet_directory_uri().'/assets/images/profile.png';?>
															<!-- <img class="img-fluid ls-is-cached lazyloaded" id="img_preview_teacher" src=""> -->
															<!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
															<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
															<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
														</svg> -->
															<img src="<?php echo esc_url($user_img_url); ?>" alt="Logo" height="512" width="512" class="img-fluid">
														</div>
													</div>
													<!-- <label class="form-label">Click the Picture to edit it</label> -->
													<input type="file" id="ProfileImg" name="ProfileImg" accept="image/png,image/jpg,image/jpeg" class="form-control  d-none placeholder-gray-500" required>
													Click the Picture to edit it
												</label>

											</div>
										</div>

										<div class="od-user-profile">
											<p>Username</p>
											<span>Your username will be publicly available, we recommend using your first and last name.
											</span>
										</div>
										<input type="text" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'first_name', true));?>" name="usernm" id="usernm">
										<div class="od-username-url"><button class="od-btn addUserprofile" id="addUserprofile11" type="button">Save</button></div>
										<!-- </form> -->
										<span id="usrreturn" style="color:green;"></span>
									</div>
								</div>
							</div>
							<!-- Portfolio Banner3 -->
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="true" aria-controls="panelsStayOpen-collapse3">
										<div class="accordion-header-inner">
											<h2>Portfolio's Banner</h2>
											<p>Update your portfolio's banner.</p>
										</div>
									</button>
								</h2>
								<div id="panelsStayOpen-collapse3" class="accordion-collapse collapse show">
									<div class="accordion-body">
										<div class="od-portfolio-banner">
											<?php $defaultbaner = get_stylesheet_directory_uri().'/assets/images/da_banner-scaled.jpg';
											$portbanner_avatar = get_user_meta($user_id, 'PortfolioImg', true);
											$banner_url = $portbanner_avatar ? $portbanner_avatar : $defaultbaner; ?>
											<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg" alt="Project" height="973" width="2560" class="img-fluid"> -->
											<img src="<?php echo esc_url($banner_url);?>" alt="Project" height="973" width="2560" class="img-fluid">
											<span>Your Current Portfolio Banner</span>
										</div>
										<div class="od-portfolio">
											<p>Portfolio's Banner</p>
											<span>Select one of onyxdata pre-designed Portfolio Banners or add your own.
											</span>
										</div>
										<div class="od-portfolio-banner-temp">
											<p>Onyxdata's Banners' Templates</p>
											<span>Select one of OnyxData pre-designed Portfolio Banners.
											</span>
										</div>
										<div class="od-portfolio-banner-temp-example">
											<div class="row">
											    <input type="hidden" name="defportbanner" id="defportbanner" value=""/>
												<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
													<div class="od-portfolio-banner-temp-example-img">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg" alt="Project" height="973" width="2560" class="img-fluid portBan">
													</div>
												</div>
												<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
													<div class="od-portfolio-banner-temp-example-img">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg" alt="Project" height="973" width="2560" class="img-fluid portBan">
													</div>
												</div>
											</div>
										</div>
										<div class="od-portfolio-banner-custom-temp">
											<p>Your Custom Banner's Template</p>
											<span>Select one of your Custom created Portfolio Banners.
											</span>
										</div>
										<div class="od-portfolio-banner-custom-temp-add">
											<div class="od-user-portfolio-img">
												<div class="form-group">
													<label for="PortfolioImg" class="form-label">
														<div id="od-banner-img-preview" class="ratio ratio-1x1 ">
															<div class="od-img-preview-icon">
																Add Custom banner
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
																	<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
																</svg>
															</div>
														</div>
														<input type="file" id="PortfolioImg" name="PortfolioImg" accept="image/png,image/jpg,image/jpeg" data-max-size="3072" class="form-control  d-none placeholder-gray-500" placeholder="John" required>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Portfolio thumbnail4 -->
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="true" aria-controls="panelsStayOpen-collapse4">
										<div class="accordion-header-inner">
											<h2>Portfolio's Thumbnail</h2>
											<p>Update your portfoliio's thumbnail.</p>
										</div>
									</button>
								</h2>
								<div id="panelsStayOpen-collapse4" class="accordion-collapse collapse show">
									<div class="accordion-body">
										<div class="od-portfolio-thumbnail">
											<?php $defaultthumb = get_stylesheet_directory_uri().'/assets/images/da_banner-scaled.jpg';
											$portthumb_avatar = get_user_meta($user_id, 'ThumbnailImg', true);
											$thumb_url = $portthumb_avatar ? $portthumb_avatar : $defaultthumb; ?>
											<img src="<?php echo esc_url($thumb_url);?>" alt="Project" height="973" width="2560" class="img-fluid">
											<span>Your Current Portfolio Thumbnail</span>
										</div>
										<div class="od-thumbnail">
											<p>Portfolio's Thumbnail</p>
											<span>Select one of onyxdata's pre-designed Portfolio Thumbnail or add your own.
											</span>
										</div>
										<div class="od-portfolio-thumbnail-temp">
											<p>Onyxdata's Thumbnail' Templates</p>
											<span>Select one of onyxdata's pre-designed Portfolio Thumbnail.
											</span>
										</div>
										<div class="od-portfolio-thumbnail-temp-example">
											<div class="row">
											    <input type="hidden" name="defportThumb" id="defportThumb" value=""/>
												<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
													<div class="od-portfolio-thumbnail-temp-example-img">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg" alt="Project" height="973" width="2560" class="img-fluid portThumb">
													</div>
												</div>
												<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
													<div class="od-portfolio-thumbnail-temp-example-img">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg" alt="Project" height="973" width="2560" class="img-fluid portThumb">
													</div>
												</div>

											</div>
										</div>
										<div class="od-portfolio-thumbnail-custom-temp">
											<p>Your Custom Portfolio's thumbnail</p>
											<span>Select one of your Custom created Portfolio Thumbnail.</span>
										</div>
										<div class="od-portfolio-thumbnail-custom-temp-add">
											<div class="od-user-thumbnail-img">
												<div class="form-group">
													<label for="ThumbnailImg" class="form-label">
														<div id="od-thumbnail-img-preview" class="ratio ratio-1x1 ">
															<div class="od-img-preview-icon">
																Add Custom thumbnail
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
																	<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
																</svg>
															</div>
														</div>
														<input type="file" id="ThumbnailImg" name="ThumbnailImg" accept="image/png,image/jpg,image/jpeg" data-max-size="3072" class="form-control  d-none placeholder-gray-500" required>
													</label>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Portfolio Tagline5 -->
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse5" aria-expanded="true" aria-controls="panelsStayOpen-collapse5">
										<div class="accordion-header-inner">
											<h2>Portfolio TagLine</h2>
											<p>Update your Portfolio Tagline.</p>
										</div>
									</button>
								</h2>
								<div id="panelsStayOpen-collapse5" class="accordion-collapse collapse show">
									<div class="accordion-body">
										<div class="od-user-portfolio">
											<p>Main Tagline</p>
											<span>Update your Portfolio's Main Tagline</span>
											<input type="text" class="form-control" id="iup_portfolio_tagline" name="iup_portfolio_tagline" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_portfolio_tagline', true));?>">
											<span>Maximum of 60 Characters</span>
										</div>
										<div class="od-user-portfolio">
											<p>Sub Tagline</p>
											<span>Update your Portfolio's Sub Tagline</span>
											<input type="text" class="form-control" id="iup_portfolio_subtagline" name="iup_portfolio_subtagline" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_portfolio_subtagline', true));?>">
											<span>Maximum of 50 Characters</span>
										</div>
										<div class="od-username-url"><button class="od-btn addUserprofile" type="button">Save</button></div>
									</div>
								</div>
							</div>
						</form>
						<!-- Portfolio Contact6 -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse6" aria-expanded="true" aria-controls="panelsStayOpen-collapse6">
									<div class="accordion-header-inner">
										<h2>Contact Info</h2>
										<p>Update your Social accounts' Links.</p>
									</div>
								</button>
							</h2>
							<div id="panelsStayOpen-collapse6" class="accordion-collapse collapse show">
								<div class="accordion-body">
									<div class="od-portfolio-contact">
										<p>Social Accounts</p>
										<span>Provide your Social Accounts' Links within your OnyxData Portfolio Publicly to let people know more about your or even Schedule meetings with you.</span>
									</div>
									<form class="od-portfolio-form">
										<div class="row">
											<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label for="linkdin" class="form-label"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
															<path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
														</svg>
														Linkedin</label>
													<span>Update your Portfolio's Main Tagline</span>
													<input type="text" placeholder="Update Your linkdin profile" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_con_linkdin', true));?>" id="iup_con_linkdin" name="iup_con_linkdin">
													<span class="od-input-msg">This info will be available Publicly on your OnyxData Portfolio</span>
												</div>
											</div>
											<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label for="git" class="form-label">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
															<path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8" />
														</svg>
														Github</label>
													<span>Update your Portfolio's Main Tagline</span>
													<input type="text" placeholder="Update Your github profile" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_con_github', true));?>" id="iup_con_github" name="iup_con_github">
													<span class="od-input-msg">This info will be available Publicly on your OnyxData Portfolio</span>
												</div>
											</div>
											<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label for="twitter" class="form-label">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
															<path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
														</svg>
														Twitter</label>
													<span>Update your Portfolio's Main Tagline</span>
													<input type="text" placeholder="Update Your twitter profile" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_con_twitter', true));?>" id="iup_con_twitter" name="iup_con_twitter">
													<span class="od-input-msg">This info will be available Publicly on your OnyxData Portfolio</span>
												</div>
											</div>
											<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label for="youtube" class="form-label">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
															<path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408z" />
														</svg>
														Youtube</label>
													<span>Update your Portfolio's Main Tagline</span>
													<input type="text" placeholder="Update Your youtube profile" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_con_youtube', true));?>" id="iup_con_youtube" name="iup_con_youtube">
													<span class="od-input-msg">This info will be available Publicly on your OnyxData Portfolio</span>
												</div>
											</div>
											<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label for="meta" class="form-label">
														<svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
															<path d="M640 317.9C640 409.2 600.6 466.4 529.7 466.4C467.1 466.4 433.9 431.8 372.8 329.8L341.4 277.2C333.1 264.7 326.9 253 320.2 242.2C300.1 276 273.1 325.2 273.1 325.2C206.1 441.8 168.5 466.4 116.2 466.4C43.4 466.4 0 409.1 0 320.5C0 177.5 79.8 42.4 183.9 42.4C234.1 42.4 277.7 67.1 328.7 131.9C365.8 81.8 406.8 42.4 459.3 42.4C558.4 42.4 640 168.1 640 317.9H640zM287.4 192.2C244.5 130.1 216.5 111.7 183 111.7C121.1 111.7 69.2 217.8 69.2 321.7C69.2 370.2 87.7 397.4 118.8 397.4C149 397.4 167.8 378.4 222 293.6C222 293.6 246.7 254.5 287.4 192.2V192.2zM531.2 397.4C563.4 397.4 578.1 369.9 578.1 322.5C578.1 198.3 523.8 97.1 454.9 97.1C421.7 97.1 393.8 123 360 175.1C369.4 188.9 379.1 204.1 389.3 220.5L426.8 282.9C485.5 377 500.3 397.4 531.2 397.4L531.2 397.4z" />
														</svg>
														Facebook</label>
													<span>Update your Portfolio's Main Tagline</span>
													<input type="text" placeholder="Update Your meta profile" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_con_meta', true));?>" id="iup_con_meta" name="iup_con_meta">
													<span class="od-input-msg">This info will be available Publicly on your OnyxData Portfolio</span>
												</div>
											</div>
											<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label for="tiktok" class="form-label">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
															<path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
														</svg>
														Tiktok</label>
													<span>Update your Portfolio's Main Tagline</span>
													<input type="text" placeholder="Update Your tiktok profile" class="form-control" value="<?php echo esc_attr(get_user_meta($user_id, 'iup_con_tiktok', true));?>" id="iup_con_tiktok" name="iup_con_tiktok">
													<span class="od-input-msg">This info will be available Publicly on your OnyxData Portfolio</span>
												</div>
											</div>
										</div>
									</form>
									<div class="od-username-url"><button class="od-btn" id="addContactInfo" type="button">Save</button></div>
									<span id="conreturn" style="color:green;"></span>
								</div>

							</div>
						</div>
						<!-- Portfolio About7 -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse7" aria-expanded="true" aria-controls="panelsStayOpen-collapse7">
									<div class="accordion-header-inner">
										<h2>About Me</h2>
										<p>This Section should briefly provide the reader with an answer to the question, “Why should we hire you?”.</p>
									</div>
								</button>
							</h2>
							<div id="panelsStayOpen-collapse7" class="accordion-collapse collapse show">
								<div class="accordion-body">
									<div class="od-user-about">
										<p>About Me</p>
										<span>Highlight who you are as a professional, describes your strengths and your professional accomplishments.
										</span>
									</div>
									<textarea class="form-control" name="iup_user_about" id="iup_user_about"><?php echo esc_attr(get_user_meta($user_id, 'iup_user_about', true));?></textarea>
									<span class="od-input-msg">Maximum of 500 Characters</span>
									<div class="od-username-url"><button class="od-btn" id="addAboutMe" type="button">Save</button></div>
									<span id="abtreturn" style="color:green;"></span>
								</div>
							</div>
						</div>
						<!-- Portfolio workexp8 -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse8" aria-expanded="true" aria-controls="panelsStayOpen-collapse8">
									<div class="accordion-header-inner">
										<h2>Work Experience</h2>
										<p>Add your Work Experiences.</p>
									</div>
								</button>
							</h2>
							<div id="panelsStayOpen-collapse8" class="accordion-collapse collapse show">
								<div class="accordion-body">
									<div class="od-user-work-exp">
										<p>Work Experiences</p>
										<span>Add New Work Experiences | Edit Existing Work Experience.</span>
									</div>
									<div class="row">
										<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
											<div class="od-user-work-exp-add">
												<!-- Button trigger modal -->
												<button type="button" class="od-btn btn od-add-exp" data-bs-toggle="modal" data-bs-target="#workexpModal">Add Work Experience
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
														<path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0M6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66m1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8M.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752m-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
													</svg>
												</button><!-- Modal -->
												<div class="modal fade" id="workexpModal" tabindex="-1" aria-labelledby="workexpModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<div class="modal-header-head">
																	<h3>Add New Work Experience</h3>
																	<span>Write a brief about One of your past work experiences</span>
																</div>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form class="form-horizontal form" id="userWorkExpForm" method="POST" action="" enctype="multipart/form-data">
																	<div class="row">
																		<div class="col-12">
																			<div class="row">
																				<div class="col-12">
																					<div class="od-user-profile-img">
																						<div class="form-group">
																							<label for="logoImg" class="form-label">
																								<div id="od-logoimg-preview" class="ratio ratio-1x1 ">
																									<div class="od-logoimg-preview-icon">
																										<!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
																								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
																								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
																							</svg> -->
																							    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/project.png" alt="Logo" height="512" width="512" class="img-fluid">
																									</div>
																								</div>
																								<input type="file" id="logoImg" name="logoImg" accept="image/png,image/jpg,image/jpeg" data-max-size="3072" class="form-control  d-none placeholder-gray-500" placeholder="John" required>
																								Click the Picture to edit it
																							</label>

																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-12">
																			<div class="od-working-exp">
																				<div class="form-check">
																					<input class="form-check-input" type="radio" name="flexRadioDefault" id="workexp">
																					<label class="form-check-label" for="workexp" name="workexp" id="workexp">
																						I am currently working here
																					</label>
																				</div>
																				<div class="row">
																					<div class="col-6">
																						<div class="form-group">
																							<label for="start_date" class="form-label">Start Date</label>
																							<input type="date" class="form-control" id="start_date" name="start_date">
																						</div>
																					</div>
																					<div class="col-6">
																						<div class="form-group" id="end_datedv">
																							<label for="end_date" class="form-label">End Date</label>
																							<input type="date" class="form-control" id="end_date" name="end_date">
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																			<div class="form-group">
																				<label class="form-label" for="c_name">Company Name</label>
																				<input type="text" class="form-control" placeholder="company name" id="company_name" name="company_name">
																			</div>
																		</div>
																		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																			<div class="form-group">
																				<label class="form-label" for="c_site">Company Website</label>
																				<input type="text" class="form-control" placeholder="company website" id="company_website" name="company_website">
																			</div>
																		</div>
																		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																			<div class="form-group">
																				<label class="form-label" for="roll_title">Roll Title</label>
																				<input type="text" class="form-control" placeholder="your roll title" id="role" name="role">
																			</div>
																		</div>
																		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																			<label class="form-label" for="roll_type">Roll Type</label>
																			<select class="form-select" aria-label="Default select example" id="role_type" name="role_type">
																				<option selected>Roll Type</option>
																				<option value="Full-Time">Full-Time</option>
																				<option value="Part-Time">Part-Time</option>
																				<option value="Contract">Contract</option>
																				<option value="Internship">Internship</option>
																			</select>
																		</div>
																		<div class="col-12">
																			<label class="form-label" for="roll_type">Work Location</label>
																			<select class="form-select" aria-label="Default select example" name="work_location" id="work_location">
																				<option selected value="">Work location</option>
																				<option value="Afghanistan">Afghanistan</option>
																				<option value="Albania">Albania</option>
																				<option value="Algeria">Algeria</option>
																				<option value="American Samoa">American Samoa</option>
																				<option value="Andorra">Andorra</option>
																				<option value="Angola">Angola</option>
																				<option value="Anguilla">Anguilla</option>
																				<option value="Antartica">Antarctica</option>
																				<option value="Antigua and Barbuda">Antigua and Barbuda</option>
																				<option value="Argentina">Argentina</option>
																				<option value="Armenia">Armenia</option>
																				<option value="Aruba">Aruba</option>
																				<option value="Australia">Australia</option>
																				<option value="Austria">Austria</option>
																				<option value="Azerbaijan">Azerbaijan</option>
																				<option value="Bahamas">Bahamas</option>
																				<option value="Bahrain">Bahrain</option>
																				<option value="Bangladesh">Bangladesh</option>
																				<option value="Barbados">Barbados</option>
																				<option value="Belarus">Belarus</option>
																				<option value="Belgium">Belgium</option>
																				<option value="Belize">Belize</option>
																				<option value="Benin">Benin</option>
																				<option value="Bermuda">Bermuda</option>
																				<option value="Bhutan">Bhutan</option>
																				<option value="Bolivia">Bolivia</option>
																				<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
																				<option value="Botswana">Botswana</option>
																				<option value="Bouvet Island">Bouvet Island</option>
																				<option value="Brazil">Brazil</option>
																				<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
																				<option value="Brunei Darussalam">Brunei Darussalam</option>
																				<option value="Bulgaria">Bulgaria</option>
																				<option value="Burkina Faso">Burkina Faso</option>
																				<option value="Burundi">Burundi</option>
																				<option value="Cambodia">Cambodia</option>
																				<option value="Cameroon">Cameroon</option>
																				<option value="Canada">Canada</option>
																				<option value="Cape Verde">Cape Verde</option>
																				<option value="Cayman Islands">Cayman Islands</option>
																				<option value="Central African Republic">Central African Republic</option>
																				<option value="Chad">Chad</option>
																				<option value="Chile">Chile</option>
																				<option value="China">China</option>
																				<option value="Christmas Island">Christmas Island</option>
																				<option value="Cocos Islands">Cocos (Keeling) Islands</option>
																				<option value="Colombia">Colombia</option>
																				<option value="Comoros">Comoros</option>
																				<option value="Congo">Congo</option>
																				<option value="Congo">Congo, the Democratic Republic of the</option>
																				<option value="Cook Islands">Cook Islands</option>
																				<option value="Costa Rica">Costa Rica</option>
																				<option value="Cota D'Ivoire">Cote d'Ivoire</option>
																				<option value="Croatia">Croatia (Hrvatska)</option>
																				<option value="Cuba">Cuba</option>
																				<option value="Cyprus">Cyprus</option>
																				<option value="Czech Republic">Czech Republic</option>
																				<option value="Denmark">Denmark</option>
																				<option value="Djibouti">Djibouti</option>
																				<option value="Dominica">Dominica</option>
																				<option value="Dominican Republic">Dominican Republic</option>
																				<option value="East Timor">East Timor</option>
																				<option value="Ecuador">Ecuador</option>
																				<option value="Egypt">Egypt</option>
																				<option value="El Salvador">El Salvador</option>
																				<option value="Equatorial Guinea">Equatorial Guinea</option>
																				<option value="Eritrea">Eritrea</option>
																				<option value="Estonia">Estonia</option>
																				<option value="Ethiopia">Ethiopia</option>
																				<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
																				<option value="Faroe Islands">Faroe Islands</option>
																				<option value="Fiji">Fiji</option>
																				<option value="Finland">Finland</option>
																				<option value="France">France</option>
																				<option value="France Metropolitan">France, Metropolitan</option>
																				<option value="French Guiana">French Guiana</option>
																				<option value="French Polynesia">French Polynesia</option>
																				<option value="French Southern Territories">French Southern Territories</option>
																				<option value="Gabon">Gabon</option>
																				<option value="Gambia">Gambia</option>
																				<option value="Georgia">Georgia</option>
																				<option value="Germany">Germany</option>
																				<option value="Ghana">Ghana</option>
																				<option value="Gibraltar">Gibraltar</option>
																				<option value="Greece">Greece</option>
																				<option value="Greenland">Greenland</option>
																				<option value="Grenada">Grenada</option>
																				<option value="Guadeloupe">Guadeloupe</option>
																				<option value="Guam">Guam</option>
																				<option value="Guatemala">Guatemala</option>
																				<option value="Guinea">Guinea</option>
																				<option value="Guinea-Bissau">Guinea-Bissau</option>
																				<option value="Guyana">Guyana</option>
																				<option value="Haiti">Haiti</option>
																				<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
																				<option value="Holy See">Holy See (Vatican City State)</option>
																				<option value="Honduras">Honduras</option>
																				<option value="Hong Kong">Hong Kong</option>
																				<option value="Hungary">Hungary</option>
																				<option value="Iceland">Iceland</option>
																				<option value="India">India</option>
																				<option value="Indonesia">Indonesia</option>
																				<option value="Iran">Iran (Islamic Republic of)</option>
																				<option value="Iraq">Iraq</option>
																				<option value="Ireland">Ireland</option>
																				<option value="Israel">Israel</option>
																				<option value="Italy">Italy</option>
																				<option value="Jamaica">Jamaica</option>
																				<option value="Japan">Japan</option>
																				<option value="Jordan">Jordan</option>
																				<option value="Kazakhstan">Kazakhstan</option>
																				<option value="Kenya">Kenya</option>
																				<option value="Kiribati">Kiribati</option>
																				<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
																				<option value="Korea">Korea, Republic of</option>
																				<option value="Kuwait">Kuwait</option>
																				<option value="Kyrgyzstan">Kyrgyzstan</option>
																				<option value="Lao">Lao People's Democratic Republic</option>
																				<option value="Latvia">Latvia</option>
																				<option value="Lebanon" selected>Lebanon</option>
																				<option value="Lesotho">Lesotho</option>
																				<option value="Liberia">Liberia</option>
																				<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
																				<option value="Liechtenstein">Liechtenstein</option>
																				<option value="Lithuania">Lithuania</option>
																				<option value="Luxembourg">Luxembourg</option>
																				<option value="Macau">Macau</option>
																				<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
																				<option value="Madagascar">Madagascar</option>
																				<option value="Malawi">Malawi</option>
																				<option value="Malaysia">Malaysia</option>
																				<option value="Maldives">Maldives</option>
																				<option value="Mali">Mali</option>
																				<option value="Malta">Malta</option>
																				<option value="Marshall Islands">Marshall Islands</option>
																				<option value="Martinique">Martinique</option>
																				<option value="Mauritania">Mauritania</option>
																				<option value="Mauritius">Mauritius</option>
																				<option value="Mayotte">Mayotte</option>
																				<option value="Mexico">Mexico</option>
																				<option value="Micronesia">Micronesia, Federated States of</option>
																				<option value="Moldova">Moldova, Republic of</option>
																				<option value="Monaco">Monaco</option>
																				<option value="Mongolia">Mongolia</option>
																				<option value="Montserrat">Montserrat</option>
																				<option value="Morocco">Morocco</option>
																				<option value="Mozambique">Mozambique</option>
																				<option value="Myanmar">Myanmar</option>
																				<option value="Namibia">Namibia</option>
																				<option value="Nauru">Nauru</option>
																				<option value="Nepal">Nepal</option>
																				<option value="Netherlands">Netherlands</option>
																				<option value="Netherlands Antilles">Netherlands Antilles</option>
																				<option value="New Caledonia">New Caledonia</option>
																				<option value="New Zealand">New Zealand</option>
																				<option value="Nicaragua">Nicaragua</option>
																				<option value="Niger">Niger</option>
																				<option value="Nigeria">Nigeria</option>
																				<option value="Niue">Niue</option>
																				<option value="Norfolk Island">Norfolk Island</option>
																				<option value="Northern Mariana Islands">Northern Mariana Islands</option>
																				<option value="Norway">Norway</option>
																				<option value="Oman">Oman</option>
																				<option value="Pakistan">Pakistan</option>
																				<option value="Palau">Palau</option>
																				<option value="Panama">Panama</option>
																				<option value="Papua New Guinea">Papua New Guinea</option>
																				<option value="Paraguay">Paraguay</option>
																				<option value="Peru">Peru</option>
																				<option value="Philippines">Philippines</option>
																				<option value="Pitcairn">Pitcairn</option>
																				<option value="Poland">Poland</option>
																				<option value="Portugal">Portugal</option>
																				<option value="Puerto Rico">Puerto Rico</option>
																				<option value="Qatar">Qatar</option>
																				<option value="Reunion">Reunion</option>
																				<option value="Romania">Romania</option>
																				<option value="Russia">Russian Federation</option>
																				<option value="Rwanda">Rwanda</option>
																				<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
																				<option value="Saint LUCIA">Saint LUCIA</option>
																				<option value="Saint Vincent">Saint Vincent and the Grenadines</option>
																				<option value="Samoa">Samoa</option>
																				<option value="San Marino">San Marino</option>
																				<option value="Sao Tome and Principe">Sao Tome and Principe</option>
																				<option value="Saudi Arabia">Saudi Arabia</option>
																				<option value="Senegal">Senegal</option>
																				<option value="Seychelles">Seychelles</option>
																				<option value="Sierra">Sierra Leone</option>
																				<option value="Singapore">Singapore</option>
																				<option value="Slovakia">Slovakia (Slovak Republic)</option>
																				<option value="Slovenia">Slovenia</option>
																				<option value="Solomon Islands">Solomon Islands</option>
																				<option value="Somalia">Somalia</option>
																				<option value="South Africa">South Africa</option>
																				<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
																				<option value="Span">Spain</option>
																				<option value="SriLanka">Sri Lanka</option>
																				<option value="St. Helena">St. Helena</option>
																				<option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
																				<option value="Sudan">Sudan</option>
																				<option value="Suriname">Suriname</option>
																				<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
																				<option value="Swaziland">Swaziland</option>
																				<option value="Sweden">Sweden</option>
																				<option value="Switzerland">Switzerland</option>
																				<option value="Syria">Syrian Arab Republic</option>
																				<option value="Taiwan">Taiwan, Province of China</option>
																				<option value="Tajikistan">Tajikistan</option>
																				<option value="Tanzania">Tanzania, United Republic of</option>
																				<option value="Thailand">Thailand</option>
																				<option value="Togo">Togo</option>
																				<option value="Tokelau">Tokelau</option>
																				<option value="Tonga">Tonga</option>
																				<option value="Trinidad and Tobago">Trinidad and Tobago</option>
																				<option value="Tunisia">Tunisia</option>
																				<option value="Turkey">Turkey</option>
																				<option value="Turkmenistan">Turkmenistan</option>
																				<option value="Turks and Caicos">Turks and Caicos Islands</option>
																				<option value="Tuvalu">Tuvalu</option>
																				<option value="Uganda">Uganda</option>
																				<option value="Ukraine">Ukraine</option>
																				<option value="United Arab Emirates">United Arab Emirates</option>
																				<option value="United Kingdom">United Kingdom</option>
																				<option value="United States">United States</option>
																				<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
																				<option value="Uruguay">Uruguay</option>
																				<option value="Uzbekistan">Uzbekistan</option>
																				<option value="Vanuatu">Vanuatu</option>
																				<option value="Venezuela">Venezuela</option>
																				<option value="Vietnam">Viet Nam</option>
																				<option value="Virgin Islands (British)">Virgin Islands (British)</option>
																				<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
																				<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
																				<option value="Western Sahara">Western Sahara</option>
																				<option value="Yemen">Yemen</option>
																				<option value="Serbia">Serbia</option>
																				<option value="Zambia">Zambia</option>
																			</select>
																		</div>
																		<div class="col-12">
																			<label class="form-label" for="accomplishments">Accomplishments:</label>
																			<textarea class="form-control" id="accomplishments" name="accomplishments"></textarea>
																		</div>
																		<div class="col-12">
																			<div class="od-btn-add-exp">
																				<button type="button" class="od-btn" id="addWorkexp">Add</button>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php $exp = get_WorksExp();
										foreach($exp as $ex){ $expid = $ex->id;
										?>
										<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ed_<?php echo $expid;?>">
											<!-- Button trigger modal -->
											<button type="button" class="od-btn btn od-exp-content" data-bs-toggle="modal" data-bs-target="#workexpcontentModal-<?php echo $expid;?>">
												<!-- <div class="od-exp-content"> -->
												<div class="od-exp-content-img">
													<?php $default = get_stylesheet_directory_uri().'/assets/images/profile.png';
													$wimg = $ex->company_logo;
													$exp_img_url = $wimg ? $wimg : $default; ?>
													<img src="<?php echo esc_url($exp_img_url); ?>" alt="Logo" height="512" width="512" class="img-fluid">
												</div>
												<div class="od-exp-content-details">
													<div class="od-exp-content-details-dis">
														<h4><?php echo $ex->role;?></h4>
														<div class="od-exp-details">
															<p><?php echo $ex->company_name;?></p>-<p><?php echo $ex->role_type;?></p>-<p><?php echo $ex->work_location;?></p>
														</div>
														<div class="od-exp-date">
														  <p><?php echo $ex->start_date;?></p>-<p><?php if(!empty($ex->end_date) || $ex->end_date!=''){ echo $ex->end_date; }else{ echo "Present";}?></p>
														</div>
													</div>
													<p><?php echo $val->accomplishments;?></p>
													<!-- <div class="od-exp-content-details-acco">
														<p>jhdsgfjdshrgfurejh</p>
													</div> -->
												</div>
												<!-- </div> -->
											</button>
											<div class="modal fade" id="workexpcontentModal-<?php echo $expid;?>" tabindex="-1" aria-labelledby="workexpcontentModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-header">
															<div class="modal-header-head">
																<h3>Edit Work Experience</h3>
																<span>Write a brief about One of your past work experiences</span>
															</div>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<?php $getExp = get_WorksExpById($expid);?>
															<form class="form-horizontal form" id="userWorkExpEditForm_<?php echo $expid;?>" method="POST" action="" enctype="multipart/form-data">
																<div class="row">
																	<input type="hidden" class="expid" name="expid" value="<?php echo $expid;?>"/>
																	<div class="col-12">
																		<div class="row">
																			<div class="col-12">
																				<div class="od-user-profile-img">
																					<div class="form-group">
																						<label for="logoImg" class="form-label">
																							<div id="od-logoimg-preview" class="ratio ratio-1x1 ">
																								<div class="od-logoimg-preview-icon">
																								<?php $default0 = get_stylesheet_directory_uri().'/assets/images/profile.png';
																								$wimg0 = $getExp->company_logo;
																								$exp_img_url0 = $wimg0 ? $wimg0 : $default0; ?>
																								<img src="<?php echo $exp_img_url0; ?>" id="img_preview_editexplogo"  alt="Logo" height="512" width="512" class="img-fluid">
																								</div>
																							</div>
																							<input type="file" class="edit-exp-logo form-control placeholder-gray-500 editlogoImg_<?php echo $expid;?>" name="editlogoImg"  accept="image/png,image/jpg,image/jpeg" data-max-size="3072"  required>
																							Click the Picture to edit it
																						</label>

																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="od-working-exp">
																			<div class="form-check">
																				<input class="form-check-input" type="radio" name="flexRadioDefault" id="workexp">
																				<label class="form-check-label" for="workexp" name="workexp" id="">
																					I am currently working here
																				</label>
																			</div>
																			<div class="row">
																				<div class="col-6">
																					<div class="form-group">
																						<label for="start_date" class="form-label">Start Date</label>
																						<input type="date" class="form-control" id="" name="start_date" value="<?php echo $getExp->start_date;?>">
																					</div>
																				</div>
																				<div class="col-6">
																					<div class="form-group">
																						<label for="end_date" class="form-label">End Date</label>
																						<input type="date" class="form-control" id="" name="end_date" value="<?php echo $getExp->end_date;?>">
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																		<div class="form-group">
																			<label class="form-label" for="c_name">Company Name</label>
																			<input type="text" class="form-control" placeholder="company name" id="" name="company_name" value="<?php echo $getExp->company_name;?>">
																		</div>
																	</div>
																	<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																		<div class="form-group">
																			<label class="form-label" for="c_site">Company Website</label>
																			<input type="text" class="form-control" placeholder="company website" id="" name="company_website" value="<?php echo $getExp->company_website;?>">
																		</div>
																	</div>
																	<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																		<div class="form-group">
																			<label class="form-label" for="roll_title">Roll Title</label>
																			<input type="text" class="form-control" placeholder="your roll title" id="" name="role" value="<?php echo $getExp->role;?>">
																		</div>
																	</div>
																	<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																		<label class="form-label" for="roll_type">Roll Type</label>
																		<select class="form-select" aria-label="Default select example" id="" name="role_type">
																			<option selected>Roll Type</option>
																			<option value="Full-Time" <?php if($getExp->role_type=="Full-Time"){ echo 'selected';}?>>Full-Time</option>
																			<option value="Part-Time" <?php if($getExp->role_type=="Part-Time"){ echo 'selected';}?>>Part-Time</option>
																			<option value="Contract" <?php if($getExp->role_type=="Contract"){ echo 'selected';}?>>Contract</option>
																			<option value="Internship" <?php if($getExp->role_type=="Internship"){ echo 'selected';}?>>Internship</option>
																		</select>
																	</div>
																	<div class="col-12">
																		<label class="form-label" for="roll_type">Work Location</label>
																		<select class="form-select" aria-label="Default select example" name="work_location" id="">
																			<option selected value="">Work location</option>
																			<?php $getcon = countryList();
																			foreach($getcon as $con){
																			?>
																			<option value="<?php echo $con;?>"<?php if($getExp->work_location==$con){?> selected <?php } ?>><?php echo $con;?></option>
																			<?php } ?>

																		</select>
																	</div>
																	<div class="col-12">
																		<label class="form-label" for="accomplishments">Accomplishments:</label>
																		<textarea class="form-control" id="" name="accomplishments"><?php echo $getExp->accomplishments;?></textarea>
																	</div>
																	<div class="col-12">
																		<div class="od-btn-edit-exp">
																			<button type="button" class="od-btn editWorkexp" data-id="<?php echo $expid;?>">Update</button>
																			<button type="button" class="od-btn deleteWorkexp" data-id="<?php echo $expid;?>">Delete</button>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<!-- Portfolio technical-skill9 -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse9" aria-expanded="true" aria-controls="panelsStayOpen-collapse9">
									<div class="accordion-header-inner">
										<h2>Technical Skills</h2>
										<p>List your Technical Skills | This should be General Technical skills (i.e. Business Intelligence, Project Management, Analuysis, etc.).</p>
									</div>
								</button>
							</h2>
							<div id="panelsStayOpen-collapse9" class="accordion-collapse collapse show">
								<div class="accordion-body">
									<div class="od-user-work-exp">
										<p>Technical Skills</p>
										<span>Add New Technical Skills | Edit Existing Technical Skills..</span>
									</div>
									<div class="row">
										<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
											<div class="od-user-skill-add">
												<!-- Button trigger modal -->
												<button type="button" class="od-btn btn od-add-skill" data-bs-toggle="modal" data-bs-target="#technicalModal">Add Your Skills
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
														<path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0M6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66m1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8M.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752m-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
													</svg>
												</button><!-- Modal -->
												<div class="modal fade" id="technicalModal" tabindex="-1" aria-labelledby="technicalModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<div class="modal-header-head">
																	<h3>Add New Technical Skill</h3>
																	<span>Add your Technical Skills and related accomplishments.</span>
																</div>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form class="form-horizontal form" id="userSkillsForm" method="POST" action="" enctype="multipart/form-data">
																	<div class="row">
																		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																			<div class="form-group">
																				<label class="form-label" for="skill_name">Skill Name:</label>
																				<input type="text" class="form-control" placeholder="Skill name" id="name" name="name">
																			</div>
																		</div>
																		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																			<div class="form-group">
																				<label class="form-label" for="skill_site">Skill Rating:</label>
																				<select class="form-select" aria-label="Default select example" id="rattings" name="rattings">
																					<option selected>Skill Rating</option>
																					<option value="Basic Knowledge">Basic Knowledge</option>
																					<option value="Limited Experience">Limited Experience</option>
																					<option value="Intermediate">Intermediate</option>
																					<option value="Advanced">Advanced</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-12">
																			<label class="form-label" for="accomplishments">Skill-related Accomplishment:</label>
																			<textarea class="form-control" id="skill_accomplishments" name="accomplishment"></textarea>
																		</div>
																		<div class="col-12">
																			<div class="od-btn-add-exp">
																				<button type="button" class="od-btn" id="addSkills">Add</button>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php $getskills = get_Skills(); 
										foreach($getskills as $v){ $ids = $v->id;
										?>
										<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
											<button type="button" class="od-btn btn od-edittechnical-box" data-bs-toggle="modal" data-bs-target="#edittechnicalModal_<?php echo $ids;?>">
												<!-- <div class="od-edittechnical-box"> -->
												<div class="od-edittechnical-box-head">
													<h5><?php echo $v->name;?></h5>
													<span><?php echo $v->rattings;?></span>
												</div>
												<p><?php echo substr($v->accomplishment,0,100);?>...</p>
												<!-- </div> -->
											</button>
											<div class="modal fade" id="edittechnicalModal_<?php echo $ids;?>" tabindex="-1" aria-labelledby="edittechnicalModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-header">
															<div class="modal-header-head">
																<h3>Edit Technical Skill</h3>
																<span>Add your Technical Skills and related accomplishments.</span>
															</div>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<?php $getsk = get_SkillsById($ids) ;?>
															<form class="form-horizontal form" id="userSkillsEditForm_<?php echo $ids;?>" method="POST" action="" enctype="multipart/form-data">
																<div class="row">
																	<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																		<div class="form-group">
																			<label class="form-label" for="skill_name">Skill Name:</label>
																			<input type="text" class="form-control" placeholder="Skill name" id="name" name="name" value="<?php echo $getsk->name;?>">
																		</div>
																	</div>
																	<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
																		<div class="form-group">
																			<label class="form-label" for="skill_site">Skill Rating:</label>
																			<select class="form-select" aria-label="Default select example" id="rattings" name="rattings">
																				<option value="">Skill Rating</option>
																				<option value="Basic Knowledge" <?php if($getsk->rattings == "Basic Knowledge"){?> selected <?php } ?>>Basic Knowledge</option>
																				<option value="Limited Experience" <?php if($getsk->rattings == "Limited Experience"){?> selected <?php } ?>>Limited Experience</option>
																				<option value="Intermediate" <?php if($getsk->rattings == "Intermediate"){?> selected <?php } ?>>Intermediate</option>
																				<option value="Advanced" <?php if($getsk->rattings == "Advanced"){?> selected <?php } ?>>Advanced</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-12">
																		<label class="form-label" for="accomplishments">Skill-related Accomplishment:</label>
																		<textarea class="form-control" id="skill_accomplishments" name="accomplishment"><?php echo $getsk->accomplishment;?></textarea>
																	</div>
																	<div class="col-12">
																		<div class="od-btn-edit-exp">
																			<button type="button" class="od-btn editSkills" data-id="<?php echo $ids;?>">Update</button>
																			<button type="button" class="od-btn deleteSkills" data-id="<?php echo $ids;?>">Delete</button>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div><?php } ?>
									</div>
								</div>
							</div>
						</div>
						<!-- Portfolio certificate10 -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse10" aria-expanded="true" aria-controls="panelsStayOpen-collapse10">
									<div class="accordion-header-inner">
										<h2>Certificates</h2>
										<p>List the Professional Certificates you have Acquired.</p>
									</div>
								</button>
							</h2>
							<div id="panelsStayOpen-collapse10" class="accordion-collapse collapse show">
								<div class="accordion-body">
									<div class="od-user-work-exp">
										<p>Certificates</p>
										<span>Add New Certificates | Edit or Delete Existing Certificates..</span>
									</div>
									<div class="row">
										<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
											<div class="od-user-work-exp-add">
												<!-- Button trigger modal -->
												<button type="button" class="od-btn btn od-add-exp" data-bs-toggle="modal" data-bs-target="#certificateModal">Edit Certificate
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
														<path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0M6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66m1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8M.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752m-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
													</svg>
												</button><!-- Modal -->
												<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<div class="modal-header-head">
																	<h3>Add New Certificate</h3>
																	<span>Add your Professional Business Intelligence Certificates.</span>
																</div>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form class="form-horizontal form" id="userCertiForm" method="POST" action="" enctype="multipart/form-data">
																	<div class="row">
																		<div class="col-12">
																			<div class="form-group">
																				<label for="logoImg" class="form-label">
																					<div id="od-logoimg-preview" class="ratio ratio-1x1 ">
																						<div class="od-logoimg-preview-icon">
																							<!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
																						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
																						<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
																					</svg> -->
																							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/project.png" alt="Logo" height="512" width="512" class="img-fluid">
																						</div>
																					</div>
																					<input type="file" id="logocerti" name="logocerti" accept="image/png,image/jpg,image/jpeg" data-max-size="3072" class="form-control placeholder-gray-500" required>
																					Click the Org's Logo to edit it
																				</label>

																			</div>
																		</div>
																		<div class="col-12">
																			<div class="form-group">
																				<label class="form-label" for="org_name">Issuing Organization's Name:</label>
																				<input type="text" class="form-control" placeholder="Issuing Organization's Name:" id="orgname" name="orgname">
																			</div>
																		</div>
																		<div class="col-12">
																			<label class="form-label" for="certificate">Certificate's Name:</label>
																			<textarea class="form-control" id="certificate_name" name="certificate_name"></textarea>
																		</div>
																		<div class="col-12">
																			<div class="od-user-certificate-img">
																				<div class="form-group">
																					<label for="certificateImg" class="form-label">Certificates Name:
																						<div id="od-certificate-preview" class="ratio ratio-1x1 ">
																							<div class="od-certificate-preview-icon">Add Certificate
																								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
																									<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
																								</svg>
																							</div>
																						</div>
																						<input type="file" id="certificateImg" name="certificateImg" accept="image/png,image/jpg,image/jpeg" data-max-size="3072" class="form-control  d-none placeholder-gray-500" placeholder="John" required>

																					</label>

																				</div>
																			</div>
																		</div>
																		<div class="col-12">
																			<div class="od-btn-add-exp">
																				<button type="button" class="od-btn" id="addCerti">Add</button>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php
										$getcerti = get_Certi();
										foreach($getcerti as $ce){ $ids = $ce->id;
										?>
										<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
											<div class="od-certificate">
												<!-- Button trigger modal -->
												<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editcertificateModal_<?php echo $ids;?>">
													<div class="od-certificate-box">
													    <?php $defaultcerti = get_stylesheet_directory_uri().'/assets/images/profile.png';
														$cimg = $ce->logo;
														$cet_img_url = $cimg ? $cimg : $defaultcerti; ?>
														<img src="<?php echo $cet_img_url;?>" alt="Project" height="827" width="792" class="img-fluid">
														<div class="od-certificate-box-head">
															<h5><?php echo $ce->certificate_name;?></h5>
															<span><?php echo $ce->orgname;?></span>
														</div>
													</div>
												</button><!-- Modal -->
												<div class="modal fade" id="editcertificateModal_<?php echo $ids;?>" tabindex="-1" aria-labelledby="editcertificateModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<div class="modal-header-head">
																	<h3>Edit Certificate</h3>
																	<span>Add your Professional Business Intelligence Certificates.</span>
																</div>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form class="form-horizontal form" id="userCertiEditForm_<?php echo $ids;?>" method="POST" action="" enctype="multipart/form-data">
																	<div class="row">
																		<div class="col-12">
																			<div class="form-group">
																				<label for="logoImg" class="form-label">
																					<div id="od-logoimg-preview" class="ratio ratio-1x1 ">
																						<div class="od-logoimg-preview-icon">
																							<img src="<?php echo $cet_img_url;?>" alt="Logo" height="512" width="512" class="img-fluid">
																						</div>
																					</div>
																					<!-- //edit-certificate-logo -->
																					<input type="file" class=" form-control placeholder-gray-500 editlogocerti_<?php echo $ids;?>" name="editlogocerti"  accept="image/png,image/jpg,image/jpeg" data-max-size="3072">

																				</label>

																			</div>
																		</div>
																		<div class="col-12">
																			<div class="form-group">
																				<label class="form-label" for="org_name">Issuing Organization's Name:</label>
																				<input type="text" class="form-control" placeholder="Issuing Organization's Name:" id="orgname" name="orgname" value="<?php echo $ce->orgname;?>">
																			</div>
																		</div>
																		<div class="col-12">
																			<label class="form-label" for="certificate">Certificate's Name:</label>
																			<textarea class="form-control" id="certificate_name" name="certificate_name"><?php echo $ce->certificate_name;?></textarea>
																		</div>
																		<div class="col-12">
																			<div class="od-user-editcertificate-img">
																				<div class="form-group">
																					<label for="certificateImg" class="form-label">Certificates Name:
																						<div id="od-editcertificate-preview" class="ratio ratio-1x1 ">
																							<div class="od-certificate-preview-icon">Add Certificate
																								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
																									<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
																								</svg>
																							</div>
																						</div>
																						<!-- edit-certificate-img -->
																						<input type="file" class="form-control  placeholder-gray-500 editcertificateImg_<?php echo $ids;?>"  name="editcertificateImg" accept="image/png,image/jpg,image/jpeg" data-max-size="3072" placeholder="John" required>

																					</label>

																				</div>
																			</div>
																		</div>
																		<div class="col-12">
																			<div class="od-btn-edit-certificate">
																				<button type="button" class="od-btn editCerti" data-id="<?php echo $ids;?>">Update</button>
																				<button type="button" class="od-btn deleteCerti" data-id="<?php echo $ids;?>">Delete</button>
																			</div>
																		</div>
																	</div>
																</form>
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
</main><!-- #site-content -->
<style>
	.fixed-msg {
		position: fixed;
		top: 34px;
		z-index: 9999;
		right: 0;
		width: 100%;
	}
</style>

<?php
get_footer();