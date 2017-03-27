<div class="page-nav hide-m">
    <div class="row content-area">
        <ul class="anchor-links-list no-margin no-bullet">
            <li class="menu-title menu-title-toggle"><i class="icon-menu-1"></i> Jump to...</li>
            <?php
            $continents = get_terms('continent', 'hide_empty=0');

            if($continents) : ?>

                <?php $continent_width = 100 / count($continents);
                foreach( $continents as $continent ) :
                ?>
                    <li class="hide-s"><a class="jump-to-link" href="#<?php echo str_replace(' ', '', strtolower($continent->name)); ?>"><?php echo $continent->name; ?> <i class="icon-down-open"></i></a></li>
                <?php endforeach; ?>

            <?php endif; ?>
        </ul>
    </div>
</div>