<div class="sticky-filters">

    <div class="page-nav grey">
        <div class="row content-area">
            <div class="col-7-m no-margin">
                <ul class="anchor-links-list no-margin no-bullet">
                    <!--                <li class="menu-title inline-s">Filter by</li>-->
                    <li class="inline-s"><a href="#" class="filter-group-trigger" data-filter-group="#surname-filter-group">Surname <i class="icon-down-open"></i></a></li>
                    <li class="inline-s"><a href="#" class="filter-group-trigger" data-filter-group="#expertise-tags-filter-group">Expertise<i class="icon-down-open"></i></a></li>
                </ul>
            </div>
            <div class="col-5-m no-margin hide-s">
                <input type="text" id="text-filter" class="text-filter-autocomplete" placeholder="Search by name or expertise area..." />
            </div>
        </div>
    </div>

    <div class="filter-group-container">

        <!--    START: Surname jump-->
        <div id="surname-filter-group" class="page-nav with-padding dark-grey filter-group hide">
            <div class="row content-area">
                <div class="filter-list-container">
                    <ul class="filter-list no-margin no-bullet">
                        <?php $alphabet = range('A', 'Z'); ?>
                        <?php foreach($alphabet as $letter) : ?>
                            <li class="filterable"><a href="#surname-<?php echo $letter; ?>" class="filter" data-filter=".surname-<?php echo $letter; ?>" data-surname-letter="<?php echo $letter; ?>" data-filtering-on-text="Surname: <?php echo $letter; ?>"><?php echo $letter; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--    END: Surname jump-->

        <!--    START: Expertise Tags-->
        <div id="expertise-tags-filter-group" class="page-nav with-padding dark-grey filter-group hide">
            <div class="row content-area">
                <div class="filter-list-container">
                    <?php $expertise_tags_policy = get_spad_expertise_tags(true, false); ?>
                    <?php $expertise_tags_location = get_spad_expertise_tags(false, true); ?>

                    <?php if($expertise_tags_policy) : ?>
                        <h5 class="no-bottom-margin">Policy Areas</h5>
                        <ul class="filter-list no-margin no-bullet">
                            <?php foreach($expertise_tags_policy as $tag) : ?>
                                <li class="filterable"><a href="#" class="filter" data-filter=".expertise-<?php echo make_class_name(str_replace(',', '', $tag)); ?>" data-filtering-on-text="Expertise area: <?php echo $tag; ?>"><?php echo $tag; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if($expertise_tags_location && $expertise_tags_policy) { echo '<br>'; } ?>

                    <?php if($expertise_tags_location) : ?>
                        <h5 class="no-bottom-margin">Geographic Locations</h5>
                        <ul class="filter-list no-margin no-bullet">
                            <?php foreach($expertise_tags_location as $tag) : ?>
                                <li class="filterable"><a href="#" class="filter" data-filter=".expertise-<?php echo make_class_name(str_replace(',', '', $tag)); ?>" data-filtering-on-text="Expertise area: <?php echo $tag; ?>"><?php echo $tag; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <!--    END: Expertise Tags-->

    </div>
</div>