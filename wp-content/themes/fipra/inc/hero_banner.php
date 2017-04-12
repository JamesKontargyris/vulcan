<?php if( ! get_field('hide_header_banner')) : ?>
    <div id="hero" class="full-width-block-container <?= has_post_thumbnail() ? 'with-content-bar' : ''; ?>">
    <!--            Set the content block height using the header_text_block_height field. If a featured image is set, override this height with the content-bar class-->
    <div class="full-width-block-content-container <?= get_field('header_text_block_height') ? get_field('header_text_block_height') : 'short'; ?> <?= has_post_thumbnail() ? 'content-bar bg-image custom-bg--primary-translucent' : 'custom-bg--primary'; ?> ">
        <div class="full-width-block-content <?= get_field('header_text_location') ? get_field('header_text_location') : 'center';  ?> narrow">

            <h1 class="upper custom-text--primary-contrast <?php if( ! get_field('header_introduction')) : ?>no-margin <?php endif; ?>"> <?php the_title(); ?> </h1>
            <?php if(get_field('header_introduction')) : ?>
                <p class="lead no-margin custom-text--primary-contrast"><?= get_field('header_introduction'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>