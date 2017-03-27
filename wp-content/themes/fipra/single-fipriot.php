<?php
/**
 * The template for displaying all single profiles.
 *
 * @package fipradotcom
 */

get_header(); ?>

<div id="content-container">

    <!-- The Loop -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('inc/breadcrumbs'); ?>

        <?php $post_id = get_the_ID(); ?>
        <?php
        // Assign variables
        $first_name = get_field('first_name'); $last_name = get_field('last_name'); $position = get_field('position'); $unit_id = get_field('unit') ? get_field('unit')[0] : ""; $additional_position_info = get_field('additional_position_info'); $email = get_field('email');
        ?>

        <div id="contact-form-block" class="full-width-block-container content-bar-bottom">
            <div class="full-width-block-content-container dark-grey">
                <div class="full-width-block-content">

                    <div class="contact-form-block-close"><i class="icon-cancel"></i></div>
                    <h3 class="no-top-margin"><i class="icon-mail"></i>&nbsp;&nbsp; Contact <?php echo $first_name; ?></h3>

                    <?php if($email) : ?>
                        <p>Email <?php echo $first_name; ?> on <?php echo hide_email($email) ?> &nbsp;or complete the form below:</p>
                    <?php endif; ?>

                    <?php echo do_shortcode('[contact-form-7 id="3276" title="Fipriot Contact Form"]'); ?>

                </div>
            </div>
        </div>

        <div id="hero" class="full-width-block-container content-bar-bottom profile">
            <div class="full-width-block-content-container grey">
                <div class="full-width-block-content left">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow" />
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/img/blank_profile_<?php echo get_field('gender'); ?>.png" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow" />
                    <?php endif; ?>

                    <h1 class="upper no-margin"><?php echo full_name(); ?></h1>
                    <?php if(get_field('is_special_adviser')) : ?>
                        <h4 class="no-top-margin">Special Adviser<?php echo get_field('special_adviser_expertise_tags') ? ' - ' . format_spad_expertise_tags(get_field('special_adviser_expertise_tags')) : ''; ?></h4>
                    <?php else : ?>
                        <h4 class="no-top-margin">
                            <?php
                            echo $position;
                            if($position && $unit_id) { echo ', '; } ?>
<!--                            <a href="--><?php //echo get_the_permalink($unit_id); ?><!--">-->
                                <?php echo $unit_id ? fiprafy_unit_name(get_the_title($unit_id)) : ''; ?>
<!--                            </a>--><?php if(($position || $unit_id) && $additional_position_info) { echo '; '; }
                            if($additional_position_info) { echo $additional_position_info; } ?>
                        </h4>
                    <?php endif; ?>

                    <div class="contact-button">
                        <a href="/contact-fipriot?person=<?php echo get_field('first_name') ?><?php echo get_field('last_name') ?>&fipriot_id=<?php the_ID(); ?>" class="contact-form-button btn primary btn-large btn-white">Contact <?php echo get_field('first_name') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="site-content-container">

            <div id="site-content">

                <div id="primary" class="profile-content-area">
                    <main id="main" class="site-main site-main-profile" role="main">

                        <?php $bio = get_field('bio'); ?>
                            <p class="lead"><?php echo get_lead_paragraph($bio); ?></p>

                        <?php echo bio_minus_lead_paragraph($bio); ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="secondary">
                    <aside>
                        <h5 id="contact">Contact <?php echo get_field('first_name') ?></h5>
                        <div class="row">
                            <div class="col-6-xs col-12-xxs no-bottom-margin">
                                <address> <?php echo get_field('address') ?> </address>
                            </div>
                            <div class="col-6-xs col-12-xxs no-bottom-margin">
                                <address class="no-bottom-margin">
                                    <table class="no-style" cellspacing="0" cellpadding="0" border="0" width="100%">

                                        <?php if($email = get_field('email')) : ?>
                                            <tr>
                                                <td colspan="2"><?php echo hide_email($email) ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($tel = get_field('tel')) : ?>
                                            <tr>
                                                <td>Tel</td>
                                                <td><?php echo $tel ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($mobile = get_field('mobile')) : ?>
<!--                                            <tr>-->
<!--                                                <td>Mobile</td>-->
<!--                                                <td>echo $mobile</td>-->
<!--                                            </tr>-->
                                        <?php endif; ?>

                                        <?php if($fax = get_field('fax')) : ?>
                                            <tr>
                                                <td>Fax</td>
                                                <td><?php echo $fax ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($vcard_path = create_fipriot_vcard()) : ?>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr><td colspan="2"><a href="<?php echo $vcard_path; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/vcard.svg" alt="" style="width:24px; height:24px;vertical-align: middle"> Download vCard</a></td></tr>
                                        <?php endif; ?>

                                    </table>

                                </address>
                            </div>
                        </div>
                    </aside>

                    <aside>
                        <h5 id="languages">Languages Spoken</h5>
                        <ul class="languages-list no-bottom-margin no-bullet">
                            <?php $languages = []; // Collect languages as we go, so we can check for duplicates ?>
                            <?php for($i = 1; $i <= 9; $i++) : $language = get_field('language_' . $i);?>
                                <?php if(isset($language->term_id) && ! in_array($language->term_id, $languages)) : // language is set and isn't already displayed? ?>
                                    <?php $flag_url = get_language_flag_url($language->term_id) ? get_language_flag_url($language->term_id) : get_template_directory_uri() . '/img/blank_language_flag.png'; ?>
                                    <li><img src="<?php echo $flag_url; ?>" class="languages-list-flag tooltip" alt="<?php echo ucwords($language->name); ?>" title="<?php echo ucwords($language->name); ?>"/></li>
                                    <?php $languages[] = $language->term_id; ?>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </aside>

                    <?php dynamic_sidebar('fipriot-profile'); ?>

                </div><!-- #secondary -->

            </div><!-- #content -->

        </div>

    <!-- End of the loop -->
    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no Fipriot found.' ); ?></p>
    <?php endif; ?>

</div><!-- #content-container   -->

<?php get_footer(); ?>
