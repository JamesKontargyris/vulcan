<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_article-fields',
		'title' => 'Article Fields',
		'fields' => array (
			array (
				'key' => 'field_5884a27716da9',
				'label' => 'Article Type',
				'name' => 'article_type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'news' => 'News',
					'analysis' => 'Analysis',
				),
				'default_value' => 'news',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5884a22729ebf',
				'label' => 'Author',
				'name' => 'author',
				'type' => 'relationship',
				'return_format' => 'id',
				'post_type' => array (
					0 => 'fipriot',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_title',
				),
				'max' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'article',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_homepage-block-fields',
		'title' => 'Homepage Block Fields',
		'fields' => array (
			array (
				'key' => 'field_55f81f26c82bf',
				'label' => 'Block ID',
				'name' => 'block_id',
				'type' => 'text',
				'instructions' => 'The id given to the <section> tag that will surround this block.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_55f81f7ec82c0',
				'label' => 'Block Class(es)',
				'name' => 'block_class',
				'type' => 'text',
				'instructions' => 'The class(es) name(s) given to the <section> tag that will surround this block. Separate classes with a space',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'homeblock',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'slug',
				6 => 'author',
				7 => 'format',
				8 => 'featured_image',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_homepage-slide-fields',
		'title' => 'Homepage Slide Fields',
		'fields' => array (
			array (
				'key' => 'field_55f8564cc761f',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => 150,
				'rows' => 3,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_55f85662c7620',
				'label' => 'Calls to Action',
				'name' => 'links',
				'type' => 'relationship',
				'instructions' => 'Select the pages you would like to link to (maximum 3). Each page\'s title will be used as the text on the button. Drag-and-drop to reorder.',
				'return_format' => 'id',
				'post_type' => array (
					0 => 'page',
					1 => 'fipriot',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => 3,
			),
			array (
				'key' => 'field_55f85603c761d',
				'label' => 'Featured Image Position',
				'name' => 'bg_position',
				'type' => 'select',
				'instructions' => 'Select a position for the featured image in the background of the overall content area.',
				'choices' => array (
					'left_top' => 'Top Left',
					'center_top' => 'Top Middle',
					'right_top' => 'Top Right',
					'left_center' => 'Centre Left',
					'center' => 'Centre',
					'center_right' => 'Centre Right',
					'left_bottom' => 'Bottom Left',
					'center_bottom' => 'Bottom Middle',
					'right_bottom' => 'Bottom Right',
				),
				'default_value' => 'center',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'homeslide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-fields',
		'title' => 'Page Fields',
		'fields' => array (
			array (
				'key' => 'field_55fc44a2ffdd0',
				'label' => 'Header Banner',
				'name' => 'hide_header_banner',
				'type' => 'true_false',
				'instructions' => 'Hide the header banner?',
				'message' => 'Hide header banner',
				'default_value' => 0,
			),
			array (
				'key' => 'field_55fa9a49e2fca',
				'label' => 'Header Text Location',
				'name' => 'header_text_location',
				'type' => 'select',
				'instructions' => 'How should title and introduction be aligned in the page header?',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55fc44a2ffdd0',
							'operator' => '!=',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'left' => 'Left-align',
					'center' => 'Centre-aligned',
					'right' => 'Right-aligned',
				),
				'default_value' => 'center',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_55faa4bb6f35b',
				'label' => 'Header Text Block Height',
				'name' => 'header_text_block_height',
				'type' => 'select',
				'instructions' => 'Height is set automatically if a featured image is set.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55fc44a2ffdd0',
							'operator' => '!=',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'short' => 'Short',
					'tall' => 'Tall',
				),
				'default_value' => 'short',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_55faa270ac391',
				'label' => 'Featured Image Position',
				'name' => 'bg_position',
				'type' => 'select',
				'instructions' => 'The position of the featured image (if included) in the background of the banner area at the top of the page.',
				'required' => 1,
				'choices' => array (
					'left_top' => 'Top Left',
					'center_top' => 'Top Middle',
					'right_top' => 'Top Right',
					'left_center' => 'Centre Left',
					'center' => 'Centre',
					'center_right' => 'Centre Right',
					'left_bottom' => 'Bottom Left',
					'center_bottom' => 'Bottom Middle',
					'right_bottom' => 'Bottom Right',
				),
				'default_value' => 'center',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_55fa9a00e2fc9',
				'label' => 'Introduction',
				'name' => 'header_introduction',
				'type' => 'textarea',
				'instructions' => 'Text displayed in the header under the page title.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_55fa9b8b63cfc',
				'label' => 'Page Layout',
				'name' => 'page_layout',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'left_sidebar' => 'Main column with sidebar on left',
					'full_width' => 'Full width main column',
					'right_sidebar' => 'Main column with sidebar on right',
					'page_width' => 'Full page width column',
				),
				'default_value' => 'right_sidebar',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_56046d486bd4d',
				'label' => 'Testimonials Title',
				'name' => 'testimonials_title',
				'type' => 'text',
				'instructions' => 'If you\'d like to display a title in the testimonials block, enter it here (it will only display if testimonials are selected for this page).',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 60,
			),
			array (
				'key' => 'field_55f848f0ad0a1',
				'label' => 'Testimonials',
				'name' => 'testimonials',
				'type' => 'relationship',
				'instructions' => 'Select the testimonials you would like to display on this page. Drag-and-drop to reorder.',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'testimonial',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}