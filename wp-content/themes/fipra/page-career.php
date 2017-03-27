<?php
/**
 * The template for displaying all single posts.
 *
 * @package fipradotcom
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('inc/breadcrumbs'); ?>

<div id="content-container" class="with-border">

    <div id="site-content-container">

        <div id="site-content">

            <div id="primary" class="full-width careers-content-area">
                <main id="main" class="site-main" role="main">


                    <div class="row">
                        <div class="col-4-m">
                            <h1>Careers with Fipra</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porta dolor feugiat eleifend elementum. Nulla facilisi. Quisque a iaculis nisi. Phasellus et libero non quam tempor ullamcorper eu tristique risus. Nulla consequat volutpat augue a elementum.</p>

                            <hr/>

                            <h5>Connect with us</h5>
                            <ul class="sidebar-list no-bottom-margin no-bullet">
                                <li><a href="#"><i class="icon-twitter"></i> <strong class="black">Twitter</strong></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i> <strong class="black">LinkedIn</strong></a></li>
                            </ul>

                            <hr/>

                        </div>

                        <div class="col-8-m">
                            <h4>4 Jobs Available</h4>

                            <div class="job-listing-block">
                                <div class="row">
                                    <div class="col-8-m no-bottom-margin">
                                        <div class="job-listing-title"><a href="/job-listing">Account Executive</a></div>
                                        <div class="job-listing-meta">Fipra International | €25,000-€30,000 per annum</div>
                                    </div>
                                    <div class="col-4-m no-bottom-margin">
                                        <div class="job-listing-timestamp">Posted: <strong>30 April 2015</strong><br/>Closes: <strong>10 May 2015</strong></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="job-listing-overview">
                                        <p>This listing is stolen from the Uber site... This is a unique opportunity to be a founding member of the Uber for Business Sales organization. With this role, you’ll have the opportunity to join a small team that has the ability to make a big impact.</p>
                                        <p class="no-margin"><a href="#" class="btn btn-extra-small primary">Read more</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>






                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- #content -->

        <div class="full-width-block-container testimonial-container hide-s with-content-bar small-padding">
            <div class="full-width-block-content-container content-bar dark-grey">
                <div class="full-width-block-content">

                    <h5 class="center">Working for Fipra</h5>
                    <section id="testimonial-carousel" class="testimonial-group carousel">

                        <blockquote cite="http://test.com" class="testimonial">
                            <div class="quote">
                                "Vestibulum commodo nec ex id tempor. Etiam pulvinar dolor quis enim porttitor malesuada."
                            </div>
                            <footer class="author">
                                <!--                                <img src="--><?//= get_template_directory_uri(); ?><!--/img/fipriots/peter-carlo-lehrell_thumb.gif" alt="Peter-Carlo Lehrell" />-->
                                <div class="author-details">
                                    <span class="name">Author Name</span><br/>Position, Organisation</strong>
                                </div>
                            </footer>
                            <span class="triangle"></span>
                        </blockquote>
                        <blockquote cite="http://test.com" class="testimonial">
                            <div class="quote">
                                "Donec eu gravida est. Aliquam vulputate felis augue. Vestibulum commodo nec ex id tempor. Etiam pulvinar dolor quis enim porttitor malesuada."
                            </div>
                            <footer class="author">
                                <!--                                <img src="--><?//= get_template_directory_uri(); ?><!--/img/fipriots/peter-carlo-lehrell_thumb.gif" alt="Peter-Carlo Lehrell" />-->
                                <div class="author-details">
                                    <span class="name">Author Name</span><br/>Position, Organisation</strong>
                                </div>
                            </footer>
                            <span class="triangle"></span>
                        </blockquote>

                    </section>

                </div>

            </div>
        </div>
    </div>
</div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
