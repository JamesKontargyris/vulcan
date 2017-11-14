<?php

/**
 * Enqueue scripts and styles.
 */
function fipradotcom_scripts()
{
    wp_enqueue_style(
        'fipradotcom-google-fonts',
        'http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic|Lora:400,700,400italic,700italic'
    );
//    wp_enqueue_style(
//        'fipradotcom-typicons',
//        get_template_directory_uri() . '/fonts/typicons.min.css'
//    );
    wp_enqueue_style(
        'fipradotcom-fontello',
        get_template_directory_uri() . '/fonts/fontello/css/iconfonts.css'
    );
    wp_enqueue_style(
        'fipradotcom-tooltipster',
        get_template_directory_uri() . '/css/tooltipster.css'
    );
    wp_enqueue_style(
        'fipradotcom-jquery-modal',
        get_template_directory_uri() . '/minjs/jquery-modal/jquery.modal.css'
    );
    wp_enqueue_style(
        'fipradotcom-owl-carousel',
        get_template_directory_uri() . '/minjs/owl-carousel/owl.carousel.css'
    );
    wp_enqueue_style(
        'fipradotcom-owl-carousel-theme',
        get_template_directory_uri() . '/minjs/owl-carousel/owl.theme.css'
    );
    wp_enqueue_style(
        'fipradotcom-owl-carousel-transitions',
        get_template_directory_uri() . '/minjs/owl-carousel/owl.transitions.css'
    );

    wp_enqueue_style('fipradotcom-style', get_stylesheet_uri());

//    wp_enqueue_script(
//        'fipradotcom-navigation',
//        get_template_directory_uri() . '/minjs/navigation.min.js',
//        array(),
//        '20120206',
//        true
//    );

	wp_enqueue_script(
		'fipradotcom-font-awesome',
		'https://use.fontawesome.com/f38f075f09.js'
	);

    wp_enqueue_script(
        'fipradotcom-adblock-check',
        get_template_directory_uri() . '/minjs/ads.min.js',
        array(),
        '20151020',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery',
        'https://code.jquery.com/jquery-2.1.3.min.js',
        array(),
        '20120206',
        true
    );

    wp_enqueue_script(
        'fipradotcom-menuzord-js',
        get_template_directory_uri() . '/minjs/menuzord.min.js',
        array(),
        '20150423',
        true
    );

    wp_enqueue_script(
        'fipradotcom-matchheights-js',
        get_template_directory_uri() . '/minjs/jquery.matchHeight.min.js',
        array(),
        '20150428',
        true
    );

    wp_enqueue_script(
        'fipradotcom-tooltipster-js',
        get_template_directory_uri() . '/minjs/jquery.tooltipster.min.js',
        array(),
        '20150428',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery-modal',
        get_template_directory_uri() . '/minjs/jquery-modal/jquery.modal.min.js',
        array(),
        '20150423',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery-owl-carousel',
        get_template_directory_uri() . '/minjs/owl-carousel/owl.carousel.min.js',
        array(),
        '20150429',
        true
    );

    wp_enqueue_script(
        'fipradotcom-skip-link-focus-fix',
        get_template_directory_uri() . '/minjs/skip-link-focus-fix.min.js',
        array(),
        '20130115',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery-actual-height-of-hidden-elements',
        get_template_directory_uri() . '/minjs/jquery.actual.min.js',
        array(),
        '20150511',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery-imagesLoaded',
        get_template_directory_uri() . '/minjs/imagesloaded.pkgd.min.js',
        array(),
        '20150515',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery-izotone',
        get_template_directory_uri() . '/minjs/isotope.pkgd.min.js',
        array(),
        '20150514',
        true
    );

    wp_enqueue_script(
        'fipradotcom-jquery-equalize',
        get_template_directory_uri() . '/minjs/equalize.min.js',
        array(),
        '20150514',
        true
    );

    wp_enqueue_script(
        'fipradotcom-hover-touch-unstick',
        get_template_directory_uri() . '/minjs/hoverTouchUnstick.min.js',
        array(),
        '20150528',
        true
    );

    wp_enqueue_script(
        'fipradotcom-profile-js',
        get_template_directory_uri() . '/minjs/profile.min.js',
        array(),
        '20151112',
        true
    );

    wp_enqueue_script(
        'fipradotcom-sticky-js',
        get_template_directory_uri() . '/minjs/jquery.sticky.min.js',
        array(),
        '20160104',
        true
    );

    wp_enqueue_script(
        'fipradotcom-autocomplete-js',
        get_template_directory_uri() . '/minjs/jquery.autocomplete.min.js',
        array(),
        '20160309',
        true
    );

    wp_enqueue_script(
        'fipradotcom-lazy-js',
        get_template_directory_uri() . '/minjs/jquery.lazy.min.js',
        array(),
        '20160309',
        true
    );

	wp_enqueue_script(
		'fipradotcom-articles-js',
		get_template_directory_uri() . '/minjs/article.min.js',
		array(),
		'20170125',
		true
	);

	wp_enqueue_script(
		'fipradotcom-services-js',
		get_template_directory_uri() . '/minjs/services.min.js',
		array(),
		'20171114',
		true
	);


    if(is_single()) {

        wp_enqueue_script(
            'fipradotcom-google-maps-api-js',
            'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',
            array(),
            false,
            false
        );

        wp_enqueue_script(
            'fipradotcom-google-maps-site-js',
            get_template_directory_uri() . '/minjs/google-maps.min.js',
            array(),
            '20150511',
            true
        );

        wp_enqueue_script(
            'fipradotcom-units-js',
            get_template_directory_uri() . '/minjs/unit.min.js',
            array(),
            '20151007',
            true
        );
    }


    if(is_home()) {
        wp_enqueue_script(
            'fipradotcom-home-js',
            get_template_directory_uri() . '/minjs/home.min.js',
            array(),
            '20151007',
            true
        );
    }

    wp_enqueue_script(
        'fipradotcom-user-js',
        get_template_directory_uri() . '/minjs/site.min.js',
        array(),
        '20120206',
        true
    );

    wp_enqueue_script(
        'fipradotcom-user-js-our-people',
        get_template_directory_uri() . '/minjs/our-people.min.js',
        array(),
        '20150515',
        true
    );

    wp_enqueue_script(
        'fipradotcom-user-menu-link-and-entries-js',
        get_template_directory_uri() . '/minjs/menu-list-and-entries.min.js',
        array(),
        '20150511',
        true
    );


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'fipradotcom_scripts');