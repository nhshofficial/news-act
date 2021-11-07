<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package newsact
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newsact_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'newsact_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newsact_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'newsact_pingback_header' );

/**
 * Add color styling from theme
 */

if ( get_theme_mod( 'fixed_nav_setting' ) === 'yes' ) {
	function newsact_custom_styles() {
	    wp_enqueue_style(
	        'custom-style',
	        get_template_directory_uri() . '/assets/css/custom.css'
	    );
	        
	        $custom_css = "
				.header-type {
					position: fixed !important;
					z-index: 9;
					width: 100%;
				}
			";
	        wp_add_inline_style( 'newsact-customcss', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'newsact_custom_styles' );
}