<div id="global-network-menu-container">
    <div id="global-network-menu">
        <div id="menuzord" class="menuzord">
            <ul class="menuzord-menu">
<!--                 Continents-->

                <?php
                    $continents = get_terms('continent', 'hide_empty=0');
                    $continent_width = 100 / (count($continents) + 1);
                ?>
                <li style="width:<?= $continent_width; ?>%"><a href="/network/fipra-international" style="display:block; cursor:pointer;">Fipra International</a></li>
                <?php
                    foreach( $continents as $continent ) :
                ?>
                        <li style="width:<?= $continent_width; ?>%"><a href="#"><?= $continent->name; ?></a> <i class="icon-down-open"></i>
                        <div class="megamenu">
                            <?php $continent_units = get_units_by_continent($continent->term_id); ?>
                            <?php $i = 0; while ( $continent_units->have_posts() ) : $continent_units->the_post(); $i++; ?>
<!--                                    Start a new row if $i == 1 -->
                                <?php if( 5 / $i == 5) : ?> <div class="megamenu-row"> <?php endif; ?>
<!--                                    Countries-->
                                    <div class="country-tag">

                                        <a href="<?= get_the_permalink(); ?>">
                                            <?php $flag = get_field('flag'); if (!empty($flag)) : $url = $flag['url']; ?>
                                                <img src="<?= $url ?>" class="global-network-menu-flag" alt="<?= get_the_title(); ?>"/>
                                            <?php endif; ?>

                                            <?php the_title(); ?>
                                        </a>

                                    </div>
<!--                                    End the row if $i == 5 and reset $i -->
                            <?php if( 5 / $i == 1) : ?> </div> <?php $i = 0; endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </li>

                    <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>