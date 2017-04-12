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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row search-result-row">

        <div class="col-2-m hide-s no-bottom-margin">
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" />
                    <?php else : ?>
                    <img src="<?php echo get_template_directory_uri() ?>/img/blank_profile_<?php echo get_field('gender'); ?>.png" alt="<?php echo full_name(); ?>" title="<?php echo full_name(); ?>" class="photo-tile dark-shadow" />
                <?php endif; ?>
            </a>
        </div>
        <div class="col-10-m">
            <?php
                the_title( sprintf( '<h3 class="no-margin"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                if(get_the_excerpt()) the_excerpt();
            ?>

        </div>
    </div>

</article>