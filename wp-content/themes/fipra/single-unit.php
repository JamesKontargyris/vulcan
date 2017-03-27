<?php
/**
 * The template for displaying Units.
 *
 * @package fipradotcom
 */

get_header(); ?>

<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $unit_id = get_the_ID(); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>

    <?php include('inc/header_featured_image.php'); ?>

    <div id="content-container" class="unit">

        <?php include('inc/hero_banner.php'); ?>

        <?php if(get_field('is_under_construction')) : ?>

            <div class="full-width-block-container">
                <div class="full-width-block-content-container">
                    <div class="full-width-block-content narrow">
                        <div class="row">
                            <div class="col-12-m no-bottom-margin" style="text-align: center">

                                <img src="<?php echo get_template_directory_uri(); ?>/img/construction.png" alt="Construction Barrier" style="margin-bottom:10px;">
                                <h5 class="center no-bottom-margin">UNDER CONSTRUCTION</h5>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php else : ?>

            <div class="page-nav">
                <div class="row content-area">
                    <ul class="anchor-links-list no-margin no-bullet">
                        <li class="menu-title menu-title-toggle"><i class="icon-menu-1"></i> Jump to...</li>
                        <li class="hide-s"><a class="jump-to-link" href="#about-us">About Us <i class="icon-down-open"></i></a></li>
                        <li class="hide-s"><a class="jump-to-link" href="#our-location">Our Location <i class="icon-down-open"></i></a></li>
                        <?php if( get_field('team') ) : ?>
                            <li class="hide-s"><a class="jump-to-link" href="#our-team">Our Team <i class="icon-down-open"></i></a></li>
                        <?php endif; ?>
                        <li class="hide-s hide-m"><a class="jump-to-link" href="#get-in-touch">Contact <i class="icon-down-open"></i></a></li>
                    </ul>
                </div>
            </div>

            <div id="site-content-container">

                <div id="site-content">

                    <div id="primary">
                        <main id="main" class="site-main" role="main">

                            <h3 id="about-us">About Us</h3>

                            <?php if(get_field('translation_available')) : ?>
                                <h5 class="about-us-toggle">
                                    <a href="#" class="btn secondary btn-extra-small hide" id="view-original-about-us"><?php echo get_field('original_about_us_label'); ?></a> <a href="#" class="btn secondary btn-extra-small" id="view-translated-about-us"><?php echo get_field('translated_about_us_label'); ?></a>
                                </h5>
                            <?php endif; ?>

                            <div class="about-us-text">

                                <div class="original-about-us">
                                    <?php echo get_field('about_us'); ?>
                                </div>

                                <?php if(get_field('translation_available')) : ?>
                                    <div class="translated-about-us hide">
                                        <?php echo get_field('translated_about_us'); ?>
                                    </div>
                                <?php endif; ?>

                            </div>


                            <?php $location = get_field('office_location');
                            if(!empty($location)) : ?>

                                <section class="our-location">
                                    <h3 id="our-location">Our Location</h3>

                                    <div class="row">
                                        <div class="col-8-m">
                                            <!--Google Map-->
                                            <div class="google-map">
                                                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                            </div>
                                            <div class="google-map-missing">
                                                Ad-blocking software detected - it may be hiding the map above. Please disable any ad-blocking extensions or software for fipra.com.
                                            </div>
                                        </div>
                                        <div class="col-4-m">
                                            <address>
                                                <?= get_field('office_address'); ?>
                                            </address>

                                            <?php if( get_field('office_description') ) : ?>
                                                <p><em><?= get_field('office_description') ?></em></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </section>

                            <?php endif; ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->

                    <div id="secondary">

                        <?php require('inc/lead_contacts.php'); ?>

                        <?php dynamic_sidebar('unit'); ?>

                    </div><!-- #secondary -->

                </div><!-- #content -->


            </div><!-- #site-content-container -->

        <?php endif; ?>

    </div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
