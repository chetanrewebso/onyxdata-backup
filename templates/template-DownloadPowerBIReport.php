<?php

/**
 * Template Name: Download Power BI Report
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header(); ?>
<?php
$power_bi_report_templates = get_field('power_bi_report_templates');
$template_url = $power_bi_report_templates['url'];
if (isset($_POST['downloadReportBtn'])) {
    $first_name = $_POST['first_name'];
    $email_address = $_POST['email_address'];

    $report_table    =    $wpdb->prefix . 'download_bi_report_user';
    $table_data = array(
        'first_name' => $first_name,
        'email_address' => $email_address,
    );
    $ins = $wpdb->insert($report_table, $table_data);
    // header('Location: "'.$template_url.'"');

    header('Content-Type: application/vnd.ms-powerpoint');
    header('Content-Disposition: attachment; filename="OnyxData-PowerBIBackgroundTemplate.pptx"');
    readfile($template_url);
}

?>
<main id="site-content" role="main">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <div class="onyx-inner entry-header">
            <div class="container">
                <div class="onyx-inner-header">
                    <!-- <h1 class="onyx-inner-title"><?php echo $post->post_title; ?></h1> -->
                    <h1 class="onyx-inner-title"><?php echo $post->post_title; ?></h1>
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
            <div class="container">
                <div class="onyx-download-template">
                    <div class="row">
                        <?php if (have_rows('report_images')) : ?>
                            <?php while (have_rows('report_images')) : the_row();
                                $image = get_sub_field('image');
                            ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="onyx-datadownload-content-image">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="onyx-download-template-discription">
                                <?php echo $post->post_content; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="onyx-download-template-form">
                                <form name="downloadReport" id="downloadReport" method="post" action="">
                                    <div class="form-group">
                                        <label for="onyx-d-name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="onyx-d-name" name="first_name" placeholder="John Deo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="onyx-d-email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="onyx-d-email" name="email_address" placeholder="johndeo@gmail.com" required>
                                    </div>
                                    <?php
                                    $link = get_field('download_link');
                                    // if( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <input type="button" class="onyx-btn onyx-btn-primary" id="submitDemo" name="downloadReportBtn" value="Download">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
            jQuery(document).ready(function() {
                jQuery('#submitDemo').click(function() {
                    // alert('kk');
                var url = '<?php echo esc_url($link_url) ?>';
                window.location.href = url;

                });
            });
        </script>
    </article>
</main>


<?php get_footer(); ?>