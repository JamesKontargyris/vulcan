<?php
/**
 * The template for displaying the contact Fipriot page.
 *
 * @package fipradotcom
 */

if( ! isset($_GET['fipriot_id'])) {
    wp_redirect(home_url()); exit;
};

$id = $_GET['fipriot_id'];
$fipriot = get_single_fipriot($id);

get_header(); ?>

<?php



?>

<?php while ( $fipriot->have_posts() ) : $fipriot->the_post(); ?>

    <?php
// Assign variables
    $first_name = get_field('first_name'); $last_name = get_field('last_name'); $position = get_field('position'); $unit_id = get_field('unit') ? get_field('unit')[0] : ""; $email = get_field('email');
    ?>


    <?php get_template_part('inc/breadcrumbs'); ?>

    <div id="content-container" class="<?= str_replace(' ', '-', strtolower(get_the_title())); ?>">

        <?php include('inc/hero_banner.php'); ?>

        <div id="site-content-container">

            <div id="site-content">

                <div id="primary">

                    <h3><i class="icon-mail"></i>&nbsp;&nbsp; Contact <?php echo $first_name; ?></h3>

                    <?php if($email) : ?>
                        <p>Email <?php echo $first_name; ?> on <strong><?php echo hide_email($email) ?></strong> or complete the form below:</p>
                    <?php endif; ?>

                    <?php echo do_shortcode('[contact-form-7 id="3279" title="Fipriot Contact Form"]'); ?>

                </div>

                <div id="secondary">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'profile-photo' )[0]; ?>" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow hide-s" />
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/img/blank_profile_<?php echo get_field('gender'); ?>.png" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow hide-s" />
                    <?php endif; ?>
                    <aside>
                        <div class="row">
                            <div class="no-bottom-margin">
                                <address class="no-bottom-margin">
                                    <table class="no-style" cellspacing="0" cellpadding="0" border="0" width="100%">

                                        <?php if($address = get_field('address')) : ?>
                                            <tr>
                                                <td valign="top" style="padding-bottom:24px;"><strong>Office</strong></td>
                                                <td valign="top" style="padding-bottom:24px;"><?php echo $address ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($email = get_field('email')) : ?>
                                            <tr>
                                                <td valign="top" style="padding-bottom:24px;"><strong>Email</strong></td>
                                                <td valign="top" style="padding-bottom:24px;"><?php echo hide_email($email) ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($tel = get_field('tel')) : ?>
                                            <tr>
                                                <td valign="top" style="padding-bottom:24px;"><strong>Tel</strong></td>
                                                <td valign="top" style="padding-bottom:24px;"><?php echo $tel ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($mobile = get_field('mobile')) : ?>
                                            <!--                                            <tr>-->
                                            <!--                                                <td valign="top" style="padding-bottom:24px;">Mob</td>-->
                                            <!--                                                <td valign="top" style="padding-bottom:24px;">echo $mobile</td>-->
                                            <!--                                            </tr>-->
                                        <?php endif; ?>

                                        <?php if($fax = get_field('fax')) : ?>
                                            <tr>
                                                <td valign="top" style="padding-bottom:24px;">Fax</td>
                                                <td valign="top" style="padding-bottom:24px;"><?php echo $fax ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($vcard_path = create_fipriot_vcard()) : ?>
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
                </div>

            </div><!-- #site-content -->
        </div><!-- #site-content-container -->

    </div><!-- #content-container   -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
