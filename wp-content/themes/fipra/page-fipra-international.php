<?php
/**
 * The template for displaying the Our People page.
 *
 * @package fipradotcom
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>

    <?php include('inc/header_featured_image.php'); ?>

    <div id="content-container" class="our-people">

        <?php include('inc/hero_banner.php'); ?>

        <?php the_content(); ?>

        <?php $international_unit_id = get_id_by_slug('international', 'unit') ? get_id_by_slug('international', 'unit') : 0; // get the ID of the Fipra International unit post type based on the 'international' slug ?>
        <?php $fipriots = get_field('people'); // get all Fipriots assigned to Fipra International ?>
        <?php $filter_group = 'fipra_international_profiles'; // used by our_people_filters.php to show the correct filters for the page ?>

        <?php include('inc/our_people_filters.php'); ?>

        <div id="site-content-container">

            <div id="site-content">

                <div id="primary" class="full-width">

                    <main id="main" class="site-main" role="main">
                        <?php print_r(get_field('people')); ?>

                        <a href="#page" class="button-back-to-top jump-to-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" width="12" height="12"> Top</a>

                        <?php if ( count( $fipriots ) >= 1 ) : ?>

                            <!--                    Used by jQuery to update filtering-on-title when clear filter button is clicked -->
                            <div class="hide-s hide-m number-of-fipriots"><?php echo count($fipriots); ?></div>
                            <div class="hide-s hide-m fipriot-type">Fipriot</div>

                            <div class="filtering-on-container">
                                <h4 class="no-margin filtering-on-title">
                                    <?php // echo 'Showing ' . $fipriots->found_posts > 1 ? $fipriots->found_posts . ' Fipriots' : $fipriots->found_posts . ' Fipriot' ; ?>
                                </h4>
                                <a href="#" class="btn btn-small secondary clear-filter hide"><i class="icon-cancel-1"></i> Clear Filter</a>
                            </div>


                            <div class="people-group-container">

                                <div class="people-group">

                                    <?php foreach($fipriots as $fipriot) : // loop through array of Fipriot IDs ?>

                                        <?php $post_id = $fipriot; ?>

                                        <?php
//                                        Assign variables
                                            $first_name = get_field('first_name', $post_id); $last_name = get_field('last_name', $post_id); $position = get_field('position', $post_id); $additional_position_info = get_field('additional_position_info', $post_id);
                                        ?>

                                        <div id="surname-<?php echo substr($last_name, 0, 1); ?>" class="person <?php echo ' surname-' . substr($last_name, 0, 1); ?>">
                                            <div class="person-profile-photo">
                                                <a href="<?php echo get_the_permalink($post_id); ?>">
                                                    <?php if ( has_post_thumbnail($post_id) ) : ?>
                                                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo $first_name; ?> <?php echo $last_name; ?>" title="<?php echo $first_name; ?> <?php echo $last_name; ?>" class="photo-tile" />
                                                    <?php else : ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blank_profile_<?php echo get_field('gender', $post_id); ?>.png" alt="<?php echo $first_name; ?> <?php echo $last_name; ?>" title="<?php echo $first_name; ?> <?php echo $last_name; ?>" class="photo-tile" />
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="person-details">
                                                <h4 class="no-margin"><a href="<?php echo get_the_permalink(); ?>"><?php echo $first_name; ?> <?php echo $last_name; ?></a></h4>

                                                <h6>
                                                    <?php
                                                        echo $position;
                                                        if($position && $additional_position_info) { echo '; '; }
                                                        if($additional_position_info) { echo $additional_position_info; }
                                                    ?>
                                                </h6>

                                                <div class="btn-container">
                                                    <a href="<?php echo get_the_permalink($post_id); ?>" class="btn">
                                                        <div class="btn-text"><i class="icon-right-circle-1"></i></div>
                                                    </a>
                                                </div>
                                                <div class="person-contact-details">
                                                    <table class="no-style" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <?php if($email = get_field('email', $post_id)) : ?>
                                                            <tr>
                                                                <td colspan="2"><?php echo hide_email($email) ?></td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php if($tel = get_field('tel', $post_id)) : ?>
                                                            <tr>
                                                                <td>Tel</td>
                                                                <td><?php echo $tel; ?></td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <?php if($mobile = get_field('mobile', $post_id)) : ?>
<!--                                                            <tr>-->
<!--                                                                <td>Mobile</td>-->
<!--                                                                <td>--><?php //echo $mobile; ?><!--</td>-->
<!--                                                            </tr>-->
                                                        <?php endif; ?>

                                                        <?php if($fax = get_field('fax', $post_id)) : ?>
                                                            <tr>
                                                                <td>Fax</td>
                                                                <td><?php echo $fax; ?></td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <tr>
                                                            <td colspan="2">
                                                                <a href="/contact-fipriot?person=<?php echo get_field('first_name', $post_id) ?><?php echo get_field('last_name', $post_id) ?>&fipriot_id=<?php $post_id ?>">Contact <?php echo $first_name; ?></a>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <br/><a href="<?php echo get_the_permalink($post_id); ?>" class="full-profile-link">Full profile <i class="icon-right-open"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>

                                </div>
                            </div>

                        <?php endif; ?>
                        <?php /* Restore original Post Data */ wp_reset_postdata(); ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

            </div><!-- #content -->
        </div><!-- #site-content-container -->

    </div><!-- #content-container   -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
