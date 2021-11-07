<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsact
 */

 $headerType = get_theme_mod( 'select_header_type', 'default' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newsact' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="header" class="site-header main-header-bg header-type" role="banner" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        <!-- menu works -->
    	<?php 
			if($headerType == 'default'){
				include_once get_template_directory() . '/inc/menubars/header_nav_default.php'; 
			} elseif($headerType == 'stacked'){
				include_once get_template_directory() . '/inc/menubars/header_nav_stacked.php'; 
			} else {
				include_once get_template_directory() . '/inc/menubars/header_nav_stacked.php'; 
			}
		?>
       <!-- .menu work ends -->
	</header><!-- #masthead -->
    
	<div id="content" class="site-content">
    <?php endif; ?>
