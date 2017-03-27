<?php if ( is_active_sidebar( 'sub-nav-bar' ) && ! is_front_page() ) : ?>
    <div id="breadcrumbs" class="page-nav with-padding">
        <div class="breadcrumbs-content">
            <?php dynamic_sidebar( 'sub-nav-bar' ); ?>
            <!--        <a href="#">Home</a> <span class="divider"><i class="icon-right-open"></i></span> <a href="#">Parent Page</a> <span class="divider"><i class="icon-right-open"></i></span> <span class="active">Current Page</span>-->
        </div>
    </div><!--#breadcrumbs-->
<?php endif; ?>

