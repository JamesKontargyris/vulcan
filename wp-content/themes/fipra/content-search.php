<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fipradotcom
 */

$post_id = get_the_ID();
?>

<?php if(get_post_type() == 'fipriot') : ?>

    <?php
    // Assign variables
    $first_name = trim(get_field('first_name')); $last_name = trim(get_field('last_name')); $position = trim(get_field('position')); $unit_id = get_field('unit') ? get_field('unit')[0] : "";
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row search-result-row">

            <div class="col-1-m hide-s">
                <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow" />
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/img/blank_profile_<?php echo get_field('gender'); ?>.png" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="col-4-m">
                <?php the_title( sprintf( '<h3 class="no-margin"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                    <?php if(get_field('is_special_adviser')) : ?>
                        <h5>Special Adviser<?= get_field('special_adviser_expertise') ? ', ' . get_field('special_adviser_expertise') : ''; ?></h5>
                    <?php else : ?>
                        <h5>
                            <?php echo $position ? $position : ''; ?>
                            <?php if($position && $unit_id) { echo ', '; } ?>
                            <?php echo $unit_id ? get_the_title($unit_id) : ''; ?>
                        </h5>
                    <?php endif; ?>
            </div>

            <div class="col-7-m hide-s">
                <?php echo get_lead_paragraph(get_field('bio')); ?>
            </div>

        </div>

    </article>

<?php elseif(get_post_type() == 'expertise') : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row search-result-row">

            <div class="col-1-m hide-s" style="fill:grey">
                <?= file_get_contents(get_field('icon')); ?>
            </div>
            <div class="col-4-m">
                <?php the_title( sprintf( '<h3 class="no-margin"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <h5>Area of Expertise</h5>
            </div>

            <div class="col-7-m hide-s">
                <?= get_field('short_summary'); ?>
            </div>

        </div>

    </article>

<?php elseif(get_post_type() == 'unit') : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row search-result-row">

            <div class="col-1-m hide-s">
                <?php if ( get_field('flag') ) : ?>
                    <img src="<?= get_field('flag')['url']; ?>" alt="<?= get_the_title(); ?>" title="<?= get_the_title(); ?>"/>
                <?php endif; ?>
            </div>
            <div class="col-4-m">
                <?php the_title( sprintf( '<h3 class="no-margin"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <h5>Fipra Network Member</h5>
            </div>

            <div class="col-7-m hide-s">
                <?php echo trim_text(strip_tags(get_field('about_us')), 300); ?>
            </div>

        </div>

    </article>

<?php elseif(get_post_type() == 'job') : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row search-result-row">
            <div class="col-1-m hide-s">
            </div>
            <div class="col-4-m">
                <?php the_title( sprintf( '<h3 class="no-margin"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <h5>Job Opportunity</h5>
                Closes: <?php echo date('d M Y', strtotime(get_field('closing_date'))); ?>
            </div>
            <div class="col-7-m hide-s">
                <?= get_field('summary'); ?>
            </div>

        </div>

    </article>

<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row search-result-row">
            <div class="col-1-m hide-s">
            </div>
            <div class="col-4-m">
                <?php the_title( sprintf( '<h3 class="no-margin"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            </div>

            <div class="col-7-m hide-s">
                <?php echo get_field('header_introduction'); ?>
            </div>

        </div>

    </article>

<?php endif; ?>