<?php
/**
 * The template used for displaying continents and Unit page links
 *
 * @package fipradotcom
 */
?>



<?php
$continents = get_terms('continent', 'hide_empty=0');
$continent_width = 100 / count($continents);
foreach( $continents as $continent ) :
    ?>

    <div id="<?php echo str_replace(' ', '', strtolower($continent->name)); ?>" class="continent-block">
        <h3><?= $continent->name; ?></h3>

        <div class="units">
            <?php $continent_units = get_units_by_continent($continent->term_id); ?>
            <?php while ( $continent_units->have_posts() ) : $continent_units->the_post(); ?>
                <div class="unit-block">

                    <a href="<?= get_the_permalink(); ?>" style="display: block;">
                        <h5>
                            <?php $flag = get_field('flag'); if (!empty($flag)) : $url = $flag['url']; ?>
                                <img src="<?= $url ?>" class="flag" width="48" height="48" alt="<?= get_the_title(); ?>" align="absmiddle"/>
                            <?php endif; ?>
                            <span class="unit-title"><?= get_the_title(); ?></span>
                        </h5>
                    </a>

                </div>
            <?php endwhile; ?>
        </div>
    </div>

<?php endforeach; ?>
