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

                        <div class="article-extract__type-container">
		                    <?php if(get_field('article_type') == 'news') : ?>
                                <img class="article-extract__type-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-newspaper.png" alt=""> <span class="article-extract__type--news">Fipra News</span>
		                    <?php elseif(get_field('article_type') == 'analysis') : ?>
                                <img class="article-extract__type-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-magnifying-glass.png" alt=""> <span class="article-extract__type--analysis">Analysis</span>
		                    <?php endif; ?>
                        </div>

                        <h1 class="no-margin"><?php the_title(); ?></h1>
                        <div class="article__meta">
		                    <?php if(get_field('author')) : ?>
                                by <a href="<?php echo get_the_permalink(get_field('author')[0]); ?>"><strong><?php echo get_the_title(get_field('author')[0]); ?></a></strong> |
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

                        <?php if(format_article_tags()) : ?>
                            <div class="article__tags">
                                <h6>Tags:</h6>
                                <?php echo format_article_tags(); ?>
                            </div>
                        <?php endif; ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="secondary">
                    <aside>
                        <h5><img class="article-extract__type-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-newspaper.png" alt=""> More in <span class="text--turquoise text--bold">Fipra News</span></h5>

	                    <?php $more_news_articles = get_news_articles(3, [get_the_ID()]); ?>
	                    <?php if($more_news_articles->have_posts()) : ?>
		                    <?php while($more_news_articles->have_posts()) : $more_news_articles->the_post(); ?>
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
                            No more news at this time.
	                    <?php endif; ?>

                    </aside>
                    <aside>
                        <h5><img class="article-extract__type-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-magnifying-glass.png" alt=""> More in <span class="text--orange text--bold">Analysis</span></h5>

	                    <?php $more_analysis_articles = get_analysis_articles(3, [get_the_ID()]); ?>
	                    <?php if($more_analysis_articles->have_posts()) : ?>
		                    <?php while($more_analysis_articles->have_posts()) : $more_analysis_articles->the_post(); ?>
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
                            No more analysis at this time.
	                    <?php endif; ?>
                    </aside>
                    <aside>
                        <h5>All Categories</h5>
                        <ul class="taxonomy-list no-bottom-margin">
			                <?php wp_list_categories(['show_count' => 1, 'title_li' => '']); ?>
                        </ul>
                    </aside>
                    <aside>
                        <h5>All Tags</h5>
		                <?php echo format_sidebar_tags(); ?>
                    </aside>
                </div><!-- #secondary -->

        <?php endwhile; endif; ?>

        </div><!-- #content -->
    </div>
</div><!-- #content-container   -->

<?php get_footer(); ?>

<div id="modal">
    This pop-up will contain contact details for the relevant person.
</div>
