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

    <div id="hero" class="full-width-block-container<?= has_post_thumbnail() ? ' with-content-bar' : ''; ?>">
        <!--            Set the content block height using the header_text_block_height field. If a featured image is set, override this height with the content-bar class-->
        <div class="full-width-block-content-container <?= get_field('header_text_block_height'); ?> <?= has_post_thumbnail() ? 'content-bar bg-image' : ''; ?>  grey">
            <div class="full-width-block-content <?= get_field('header_text_location'); ?> narrow">
                <h1 class="upper no-bottom-margin"><?php the_title(); ?></h1>
    <?php if(get_field('header_introduction')) : ?><p class="lead no-margin"><?= get_field('header_introduction'); ?></p></div><?php endif; ?>
            </div>
        </div>
    </div>

    <div id="site-content-container">

        <div id="site-content">

            <div id="primary" class="full-width narrow-column">
                <main id="main" class="site-main" role="main">

                    <ul class="article-tabs">
                       <li><a href="#" class="article-tabs__link article-tabs__link--most-recent active" data-article-group=".article-group__most-recent">Most Recent</a></li>
                       <li><a href="#" class="article-tabs__link article-tabs__link--news" data-article-group=".article-group__news">Fipra News</a></li>
                       <li><a href="#" class="article-tabs__link article-tabs__link--analysis" data-article-group=".article-group__analysis">Analysis</a></li>
                    </ul>

                    <div class="article-group article-group__most-recent active">
	                    <?php $articles = get_articles(get_option( 'posts_per_page' )); ?>
	                    <?php if($articles->have_posts()) : ?>
		                    <?php while($articles->have_posts()) : $articles->the_post(); ?>
			                    <?php include('inc/article-extract.php'); ?>
		                    <?php endwhile; ?>
	                    <?php else : ?>
                            No news or analysis at this time.
	                    <?php endif; ?>
                    </div>

                    <div class="article-group article-group__news">
		                <?php $articles = get_news_articles(get_option( 'posts_per_page' )); ?>
		                <?php if($articles->have_posts()) : ?>
			                <?php while($articles->have_posts()) : $articles->the_post(); ?>
				                <?php include('inc/article-extract.php'); ?>
			                <?php endwhile; ?>
		                <?php else : ?>
                            No news or analysis at this time.
		                <?php endif; ?>
                    </div>

                    <div class="article-group article-group__analysis">
		                <?php $articles = get_analysis_articles(get_option( 'posts_per_page' )); ?>
		                <?php if($articles->have_posts()) : ?>
			                <?php while($articles->have_posts()) : $articles->the_post(); ?>
				                <?php include('inc/article-extract.php'); ?>
			                <?php endwhile; ?>
		                <?php else : ?>
                            No news or analysis at this time.
		                <?php endif; ?>
                    </div>


                    <?php // article_pagination($articles); ?>

                    <div class="article-archive-button-container">
                        <a href="/news-and-analysis-archive" class="btn secondary btn-large article-archive-button">More Fipra news and analysis &rarr;</a>
                    </div>



                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- #content -->

    </div>
</div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
