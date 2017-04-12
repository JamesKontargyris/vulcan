<?php
/**
 * @package fipradotcom
 */
?>

<div id="primary">
    <main id="main" class="site-main" role="main">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="article__meta">
                <?php if(get_field('author')) : ?>
                    by <?php echo get_field('author'); ?> |
                <?php endif; ?>
                Posted on <?php echo get_the_date('d M Y'); ?>
                <?php if(get_the_category()) : ?>
                    in <?php echo format_article_categories(get_the_category()); ?>
                <?php endif; ?>
            </div>

            <?php the_content(); ?>

            <?php if(format_article_tags()) : ?>
                <div class="article__tags">
                    <h6>Tags:</h6>
                    <?php echo format_article_tags(); ?>
                </div>
            <?php endif; ?>
        </article><!-- #post-## -->

    </main>
</div>

<div id="secondary" class="<?= $left_sidebar; ?>">
	<?php get_sidebar(); ?>
</div>
