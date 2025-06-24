<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="onyx-inner entry-header">
        <div class="onyx-inner-header">
            <div class="container">
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
          <?php the_content();?>
      </div>
    </div>
</article>