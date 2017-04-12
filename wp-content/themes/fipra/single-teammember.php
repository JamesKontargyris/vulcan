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
        $first_name = get_field('first_name'); $last_name = get_field('last_name'); $position = get_field('position'); $email = get_field('email');
        ?>

        <div id="hero" class="full-width-block-container content-bar-bottom profile">
            <div class="full-width-block-content-container custom-bg--primary">
                <div class="full-width-block-content left">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile" />
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/img/blank_profile_<?php echo get_field('gender'); ?>.png" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile" />
                    <?php endif; ?>

                    <h1 class="upper no-margin custom-text--primary-contrast"><?php echo full_name(); ?></h1>
                    <?php if ( $position ) : ?><h4 class="no-top-margin custom-text--primary-contrast"><?php echo $position; ?></h4><?php endif; ?>

                </div>
            </div>
        </div>

        <div id="site-content-container">

            <div id="site-content">

                <div id="primary" class="profile-content-area">
                    <main id="main" class="site-main site-main-profile" role="main">

                        <?php echo get_field('bio'); ?>

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

                                        <?php if($tel = get_field('tel')) : ?>
                                            <tr>
                                                <td>Tel</td>
                                                <td><?php echo $tel ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($mobile = get_field('mobile')) : ?>
                                            <tr>
                                                <td>Mobile</td>
                                                <td><?php echo $mobile; ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($fax = get_field('fax')) : ?>
                                            <tr>
                                                <td>Fax</td>
                                                <td><?php echo $fax ?></td>
                                            </tr>
                                        <?php endif; ?>

	                                    <?php if($email = get_field('email')) : ?>
                                            <tr>
                                                <td colspan="2"><?php echo hide_email($email) ?></td>
                                            </tr>
	                                    <?php endif; ?>

                                    </table>

                                </address>
                            </div>
                        </div>
                    </aside>

                </div><!-- #secondary -->

            </div><!-- #content -->

        </div>

    <!-- End of the loop -->
    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no team member found.' ); ?></p>
    <?php endif; ?>

</div><!-- #content-container   -->

<?php get_footer(); ?>
