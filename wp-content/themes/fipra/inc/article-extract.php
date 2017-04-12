<div class="article-extract">

	<div class="article-extract__section">
		<?php if(has_post_thumbnail()) : ?>
			<a href="<?php echo get_the_permalink(); ?>"><img class="article-extract__image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'article'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a>
		<?php endif; ?>
	</div>

	<div class="article-extract__section">

		<h4 class="article-extract__headline"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="article-extract__meta">

			<?php if(get_field('author')) : ?>
                by <?php echo get_field('author'); ?> |
			<?php endif; ?>
            Posted on <?php echo get_the_date('d M Y'); ?>
			<?php if(get_the_category()) : ?>
                in <?php echo format_article_categories(get_the_category()); ?>
			<?php endif; ?>

        </div>
		<p class="article-extract__text"><?php echo get_the_excerpt(); ?> <a class="article-extract__read-more" href="<?php echo get_the_permalink(); ?>">Read&nbsp;more...</a></p>

	</div>

</div>