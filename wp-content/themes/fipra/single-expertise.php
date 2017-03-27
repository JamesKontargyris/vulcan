<?php
/**
 * The template for displaying expertise area pages.
 *
 * @package fipradotcom
 */

get_header(); ?>

<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $expertise_id = get_the_ID(); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>

    <?php include('inc/header_featured_image.php'); ?>

    <div id="content-container" class="expertise-area">

        <?php include('inc/hero_banner.php'); ?>

        <div id="site-content-container">

            <div id="site-content">

                <div id="primary">
                    <main id="main" class="site-main" role="main">

                        <?php the_content(); ?>


                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="secondary">

                    <?php require('inc/lead_contacts.php'); ?>

                    <?php $languages = get_field('languages');
                    if($languages): ?>

                        <aside>
                            <h5 id="languages">Languages</h5>
                            <ul class="languages-list no-bottom-margin no-bullet">
                                <?php foreach($languages as $language) : ?>
                                    <li><img src="<?= get_language_flag_url($language->term_id); ?>" class="languages-list-flag tooltip" alt="<?= $language->name; ?>" title="<?= $language->name; ?>"/></li>
                                <?php endforeach; ?>
                            </ul>
                        </aside>

                    <?php endif; ?>

                    <?php dynamic_sidebar('expertise-area'); ?>
                </div><!-- #secondary -->

            </div><!-- #content -->
        </div><!-- #site-content-container -->

        <!--            START: team-menu-container -->
        <?php $team = get_field('practice_staff'); ?>
        <?php if($team) : ?>
            <section id="team-menu-container" class="full-width-block-container">
                <div class="full-width-block-content-container light-grey">
                    <div class="full-width-block-content">
                        <h3 id="staff" class="upper small center">Practice Staff</h3>
                        <div id="our-team-carousel" class="team-carousel with-controls" data-number-of-items="<?php echo count($team); ?>">
                            <?php foreach($team as $fipriot) : ?>
                                <?php echo layout_fipriot_team_member($fipriot->ID, false, false, false); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!--            END: team-menu-container -->

        <?= page_testimonials(); ?>


    <?php endwhile; endif; ?>

</div><!-- #content-container   -->

<?php get_footer(); ?>
