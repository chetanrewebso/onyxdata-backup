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


<main id="site-content" role="main">
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header">
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
      <div class="container">
           <div class="onyx-blog">
           <div class="row">

        <?php
        $archive_title    = '';
        $archive_subtitle = '';
        if ( is_search() ) {
            global $wp_query;

            $archive_title = sprintf(
                '%1$s %2$s',
                '<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
                '&ldquo;' . get_search_query() . '&rdquo;'
            );

            if ( $wp_query->found_posts ) {
                $archive_subtitle = sprintf(
                    /* translators: %s: Number of search results */
                    _n(
                        'We found %s result for your search.',
                        'We found %s results for your search.',
                        $wp_query->found_posts,
                        'twentytwenty'
                    ),
                    number_format_i18n( $wp_query->found_posts )
                );
            } else {
                $archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
            }
        } elseif ( ! is_home() ) {
            $archive_title    = get_the_archive_title();
            $archive_subtitle = get_the_archive_description();
        }
        if ( $archive_title || $archive_subtitle ) {
            ?>
            <?php
        }
        if ( have_posts() ) {
            $i = 0;
            while ( have_posts() ) {
			$i++;
			if ( $i > 1 ) {
			 ?>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                <?php the_post();?>
                <div class="onyx-blog-item">
                  <div class="onyx-blog-item-img">
                    <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
                    <img width="<?php echo $image_data[1]; ?>" height="<?php echo $image_data[2]; ?>" src="<?php echo $image_data[0]; ?>" class="img-fluid">
                  </div>
                  <div class="onyx-blog-item-content">
                    <h2 class="onyx-blog-item-content-title"><?php echo $post->post_title; ?></h2>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="readmorebtn">Read more</a>
                  </div>
                </div>
              </div>
 <?php }
	}
	} elseif ( is_search() ) {
		?>
		<?php
	}
?>
</div>
</div>
</div>
</div>
</article>
</main><!-- #site-content -->


<?php
get_footer();
