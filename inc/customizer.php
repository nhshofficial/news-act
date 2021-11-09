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


/*----------------------------
News Template setup
----------------------------*/

 // section for News Template
 Kirki::add_section( 'newsact_template_setup', array(
    'title'    =>  esc_html__( 'News Page Setup', 'newsact' ),
    'description'    =>  esc_html__( 'Customize all the settings related to News Front Page', 'newsact' ),
    'panel' =>  'newsact_panel'
) );

// divider
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'custom',
	'settings'    => 'divider_hack_1',
	'section'     => 'newsact_template_setup',
	'default'     => '<hr>',
] );

//--------- Section for Breaking News ----------//
Kirki::add_section( 'breaking_news', array(
   'title'    =>  esc_html__( 'Breaking News', 'newsact' ),
   'panel' =>  'newsact_panel',
   'section'   => 'newsact_template_setup'
) );

// enable breaking news
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'toggle',
	'settings'    => 'enable_breaking_news',
	'label'       => esc_html__( 'Enable Breaking News', 'newsact' ),
	'section'     => 'breaking_news',
	'default'     => '1',
	'priority'    => 10,
] );

// breaking news post count
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'number',
	'settings'    => 'breaking_post_count',
	'label'       => esc_html__( 'Breaking News Post Count', 'newsact' ),
	'section'     => 'breaking_news',
	'default'     => 10,
	'choices'     => [
		'min'  => 3,
		'max'  => 30,
		'step' => 1,
	],
] );

// Breaking news slider config
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'custom',
	'settings'    => 'breaking_slider_config',
	'section'     => 'breaking_news',
	'default'     => '<h4 style="padding:7px 15px; background: rgb(216,53,30, 0.8); color:#ffffff; margin:0; border-radius:4px;">' . esc_html__( 'Configuration', 'newsact' ) . '</h4>',
] );

// breaking news post per page
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'number',
	'settings'    => 'breaking_post_per_page',
	'label'       => esc_html__( 'Posts per page', 'newsact' ),
	'section'     => 'breaking_news',
	'default'     => '4',
	'choices'     => [
		'min'  => 3,
		'max'  => 5,
		'step' => 1,
	],
] );

// breaking news autoplay
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'select',
	'settings'    => 'breaking_post_autoplay',
	'label'       => esc_html__( 'Post autoplay', 'newsact' ),
	'section'     => 'breaking_news',
	'default'     => 'true',
	'choices'     => [
		'true'  => esc_html__( 'Enable', 'newsact' ),
		'false' => esc_html__( 'Disable', 'newsact' ),
	],
] );

// breaking news hide arrow
Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'select',
	'settings'    => 'breaking_arrow',
	'label'       => esc_html__( 'Show Next / Previous arrow', 'newsact' ),
	'section'     => 'breaking_news',
	'default'     => 'true',
	'choices'     => [
		'true'  => esc_html__( 'Show', 'newsact' ),
		'false' => esc_html__( 'Hide', 'newsact' ),
	],
] );



//--------- Section for Breaking News ----------//
Kirki::add_section( 'post_layout_block', array(
	'title'    =>  esc_html__( 'Post Blocks', 'newsact' ),
	'panel' =>  'newsact_panel',
	'section'   => 'newsact_template_setup'
 ) );

// news block repeater
 Kirki::add_field( 'newsact_theme_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Repeater Control', 'newsact' ),
	'section'     => 'post_layout_block',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Post Block', 'newsact' ),
	],
	'button_label' => esc_html__('Add Post Block', 'newsact' ),
	'settings'     => 'news_blocks',
	'fields' => [
		'news_block_templates' => [
			'type'        => 'radio-image',
			'label'       => esc_html__( 'Layout', 'newsact' ),
			'description' => esc_html__( 'Select your desired Layout for posts.', 'newsact' ),
			'default'     => 'two',
			'choices'     => [
				'one'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'two'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'three'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'four'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'five'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'six'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'seven'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
				'eight'   	=> get_template_directory_uri() . '/assets/images/Section-1.jpg',
			],
		],
		// section one post count
		's_one_post_count'  => [
			'type'        => 'number',
			'label'       => esc_html__( 'Post count', 'newsact' ),
			'description' => esc_html__( 'Number of posts to show in the section', 'newsact' ),
			'default'     => 5,
			'choices'     => [
				'min'	=>	4,
				'max'	=>	5,
				'step'	=>	1,
			],
			'active_callback'   => function() {
				$get_templates = get_theme_mod( 'news_blocks' );
				foreach( $get_templates as $get_template ):
					if("one" == $get_template['news_block_templates']){
						return true;
					}
					return false;
				endforeach;
			}
		],
	]
] );