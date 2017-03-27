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

            <div id="primary">
                <main id="main" class="site-main" role="main">

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

					<?php article_pagination($articles); ?>

                </main><!-- #main -->
            </div><!-- #primary -->
            <div id="secondary">
                <aside>
                    <h5>Popular Articles</h5>
					<?php $popular_articles = get_popular_articles(3); ?>
					<?php if($popular_articles->have_posts()) : ?>
						<?php while($popular_articles->have_posts()) : $popular_articles->the_post(); ?>
                            <div class="sidebar-article-extract">
								<?php if(has_post_thumbnail()) : ?>
                                    <a href="<?php echo get_the_permalink(); ?>"><img class="sidebar-article-extract__image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'article'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a>
								<?php endif; ?>
                                <div class="sidebar-article-extract__headline"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></div>
                                <div class="sidebar-article-extract__meta">
									<?php echo get_the_date('d M Y'); ?>
                                </div>
                            </div>
						<?php endwhile; ?>
					<?php else : ?>
                        No articles to display.
					<?php endif; ?>
                </aside>
                <aside>
                    <h5>Categories</h5>
                    <ul class="taxonomy-list no-bottom-margin">
						<?php wp_list_categories(['show_count' => 1, 'title_li' => '', 'orderby' => 'name']); ?>
                    </ul>
                </aside>
                <aside>
                    <h5>Tags</h5>
					<?php echo format_sidebar_tags(); ?>
                </aside>
            </div>

        </div><!-- #content -->

    </div>
</div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
