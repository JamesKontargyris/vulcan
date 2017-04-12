<aside>
	<h5>Popular Stories</h5>
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