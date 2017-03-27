<?php
/**
 * The template used for displaying continents and Unit page links in page-our-network.php
 *
 * @package fipradotcom
 */
?>

<?php
$continents = get_terms('continent', 'hide_empty=0');
$continent_width = 100 / count($continents);
foreach( $continents as $continent ) :
?>

    <div class="continent-block">
        <h2 class="feature"><?= $continent->name; ?></h2>

        <div class="units">
            <?php $continent_units = get_units_by_continent($continent->term_id); ?>
            <?php while ( $continent_units->have_posts() ) : $continent_units->the_post(); ?>
                <div class="unit-block">
                    <?php
                    $flag = get_field('flag');
                    if( ! empty($flag) ) {  $url = $flag['url']; }
                    ?>

                    <a href="<?= get_the_permalink(); ?>" style="display: block;">
                        <h5>
                            <?php if( !empty($flag)) : ?>
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
