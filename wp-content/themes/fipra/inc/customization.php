<?php

function fipra_customize_register( $wp_customize ) {
	//All customization sections, settings and controls are placed in here
	$wp_customize->add_setting( 'primary_color' , array(
		'default'   => '#00257f'
	) );
	$wp_customize->add_setting( 'secondary_color' , array(
		'default'   => '#14b1cc'
	) );
	$wp_customize->add_setting( 'tertiary_color' , array(
		'default'   => '#5F697F'
	) );
	$wp_customize->add_setting( 'body_text_color' , array(
		'default'   => '#222222'
	) );
	$wp_customize->add_setting( 'body_background_color' , array(
		'default'   => '#ffffff'
	) );
	$wp_customize->add_setting( 'twitter' , array(
		'default'   => ''
	) );
	$wp_customize->add_setting( 'facebook' , array(
		'default'   => ''
	) );
	$wp_customize->add_setting( 'linkedin' , array(
		'default'   => ''
	) );
	$wp_customize->add_setting( 'googleplus' , array(
		'default'   => ''
	) );
	$wp_customize->add_setting( 'instagram' , array(
		'default'   => ''
	) );
	$wp_customize->add_setting( 'youtube' , array(
		'default'   => ''
	) );
	$wp_customize->add_setting( 'vimeo' , array(
		'default'   => ''
	) );

	$wp_customize->add_section( 'fipra_social_media' , array(
		'title'      => __( 'Header Social Media Links', 'fipra' ),
		'priority'   => 30,
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'      => __( 'Primary Colour', 'fipra' ),
				'section'    => 'colors',
				'settings'   => 'primary_color',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			array(
				'label'      => __( 'Secondary Colour', 'fipra' ),
				'section'    => 'colors',
				'settings'   => 'secondary_color',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tertiary_color',
			array(
				'label'      => __( 'Tertiary Colour', 'fipra' ),
				'section'    => 'colors',
				'settings'   => 'tertiary_color',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_text_color',
			array(
				'label'      => __( 'Body Text Colour', 'fipra' ),
				'section'    => 'colors',
				'settings'   => 'body_text_color',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_background_color',
			array(
				'label'      => __( 'Page Background Colour', 'fipra' ),
				'section'    => 'colors',
				'settings'   => 'body_background_color',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'twitter_url',
			array(
				'label'      => __( 'Twitter URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'twitter',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook_url',
			array(
				'label'      => __( 'Facebook URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'facebook',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'linkedin_url',
			array(
				'label'      => __( 'LinkedIn URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'linkedin',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'googleplus_url',
			array(
				'label'      => __( 'Google+ URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'googleplus',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram_url',
			array(
				'label'      => __( 'Instagram URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'instagram',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'youtube_url',
			array(
				'label'      => __( 'YouTube URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'youtube',
			) )
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'vimeo_url',
			array(
				'label'      => __( 'Vimeo URL', 'fipra' ),
				'section'    => 'fipra_social_media',
				'settings'   => 'vimeo',
			) )
	);
}
add_action( 'customize_register', 'fipra_customize_register' );

function fipra_customized_css()
{
	?>
	<style type="text/css">
		body {
			color: <?php echo get_theme_mod('body_text_color', '#222222'); ?>;
            background-color: <?php echo get_theme_mod('body_background_color', '#ffffff'); ?>;
		}

        a:link,
        a:visited {
            color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?>
        }
        a:hover {
            opacity:0.7;
        }

        ul li:before {
            color: <?php echo get_theme_mod('primary_color', '#00257f'); ?>;
        }

		.custom-bg--primary {
			background-color: <?php echo get_theme_mod('primary_color', '#00257f'); ?>;
		}
        .custom-bg--primary-dark {
            background-color: <?php echo adjustColorLightenDarken(get_theme_mod('primary_color', '#00257f'), 15); ?>;
        }
        .custom-bg--primary-light {
            background-color: <?php echo adjustColorLightenDarken(get_theme_mod('primary_color', '#00257f'), -15); ?>;
        }
		.custom-bg--primary-translucent {
			background-color:rgba(<?php echo hex2RGB(get_theme_mod('primary_color', '#00257f'))['red']; ?>,<?php echo hex2RGB(get_theme_mod('primary_color', '#00257f'))['green']; ?>,<?php echo hex2RGB(get_theme_mod('primary_color', '#00257f'))['blue']; ?>, 0.85);
		}
		.custom-bg--secondary {
			background-color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?>;
		}
        .custom-bg--secondary-dark {
            background-color: <?php echo adjustColorLightenDarken(get_theme_mod('secondary_color', '#14b1cc'), 15); ?>;
        }
        .custom-bg--secondary-light {
            background-color: <?php echo adjustColorLightenDarken(get_theme_mod('secondary_color', '#14b1cc'), -15); ?>;
        }
        .custom-bg--secondary-translucent {
            background-color:rgba(<?php echo hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))['red']; ?>,<?php echo hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))['green']; ?>,<?php echo hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))['blue']; ?>, 0.85);
        }
        .custom-bg--tertiary {
            background-color: <?php echo get_theme_mod('tertiary_color', '#5F697F'); ?>;
        }
        .custom-bg--tertiary-dark {
            background-color: <?php echo adjustColorLightenDarken(get_theme_mod('tertiary_color', '#5F697F'), 15); ?>;
        }
        .custom-bg--tertiary-light {
            background-color: <?php echo adjustColorLightenDarken(get_theme_mod('tertiary_color', '#5F697F'), -15); ?>;
        }
        .custom-bg--tertiary-translucent {
            background-color:rgba(<?php echo hex2RGB(get_theme_mod('tertiary_color', '#5F697F'))['red']; ?>,<?php echo hex2RGB(get_theme_mod('tertiary_color', '#5F697F'))['green']; ?>,<?php echo hex2RGB(get_theme_mod('tertiary_color', '#5F697F'))['blue']; ?>, 0.85);
        }
        .custom-bg--white {
            background-color:#ffffff;
        }
        .custom-bg--black {
            background-color:#222222;
        }
        .custom-bg--grey {
            background-color: #e4e4e4;
        }
        .custom-bg--grey-translucent {
            background-color:rgba(<?php echo hex2RGB('#dbdbdb')['red']; ?>,<?php echo hex2RGB('#dbdbdb')['green']; ?>,<?php echo hex2RGB('#dbdbdb')['blue']; ?>, 0.85);
        }

		.custom-text--primary {
			color: <?php echo get_theme_mod('primary_color', '#00257f'); ?> !important;
		}
		.custom-text--primary-contrast,
        .homepage-block__bg-primary a:link,
        .homepage-block__bg-primary a:visited {
            color: <?php echo (luma(hex2RGB(get_theme_mod('primary_color', '#00257f'))) > 0.6) ? '#222' : '#fff'; ?>;
        }
        .custom-text--primary-contrast-subtle {
            color: <?php echo (luma(hex2RGB(get_theme_mod('primary_color', '#00257f'))) > 0.6) ? subtleText(get_theme_mod('primary_color', '#00257f'), 'darker') : subtleText(get_theme_mod('primary_color', '#00257f'), 'lighter'); ?> !important;
        }
		.custom-text--secondary {
			color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?> !important;
		}
		.custom-text--secondary-contrast,
        .homepage-block__bg-secondary a:not(.call-to-action) {
			color: <?php echo (luma(hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))) > 0.6) ? '#222' : '#fff'; ?> !important;
		}
		.custom-text--tertiary {
			color: <?php echo get_theme_mod('tertiary_color', '#5F697F'); ?> !important;
		}
		.custom-text--tertiary-contrast,
        .homepage-block__bg-tertiary a:link,
        .homepage-block__bg-tertiary a:visited{
			color: <?php echo (luma(hex2RGB(get_theme_mod('tertiary_color', '#5F697F'))) > 0.6) ? '#222' : '#fff'; ?>;
		}

        .homepage-block a:link,
        .homepage-block a:visited {
            font-weight:700;
        }

        /* Used on black backgrounds*/
        .custom-text--black,
        .custom-text--black-contrast {
            color: #ffffff;
        }

        /* Used on white backgrounds*/
        .custom-text--white,
        .custom-text--white-contrast {
            color: #222222;
        }

        /* Used on grey backgrounds*/
        .custom-text--grey,
        .custom-text--grey-contrast {
            color: #222222;
        }

        .primary {
            background-color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?>;
            color: <?php echo (luma(hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))) > 0.6) ? '#222' : '#fff'; ?> !important;
            border-bottom:2px solid <?php echo adjustColorLightenDarken(get_theme_mod('secondary_color', '#14b1cc'), 30); ?>
        }
        .primary:hover {
            color: <?php echo (luma(hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))) > 0.6) ? '#222' : '#fff'; ?>;
        }

        #mobile-search-container {
            background-color: <?php echo get_theme_mod('primary_color', '#00257f'); ?>;
        }
        #header-container {
            background-color: <?php echo get_theme_mod('body_background_color', '#ffffff'); ?>;
            border-top:3px solid <?php echo get_theme_mod('primary_color', '#00257f'); ?>;
        }

        .main-navigation ul li a,
        #primary-menu-mobile ul li a {
            color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?>
        }
        .current-menu-item > a,
        .current_page_ancestor > a,
        .current-menu-ancestor > a
         {
            color:<?php echo get_theme_mod('primary_color', '#00257f'); ?> !important;
            font-weight:700;
         }

        .main-navigation ul li ul {
            border-top:2px solid <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?>;
        }

        #breadcrumbs {
            color: <?php echo get_theme_mod('primary_color', '#00257f'); ?>;
        }

        .homepage-block__button-white,
        .homepage-block__button-black,
        .homepage-block__button-grey,
        .homepage-block__button-primary,
        .homepage-block__button-secondary,
        .homepage-block__button-tertiary {
            background-color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?>;
            color: <?php echo (luma(hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))) > 0.6) ? '#222' : '#fff'; ?> !important;
            border-bottom:2px solid <?php echo adjustColorLightenDarken(get_theme_mod('secondary_color', '#14b1cc'), 30); ?>;
            border-radius:5px;
            padding:8px 12px;
            font-weight:700;
        }
        .homepage-block__button-secondary {
            background-color: <?php echo (luma(hex2RGB(get_theme_mod('secondary_color', '#14b1cc'))) > 0.6) ? '#222' : '#fff'; ?> !important;
            color: <?php echo get_theme_mod('secondary_color', '#14b1cc'); ?> !important;
        }
        .homepage-block__button:not(:last-of-type) {
            margin-right:12px;
        }



        .footer-section a:link,
        .footer-section a:visited,
        .site-info-section a:link,
        .site-info-section a:visited {
            color:<?php echo (luma(hex2RGB(get_theme_mod('primary_color', '#00257f'))) > 0.6) ? '#222' : '#fff'; ?> !important;
        }
        .footer-section a:hover {
            opacity:0.7 !important;
        }
        .footer-section a.btn {
            border:1px solid <?php echo (luma(hex2RGB(get_theme_mod('primary_color', '#00257f'))) > 0.6) ? '#222' : '#fff'; ?> !important;
        }

	</style>
	<?php
}
add_action( 'wp_head', 'fipra_customized_css');

