<?php get_header(); ?>

    <div id="content-container" class="<?= str_replace(' ', '-', strtolower(get_the_title())); ?> with-border">

        <div id="site-content-container">

            <div id="site-content">

                <?php query_posts($query_string . '&showposts=9999'); ?>

                <?php if ( have_posts() ) : ?>

                    <div class="row">
                        <section class="search-header">
                            <h1 class="feature no-margin"><i class="icon-search"></i> Search Results</h1>
                            <h2 class="page-title feature"><?php printf( __( 'Searching for: %s', 'fipradotcom' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                            <?php
                                $num_results = get_search_results();
                            ?>
                            <h5>Found <?= $num_results ?> result(s)</h5>
<!--                            <hr />-->
                        </section>
                    </div>


                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="row">
                            <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'content', 'search' );
                            ?>
                        </div>

                    <?php endwhile; ?>

                    <?php  // the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>

            </div><!-- #site-content -->
        </div><!-- #site-content-container -->

    </div><!-- #content-container   -->

<?php get_footer(); ?>
