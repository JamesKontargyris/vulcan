<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package fipradotcom
 */

get_header(); ?>

<div id="content-container" class="with-border">

	<div id="site-content-container">

		<div id="site-content">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'Sorry, that page can&rsquo;t be found.', 'fipradotcom' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php _e( 'Please use the site navigation and/or search tools above, or go back to the home page.', 'fipradotcom' ); ?></p>

							<p><a href="/" class="btn primary">Back to home page</a></p>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->

		</div>

	</div>

</div>

<?php get_footer(); ?>
