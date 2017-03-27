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
                        <div class="col-6-m">
                            <h1>Contact Us</h1>
                            <p>Please contact us locally through the addresses and links on the country pages on this website to reach any of our offices or colleagues. Alternatively, complete and submit the contact form on this page.</p>

                            <p>For enquiries relating to our Brussels office, please contact Laura Batchelor, Director</p>
                            <p>Rue de la Loi 227 <br/>
                            1040 Brussels <br/>
                            Belgium <br/>
                            Tel.: +32 2 613 2828 <br/>
                            Fax: +32 2 613 2849 <br/>
                            <a href="http://maps.google.co.uk/maps?hl=en&q=rue%20de%20la%20loi%20227&um=1&ie=UTF-8&sa=N&tab=wl" target="_blank">Map</a></p>

                            <p>Centrally, all general mail and correspondence should be sent to Peter-Carlo Lehrell, Chairman, Fipra International Ltd. by email – or directly to the address below:</p>

                            <p>45 Moorfields <br/>
                            London EC2Y 9AE <br/>
                            England <br/>
                            Tel.:+44 207 251 3801 <br/>
                            Fax:+44 207 256 9552 <br/>
                                <a href="http://maps.google.co.uk/maps?q=EC2Y+9AE&oe=utf-8&client=firefox-a&ie=UTF8&gl=uk&ei=E1HTSv6IEZWv4QbT7YWoAw&ved=0CAgQ8gEwAA&hq=&hnear=London+EC2Y+9AE,+United+Kingdom&z=16" target="_blank">Map</a></p>

                            <hr/>

                            <h5>Careers</h5>
                            <p>Fipra looks to employ talented and driven people across our global network of offices. We are always interested in hearing from potential applicants and would ask you to send your CV/résumé submissions to your applicable city.</p>


                            <div class="hide-s">
                                <hr/>
                                <h5>Connect with us</h5>
                                <ul class="sidebar-list no-bottom-margin no-bullet">
                                    <a href="#" class="btn secondary"><i class="icon-twitter"></i> <strong class="black">Twitter</strong></a>
                                    <a href="#" class="btn secondary"><i class="icon-linkedin"></i> <strong class="black">LinkedIn</strong></a>
                                </ul>
                            </div>

                        </div>

                        <div class="col-6-m">
                            <form action="" class="contact-form with-border">
                                <h5>Make an Enquiry</h5>
                                <div class="form-group">
                                    <label for="name">Your name:</label>
                                    <input type="text" name="name" class="full-width"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your email address:</label>
                                    <input type="email" name="email" class="full-width"/>
                                </div>
                                <div class="form-group">
                                    <label for="subject">The nature of your enquiry:</label>
                                    <input type="text" name="subject" class="full-width"/>
                                </div>
                                <div class="form-group">
                                    <label for="message">Your enquiry:</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="full-width"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Submit Enquiry"/>
                                </div>
                            </form>
                        </div>
                    </div>






                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- #content -->

    </div>
</div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
