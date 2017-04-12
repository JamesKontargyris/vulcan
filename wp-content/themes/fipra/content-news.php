<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package fipradotcom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(get_the_content()) : ?>
        <div class="row">
            <div class="col-12">
				<?php the_content(); ?>
            </div>
        </div>
	<?php endif; ?>

	<?php if(get_field('page_layout') != 'page_width') : ?>

        <div class="entry-content">

            <?php $full_width = get_field('page_layout') == 'full_width' ? 'full-width' : ''; ?>
            <?php $left_sidebar = get_field('page_layout') == 'left_sidebar' ? 'left-sidebar' : ''; ?>

            <div id="primary" class="<?= $full_width . ' ' . $left_sidebar; ?>">
                <main id="main" class="site-main" role="main">
	                <?php include('inc/article_group.php'); ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <?php if( get_field('page_layout') == 'left_sidebar' || get_field('page_layout') == 'right_sidebar') : ?>
                <div id="secondary" class="<?= $left_sidebar; ?>">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div><!-- .entry-content -->

    <?php else : ?>

        <main id="main" class="site-main" role="main">
	        <?php include('inc/article_group.php'); ?>
        </main><!-- #main -->

    <?php endif; ?>

	<footer class="entry-footer">
<!--		--><?php //edit_post_link( __( 'Edit', 'fipradotcom' ), '<span class="edit-link btn btn-small secondary">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
