<?php

get_header(); ?>

<?php
// Get homepage slides featured images
$homepage_slides = get_homepage_slides();
//Slides exist?
if($homepage_slides->have_posts()) : ?>
    <style>
        <?php $i = 0;  // Counter for nth-child declarations ?>
        <?php while ( $homepage_slides->have_posts() ) : $homepage_slides->the_post(); $i++; // The loop - increase $i by 1 on each loop ?>
        <?php if(has_post_thumbnail()) : $bg_position = str_replace('_', ' ', get_field('bg_position')); // Set bg position of the featured image ?>
            #home-hero-carousel .owl-item:nth-child(<?= $i; ?>) {
                background:url('<?= wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>') <?= $bg_position; ?> no-repeat;
                background-size:cover;
            }
        <?php endif; ?>
    <?php endwhile; ?>

    </style>
<?php endif;
wp_reset_postdata(); ?>

<?php $post_id = get_the_ID(); ?>

<div id="content-container" class="home">

    <div id="site-content-container">

        <?php //Slides exist?
        if($homepage_slides->have_posts() && ! get_field('hide_header_banner')) : ?>

            <section id="home-hero-carousel-container">
                <i class="owl-prev icon-left-circle-1" data-carousel="#home-hero-carousel"></i>
                <i class="owl-next icon-right-circle-1" data-carousel="#home-hero-carousel"></i>

                <div id="home-hero-carousel">
                    <?php $i = 0; ?>
                    <?php while ( $homepage_slides->have_posts() ) : $homepage_slides->the_post(); $i++; // The loop - increase $i by 1 on each loop ?>
                        <div class="hero hero-<?= $i; ?>">
                            <div class="full-width-block-container with-content-bar">
                                <div class="full-width-block-content-container content-bar bg-image custom-bg--primary-translucent">
                                    <div class="full-width-block-content center">
                                        <div class="home-hero-title-and-blurb">
                                            <h1 class="upper custom-text--primary-contrast <?php if(! get_field('description')) : ?>no-bottom-margin<?php endif; ?>"><?= get_the_title(); ?></h1>
	                                        <?php if(get_field('description')) : ?><p class="blurb custom-text--primary-contrast"><?= get_field('description'); ?></p><?php endif; ?>
                                        </div>
                                        <div class="home-hero-link">
                                            <?php if(get_field('links')) : // Calls to action exist? ?>
                                                <p class="no-margin">
                                                    <?php foreach(get_field('links') as $post_id) : // links is an array of post IDs - use their permalinks and titles for the buttons ?>
                                                        <a class="btn primary custom-bg--secondary custom-text--secondary-contrast" href="<?= get_the_permalink($post_id); ?>"><?= get_the_title($post_id); ?></a>
                                                    <?php endforeach; ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>

        <?php endif; ?>

        <?php
//            Get all homepage blocks
            $home_blocks = get_homepage_blocks();
        ?>

        <!-- The Loop -->
        <?php if ( $home_blocks->have_posts() ) : while ( $home_blocks->have_posts() ) : $home_blocks->the_post(); ?>

        <div class="full-width-block-container homepage-block homepage-block__bg-<?php echo get_field('bar_colour'); ?>">
            <div class="full-width-block-content-container custom-bg--<?php echo get_field('bar_colour'); ?> large-padding">
                <div class="full-width-block-content">
                    <div class="row no-margin">
                        <div class="col-12-m">
                            <?php echo get_field('small_headline') ? '<h5 class="center no-margin text--bold custom-text--' . get_field('bar_colour') . '-contrast">' . get_field('small_headline') . '</h5>' : ''; ?>
                            <?php echo get_field('large_headline') ? '<h2 class="feature center custom-text--' . get_field('bar_colour') . '-contrast">' . get_field('large_headline') . '</h2>' : ''; ?>
                        </div>
                    </div>
                    <div class="row">
	                    <?php
	                    // check if the repeater field has rows of data
	                    if( have_rows('content_boxes') ):
		                    // loop through the rows of data
		                    while ( have_rows('content_boxes') ) : the_row(); ?>
                                <div class="col-<?php the_sub_field('box_width'); ?>-m custom-text--<?php echo get_field('bar_colour') ?>-contrast <?php if(get_sub_field('spacer')) : ?>hide-s<?php endif; ?>">
                                    <?php the_sub_field('box_content'); ?>
                                    <?php if(get_sub_field('spacer')) echo '&nbsp;'; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php
                    // check if the calls to action field is set
                    if( get_field('calls_to_action') ): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="homepage-block__calls-to-action">
	                                <?php
	                                // loop through calls to action
	                                foreach(get_field('calls_to_action') as $id) : ?>
                                        <a href="<?php echo get_the_permalink($id); ?>" class="call-to-action homepage-block__button homepage-block__button-<?php echo get_field('bar_colour'); ?>"><?php echo get_the_title($id); ?></a>
	                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>
        <?php /* Restore original Post Data */ wp_reset_postdata(); ?>

    </div> <!--#site-content-container-->
	<?php echo page_testimonials(); ?>
</div><!-- #content-container   -->

<?php get_footer(); ?>
