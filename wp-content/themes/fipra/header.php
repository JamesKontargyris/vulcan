<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fipradotcom
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php dynamic_sidebar('dynamic-code'); ?>

<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'fipradotcom'); ?></a>

    <div id="sticky-header">

        <div id="mobile-search-container">
            <div id="mobile-search">
                <?php get_search_form( true ); ?>
            </div>
        </div>
        <div id="header-container" class="with-border">
            <header id="masthead" class="site-header" role="banner">
                <div id="site-branding-container">
                    <div class="site-branding">
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
                                    src="<?php echo get_template_directory_uri(); ?>/minimg/fipra_logo.png"
                                    alt="Fipra" width="72" height="72"/></a></h1>
                    </div>
                    <!-- .site-branding -->
                </div>
                <!-- #site-branding-container -->

                <div id="site-navigation-container">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <a class="mobile-menu-search btn btn-clear btn-large no-margin"><i class="icon-search"></i></a>
                        <a class="mobile-menu-toggle btn btn-clear btn-large btn-omega no-margin" aria-controls="primary-menu-mobile" aria-expanded="false"><i class="icon-menu-1"></i></a>

                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
                    </nav>
                    <!-- #site-navigation -->
                </div>
                <!-- #site-navigation-container -->

            </header>
            <div id="primary-menu-mobile-container">
                <div id="primary-menu-mobile">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'depth' => '3')); ?>
                </div>
            </div>
            <!-- #masthead -->

        </div>
    </div>

    <div id="content">

