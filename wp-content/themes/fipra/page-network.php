<?php
/**
 * The template for the 'Our Network' page.
 *
 * @package fipradotcom
 */


get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>

    <?php if(has_post_thumbnail()) : ?>
        <style>
            #hero {
                content:"";
                background:url('<?= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'banner' )[0]; ?>') <?= str_replace('_', ' ', get_field('bg_position')); ?> no-repeat;
                background-size:cover;
            }
        </style>
    <?php endif; ?>

    <div id="content-container">

        <div id="hero" class="full-width-block-container<?= has_post_thumbnail() ? ' with-content-bar' : ''; ?>">
<!--            Set the content block height using the header_text_block_height field. If a featured image is set, override this height with the content-bar class-->
            <div class="full-width-block-content-container <?= get_field('header_text_block_height'); ?> <?= has_post_thumbnail() ? 'content-bar bg-image' : ''; ?>  grey">
                <div class="full-width-block-content <?= get_field('header_text_location'); ?> narrow">
                    <h1 class="upper"><?php the_title(); ?></h1>
                    <p class="lead no-margin"><?= get_field('header_introduction'); ?></p>
                </div>
            </div>
        </div>

        <div id="site-content-container">

            <div id="site-content">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content">

                        <?php $full_width = get_field('page_layout') == 'full_width' ? 'full-width' : ''; ?>
                        <?php $left_sidebar = get_field('page_layout') == 'left_sidebar' ? 'left-sidebar' : ''; ?>

                        <div id="primary" class="<?= $full_width . ' ' . $left_sidebar; ?>">
                            <main id="main" class="site-main" role="main">
                                <?php get_template_part( 'content', 'our-network' ); ?>
                            </main><!-- #main -->
                        </div><!-- #primary -->

                        <?php if( get_field('page_layout') == 'left_sidebar' || get_field('page_layout') == 'right_sidebar') : ?>
                            <div id="secondary" class="<?= $left_sidebar; ?>">
                                <?php get_sidebar(); ?>
                            </div>
                        <?php endif; ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </div><!-- #site-content -->
        </div><!-- #site-content-container -->

    </div><!-- #content-container   -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
