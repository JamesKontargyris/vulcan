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

        <?php $fipriots = get_all_fipriots(true); // get all Fipriots INCLUDING Spads ?>
        <?php $filter_group = 'all_profiles'; // used by our_people_filters.php to show the correct filters for the page ?>

        <?php include('inc/our_people_filters.php'); ?>


        <div id="site-content-container">

            <div id="site-content">

                <div id="primary" class="full-width">

                    <main id="main" class="site-main" role="main">

                        <a href="#page" class="button-back-to-top jump-to-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" width="12" height="12"> Top</a>

                        <?php if ( $fipriots->have_posts() ) : ?>

                            <!--                    Used by jQuery to update filtering-on-title when clear filter button is clicked -->
                            <div class="hide-s hide-m number-of-fipriots"><?php echo $fipriots->found_posts; ?></div>
                            <div class="hide-s hide-m fipriot-type">Fipriot</div>

                            <div class="filtering-on-container">
                                <h4 class="no-margin filtering-on-title">
                                    <?php // echo 'Showing ' . $fipriots->found_posts > 1 ? $fipriots->found_posts . ' Fipriots' : $fipriots->found_posts . ' Fipriot' ; ?>
                                </h4>
                                <a href="#" class="btn btn-small secondary clear-filter hide"><i class="icon-cancel-1"></i> Clear Filter</a>
                            </div>


                            <div class="people-group-container">

                                <div class="people-group">

                                    <?php while ( $fipriots->have_posts() ) : $fipriots->the_post(); ?>

                                        <?php $post_id = get_the_ID(); ?>
    <!--                                    Get unit ID and filter class names-->
                                        <?php $unit_id = get_field('unit') ? get_field('unit')[0] : 0; ?>
                                        <?php $unit_filter_name = make_class_name(get_the_title($unit_id)); ?>
                                        <?php $expertise_filter_names = ''; ?>
                                        <?php if($expertise_areas = get_field('expertise')) : ?>
                                            <?php foreach($expertise_areas as $expertise_id) {
                                                $expertise_filter_names .= make_class_name(str_replace(',', '', get_the_title($expertise_id))) . ' ';
                                            } ?>
                                        <?php endif; ?>


                                        <?php
//                                        Assign variables
                                            $first_name = get_field('first_name'); $last_name = get_field('last_name'); $position = get_field('position'); $additional_position_info = get_field('additional_position_info');
                                        ?>

                                        <div id="surname-<?php echo substr($last_name, 0, 1); ?>" class="person <?php echo trim($unit_filter_name) . ' ' . trim($expertise_filter_names) . ' surname-' . substr($last_name, 0, 1); ?>">
                                            <div class="person-profile-photo">
                                                <a href="<?php echo get_the_permalink(); ?>">
                                                    <?php if ( has_post_thumbnail() ) : ?>
                                                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo $first_name; ?> <?php echo $last_name; ?>" title="<?php echo $first_name; ?> <?php echo $last_name; ?>" class="photo-tile" />
                                                    <?php else : ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/img/blank_profile_<?php echo get_field('gender'); ?>.png" alt="<?php echo $first_name; ?> <?php echo $last_name; ?>" title="<?php echo $first_name; ?> <?php echo $last_name; ?>" class="photo-tile" />
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="person-details">
                                                <h4 class="no-margin"><a href="<?php echo get_the_permalink(); ?>"><?php echo $first_name; ?> <?php echo $last_name; ?></a></h4>

                                                <h6>
                                                    <?php
                                                        if(!get_field('is_special_adviser'))
                                                        {
                                                            echo $position;
                                                            if($position && $unit_id) { echo ', '; }
                                                            echo $unit_id ? fiprafy_unit_name(get_the_title($unit_id)) : '';
                                                            if(($position || $unit_id) && $additional_position_info) { echo '; '; }
                                                            if($additional_position_info) { echo $additional_position_info; }
                                                        } else {
                                                            echo 'Special Adviser';
                                                            echo get_field("special_adviser_expertise") ? ", " . get_field("special_adviser_expertise") : "";
                                                        }
                                                    ?>
                                                </h6>

                                                <div class="btn-container">
                                                    <a href="<?php echo get_the_permalink(); ?>" class="btn">
                                                        <div class="btn-text"><i class="icon-right-circle-1"></i></div>
                                                    </a>
                                                </div>
                                                <div class="person-contact-details">
                                                    <table class="no-style" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <?php if($email = get_field('email')) : ?>
                                                            <tr>
                                                                <td colspan="2"><?php echo hide_email($email) ?></td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php if($tel = get_field('tel')) : ?>
                                                            <tr>
                                                                <td>Tel</td>
                                                                <td><?php echo $tel; ?></td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <?php if($mobile = get_field('mobile')) : ?>
<!--                                                            <tr>-->
<!--                                                                <td>Mobile</td>-->
<!--                                                                <td>--><?php //echo $mobile; ?><!--</td>-->
<!--                                                            </tr>-->
                                                        <?php endif; ?>

                                                        <?php if($fax = get_field('fax')) : ?>
                                                            <tr>
                                                                <td>Fax</td>
                                                                <td><?php echo $fax; ?></td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <tr>
                                                            <td colspan="2">
                                                                <a href="/contact-fipriot?person=<?php echo get_field('first_name') ?><?php echo get_field('last_name') ?>&fipriot_id=<?php the_ID(); ?>">Contact <?php echo $first_name; ?></a>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <br/><a href="<?php echo get_the_permalink(); ?>" class="full-profile-link">Full profile <i class="icon-right-open"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>

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
