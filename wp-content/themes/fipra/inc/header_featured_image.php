<style>
    <?php if(has_post_thumbnail()) : $bg_position = str_replace('_', ' ', get_field('bg_position')); // Set bg position of the featured image ?>
    #hero {
        content:"";
        background:url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'banner' )[0]; ?>') <?= $bg_position; ?> no-repeat;
        background-size:cover;
    }
    <?php endif; ?>
</style>