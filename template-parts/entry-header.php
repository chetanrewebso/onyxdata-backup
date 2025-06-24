<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$entry_header_classes = '';

if (is_singular()) {
    $entry_header_classes .= ' header-footer-group est-inner-header';
}

?>

<div class="est-inner-header<?php echo esc_attr($entry_header_classes); ?>">
    <div class="container">

        <?php
        /**
         * Allow child themes and plugins to filter the display of the categories in the entry header.
         *
         * @since 1.0.0
         *
         * @param bool   Whether to show the categories in header, Default true.
         */
        $show_categories = apply_filters('twentytwenty_show_categories_in_entry_header', true);

        if (true === $show_categories && has_category()) {
        ?>

            <div class="entry-categories">
                <!-- <span class="screen-reader-text"><?php _e('Categories', 'twentytwenty'); ?></span> -->
                <div class="entry-categories-inner">
                    <!-- <?php the_category(' '); ?> -->
                </div><!-- .entry-categories-inner -->
            </div><!-- .entry-categories -->

        <?php
        }

        if (is_singular()) {
            the_title('<div class="est-inner-title">', '</div>'); ?>

            <div class="breadcrumbs onyx-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <ul>
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </ul>
            </div>
    </div>


<?php } else {
            the_title('<div class="est-inner-title"><a href="' . esc_url(get_permalink()) . '">', '</a></div>');
        }

        $intro_text_width = '';

        if (is_singular()) {
            $intro_text_width = ' small';
        } else {
            $intro_text_width = ' thin';
        }

        if (is_singular()) {
?>

    <div class="intro-text section-inner max-percentage<?php echo $intro_text_width; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output
                                                        ?>">
        <!-- <//?php the_content(); ?> -->
    </div>

<?php
        }

        // Default to displaying the post meta.
        // twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
?>

</div><!-- .entry-header-inner -->
</div><!-- .entry-header -->