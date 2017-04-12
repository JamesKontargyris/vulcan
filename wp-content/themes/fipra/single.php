<?php
/**
 * The template for displaying all single posts.
 *
 * @package fipradotcom
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

	<?php include('inc/hero_banner.php'); ?>

    <div id="content" class="site-content">

        <div id="site-content-container">

            <div id="site-content">

                <?php get_template_part( 'content', 'single' ); ?>

            </div>

        </div>

	</div><!-- #primary -->

    </div><!-- #content -->
</div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>

