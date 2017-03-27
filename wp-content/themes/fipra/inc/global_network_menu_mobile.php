<div id="mobile-header-global-network-container">
    <div id="mobile-header-global-network">
        <div class="title">Global Network Countries:</div>
        <select name="mobile-header-global-network-menu" id="mobile-header-global-network-menu">
            <option value="">Please select country...</option>
            <option value="/network/fipra-international">Fipra International</option>

            <?php
                $continents = get_terms('continent', 'hide_empty=0');
                foreach( $continents as $continent ) :
            ?>
                <optgroup label="<?= $continent->name ?>">

                    <?php $continent_units = get_units_by_continent($continent->term_id); ?>
                    <?php while ( $continent_units->have_posts() ) : $continent_units->the_post(); ?>
                        <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                    <?php endwhile; ?>

                </optgroup>
            <?php endforeach; ?>
        </select>
    </div>
</div>