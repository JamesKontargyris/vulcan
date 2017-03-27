<div class="article-extract">

	<div class="article-extract__section">
		<?php if(has_post_thumbnail()) : ?>
			<a href="<?php echo get_the_permalink(); ?>"><img class="article-extract__image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'article'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a>
		<?php endif; ?>
	</div>

	<div class="article-extract__section">

		<div class="article-extract__type-container">
			<?php if(get_field('article_type') == 'news') : ?>
				<img class="article-extract__type-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-newspaper.png" alt=""> <span class="article-extract__type--news">Fipra News</span>
			<?php elseif(get_field('article_type') == 'analysis') : ?>
				<img class="article-extract__type-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-magnifying-glass.png" alt=""> <span class="article-extract__type--analysis">Analysis</span>
			<?php endif; ?>
		</div>

		<h2 class="article-extract__headline"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="article-extract__text"><?php echo get_the_excerpt(); ?> <a class="article-extract__read-more" href="<?php echo get_the_permalink(); ?>">Read&nbsp;more...</a></p>

		<div class="article-extract__meta">

			<?php if(get_field('author')) : ?>
				by <a href="<?php echo get_the_permalink(get_field('author')[0]); ?>"><strong><?php echo get_the_title(get_field('author')[0]); ?></a></strong> |
			<?php endif; ?>
			Posted on <?php echo get_the_date('d M Y'); ?>
			<?php if(get_the_category()) : ?>
				in <?php echo format_article_categories(get_the_category()); ?>
			<?php endif; ?>

		</div>
	</div>

</div>