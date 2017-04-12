<?php

if(function_exists("register_field_group"))
{
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

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_testimonial-fields',
		'title' => 'Testimonial Fields',
		'fields' => array (
			array (
				'key' => 'field_55f8356a83043',
				'label' => 'Quote',
				'name' => 'quote',
				'type' => 'textarea',
				'instructions' => 'Do not include quotation marks',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 3,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_55f8359783044',
				'label' => 'Author\'s Name',
				'name' => 'name',
				'type' => 'text',
				'instructions' => 'Who said this?',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_55f835ba83045',
				'label' => 'Author\'s Position',
				'name' => 'position',
				'type' => 'text',
				'instructions' => 'The speaker\'s position within their company',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_55f835ed83046',
				'label' => 'Author\'s Company / Organisation',
				'name' => 'company_organisation',
				'type' => 'text',
				'instructions' => 'The company of organisation of the author',
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
					'value' => 'testimonial',
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
