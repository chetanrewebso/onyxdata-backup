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
$current_user_id = get_current_user_id();
$user=wp_get_current_user();
$id = $_GET['id'];
$content_post = get_post($id);
//echo "<pre>";print_r($content_post);
?>

<main id="site-content" role="main">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="onyx-inner entry-header" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/da_banner-scaled.jpg);">
			<div class="container">
				<div class="onyx-inner-header">

					<div class="breadcrumbs onyx-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<ul>
							<?php if (function_exists('bcn_display')) { bcn_display(); } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="entry-content">
			<div class="container">
			<div class="fixed-msg">
				<!-- <div class="alert alert-success d-flex align-items-center" id="success-alert" role="alert">
					<div id="messages_content"></div>
				</div> -->
			</div>
				<div class="od-create-project">
				<form class="form-horizontal form" id="userProjectsEditForm" method="POST" action="" enctype="multipart/form-data">
					<div class="row">
					     <input type="hidden" name="url" id="url" value="<?php echo site_url().'/author/'.$user->user_nicename;?>"/>
					     <input type="hidden" name="postid" value="<?php echo $id;?>" id="postid"/>
						 <?php $iup_pro_type = get_post_meta($id, 'iup_pro_type' ,true);
						//  echo $iup_pro_type;
						 if($iup_pro_type == "Power BI"){
							$pi = "active";
						 }
						 if($iup_pro_type == "Tableau"){
							$tb = "active";
						 }
						 if($iup_pro_type == "Excel"){
							$ex = "active";
						 }
						 ?>
						<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
							<button type="button" class="btn proType1 <?php echo $pi;?>" data-id="Power BI">
							    <input type="radio" name="iup_pro_type" value="Power BI" id="power" class="" style="visibility:hidden;"/>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/power.png" alt="Power" height="48" width="48" class="img-fluid">
								<span>Power BI</span>
							</button>
						</div>
						<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
							<button type="button" class="btn proType2 <?php echo $tb;?>" data-id="Tableau">
							    <input type="radio" name="iup_pro_type" value="Tableau" id="tab" class="d-none"/>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tableau.svg" alt="tableau" height="99" width="100" class="img-fluid">
								<span>Tableau</span>
							</button>
						</div>
						<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
							<button type="button" class="btn proType3 <?php echo $ex;?>" data-id="Excel">
							    <input type="radio" name="iup_pro_type" value="Excel" id="exl" class="d-none"/>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/excel1.png" alt="tableau" height="48" width="48" class="img-fluid">
								<span>Excel</span>
							</button>
						</div>
						
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<div class="form-title">
									<label for="emb_link" class="form-label">Embedded Link</label>
									<span>This is your report's public embedded link.</span>
								</div>
								<input type="text" value="<?php echo get_post_meta($id, 'iup_pro_emb_link' ,true);?>" name="iup_pro_emb_link" class="form-control" id="emb_link" required placeholder="Type in your Project's Embedded & Public Link">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<div class="form-title">
									<label for="title" class="form-label">Title</label>
									<span>Type a title that can descripe your projects in couple of words
									</span>
								</div>
								<input type="text" name="iup_pro_title" value= "<?php echo $content_post->post_title;?>" class="form-control" id="title" required placeholder="Type in your Project's Embedded & Public Link">
							</div>
						</div>
						<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<div class="form-title">
									<label for="coverphoto" class="form-label">
										Cover Photo
										<span>Update your Project's Cover Photo, the best aspect ratio is W= 510px : H= 365px</span>
										<div id="od-cover-img-preview" class="ratio ratio-1x1 ">
											<div class="od-img-preview-icon">
												Replace Cover Photo
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
												</svg>
											</div>
										</div>
										<input type="file" name="iup_pro_coverphoto" id="coverphoto" required accept="image/png,image/jpg,image/jpeg" data-max-size="3072" class="form-control  d-none placeholder-gray-500" placeholder="John" required>
									</label>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<div class="form-title">
									<label for="title" class="form-label">Overview</label>
									<span>Write an Overview for this project to give a centext for your project's audience
									</span>
								</div>
								<textarea class="form-control" name="iup_pro_overview" id="iup_pro_overview" required><?php echo get_post_meta($id,'iup_pro_overview', true);?></textarea>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<div class="form-title">
									<label for="v_over" class="form-label">Video Overveiew</label>
									<span>Create a YouTube video about your project and share it on your project's page.
									</span>
									<input type="text" name="iup_pro_video" value="<?php echo get_post_meta($id, 'iup_pro_video',true);?>" class="form-control" id="v_over" placeholder="Copy your YouTube video's URL and Paste it here">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group od-other-soft">
								<div class="form-title">
									<label for="v_over" class="form-label">Other software used in this Project</label>
									<span>Type a title that can descripe your projects in couple of words.
									</span>
								</div>

							</div>
							<div class="row">
							     <?php $iup_pro_software_used = get_post_meta($id, 'iup_pro_software_used' ,true);
								//  echo "<pre>";print_r(explode(",",$iup_pro_software_used));
								 $arr = explode(",",$iup_pro_software_used);
								//   echo "<pre>";print_r($arr);
								 if(in_array("Power BI",$arr)){
									$pb = "active";
									$chkd = "checked";
								 }
								 if(in_array("Adobe XD",$arr)){
									$pb1 = "active";
									$chkd1 = "checked";
								 }
								 if(in_array("Figma",$arr)){
									$pb2 = "active";
									$chkd2 = "checked";
								 }
								 if(in_array("Sql",$arr)){
									$pb3 = "active";
									$chkd3 = "checked";
								 }
								 if(in_array("Snowflake",$arr)){
									$pb4 = "active";
									$chkd4 = "checked";
								 }
								 if(in_array("PostgreSQL",$arr)){
									$pb5 = "active";
									$chkd5 = "checked";
								 }
								 ?>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
									<button type="button" class="btn software_used <?php echo $pb;?>">
										<input type="checkbox" name="iup_pro_software_used[]" value="Power BI" id="" class="d-none" <?php echo $chkd;?>/>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/power.png" alt="Power" height="48" width="48" class="img-fluid">
										<span>Power BI</span>
									</button>
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
									<button type="button" class="btn software_used <?php echo $pb1;?>">
									    <input type="checkbox" name="iup_pro_software_used[]" value="Adobe XD" id="" class="d-none" <?php echo $chkd1;?> />
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/xd.svg" alt="Xd" height="150" width="156" class="img-fluid">
										<span>Adobe XD</span>
									</button>
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
									<button type="button" class="btn software_used <?php echo $pb2;?>">
									    <input type="checkbox" name="iup_pro_software_used[]" value="Figma" id="" class="d-none" <?php echo $chkd2;?>/>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/figma.png" alt="Xd" height="48" width="48" class="img-fluid">
										<span>Figma</span>
									</button>
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
									<button type="button" class="btn software_used <?php echo $pb3;?>">
									    <input type="checkbox" name="iup_pro_software_used[]" value="Sql" id="" class="d-none" <?php echo $chkd3;?>/>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sql.png" alt="sql" height="48" width="36" class="img-fluid">
										<span>Sql</span>
									</button>
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
									<button type="button" class="btn software_used <?php echo $pb4;?>">
									    <input type="checkbox" name="iup_pro_software_used[]" value="Snowflake" id="" class="d-none" <?php echo $chkd4;?>/>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/snow.png" alt="snow" height="48" width="48" class="img-fluid">
										<span>Snowflake</span>
									</button>
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
									<button type="button" class="btn software_used <?php echo $pb5;?>">
									    <input type="checkbox" name="iup_pro_software_used[]" value="PostgreSQL" id="" class="d-none" <?php echo $chkd5;?>/>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/psql.png" alt="PostgreSQL" height="48" width="48" class="img-fluid">
										<span>PostgreSQL</span>
									</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="od-create-project-text" style="float:right;">
									<button type="button" class="od-btn od-create-btn" id="editProjects">Update Project</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</article>
</main><!-- #site-content -->
<style>
.od-create-btn {
	background-color: #ffc93c !important;
}
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