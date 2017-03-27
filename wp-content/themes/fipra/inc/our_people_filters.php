<div class="page-nav grey">
    <div class="row content-area">
        <div class="col-7-m no-margin">
            <ul class="anchor-links-list no-margin no-bullet">
<!--                <li class="menu-title inline-s">Filter by</li>-->
                <?php if(isset($filter_group) && $filter_group != 'fipra_international_profiles') : ?>
                    <li class="inline-s"><a href="#" class="filter-group-trigger unit-trigger" data-filter-group="#units-filter-group">Unit <i class="icon-down-open"></i></a></li>
                    <li class="inline-s"><a href="#" class="filter-group-trigger" data-filter-group="#surname-filter-group">Surname <i class="icon-down-open"></i></a></li>
                <?php endif; ?>
<!--                <li class="inline-s"><a href="#" class="filter-group-trigger expertise-trigger" data-filter-group="#expertise-filter-group">Expertise Area <i class="icon-down-open"></i></a></li>-->

            </ul>
        </div>
	    <?php if(isset($filter_group) && $filter_group != 'fipra_international_profiles') : ?>
            <div class="col-5-m no-margin hide-s">
        <?php else : ?>
            <div class="col-12-m no-margin hide-s">
        <?php endif; ?>
            <input type="text" id="text-filter" placeholder="Search by name, position, country..." />
        </div>
    </div>
</div>

<div class="filter-group-container">

<!--    START: Continent / Unit filters-->
    <div id="units-filter-group" class="page-nav with-top-padding filter-group grey hide">
        <div class="row content-area">
            <div class="col-12-m no-margin">
                <div class="filter-list-container">
                    <h5 class="filter-list-title">Continents</h5>
                    <ul class="anchor-links-list no-margin no-bullet">
                        <?php $continents = get_terms('continent', 'hide_empty=0'); ?>
                        <?php if( $continents) : ?>
                            <?php foreach($continents as $continent) : ?>
                                <li class="inline-s"><a href="#" class="filter-group-trigger sub" data-filter-group="#<?php echo make_class_name($continent->name); ?>-filter-group"><?php echo $continent->name; ?> <i class="icon-down-open"></i></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li class="inline-s">No filters available</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php foreach($continents as $continent) : ?>
        <div id="<?php echo make_class_name($continent->name); ?>-filter-group" class="page-nav with-padding dark-grey filter-group hide">
            <div class="row content-area">
                <div class="filter-list-container">

                    <?php $continent_units = get_units_by_continent($continent->term_id); ?>
                    <h5 class="filter-list-title"><?php echo $continent->name; ?></h5>
                    <ul class="filter-list no-margin no-bullet">
                        <?php if($continent_units->found_posts > 0) : ?>
                            <?php while ( $continent_units->have_posts() ) : $continent_units->the_post(); ?>
                                <li class="filterable"><a href="#" class="filter" data-filter=".<?php echo make_class_name(get_the_title()); ?>" data-filtering-on-text="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <li class="inline-s">No filters available</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<!--    END: Continent / Unit filters-->

<!--    START: Expertise Area filters-->
<!--    <div id="expertise-filter-group" class="page-nav with-padding dark-grey filter-group hide">-->
<!--        <div class="row content-area">-->
<!--            <div class="filter-list-container">-->
<!--                <ul class="filter-list no-margin no-bullet">-->
<!--                    --><?php //$expertise_areas = get_expertise_areas(false, true); ?>
<!--                    --><?php //if( $expertise_areas->found_posts > 0) : ?>
<!--                        --><?php //while ( $expertise_areas->have_posts() ) : $expertise_areas->the_post(); ?>
<!--                            <li><a href="#" class="filter" data-filter=".--><?php //echo make_class_name(str_replace(',','',get_the_title())); ?><!--" data-filtering-on-text="--><?php //the_title(); ?><!--">--><?php //the_title(); ?><!--</a></li>-->
<!--                        --><?php //endwhile; ?>
<!--                    --><?php //else : ?>
<!--                        <li class="inline-s">No filters available</li>-->
<!--                    --><?php //endif; ?>
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    END: Expertise Area filters-->

    <!--    START: Surname jump-->
    <div id="surname-filter-group" class="page-nav with-padding dark-grey filter-group hide">
        <div class="row content-area">
            <div class="filter-list-container">
                <ul class="filter-list no-margin no-bullet">
                    <?php $alphabet = range('A', 'Z'); ?>
                    <?php foreach($alphabet as $letter) : ?>
                        <li><a href="#surname-<?php echo $letter; ?>" class="filter jump-to-surname" data-surname-letter="<?php echo $letter; ?>"><?php echo $letter; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--    END: Surname jump-->

</div>