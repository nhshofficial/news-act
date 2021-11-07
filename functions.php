<?php
/**
 * newsact functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newsact
 */

if ( ! function_exists( 'newsact_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newsact_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'newsact-blog', 750, 450, true );
		add_image_size( 'newsact-logo', 300, 90, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'newsact' ),
        'right_side_menu' => esc_html__( 'Right Side Menu', 'newsact' ),
	) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	function newsact_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'newsact_add_editor_styles' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'newsact_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'newsact_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newsact_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'newsact_content_width', 640 );
}
add_action( 'after_setup_theme', 'newsact_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsact_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'newsact' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'newsact' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'newsact' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'newsact' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'newsact' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'newsact' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'newsact' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'newsact' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'newsact_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newsact_scripts() {

	// frow css
	wp_enqueue_style( 'frow', get_template_directory_uri().'/assets/css/frow.css', array(), '4.0.0', 'all' );
	// default css
	wp_enqueue_style( 'newsact-defaultcss', get_template_directory_uri().'/assets/css/default.css', array(), '1.0', 'all' );
	// custom css
	wp_enqueue_style( 'newsact-customcss', get_template_directory_uri().'/assets/css/custom.css', array(), '1.0', 'all' );
	// fontawesome css
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/all.css', array(), '6.0.0', 'all' );
	// woocommerce css
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'newsact-woocomerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	}

	wp_enqueue_style( 'newsact-style', get_stylesheet_uri() );

	
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
	// theme-script js
	wp_enqueue_script( 'newsact-themejs', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );
	// skip to content js
	wp_enqueue_script( 'newsact-skip-link-focus-fix-js', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );
	// sticky menu js
	if( get_theme_mod( 'select_menu_type', 'default' ) == 'sticky' ) {
		wp_enqueue_script( 'sticky-menu-js', get_template_directory_uri() . '/assets/js/sticky-menu.js', array(), '1.0', true );
	}
	// main js
	wp_enqueue_script( 'newsact-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
	// comment reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newsact_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Kirki framework additions.
 */
require get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load woocommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Custom CSS
function newsact_custom_css() { ?>
	<style>
		<?php if( get_theme_mod( 'select_header_type', 'default' ) == 'stacked' ) : ?>

			/* XS, SM */
			@media (max-width: 991px) {
				.main-header-bg {
					padding: 0px 10px;
				}
			}
			.main-header-bg {
				background-color: <?php echo esc_attr( get_theme_mod( 'header_bg_color', '#ffffff' ) ); ?>
			}
		<?php endif; ?>
	</style>
<?php 
}
add_action( 'wp_head', 'newsact_custom_css' );