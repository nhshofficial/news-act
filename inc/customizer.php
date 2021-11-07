<?php
/**
 * newsact Theme Customizer
 *
 * @package newsact
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


// init kirki theme option
Kirki::add_config('newsact_theme_config', array(
    'capability'   =>  'edit_theme_options',
    'option_type'  =>  'theme_mod',
));

// adding theme option panel
Kirki::add_panel( 'newsact_panel', array(
    'priority' => 10,
    'title'    =>  esc_html__( 'News Act Theme Options', 'newsact' ),
    'description'  =>  esc_html__( 'Get all the customization, theme options of News Act theme here.', 'newsact' )
) );


/*----------------------------
Header setup
----------------------------*/

 // section for Header customization
 Kirki::add_section( 'newsact_header_setup', array(
    'title'    =>  esc_html__( 'Header', 'newsact' ),
    'description'    =>  esc_html__( 'Customize all the settings related to Header', 'newsact' ),
    'panel' =>  'newsact_panel'
) );

 // header type
 Kirki::add_section( 'header_type', array(
    'title'    =>  esc_html__( 'Header layout', 'newsact' ),
    'panel' =>  'newsact_panel',
    'section'   => 'newsact_header_setup'
) );

// Header type selection
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'select',
	'settings'    => 'select_header_type',
	'label'       => esc_html__( 'Select header layout', 'newsact' ),
	'section'     => 'header_type',
	'default'     => 'default',
	'placeholder' => esc_html__( 'Select an option...', 'newsact' ),
	'priority'    => 10,
	'multiple'    => 0,
	'choices'     => [
		'default' => esc_html__( 'Default', 'newsact' ),
		'stacked' => esc_html__( 'Stacked', 'newsact' ),
	],
] );

// Header type selection
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'color',
	'settings'    => 'header_bg_color',
	'label'       => esc_html__( 'Select header background color', 'newsact' ),
	'section'     => 'header_type',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.main-header-bg',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

// ============= Menu Section =============== //
// header divider one
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'custom',
	'settings'    => 'header_divider_one',
	'section'     => 'newsact_header_setup',
	'default'     => '<hr>',
] );

 // section for Header customization
 Kirki::add_section( 'menu_type', array(
    'title'    =>  esc_html__( 'Menu', 'newsact' ),
    'panel' =>  'newsact_panel',
    'section'   => 'newsact_header_setup'
) );

// Header type selection
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'select',
	'settings'    => 'select_menu_type',
	'label'       => esc_html__( 'Select menu type', 'newsact' ),
	'section'     => 'menu_type',
	'default'     => 'default',
	'placeholder' => esc_html__( 'Select an option...', 'newsact' ),
	'priority'    => 10,
	'multiple'    => 0,
	'choices'     => [
		'default' => esc_html__( 'Default Menu', 'newsact' ),
		'sticky' => esc_html__( 'Sticky Menu', 'newsact' ),
	],
] );

// Header type selection
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'radio-buttonset',
	'settings'    => 'select_menu_position',
	'label'       => esc_html__( 'Select menu position', 'newsact' ),
	'section'     => 'menu_type',
	'default'     => 'justify-end',
	'priority'    => 10,
	'choices'     => [
		'justify-start' => esc_html__( 'Left', 'newsact' ),
		'justify-center' => esc_html__( 'Center', 'newsact' ),
		'justify-end' => esc_html__( 'Right', 'newsact' ),
	],
    'active_callback'   => [
        [
            'setting'   =>  'select_header_type',
            'operator'  =>  '===',
            'value'     =>  'stacked',
        ],
    ],
] );