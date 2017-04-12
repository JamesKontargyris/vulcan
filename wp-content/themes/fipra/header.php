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
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php
                                // Display the Custom Logo
                                the_custom_logo();

                                if( ! has_custom_logo()) :
                                ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/minimg/fipra_logo.png" alt="<?php echo bloginfo('name'); ?>" style="max-width: 100%;"/>
                                <?php endif; ?>
                            </a>
                        </h1>
                    </div>
                    <!-- .site-branding -->
                </div>
                <!-- #site-branding-container -->

                <div id="site-navigation-container">
                    <div class="desktop-search-social">
	                    <?php get_search_form( true ); ?>
                        <?php if ( get_theme_mod( 'twitter', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'twitter', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-twitter"></i></a>
                        <?php endif; ?>
	                    <?php if ( get_theme_mod( 'facebook', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'facebook', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-facebook"></i></a>
	                    <?php endif; ?>
	                    <?php if ( get_theme_mod( 'linkedin', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'linkedin', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-linkedin"></i></a>
	                    <?php endif; ?>
	                    <?php if ( get_theme_mod( 'googleplus', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'googleplus', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-googleplus"></i></a>
	                    <?php endif; ?>
	                    <?php if ( get_theme_mod( 'instagram', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'instagram', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-instagram"></i></a>
	                    <?php endif; ?>
	                    <?php if ( get_theme_mod( 'youtube', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'youtube', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-youtube"></i></a>
	                    <?php endif; ?>
	                    <?php if ( get_theme_mod( 'vimeo', '') ) : ?>
                            <a href="http://<?php echo str_replace('http://', '', get_theme_mod( 'vimeo', '#')); ?>" target="_blank" class="btn-social-media"><i class="icon-vimeo"></i></a>
	                    <?php endif; ?>
                    </div>

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

