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
        if($homepage_slides->have_posts()) : ?>

            <section id="home-hero-carousel-container">
                <i class="owl-prev icon-left-circle-1" data-carousel="#home-hero-carousel"></i>
                <i class="owl-next icon-right-circle-1" data-carousel="#home-hero-carousel"></i>

                <div id="home-hero-carousel">
                    <?php $i = 0; ?>
                    <?php while ( $homepage_slides->have_posts() ) : $homepage_slides->the_post(); $i++; // The loop - increase $i by 1 on each loop ?>
                        <div class="hero hero-<?= $i; ?>">
                            <div class="full-width-block-container with-content-bar">
                                <div class="full-width-block-content-container content-bar grey bg-image">
                                    <div class="full-width-block-content center narrow">
                                        <div class="home-hero-title-and-blurb">
                                            <h1 class="upper"><?= get_the_title(); ?></h1>
                                            <p class="blurb"><?= get_field('description'); ?></p>
                                        </div>
                                        <div class="home-hero-link">
                                            <?php if(get_field('links')) : // Calls to action exist? ?>
                                                <p class="no-margin">
                                                    <?php foreach(get_field('links') as $post_id) : // links is an array of post IDs - use their permalinks and titles for the buttons ?>
                                                        <a class="btn primary" href="<?= get_the_permalink($post_id); ?>"><?= get_the_title($post_id); ?></a>
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

            <section id="<?= str_replace(' ', '', get_field('block_id')); ?>" class="<?= get_field('block_class') ?>">
                <?= the_content(); ?>
            </section>

        <?php endwhile; ?>
        <?php endif; ?>
        <?php /* Restore original Post Data */ wp_reset_postdata(); ?>

    </div> <!--#site-content-container-->
</div><!-- #content-container   -->

<?php get_footer(); ?>
