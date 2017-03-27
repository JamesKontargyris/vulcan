<?php $expertise_areas = get_expertise_areas(); ?>
<?php if ( $expertise_areas->have_posts() ) : ?>
    <section id="expertise-menu-container" class="full-width-block-container collapse">
        <div class="full-width-block-content-container dark-grey">
            <div class="full-width-block-content">
                <h3 id="expertise-menu" class="upper small center">Our Expertise</h3>
                <div id="expertise-carousel" class="with-controls" data-number-of-items="<?= $expertise_areas->post_count; ?>">
                    <?php while ( $expertise_areas->have_posts() ) : $expertise_areas->the_post(); ?>
                        <div class="expertise-area center">
                            <a href="<?= get_the_permalink(); ?>">
                                <div class="svg-icon"><?= file_get_contents(get_field('icon')); ?></div>
                                <div class="expertise-area-name"><?= get_the_title(); ?></div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>