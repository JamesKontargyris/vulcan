<?php get_header(); ?>

<div id="content-container">

    <!-- The Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php get_template_part('inc/breadcrumbs'); ?>

    <div id="site-content-container">

        <div id="site-content">


                <?php $post_id = get_the_ID(); ?>
                <?php if(! is_admin()) { setPostViews($post_id); } // add 1 to the post views for this article ?>

                <div id="primary">
                    <main id="main" class="site-main" role="main">

                        <h1 class="no-margin"><?php the_title(); ?></h1>
                        <div class="article__meta">
		                    <?php if(get_field('author')) : ?>
                                by <?php echo get_field('author'); ?> |
		                    <?php endif; ?>
                            Posted on <?php echo get_the_date('d M Y'); ?>
		                    <?php if(get_the_category()) : ?>
                                in <?php echo format_article_categories(get_the_category()); ?>
		                    <?php endif; ?>
                        </div>
	                    <?php if(has_post_thumbnail()) : ?>
                            <img class="article__image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'article'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
	                    <?php endif; ?>

                        <?php the_content(); ?>

<!--                        --><?php //if(format_article_tags()) : ?>
<!--                            <div class="article__tags">-->
<!--                                <h6>Tags:</h6>-->
<!--                                --><?php //echo format_article_tags(); ?>
<!--                            </div>-->
<!--                        --><?php //endif; ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="secondary">
                    <?php include('inc/sidebar_popular_articles.php'); ?>
                    <aside>
                        <h5>All Categories</h5>
	                    <?php wp_list_categories(['show_count' => 1, 'title_li' => '', 'style' => '']); ?>
                    </aside>
<!--                    <aside>-->
<!--                        <h5>All Tags</h5>-->
<!--		                --><?php //echo format_sidebar_tags(); ?>
<!--                    </aside>-->
                </div><!-- #secondary -->

        <?php endwhile; endif; ?>

        </div><!-- #content -->
    </div>
</div><!-- #content-container   -->

<?php get_footer(); ?>

<div id="modal">
    This pop-up will contain contact details for the relevant person.
</div>
