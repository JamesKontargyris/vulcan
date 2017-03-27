<?php
/**
 * The template for displaying all single posts.
 *
 * @package fipradotcom
 */

get_header(); ?>

<div id="content-container" class="hero">

    <div id="content" class="site-content">

    <?php if ( has_post_thumbnail() ): ?>
        <div id="hero-banner">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


    <?php get_sidebar(); ?>

    </div><!-- #content -->
</div><!-- #content-container   -->

<?php get_footer(); ?>
