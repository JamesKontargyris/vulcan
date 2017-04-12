<div class="article-group article-group__most-recent active">
	<?php $articles = get_articles(get_option( 'posts_per_page' )); ?>
	<?php if($articles->have_posts()) : ?>
		<?php while($articles->have_posts()) : $articles->the_post(); ?>
			<?php include('article-extract.php'); ?>
		<?php endwhile; ?>
	<?php else : ?>
		No news at this time.
	<?php endif; ?>
</div>

<?php article_pagination($articles); ?>